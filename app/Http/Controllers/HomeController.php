<?php

namespace App\Http\Controllers;

use App\CartDetail;
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

    public function storeCart($item_id, Request $request) {
        $item = Item::where('id', $item_id)->firstOrFail();
        $qty = $request->all()['qty'];

        if(CartDetail::where('user_id', Auth::user()->id)->where('item_id', $item_id)->exists()) {
            CartDetail::where('user_id', Auth::user()->id)->where('item_id', $item_id)->update([
                'qty' => $qty,
                'total_price' => $qty * $item->price,
            ]);
            session()->flash("success", "The item in your cart was successfully updated");
        }
        else {
            $item_cart = new CartDetail;
            $item_cart['item_id'] = $item->id;
            $item_cart['user_id'] = Auth::user()->id;
            $item_cart['qty'] = $qty;
            $item_cart['total_price'] = $qty * $item->price;

            $item_cart->save();
            session()->flash("success", "The item was successfully added to your cart");
        }

        return redirect()->to(route('home'));
    }
}
