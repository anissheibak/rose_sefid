@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش فرم محصول</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> فرم محصول </a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش فرم کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش فرم محصول
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.property.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.property.update', $attribute->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">عنوان فرم</label>
                                <input type="text" class="form-control form-control-sm" name="name" value="{{old('name', $attribute->name)}}">
                            </div>
                            @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">واحد اندازه‌گیری</label>
                                <input type="text" class="form-control form-control-sm" name="unit" value="{{old('unit', $attribute->unit)}}">
                            </div>
                            @error('unit')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="">انتخاب دسته</label>
                                <select name="category_id" id="" class="form-control form-control-sm">
                                    <option value="">دسته را انتخاب کنید</option>
                                    @foreach ($productCategories as $productCategory)

                                    <option value="{{$productCategory->id}}" @if (old('category_id', $attribute->category_id) == $productCategory->id) selected @endif>{{$productCategory->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
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
