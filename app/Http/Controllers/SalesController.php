<?php

namespace App\Http\Controllers;

// app/Http/Controllers/SalesController.php



use Illuminate\Http\Request;
use App\Models\Sale;


class SalesController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('sales-list')) {
            abort(403, 'Unauthorized action.');
        }
       
        $sales = Sale::with(['book', 'order'])->get();
        
        return view('sales.index', compact('sales'));
    }
}
