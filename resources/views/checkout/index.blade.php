@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Checkout</h1>
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                @error('address')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="city" class="form-label">City:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
                    @error('city')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label for="state" class="form-label">State:</label>
                    <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}">
                    @error('state')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="zip" class="form-label">ZIP Code:</label>
                <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip') }}">
                @error('zip')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="card_number" class="form-label">Card Number:</label>
                    <input type="text" class="form-control" id="card_number" name="card_number" value="{{ old('card_number') }}">
                    @error('card_number')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-3">
                    <label for="expiry_date" class="form-label">Expiry Date (MM/YY):</label>
                    <input type="text" class="form-control" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}">
                    @error('expiry_date')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-3">
                    <label for="cvv" class="form-label">CVV:</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" value="{{ old('cvv') }}">
                    @error('cvv')<div class="text-danger">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                 <label for="quantity" class="form-label">Quantity:</label>
                 <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', 1) }}" min="1">
                 @error('quantity')<div class="text-danger">{{ $message }}</div>@enderror
               </div>
           </div>
           @foreach ($books as $book )
           <input type="hidden" name="book_id" value="{{ $book->id }}">   
           @endforeach
          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
