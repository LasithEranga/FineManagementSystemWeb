<!-- container div -->

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">
            <h1 class="pt-2 px-3">DASHBOARD</h1>
        </a>

    </div>
</nav>

<div class="d-flex container flex-column  bg-dark  text-white col-lg-11 h-auto " style="width: 95%; min-height: 100vh;">


    <div class="row  text-dark">
        <!-- This year Cases -->
        <div class="card col-lg-3 mx-1 my-lg-0 my-1 ">
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
        <div class="card col-lg-4 mx-1 my-lg-0 my-1">
            <div class="card-body d-flex flex-row mt-3">
                <div class="">
                    <i class="fas fa-calendar-day me-3 " style="font-size: 50px;"></i>
                </div>
                <div class="">
                    <h5 class="card-title">Today</h5>
                    <p class="card-text">5546 Cases</p>
                </div>
            </div>
        </div>

        <!-- Today Income -->
        <div class="card col-lg-4 mx-1 my-lg-0 my-1 ">
            <div class="card-body d-flex flex-row mt-3">
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


    <!-- Chart area 2 -->
    <div class="row col-md-12 my-2 ">
        <!-- Weekly Cases -->
        <div id="weeklyChart" class="card col-lg-8 d-none d-lg-block mx-1 my-2 my-lg-0" style="width: 60.4%;">
            <div class="card-body">
                <canvas id="myChart" width="300" height="150"></canvas>
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
        <div class="card col-lg-4 ms-1 px-2 d-none d-lg-block " style="width: 34.2%;">
            <div class="card-body">
                <canvas id="pieChart" width="200" height="200"></canvas>
                <script>
                    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
                    var yValues = [55, 49, 44, 24, 15];
                    var barColors = [
                        "#b91d47",
                        "#00aba9",
                        "#2b5797",
                        "#e8c3b9",
                        "#1e7145"
                    ];

                    new Chart("pieChart", {
                        type: "pie",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "World Wide Wine Production 2018"
                            }
                        }
                    });
                </script>

            </div>
        </div>

    </div>

    <div class="row  text-dark">
        <!-- This year Cases -->
        <div class="card col-lg-4 mx-1 my-lg-0 my-1 ">
            <div class="card-body d-flex flex-row mt-3">
                <canvas id="thisYear" width="300" height="150"></canvas>
                <script>
                    var ctx = document.getElementById('thisYear').getContext('2d');
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

        <!-- Today Cases -->
        <div class="card col-lg-3 mx-1 my-lg-0 my-1">
            <div class="card-body">
                <div class="card-body d-flex flex-row">
                    <div class="">
                        <i class="fas d-none fa-calendar-day me-3 " style="font-size: 50px;"></i>

                    </div>
                    <div class="">
                        <h5 class="card-title">Today</h5>
                        <p>20/21 <span class=" ms-5"> 524 cases</span> </p>
                        <p>20/21 <span class=" ms-5"> 524 cases</span> </p>
                        <p>20/21 <span class=" ms-5"> 524 cases</span> </p>
                        <p>20/21 <span class=" ms-5"> 524 cases</span> </p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Today Income -->
        <div class="card col-lg-4 mx-1 my-lg-0 my-1 ">
            <div class="card-body">
                <div class="card-body d-flex flex-row ">

                    <canvas id="thisMonth" width="300" height="150"></canvas>
                    <script>
                        var ctx = document.getElementById('thisMonth').getContext('2d');
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
        </div>

    </div>

</div>
<!--Scripts-->