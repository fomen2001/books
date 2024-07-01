@extends('layouts.master')

@section('content')
    <style>
        .book-cover {
            width: 100%;
            height: auto;
        }
        .book-card {
            margin-bottom: 30px;
        }
    </style>

    <div class="container mt-5">
        <h1>Catalog of Books
            <a href="{{ route('books.create') }}" class="btn btn-primary mb-4">Add New Book</a>
        </h1>
        
        <!-- <form action="{{ route('books.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search by title, author, or genre">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form> -->
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 book-card">
                    <div class="card">
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="card-img-top book-cover">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">Author: {{ $book->author }}</p>
                            <p class="card-text">{{ implode(' ', array_slice(explode(' ', $book->description), 0, 20)) }}...</p>
                            <p class="card-text"><strong>Price: €{{ $book->price }}</strong></p>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-primary">View</a>
                            @can(['books-create',  'books-delete', 'books-view','books-list',  'books-edit'])
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
                            <form action="{{ route('cart.add', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
