<!-- Modal -->
<div class="modal fade" id="messageBox" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <h4 class="modal-title" id="messageTitle"> </h4>
      </div>
      <div id="messageBody" class="modal-body">
      </div>
      <div class="modal-footer" style="border: none;">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<button id="msgModal" type="button" hidden="true" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageBox">
</button>


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
              <li><a class="dropdown-item" onclick="generateGraph('Date')">Day</a></li>
              <li><a class="dropdown-item" onclick="generateGraph('Month')">Month</a></li>
              <li><a class="dropdown-item" onclick="generateGraph('Year')">Year</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" onclick="setCategory('Revenue')">Revenue</a></li>
              <li><a class="dropdown-item" onclick="setCategory('Cases')">Number of Cases</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Chart
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" onclick="changeChartType('line')">Line Chart</a></li>
              <li><a class="dropdown-item" onclick="changeChartType('bar')">Bar Chart</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!--date picker-->
  <div class="d-flex flex-column flex-lg-row col-8">
    <div class="d-flex flex-row col-7">
      <div class="ps-4 ms-1 col">
        <label for="from" class="fs-5">From:</label>
        <input type="date" class="py-1 border_date_input bg-dark text-light ms-1" id="from" name="from">
        <!-- <i class='text-white fas fa-calendar-alt'></i> -->
      </div>

      <div class="ps-4  col">
        <label for="to" class="fs-5">To:</label>
        <input type="date" class="py-1 border_date_input bg-dark text-light ms-1" id="to" name="to">
      </div>
    </div>

    <div class="ps-2 ms-1">
      <button id="go" type="button" class="btn btn-success px-5 py-1 ms-3">Go</button>
    </div>
  </div>

  <!--chart area-->

  <!--bar chart-->
  <div class="card text-white bg-light m-4 col-12 col-lg-11">
    <div id="chart_area" class="card-body text-center text-dark">
      <canvas id="chart" style="width: 300px; height: 130px;"></canvas>
    </div>
  </div>

</div>
<script>
  var goBtn = document.getElementById('go');
  var from = document.getElementById('from');
  var to = document.getElementById('to');
  var category = 'Revenue';
  var response = [];
  var xaxis = [];
  var yaxis = [];

  goBtn.addEventListener('click', () => {
    generateGraph('Date');
  });

  //set category when category is selected
  function setCategory(cat){
    category = cat;
    generateGraph("Date");
    chart.data.datasets[0].label = cat;
    chart.update();
  }

  //change chart type to the passed argument type
  function changeChartType(type){
    chart.config.type = type;
    chart.update();
  }

  //draws graph using xaxis and yaxis data arrays
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

  //shows the message as a modal view with passed arguments
  function showMsg(title, body) {
    document.getElementById('messageTitle').innerHTML = title;
    document.getElementById('messageBody').innerHTML = body;
    document.getElementById("msgModal").click();
  }

  //retrive data from database and generate the graph
  function generateGraph(groupBy) {
    const http_req = new XMLHttpRequest();
    http_req.onload = function() {
      //console.log(this.responseText);
      response = this.responseText.split('&');
      xaxis = response[0].split(',');
      yaxis = response[1].split(',');
      if (xaxis[0] == "") {
        showMsg("Data not found!","Sorry! No data available in seleceted date range");
      } else {
        chart.data.labels.pop();
        chart.data.datasets[0].data = xaxis
        chart.data.labels = yaxis;
        chart.update();
      }
    }
    http_req.open('GET', "Statistics/get_data.php?from='" + from.value + "'&to='" + to.value + "'&groupBy="+groupBy+"&category="+category);
    http_req.send();
  }
</script>
</body>

</html>