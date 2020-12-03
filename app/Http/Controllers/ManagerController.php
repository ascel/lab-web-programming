<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('home-manage');
    }

    public function showItem() {
        $items = Item::get();
        return view('item-list', compact('items'));
    } 

    public function destroyItem(Item $item) {
        session()->flash("success", "The item was deleted");
        $item->delete();
        return redirect(route('manage.item.list'));
    } 
}
