<!-- container div -->

<div class="d-flex container flex-column  bg-dark ps-2 text-white col-lg-11 h-auto " style="width: 95%; min-height: 100vh;">
    <div class="d-flex  align-self-start">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <h1 class="pt-2 px-1">DASHBOARD</h1>
                </a>

            </div>
        </nav>


    </div>
    <div class="row ms-2 text-dark">
        <!-- This year Cases -->
        <div class="card col-md-3 me-1 ms-1 my-lg-0 my-1 ">
            <div class="card-body d-flex flex-row mt-3">
                <div class="">
                    <i class="fas fa-calendar-day me-3 " style="font-size: 50px;"></i>
                </div>
                <div class="">
                    <h5 class="card-title">This Year</h5>
                    <p class="card-text">5546 Cases</p>
                </div>

            </div>
        </div>

        <!-- Today Cases -->
        <div class="card col-md-4 me-1 ms-1 my-lg-0 my-1">
            <div class="card-body">
                <div class="card-body d-flex flex-row">
                    <div class="">
                        <i class="fas fa-calendar-day me-3 " style="font-size: 50px;"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title">Today</h5>
                        <p class="card-text">5546 Cases</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Today Income -->
        <div class="card col-md-4 mx-1 ms-1 my-lg-0 my-1">
            <div class="card-body">
                <div class="card-body d-flex flex-row">
                    <div class="">
                        <i class="fas fa-coins me-3 mt-1" style="font-size: 50px;"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title">Today Income</h5>
                        <p class="card-text">Rs: 55464.09</p>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Chart area 2 -->
    <div class="row col-md-12  my-2 ">
        <!-- Weekly Cases -->
        <div class="card col-md-8  mx-1 ms-4" style="width: 59.4%;">
            <div class="card-body">
                <canvas id="myChart" width="300" height="100"></canvas>
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                            datasets: [{
                                label: '# of Votes',
                                data: [12, 19, 3, 5, 2, 3],
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
                </script>

            </div>
        </div>


        <!-- Pie chart-->
        <div class="card col-md-4 ms-1">
            <div class="card-body">
                <canvas id="pieChart" width="200" height="200"></canvas>
                <script>
                    var ctx = document.getElementById('thisMonth').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['R', 'B', 'Y', 'G', 'P', 'O'],
                            datasets: [{
                                label: '# of Votes',
                                data: [12, 19, 3, 5, 2, 3],
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
                </script>
            </div>
        </div>

    </div>

    <div class="row col-md-12 ms-2">
        <!-- Bar chart Monthly -->
        <div class="card col-md-4 mx-1">
            <div class="card-body">
                <canvas id="monthly" width="300" height="150"></canvas>
                <script>
                    var ctx = document.getElementById('monthly').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['R', 'B', 'Y', 'G', 'P', 'O'],
                            datasets: [{
                                label: '# of Votes',
                                data: [12, 19, 3, 5, 2, 3],
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
                </script>
            </div>
        </div>

        <!-- Today Cases -->
        <div class="card col-md-3 mx-1">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>

        <!-- This Month Income -->
        <div class="card col-md-4 mx-1">
            <div class="card-body">
                <canvas id="thisMonth" width="400" height="200"></canvas>
                <script>
                    var ctx = document.getElementById('thisMonth').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['R', 'B', 'Y', 'G', 'P', 'O'],
                            datasets: [{
                                label: '# of Votes',
                                data: [12, 19, 3, 5, 2, 3],
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
                </script>
            </div>
        </div>


    </div>

</div>
<!--Scripts-->