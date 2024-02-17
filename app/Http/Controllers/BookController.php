<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;


class BookController extends Controller
{   



    public function index()
    {
        $books=Book::with('reviews');
        $data_filter=request()->data_filter;

        switch($data_filter){
            case'latest':
                $books->orderBy('created_at', 'desc');
                break;

            case'month':
                $lastMonth = Carbon::now()->subMonth();
                $endOfMonth = Carbon::now();
                $books = $this->getPopularBooks($lastMonth, $endOfMonth);
                break;

            case'popular-six-months':
                $sixMonthsAgo = Carbon::now()->subMonths(6);
                $endOfSixMonths = Carbon::now();
                $books = $this->getPopularBooks($sixMonthsAgo, $endOfSixMonths);
                break;

            case'rated-month':
                $lastMonth = Carbon::now()->subMonth();
                $books = $this->getMostRatedBooks($lastMonth);
                break;

            case'rated-six-month':
                $lastSixMonth = Carbon::now()->subMonth(6);
                $books = $this->getMostRatedBooks($lastSixMonth);
                break;

        }
        // dd($books);
        if(request()->has('search')){
            $searchItem=request('search');
            $books->where('title','like','%'. $searchItem .'%');
        }
        $books = $books->get();
        $booksRating = $this->calculateAverageRating($books);
        
        return view('index', compact('books', 'booksRating','data_filter'));

    }



    public function show(Book $book){
        $book->averageRating=round($book->reviews->avg('rating'));
        
        return view('show',compact('book'));
    }


    protected function calculateAverageRating($books)
    {
        // $books = collect($books);
        return $books->map(function ($book) {
            $book->averageRating = $book->reviews->count() > 0 ? round($book->reviews->avg('rating')) : 0;
            return $book;
        });
    }

    
    protected function getPopularBooks($startDate, $endDate)
    {
        return Book::withCount(['reviews' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }])
            ->with('reviews')
            ->orderBy('reviews_count', 'desc');
           
    }
    
    protected function getMostRatedBooks($date)
    {
        return Book::withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->whereHas('reviews', function ($query) use ($date) {
                $query->where('created_at', '>=', $date);
            })
            ->with('reviews')
            ->orderByDesc('reviews_avg_rating');
       
    }
    
}


