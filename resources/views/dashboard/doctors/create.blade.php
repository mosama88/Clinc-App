@extends('dashboard.layouts.master')
@section('admin_title', 'أضافة طبيب')
@section('css')
@endsection
@section('active-doctors', 'active')
@section('page-header', ' أضافة طبيب')
@section('page-header_desc', 'أضافة طبيب')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.doctors.index') }}">جدول الأطباء</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">

        {{-- Content --}}
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">أضف طبيب</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('dashboard.doctors.store') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">أسم الطبيب</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    id="exampleInputName" placeholder="أدخل اسم الطبيب">
                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">الرقم القومى</label>
                                <input type="text" class="form-control" name="id_number" value="{{ old('id_number') }}"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="id_number"
                                    placeholder="أدخل الرقم القومى">
                                @error('id_number')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">البريد الالكترونى</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    id="exampleInputemail" placeholder="أدخل البريد الالكترونى">
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">الموبايل</label>
                                <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="mobile"
                                    placeholder="أدخل المويايل">
                                @error('mobile')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">العنوان</label>
                                <textarea class="form-control" rows="3" name="address" placeholder="أدخل العنوان">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">درجة الدكتور الوظيفية</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                    id="title" placeholder="أدخل .....">
                                @error('title')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">الجنس</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">ذكر</option>
                                    <option value="0">انثى</option>
                                </select> @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">الحالة</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                </select> @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">القسم</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">ذكر</option>
                                    <option value="0">انثى</option>
                                </select> @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">التخصص</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                </select> @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputName">الجنسية</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">ذكر</option>
                                    <option value="0">انثى</option>
                                </select> @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputName">التخصص</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                </select> @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>














                        <div class="form-group">
                            <label for="exampleInputFile">صورة الطبيب</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">أرفق الصورة</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">أرفق الصورة</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">تأكيد البيانات</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->


        </div>
    </div>
    <!-- /.row -->



@endsection
@section('scripts')
@endsection
