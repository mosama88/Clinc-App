@extends('dashboard.layouts.master')
@section('admin_title', 'أضافة عملة جديده')
@section('css')
@endsection
@section('active-currency', 'active')
@section('page-header', 'أضافة عملة جديده')
@section('page-header_desc', 'أضافة عملة جديده')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.currencies.index') }}">جدول العملات</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">
        <div class="col-md-12">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">أضف عملة جديده</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dashboard.currencies.store') }}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">أسم العملة</label>
                            <input class="form-control" name="name" type="text" placeholder="أكتب أسم العملة">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">وصف العملة</label>
                            <input class="form-control" name="description" type="text" placeholder="وصف العملة">
                            @error('description')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">قيمة العملة بالمصرى</label>
                            <input class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                name="amount" type="text" placeholder="0.00">
                            @error('amount')
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
