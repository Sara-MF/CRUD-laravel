<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $books = Books::orderBy('title')->paginate(10);

        return view('list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
                'release_year' => $request->release_year,
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

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('read');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Books::find($id);

        return view('update', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
