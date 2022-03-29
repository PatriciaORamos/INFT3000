<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Models\ItemsSold;
use App\Models\OrderInfo;
use App\ShoppingCart;
use Session;

class ItemSoldController extends Controller
{

    public function items_sold($order_id) 
    {
        $items_card = ShoppingCart::all()->where('session_id', Session::getId());  
        foreach($items_card as $item_card) {
            $item_sold = new ItemsSold();
            $item_sold->order_id = $order_id;        
            $item = Item::find($item_card->item_id);
            $item_sold->item_id = $item_card->item_id;
            $item_sold->item_price = $item->price;
            $item_sold->quantity = $item_card->quantity;

            $item_sold->save();

            //update quantity in entity Item
            $item->quantity = $item->quantity - $item_card->quantity;
            $item->save();

            //update shopping cart to no show more items sold for user with the same session_id and IP_address
            $item_card->delete();
            
        }
        return redirect()->route('itemsSold.receipt', $order_id);
    }

    public function receipt($order_id){   
        $itemsSold = ItemsSold::all()->where('order_id', $order_id);
            
        //customer details
        $orders = OrderInfo::all()->where('id', $order_id);

        
        //cost of order
        $cost = 0;
        //item details (title, sku)
        $items = array();
        foreach( $itemsSold as $itemSold ){
            $id =  $itemSold->item_id;   
            $item = Item::find($id);
            array_push($items, $item);

            $cost = $cost + ($itemSold->quantity * $itemSold->item_price);       
        }

        $key = Session::getId();
        Session::forget($key);
        return view('thankyou')->with('itemsSold', $itemsSold)->with('orders',$orders)->with('items', $items)->with('cost', $cost);
    }
}
