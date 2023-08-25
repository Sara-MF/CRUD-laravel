@extends('master')

@section('content')

    <div class="content">
        <div class="header-content">
            <h3>List of books</h3>
        </div>

        @if (count($errors) > 0 && $errors->has('error'))
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

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

                             <form action="{{ route('delete-book', ['id' => $book->id]) }}" method="post">

                                @csrf
                                @method('DELETE')

                                <td>
                                    <a href="{{ route('edit-book', ['id' => $book->id]) }}" style="color: #57727b; margin-right: 20px;">Edit <i class="fa fa-edit"></i></a>
                                    <button type="submit" style="outline: none; border: none; background: none; cursor: pointer; color: #b7727c">Delete  <i class="fa fa-trash" style="color: #b7727c"></i></button>
                                </td>

                            </form>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $books->links() }}
            </div>
            
        </div>
    </div>

@endsection