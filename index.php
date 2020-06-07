<?php 
session_start();

// Проверяю наличие сессии и если что перекидываю на страницу логина
if (isset($_SESSION['id-user'])){
  $ses_id = $_SESSION['id-user'];
}
else{
  $new_url = 'logina.php';
  header('Location: '.$new_url);
}
//Подключаем бд
require 'connect.php';

//Куки с количеством заданий за этот месяц
$qr_result12 = mysqli_query($link,"SELECT `colvo` FROM `done_zd`");
$data12 = mysqli_fetch_array($qr_result12);
$colvo = $data12[0];
setcookie ("colvo_now_month", $colvo);

//Узнаем сколько задачь существует
$qr_result1 = mysqli_query($link,"SELECT COUNT(*) FROM `zadachi`  WHERE `id-user` = $ses_id ");
$rowa = mysqli_fetch_array($qr_result1);
$colvo_vh = $rowa[0];
$_SESSION['colvo_vh'] = $colvo_vh;

ini_set('date.timezone', 'Asia/Yekaterinburg');
date_default_timezone_set('Asia/Yekaterinburg');
$time_when_zd_done = date("H");
$time_when_zd_done = (int)$time_when_zd_done;

//Создаем переменную настоящего времени
$now_time  = mktime(0,0,0 ,date("m"), date("d"), date("y"));
echo '<html lang="en">



<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    LOSTEC
  </title>';
  echo '<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="css/nova.css" rel="stylesheet" />
  <link href="css/imaga.css" rel="stylesheet" />
  <link href="css/menu.css" rel="stylesheet" />
  
  <script src="js/time.js"></script>
  <!-- CSS Just for demo purpose, don"t include it in your project -->
  <link href="demo/demo.css" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="http://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" /> -->
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
        <li class="nav-item active">
          <a class="nav-link" href="./index.php">
            <i class="material-icons">home</i>
            <p>Домашняя</p>
          </a>
        </li>
        <li class="nav-item  ">
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
<!-- MENU MOBILE -->



<!-- END MENU MOBILE -->
    <div class="content">
      <div class="container-fluid">
      </div>

          <div id="iw-modal_2" class="iw-modal">
            <div class="iw-modal-wrapper">
              <div class="iw-CSS-modal-inner">
                <div class="iw-modal-text">
                  <div class="col-md-8 c_pad">
                    <div class="card bup">
                      <div class="card-header card-header-success">
                        <h4 class="card-title">Выберите вещи</h4>
                        <a href="#close" title="Закрыть" class="iw-close">×</a>
                      </div>
                      <div class="card-body">
                      <!-- onsubmit="bootClick();return false; -->
                      <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
                      <div class="table-responsive">
                  <table class="table table-hover textat" id="tabla1">
                    <thead class="">
                    <th>
                      ID
                    </th>
                    <th>
                      Наименование
                    </th>
                    <th>
                      Выбор
                    </th>
                    <!-- <th>
                      Вознаграждение
                    </th>
                    <th>
                      Комментарий
                    </th>
                    <th>
                      Телефон
                    </th>
                    <th>
                      Чекер
                    </th> -->
                    </thead>
                    <tbody id="ss">';
                    
                    require 'connect.php';
                    $qr_result = mysqli_query($link,"SELECT * FROM `zadachi` WHERE `id-user` = $ses_id");
                    $schet = 0;
                    while($data = mysqli_fetch_array($qr_result)){ 
                          echo '<tr>';
                          echo '<td>' . $data['id'] . '</td>' . '<td>' . $data['zd_name'] . '</td>'."<td><div class='form-check'> <label class='form-check-label'> <input name='formDoor[]' value='$schet' class='form-check-input' type='checkbox' > <span class='form-check-sign'> <span class='check'></span> </span> </label> </div> </td>" ;
                          //  '<td>' . $data['cash'] . '</td>' . '<td>' . $data['comment'] . '</td>' . '<td>' . $data['phone'] . '</td>' . 
                          //  "<td><div class='form-check'> <label class='form-check-label'> <input name='formDoor[]' value='$schet' class='form-check-input' type='checkbox' > <span class='form-check-sign'> <span class='check'></span> </span> </label> </div> </td>";
                          echo '</tr>';   
                          $schet = $schet+1;
                      }
                    
                   echo '</tbody>
                  </table>
                  <!-- </form> -->
                
                </div>
                </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="iw-modal" class="iw-modal">
            <div class="iw-modal-wrapper">
              <div class="iw-CSS-modal-inner">
                <div class="iw-modal-text">
                  <div class="col-md-8 c_pad">
                    <div class="card bup">
                      <div class="card-header card-header-success">
                        <h4 class="card-title">Добавление задачи</h4>
                        <a href="#close" title="Закрыть" class="iw-close">×</a>
                      </div>
                      <div class="card-body">
                      <!-- onsubmit="bootClick();return false; -->
                        <form action="check.php" name="adder" method="post">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating"> Название </label>
                                <input type="text" class="form-control" name="zad_name">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating"> </label>
                                
                                <input type="datetime-local" id="localdate" class="form-control" name="zd_time"/>
                              </div>
                            </div>
                          </div>';
                          ?>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">

                                  <select class="custom-select mr-auto" id="inlineFormCustomSelect" name="prioritet">
                                    <option selected>Выбери приоритет...</option>
                                    <option value="1">Очень важно</option>
                                    <option value="2">Важно</option>
                                    <option value="3">Не так важно</option>
                                    <option value="4">Терпит отлагательства</option>
                                  </select>

                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <textarea class="form-control" rows="5" name="zd_poyasn"> Пояснение </textarea>
                              </div>
                            </div>
                          </div>
                          <input type="submit" value="Добавить" class="btn btn-success pull-right btn-round">
                         
                         
                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

      <div class="col-md-16 c_pad">
      <?php
       require 'connect.php';
       ini_set('date.timezone', 'Asia/Yekaterinburg');
       date_default_timezone_set('Asia/Yekaterinburg');
       $now_date = date("Y-m-d");
     
       $qr_result20 = mysqli_query($link,"SELECT COUNT(*) FROM `zadachi` WHERE `id-user` = $ses_id AND `date` = '$now_date'");
       $rowa1 = mysqli_fetch_array($qr_result20);
       $colvo_vh_today = $rowa1[0];
     
       $qr_result21 = mysqli_query($link,"SELECT COUNT(*) FROM `zadachi` WHERE `id-user` = $ses_id AND `date` > '$now_date'");
       $rowa2 = mysqli_fetch_array($qr_result21);
       $colvo_vh_tomorow = $rowa2[0];
     
       $qr_result22 = mysqli_query($link,"SELECT COUNT(*) FROM `zadachi` WHERE `id-user` = $ses_id AND `date` < '$now_date'");
       $rowa3 = mysqli_fetch_array($qr_result22);
       $colvo_vh_nomore = $rowa3[0];
     
      ?>

      <div class="container-fluid">
        <div class="row mt-22">
          <!-- <div class="col-1"></div> -->
          <div class="col-4 ">
            <p class="font_top text-center"><?php echo"$colvo_vh_today"; ?></p>
            <h6 class="text-center white-txt">сегодня</h6>
          </div>
          <div class="col-4 mt-22">
            <p class="font_top text-center"><?php echo"$colvo_vh_tomorow"; ?></p>
            <h6 class="text-center white-txt">будущие</h6>
          </div>
          <div class="col-4 ">
            <p class="font_top text-center"><?php echo"$colvo_vh_nomore"; ?></p>
            <h6 class="text-center white-txt">просрочено</h6>
          </div>
          <!-- <div class="col-1"></div> -->
        </div>
        <div class="row mt-15">

              <div class="col-md-3 col-3 mrt10 mrb10">
              </div>

              <div class="col-md-3 col-3 mrt10 mrb10 text-center">
                <a onclick="javascript:window.location='#iw-modal'">
                    <span class=" primetxt circle_bg gg white-txt" ><i class="material-icons  pad-15">add</i></span>
                </a>
              </div>
              <div class="col-md- col- mrt10 mrb10">
              </div>
              <div class="col-md-3 col-3 mrt10 mrb10 text-center">
                <a onclick="javascript:window.location='#iw-modal_2'">
                  <span class=" primetxt circle_bg gg white-txt" ><i class="material-icons  pad-15">clear</i></span>
                </a>
              </div>
              <div class="col-md-3 col-3 mrt10 mrb10">
              </div>

