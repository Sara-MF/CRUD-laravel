@extends('master')

@section('content')

    <div class="content">
        <div class="header-content">
            <h3>List of books</h3>
        </div>

        <div class="body-content">
            <a href="{{ route('create') }}"><button class="create-button col-md-2">Create book</button></a>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Rented</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Title</th>
                        <td>Author</td>
                        <td>Rented</td>
                        <td>Actions</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection