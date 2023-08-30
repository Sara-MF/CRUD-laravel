@extends('master')

@section('content')
<div class="content">
    <div class="header-content">
        <h3>Create new book</h3>
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
        <a href="{{ route('list') }}"><button class="button col-md-2">Back to list</button></a>

        <div class="create-form">

            <form action="{{ route('store-book') }}" method="post">

                @csrf

                <div class="row form-group">

                    <div class="col-md-6">
                        <label>Title</label>
                        <input id="title" name="title" class="form-control" type="text" required>
                    </div>

                    <div class="col-md-6">
                        <label>Author</label>
                        <input id="author" name="author" class="form-control" type="text" required>
                    </div>

                </div>

                <div class="form-group">

                    <label>Description</label>
                    <textarea id="description" name="description" class="form-control"></textarea>

                </div>


                <div class="row form-group">

                    <div class="col-md-6">
                        <label>Release Year</label>
                        <select name="release_year" id="release_year" class="form-control">
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Rented</label>
                        <select id="rented_status" name="rented_status" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                
                </div>

                <div style="text-align: center;">
                    <button class="button button-form col-md-3 col-sm-12" type="submit">Create new book</button>
                </div>

            </form>

        </div>
    </div>
</div

@endsection