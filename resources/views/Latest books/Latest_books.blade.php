@extends('layouts.master')
@section('title')
قائمة أحدث الكتب
@stop
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المتجر</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة أحدث الكتب</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
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
									<h4 class="card-title mg-b-0">قائمة أحدث الكتب</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="col-sm-6 col-md-3">
									@can('إضافة أحدث كتاب')	
										<button class="btn btn-primary" data-target="#add_Latest_books" data-toggle="modal">إضافه</button>
									@endcan
								</div>
								<br><br>
								<div class="table-responsive">
									<table class="table text-md-nowrap text-center" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم الكتاب</th>
												<th class="wd-20p border-bottom-0">السعر العرض</th>
												<th class="wd-20p border-bottom-0">إظهار العرض</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ( $latest_books as $latest_book )
												<tr>
													<td>{{ $loop->index +1 }}</td>
													<td>{{ $latest_book->books->title }}</td>
													<td>{{ $latest_book->offer_price }}</td>
													<td>
														<div class="form-check form-switch">
															<input type="checkbox" data-toggle="switchbutton" checked data-size="xs" onchange="toggleBook({{ $latest_book->id }})">
														</div>
													</td>
													<td>
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary" data-toggle="dropdown" id="dropdownMenuButton" type="button">العمليات <i class="fas fa-caret-down ml-1"></i></button>
															<div  class="dropdown-menu tx-13">
																@can('تعديل أحدث كتاب')
																	<button class="dropdown-item" data-target="#edit_Latest_books{{ $latest_book->id }}" data-toggle="modal" > <i class="fa fa-edit text-primary float-left"></i> تعديل </button>
																@endcan
																@can('حذف أحدث كتاب')
																	<button class="dropdown-item" data-target="#delete_Latest_books{{ $latest_book->id }}" data-toggle="modal"> <i class="fa fa-trash text-danger float-left"></i>  حدف </button>
																@endcan
															</div>
														</div>
													</td>
												</tr>
												@include('Latest books.delete')
												@include('Latest books.edit')
											@endforeach
										</tbody>
									</table>
									@include('Latest books.add')
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
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
<script>
	<script>
    function toggleBook(bookId) {
        var row = document.getElementById('book-row-' + bookId);
        if (row.style.display === 'none') {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
</script>
</script>
@endsection