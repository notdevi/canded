@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4 mb-3">
        @foreach ($items as $item)
        <div class="thumbnail ml-3 mr-3 mb-2">
            <img src="{{ url('assets') }}/{{ $item->picture }}" alt="..." class="">
            <a href="{{ url('detail') }}/{{ $item->id }}" class="">
                <div class="caption">
                    <h4 style="font-weight: bold; color: #000000">Rp {{ number_format($item->price) }}</h4>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
