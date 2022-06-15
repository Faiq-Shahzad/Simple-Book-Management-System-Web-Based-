<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Review;
use App\Models\Shows;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //

    public function show(){
        $books = Books::all();
        return view('admin.viewBooks', compact('books'));
    }

    public function addBook(Request $request){
        $book = new Books();
        if ($request->hasFile('book_cover')){
            $file = $request->file('book_cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $book->book_cover = $filename;
            $file->move('covers/', $filename);
        }else{
            $book->book_cover = 'defaultImg.png';
        }

        $book->book_name = $request->input('book_name');
        $book->book_description = $request->input('book_description');
        $book->ratings = $request->input('ratings');
        $book->book_genre = $request->input('book_genre');

        $book->save();

        return redirect('/admin/viewBooks')->with('status', 'Book Added Successfully');
    }

    public function review($id){
        $reviews = Review::where('book_id', $id)->get();
        $book = Books::find($id);

        return view('/admin/reviewsBooks', compact('reviews', 'book'));
    }

    public function addreview(Request $request, $id, $user_id){

        $review = new Review();

        $review->user_id = $user_id;
        $review->book_id = $id;
        $review->rating = $request->input('ratings');
        $review->book_review = $request->input('book_review');

        $review->save();

        return redirect('/home')->with('status', 'Review Added Successfully');
    }

    public function bookdetails($id){
        $book = Books::find($id);
        $user = Auth::user();


        return view('/detailsBooks', compact('book', 'user'));
    }

    public function usershow(){
        $books = Books::all();
        return view('viewBooks', compact('books'));
    }
}