<?php

//   <div class="col-md-12 col-12 card mrt30">
//   <div class="card card-plain no-marg">
//     <div class="card-body">
    

//     </div>
//   </div>
// </div>
  
          echo'
        </div>  
          
        <div class="row">  
          <div class="col-md-12 col-12 card mrt30">
              <div class="card card-plain no-marg">
                <div class="card-header card-header-success">
                <h4 class="card-title mt-0 textat">Задачи на сегодня 
                
                <span class= "textr primetxt circle">'.$colvo_vh_today.'</span>
                
                </h4>
                </div>
              <div class="card-body">
              
                <div class="table-responsive">
                  <table class="table table-hover textat" id="tabla1">
                    <thead class="">
                    <th>
                      Название
                    </th>
                    <th>
                      Время
                    </th>
                    <th>
                      <p class="skriv_on_phone"> Редактировать <p>
                    </th>
                    <th>
                      <p class="skriv_on_phone"> Выполнение <p>
                    </th>
                    <!-- <th>
                      Вознаграждение
                    </th>
                    <th>
                      Комментарий
                    </th>
                    <th>
                      Телефон
                    </th>
                    <th>
                      Чекер
                    </th> -->
                    </thead>
                    <tbody id="ss">';

                    $qr_result15 = mysqli_query($link,"SELECT * FROM `zadachi` WHERE `id-user` = $ses_id ORDER BY vazhnost ASC, zd_time ASC");
                    $schet = 0;
                    $schet_view = 1;
                    while($data = mysqli_fetch_array($qr_result15)){
                                           
                      $choise_date = $data['date'];
                      if ($now_date == $choise_date){

                              echo '<tr>';
                              echo "<td><a  class=\"textat\" href=\"all_zadachi.php#place".$data['id']."\" >" . $data['zd_name'] . "</a></td>".
                               '<td>'.$data['zd_time'].'</td>'.
                               "<td> <a class=\"textat\" href=\"all_zadachi.php#place".$data['id']."\" ><i class=\"material-icons\">build</i></a> </td>" .
                               "<td><div class='form-check'> <label class='form-check-label'> <input name='formDoor[]' value='".$data['id']."' class='form-check-input' type='checkbox' > <span class='form-check-sign'> <span class='check'></span> </span> </label> </div> </td>";
                              echo '</tr>';
                              $schet = $schet+1;
                              $schet_view = $schet_view +1 ;
                          }
                      }
                    // }
                    
                    echo '</tbody>
                  </table>
                  <!-- </form> -->
                
                </div>
                <button id="btn" class="btn btn-success pull-right btn-round" onClick="document.location.reload(true)" >Выполнил выбранные</button>
                      <br><p id="result" class="text-success"></p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 card mrt30">
              <div class="card card-plain no-marg">
                <div class="card-header card-header-success">
                <h4 class="card-title mt-0 textat">Задачи на будущее 
                
                <span class= "textr primetxt circle">'.$colvo_vh_tomorow.'</span>
                
                </h4>
                </div>
              <div class="card-body">
              
                <div class="table-responsive">
                  <table class="table table-hover textat" id="tabla1">
                    <thead class="">
                    <th>
                      Название
                    </th>
                    <th>
                      Время
                    </th>
                    <th>
                      <p class="skriv_on_phone"> Редактировать <p>
                    </th>
                    <th>
                      <p class="skriv_on_phone"> Выполнение <p>
                    </th>
                    <!-- <th>
                      Вознаграждение
                    </th>
                    <th>
                      Комментарий
                    </th>
                    <th>
                      Телефон
                    </th>
                    <th>
                      Чекер
                    </th> -->
                    </thead>
                    <tbody id="ss">';
                    
                    require 'connect.php';
                    $now_date = date("Y-m-d");
                    
                    $qr_result15 = mysqli_query($link,"SELECT * FROM `zadachi` WHERE `id-user` = $ses_id ORDER BY vazhnost ASC, zd_time ASC");
                    $schet = 0;
                    $schet_view2 = 1;
                    while($data = mysqli_fetch_array($qr_result15)){
                                           
                      $choise_date = $data['date'];
                      if ($now_date < $choise_date){
                        // $qr_result = mysqli_query($link,"SELECT * FROM `zadachi` WHERE `id-user` = $ses_id");
                        // while($data = mysqli_fetch_array($qr_result)){ 
                              echo '<tr>';
                              echo "<td><a  class=\"textat\" href=\"all_zadachi.php#place".$data['id']."\" >" . $data['zd_name'] . "</a></td>".
                               '<td>' . $data['zd_time'] . '</td>'.
                               "<td> <a  class=\"textat\" href=\"all_zadachi.php#place".$data['id']."\" ><i class=\"material-icons\">build</i></a> </td>" .
                               "<td><div class='form-check'> <label class='form-check-label'> <input name='formDoor[]' value='".$data['id']."' class='form-check-input' type='checkbox' > <span class='form-check-sign'> <span class='check'></span> </span> </label> </div> </td>"
                               ;
                              //  '<td>' . $data['cash'] . '</td>' . '<td>' . $data['comment'] . '</td>' . '<td>' . $data['phone'] . '</td>' . 
                              //  "<td><div class='form-check'> <label class='form-check-label'> <input name='formDoor[]' value='$schet' class='form-check-input' type='checkbox' > <span class='form-check-sign'> <span class='check'></span> </span> </label> </div> </td>";
                              echo '</tr>';   
                              $schet = $schet+1;
                              $schet_view2 = $schet_view2 +1 ;
                          }
                      }
                    // }
                    
                  echo '</tbody>
                  </table>
                  <!-- </form> -->
                
                </div>'
                ?>
                <button id="btn2" class="btn btn-success pull-right btn-round" onClick='' >Выполнил выбранные</button>
                      <br><p id="result" class="text-success"></p>
              <?php
              echo'</div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12 card mrt30">
              <div class="card card-plain no-marg">
                <div class="card-header card-header-danger">
                <h4 class="card-title mt-0 textat">Просрочные задания 
                
                <span class= "textr atxt circle">'.$colvo_vh_nomore.'</span>
                
                </h4>
                </div>
              <div class="card-body">
              
                <div class="table-responsive">
                  <table class="table table-hover textat" id="tabla1">
                    <thead class="">
                    <!-- <th>
                      Номер
                    </th> -->
                    <th>
                      Название
                    </th>
                    <th>
                      Время
                    </th>
                    <th>
                      <p class="skriv_on_phone">Редактировать<p>
                          
                    </th>
                    <th>
                    <p class="skriv_on_phone"> Выполнение <p>
                    </th>
                    <!-- <th>
                      Вознаграждение
                    </th>
                    <th>
                      Комментарий
                    </th>
                    <th>
                      Телефон
                    </th>
                    <th>
                      Чекер
                    </th> -->
                    </thead>
                    <tbody id="ss">';
                    
                    require 'connect.php';
                    $now_date = date("Y-m-d");
                    
                    $qr_result15 = mysqli_query($link,"SELECT * FROM `zadachi` WHERE `id-user` = $ses_id ORDER BY vazhnost ASC, zd_time ASC");
                    $schet = 0;
                    $schet_view2 = 1;
                    while($data = mysqli_fetch_array($qr_result15)){
                                          
                      $choise_date = $data['date'];
                      if ($now_date > $choise_date){
                        // $qr_result = mysqli_query($link,"SELECT * FROM `zadachi` WHERE `id-user` = $ses_id");
                        // while($data = mysqli_fetch_array($qr_result)){ 
                              echo '<tr>';
                              echo 
                              // "<td><a  class=\"textat\" href=\"all_zadachi.php#place".$data['id']."\" >" . $schet_view2 . "</a></td>" .
                               "<td><a  class=\"text-danger\" href=\"all_zadachi.php#place".$data['id']."\" >" . $data['zd_name'] . "</a></td>".
                               '<td>' . $data['zd_time'] . '</td>'.
                               "<td> <a  class=\"textat\" href=\"all_zadachi.php#place".$data['id']."\" ><i class=\"material-icons text-danger\">build</i></a> </td>" .
                               "<td><div class='form-check'> <label class='form-check-label'> <input name='formDoor[]' value='".$data['id']."' class='form-check-input' type='checkbox' > <span class='form-check-sign'> <span class='check'></span> </span> </label> </div> </td>"
                               ;
                              //  '<td>' . $data['cash'] . '</td>' . '<td>' . $data['comment'] . '</td>' . '<td>' . $data['phone'] . '</td>' . 
                              //  "<td><div class='form-check'> <label class='form-check-label'> <input name='formDoor[]' value='$schet' class='form-check-input' type='checkbox' > <span class='form-check-sign'> <span class='check'></span> </span> </label> </div> </td>";
                              echo '</tr>';   
                              $schet = $schet+1;
                              $schet_view2 = $schet_view2 +1 ;
                          }
                      }
                    // }
                    ?>
                    </tbody>
                  </table>
                  <!-- </form> -->
                
                </div>
                <button id="btn3" class="btn btn-danger pull-right btn-round" onClick="" >Выполнил выбранные</button>
                      <br><p id="result" class="text-success"></p>
              </div>
            </div>
          </div>


        </div>
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
<!-- new scr -->

