@extends('dashboard.layouts.master')
@section('admin_title', 'العملات')
@section('css')
@endsection
@section('active-currency', 'active')
@section('page-header', 'جدول العملات')
@section('page-header_desc', 'جدول العملات')
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
                    <h3 class="card-title">جدول العملات</h3>
                </div>
                <div class="card-header">
                    <a type="button" href="{{ route('dashboard.currencies.create') }}"
                        class="btn btn-md btn-primary btn-flat"><i class="fas fa-plus ml-2"></i> أضافة عملة جديده</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>أسم العملة</th>
                                <th>قيمة العملة</th>
                                <th>وصف العملة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data as $info)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $info['name'] }}</td>
                                    <td>{{ $info['description'] }}</td>
                                    <td>{{ $info['amount'] }}</td>
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
                                                    href="{{ route('dashboard.currencies.edit', $info['id']) }}"><i
                                                        class="fas fa-edit ml-2"></i>
                                                    تعديل</a>
                                                <a class="dropdown-item modal-effect btn btn-sm" data-effect="effect-scale"
                                                    data-toggle="modal" href="#delete{{ $info->id }}">
                                                    <i class="fas fa-trash-alt ml-1"></i>حذف</a>
                                            </div>
                                        </div>
                                        @include('dashboard.currencies.delete')
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
