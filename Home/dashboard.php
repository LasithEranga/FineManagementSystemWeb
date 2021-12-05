
<?php
    include ('./db.php');
    $yearly_cases_query = "SELECT COUNT(Ref_No) As count FROM fine_receipt WHERE Date >= CURDATE() - INTERVAL 1 YEAR ";
    $daily_cases_query =  "SELECT COUNT(Ref_No) As count FROM fine_receipt WHERE date = CURRENT_DATE";
    $today_income_query =  "SELECT SUM(amount) AS sum FROM payment WHERE date = CURRENT_DATE";
    $weekly_labels = [];
    $weekly_data = [];
    $pieChart_labels = [];
    $pieChart_Values = [];
    $monthly_labels = [];
    $monthly_data = [];
    $monthlyIncome_labels = [];
    $monthlyIncome_data = [];

        
    function getNumberOfCases($query , $conn){
        $result = mysqli_query($conn,$query);
        $result_array = mysqli_fetch_array($result);
        $cases = $result_array['count'];
        return $cases;
    }
    
    function getIncome($query , $conn){
        $result = mysqli_query($conn,$query);
        $result_array = mysqli_fetch_array($result);
        $sum = $result_array['sum'];
        if ($sum == NULL){
            return '0.00';
        }
            
        else{
            return $sum;
        }
    }

    //set weekly data
    for ($week = 7; $week >=0; $week--){
        $query = "SELECT COUNT(Ref_No) AS count FROM fine_receipt WHERE YEARWEEK(Date) = YEARWEEK(NOW() - INTERVAL " . $week . " WEEK)";
        $result = mysqli_query($conn,$query);
        $result_array = mysqli_fetch_array($result);
        array_push($weekly_data,$result_array['count']);

        $query = "SELECT DAY(NOW() - INTERVAL " . ($week+1) . " WEEK + INTERVAL 7 Day) as ed, DAY(NOW() - INTERVAL " . ($week+1) . " WEEK) as st";
        $result = mysqli_query($conn,$query);
        $result_array = mysqli_fetch_array($result);
        array_push($weekly_labels,$result_array['st'] .'-'. $result_array['ed']);

    }
    //end set week data

    //set pie chart data
    $pieChart_query = "SELECT COUNT(Ref_No) as count, DAYNAME(Date) as date FROM fine_receipt WHERE Date >= DATE(NOW()) - INTERVAL 7 DAY GROUP BY DAY(Date)";
    $result = mysqli_query($conn,$pieChart_query); 
    while ($data = mysqli_fetch_array($result)){
        array_push($pieChart_labels, $data['date']);
        array_push($pieChart_Values, $data['count']);
    } 

    //end set pie chart data

    //set monthly chart
    $monthlyChart_query = "SELECT MONTHNAME(Date) AS Month, COUNT(Ref_No) as count FROM fine_receipt WHERE Date >= CURDATE() - INTERVAL 1 YEAR GROUP BY MONTH(Date)";
    $result = mysqli_query($conn,$monthlyChart_query); 
    while ($data = mysqli_fetch_array($result)){
        array_push($monthly_labels, $data['Month']);
        array_push($monthly_data, $data['count']);
    } 
    //end set monthly chart

    //set monthly income
    $monthlyIncome_query = "SELECT SUM(amount) as sum, DAY(date) as date FROM payment WHERE date >= DATE(NOW())-INTERVAL 30 Day Group by DATE(date)";
    $result = mysqli_query($conn,$monthlyIncome_query); 
    while ($data = mysqli_fetch_array($result)){
        array_push($monthlyIncome_labels, $data['date']);
        array_push($monthlyIncome_data, $data['sum']);
    } 
    //end set monthly income
    
?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand">
            <h1 class="pt-2 px-3">DASHBOARD</h1>
        </a>

    </div>
</nav>

