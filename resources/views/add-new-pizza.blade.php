@extends('pizza-index')
{{--@section('title', $genre->name.' Catalog')--}}

@section('style')
    @include('style')
@stop

@section('content')
    <div class="container-mid">
        @if (isset($messages) && $messages !== [])
            <div class="alert alert-success" role="alert">
                {{ $messages ? $messages : null }}
            </div>
        @endif

        <h1>Add New Pizza</h1>
        <br>
        <form method="POST" action="{{ url('/pizza/add') }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Pizza Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                    @if ($errors->has('name'))
                        <span class="alert-warning">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Pizza Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price">
                    @if ($errors->has('price'))
                        <span class="alert-warning">{{ $errors->first('price') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Pizza Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description">
                    @if ($errors->has('description'))
                        <span class="alert-warning">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Pizza Image</label>
                <div class="col-sm-10">
                    <div class="img-reset">
                        <input type="file" class="form-control" id="file" name="file">
                        @if ($errors->has('file'))
                            <span class="alert-warning">{{ $errors->first('file') }}</span>
                        @endif
                    </div>
                    <button type="reset" class="btn btn-danger">Reset photo</button>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Pizza</button>
                </div>
            </div>
        </form>
    </div>
@stop
