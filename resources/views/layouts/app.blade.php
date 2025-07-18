<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    <section class="banner compare" >
        @include('includes.preloader')
        @include('layouts.menu')
        <div class="container">

        </div>
        @yield('content')
        @include('layouts.footer')
    </section>
@include('layouts.jsplugins')

</body>
</html>
