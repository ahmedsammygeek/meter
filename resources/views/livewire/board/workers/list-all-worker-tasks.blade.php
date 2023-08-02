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
                        الموظفين
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
                        <a href="{{ route('board.workers.index') }}" class="btn btn-primary d-none d-sm-inline-block" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>
                            عرض كافه الموظفين
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
                                <div class="col-md-2">
                                    <div class="form-group col-md-12">
                                        <label class='form-label' for=""> المهم </label>
                                        <select wire:model='task' class="form-select">
                                            <option value="all" > جميع المهمات </option>
                                            @foreach ($this->tasks as $one_task)
                                            <option value='{{ $one_task->id }}' > {{ $one_task->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group col-md-12">
                                        <label class='form-label' for=""> التاريخ (من) </label>
                                        <input type="date" class='form-control' wire:model='starts_at' >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group col-md-12">
                                        <label class='form-label' for=""> التاريخ (الى) </label>
                                        <input type="date" class='form-control' wire:model='ends_at' >    
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
                                عرض مهمات الموظف : {{ $worker->name }}
                            </h3>
                        </div>
                        <div class="card-body">
                            <div id="table-default" class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> المهمه </th>
                                            <th> الحى </th>
                                            <th> التاريخ </th>
                                            <th>خيارات</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-tbody">
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($user_tasks as $user_task)
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td> {{ $user_task->task?->name }} </td>
                                            <td> {{ $user_task->district?->name }} </td>
                                            <td> {{ $user_task->task_date }} </td>

                                            <td class='row g-2 align-items-center' >

                                                <div class='col-6 col-sm-4 col-md-2 col-xl-auto '>
                                                    <a class="btn btn-danger w-100 btn-icon" wire:click="$emit('confirmDeletion' , {{ $user_task->id }} )" aria-label="Facebook">
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
                                {{ $user_tasks->links() }}
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