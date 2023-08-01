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
                        استبدال اخرى 
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
                                <div class="col-md-2">
                                    <div class="form-group col-md-12">
                                        <label class='form-label' for=""> بحث </label>
                                        <input type="text" wire:model.debounce.500ms='search' class='form-control' placeholder="رقم القطعه..رقم العداد الجديد او القديم" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group col-md-12">
                                        <label class='form-label' for=""> المنطقه </label>
                                        <select wire:model='area' class="form-select">
                                            <option value="all" > جميع المناطق </option>
                                            @foreach ($this->areas as $one_area)
                                            <option value='{{ $one_area->id }}' > {{ $one_area->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group col-md-12">
                                        <label class='form-label' for=""> المدينه </label>
                                        <select wire:model='city' class="form-select">
                                            <option value="all" > جميع المدن </option>
                                            @foreach ($this->cities as $one_city)
                                            <option value='{{ $one_city->id }}' > {{ $one_city->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group col-md-12">
                                        <label class='form-label' for=""> الحى </label>
                                        <select wire:model='district' class="form-select">
                                            <option value="all" > جميع الاحياء </option>
                                            @foreach ($this->districts as $one_district)
                                            <option value='{{ $one_district->id }}' > {{ $one_district->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">


                                    <a wire:click='ExportExcelSheet()' class="btn btn-facebook mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-table-import" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 21h-7a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v8"></path>
                                            <path d="M3 10h18"></path>
                                            <path d="M10 3v18"></path>
                                            <path d="M19 22v-6"></path>
                                            <path d="M22 19l-3 -3l-3 3"></path>
                                        </svg>
                                        Excel تقرير
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title text-white font-weight-bold" >
                                عرض كافه مهمات   استبدال اخرى 
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="table-default" class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> الموظف </th>
                                            <th> الحى </th>
                                            <th> حاله المهمه </th>
                                            <th>رقم القطعه</th>
                                            <th>رقم العداد الحالى</th>
                                            <th>قراءه العداد الحالى</th>
                                            <th>تاريخ الاضافه</th>
                                            <th>خيارات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody">
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($OtherReplacements as $OtherReplacement)
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td> <a href="{{ route('board.workers.show' , $OtherReplacement->user_id ) }}"> {{ $OtherReplacement->user?->name }} </a> </td>
                                            <td> {{ $OtherReplacement->district?->name }} </td>
                                            <td>
                                            @switch($OtherReplacement->status)
                                                @case(1)
                                                <span  class='badge bg-blue' > تم </span>
                                                @break
                                                @case(2)
                                                <span  class='badge bg-blue' > تم الالغاء </span>
                                                @break
                                                @endswitch
                                            </td>
                                            <td> {{ $OtherReplacement->segment_number }} </td>
                                            <td> {{ $OtherReplacement->current_meter_number }} </td>
                                            <td> {{ $OtherReplacement->current_meter_read }} </td>
                                            <td> {{ $OtherReplacement->created_at }} <span class="text-muted"> {{ $OtherReplacement->created_at->diffForHumans() }} </span> </td>

                                            <td class='row g-2 align-items-center' >
                                                <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                                    <a href="{{ route('board.other_replacements.show' , $OtherReplacement) }}" class="btn btn-primary w-100 btn-icon" aria-label="Facebook">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                                        </svg>
                                                    </a>
                                                </div>

                                                <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                                    <a class="btn btn-danger w-100 btn-icon" wire:click="$emit('confirmDeletion' , {{ $OtherReplacement->id }} )" aria-label="Facebook">
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
                                {{ $OtherReplacements->links() }}
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