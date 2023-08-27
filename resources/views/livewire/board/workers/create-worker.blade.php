<div class="col-md-12" >
    <form class="card" method='POST' action='{{ route('board.workers.store') }}' >
        @csrf
        <div class="card-header bg-primary">
            <h3 class="card-title text-white"> إضافه موظف جديد </h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label required"> الاسم </label>
                <div>
                    <input type="text" wire:model='name' class="form-control @error('name') is-invalid @enderror " name='name' value="{{ old('name') }}" >
                    @error('name')
                    <small class="form-hint text-danger"> {{ $message }} </small>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label required"> رقم الجوال </label>
                <div>
                    <input type="text" wire:model='phone' class="form-control @error('phone') is-invalid @enderror " name='phone' value="{{ old('phone') }}" >
                    @error('phone')
                    <small class="form-hint text-danger"> {{ $message }} </small>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label required"> البريد الاكترونى </label>
                <div>
                    <input type="email" wire:model='email' class="form-control @error('email') is-invalid @enderror " name='email' value="{{ old('email') }}" >
                    @error('email')
                    <small class="form-hint text-danger"> {{ $message }} </small>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label required"> كلمه المرور </label>
                <div>
                    <input type="password" wire:model='password' class="form-control @error('password') is-invalid @enderror " name='password'>
                    @error('password')
                    <small class="form-hint text-danger"> {{ $message }} </small>
                    @enderror
                </div>
            </div>




            <div class="mb-3">
                <label class="form-label required"> تاكيد كلمه المرور </label>
                <div>
                    <input type="password" wire:model='password_confirmation' class="form-control @error('password_confirmation') is-invalid @enderror " name='password_confirmation'  >
                    @error('password_confirmation')
                    <small class="form-hint text-danger"> {{ $message }} </small>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label class="form-label"> خصائص </label>
                <div>
                    <label class="form-check">
                        <input class="form-check-input" wire:model='active' name='active' type="checkbox" checked>
                        <span class="form-check-label"> السماح بدخول النظام </span>
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group col-md-12">
                    <label class='form-label' for=""> المنطقه </label>
                    <select wire:model='area' name='area' class="form-select">
                        <option value="all" > جميع المناطق </option>
                        @foreach ($this->areas as $one_area)
                        <option value='{{ $one_area->id }}' > {{ $one_area->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group col-md-12">
                    <label class='form-label' for=""> المدينه </label>
                    <select wire:model='city' name='city' class="form-select">
                        <option value="all" > جميع المدن </option>
                        @foreach ($this->cities as $one_city)
                        <option value='{{ $one_city->id }}' > {{ $one_city->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group col-md-12">
                    <label class='form-label' for=""> الاحياء </label>
                    <select name='districts[]' multiple="" class="form-select">
                        @foreach ($this->districts as $one_district)
                        <option value='{{ $one_district->id }}' {{ $this->area == 'all' ? 'selected="selected"' : '' }} > {{ $one_district->name }} </option>
                        @endforeach
                    </select>
                    @error('districts')
                    <small class="form-hint text-danger"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class='d-flex' >
                <a href="{{ route('board.workers.index') }}" class="btn btn-link"> تراجع </a>
                <button type="submit" class="btn btn-primary ms-auto">إضافه</button>
            </div>
        </div>
    </form>
</div>
