@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					عرض تفاصيل
				</div>
				<h2 class="page-title">
					 استبدال اخرى 
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">

					<a href="{{ route('board.other_replacements.index') }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
							<path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
							<path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
						</svg>
						عرض كافه مهمات  استبدال العدادات
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-responsive table-bordered">
							<tbody>
								<tr>
									<th> تاريخ الاضافه </th>
									<td> {{ $other_replacement->created_at }} <span class="text-muted"> {{ $other_replacement->created_at->diffForHumans() }} </span> </td>
								</tr>
								<tr>
									<th> حاله المهمه </th>
									<td>
									@switch($other_replacement->status)
										@case(1)
										<span  class='badge bg-blue' > تم </span>
										@break
										@case(2)
										<span  class='badge bg-blue' > تم الالغاء </span>
										@break
										@endswitch
									</td>
								</tr>
								<tr>
									<th> تم الاضافه بواسطه </th>
									<td> {{ $other_replacement->user?->name }}  </td>
								</tr>
								<tr>
									<th> الحى </th>
									<td> {{ $other_replacement->district?->name }}  </td>
								</tr>
								<tr>
									<th> رقم القطعه </th>
									<td> {{ $other_replacement->segment_number }} </td>
								</tr>

								<tr>
									<th> رقم العداد الحالى </th>
									<td> {{ $other_replacement->current_meter_number }} </td>
								</tr>
								<tr>
									<th> قراءه العداد الحالى </th>
								<td> {{ $other_replacement->current_meter_read }} </td>
								</tr>

								<tr>
									<th> ملاحظات </th>
									<td> {{ $other_replacement->comments }} </td>
								</tr>
								<tr>
									<th> خط طول </th>
									<td> {{ $other_replacement->longitude }} </td>
								</tr>
								<tr>
									<th> خط عرض </th>
									<td> {{ $other_replacement->latitude }} </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"> ملفات الاستبدال </h3>
						<div class="card-actions">
							<a href="{{ route('board.other_replacements.download' , $other_replacement ) }}" class="btn btn-primary">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4"></path>
									<path d="M12 13l0 9"></path>
									<path d="M9 19l3 3l3 -3"></path>
								</svg>
								تحميل 
							</a>
						</div>
					</div>
					<div class="card-body">
						<div id="carousel-indicators-thumb" class="carousel slide carousel-fade" data-bs-ride="carousel">
							<div class="carousel-indicators carousel-indicators-thumb">
								@php
								$i = 0;
								@endphp

								@foreach ($other_replacement->files as $file)
								<button type="button" data-bs-target="#carousel-indicators-thumb" data-bs-slide-to="{{ $i }}" class=" ratio ratio-4x3 active" style="background-image: url({{ Storage::url('other_replacements/'.$file->file) }})"></button>
								@php
								$i++;
								@endphp
								@endforeach


							</div>
							<div class="carousel-inner">
								@php
								$i = 0;
								@endphp
								@foreach ($other_replacement->files as $file)
								<div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
									<img class="d-block w-100" alt="" src="{{ Storage::url('other_replacements/'.$file->file) }}">
								</div>
								@php
								$i++;
								@endphp
								@endforeach

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection