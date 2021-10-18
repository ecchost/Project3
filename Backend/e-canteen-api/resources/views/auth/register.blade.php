@extends('layouts.authentication.master')
@section('title', 'Register')

@push('heads')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
@endpush
@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{asset('assets/images/login/3.jpg')}}"
                                       alt="looginpage"></div>
            <div class="col-xl-7 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light"
                                                                          src="{{asset('assets/images/logo/login.png')}}"
                                                                          alt="looginpage"><img
                                    class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}"
                                    alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form" action="{{route('register')}}" method="post">
                                @csrf
                                <h4>Create your account</h4>
                                <p>Enter your personal details to create account</p>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-form-label">Your Name</label>
                                    <input class="form-control" type="text" required="" name="name" placeholder="Name"
                                           value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" type="email" required="" name="email"
                                           placeholder="Test@gmail.com" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required=""
                                           placeholder="*********">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Re-Enter Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" required=""
                                           placeholder="*********">
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="tnc" type="checkbox" name="tnc">
                                        <label class="text-muted" for="tnc">Agree with<a class="ms-2" href="#">Privacy
                                                Policy</a></label>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit" id="register" disabled>
                                        Register
                                    </button>
                                </div>
                                {{--<h6 class="text-muted mt-4 or">Or signup with</h6>
                                <div class="social mt-4">
                                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                                </div>--}}
                                <p class="mt-4 mb-0">Already have an account?<a class="ms-2"
                                                                                href="{{ route('login') }}">Sign
                                        in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#tnc').on('change', function () {
            $('#register').prop('disabled', !this.checked)
        })
    </script>
    <script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
    <script>
        @if(Session::get('success'))
        $.notify({
                title: 'Success',
                message: '{{Session::get('success')}}'
            },
            {
                type: 'success',
                allow_dismiss: false,
                newest_on_top: false,
                mouse_over: true,
                spacing: 10,
                timer: 3000,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                offset: {
                    x: 30,
                    y: 30
                },
                delay: 1000,
                z_index: 10000,
                animate: {
                    enter: 'animated bounce',
                    exit: 'animated fadeOutDown'
                }
            });
        @endif
    </script>
@endpush
