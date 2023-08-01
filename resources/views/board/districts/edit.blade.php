@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					تعديل
				</div>
				<h2 class="page-title">
					الاحياء
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">

					<a href="{{ route('board.districts.index') }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M9.442 9.432a3 3 0 0 0 4.113 4.134m1.445 -2.566a3 3 0 0 0 -3 -3"></path>
							<path d="M17.152 17.162l-3.738 3.738a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 0 1 -.476 -10.794m2.18 -1.82a8.003 8.003 0 0 1 10.91 10.912"></path>
							<path d="M3 3l18 18"></path>
						</svg>
						عرض كافه الاحياء
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
				<form class="card" method='POST' action='{{ route('board.districts.update' , $district ) }}' >
					@csrf
					@method('PATCH')
					<div class="card-header bg-primary">
						<h3 class="card-title text-white"> تعديل بينات المدينه  </h3>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<label class="form-label required"> المدينه </label>
							<div>
								<select name="city_id" class='form-control form-select' id="">
									@foreach ($cities as $city)
										<option value="{{ $city->id }}" {{ $district->city_id == $city->id ? 'selected="selected"' : '' }} > {{ $city->name }} </option>
									@endforeach
								</select>
								@error('name')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label required"> اسم الحاى </label>
							<div>
								<input type="text" class="form-control @error('name') is-invalid @enderror " name='name' value="{{ $district->name }}" >
								@error('name')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label"> خصائص </label>
							<div>
								<label class="form-check">
									<input class="form-check-input" name='active' type="checkbox" {{ $district->is_active == 1 ? 'checked' : '' }}>
									<span class="form-check-label"> فعال </span>
								</label>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.cities.index') }}" class="btn btn-link"> تراجع </a>
							<button type="submit" class="btn btn-primary ms-auto"> تعديل </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection