<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\Category;
use Exception;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Transaction;
use App\TransactionDetail;
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
    public function index(Request $request)
    {
        if(Auth::check() and Auth::User()->is_admin) {
            return redirect()->route('manage');
        }
        else {
            $search = $request->get('search-bar');
            $items = Item::where('name', 'like' , '%'.$search.'%')->orderBy('created_at','DESC')->paginate(3);
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

    public function cart() {
        $cart = CartDetail::where('user_id', Auth::user()->id)->get();
        return view('cart-page', compact('cart'));
    }

    public function cartDelete(CartDetail $cart) {
        $cart->delete();
        session()->flash("success", "The item was deleted from your cart");
        return redirect(route('cart'));
    }

    public function history() {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('history', compact('transactions'));
    }

    public function checkout() {
        $transaction = new Transaction;
        $transaction['user_id'] = Auth::user()->id;
        $transaction->save();
        $items = CartDetail::where('user_id', Auth::user()->id)->get();
        foreach($items as $item) {
            $detail = new TransactionDetail;
            $detail['qty'] = $item->qty;
            $detail['transaction_id'] = $transaction->id;
            $detail['item_id'] = $item->item->id;
            $detail['total_price'] = $item->total_price;
            $detail->save();
        }
        session()->flash("error", "Your cart has been checked out");
        CartDetail::where('user_id', Auth::user()->id)->delete();
        return redirect(route('home'));
    }

    public function transactionDetail($id) {
        $details = Transaction::find($id)->details;
        return view('transaction-detail', compact('details'));
    }
}
