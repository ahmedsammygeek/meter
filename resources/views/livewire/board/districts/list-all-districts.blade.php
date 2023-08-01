<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row  align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        عرض
                    </div>
                    <h2 class="page-title">
                        الاحياء
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a class="btn btn-primary d-none d-sm-inline-block" type="button" data-bs-toggle="collapse" data-bs-target="#fillters" aria-expanded="true" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 20l-3 1v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v3"></path>
                                <path d="M19 16v6"></path>
                                <path d="M22 19l-3 3l-3 -3"></path>
                            </svg>                       
                        </a>
                        <a href="{{ route('board.districts.create') }}" class="btn btn-primary d-none d-sm-inline-block" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            إضافه حى جديد
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
                <div id='fillters' wire:ignore.self class="accordion-collapse collapse "   >
                    <div class="card">
                        <div class="card-status-start bg-primary"></div>

                        <div class="card-body">
                            <div class="row row-deck row-cards">
                                <div class="col-md-3">
                                    <div class="form-group col-md-12">
                                        <label class='form-label' for=""> بحث </label>
                                        <input type="text" wire:model.debounce.500ms='search' class='form-control' placeholder="الاسم" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group col-md-12">
                                        <label class='form-label' for=""> حاله الحى </label>
                                        <select wire:model='is_active' class="form-select">
                                            <option value="all" >الجميع</option>
                                            <option value='1' > فعال </option>
                                            <option value='0' >غير فعال</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title text-white font-weight-bold" >
                                عرض كافه الاحياء
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="table-default" class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>اسم الحى</th>
                                            <th> حاله الحاى </th>
                                            <th> المدينه </th>

                                            <th>تاريخ الاضافه</th>
                                            <th>تم الاضافه بواسطه</th>
                                            <th>خيارات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody">
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($districts as $district)
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td> {{ $district->name }} </td>
                                            <td>
                                                @if ($district->is_active)
                                                <span class='badge bg-blue' > فعال </span>
                                                @else
                                                <span class='badge bg-red' > غير فعال </span>
                                                @endif
                                            </td>
                                            <td> {{ $district->city?->name }} </td>
                                            <td> {{ $district->created_at }} <span class="text-muted"> {{ $district->created_at->diffForHumans() }} </span> </td>
                                            <td> {{ $district->user?->name }} </td>

                                            <td class='row g-2 align-items-center' >
                                                <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                                    <a href="{{ route('board.districts.show' , $district) }}" class="btn btn-primary w-100 btn-icon" aria-label="Facebook">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                                        </svg>
                                                    </a>
                                                </div>

                                                <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                                    <a href="{{ route('board.districts.edit' , $district ) }}" class="btn btn-warning w-100 btn-icon" aria-label="Facebook">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3"></path>
                                                            <path d="M4 6v6c0 1.657 3.582 3 8 3c.478 0 .947 -.016 1.402 -.046"></path>
                                                            <path d="M20 12v-6"></path>
                                                            <path d="M4 12v6c0 1.526 3.04 2.786 6.972 2.975"></path>
                                                            <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                                                        </svg>
                                                    </a>
                                                </div>

                                                <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                                    <a class="btn btn-danger w-100 btn-icon" wire:click="$emit('confirmDeletion' , {{ $district->id }} )" aria-label="Facebook">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M4 7l16 0"></path>
                                                            <path d="M10 11l0 6"></path>
                                                            <path d="M14 11l0 6"></path>
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center">

                            <ul class="pagination m-0 ms-auto">
                                {{ $districts->links() }}
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    $(function() {

        Livewire.on('confirmDeletion', itemId => {

            Swal.fire({
                title: 'تاكيد حذف العنصر ؟',
                showDenyButton: true,
                confirmButtonText: 'نعم',
                denyButtonText: `تراجع`,
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteITem' , itemId )
                    $.toast({
                      heading: 'رسال تاكيد',
                      text: 'تم الحذف بنجاح',
                      hideAfter: 5000 , 
                      icon: 'success'  , 
                      position: 'top-right',
                      textAlign: 'right' , 
                      allowToastClose: false , 
                  })
                }
            })

        });
    });
</script>
@endsection