@extends('master')

@section('content')

    <div class="content">
        <div class="header-content">
            <h3>List of books</h3>
        </div>

        <div class="body-content">
            <a href="{{ route('create') }}"><button class="create-button col-md-2">Create book</button></a>
            
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Rented</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->rented ? 'Yes' : 'No'}}</td>
                            <td>Edit / Delete</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection