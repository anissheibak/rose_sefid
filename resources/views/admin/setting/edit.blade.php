@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش تنظیمات</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">تنظیمات</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش تنظیمات</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش تنظیمات
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.setting.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    {{method_field('PUT')}}
                    <section class="row">

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="title">عنوان سایت</label>
                                <input type="text" class="form-control form-control-sm" name="title" id="title" value="{{old('title', $setting->title)}}">
                            </div>
                            @error('title')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="keywords">کلمات کلیدی سایت</label>
                                <input type="text" class="form-control form-control-sm" name="keywords" id="keywords" value="{{old('keywords', $setting->keywords)}}">
                            </div>
                            @error('keywords')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="description">توضیحات سایت</label>
                                <input type="text" class="form-control form-control-sm" name="description" id="description" value="{{old('description', $setting->description)}}">
                            </div>
                            @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="logo">لوگو</label>
                                <input type="file" class="form-control form-control-sm" name="logo" id="logo">
                            </div>
                            <img src="{{ asset($setting->logo) }}" alt="logo" width="100px" height="80px">
                            @error('logo')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="icon">آیکون</label>
                                <input type="file" class="form-control form-control-sm" name="icon" id="icon">
                            </div>
                            <img src="{{ asset($setting->icon) }}" alt="icon" width="100px" height="80px">
                            @error('icon')
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
