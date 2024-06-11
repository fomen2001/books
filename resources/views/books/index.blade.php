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
    <h1>Search Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-4">Add New Book</a>
    <form action="{{ route('books.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search by title, author, or genre">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 book-card">
                    <div class="card">
                        <img src="{{ $book->cover_image }}" class="card-img-top book-cover" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">Auteur : {{ $book->author }}</p>
                            <p class="card-text">{{ $book->description }}</p>
                            <p class="card-text"><strong>Prix : €{{ $book->price }}</strong></p>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary">Modifier</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection
