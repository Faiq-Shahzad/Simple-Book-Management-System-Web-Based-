@extends('layouts.layout')

@section('title') Movie - Details @endsection

@section('style')

<style>

    @media(max-width: 1600px){

        h1{
            font-weight: bold !important;
            width: 50%;
            margin-top: 2% !important;
            text-decoration: underline red;
        }

        h4{
            font-weight: bold !important;
        }

        h5{
            font-weight: bold !important;
        }

        .details{
            color: white;
            padding: 2%;
            text-align: justify;
            font-size: 18px;
        }

        img{
            width: 100%;
            height: 500px;
            object-fit: cover;
            object-position: top;
            /* box-shadow: inset 0px 0px 20px 10px rgba(0, 0, 0, 0.6); */
        }

        .review{
            margin-left: auto !important;
            margin-right: auto !important;
            width: 50%;
        }

        #rate{
            margin-bottom: 2%;
            width: 20%; 
            margin-left: auto;
            margin-right: auto;
        }

        label{
            text-align: center;
        }

        button{
            margin-top: 2% !important;
            width: 30% !important;
            margin-left: auto !important;
            margin-right: auto !important; 
        }
    }

    @media(max-width: 767px){
        img{
            height: 30%;
        }
        .btn-success{
            width: 100%;
        }
    }


</style>

@endsection

@section('content')

    <div class="details">
        <img src="{{asset('covers/'.$book->book_cover)}}" alt="">
        <h1>{{ $book->book_name }}</h1>
        <ul>
            <li>Ratings: {{ $book->ratings }}</li>
            <li>Genre: {{ $book->book_genre }}</li>
        </ul>
        <h4>Synopsis:</h4>
        <p>{{ $book->book_description }}</p>

        <h5>Write a Review (Optional): </h5>
        
        <form class="review" action="{{ url("/viewBooks/$book->id/$user->id") }}" method='POST'>
            @csrf
            
            <div class="row">
                <label for="">Ratings</label>
                <input type="number" min="1" max="10" name="ratings" id="rate">
            </div>
            <div class="row">
                <label for="">Review</label>
                <textarea name="book_review" id="" cols="89" rows="5" placeholder="Review...."></textarea><br>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success">Submit</button> 
            </div>
            
        </form>
    </div>
    
@endsection