<!--container div-->
<div class="d-flex flex-column bg-dark text-white col-lg-12 h-auto" style="min-height: 100vh;">


  <!--navigation bar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <h1 class="pt-2 px-3">STATISTICS</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              View By
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Day</a></li>
              <li><a class="dropdown-item" href="#">Month</a></li>
              <li><a class="dropdown-item" href="#">Year</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Revenue</a></li>
              <li><a class="dropdown-item" href="#">Number of Cases</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Chart
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Line Chart</a></li>
              <li><a class="dropdown-item" href="#">Bar Chart</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!--date picker-->
  <div class="d-flex flex-column flex-lg-row col-5">
    <div class="d-flex flex-row">
      <div class="px-4 ms-1">
        <label for="from">From:</label>
        <input type="date" id="from" name="from">
        <!-- <i class='text-white fas fa-calendar-alt'></i> -->
      </div>

      <div class="ps-4 ms-1">
        <label for="to">To:</label>
        <input type="date" id="to" name="to">
      </div>
    </div>

    <div class="ps-2 ms-1 mt-2 mt-lg-4">
      <button id="go" type="button" class="btn btn-success px-5 py-1 ms-3">Go</button>
    </div>
  </div>

  <!--chart area-->

  <!--bar chart-->
  <div class="card text-white bg-light m-4 col-12 col-lg-11">
    <div class="card-body">
      <canvas id="chart" style="width: 300px; height: 130px;"></canvas>
    </div>
  </div>

</div>
<script>
  var goBtn = document.getElementById('go');
  var from = document.getElementById('from');
  var to = document.getElementById('to');
  var response = [];
  var xaxis = [];
  var yaxis = [];


  goBtn.addEventListener('click', () => {
    generateGraph();
  });

  //draws graph using xaxis and yaxis data arrays
  function drawGraph() {
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: yaxis,
        datasets: [{
          label: 'Revenue',
          data: xaxis,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }

  //retrive data from database and generate the graph
  function generateGraph() {
    const http_req = new XMLHttpRequest();
    http_req.onload = function() {
      response = this.responseText.split('&');
      xaxis = response[0].split(',');
      yaxis = response[1].split(',');
      drawGraph();
    }
    http_req.open('GET', "Statistics/get_data.php?from='" + from.value + "'&to='" + to.value + "'");
    http_req.send();

  }

  

</script>
</body>

</html>