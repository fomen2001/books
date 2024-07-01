<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\Book;
use App\Models\Sale;

class CheckoutController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('checkout-list')) {
        abort(403, 'Unauthorized action.');
       }
       $books = Book::all();
       return view('checkout.index', compact('books'));
    }

    public function process(Request $request)
    {
        if (!auth()->user()->can('checkout-list')) {
            abort(403, 'Unauthorized action.');
           }
        //dd($request->input() );
       
        $validator = Validator::make($request->all(), [
            
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            'card_number' => 'required|numeric|digits:16',
            'expiry_date' => 'required|date_format:m/y|after:today',
            'cvv' => 'required|numeric|digits:3',
            'quantity' => 'required|integer|min:1',
            'book_id' => 'required|integer|exists:books,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('checkout.index')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Trouver le livre correspondant
        $book = Book::find($request->book_id);

        if (!$book) {
            return redirect()->route('checkout.index')
                             ->withErrors(['book_id' => 'Le livre sélectionné est introuvable.'])
                             ->withInput();
        }


        // Calculate the total amount from the items in the cart
        // $totalAmount = 0;
        // foreach(session('cart') as $item) {
        //     $totalAmount += $item['price'] * $item['quantity'];
        // }
        $totalAmount = $book->price * $request->quantity;
        // Process the payment with a payment gateway like Stripe or PayPal
        // For this example, we will just simulate a successful payment
        
        $order = Order::create([
            'book_id' => $request->book_id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'card_number' => $request->card_number,
            'expiry_date' => $request->expiry_date,
            'cvv' => $request->cvv,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount,
            
        ]);
        $book = Book::find($request->book_id);
        // Enregistrement de la vente
        Sale::create([
            'order_id' => $order->id,
            'title' => $book->title,
            'author' => $book->author,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount,
            
        ]);
    
        session()->forget('cart');
    
        // Redirection vers la page de succès
        return redirect()->route('checkout.success');
    }
    public function success()
    {
        return view('checkout.success');
    }
}
