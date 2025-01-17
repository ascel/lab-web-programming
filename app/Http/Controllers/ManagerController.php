<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Contracts\Service\Attribute\Required;

class ManagerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
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

        $this->validate($request, [
            'name' => 'required|unique:App\Item,name',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'integer|gte:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|file|max:10000'
        ]);

        $item = $request->all();
        $thumbnail = request()->file('image');
        $time = time();
        $item['imageUrl'] = $thumbnail->storeAs("src/images", "{$time}.{$thumbnail->extension()}");
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
        $products = NULL;
        return view('category-list', compact('categories', 'products'));
    }

    public function newCategory() {
        return view('category-new');
    } 

    public function storeCategory(Request $request) {

        $this->validate($request, [
            'name' => 'required|unique:App\Category,name'
        ]);

        $category = $request->all();
        Category::create($category);
        session()->flash("success", "The category was successfully added to the server");
        return redirect()->to(route('manage.category.list'));
    } 

    public function showCategorySpecific($category_id) {
        $categories = Category::get();
        Category::where('id', $category_id)->firstOrFail();
        $products = Category::find($category_id)->items;
        return view('category-list', compact('categories', 'products'));
    }

}
