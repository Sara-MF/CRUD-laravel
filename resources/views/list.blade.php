@extends('master')

@section('content')

    <div class="content">
        <div class="header-content">
            <h3>List of books</h3>
        </div>

        <div class="body-content">
            <a href="{{ route('create') }}"><button class="button col-md-2">Create book</button></a>
            
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
                            <td>
                                <a href="{{ route('edit-book', ['id' => $book->id]) }}" style="color: #57727b">Edit <i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection