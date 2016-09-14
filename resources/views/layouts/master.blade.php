<!DOCTYPE html>
<html lang='en'>

    <head>
@include('layouts.head')
    </head>
    <body>

        @include('layouts.header')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="https://myaccount.signin.mygovscot.org/CASServer/login?service=https%3A%2F%2Fmyaccount.signin.mygovscot.org%2Fidp%2FAuthn%2FRemoteUser&RelyingPartyId=https://signin.mygovscot.org/shibboleth&LACode=CAS">Login</a>
                    <a href="https://signin.mygovscot.org/home/?sp=register/CAS">Register</a>
                </div>
            @endif

        </div>

        <div>
            @yield('Content')
        </div>
        <br>
        @yield('Form')
        <br>
@include('layouts.footer')
    </body>
</html>
