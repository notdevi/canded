<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\user;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $items = item::where('user_id', $id);

        return view('profile.show', compact('items'));
    }

}