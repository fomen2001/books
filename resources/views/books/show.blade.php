@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1>{{ $book->title }}</h1>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Price:</strong> ${{ $book->price }}</p>
            <p>{{ $book->description }}</p>
            <form action="{{ route('cart.add', $book->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
    @endsection