<div class="d-flex container flex-column  bg-dark  text-white col-lg-11 h-auto " style="width: 95%; min-height: 100vh;">

        <!-- This year Cases -->
        <div class="row  text-dark">
        
            <div class="card col-lg-3 mx-1 my-lg-0 my-1 ">
                <div class="card-body d-flex flex-row mt-3">
                    <div class="">
                        <i class="fas fa-calendar-day me-3 " style="font-size: 50px; color: #033ca8;"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title">This Year</h5>
                        <p class="card-text"><?php echo getNumberOfCases($yearly_cases_query,$conn); ?> Cases</p>
                    </div>

                </div>
            </div>

            <!-- Today Cases -->
            <div class="card col-lg-4 mx-1 my-lg-0 my-1">
                <div class="card-body d-flex flex-row mt-3">
                    <div class="">
                        <i class="fas fa-calendar-day me-3 " style="font-size: 50px; color: #ea8d2b;"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title">Today</h5>
                        <p class="card-text"><?php echo getNumberOfCases($daily_cases_query,$conn); ?> Cases</p>
                    </div>
                </div>
            </div>

            <!-- Today Income -->
            <div class="card col-lg-4 mx-1 my-lg-0 my-1 ">
                <div class="card-body d-flex flex-row mt-3">
                    <div class="">
                        <i class="fas fa-coins me-3 mt-1" style="font-size: 50px;color: #0087ff;"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title">Today Income</h5>
                        <p class="card-text">Rs: <?php echo getIncome($today_income_query,$conn); ?></p>
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
                            type: 'line',
                            data: {
                                labels: [<?php foreach ($weekly_labels as $label)
                                                    echo "'".$label."'," ?>],
                                datasets: [{
                                    label: '# of Cases',
                                    data:  [<?php foreach ($weekly_data as $data)
                                                    echo "'".$data."'," ?>],
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
                    var xValues =  [<?php foreach ($pieChart_labels as $label)
                                                echo "'".$label."'," ?>];
                    var yValues =  [<?php foreach ($pieChart_Values as $value)
                                                echo "'".$value."'," ?>];
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
                <canvas id="thisYear" width="300" height="250"></canvas>
                <script>
                    var ctx = document.getElementById('thisYear').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [<?php foreach ($monthly_labels as $label)
                                                echo "'".$label."'," ?>],
                            datasets: [{
                                label: 'No of cases',
                                data: [<?php foreach ($monthly_data as $data)
                                                echo "'".$data."'," ?>],
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

        <!-- Cases by Date -->
        <div class="card col-lg-3 mx-1 my-lg-0 my-1">
            <div class="card-body">
                <div class="card-body d-flex flex-row">
                    <div class="">
                        <i class="fas d-none fa-calendar-day me-3 " style="font-size: 50px;"></i>

                    </div>
                    <div class="">
                        <h5 class="card-title">Cases by Date</h5></br>
                        <?php
                            for ($i=1; $i<5; $i++){
                                $query = "SELECT DATE_FORMAT((DATE(NOW()) - INTERVAL " . $i . " Day),'%m-%d') as date ,COUNT(Ref_No) count FROM fine_receipt WHERE Date = DATE(NOW()) - INTERVAL " . $i . " Day;";
                                $result = mysqli_query($conn,$query);
                                $result_array = mysqli_fetch_array($result);
                                echo '<p>'. $result_array['date']. '<span class=" ms-5"> '. $result_array['count'].' cases</span> </p>';
                            }
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <!-- Monthly Income -->
        <div class="card col-lg-4 mx-1 my-lg-0 my-1 ">
            <div class="card-body">
                <div class="card-body d-flex flex-row ">

                    <canvas id="thisMonth" width="300" height="250"></canvas>
                    <script>
                        var ctx = document.getElementById('thisMonth').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [<?php foreach ($monthlyIncome_labels as $label)
                                                echo "'".$label."'," ?>],
                                datasets: [{
                                    label: 'Income',
                                    data: [<?php foreach ($monthlyIncome_data as $data)
                                                echo "'".$data."'," ?>],
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