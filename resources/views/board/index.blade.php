@extends('board.layouts.master')

@section('page_content')

<div class='page-body'>
	<div class="container-xl">
		<div class="row">
			<div class="col-md-6 col-xl-3">
				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="bg-primary text-white avatar">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
										<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
										<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
										<path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
									</svg>
								</span>
							</div>
							<div class="col">
								<div class="font-weight-medium">
									{{ $users_count }} مشرف
								</div>
								<div class="text-muted">
									عدد مشرفى النظام
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3">
				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="bg-primary text-white avatar">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
										<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
										<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
										<path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
									</svg>
								</span>
							</div>
							<div class="col">
								<div class="font-weight-medium">
									{{ $workers_count }} موظف
								</div>
								<div class="text-muted">
									عدد الموظفين للتطبيق
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3">
				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="bg-primary text-white avatar">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-current-location" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
										<path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0"></path>
										<path d="M12 2l0 2"></path>
										<path d="M12 20l0 2"></path>
										<path d="M20 12l2 0"></path>
										<path d="M2 12l2 0"></path>
									</svg>
								</span>
							</div>
							<div class="col">
								<div class="font-weight-medium">
									{{ $areas_count }}
								</div>
								<div class="text-muted">
									عدد المنطاق داخل النظام
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3">
				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="bg-primary text-white avatar">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-current-location" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
										<path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0"></path>
										<path d="M12 2l0 2"></path>
										<path d="M12 20l0 2"></path>
										<path d="M20 12l2 0"></path>
										<path d="M2 12l2 0"></path>
									</svg>
								</span>
							</div>
							<div class="col">
								<div class="font-weight-medium">
									{{ $cities_count }}
								</div>
								<div class="text-muted">
									عدد المدن داخل النظام
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row mt-2">
			<div class="col-md-6 col-xl-3">
				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="bg-primary text-white avatar">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-current-location" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
										<path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0"></path>
										<path d="M12 2l0 2"></path>
										<path d="M12 20l0 2"></path>
										<path d="M20 12l2 0"></path>
										<path d="M2 12l2 0"></path>
									</svg>
								</span>
							</div>
							<div class="col">
								<div class="font-weight-medium">
									{{ $districts_count }}
								</div>
								<div class="text-muted">
									عدد الاحياء داخل النظام
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-6 col-xl-4">
				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="bg-primary text-white avatar">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calculator" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M4 3m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
										<path d="M8 7m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z"></path>
										<path d="M8 14l0 .01"></path>
										<path d="M12 14l0 .01"></path>
										<path d="M16 14l0 .01"></path>
										<path d="M8 17l0 .01"></path>
										<path d="M12 17l0 .01"></path>
										<path d="M16 17l0 .01"></path>
									</svg>
								</span>
							</div>
							<div class="col">
								<div class="font-weight-medium">
									{{ $field_survey_count }}
								</div>
								<div class="text-muted">
									 مهمات قراءه العدادات اليوم
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-4">
				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="bg-primary text-white avatar">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-repeat" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3"></path>
										<path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3 -3l3 -3"></path>
									</svg>
								</span>
							</div>
							<div class="col">
								<div class="font-weight-medium">
									{{ $meter_replacements_count }}
								</div>
								<div class="text-muted">
									 مهمات استبدال العدادات اليوم
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-4">
				<div class="card card-sm">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-auto">
								<span class="bg-primary text-white avatar">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-repeat" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3"></path>
										<path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3 -3l3 -3"></path>
									</svg>
								</span>
							</div>
							<div class="col">
								<div class="font-weight-medium">
									{{ $other_replacements_count }}
								</div>
								<div class="text-muted">
									 مهمات الاستبال الاخرى اليوم
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection