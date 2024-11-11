@extends('dashboard.layouts.master')
@section('admin_title', 'حساب صافى المرتب')
@section('css')
@endsection
@section('active-calcNetSalary', 'active')
@section('page-header', 'أضافة عملة جديده')
@section('page-header_desc', 'أضافة عملة جديده')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.calcNetSalary.index') }}">جدول المرتبات</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">
        <div class="col-md-12">


            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach

            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">أضف مرتب جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dashboard.calcNetSalary.update', $data['id']) }}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="Label-salary">المرتب</label>
                            <input class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                name="salary" value="{{ old('salary', $data['salary']) }}" id="Label-salary" type="text"
                                placeholder="0.00">
                            @error('salary')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">نوع العملة</label>
                            <select class="form-control" name="currency_id">
                                <option value="" selected>-- أختر نوع العملة --</option>
                                @foreach ($other['currencies'] as $info)
                                    <option value="{{ $info['id'] }}" @if (old('currency_id', $data['currency_id']) == $info['id']) selected @endif>
                                        {{ $info['description'] }} ( {{ $info->amount }}
                                        جنية)
                                    </option>
                                @endforeach
                            </select>
                            @error('currency_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="Label-monthly_expenses">قيمة المصاريف الشهرية</label>
                            <input class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                name="monthly_expenses" value="{{ old('monthly_expenses', $data['monthly_expenses']) }}"
                                id="Label-monthly_expenses" type="text" placeholder="0.00">
                            @error('monthly_expenses')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="Label-annual_requirements">المتطلبات السنوية</label>
                            <input class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                name="annual_requirements"
                                value="{{ old('annual_requirements', $data['annual_requirements']) }}"
                                id="Label-annual_requirements" type="text" placeholder="0.00">
                            @error('annual_requirements')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="Label-insurance_amount">مبلغ التأمينات</label>
                            <input class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                name="insurance_amount" value="{{ old('insurance_amount', $data['insurance_amount']) }}"
                                id="Label-insurance_amount" type="text" placeholder="0.00">
                            @error('insurance_amount')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">تأكيد البيانات</button>
                    </div>
                </form>
            </div>

        </div>



    </div>
    <!-- /.row -->



@endsection
@section('scripts')
@endsection
