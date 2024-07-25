
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ URL::asset('css/main.css') }} >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href={{ URL::asset('img/logo.png') }}>
    <title>Morshed - News - Login</title>
</head>

<body>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="/login">
                                    @csrf
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                    <div class="text-danger">
                                        @if($errors->any())
                                            {{ implode(' - ', $errors->all(':message')) }}
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url({{ URL::asset('/img/login.jpg') }})"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="container">
    @include('components.layouts.footer')
</div>
<script src={{ URL::asset('js/core/popper.min.js') }}></script>
<script src={{ URL::asset('js/core/bootstrap.min.js') }}></script>
<script src={{ URL::asset('js/plugins/perfect-scrollbar.min.js') }}></script>
<script src={{ URL::asset('js/plugins/smooth-scrollbar.min.js') }}></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src={{ URL::asset('js/main.js') }}></script>
</body>

</html>
