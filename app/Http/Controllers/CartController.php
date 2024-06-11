<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Book;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Book $book)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$book->id])) {
            $cart[$book->id]['quantity']++;
        } else {
            $cart[$book->id] = [
                "title" => $book->title,
                "author" => $book->author,
                "price" => $book->price,
                "quantity" => 1,
                "cover_image" => $book->cover_image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('books.show', $book->id)->with('success', 'Book added to cart successfully!');
    }

    public function update(Request $request, Book $book)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$book->id])) {
            $cart[$book->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
        }
        return redirect()->route('cart.index')->with('error', 'Book not found in cart!');
    }

    public function remove(Book $book)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$book->id])) {
            unset($cart[$book->id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Book removed from cart successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
