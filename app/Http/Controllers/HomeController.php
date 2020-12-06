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
        if(Auth::check() and Auth::User()->is_admin) {
            return redirect()->route('manage');
        }
        else {
            $items = Item::paginate(3);
            return view('home', compact('items'));
        }
    }
    
    public function details($item_id)
    {
        $item = Item::where('id', $item_id)->firstOrFail();
        return view('item-description', compact('item'));
    }

    public function add_to_cart($item_id)
    {
        $item = Item::where('id', $item_id)->firstOrFail();
        return view('item-add-to-cart', compact('item'));
    }
}
