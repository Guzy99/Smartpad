<?php
session_start();

if (isset($_SESSION['id-user'])){
  $ses_id = $_SESSION['id-user'];
}
else{
  $new_url = 'logina.php';
  header('Location: '.$new_url);
}

require "connect.php";
$id_profile = $_SESSION['id-user'];
$email = $_SESSION['email'];
$name_profile = $_SESSION['namepers'] ;

$colvo_vh = $_SESSION['colvo_vh'];
echo '<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    LOSTEC
  </title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport"/>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="css/nova.css" rel="stylesheet" />
  <link href="css/imaga.css" rel="stylesheet" />
 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


  <link href="demo/demo.css" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
  <div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
      <a href="./index.php" class="simple-text logo-normal">'.$_SESSION['namepers'].' '.$_SESSION['surnamepers'].'</a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="./index.php">
            <i class="material-icons">home</i>
            <p>Домашняя</p>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="./profile.php">
            <i class="material-icons">account_box</i>
            <p>Профиль</p>
          </a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link" href="./all_zadachi.php">
          <i class="material-icons">notifications</i>
            <p>Мои задачи
            <span class= "textr primetxt circle">'.$colvo_vh.'</span>
            </p>
          </a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="./calendar.php">
          <i class="material-icons">date_range</i>
          <p>Календарь</p>
        </a>
      </li>

        <li class="nav-item  ">
        <a class="nav-link" href="./loginout.php">
        <i class="material-icons">
        exit_to_app
        </i>
          <p>Выход</p>
        </a>
      </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top gera">
      <div class="container-fluid ">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="index.php">DELAU</a>
        </div>
        <button class="navbar-toggler " type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar-white "></span>
            <span class="navbar-toggler-icon icon-bar-white "></span>
            <span class="navbar-toggler-icon icon-bar-white "></span>
          </button>

      </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
        <div class="row">

          <div class="col-md-12 col-12">
          <div class="card card-profile nomar-bot">
            <div class="card-avatar">';

            $qr_result12 = mysqli_query($link,"SELECT colvo FROM done_zd");
                            $data12 = mysqli_fetch_array($qr_result12);
                            $colvo = $data12[0];

                          $qr_result13 = mysqli_query($link,"SELECT done_colvo FROM done_zd");
                            $data13 = mysqli_fetch_array($qr_result13);
                            $done_colvos = $data13[0];

                            $b_colvo = (float)$colvo;
                            $b_done_colvos = (float)$done_colvos;

                            $ostatok = $b_done_colvos / $b_colvo;
                            $ce_ost = $ostatok * 100;
                            $ce_obrez = (int)$ce_ost;
                            $_SESSION['ce_obrez'] = $ce_obrez;

                            $ce_obrez = (float)$ce_obrez;
                            $end_obrez = $ce_obrez / 100;
                            
                            $_SESSION['colvo'] = $colvo;
                            $_SESSION['done_colvos'] = $done_colvos;
                            $_SESSION['end_obrez'] = $end_obrez;

            $modal_url = "'#iw-modal'";
            $qr_result30 = mysqli_query($link,"SELECT img FROM `users` WHERE `id` = $id_profile");
            $data30 = mysqli_fetch_array($qr_result30);
            $img = $data30[0];
            if ($img == ''){
              echo'
              <a onclick="javascript:window.location='.$modal_url.'" >
                    <img class="img" src="img/faces/no-ava.jpg">
                  </a>';
            }
            else{
            // $qr_result31 = mysqli_query($link,"SELECT img FROM `users` WHERE `id` = $id_profile");
            // $data31 = mysqli_fetch_array($qr_result31);
            // $img = $data31[0];
              echo'<a href="#pablo">
                <img class="img" src="'.$img.'">
              </a>';
            }
            // $qr_result31 = mysqli_query($link,"SELECT `name` , `surname` FROM `users` WHERE `id` = $id_profile");
            // $data31 = mysqli_fetch_array($qr_result31);
            // $name = $data31[0];
            // $surname = $data31[1];
            echo'
            </div>

            <div class="card-body">
            <h3 class="card-title">'.$_SESSION['namepers'].' '.$_SESSION['surnamepers'].'</h3>';
            // echo'<h1>'.$done_colvos.'<h1>';
                          echo'
                          <li><h6 class="card-category text-gray">Задач создано: '. $colvo .'</h6></li>
                          <li><h6 class="card-category text-gray">Задач выполнено: '. $done_colvos .'</h6></li>
                          <li><h6 class="card-category text-gray">Порядочность: '. $end_obrez .'</h6></li>';
                          ?>
                        

              <a href="#pablo" class="btn btn-success btn-round">Добавить</a>
            </div>
          </div>
        </div>

      </div>
                <div class="row card mrt10 mrb10 nomar">
                  <div class="col-md-2"></div>

                  <div class="col-12 col-md-9 mb-25">
                    <div id="chart_div" class="chart_vert" ></div>
                  </div>
                  <div class="col-md-1"></div>

                <?php
                echo'</div>
                  <div class="card mrt10 mrb10 nomar">
                    <button class="mt-10 margans-bth btn btn-success btn-block btn-round" onclick="javascript:window.location=\'redact_profile.php\'">Редактировать</button>
                    <button class=" margans-bth btn btn-success btn-block btn-round" onclick="javascript:window.location=\'podpiska.php\'">Продлить</button>
                  </div>
              </div>
          </div>
  </div>
