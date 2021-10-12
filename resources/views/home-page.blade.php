@extends('pizza-index')
{{--@section('title', $genre->name.' Catalog')--}}

@section('style')
    @include('style')
@stop

@section('content')
    <div class="container-mid">
        @if (isset($error_message) && $error_message !== [])
            <div class="alert alert-danger" role="alert">
                {{ $error_message ? $error_message : null }}
            </div>
        @endif

        @if (isset($messages) && $messages !== [])
            <div class="alert alert-success" role="alert">
                {{ $messages ? $messages : null }}
            </div>
        @endif

        <h1>Our freshly made pizza!</h1>
        <hr>

        <div class="home-page">
            <h3 class="order">Order It Now!</h3>

            <div class="row">
                <button type="button" class="btn btn-dark">Add Pizza</button>
            </div>

            <form action="{{route('pizza.search')}}" method="post">
                @csrf
                {{method_field('post')}}
                <div class="form-group row">
                    <label for="search" class="col-sm-2 col-form-label">Search Pizza : </label>
                    <div class="col-sm-10">
                        <div class="search">
                            <input type="text" class="form-control" id="search" name="search">
                        </div>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>

            <div class="form-group row">
                @if(isset($pizzas))
                    @foreach($pizzas as $pizza)
                        <div class="pizza-list">
                            <img class="pizza-img" src="{{ asset('storage/images/'.$pizza->photo) }}" alt="{{$pizza->name}}">
{{--                            <img class="pizza-img" alt="pizza" src="{{$pizza->photo}}"/>--}}
                            <div class="pizza-info">
                                {{$pizza->name}}
                            </div>
                            <div class="pizza-info">
                                Rp. {{$pizza->price}}
                            </div>

                            <form action="{{route('pizza.delete', [$pizza->id])}}" method="post">
                                @csrf
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@stop
