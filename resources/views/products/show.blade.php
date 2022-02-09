@extends('common') 

@section('pagetitle')
Item List
@endsection

@section('pagename')
Laravel Project
@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Details</h1>
	</div>
	<div class="col-md-12">
		<hr />
	</div>
</div>

	<div class="row">
			<div class="col-md-6">          
				<img src="{{ Storage::url('images/items/lrg_'.$item->picture) }}" >
			</div>
			<div class="col-md-6">
					<h2>{{$item->title}}</h2>
					<h4 style="color: rgb(0, 157, 255);"><strong>${{$item->price}}</strong></h4>
					<p style="color:rgb(99, 100, 101)" >{{strip_tags($item->description)}}</p>
					<p style="color:rgb(99, 100, 101)">id: {{$item->id}}</p>
					<p style="color:rgb(99, 100, 101)">sku: {{$item->sku}}</p>
					<p style="color:rgb(99, 100, 101)">quantidade: {{$item->quantity}}</p>
					<p style="color:rgb(99, 100, 101)">category: {{$item->category_id}}</p>          
			</div>
	</div>

@endsection