</div>';
?>
<!--   Модальное окно   -->
<div id="iw-modal" class="iw-modal">
            <div class="iw-modal-wrapper">
              <div class="iw-CSS-modal-inner">
                <div class="iw-modal-text">
                  <div class="col-md-8 c_pad">
                    <div class="card bup">
                      <div class="card-header card-header-success">
                        <h4 class="card-title">Добавление аватарки</h4>
                        <a href="#close" title="Закрыть" class="iw-close">×</a>
                      </div>
                      <div class="card-body">
                        <!-- <form method="post" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-12 col-12">
                            <input type="file" name="file" id="file" class="input-file vi-no">
                            
                              <label for="file" >
                                <img class="img_avatar_modal" src="img/faces/no-ava.jpg">
                              </label>

                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-md-12 col-12">
                              
                            <input type="submit" value="Загрузить" class="btn btn-success pull-right btn-round">
                              
                            </div>
                          </div>
                        </form> -->
                        <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="upload_avatar.php">
                          <div class="example-2">
                            <div class="form-group">
                              <input type="file" name="file" id="file" class="input-file">
                              <label for="file" class="btn btn-tertiary js-labelFile">
                                <i class="icon fa fa-check"></i>
                                <span class="js-fileName">Выбрать файл</span>
                              </label>
                            </div>
                          </div>

                          
                        <input type="submit" value="Загрузить файл" class="btn bth_frez">
                      </form>
                      <?php
                      // if(isset($_FILES['image'])){
                      //   $file_name = $_FILES['image']['name'];
                      //   $file_size= $_FILES['image']['size'];
                      //   $file_tmp = $file_name = $_FILES['image']['tmp_name'];
                      //   $file_type = $_FILES['image']['type'];
                      //   $file_ext = strtolower(end(explode('.', $_FILES['image']['name'] )));

                      //   $expensions = array('jpeg','jpg','png');
                      //   if ($file_size > 2097152){
                      //     $errors[] = 'Файл меньше 2мб';
                      //   }
                      //   if(empty($errors)==true){
                      //     move_uploaded_file($file_tmp, "images/".$file_name);
                      //     echo "Succsess";
                      //   }
                      //   else{
                      //     print($errors);
                      //   }
                      // }
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!--   Core JS Files   -->
<script src="js/core/jquery.min.js" type="text/javascript"></script>
<script src="js/core/popper.min.js" type="text/javascript"></script>
<script src="js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="js/plugins/chartist.min.js"></script>
<script src="js/nabob.js"></script>
<!--  Notifications Plugin    -->
<script src="js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="demo/demo.js"></script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();
    });
</script>
<script src="js/chart.js"></script>
<script src="js/chrat_vc.js"></script>
<!-- <script>
google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Opening Move', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        ]);

        var options = {
          title: 'Chess opening moves',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Chess opening moves',
                   subtitle: 'popularity by percentage' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
</script> -->
</body>

</html>