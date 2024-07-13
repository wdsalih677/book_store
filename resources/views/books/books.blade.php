@extends('layouts.master')
@section('title')
قائمة الكتب
@stop
@section('css')
@livewireStyles
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الكتب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الكتب</span>
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
									<h4 class="card-title mg-b-0">قائمة الكتب</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="col-sm-6 col-md-3">
									<button class="btn btn-primary" data-target="#add_book" data-toggle="modal">إضافه</button>
								</div>
								<br>
								@livewire('show-books')
								@include('books.add')
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
@livewireScripts

{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $(".read-more").click(function(e) {
            e.preventDefault();
            $(".full-content").toggle();
        });
    });
</script>
@endsection