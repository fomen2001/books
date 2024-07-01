<!-- resources/views/sales/index.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Sales Reports</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Title</th>
                    <th>Client name</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td>{{ $sale->title ?? 'N/A' }}</td>
                        <td>{{ $sale->author ?? 'N/A' }}</td>
                        <td>{{ $sale->name ?? 'N/A' }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>${{ $sale->total_amount }}</td>
                        <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
