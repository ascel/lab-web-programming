<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function newItem() {
        $categories = Category::get();
        return view('item-new', compact('categories'));
    } 

    public function storeItem(Request $request) {
        $item = $request->all();
        $thumbnail = request()->file('image');
        $item['imageUrl'] = $thumbnail->storeAs("src/images", "{time()}.{$thumbnail->extension()}");
        Item::create($item);
        session()->flash("success", "The item was successfully added to the server");
        return redirect()->to(route('manage.item.list'));
    } 

    public function destroyItem(Item $item) {
        session()->flash("success", "The item was deleted");
        $item->delete();
        return redirect(route('manage.item.list'));
    } 

    public function showCategory() {
        $categories = Category::get();
        return view('category-list', compact('categories'));
    }

    public function newCategory() {
        return view('category-new');
    } 

    public function storeCategory(Request $request) {
        $category = $request->all();
        Category::create($category);
        session()->flash("success", "The category was successfully added to the server");
        return redirect()->to(route('manage.category.list'));
    } 

}
