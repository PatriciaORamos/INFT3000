@extends('common') 

@section('pagetitle')
Receipt
@endsection

@section('pagename')
Laravel Project
@endsection

@section('css')
{!! Html::style('/css/styleRec.css') !!}
@endsection

@section('content')

<div class="container">
	<div class="invoice">
		<div class="invoice-company text-inverse f-w-600">
				CAPSTONE - IT Web Programming
		</div>
		<div class="invoice-header">
			<div class="invoice-from">
				<small>from</small>
				<address class="m-t-5 m-b-5">
					<strong class="text-inverse">Capstone</strong><br>
					Nova Scotia - CA<br>
				</address>
			</div>
			@foreach ($orders as $order)
			<div class="invoice-to">
				<small>to</small>							
				<address class="m-t-5 m-b-5">								
						<strong class="text-inverse">{{$order->first_name.' '.$order->last_name}}</strong><br>
						Phone: {{$order->phone}}<br>
						Email: {{$order->email}}
				</address>								
			</div>
			<div class="invoice-date">
				<small>Invoice</small>
				<div class="date text-inverse m-t-5">{{ date('d-m-Y', $order->updated_at->timestamp) }}</div>
				<div class="invoice-detail">
					{{$order->session_id}}<br>
				</div>
			</div>
			@endforeach
		</div>	
	</div>		
	<div class="invoice-content">
		<div class="table-responsive">
			 
			<table class="table table-invoice">
				<thead>
					<tr>
						<th scope="col">Title</th>
						<th scope="col">Description</th>
						<th scope="col">SKU</th>
						<th scope="col">Price</th>
						<th scope="col">Quantity</th>
						<th scope="col">Subtotal</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($itemsSold as $itemSold)
					<tr>
						@foreach ($items as $item)
								@if ($itemSold->item_id == $item->id)		
									<th scope="row">{{$item->title}}</th>
									<td>{{ strip_tags($item->description) }}</td>
									<td>{{$item->sku}}</td>
								@endif
						@endforeach								
						<td>${{ number_format($itemSold->item_price, 2) }}</td>
						<td>{{$itemSold->quantity}}</td>										
						<td>${{ number_format( ($itemSold->quantity * $itemSold->item_price), 2) }}</td>							
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="invoice-price">
			<div class="invoice-price-left">
			</div>
			<div class="invoice-price-right">
				 <small>TOTAL</small> <span class="f-w-600">${{ number_format($cost,2)}}</span>
			</div>
	 </div>
	</div>		
</div>
@endsection