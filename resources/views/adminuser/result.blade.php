<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.solid.min.css')}}">
    <script src="{{asset('js/chart.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<body class="hold-transistion sidebar-mini layout-fixed">
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="p-2 pt-3 d-flex text-dark" data-widget="pushmenu" href="{{route('signout')}}"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="dropdown-item" href="{{route('signout')}}">
                        <i class="fas fa-sign-out-alt" title="Ulgamdan çyk"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div class="info">
                        <a href="{{route('teams')}}" class="d-block text-uppercase">ADMIN PANEL</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{route('teams')}}" class="nav-link">
                                <i class="fas fa-user mr-1"></i>
                                <p> Ulanyjylar </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('questions')}}" class="nav-link">
                                <i class="fas fa-file-alt mr-1"></i>
                                <p> Soraglar </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('monitoring')}}" class="nav-link active">
                                <i class="fas fa-home mr-1"></i>
                                <p> Monitoring </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <br>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-7 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('monitoring') }}"> Yza</a>
                    </div>
                </div><br><br>
                <div class="col-lg-12 bg-dark">
                    <canvas id="myChart" height="100"></canvas>
                </div>
            </div>

        </div>
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
                            max: 500
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>