<!-- write scr -->
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();
    });
    $("#iw-modal_2").on("show", function () {
  $("body").addClass("modal-open");
}).on("hidden", function () {
  $("body").removeClass("modal-open")
});
</script>

<script>
$('#btn').click(function(){
  var values = [];
  $('input[type="checkbox"]:checked').each(function() {
      values.push($(this).val());
      console.log(values);
        for(var i=0; i < values.length; i++){
          var number_check = values[i];
          console.log(number_check)
          $.ajax({
            url: 'move.php',
            type: "POST",
            data: {
              "number_check" : number_check
            },
            success: function(responseText){
              console.log(responseText)
              location.reload()
            }
          });
        }
  });
});
$('#btn2').click(function(){
  var values = [];
  $('input[type="checkbox"]:checked').each(function() {
      values.push($(this).val());
      console.log(values);
        for(var i=0; i <= values.length; i++){
          var number_check = values[i];
          console.log(number_check)
          $.ajax({
            url: 'move.php',
            type: "POST",
            data: {
              "number_check" : number_check
            },
            success: function(responseText){
              console.log(responseText)
              location.reload()
            }
          });
        }
  });
});
$('#btn3').click(function(){
  var values = [];
  $('input[type="checkbox"]:checked').each(function() {
      values.push($(this).val());
      console.log(values);
        for(var i=0; i < values.length; i++){
          var number_check = values[i];
          console.log(number_check)
          $.ajax({
            url: 'move.php',
            type: "POST",
            data: {
              "number_check" : number_check
            },
            success: function(responseText){
              location.reload()
              console.log(responseText)
            }
          });
        }
  });
});

</script>

</body>

</html>