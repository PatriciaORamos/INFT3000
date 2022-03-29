<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\Item;
use App\Category;
use Session;

class ShoppingController extends Controller
{

    public function index() 
    {
        $itemsCart = ShoppingCart::all()->where('session_id',Session::getId())->where('ip_address', $_SERVER['REMOTE_ADDR']);
   
        //get item_id to find Item and add in list.
        $items = array();

        $subtotal = 0;

        if($itemsCart != null) {
            $categories = Category::all()->sortBy('name');  

            foreach ($itemsCart as $itemCart) {
                $item = Item::find($itemCart->item_id);
                //quantity is replace by quantity of cart               
                $item->quantity = $itemCart->quantity;
                array_push($items, $item);
                $subtotal = $subtotal + ($item->quantity * $item->price);
            }
            return view('shopping.index')->with('items', $items)->with('subtotal', $subtotal)->with('categories', $categories);
        } 

             
    }

    public function store(Request $request) { 

        $item = Item::find($request->item_id);
        $quantity_storage = $item->quantity;       
        $order_quantity= $request->quantity;

        //validate if existe item in cart
        $existingCart = ShoppingCart::where('item_id',$request->item_id)->where('session_id',Session::getId())->where('ip_address', $_SERVER['REMOTE_ADDR'])->first();
        
        if($existingCart != null) {
            $order_quantity = $existingCart->quantity + $order_quantity;
        }
        
        //validade if order is greater than quantity in storage
        if($order_quantity > $quantity_storage) {
            //in case positive, quantity ordered is equal quantity storage
            $order_quantity = $quantity_storage;
        }

        if ($existingCart == null && $order_quantity > 0){
            $cart = new ShoppingCart();       
            $cart->item_id = $request->item_id;
            $cart->session_id = Session::getId();
            $cart->ip_address = $_SERVER['REMOTE_ADDR'];
            $cart->quantity = $order_quantity;

            $cart->save();

        } else if ($existingCart != null && $order_quantity > 0) {
            $existingCart->quantity = $order_quantity;
            $existingCart->update();
        } else {
            return redirect('/products');
        }
        return redirect()->route('shopping.index');
    }

    public function update_cart(Request $request, $id)
    {
       
        $item = Item::find($id);       
        $quantity_storage = $item->quantity;
        $order_quantity= $request->quantity;        
        if($order_quantity > $quantity_storage) {
            //in case positive, quantity ordered is equal quantity storage
            $order_quantity = $quantity_storage;
        }
        $itemCart = ShoppingCart::all()->where('item_id', $id)->where('session_id', Session::getId())->where('ip_address', $_SERVER['REMOTE_ADDR'])->first();
        $itemCart->quantity = $order_quantity;
        $itemCart->save();

        return redirect()->route('shopping.index');        
    }

    public function remove_item($id)
    {
        $itemCart = ShoppingCart::all()->where('item_id', $id)->where('session_id', Session::getId())->where('ip_address', $_SERVER['REMOTE_ADDR'])->first();
        $itemCart->delete();

        Session::flash('success','The item has been deleted');

        return redirect()->route('shopping.index'); 
    }


}
