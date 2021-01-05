@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4 mb-4" style="
    background-color: #ffffff;
    padding: 2rem 1rem 2rem 1rem;
    box-shadow: 0 0 5px 5px rgba(0,0,0,.05);
    opacity: 0.95;">

        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
              </nav>
        </div>

        <div class="col-md-12">
            <h4 style="font-weight: bold;">Shopping Cart</h4>
        </div>
        
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    @foreach($transaction_details as $pesanan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        
                        <?php $nama = \App\item::where('id', $pesanan->item_id)->first(); ?>
                        <td>{{ $nama->item_name }}</td>

                        <td>{{ number_format($pesanan->amount) }}</td>
                        <td>Rp {{ number_format($nama->price) }}</td>
                        <td>Rp {{ number_format($pesanan->amount_price) }}</td>
                        
                        <td>
                            <form action="{{ url('cart') }}/{{ $pesanan->id }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-12 d-flex">
            <h5 class="mr-4" style="font-weight: bold;">Total Harga: </h5>
            <h5>Rp {{ number_format($transaction->total_price) }}</h5>
        </div>
        
    </div>
</div>
@endsection