<html>

 @include('partials._head')

  <body>

    <div id="app">

      <div class="main-wrapper">

          @include('partials._navbar')

             @include('partials._sidebar')

              <div class="main-content">
        
                <section class="section">

                  @yield('content')

                </section>
      
              </div>

            @include('partials._footer')

          </div>
        
        </div>

      @include('partials._javascript')

    @yield('scripts')

  </body>

</html>
