@extends('dashboard.layouts.master')
@section('admin_title', 'حساب صافى المرتب')
@section('css')
@endsection
@section('active-calcNetSalary', 'active')
@section('page-header', 'جدول صافى المرتب')
@section('page-header_desc', 'جدول صافى المرتب')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">لوحة التحكم</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">
        <div class="col-md-12">
            @if (session('success') != null)
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Content --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">جدول صافى المرتب</h3>
                </div>
                <div class="card-header">
                    <a type="button" href="{{ route('dashboard.calcNetSalary.create') }}"
                        class="btn btn-md btn-primary btn-flat"><i class="fas fa-plus ml-2"></i> أضافة مرتب جديد</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>نوع العملة</th>
                                <th>المرتب بالعملة</th>
                                <th>المرتب الشهرى</th>
                                <th>المرتب السنوى</th>
                                <th>المصاريف الشهرية</th>
                                <th>المتطلبات السنوية</th>
                                <th>التأمينات</th>
                                <th>صافى المرتب</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data as $info)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $info->currency->description }}</td>
                                    <td>{{ $info['salary'] * 1 }}</td>
                                    <td>{{ $info['calc_salary_month'] * 1 }}</td>
                                    <td>{{ $info['calc_salary_year'] * 1 }}</td>
                                    <td>{{ $info['monthly_expenses'] * 1 }}</td>
                                    <td>{{ $info['annual_requirements'] * 1 }}</td>
                                    <td>{{ $info['insurance_amount'] * 1 }}</td>
                                    <td>{{ $info['net_salary'] * 1 }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">العلميات</button>
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="true">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu" x-placement="top-start"
                                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -165px, 0px);">
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.calcNetSalary.edit', $info['id']) }}"><i
                                                        class="fas fa-edit ml-2"></i>
                                                    تعديل</a>
                                                <a class="dropdown-item modal-effect btn btn-sm" data-effect="effect-scale"
                                                    data-toggle="modal" href="#delete{{ $info->id }}">
                                                    <i class="fas fa-trash-alt ml-1"></i>حذف</a>
                                            </div>
                                        </div>
                                        @include('dashboard.calcNetSalaries.delete')
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>

    </div>
    <!-- /.row -->



@endsection
@section('scripts')
@endsection
