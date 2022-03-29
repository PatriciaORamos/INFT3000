@extends('common') 

@section('pagetitle')
Product List
@endsection

@section('pagename')
Laravel Project
@endsection

@section('scripts')
{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') !!}
@endsection

@section('css')
{!! Html::style('/css/styles.css') !!}
@endsection

@section('content')
<div class="row">
	<div class="col-md-11">
		<h1>Products</h1>
	</div>
	<div class="col-md-1"><a href={{ URL::route('shopping.index') }}><i class="fa fa-shopping-cart"></i> Cart</a>
		
	</div>
	<div class="col-md-12">
		<hr />
	</div>
</div>
<div class="row">
		<div class="col-md-2 block">
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
			@foreach ($items as $item)	
				<div class="col-6 col-md-4 prod">
					<a href={{ route('products.show', $item->id) }}><img src='{{ Storage::url('images/items/tn_'.$item->picture) }}' class="prod-img"></a>
					<div class="prod-box" >
							<a href={{ route('products.show', $item->id) }} class="title">{{ $item->title }}</a>
							<p class="price">${{ number_format($item->price, 2) }}</p>
							<p>
								<form action="{{ route('shopping.store')}}" method="post">
									@csrf
									<input type="hidden" name="item_id" value="{{ $item->id }}" />
									<input type="hidden" name="quantity" value="1" />
									<button type='submit' class='btn btn-primary'>Buy now</button>
								</form>
							</p>
					</div>
				</div>
			@endforeach					
		</div>	
	</div>
</div>
@endsection