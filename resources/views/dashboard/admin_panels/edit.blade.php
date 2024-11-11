@extends('dashboard.layouts.master')
@section('admin_title', 'تعديل الضبط العام')
@section('css')
@endsection
@section('active-admin_panels', 'active')
@section('page-header', 'جدول تعديل الضبط العام')
@section('page-header_desc', 'جدول تعديل الضبط العام')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.admin_panels.index') }}">جدول الضبط العام</a></li>
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
                    <h3 class="card-title"> تعديل الضبط العام</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body p-0">


                    <table class="table table-bordered mg-b-0 text-md-nowrap">
                        <tr>
                            <td class="wd-500">اسم الشركة</td>
                            <td>
                                <input type="text" class="form-control" value="{{ $editData['company_name'] }}"
                                    placeholder="Enter ...">
                            </td>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </tr>
                        <tr>
                            <td class="wd-500"> حالة التفعيل</td>
                            <td>
                                <input type="text" class="form-control" value="{{ $editData['company_name'] }}"
                                    placeholder="Enter ...">
                            </td>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </tr>
                        <tr>
                            <td class="wd-500">هاتف الشركة</td>
                            <td>
                                <input type="text" class="form-control" value="{{ $editData['phons'] }}"
                                    placeholder="Enter ...">
                            </td>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </tr>
                        <tr>
                            <td class="wd-500">عنوان الشركة</td>
                            <td>
                                <input type="text" class="form-control" value="{{ $editData['address'] }}"
                                    placeholder="Enter ...">
                            </td>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </tr>
                        <tr>
                            <td class="wd-500">بريد الشركة</td>
                            <td>
                                <input type="text" class="form-control" value="{{ $editData['email'] }}"
                                    placeholder="Enter ...">
                            </td>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </tr>


                        <tr>
                            <td class="wd-500">شعار الشركة</td>
                            <td>
                                <input type="file" name="photo_cover" class="dropify" data-height="200" />
                            </td>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </tr>

                        <tr>
                            <td class="wd-500">شعار الشركة</td>
                            <td>
                                <input type="file" name="photo_cover" class="dropify" data-height="200" />
                            </td>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </tr>

                        <tr>
                            <td colspan="2" class="text-center">
                                <button type="button" class="btn  btn-primary btn-flat">تعديل البيانات</button>
                            </td>
                        </tr>
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
