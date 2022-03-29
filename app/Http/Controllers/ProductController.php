<?php

namespace App\Http\Controllers;
use App\Category;
use App\Item;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all()->sortBy("title");
        $categories = Category::all('name', 'id');
        return view('products.index')->with('items', $items)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $categories = Category::all()->sortBy('name');
        return view('products.show')->with('item',$item)->with('categories',$categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    /**
     * Search products by category_id
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($id){
        $items = [];
        if($id != ""){
            $items = Item::all()->where('category_id', $id)->sortByDesc("id");
            //validate if quantity is over 0
            

            $categories = Category::all('name', 'id');
            return view('products.index')->with('items', $items)->with('categories', $categories);
        } else {            
            return redirect('/products');
        }
        
    }
}
