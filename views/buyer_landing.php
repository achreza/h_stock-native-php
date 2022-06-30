<?php
session_start();
include "koneksi.php";
$nama = $_SESSION['username'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar barang</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body class="top-navigation">

    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">

                            <?php
                            include 'koneksi.php';
                            $query = "select * from user where id_user = $id";
                            $output = $koneksi->query($query);


                            $data = $output->fetch_array()
                            ?>

                            <?php
                            $query2 = "select * from profil inner join user on user.id_user = profil.id_user where profil.id_user = '$id'";
                            $output2 = $koneksi->query($query2);


                            $datafoto = $output2->fetch_array();
                            ?>

                            <div class="profile-image">
                                <img src="../img/profil/<?php echo $datafoto['foto'] ?>" class="rounded-circle" alt="profile">
                            </div>
                            <div class="m-1">

                                <h3 class="block m-t-xs font-bold text-white">Welcome, <?php echo $_SESSION['username'] ?></h3>
                            </div>
                        </div>

                    </li>
                    <li class="">
                        <a href="buyer_edit_profil.php"><i class="fa fa-user"></i> <span class="nav-label">Profil</span> </a>
                    </li>
                    <li class="active">
                        <a href="buyer_landing.php"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
                    </li>
                    <li class="">
                        <a href="unduhan.php"><i class="fa fa-download"></i> <span class="nav-label">Unduhan</span> </a>
                    </li>



                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">

            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <?php
                    $query = "select * from foto";
                    $output = $koneksi->query($query);


                    while ($data = $output->fetch_array()) {
                        $idfoto = $data['id_foto'];
                    ?>
                        <div class="col-md-3">
                            <div class="ibox">
                                <div class="ibox-content product-box">

                                    <div class="product-imitation">

                                        <img class="img-fluid rounded mx-auto d-block" src="../img/foto/<?php echo $data['nama_foto'] ?>" alt="foto foto" style="height: 15rem;">
                                    </div>
                                    <div class="product-desc">
                                        <span class="product-price">
                                            <?php echo $data['harga_foto'] ?>
                                        </span>
                                        <small class="text-muted"><?php echo $data['nama_foto'] ?></small>
                                        <a href="#" class="product-name"> <?php echo $data['keyword'] ?></a>



                                        <div class="small m-t-xs">
                                            <?php echo $data['deskripsi'] ?>
                                        </div>
                                        <div class="m-t text-righ">

                                            <a href="product_detail_view.php?id=<?php echo $data['id_foto'] ?>" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>







                </div>





            </div>
            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <script src="../js/plugins/chartJs/Chart.min.js"></script>

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="../js/demo/peity-demo.js"></script>


    <script>
        $(document).ready(function() {


            var d1 = [
                [1262304000000, 6],
                [1264982400000, 3057],
                [1267401600000, 20434],
                [1270080000000, 31982],
                [1272672000000, 26602],
                [1275350400000, 27826],
                [1277942400000, 24302],
                [1280620800000, 24237],
                [1283299200000, 21004],
                [1285891200000, 12144],
                [1288569600000, 10577],
                [1291161600000, 10295]
            ];
            var d2 = [
                [1262304000000, 5],
                [1264982400000, 200],
                [1267401600000, 1605],
                [1270080000000, 6129],
                [1272672000000, 11643],
                [1275350400000, 19055],
                [1277942400000, 30062],
                [1280620800000, 39197],
                [1283299200000, 37000],
                [1285891200000, 27000],
                [1288569600000, 21000],
                [1291161600000, 17000]
            ];

            var data1 = [{
                    label: "Data 1",
                    data: d1,
                    color: '#17a084'
                },
                {
                    label: "Data 2",
                    data: d2,
                    color: '#127e68'
                }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {
                type: 'line',
                data: lineData,
                options: lineOptions
            });

        });
    </script>

</body>

</html>