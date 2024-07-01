<!-- resources/views/checkout/success.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Thank you for your purchase!</h1>
        <p>Your order has been successfully placed. You will receive a confirmation email shortly.</p>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Continue Shopping</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
