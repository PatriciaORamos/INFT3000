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
		<h1>Products</h1>
	</div>
	<div class="col-md-12">
		<hr />
	</div>
</div>
		<div class="col-md-4">
			{{-- <form action="{{ route('products.search') }}" method="POST">
				@csrf
				<input type="text" name="search" placeholder="Filtrar:">
				<button type="submit">Filtrar</button>
			</form> --}}
			<table>
					<tr>
							<th>Category</th>
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
									<td>{{ $item->price }}</td>
									<td><button type='button' class='btn btn-info'>Buy Now</button></td>
								</tr>
							@endforeach	
						</tbody>
				</table>
		</div>	
	</div>


@endsection