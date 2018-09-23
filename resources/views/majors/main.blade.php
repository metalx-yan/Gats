<html>

 @include('partials._head')

  <body>

    {{-- <div class="wrapper"> --}}

    @include('majors._sidebar')

    {{-- <div class="main-panel"> --}}

      @include('partials._navbar')

      {{-- <div class="content"> --}}

      @yield('content')

      {{-- </div> --}}

      @include('partials._footer')

    {{-- </div> --}}

    @include('partials._javascript')

    @yield('scripts')

  {{-- </div> --}}

  </body>

</html>
