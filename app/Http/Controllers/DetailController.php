<?php

namespace App\Http\Controllers;
use App\item;
use App\transaction;
use App\transaction_details;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $item = item::where('id', $id)->first();

        return view('detail.index', compact('item'));
    }

    public function detail(Request $request, $id)
    {
        $item = item::where('id', $id)->first();
        $tanggal = Carbon::now();

        if($request->order_qty > $item->stock)
        {
            return redirect('detail/', $id);
        }

        $cek_transaction = transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(empty($cek_transaction))
        {
            $transaction = new transaction;
            $transaction->user_id = Auth::user()->id;
            $transaction->tanggal = $tanggal;
            $transaction->status = 0;
            $transaction->total_price = 0;
            $transaction->save();
        }

        $new_transaction = transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $cek_transaction_detail = transaction_details::where('item_id', $item->id)->where('transaction_id', $new_transaction->id)->first();

        if(empty($cek_transaction_detail))
        {
            $transaction_details = new transaction_details;
            $transaction_details->item_id = $item->id;
            $transaction_details->transaction_id = $new_transaction->id;
            $transaction_details->amount = $request->order_qty;
            $transaction_details->amount_price = $item->price*$request->order_qty;
            $transaction_details->save();
        } else {
            $transaction_details = transaction_details::where('item_id', $item->id)->where('transaction_id', $new_transaction->id)->first();
            $transaction_details->amount = $transaction_details->amount+$request->order_qty;
            $new_price_transaction_details =  $item->price*$request->order_qty;
            $transaction_details->amount_price = $item->price*$request->order_qty+$new_price_transaction_details;
            $transaction_details->update();
        }

        $transaction = transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $transaction->total_price = $transaction->total_price+$item->price*$request->order_qty;
        $transaction->update();

        return redirect('home');
    }

    public function cart()
    {
        $transaction = transaction::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $transaaction_details = [];
        if(!empty($transaction))
        {
            $transaction_details = transaction_details::where('transaction_id', $transaction->id)->get();

        }
        
        return view('cart', compact('transaction', 'transaction_details'));
    }

    public function delete($id)
    {
        $transaction_details = transaction_details::where('id', $id)->first();

        $transaction = transaction::where('id', $transaction_details->transaction_id)->first();
        $transaction->total_price = $transaction->total_price-$transaction_details->amount_price;
        $transaction->update();


        $transaction_details->delete();

        Alert::error('Pesanan Sukses Dihapus', 'Hapus');
        return redirect('cart');
    }
}
