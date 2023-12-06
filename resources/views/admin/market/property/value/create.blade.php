@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد مقدار فرم محصول</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">ایجاد فرم محصول </a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد مقدار فرم محصول</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد مقدار فرم محصول
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.value.index', $attribute->id) }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.value.store', $attribute->id) }}" method="POST">
                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">انتخاب محصول</label>
                                <select name="product_id" id="" class="form-control form-control-sm">
                                    <option value="">محصول را انتخاب کنید</option>
                                    @foreach ($attribute->category->products as $product)

                                    <option value="{{$product->id}}" @if (old('product_id') == $product->id) selected @endif>{{$product->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            @error('product_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">مقدار</label>
                                <input type="text" class="form-control form-control-sm" name="value" value="{{old('value')}}">
                            </div>
                            @error('value')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">افزایش قیمت</label>
                                <input type="text" name="price_increase" class="form-control form-control-sm" value="{{old('price_increase')}}">
                                <span style="color: rgb(156, 152, 152)">لطفا مبلغ را به تومان وارد کنید؛ مثال: 50000 یا 50000.000</span>
                            </div>
                            @error('price_increase')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{$message}}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="type">نوع</label>
                                <select name="type" id="type" class="form-control form-control-sm">
                                    <option value="0" @if (old('type')==0) selected @endif>ثابت</option>
                                    <option value="1" @if (old('type')==1) selected @endif>انتخابی</option>
                                </select>
                            </div>
                            @error('type')
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
