<?php

namespace App\Http\Controllers;

use App\Models\LibraryBook;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function searchIndex(){
        return view('books.search');
    }
    public function searchBook(Request $request)
    {
        $query = $request->input('query');
        $results = [];

        if ($query) {
            $results = LibraryBook::whereHas('book', function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })->with(['book', 'library'])->get();
        }

        return view('books.search', ['results' => $results]);
    }
}
