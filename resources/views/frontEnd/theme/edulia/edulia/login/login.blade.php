<!DOCTYPE html>
<html lang="en">

<head>
    <!-- All Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset(generalSetting()->favicon) }}" type="image/png" />
    <title>@lang('auth.login')</title>
    <meta name="_token" content="{!! csrf_token() !!}" />

    <!-- Fonts -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/theme/edulia/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/theme/edulia/css/fontawesome.all.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('public/theme/edulia/css/style.css') }}">
    <style>
        .row_gap_24 {
            row-gap: 24px;
        }

        .row_gap_24 input.input-control-input {
            font-size: 12px;
        }

        .login_wrapper {
            width: 550px;
        }

        .text-danger.text-left {
            font-size: 14px;
        }
    </style>
</head>

<body>

    <section class="login">
        <div class="login_wrapper">
            <!-- login form start -->
            <div class="login_wrapper_login_content">
                <div class="login_wrapper_logo text-center"><img src="{{ asset(generalSetting()->logo) }}"
                        alt=""></div>
                <div class="login_wrapper_content">
                    <h4>@lang('auth.login_details')</h4>
                    <form action="{{ route('login') }}" method='POST'>
                        @csrf
                        <input type="hidden" name="username" id="username-hidden">
                        <div class="input-control">
                            <label for="#" class="input-control-icon"><i class="fal fa-envelope"></i></label>
                            <input type="email" name="email" class="input-control-input"
                                placeholder="@lang('auth.enter_email_address')" value="{{ old('email') }}">
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger text-left mb-15" role="alert">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                        <div class="input-control">
                            <label for="#" class="input-control-icon"><i class="fal fa-lock-alt"></i></label>
                            <input type="password" name='password' class="input-control-input"
                                placeholder='@lang('auth.enter_password')'>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger text-left mb-15" role="alert">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                        <div class="input-control d-flex">
                            <label for="#" class="checkbox">
                                <input type="checkbox" class="checkbox-input" name="remember" id="rememberMe"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <span class="checkbox-title">@lang('auth.remember_me')</span>
                            </label>
                            <a href="{{ route('recoveryPassord') }}" id='forget'>@lang('auth.forget_password')?</a>
                        </div>
                        <div class="input-control">
                            <input type="submit" class='input-control-input' value="Sign In">
                        </div>
                    </form>
                </div>
            </div>

            @if (config('app.app_sync'))
            <div class="row justify-content-center align-items-center" style="">
                <div class="col-lg-6 col-md-8">
                    <div class="grid__button__layout">
                      
                        @foreach ($users as $user)
                        @if ($user)
                        <form method="POST" class="loginForm" action="{{ route('login') }}">
                            @csrf()
                            <input type="hidden" name="email" value="{{ $user[0]->email }}">
                            <input type="hidden" name="auto_login" value="true">
                            {{-- <button type="submit"
                                class="primary-btn fix-gr-bg  mt-10 text-center col-lg-12 text-nowrap">{{ $user[0]->roles->name }}</button> --}}
                        </form>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
            <!-- login form end -->
            @if (config('app.app_sync'))
                <div class="row justify-content-center align-items-center mt-20">
                    <div class="col-lg-12">
                        <div class="row row_gap_24">
                            @foreach ($users as $user)
                                @if ($user)
                                    <div class="col-md-3">
                                        <form method="POST" class="loginForm" action="{{ route('login') }}">
                                            @csrf()
                                            <input type="hidden" name="email" value="{{ $user[0]->email }}">
                                            <input type="hidden" name="auto_login" value="true">
                                            <input type="submit" class='input-control-input'
                                                value="{{ $user[0]->roles->name }}">
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </section>


    <!-- jQuery JS -->
    <script src="{{ asset('public/theme/edulia/js/jquery.min.js') }}"></script>

    <!-- Main Script JS -->
    <script src="{{ asset('public/theme/edulia/js/script.js') }}"></script>
    <script src="{{ asset('public/backEnd/') }}/js/login.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#email-address").keyup(function() {
                $("#username-hidden").val($(this).val());
            });
        });
    </script>
</body>

</html>
