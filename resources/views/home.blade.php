@extends('layouts.layout')

@section('title') Cineplex - Home @endsection

@section('style')

<style>
    .alert{
        width: 25%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 2%;
        text-align: center;
        border: 2px solid green !important;
    }

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

    .slide{
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    div .caption{
        position: absolute !important;
        color: white !important;
    }

    .carousel-item > img{
        width: 100%;
        object-fit: cover;
        object-position: center;
    }

    .carousel-item > .d-block{
        height: 700px;
    }

    .card:hover{
        transition: transform .4s;
        transform: scale(1.1);
    }

    .home_movies{
        width: 70%;
    }

    .btn-warning:hover{
        background-color: red !important; 
    }

    @media(max-width: 767px){

        .carousel-item > .d-block{
            height: 200px;
        }
    }

</style>

@endsection



@section('content')

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="https://miro.medium.com/max/4548/1*rvQbnKz14jVNKNVnsCPpsw.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://leverageedu.com/blog/wp-content/uploads/2019/09/Importance-of-Books.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://images.indianexpress.com/2020/04/books_759.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h1>Currently Available</h1>

    <div class="home_movies container">

        <div class="row">

            @foreach ($books as $item)

                <div class="card col-xl-3 mx-3 my-3 bg-dark text-white" style="width: 18rem;">
                    <img src="{{asset('covers/'.$item->book_cover)}}" class="card-img-top" alt="..." height="150-px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->book_name }}</h5>
                        <p class="card-text">Genre: {{ $item->book_genre }}</p>
                        <p class="card-text">Ratings: {{ $item->ratings }}</p>
                        <a href="/viewBooks/{{ $item->id }}" class="btn btn-primary">details</a>
                        <a href="/bookOrders/{{Auth::user()->id}}/{{ $item->id }}" class="btn btn-warning">Add to Cart</a>
                    </div>
                </div>
            @endforeach
            
        </div>

        
        
        
        
    </div>

@endsection 

<script>
    setTimeout(function(){
        $('.alert').slideUp(1500);
    }, 2000);
</script>

