@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش کالا</title>
<link rel="stylesheet" href="{{ asset('admin-assets/JalaliDatePicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کالا </a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش کالا
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="form">
                    @csrf
                    @method('PUT')
                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">نام محصول</label>
                                <input type="text" name="name" value="{{old('name', $product->name)}}" class="form-control form-control-sm">
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
                                <label for="">انتخاب دسته</label>
                                <select name="category_id" id="" class="form-control form-control-sm">
                                    <option value="">دسته را انتخاب کنید</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @if (old('category_id', $product->category_id) == $category->id) selected @endif>{{$category->name}}</option>
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

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">انتخاب برند</label>
                                <select name="brand_id" id="" class="form-control form-control-sm">
                                    <option value="">برند را انتخاب کنید</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" @if (old('brand_id', $product->brand_id) == $brand->id) selected @endif>{{$brand->original_name}} - {{$brand->persian_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="image">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="image" id="image">
                            </div>
                            @error('image')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror

                            <section class="row">
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($product->image['indexArray'] as $key => $value )


                                <section class="col-md-{{6 / $number}}">
                                    <div class="form-check">
                                        <input type="radio" name="currentImage" class="form-check-input" value="{{$key}}" id="{{$number}}"
                                        @if ($product->image['currentImage'] == $key)
                                            checked
                                        @endif>

                                        <label for="{{$number}}" class="form-check-label mx-2">
                                            <img src="{{ asset($value) }}" class="w-100" alt="">
                                        </label>
                                    </div>
                                </section>
                                @php
                                    $number++;
                                @endphp
                                @endforeach
                            </section>
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="published_at">تاریخ انتشار</label>
                                <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none" value="{{old('published_at', $product->published_at)}}">
                                <input type="text" id="published_at_view" class="form-control form-control-sm" value="{{old('published_at', $product->published_at)}}">
                            </div>
                            @error('published_at')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">وزن</label>
                                <input type="text" name="weight" class="form-control form-control-sm" value="{{old('weight', $product->weight)}}">
                            </div>
                            @error('weight')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">طول</label>
                                <input type="text" name="length" class="form-control form-control-sm" value="{{old('length', $product->length)}}">
                            </div>
                            @error('length')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">عرض</label>
                                <input type="text" name="width" class="form-control form-control-sm" value="{{old('width', $product->width)}}">
                            </div>
                            @error('width')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">ارتفاع</label>
                                <input type="text" name="height" class="form-control form-control-sm" value="{{old('height', $product->height)}}">
                            </div>
                            @error('height')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">قیمت کالا</label>
                                <input type="text" name="price" class="form-control form-control-sm" value="{{old('price', $product->price)}}">
                                <span style="color: rgb(156, 152, 152)">لطفا مبلغ را به تومان وارد کنید؛ مثال: 50000 یا 50000.000</span>
                            </div>
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option value="0" @if (old('status', $product->status)==0) selected @endif>غیرفعال</option>
                                    <option value="1" @if (old('status', $product->status)==1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('status')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="marketable">قابل فروش بودن</label>
                                <select name="marketable" id="marketable" class="form-control form-control-sm">
                                    <option value="0" @if (old('marketable', $product->marketable)==0) selected @endif>غیرفعال</option>
                                    <option value="1" @if (old('marketable', $product->marketable)==1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('marketable')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="tags">تگ‌ها</label>
                                <input type="hidden" class="form-control form-control-sm" name="tags" id="tags" value="{{old('tags', $product->tags)}}">
                                <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                </select>
                            </div>
                            @error('tags')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="">معرفی محصول</label>
                                <textarea name="introduction" id="introduction"  class="form-control form-control-sm" rows="6">{{old('introduction', $product->introduction)}}</textarea>
                            </div>
                        </section>

                        <section class="col-12 border-top border-bottom py-3 mb-3">

                            @foreach ($product->metas as $meta)

                            <section class="row">

                                <section class="col-6 col-md-3 my-2">
                                    <div class="form-group">
                                        <input type="text" name="meta_key[{{$meta->id}}]" class="form-control form-control-sm" value="{{$meta->meta_key}}">
                                    </div>
                                </section>

                                <section class="col-6 col-md-3 my-2">
                                    <div class="form-group">
                                        <input type="text" name="meta_value[]" class="form-control form-control-sm" value="{{$meta->meta_value}}">
                                    </div>
                                </section>

                            </section>
                            @endforeach

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

@section('script')

    <script src="{{ asset('admin-assets/JalaliDatePicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/JalaliDatePicker/persian-datepicker.min.js') }}"></script>

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('introduction');
    </script>

    <script>
        $(document).ready(function(){
            $(document).ready(function() {
                $("#published_at_view").persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#published_at'
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if(tags_input.val() !== null && tags_input.val().length > 0){
                default_data =default_tags.split(',')
            }

            select_tags.select2({
                placeholder : 'لطفا تگ‌های خود را وارد نمایید.',
                tags : true,
                data: default_data
            });

            select_tags.children('option').attr('selected', true).trigger('change');

            $('#form').submit(function(event){
                if(select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>





@endsection
