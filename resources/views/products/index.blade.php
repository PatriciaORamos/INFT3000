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
		<h1>Products</h1>
	</div>
	<div class="col-md-12">
		<hr />
	</div>
</div>

	<div class="row">
		<div class="col-md-4">
			<table>
				<tr>
					<th>Category</th>
				</tr>
				<tr>
					<td>Sofa</td>
				</tr>
				<tr>
					<td>Lighting</td>
				</tr>
			</table>
		</div>
		<div class="col-md-8">
			<table class="table">
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Price</th>
					<th></th>
				</tr>
				<tr>
					<td><a href="{{ route('products.show', 1) }}"><img src="https://cdn-images.article.com/products/SKU419/2890x1500/image60553.jpg?fit=max&w=100&q=40%202x" alt="Girl in a jacket"></a></td>
					<td><a href="{{ route('products.show', 1) }}">Sofa</a></td>
					<td>150.00</td>
					<td><button type="button" class="btn btn-info">Buy Now</button></td>
				</tr>
			</table>
		</div>
	</div>

@endsection