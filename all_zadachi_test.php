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
?>

<html lang="en">


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
            <div class="logo">
            <a href="./index.php" class="simple-text logo-normal">DALAU</a>
            </div>
            
            <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item">
                <a class="nav-link" href="./index.php">
                    <i class="material-icons">home</i>
                    <p>Домашняя</p> 
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./profile.php">
                    <i class="material-icons">account_box</i>
                    <p>Профиль</p>
                </a>
                </li>
                <li class="nav-item active ">
                <a class="nav-link" href="./all_zadachi.php">
                <i class="material-icons">notifications</i>
                    <p>Мои задачи
                    <span class= "textr primetxt circle"><?php echo $colvo_vh;?></span>
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

                <button class="navbar-toggler " type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="true" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar-white "></span>
                <span class="navbar-toggler-icon icon-bar-white "></span>
                <span class="navbar-toggler-icon icon-bar-white "></span>
                </button>

            </div>
            </nav>

        <div class="content">
            <?php
          require 'connect.php';
          $qr_result = mysqli_query($link,"SELECT * FROM `zadachi` WHERE `id-user` = $ses_id");
        
            while($data = mysqli_fetch_array($qr_result)){ 
              echo  '<div class="col-md-4 col-12 " id='."place".$data['id'].'> <div class="card card-stats "><div class="textat features_list">';
              echo  '<div class=" card-header-'.$data['param'].'">'.'<h4 class="text-uppercase">'.'<a onclick="setValue(this)" data-from="'.$data['id'].'"  href="#iw-modal" id="bth'.$data['id'].'" class="ser textat text-white" ><i class="material-icons textlf"> create </i></a>'. $data['zd_name'] .
              '<a href=" del.php?delete=' . $data['id'] . '" class="textat text-white" ><i class="material-icons textr"> clear </i></a>'.
              '</h4></div>';
              echo '<div class="ct-chart imgro ">';

                echo'
                <div class="row">
                <div class="col-1 "></div>
                <div class="col-10 ">';
                echo'<ul class="list-unstyled levo">';
                
                echo '<li><p class="mt-15"> '. $data['comment'] .'</p></li>';
                echo '<li><p class="mb-no"><i class="material-icons fifi">alarm</i> '. $data['zd_time'] .'</p></li>';
                // echo '<li> <a href="#myModal" class="btn btn-primary" data-toggle="modal">Открыть модальное окно</a> </li>';
                echo '</div>
                <div class="col-1 "></div>
                </div>
              </div>  <button data-from="'.$data['id'].'" id="'.$data['id'].'" onclick="setValue2(this)" class="govnoed morgaet btn btn-'.$data['param'].' btn-block btn-round" >'.$data['text-knop'].'</button>';
             echo '</div></div></div>';   
              }
              ?>
<?php
    echo '<div id="iw-modal" class="iw-modal">
       <div class="iw-modal-wrapper">
         <div class="iw-CSS-modal-inner">
           <div class="iw-modal-text">
             <div class="col-md-8 c_pad">
               <div class="card bup">
                 <div class="card-header card-header-success">
                   <h4 class="card-title">Добавление заказа</h4>
                   <a href="#close" title="Закрыть" class="iw-close">×</a>
                 </div>
                 <div class="card-body"> 
                 
                        <form action="recover.php" name="recover" method="post">
                          <div class="row">
                            <div class="col-md-6">';
                            // $post=$GET['post'];
                            // $durak = 4;
                            // $durak = $_SESSION['dura'];
                            if (isset($_SESSION['shw'])) // Проверка существования переменной
                            {
                                // Складываем значение полученной переменной с 10
                                $shw = $_SESSION['shw'];
                            }
                            if (isset($_SESSION['zd_name'])) // Проверка существования переменной
                            {
                                // Складываем значение полученной переменной с 10
                                $zd_name = $_SESSION['zd_name'];
                            }
                            if (isset($_SESSION['zd_time'])) // Проверка существования переменной
                            {
                                // Складываем значение полученной переменной с 10
                                $timed = $_SESSION['zd_time'];
                            }
                            if (isset($_SESSION['comment'])) // Проверка существования переменной
                            {
                                // Складываем значение полученной переменной с 10
                                $commented = $_SESSION['comment'];
                            }
                            // if (isset($_SESSION['phone'])) // Проверка существования переменной
                            // {
                            //     // Складываем значение полученной переменной с 10
                            //     $phoned = $_SESSION['phone'];
                            // }
                            
                                echo'<div class="form-group">
                                <label class="bmd-label-floating">Название</label>
                                <input value="'.$zd_name.'"type="text" class="form-control" name="name_item" id="name_item">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                
                                <input type="datetime-local" class="form-control" value="'.$timed.'" name="time_item" id="time_item">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label class="bmd-label-floating"> Пояснение </label>
                                  <textarea value="'.$commented.'" class="form-control" rows="5" name="comment_item" id="comment_item"></textarea>
                              </div>
                            </div>
                          </div>
                          <input id="PRODUCT" name="PRODUCT" type="hidden">
                          <input onclick="otpravka()" type="button" value="Сохранить" class="btn btn-success pull-right btn-round">
                        </form>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>';
        ?>


            </div>
            <!-- Content -->
        </div>
        <!-- Main Panel -->
    </div>
    <!-- wrapper -->

    <!-- MODAL -->
    
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

</body>

</html>