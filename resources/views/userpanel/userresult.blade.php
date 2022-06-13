<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="60">
<link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.solid.min.css')}}">
<script src="{{asset('js/chart.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<body>
    <br>
    <div class="col-lg-7 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users') }}"> Yza</a>
        </div>
    </div><br>
    <div class="col-lg-12 bg-light">
        <canvas id="myChart" height="90"></canvas>
    </div>

    <script type="text/javascript">
        var xValues = <?php echo json_encode($users); ?>;
        var yValues = <?php echo json_encode($scores); ?>;
        var barColors = [
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)',
            'rgba(25, 106, 86, 0.7)',
            'rgba(75, 19, 192, 0.7)',
            'rgba(52, 142, 135, 0.7)',
            'rgba(25, 76, 46, 0.7)',
            'rgba(65, 152, 192, 0.7)',
            'rgba(75, 176, 86, 0.7)',
            'rgba(84, 162, 35, 0.7)',
            'rgba(55, 106, 86, 0.7)',
            'rgba(85, 92, 192, 0.7)',
            'rgba(5, 16, 86, 0.7)',
            'rgba(14, 162, 235, 0.7)',
            'rgba(75, 27, 86, 0.7)',
            'rgba(98, 12, 192, 0.7)',
            'rgba(25, 16, 86, 0.7)',
        ]

        new Chart("myChart", {
            type: "horizontalBar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(252, 201, 86, 1)',
                        'rgba(95, 192, 142, 1)'
                    ],
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "CTF Compitition Raitings"
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            min: 0,
                            max: 150
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>