<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use App\Models\BookOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller{

    public function bookorder($id, $b_id){

        $book = Books::find($id);
        $user = Auth::user();

        return view('/addToCart', compact('book', 'user'));
    }

    public function addorder($id, $b_id){

        $order = new BookOrder();

        $order->user_id = $id;
        $order->book_id = $b_id;
        $order->status = 0;

        $order->save(); 

        return redirect('/home')->with('status', 'Order Placed Successfully');
    }

    public function vieworder(){
        $order = BookOrder::all();

        return view('/viewOrder', compact('order'));
    }

    public function approve($id){
        $order = BookOrder::find($id);
        $order->status = 1;
        $order->update();

        return redirect('/admin/1/profile')->with('status', 'Order Placed Successfully');
    }
}

?>