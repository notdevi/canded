@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">

    <h3 style="font-weight: bold;">Shopping Cart</h3>

    <div class="d-flex">
        <div class="card" style="width: 66%;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="width: 34%;
        border-color= red;
        margin-right: 0;
        margin-left: 3%;">

            <h4 style="font-weight: bold; color: red; margin: 20px 20px 20px">Subtotal :</h4>
            <p></p>

            <input style="background-color: red; color: white; font-weight: bold; margin: auto;" 
            class="button btn mb-4" type="button" value="Checkout" href="#">
        </div>
    </div>
</div>
@endsection