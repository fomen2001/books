<!-- resources/views/books/search.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Search Results</h1>
        @if($books->isEmpty())
            <p>No books found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td><img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" width="50"></td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>${{ $book->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
