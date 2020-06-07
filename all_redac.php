<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    LOSTEC
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="css/nova.css" rel="stylesheet" />
  <link href="css/imaga.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="demo/demo.css" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
  <div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div id="iw-modal" class="iw-modal">
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
                      <!-- onsubmit="bootClick();return false; -->
                        <form action="check.php" name="adder" method="post">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Наименование</label>
                                <input type="text" class="form-control" name="id_gr">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Контактный телефон</label>
                                <input type="text" class="form-control" name="id_page">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Вознаграждение вернувшему</label>
                                <input type="text" class="form-control" name="time">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label class="bmd-label-floating"> Коментарий к вещи</label>
                                  <input type="text" class="form-control" rows="5" name="post">
                              </div>
                            </div>
                          </div>
                          <input type="submit" value="Добавить" class="btn btn-success pull-right">
                          <!-- <button onclick="javascript:window.location='#iw-close';" class="btn btn-success pull-right">Добавить</button> -->
                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- MODAL -->

    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        LOSTEC
      </a>
    </div>
    <div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item active  ">
          <a class="nav-link" href="./index.php">
            <i class="material-icons">home</i>
            <p>Домашняя</p>
          </a>
        </li>
        <li class="nav-item active  ">
          <a class="nav-link" href="./profile.php">
            <i class="material-icons">account_box</i>
            <p>Профиль</p>
          </a>
        </li>
        <li class="nav-item active  ">
          <a class="nav-link" href="./allitems.php">
            <i class="material-icons">cloud</i>
            <p>Мои вещи</p>
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
          <a class="navbar-brand" href="index.php">LOSTEC</a>
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
      </div>

      <!--Элементы добавляемые-->
      
      <div class="row" id="firstch">
        <?php
        $modal = "\"#iw-modal\"";
          require 'connect.php';
          $idstart = "http://api.qrserver.com/v1/create-qr-code/?size=150x150&color=black&data=";
          $qr_result = mysqli_query($link,"SELECT * FROM `items2`");
            while($data = mysqli_fetch_array($qr_result)){ 
              echo  '<div class="col-md-4 " id='."place".$data['id'].'> <div class="card card-chart"><div class="textat features_list">';
              echo  '<div class="card-header card-header-success">'.'<h4 class="text-uppercase">'.'<a href="'.$modal.'" class="textat text-white" ><i class="material-icons textlf"> create </i></a>'. $data['name'] .'<a  class="textat text-white" href="#" ><i class="material-icons textr"> clear </i></a>'.
              '</h4></div>';
              echo '<div class="ct-chart imgro">'.
              "<img width='150' height='150' alt='QR-код адреса статьи' src=". $idstart. $data['phone']. ">".
              '</div>';
              echo'<div class="nova-m-item textl">';
              echo'<ul class="list-unstyled">';
              echo '<li><i class="material-icons fifi">call</i><span>'. $data['phone'] .'</span></li>';
              echo '<li><i class="material-icons fifi">euro_symbol</i><span>'. $data['cash'] .'</span></li>';
              echo '<li><i class="material-icons fifi">subject</i><span>'. $data['comment'] .'</span></li>';
              echo     '</div></div></div></div>';   
        }
        ?>  
        <!-- <input type="button" onclick="javascript:window.location="#iw-modal"">       -->
<!-- <a id=“it-place'.$data['id'].'”></a> -->
        <!--<div class="col-md-4">-->
          <!--<div class="card card-chart">-->
            <!--<div class="textat features_list">-->
              <!--<div class="card-header card-header-success">-->
                <!--<h4 class="text-uppercase">Наименование товара</h4>-->
              <!--</div>-->
              <!--<div class="ct-chart imgro">-->
                <!--<img src="http://api.qrserver.com/v1/create-qr-code/?size=150x150&color=black&data=http://www.coolwebmasters.com/data-life-engine-dle/3630-qr-code-for-dle.html" width="150" height="150" alt="QR-код адреса статьи">-->
              <!--</div>-->
              <!--<ul class="list-unstyled">-->
                <!--<li >-->
                  <!--<span>Euismod ligula ipsum vulputate tellus.</span>-->
                <!--</li>-->
                <!--<li>-->
                  <!--<span>Morbi non efficitur nibh sit amet est eros.</span>-->
                <!--</li>-->
                <!--<li>-->
                  <!--<span>Fusce faucibus ante liberonec luctus egestas.</span>-->
                <!--</li>-->
              <!--</ul>-->
            <!--</div>-->
          <!--</div>-->
        <!--</div>-->

      </div>
    </div>
  </div>
</div>
<!--   Модальное окно   -->

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
</body>

</html>