@extends('common') 

@section('pagetitle')
Receipt
@endsection

@section('pagename')
Laravel Project
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-12 col-md-offset-2">
			<h1>Receipt</h1>
		</div>
		<div class="col-md-12 col-md-offset-2">
			<hr />
		</div>
	</div>

	<div class="row">
			@foreach ($orders as $order)
				<div class="col-md-8 col-md-offset-2">		
						<p>CUSTOMER: <strong>{{$order->first_name.' '.$order->last_name}} </strong></p>						
					</div>
				<div class="col-md-2">					
					<p>Date: {{(new \DateTime())->format('Y-m-d')}}</p>	
					<p>phone:{{$order->phone}}</p>
					<p>email:{{$order->email}}</p>
					<p>{{$order->session_id}}</p>
			</div>
			@endforeach	
			<div class="col-md-12 col-md-offset-2">
				<hr />
			</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-md-offset-2">
			<table class="table">
				<thead>			
					<th style="width:20%">Title</th>
					<th>Description</th>
					<th>SKU</th>
					<th>Price</th>
					<th>Quantity</th>					
					<th>Subtotal</th>
				</thead>
				<tbody>
				@foreach ($itemsSold as $itemSold)
					<tr>	
						@foreach ($items as $item)
							@if ($itemSold->item_id == $item->id)								
								<th>{{$item->title}}</th>
								<th>{{ strip_tags($item->description) }}</th>
								<th>{{$item->sku}}</th>								
							@endif
						@endforeach
						<th>${{ number_format($itemSold->item_price, 2) }}</th>		
						<th>{{$itemSold->quantity}}</th>
						
						<th>${{ number_format( ($itemSold->quantity * $itemSold->item_price), 2) }}</th>
					</tr>				
				@endforeach
				<tr><th></th><th></th><th></th><th></th><th>COST</th><th><strong>${{ number_format($cost,2)}}</th></tr>			
		</div>		
	</div>

@endsection