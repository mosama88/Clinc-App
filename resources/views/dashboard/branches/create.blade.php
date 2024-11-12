<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة فرع جديد</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.branches.store') }}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">أسم الفرع</label>
                            <input class="form-control" name="name" type="text" placeholder="أكتب أسم الفرع">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">عنوان الفرع</label>
                            <input class="form-control" name="address" type="text" placeholder="أكتب عنوان الفرع">
                            @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">تليفون الفرع</label>
                            <input class="form-control" name="phone" type="text" placeholder="أكتب تليفون الفرع">
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="">البريد الالكترونى</label>
                            <input class="form-control" name="email" type="text"
                                placeholder="أكتب البريد الالكترونى للفرع">
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>محافظة</label>
                            <select name="governorate_id" class="custom-select">
                                <option selected>-- أختر المحافظة --</option>

                                @if (!empty($other['governorates']) && isset($other['governorates']))
                                    @foreach ($other['governorates'] as $governrate)
                                        <option value="{{ $governrate->id }}">{{ $governrate->name }}</option>
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


                        <div class="form-group">
                            <label>المدينة</label>
                            <select name="city_id" class="custom-select">
                                <option selected>-- أختر المدينة --</option>
                                @if (!empty($other['cities']) && isset($other['cities']))
                                    @foreach ($other['cities'] as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
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



                    </div>
                    <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary">تأكيد البيانات</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
