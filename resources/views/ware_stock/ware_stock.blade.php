@extends('layouts.master')
@section('title')
مخزون المستودعات
@endsection
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستودعات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ مخزون المستودعات</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">محزون المستودعات</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="col-sm-6 col-md-3">
									@can('إضافة مخزون')
										<button class="btn btn-primary" data-target="#add_stock" data-toggle="modal">إضافه</button>
									@endcan
								</div>
								<br><br>
								<div class="table-responsive">
									<table class="table text-md-nowrap text-center" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم المستودع</th>
												<th class="wd-20p border-bottom-0">اسم الكتب</th>
												<th class="wd-20p border-bottom-0">الكميه</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>	
											@foreach ( $ware_stocks as $ware_stock )
												<tr>
													<td>{{ $loop->index +1 }}</td>
													<td>{{ $ware_stock->warehouses->name }}</td>
													<td>{{ $ware_stock->books->title }}</td>
													<td>{{ $ware_stock->quantity }}</td>
													<td>
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary" data-toggle="dropdown" id="dropdownMenuButton" type="button">العمليات <i class="fas fa-caret-down ml-1"></i></button>
															<div  class="dropdown-menu tx-13">
																@can('تعديل مخزون')
																	<button class="dropdown-item" data-target="#edit_stock{{ $ware_stock->id }}" data-toggle="modal" > <i class="fa fa-edit text-primary float-left"></i> تعديل </button>
																@endcan
																@can('حذف مخزون')
																	<button class="dropdown-item" data-target="#delete_stock{{ $ware_stock->id }}" data-toggle="modal"> <i class="fa fa-trash text-danger float-left"></i>  حدف </button>
																@endcan
															</div>
														</div>
													</td>
												</tr>
												@include('ware_stock.edit')
												@include('ware_stock.delete')
											@endforeach
										</tbody>
									</table>
									@include('ware_stock.add')
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
{{-- <script>
$(document).ready(function() {
    $('#js-example-basic-multiple').select2();
});
</script> --}}
<script>
	$(document).ready(function () {
		$('select[name="category_id"]').on('change', function () {
			var category_id = $(this).val();
			if (category_id) {
				$.ajax({
					url: "{{ URL::to('getBooks') }}/" + category_id,
					type: "GET",
					dataType: "json",
					success: function (data) {
						$('select[name="book_id"]').empty();
						$.each(data, function (key, value) {
							$('select[name="book_id"]').append('<option value="' + key + '">' + value + '</option>');
						});
					},
				});
			} else {
				console.log('AJAX load did not work');
			}
		});
	});

</script>
@endsection