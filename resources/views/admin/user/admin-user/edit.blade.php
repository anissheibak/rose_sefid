@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش کاربر ادمین</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کاربران ادمین</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کاربر ادمین</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش کاربر ادمین
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.user.admin-user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}

                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="first_name">نام</label>
                                <input type="text" name="first_name" class="form-control form-control-sm" value="{{old('first_name', $user->first_name)}}">
                            </div>
                            @error('first_name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="last_name">نام خانوادگی</label>
                                <input type="text" name="last_name" class="form-control form-control-sm" value="{{old('last_name', $user->last_name)}}">
                            </div>
                            @error('last_name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>


                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="">تصویر</label>
                                <input type="file" name="profile_photo_path" class="form-control form-control-sm">
                                <img src="{{ asset($user->profile_photo_path) }}" class="mt-3" alt="profile photo" width="100px" height="80px">
                            </div>
                            @error('profile_photo_path')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

@endsection
