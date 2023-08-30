<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BooksController extends Controller
{

    public function index(Request $request)
    {

        $filters = $request->except('_token');

        if ($request->title != null) {

            $books = Books::where('title', 'ilike', '%'. $request->title .'%')->orderBy('title')->paginate(10);

        } else {

            $books = Books::orderBy('title')->paginate(10);
        }

        return view('list', compact('books', 'filters'));
    }

    public function create()
    {

        $years = [];

        for ($year = Carbon::now()->year; $year >= 1950; $year--) $years[$year] = $year;

        return view('create', compact('years'));
    }

    public function store(Request $request)
    {

        try {

            DB::beginTransaction();

            if ($request->rented_status == '1') {
        
                $request->rented_status = true;
    
            } else {
    
                $request->rented_status = false;
    
            }
    
            $newBook = Books::create([
    
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'release_year' => (int) $request->release_year,
                'rented' => $request->rented_status
    
            ]);   
            
            DB::commit();

        } catch (\Throwable $e) {

            Log::info('It was not possible to create the book: ' . $e->getMessage());

            DB::rollback();

            return back()->withErrors(['error' => 'It was not possible to create the book. Please, try again'])->withInput();
        }

        return back()->with('success', 'Book created successfully!');
    }

    public function show()
    {
        return view('read');
    }

    public function edit($id)
    {
        $book = Books::find($id);

        $years = [];

        for ($year = Carbon::now()->year; $year >= 1950; $year--) $years[$year] = $year;

        return view('update', compact('book', 'years'));
    }

    public function update(Request $request, string $id)
    {
        $book = Books::find($id);

        try {

            DB::beginTransaction();

            if ($request->rented_status == '1') {
        
                $request->rented_status = true;
    
            } else {
    
                $request->rented_status = false;
    
            }

            $book->title = $request->title;
            $book->author = $request->author;
            $book->description = $request->description;
            $book->release_year = $request->release_year;
            $book->rented = $request->rented_status;

            $book->save();

            DB::commit();

        } catch (\Throwable $e) {

            Log::info('It was not possible to update the book: ' . $e->getMessage());

            DB::rollback();

            return back()->withErrors(['error' => 'It was not possible to update the book. Please, try again'])->withInput();

        }

        return back()->with('success', 'Book updated successfully!');
    }

    public function delete($id)
    {
        $book = Books::where('id', $id)->delete();

        return back()->with('success', 'Book deleted successfully!');
    }
}
