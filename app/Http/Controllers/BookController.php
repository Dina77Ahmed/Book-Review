<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc');
        
        if(request()->has('search')){
            $books=$books->where('title','like','%'.request('search').'%');
        }

        $books = $books->get();
        $booksRating = $this->calculateAverageRating($books);
        // dd($booksRating);
        return view('index', compact('books', 'booksRating'));
    }

    public function filterMonth()
    {
        $lastMonth = Carbon::now()->subMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $popularBooks = $this->getPopularBooks($lastMonth, $endOfMonth);


        $books=$popularBooks;
        $booksRating = $this->calculateAverageRating($books);
        // dd($booksRating);
        return view('index', compact('books', 'booksRating'));
    }

    public function filterPopularSixMonths()
    {
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        $endOfSixMonths = Carbon::now()->endOfMonth();
        $popularSixBooks = $this->getPopularBooks($sixMonthsAgo, $endOfSixMonths);


        $books=$popularSixBooks;
        $booksRating = $this->calculateAverageRating($books);

        return view('index', compact('books', 'booksRating'));
    }

    public function filterRatedMonth()
    {
        $lastMonth = Carbon::now()->subMonth();
        $mostRatedBooks = $this->getMostRatedBooks($lastMonth);

        $books=$mostRatedBooks;
        $booksRating = $this->calculateAverageRating($books);

        return view('index', compact('books', 'booksRating'));
    }

    public function filterRatedSixMonths()
    {
        $lastSixMonth = Carbon::now()->subMonth(6);
        $mostRatedSixBooks = $this->getMostRatedBooks($lastSixMonth);

        $books=$mostRatedSixBooks;
        $booksRating = $this->calculateAverageRating($books);
        
        return view('index', compact('books', 'booksRating'));
    }

    public function show(Book $book){

        $book->averageRating=round($book->reviews->avg('rating'));
        
        return view('show',compact('book'));
    }


    protected function calculateAverageRating($books)
    {
        return $books->map(function ($book) {
            $book->averageRating = $book->reviews()->count() > 0 ? round($book->reviews->avg('rating')) : 0;
            return $book;
        });
    }

    
    protected function getPopularBooks($startDate, $endDate)
    {
        return Book::withCount(['reviews' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }])
            ->whereHas('reviews', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->orderBy('reviews_count', 'desc')
            ->get();
    }
    
    


    protected function getMostRatedBooks($date)
    {
        return Book::withCount('reviews')
            ->whereHas('reviews', function ($query) use ($date) {
                $query->where('created_at', '>=', $date);
            })
            ->with(['reviews' => function ($query) use ($date) {
                $query->where('created_at', '>=', $date);
            }])
            ->get()
            ->sortByDesc(function ($book) {
                return round($book->reviews->avg('rating'));
            });
    }
}




// class BookController extends Controller
// {
//     public function index()
//     {

//         $books = Book::orderBy('created_at', 'desc')->get();

//         $booksRating = Book::with('reviews')
//         ->withCount('reviews')
//         ->get()
//         ->map(function ($book) {
//             $book->averageRating = $book->reviews_count > 0 ? $book->reviews->avg('rating') : 0;
//             return $book;
//         });

//         return view('index', compact('books','booksRating'));

//     }

//     public function filterMonth()
//     {

//         $lastMonth = Carbon::now()->subMonth();
        
//         $popularBooks = Book::withCount('reviews')
//             ->whereHas('reviews', function ($query) use ($lastMonth) {
//                 $query->where('created_at', '>=', $lastMonth);
//             })
//             ->orderBy('reviews_count', 'desc')
//             ->get();

//             $books=$popularBooks;

//             $booksRating = Book::with('reviews')
//             ->withCount('reviews')
//             ->get()
//             ->map(function ($book) {
//                 $book->averageRating = $book->reviews_count > 0 ? $book->reviews->avg('rating') : 0;
//                 return $book;
//             });

//                 return view('index',compact('books','booksRating'));
//     }

//     public function filterPopularSixMonths()
//     {
//         $sixMonthsAgo = Carbon::now()->subMonths(6);

//         // Query popular books based on reviews from the last six months
//         $popularBooks = Book::withCount('reviews')
//             ->whereHas('reviews', function ($query) use ($sixMonthsAgo) {
//                 $query->where('created_at', '>=', $sixMonthsAgo);
//             })
//             ->orderBy('reviews_count', 'desc')
//              // Adjust this to retrieve the desired number of popular books
//             ->get();

//             $booksRating = Book::with('reviews')
//             ->withCount('reviews')
//             ->get()
//             ->map(function ($book) {
//                 $book->averageRating = $book->reviews_count > 0 ? $book->reviews->avg('rating') : 0;
//                 return $book;
//             });


//             $books=$popularBooks;

//             return view('index',compact('books','booksRating'));
//     }

//     public function filterRatedMonth()
//     {
//            // Get the date of last month
//             $lastMonth = Carbon::now()->subMonth();
        
//             // Query most rated books based on reviews from last month
//             $mostRatedBooks = Book::withCount('reviews')
//                 ->whereHas('reviews', function ($query) use ($lastMonth) {
//                     $query->where('created_at', '>=', $lastMonth);
//                 })
//                 ->with(['reviews' => function ($query) use ($lastMonth) {
//                     $query->where('created_at', '>=', $lastMonth);
//                 }])
//                 ->get()
//                 ->sortByDesc(function ($book) {
//                     // Calculate the average rating for each book
//                     return $book->reviews->avg('rating');
//                 })
//                 ; 

//                 $booksRating = Book::with('reviews')
//                 ->withCount('reviews')
//                 ->get()
//                 ->map(function ($book) {
//                     $book->averageRating = $book->reviews_count > 0 ? $book->reviews->avg('rating') : 0;
//                     return $book;
//                 });

//                 $books=$mostRatedBooks;

//                 return view('index',compact('books','booksRating'));
//             }
     
        

    
//             public function filterRatedSixMonths()
//     {
//         $lastSixMonth = Carbon::now()->subMonth(6);
        
//         // Query most rated books based on reviews from last month
//         $mostRatedSixBooks = Book::withCount('reviews')
//             ->whereHas('reviews', function ($query) use ($lastSixMonth) {
//                 $query->where('created_at', '>=', $lastSixMonth);
//             })
//             ->with(['reviews' => function ($query) use ($lastSixMonth) {
//                 $query->where('created_at', '>=', $lastSixMonth);
//             }])
//             ->get()
//             ->sortByDesc(function ($book) {
//                 // Calculate the average rating for each book
//                 return $book->reviews->avg('rating');
//             })
//             ; 

//             $booksRating = Book::with('reviews')
//             ->withCount('reviews')
//             ->get()
//             ->map(function ($book) {
//                 $book->averageRating = $book->reviews_count > 0 ? $book->reviews->avg('rating') : 0;
//                 return $book;
//             });

//             $books=$mostRatedSixBooks;

//             return view('index',compact('books','booksRating'));
//     }
// }


// 
// 
// 
// 
