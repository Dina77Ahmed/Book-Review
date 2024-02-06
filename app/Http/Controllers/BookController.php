<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){

        $books=Book::orderBy('created_at','desc')->get();

        return view('index',compact('books'));
    }
}
