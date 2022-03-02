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
	<div class="col-md-11">
		<h1>Products</h1>
	</div>
	<div class="col-md-1"><a href={{ URL::route('shopping.index') }}><i class="fa fa-shopping-cart"></i> Cart (0)</a>
		
	</div>
	<div class="col-md-12">
		<hr />
	</div>
</div>
		<div class="col-md-4">
			<table>
					<tr>
							<th>CATEGORIES</th>
					</tr>
					<tr><td ><a href={{ URL::route('products.index') }}>All Categories</a></td></tr>
						@foreach ($categories as $category)
								<tr><td ><a href={{ route('products.search', $category->id) }}>{{$category->name}}</a></td></tr>
						@endforeach 
			</table>
		</div>
		<div class="col-md-8">
				<table class="table table-striped">
					  <tr>
						 		<th>Image</th>
								<th>Title</th>
								<th>Price</th>
								<th></th>
						</tr>
						<tbody>
							@foreach ($items as $item)				
								<tr>
									<td><a href={{ route('products.show', $item->id) }}><img src='{{ Storage::url('images/items/tn_'.$item->picture) }}'></a></td>
									<td><a href={{ route('products.show', $item->id) }}>{{ $item->title }}</a></td>
									<td>${{ number_format($item->price) }}</td>
									<td>
										<form action="{{ route('shopping.store')}}" method="post">
											@csrf
											<input type="hidden" name="item_id" value="{{ $item->id }}" />
											<input type="hidden" name="quantity" value="1" />
											<button type='submit' class='btn btn-primary'>Buy now</button>
										</form>
									</td>								
								</tr>
							@endforeach	
						</tbody>
				</table>
		</div>	
	</div>


@endsection