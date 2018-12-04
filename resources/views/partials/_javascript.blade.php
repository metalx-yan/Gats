  <script src="{{ asset('/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('/modules/popper.js') }}"></script>
  <script src="{{ asset('/modules/tooltip.js') }}"></script>
  <script src="{{ asset('/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
  <script src="{{ asset('/js/sa-functions.js') }}"></script>
  
  <script src="{{ asset('/modules/chart.min.js') }}"></script>
  <script src="{{ asset('modules/summernote/summernote-lite.js') }}"></script>
  
  {{-- <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      datasets: [{
        label: 'Statistics',
        data: [460, 458, 330, 502, 430, 610, 488],
        borderWidth: 2,
        backgroundColor: 'rgb(87,75,144)',
        borderColor: 'rgb(87,75,144)',
        borderWidth: 2.5,
        pointBackgroundColor: '#ffffff',
        pointRadius: 4
      }]
    },
    options: {
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
            stepSize: 150
          }
        }],
        xAxes: [{
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
  </script>
   --}}
   <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="{{ asset('/js/custom.js') }}"></script>
  <script src="{{ asset('/js/demo.js') }}"></script>