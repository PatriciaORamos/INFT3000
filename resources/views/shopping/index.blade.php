@extends('common') 

@section('pagetitle')
Item List
@endsection

@section('pagename')
Laravel Project
@endsection

@section('scripts')
{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') !!}
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Cart</h1>
	</div>
	<div class="col-md-12">
		<hr />
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<table class="table table-striped">
				<tr>
						<th>Title</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Subtotal</th>
						<th></th>
				</tr>
				<tbody>
					@foreach ($items as $item)		
							<tr>
								{!! Form::model($item, ['route'=> ['shopping.destroy', $item->id], 'method' => 'PUT']) !!}
									<td><p>{{ $item->title }}</p></td>
									<td><input type="number" name="quantity" value="{{$item->quantity}}" min="1" /></td>
									<td>{{$item->price}}</td>
									<td>{{($item->quantity * $item->price)}}</td>
									<td>
										<div style='float:left; margin-right:5px;'>									
													{{ Form::submit('Update', ['class'=> 'btn btn-success btn-sm'])}}										
										</div>
									{!! Form::close() !!}
									<div style="float:left; margin-left:5px">
										{!! Form::open([
																				'route'=> ['shopping.destroy', $item->id], 
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
</div>	

@endsection