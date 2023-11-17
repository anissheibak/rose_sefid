@extends('admin.layouts.master')

@section('head-tag')
<title>نمایش نظر</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> نظرات</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش نظر </li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                نمایش نظر
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section class="card mb-3">
                <section class="card-header text-white bg-custom-yellow">
                    <span class="font-size-16">{{$comment->user->fullName}} - {{$comment->user->id}}</span>
                </section>
                <section class="card-body">
                    <h6 class="card-title">
                        <strong>نام پست:</strong> {{$comment->commentable->name}}
                        -
                        <strong>کد پست:</strong>  {{$comment->commentable->id}}
                    </h6>
                    <hr>
                    <strong>متن نظر: </strong><p class="card-text font-size-16">{{$comment->body}}</p>
                </section>
            </section>

            @if($comment->parent_id == null)
            <section>
                <form action="{{ route('admin.content.comment.answer', $comment->id) }}" method="POST">
                    @csrf
                    <section class="row">
                        <section class="col-12">
                            <div class="form-group">
                                <label for="">پاسخ ادمین</label>
                                <textarea name="body" class="form-control form-control-sm" rows="4"></textarea>
                            </div>
                        </section>
                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>
            @endif

        </section>
    </section>
</section>

@endsection
