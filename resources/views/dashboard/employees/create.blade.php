@extends('dashboard.layouts.master')
@section('admin_title', 'أضافة موظف')
@section('css')
@endsection
@section('active-employees', 'active')
@section('page-header', ' أضافة موظف')
@section('page-header_desc', 'أضافة موظف')
@section('page-header_link')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.employees.index') }}">جدول الموظفين</a></li>
@endsection
@section('content')

    {{-- ./row --}}
    <div class="row">

        {{-- Content --}}
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">أضف موظف</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->





                <div class="card-body">
                    {{-- <h4>صورة الموظف</h4> --}}
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                                href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                                aria-selected="true">البيانات الشخصية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-qualifications-tab" data-toggle="pill"
                                href="#custom-content-below-qualifications" role="tab"
                                aria-controls="custom-content-below-qualifications" aria-selected="false">المؤهلات
                                العلمية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                                href="#custom-content-below-profile" role="tab"
                                aria-controls="custom-content-below-profile" aria-selected="false">البيانات الوظيفية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill"
                                href="#custom-content-below-messages" role="tab"
                                aria-controls="custom-content-below-messages" aria-selected="false">بيانات أخرى</a>
                        </li>


                    </ul>

                    <form action="{{ route('dashboard.employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                                aria-labelledby="custom-content-below-home-tab">



                                <div class="row my-4"> {{-- Start First Row of From --}}
                                    {{-- أسم الموظف --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">أسم الموظف</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" id="exampleInputName" placeholder="أدخل اسم الموظف">
                                        @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- البريد الالكترونى --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail">البريد الالكترونى</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ old('email') }}" id="exampleInputEmail"
                                            placeholder="أدخل البريد الالكترونى ">
                                        @error('email')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- تاريخ الميلاد --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">تاريخ الميلاد</label>
                                        <input type="date" class="form-control" name="brith_date"
                                            value="{{ old('brith_date') }}" id="brith_date" placeholder="YYYY-MM-DD ">
                                        @error('brith_date')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- نوع الجنس --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">نوع الجنس</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد نوع الجنس --</option>
                                            <option @if (old('gender') == 1) selected @endif value="1">ذكر
                                            </option>
                                            <option @if (old('gender') == 2) selected @endif value="2">أنثى
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الديانه --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الديانه</label>
                                        <select name="religion" id="religion" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد الديانه --</option>
                                            <option @if (old('religion') == 1) selected @endif value="1">مسلم
                                            </option>
                                            <option @if (old('religion') == 2) selected @endif value="2">مسيحى
                                            </option>
                                        </select>
                                        @error('religion')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الرقم القومى --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">الرقم القومى</label>
                                        <input type="text" class="form-control" name="id_number"
                                            value="{{ old('id_number') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="id_number"
                                            placeholder="أدخل الرقم القومى">
                                        @error('id_number')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الجنسية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الجنسية</label>
                                        <select name="nationality_id" id="nationality_id" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد الجنسية --</option>
                                            @if (!empty($other['nationalities']) && isset($other['nationalities']))
                                                @foreach ($other['nationalities'] as $nationality)
                                                    <option @if (old('nationality_id', $nationality['nationality_id'] == $nationality->id)) selected @endif
                                                        value="{{ $nationality->id }}">{{ $nationality->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('nationality_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- المحافظة --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">المحافظة</label>
                                        <select name="governorate_id" id="governorate_id" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد المحافظة --</option>
                                            @if (!empty($other['governorates']) && isset($other['governorates']))
                                                @foreach ($other['governorates'] as $governorate)
                                                    <option @if (old('governorate_id', $governorate['governorate_id'] == $governorate->id)) selected @endif
                                                        value="{{ $governorate->id }}">{{ $governorate->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('governorate_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- المدينه --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">المدينه</label>
                                        <select name="city_id" id="city_id" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد المدينه --</option>
                                            @if (!empty($other['cities']) && isset($other['cities']))
                                                @foreach ($other['cities'] as $city)
                                                    <option @if (old('city_id', $city['city_id'] == $city->id)) selected @endif
                                                        value="{{ $city->id }}">{{ $city->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('city_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- فصيلة الدم --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">فصيلة الدم</label>
                                        <select name="blood_types_id" id="blood_types_id" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد المدينه --</option>
                                            @if (!empty($other['blood_types']) && isset($other['blood_types']))
                                                @foreach ($other['blood_types'] as $blood_type)
                                                    <option @if (old('blood_types_id', $blood_type['blood_types_id'] == $blood_type->id)) selected @endif
                                                        value="{{ $blood_type->id }}">{{ $blood_type->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('blood_types_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- عنوان الموظف --}}
                                    <div class="form-group col-12">
                                        <label for="exampleInputAddress">عنوان الموظف</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ old('address') }}" id="exampleInputAddress"
                                            placeholder="أدخل اسم الموظف">
                                        @error('address')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    {{-- رقم الهاتف --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">رقم الهاتف</label>
                                        <input type="text" class="form-control" name="home_telephone	"
                                            value="{{ old('home_telephone	') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="home_telephone	"
                                            placeholder="أدخل رقم الهاتف">
                                        @error('home_telephone ')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    {{-- الرقم المحمول --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInputName">الرقم المحمول</label>
                                        <input type="text" class="form-control" name="mobile"
                                            value="{{ old('mobile') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="mobile"
                                            placeholder="أدخل الرقم المحمول">
                                        @error('mobile')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    {{-- الحالة الاجتماعية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">الحالة الاجتماعية</label>
                                        <select name="social_status" id="social_status" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد الحالة الاجتماعية --
                                            </option>
                                            <option @if (old('social_status') == 'married') selected @endif value="married">
                                                متزوج
                                            </option>
                                            <option @if (old('social_status') == 'divorced') selected @endif value="divorced">
                                                مطلق
                                            </option>
                                            <option @if (old('social_status') == 'single') selected @endif value="single">
                                                أعزب
                                            </option>
                                            <option @if (old('social_status') == 'widowed') selected @endif value="widowed">
                                                أرمل
                                            </option>
                                        </select>
                                        @error('social_status')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- عدد الأطفال --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">عدد الأطفال</label>
                                        <input type="text" class="form-control" name="children_number"
                                            value="{{ old('children_number') }}"
                                            oninput="this.value=this.value.replace(/[^0-9.]/g,'');" value="0"
                                            id="children_number" placeholder="أدخل عدد الأطفال">
                                        @error('children_number')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> {{-- End First Row of From --}}

                            </div>

                            <div class="tab-pane fade" id="custom-content-below-qualifications" role="tabpanel"
                                aria-labelledby="custom-content-below-qualifications-tab">

                                <div class="row my-4"> {{-- Start Seconed Row of From --}}
                                    {{-- أسم المؤهل --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">المؤهل</label>
                                        <select name="qualification_id" id="qualification_id" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد المؤهل --</option>
                                            @if (!empty($other['qualifications']) && isset($other['qualifications']))
                                                @foreach ($other['qualifications'] as $qualification)
                                                    <option @if (old('qualification_id', $qualification['qualification_id'] == $nationality->id)) selected @endif
                                                        value="{{ $qualification->id }}">{{ $qualification->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('qualification_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- سنه التخرج --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">تاريخ الحصول على المؤهل</label>
                                        <input type="date" class="form-control" name="qualification_year"
                                            value="{{ old('qualification_year') }}" id="qualification_year">
                                        @error('qualification_year')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="exampleInput">تخصص الشهاده</label>
                                        <input type="text" class="form-control" name="major"
                                            value="{{ old('major') }}" id="major" placeholder="أدخل التخصص ">
                                        @error('major')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInput">اسم الجهة التعليمية</label>
                                        <input type="text" class="form-control" name="university"
                                            value="{{ old('university') }}" id="university"
                                            placeholder="أدخل الجهة التعليمية ">
                                        @error('university')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الحالة الاجتماعية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">المعدل التراكمي أو الدرجة</label>
                                        <select name="graduation_estimate" id="graduation_estimate" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد المعدل التراكمي أو
                                                الدرجة --
                                            </option>
                                            <option @if (old('graduation_estimate') == 'fair') selected @endif value="fair">
                                                مقبول
                                            </option>
                                            <option @if (old('graduation_estimate') == 'good') selected @endif value="good">
                                                جيد
                                            </option>
                                            <option @if (old('graduation_estimate') == 'very_good') selected @endif value="very_good">
                                                جيد جدآ
                                            </option>
                                            <option @if (old('graduation_estimate') == 'excellent') selected @endif value="excellent">
                                                أمتياز
                                            </option>
                                        </select>
                                        @error('graduation_estimate')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>{{-- End Seconed Row of From --}}
                            </div>

                            <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                                aria-labelledby="custom-content-below-profile-tab">

                                <div class="row my-4"> {{-- Start Seconed Row of From --}}
                                    {{-- أسم المؤهل --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">المؤهل</label>
                                        <select name="qualification_id" id="qualification_id" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد المؤهل --</option>
                                            @if (!empty($other['qualifications']) && isset($other['qualifications']))
                                                @foreach ($other['qualifications'] as $qualification)
                                                    <option @if (old('qualification_id', $qualification['qualification_id'] == $nationality->id)) selected @endif
                                                        value="{{ $qualification->id }}">{{ $qualification->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                لا توجد بيانات
                                            @endif
                                        </select>
                                        @error('qualification_id')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- سنه التخرج --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">تاريخ الحصول على المؤهل</label>
                                        <input type="date" class="form-control" name="qualification_year"
                                            value="{{ old('qualification_year') }}" id="qualification_year">
                                        @error('qualification_year')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label for="exampleInput">تخصص الشهاده</label>
                                        <input type="text" class="form-control" name="major"
                                            value="{{ old('major') }}" id="major" placeholder="أدخل التخصص ">
                                        @error('major')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInput">اسم الجهة التعليمية</label>
                                        <input type="text" class="form-control" name="university"
                                            value="{{ old('university') }}" id="university"
                                            placeholder="أدخل الجهة التعليمية ">
                                        @error('university')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- الحالة الاجتماعية --}}
                                    <div class="form-group col-6">
                                        <label for="exampleInput">المعدل التراكمي أو الدرجة</label>
                                        <select name="graduation_estimate" id="graduation_estimate" class="form-control">
                                            <option value="" disabled selected>-- برجاء تحديد المعدل التراكمي أو
                                                الدرجة --
                                            </option>
                                            <option @if (old('graduation_estimate') == 'fair') selected @endif value="fair">
                                                مقبول
                                            </option>
                                            <option @if (old('graduation_estimate') == 'good') selected @endif value="good">
                                                جيد
                                            </option>
                                            <option @if (old('graduation_estimate') == 'very_good') selected @endif value="very_good">
                                                جيد جدآ
                                            </option>
                                            <option @if (old('graduation_estimate') == 'excellent') selected @endif value="excellent">
                                                أمتياز
                                            </option>
                                        </select>
                                        @error('graduation_estimate')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>{{-- End Seconed Row of From --}}
                            </div>
                            <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel"
                                aria-labelledby="custom-content-below-messages-tab">
                                tab-4
                            </div>
                            <div class="card-footer">
                                <button type="submit" style="float: left" class="btn btn-primary">تأكيد البيانات
                                </button>
                            </div>
                        </div>


                    </form>








                </div>














            </div>
            <!-- /.card -->


        </div>
    </div>
    <!-- /.row -->



@endsection
@section('scripts')
@endsection
