<!-- resources/views/cart/index.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Shopping Cart</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(empty($cart))
            <p>Your cart is empty!</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $details)
                        <tr>
                            <td><img src="{{ asset('storage/' . $details['cover_image']) }}" alt="{{ $details['title'] }}" width="50"></td>
                            <td>{{ $details['title'] }}</td>
                            <td>{{ $details['author'] }}</td>
                            <td>${{ $details['price'] }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control" style="width: 60px;">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                                </form>
                            </td>
                            <td>${{ $details['price'] * $details['quantity'] }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <h3>Total: ${{ array_sum(array_column($cart, 'price')) }}</h3>
            </div>
            <div>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary">Proceed to Payment</a>
            </div>
        @endif
    </div>
    @endsection
