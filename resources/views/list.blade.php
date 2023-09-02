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
                
                <div class="row form-group" style="display:flex; justify-content: space-between;">

                    <div class="col-md-3">
                        <a href="{{ route('create') }}"><button class="button col-md-12">Create book</button></a>
                    </div>

                    <form action="{{ route('list') }}" method="get" class="col-md-7">

                        @csrf
        
                        <div style="display: flex; flex-direction: row; gap: 10px;">
                            <label>Title:</label>
                            <input id="title" name="title" type="text" class="form-control" style="max-height: 38px;">
                            <button class="button col-md-3" type="submit">Search</button>
                        </div>

                    </form>
                    
                </div>

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
                                <a href="{{ route('edit-book', ['id' => $book->id]) }}" style="color: #57727b; margin-right: 20px;">Edit <i class="fa fa-edit"></i></a>
                                <button data-toggle="modal" data-target="#deleteConfirmationModal-{{ $book->id }}"
                                        style="outline: none; border: none; background: none; cursor: pointer; color: #b7727c">
                                        Delete  <i class="fa fa-trash" style="color: #b7727c"></i></button>
                            </td>
                        </tr>
                        
                        <div class="modal fade" id="deleteConfirmationModal-{{ $book->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                    
                                <div class="modal-content rounded-0">
                    
                                    <div class="modal-header border-0"">
                                        <h1 class="modal-title fs-5" id="deleteConfirmationModalLabel">Confirm deletion</h1>
                                        <button data-dismiss="modal" style="outline: none; border: none; background: none; cursor: pointer;"><i class="fa fa-times" style="color: white; font-size: 24px"></i></button>
                                    </div>
                    
                                    <div class="modal-body">
                                        <span> Do you really wanna delete <strong>{{ $book->title }}</strong>? </span><br>
                                    </div>
                    
                                    <div class="modal-footer border-0"">
                                        <form action="{{ route('delete-book', ['id' => $book->id]) }}" method="post">
                    
                                            @csrf
                                            @method('DELETE')
                    
                                            <button type="submit" class="button button-modal btn btn-primary">Confirm</button>
                                        </form>    
                                    </div>
                    
                                </div>
                    
                            </div>
                        </div>
                        
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $books->appends($filters)->links() }}
            </div>
            
        </div>
    </div>

@endsection