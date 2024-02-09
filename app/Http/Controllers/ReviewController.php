<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Book $book){

        return view('create',compact('book'));
    }

    public function store(Request $request,Book $book){

        Review::create([
            "book_id"=>$book->id,
            "content"=>$request->content,
            "rating"=>$request->rating,
        ]);

        return redirect(route('book.show',$book));
    }
}
