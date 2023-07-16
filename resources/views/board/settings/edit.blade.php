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
					الاعدادات
				</h2>
			</div>
		</div>
	</div>
</div>
<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<div class="col-md-12">
				<form class="card" method='POST' action='{{ route('board.settings.update') }}' >
					@csrf
					@method('PATCH')
					<div class="card-header bg-primary">
						<h3 class="card-title text-white"> تعديل الاعدادات </h3>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<label class="form-label required"> رقم التواصل </label>
							<div>
								<input type="text" class="form-control @error('mobile') is-invalid @enderror " name='mobile' value="{{ $settings->mobile }}" >
								@error('mobile')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label required"> رقم whatsApp </label>
							<div>
								<input type="text" class="form-control @error('whatsapp') is-invalid @enderror " name='whatsapp' value="{{ $settings->whatsapp }}" >
								@error('whatsapp')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> البريد الاكترونى </label>
							<div>
								<input type="email" class="form-control @error('email') is-invalid @enderror " name='email' value="{{ $settings->email }}" >
								@error('email')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label required"> اسم الموقع بالعربيه </label>
							<div>
								<input type="text" class="form-control @error('site_name_ar') is-invalid @enderror " name='site_name_ar' value="{{ $settings->getTranslation('site_name' , 'ar') }}" >
								@error('site_name_ar')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> اسم الموقع بالانجليزيه </label>
							<div>
								<input type="text" class="form-control @error('site_name_en') is-invalid @enderror " name='site_name_en' value="{{ $settings->getTranslation('site_name' , 'en') }}" >
								@error('site_name_en')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> عنوان المقر بالعربيه </label>
							<div>
								<input type="text" class="form-control @error('address_ar') is-invalid @enderror " name='address_ar' value="{{ $settings->getTranslation('address' , 'ar') }}" >
								@error('address_ar')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> عنوان المقر بالانجليزيه </label>
							<div>
								<input type="text" class="form-control @error('address_en') is-invalid @enderror " name='address_en' value="{{ $settings->getTranslation('address' , 'en') }}" >
								@error('address_en')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>


						<div class="mb-3">
							<label class="form-label required"> مواعيد العمل بالعربيه </label>
							<div>
								<input type="text" class="form-control @error('working_hours_ar') is-invalid @enderror " name='working_hours_ar' value="{{ $settings->getTranslation('working_hours' , 'ar') }}" >
								@error('working_hours_ar')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> مواعيد العمل بالانجليزيه </label>
							<div>
								<input type="text" class="form-control @error('working_hours_en') is-invalid @enderror " name='working_hours_en' value="{{ $settings->getTranslation('working_hours' , 'en') }}" >
								@error('working_hours_en')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> facebook </label>
							<div>
								<input type="text" class="form-control @error('facebook') is-invalid @enderror " name='facebook' value="{{ $settings->facebook }}" >
								@error('facebook')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>


						<div class="mb-3">
							<label class="form-label required"> twitter </label>
							<div>
								<input type="text" class="form-control @error('twitter') is-invalid @enderror " name='twitter' value="{{ $settings->twitter }}" >
								@error('twitter')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>


						<div class="mb-3">
							<label class="form-label required"> instagram </label>
							<div>
								<input type="text" class="form-control @error('instagram') is-invalid @enderror " name='instagram' value="{{ $settings->instagram }}" >
								@error('instagram')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> youtube </label>
							<div>
								<input type="text" class="form-control @error('youtube') is-invalid @enderror " name='youtube' value="{{ $settings->youtube }}" >
								@error('youtube')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>


						<div class="mb-3">
							<label class="form-label required"> Snap Chat </label>
							<div>
								<input type="text" class="form-control @error('snap_chat') is-invalid @enderror " name='snap_chat' value="{{ $settings->snap_chat }}" >
								@error('snap_chat')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> Tik Tok </label>
							<div>
								<input type="text" class="form-control @error('tiktok') is-invalid @enderror " name='tiktok' value="{{ $settings->tiktok }}" >
								@error('tiktok')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>


						<div class="mb-3">
							<label class="form-label required"> Messenger </label>
							<div>
								<input type="text" class="form-control @error('messenger') is-invalid @enderror " name='messenger' value="{{ $settings->messenger }}" >
								@error('messenger')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>





					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.services.index') }}" class="btn btn-link"> تراجع </a>
							<button type="submit" class="btn btn-primary ms-auto">تعديل</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('board_assets/dist/libs/tinymce/tinymce.min.js?1684106062') }}" defer></script>

<script>
      // @formatter:off
	document.addEventListener("DOMContentLoaded", function () {
		let options = {
			selector: '#tinymce-mytextarea',
			height: 300,
			menubar: false,
			statusbar: false,
			directionality : 'rtl' , 
			language: 'ar' ,
			plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table paste code help wordcount'
				],
			toolbar: 'undo redo | formatselect | ' +
			'bold italic backcolor | alignleft aligncenter ' +
			'alignright alignjustify | bullist numlist outdent indent | ' +
			'removeformat',
			content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
		}
		if (localStorage.getItem("tablerTheme") === 'dark') {
			options.skin = 'oxide-dark';
			options.content_css = 'dark';
		}
		tinyMCE.init(options);
	})
      // @formatter:on
</script>
@endsection