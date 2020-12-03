<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Item;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\RedirectController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::paginate(3);
        if(Auth::check() and Auth::User()->is_admin) {
            return redirect()->route('manage');
        }
        else {
            return view('home', compact('items'));
        }
    }
}
