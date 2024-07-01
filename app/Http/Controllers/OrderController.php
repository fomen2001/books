<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Book;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données de la commande
        // $request->validate([
        //     'book_id' => 'required|exists:books,id',
        //     'quantity' => 'required|integer|min:1',
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'address' => 'required|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'zip' => 'required|string|max:10',
        //     'card_number' => 'required|string|max:20',
        //     'expiry_date' => 'required|string|max:5',
        //     'cvv' => 'required|string|max:4',
        // ]);

        // Créer la commande
        // $order = Order::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'city' => $request->city,
        //     'state' => $request->state,
        //     'zip' => $request->zip,
        //     'card_number' => $request->card_number,
        //     'expiry_date' => $request->expiry_date,
        //     'cvv' => $request->cvv,
        //     'total_amount' => $request->quantity * Book::find($request->book_id)->price,
        // ]);

        // Créer une vente
dd($request-all());
        Sale::create([
            'book_id' => $request->book_id,
            'order_id' => 2,
            'quantity' => $request->quantity,
        ]);

        // Rediriger vers la page de succès
        return redirect()->route('checkout.success');
    }
}
