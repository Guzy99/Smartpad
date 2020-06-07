<?php
session_start();
// Оформление таблицы
require 'connect.php';

if (isset($_SESSION['id-user'])){
  $ses_id = $_SESSION['id-user'];
}
else{
  $new_url = 'logina.php';
  header('Location: '.$new_url);
}

$ses_id = $_SESSION['id-user'];
$colvo_vh = $_SESSION['colvo_vh'];

echo '<!DOCTYPE html>
      <html lang="en">';

echo '<head>'.
  '<meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    LOSTEC
  </title>'
  .'<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="css/nova.css" rel="stylesheet" />
  <link href="css/imaga.css" rel="stylesheet" />
  <link href="css/crazy_table.css" rel="stylesheet" />
  <link href="calendar.css" rel="stylesheet" />

  <link href="demo/demo.css" rel="stylesheet" />
</head>

<div class="wrapper ">
  <div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
  
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
        <li class="nav-item">
          <a class="nav-link" href="./profile.php">
            <i class="material-icons">account_box</i>
            <p>Профиль</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="./all_zadachi.php">
          <i class="material-icons">notifications</i>
            <p>Мои задачи
            <span class= "textr primetxt circle">'.$colvo_vh.'</span>
            </p>
          </a>
        </li>

        <li class="nav-item active">
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



    </nav>';
    //список месяцев с названиями для замены
$_monthsList = array(".01." => "Января", ".02." => "Февраля", 
".03." => "Марта", ".04." => "Апреля", ".05." => "Мая", ".06." => "Июня", 
".07." => "Июля", ".08." => "Августа", ".09." => "Сентября",
".10." => "Октября", ".11." => "Ноября", ".12." => "Декабря");

ini_set('date.timezone', 'Asia/Yekaterinburg');
date_default_timezone_set('Asia/Yekaterinburg');

//текущая дата
$currentDate = date("d.m.Y");
//переменная $currentDate теперь хранит текущую дату в формате 22.07.2015
 
//но так как наша задача - вывод русской даты, 
//заменяем число месяца на название:
$_mD = date(".m."); //для замены
$currentDate = str_replace($_mD, " ".$_monthsList[$_mD]." ", $currentDate);
    $now_date = date("Y-m-d");
    // $now_time = date("H:m:s");
    ?>
    

    <?php
echo'
<div class="content">
  <div class=" mb-50">
      <div class="row ">
          <div class="col-md-6 col-12">
              <div class="calendar light">
              <div class="calendar_header">
                  <h1 class = "header_title">Календарь</h1>
                  <p class="header_copy">Задания на сегодня</p>
              </div>
              <div class="calendar_plan">
                  <div class="cl_plan">
                    <div class="row">
                      <div class="col-8 col-md-8">
                        <div class="cl_title">Сегодня</div>
                        <div class="cl_copy">'.$currentDate.'</div>
                      </div>
                      <div class="col-4 col-md-4">
                        <div class="cl_add">
                        <a onclick="javascript:window.location=\'#iw-modal\'">
                        <span class="" ><i class="material-icons">add</i></span>
                      </a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>'
              ?>
              <div class="calendar_events">
               
              <div class="table-responsive">
              <table class="table table-hover textat" id="tabla1">
                <thead class="">
                <th>
                  Время
                </th>
                <th>
                  Кол-во
                </th>
                </thead>
                <tbody id="ss">

                <?php
                $count_to_echo_items = 0;
                  while($count_to_echo_items!=25){
                    $named_zadacha = "Задач";

                    $reDate1 = substr($now_date, 0, 4);
                    $reDate2 = substr($now_date, 5, 2);
                    $reDate3 = substr($now_date, 8, 2);
                
                    $reDate = $reDate1.$reDate2.$reDate3;

                    $qr_result15 = mysqli_query($link,"SELECT COUNT(*) FROM `zadachi` WHERE `id-user` = $ses_id AND `time_index` = $count_to_echo_items AND `date_index` = $reDate");
                    $rowa1 = mysqli_fetch_array($qr_result15);
                    $count_zadach = $rowa1[0];

                    if (($count_zadach > 21 && $count_zadach % 10 > 4) || ($count_zadach > 4 && $count_zadach <= 21) || $count_zadach == 0)
                    {
                      $named_zadacha = "Задач";
                    }
                    else if ($count_zadach == 1 || $count_zadach == 21)
                    {
                      $named_zadacha = "Задача";
                    }
                    else if (($count_zadach > 21 && $count_zadach % 10 <= 4) || ($count_zadach > 1 && $count_zadach <= 4))
                    {
                      $named_zadacha = "Задачи";
                    }
                    echo '
                    <tr>
                      <td>'.$count_to_echo_items.':00</td>
                      <td>
                        
                        <a href="all_zadachi.php?time='.$count_to_echo_items.'">'.$count_zadach.' '.$named_zadacha.'</a>
                      </td> 
                    </tr>';

                    $count_to_echo_items += 1;
                  }
                  ?>
                </tbody>
              </table>
              
            
            </div>
                  
              </div>

            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>

<!--   Модальное окно   -->
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
                        <form action="check_today.php" name="adder" method="post">
                          <div class="row">
                            <div class="col-md-12 col-12">
                              <div class="form-group">
                                <label class="bmd-label-floating"> Название </label>
                                <input type="text" class="form-control" name="zad_name">
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating"> </label>
                                
                                <input type="time" id="localdate" class="form-control" name="zd_time"/>
                              </div>
                            </div>
                          

                          <!-- <div class="row"> -->
                            <div class="col-md-12 col-12">
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
                          <!-- </div> -->
                          <!-- <div class="row"> -->
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label class="bmd-label-floating"> Пояснение </label>
                                  <textarea class="form-control" rows="5" name="zd_poyasn"></textarea>
                              </div>
                            </div>
                          <!-- </div> -->
                          <div class="col-8"></div>
                          <div class="col-4">
                            <input type="submit" value="Добавить" class="btn btn-success pull-right">
                          </div>
                         
                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!--   Core JS Files   -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
      <script>
              function setValue(el) {
                var show = el.dataset.from;

                      $.ajax({
                        type: 'GET',
                        url: 'script.php?show=' + show, 
                        success: function(data) {
                          console.log(show)
                        }
                      });

                  }  
                function setValue2(el) {
                var showe = el.dataset.from;
                console.log(showe)
                  $.ajax({
                    url: 'move.php',
                    type: "POST",
                    data: {
                      "number_check" : showe
                    },
                    success: function(responseText){
                      console.log("nice")
                    }
                  });
                }

                function otpravka(){
                  var n1=document.getElementById('name_item').value;
                  var n2=document.getElementById('time_item').value;  
                  var n3=document.getElementById('comment_item').value; 
                  $.ajax({
                    url: 'recover.php',
                    type: "POST",
                    data: {
                      "name_item" : n1,
                      "time_item" : n2,
                      "comment_item" : n3
                    },
                    success: function(responseText){
                      console.log("nice")
                      window.location.href = "/Smart_pad//all_zadachi.php";
                    }
                  });
                }

                $('.govnoed').click(function(){
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
                            }
                          });
                        }
                  });
                });

              </script>
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
<script>
$(document).ready(function(){
  //при нажатию на любую кнопку, имеющую класс .btn
  $(".ser").click(function() {
    //открыть модальное окно с id="myModal"
    $("#myModal").modal('show');
  });
});
</script>
</body>

</html>