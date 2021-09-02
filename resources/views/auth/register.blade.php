@extends('layouts.site')
@section('content')
    <nav data-depth="1" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('home')}}">
                            <span itemprop="name">{{ trans('front.home') }}</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>
            </div>
        </div>
    </nav>
    <div class="container no-index">
        <div class="row">
            <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="main">
                    <div class="page-header">
                        <h1 class="page-title hidden-xs-up">
                            {{ trans('front.Login_to_your_account') }}
                        </h1>
                    </div>
                    <section id="content" class="page-content">
                        <section class="login-form">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <section>
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            {{ trans('front.name') }} :
                                        </label>
                                        <div class="col-md-6">

                                            <input class="form-control" name="name" value="{{ old('name') }}"
                                                   type="text" required="">
                                            @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            {{ trans('front.mobile') }} :
                                        </label>
                                        <div class="col-md-6">

                                            <input class="form-control" name="mobile" value="{{ old('mobile') }}"
                                                   type="text" required="">
                                            @error('mobile')
                                            <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            {{ trans('front.password') }} :
                                        </label>
                                        <div class="col-md-6">

                                            <div class="input-group js-parent-focus">
                                                <input class="form-control js-child-focus js-visible-password"
                                                       name="password" type="password" value=""
                                                       required="">
                                                <span class="input-group-btn">
                                    <button class="btn" type="button" data-action="show-password" data-text-show="Show"
                                            data-text-hide="Hide">
                                            {{ trans('front.show') }}
                                    </button>
                     </span>
                                            </div>
                                            @error('password')
                                            <span class="text-danger invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            {{ trans('front.confirm_password') }} :
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group js-parent-focus">
                                                <input class="form-control js-child-focus js-visible-password"
                                                       name="password_confirmation" type="password" value=""
                                                       required="">
                                                <span class="input-group-btn">
                                    <button class="btn" type="button" data-action="show-password" data-text-show="Show"
                                            data-text-hide="Hide">
                                      {{ trans('front.show') }}
                                    </button>
                     </span>
                                            </div>

                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-md-10 offset-md-2">
                                            <div class="forgot-password">
                                                <a href="password-recovery.html" rel="nofollow">
                                                    {{ trans('front.forgot_your_password?') }}
                                                    
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <footer class="form-footer clearfix">
                                    <div class="row no-gutters">
                                        <div class="col-md-10 offset-md-2">
                                            <input type="hidden" name="submitLogin" value="1">
                                            <button class="btn btn-primary" data-link-action="sign-in" type="submit"
                                                    class="form-control-submit">
                                                    {{ trans('front.sign_up?') }}
                                            </button>
                                        </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                        <div class="row no-gutters">
                            <div class="col-md-10 offset-md-2">
                                <div class="no-account">
                                    <a href="{{route('login')}}" data-link-action="display-register-form">
                                        
                                        {{ trans('front.have_account?_login_here?') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="page-footer">
                        <!-- Footer content -->
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <br>
@stop