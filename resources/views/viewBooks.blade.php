@extends('layouts.layout')

@section('title') All Movie @endsection

@section('style')

<style>
    h1{
        color: white;
        border-bottom: 4px solid red;
        font-weight: bold !important;
        text-align: center;
        width: 30%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 2% !important;
    }

    .card:hover{
        transition: transform .4s;
        transform: scale(1.1);
    }

    .user_movies{
        width: 90%;
    }

    .card a{
        text-decoration: none;
        color: white;
    }

    .card a:hover{
        color: white;
    }

    footer{
        margin-top: 10% !important;
    }

</style>

@endsection

@section('content')

    <h1>All Books</h1>

    <div class="user_movies container">
        <div class="row">

            @php ($bookarray = [])

            @foreach ($books as $item)

                <div class="card col-xl-3 mx-3 my-3 bg-dark text-white" style="width: 18rem;">
                    <a href="viewBooks/{{ $item->id }}">
                        <img src="{{asset('covers/'.$item->book_cover)}}" class="card-img-top" alt="..." height="150-px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->book_name }}</h5>
                            <p class="card-text">Year: {{ $item->genre }}</p>
                            <p class="card-text">Ratings: {{ $item->ratings }}</p>
                        </div>
                    </a>
                </div>
                @php (array_push($bookarray, $item))
            @endforeach 

        </div>
    </div>
    
@endsection