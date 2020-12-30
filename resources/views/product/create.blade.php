@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="container rounded bg-s mt-5 text-dark">
        <div class="row text-dark">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul >
                    @foreach ($errors->all() as $error)
                        <li style = "list-style-type: none; text-align:right; padding-bottom:5px"><strong>{{$error}}</strong></li>
                    @endforeach
                </ul>
                </div>                  
            @endif
            <form method="POST" action="/product/store">
                @csrf
                <article class="card-body p-5">
                    <div class=""><label class="labels"><b>Product Name</b> </label><input type="text" class="form-control" placeholder="Product Name" name="name" value="{{ old('item_name') }}" required autofocus autocomplete="name"></div>
                    <div class=""><label class="labels"><b>Price </b> </label><input type="text" class="form-control" placeholder="Price" name="price" value="{{ old('price') }}" required autofocus autocomplete="price"></div>
                    <div class="form-group">
                        <b>Description </b>
                        <textarea class="form-control" id="pertanyaan" name="description" rows="5" value="{{ old('description') }}" required autofocus autocomplete="description" placeholder="Description"></textarea>
                    </div>
                    <div class=""><label class="labels"><b>Stock</b> </label><input type="text" class="form-control" placeholder="Stock" name="stock" value="{{ old('stock') }}" required autofocus autocomplete="stock"></div>
                        <div class="row mt-3 justify-content-center">
                            <div class="mt-5 text-center mr-2"><button type="submit" class="btn btn-warning">Confirm</button></div>
                            <div class="mt-5 text-center"><a button class="btn btn-danger" type="button" href="{{route('home')}}">Cancel</button></a></div>
                        </div>
                    </div>
                </article>
            </form>
            </div>
            </div>
        </div> <!-- card.// -->
    </div>
</div>
<!--container.//-->

@endsection 