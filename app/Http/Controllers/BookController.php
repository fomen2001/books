<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->can('books-list')) {
            abort(403, 'Unauthorized action.');
        }
        $query = Book::query();
        //dd($request->input('query'));
        
        if ($request->query) {
            // $search = $request->query('search');
            $query->where('title', 'LIKE', "%{$request->input('query')}%")
            ->orWhere('author', 'LIKE', "%{$request->input('query')}%")
            ->orWhere('description', 'LIKE', "%{$request->input('query')}%");
            }
            
        $books = $query->get();
       
        return view('books.index', compact('books'));
    }
    public function search(Request $request)
    {
        $query = Book::query();
        dd($request);

        if ($request->has('search')) {
            $search = $request->query('search');
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('author', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }

        $books = $query->get();
        return view('books.search', compact('books'));
    }

    public function create()
    {
        if (!auth()->user()->can('books-create')) {
            abort(403, 'Unauthorized action.');
        }
        return view('books.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('books-create')) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $coverImagePath = $request->file('cover_image')->store('cover_images', 'public');

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'cover_image' => $coverImagePath,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        if (!auth()->user()->can('books-view')) {
            abort(403, 'Unauthorized action.');
        }
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        if (!auth()->user()->can('books-edit')) {
            abort(403, 'Unauthorized action.');
        }
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        if (!auth()->user()->can('books-edit')) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'cover_image' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Livre mis à jour avec succès');
    }

    public function destroy(Book $book)
    {
        if (!auth()->user()->can('books-delete')) {
            abort(403, 'Unauthorized action.');
        }
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Livre supprimé avec succès');
    }
}
