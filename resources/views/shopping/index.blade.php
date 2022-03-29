@extends('common') 

@section('pagetitle')
Shopping Cart
@endsection

@section('pagename')
Laravel Project
@endsection

@section('css')
{!! Html::style('/bower_components/parsleyjs/src/parsley.css') !!}
@endsection

@section('scripts')
{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') !!}
{!! Html::script('/bower_components/parsleyjs/dist/parsley.min.js') !!}
	<script>
		$('#post_order').parsley();
	</script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Shopping Cart</h1>
	</div>
	<div class="col-md-12">
		<hr />
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<table class="table">
				<tr>
						<th>Item</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total item</th>
						<th></th>
				</tr>
				<tbody>
					@foreach ($items as $item)		
							<tr>
								{!! Form::model($item, ['route'=> ['shopping.update_cart', $item->id], 'method' => 'PUT']) !!}
									<td><p>{{ $item->title }}</p></td>									
									<td>${{ number_format($item->price, 2) }}</td>
									<td><input type="number" name="quantity" value="{{$item->quantity}}" min="1" /></td>
									<td>${{ number_format(($item->quantity * $item->price), 2) }}</td>
									<td>
										<div style='float:left; margin-right:5px;'>									
													{{ Form::submit('Update', ['class'=> 'btn btn-success btn-sm'])}}										
										</div>
									{!! Form::close() !!}
									<div style="float:left; margin-left:5px">
										{!! Form::open([
																				'route'=> ['shopping.remove_item', $item->id], 
																				'method' => 'DELETE', 
																				'onsubmit' => 'return confirm("Delete product? Are you sure?")'
																		]) !!}
												{{ Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) }}
										{!! Form::close() !!}
									</div>
								</td>							
							</tr>
					@endforeach	
				</tbody>
		</table>
	</div>
	<div class="col-md-4">
		<h2>Order Summary</h2>
		<div>
			{!! Form::open([ 'route'=> ['orders.check_order'], 'method' => 'POST', 'id'=> 'post_order']) !!}
					<p><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }} </p>
					{{ Form::label('fname', 'First Name:', ['style'=>'margin-top:20px']) }}
					{{ Form::text('fname', null, ['class'=>'form-control', 'data-parsley-required'=>'true']) }}
					{{ Form::label('lname', 'Last Name:', ['style'=>'margin-top:20px']) }}
					{{ Form::text('lname', null, ['class'=>'form-control', 'data-parsley-required'=>'true']) }}
					{{ Form::label('phone', 'Phone:', ['style'=>'margin-top:20px']) }}
					{{ Form::number('phone', null,  ['class'=>'form-control', 'data-parsley-required'=>'true', 'data-parsley-length'=>'[10, 10]']) }}
					{{ Form::label('email', 'Email:', ['style'=>'margin-top:20px']) }}
					{{ Form::text('email', null, ['class'=>'form-control', 'type'=>'email', 'data-parsley-type'=>'email', 'data-parsley-required'=>'true']) }}
					{{ Form::submit('Checkout', ['class'=>'btn btn-sm btn-warning']) }}
			{!! Form::close() !!}
			
		</div>
	</div>
</div>
@endsection