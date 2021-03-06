@extends('layouts.adminlayout')

@section('title') Admin - Movie @endsection

@section('style')

<style>

    @media(max-width: 1600px){

        .alert{
            width: 25%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 2%;
            text-align: center;
            border: 2px solid green !important;
        }


        td a{
            color: white;
        }

        td a:hover{
            color: red;
        }

        th{
            background-color: rgb(219, 25, 51) !important; 
        }

        img{
            max-width: 100px;
            max-height: 100px;
        }

        h1{
            margin-top: 2% !important;
            color: white;
            border-bottom: 1px solid white;
            font-weight: bold !important;
        }

        hr{
            color: white !important;
            margin-top: 0 !important;
            padding: 0 !important;
        }

        td{
            text-align: center;
        }

        #phn_table{
            display: none;
        }
    }

    @media(max-width: 450px){
        #pc_table{
            display: none;
        }

        #phn_table{
            display: block;
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

    <h1>Books</h1>
    <hr>

    <table class="table table-striped table-hover table-dark" id="pc_table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Rating</th>
            <th scope="col">Genre</th>
            <th scope="col">Cover</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->book_name }}</td>
                    <td>{{ $book->ratings }}</td>
                    <td>{{ $book->book_genre }}</td>
                    <td><img src="{{ asset('covers/'.$book->book_cover) }}" alt=""></td>
                    <td><a href="/admin/{{$book->id}}/review">Reviews</a></td>
            @endforeach
        </tbody>
    </table>

    <table class="table table-striped table-hover table-dark col-sm-12" id="phn_table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Cover</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->book_name }}</td>
                    <td><img src="{{ asset('covers/'.$book->book_cover) }}" alt=""></td>
                    <td><a href="/admin/{{$book->id}}/review">Reviews</a></td>
            @endforeach
        </tbody>
    </table>
    
    
@endsection

<script>
    setTimeout(function(){
        $('.alert').slideUp(1500);
    }, 2000);
</script>