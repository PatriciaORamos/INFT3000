<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemsSold;
use App\Models\OrderInfo;
use Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderInfo::all();

        return view('order.index')->with('orders', $orders);
    }

    public function check_order(Request $request)
    {
        $this->validate($request, ['fname'=>'required|string|max:255',
                                   'lname'=>'required|string|max:255',
                                   'phone'=>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:10',
                                   'email'=> 'required|email']);

        $order = new OrderInfo();
        $order->session_id= Session::getId();      
        $order->first_name = $request->fname;
        $order->last_name = $request->lname;          
        $order->phone = intval($request->phone);
        $order->email = $request->email;
   
        $order->save();

        $order = OrderInfo::all()->last();
        if($order->session_id == Session::getId()) {
            return redirect()->route('itemsSold.items_sold', $order->id);
        }        
    }


    public function store()
    {
        

        //Retrieve the order_id. 
        
        //Loop through the cart and move each item into a table called items_sold which contains the item_id, order_id, item_price, and quantity
    }

    public function show($id)
    {
        //(list of items ordered, cost of order, customer details) 
        ///by retrieving the session_id and IP from the browser
    }
}
