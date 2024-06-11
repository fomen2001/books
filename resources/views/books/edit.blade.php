@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Modifier le Livre</h1>
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>
            <div class="form-group">
                <label for="author">Auteur</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="cover_image">Image de Couverture</label>
                <input type="text" class="form-control" id="cover_image" name="cover_image" value="{{ $book->cover_image }}" required>
            </div>
            <div class="form-group">
                <label for="price">Prix</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $book->price }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $book->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
    @endsection
