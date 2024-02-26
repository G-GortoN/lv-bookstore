<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform the search query using the book model
        $books = Book::where('name', 'like', '%' . $query . '%')->get();

        // Return the search results as a view
        return view('search.results', compact('books'));
    }
}