<!DOCTYPE html>
<html lang='en'>

    <head>
@include('layouts.head')
    </head>
    <body>

        @include('layouts.header')
        <div class="flex-center position-ref full-height">


        </div>

        <div>
            @yield('Content')
        </div>
        <br>
        @yield('Form')
        <br>
        <div>
            @yield('List')
        </div>
        <div>
            @yield('Filter')
        </div>
          <div>
            @yield('Modal')
        </div>


@include('layouts.footer')
    </body>
</html>
