@extends('common') 

@section('pagetitle')
Order List
@endsection

@section('pagename')
Laravel Project
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>All Orders Completed</h1>
		</div>
		<div class="col-md-12">
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table">
				<thead>
					<th>#</th>
					<th>First name</th>
					<th>Last name</th>
					<th>Phone</th>
          <th>Email</th>
					<th></th>
				</thead>
				<tbody>
					@foreach ($orders as $order)
						<tr>
							<th>{{ $order->id }}</th>
							<td>{{ $order->first_name }}</td>
							<td>{{ $order->last_name }}</td>
							<td>{{ $order->phone }}</td>
              <td>{{ $order->email }}</td>
							<td style="width: 175px;">
                <div style='float:left; margin-right:5px;'>
                  <a href="{{ route('itemsSold.receipt', $order->id) }}" class="btn btn-success btn-sm">show</a>
                </div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection