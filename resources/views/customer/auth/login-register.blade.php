@extends('customer.layouts.master-simple')

@section('content')

    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">

        <form action="{{ route('auth.customer.login-register') }}" method="POST">
            @csrf
            <section class="login-wrapper mb-5">
                <section class="login-logo">
                    <img src="{{ asset('customer-assets/images/logo/rosesefid-logo.png') }}" alt="rose sefid image">
                </section>
                <section class="login-title">ورود / ثبت نام</section>
                <section class="login-info">شماره موبایل یا پست الکترونیک (ایمیل) خود را وارد کنید:</section>
                <section class="login-input-text">
                    <input type="text" name="id" value="{{old('id')}}">
                </section>
                @error('id')
                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
                <section class="login-btn d-grid g-2 mt-3"><button class="btn btn-dark">ورود به رز سفید</button></section>
                <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام.</section>
            </section>
        </form>




    </section>

@endsection
