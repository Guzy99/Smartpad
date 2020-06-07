<?php
session_start();

if (isset($_SESSION['id-user'])){
  $ses_id = $_SESSION['id-user'];
}
else{
  $new_url = 'logina.php';
  header('Location: '.$new_url);
}

$ses_id = $_SESSION['id-user'];
$colvo_vh = $_SESSION['colvo_vh'];
echo 
'<!DOCTYPE html>
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

  <link href="demo/demo.css" rel="stylesheet" />
</head>

<body>
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
  </div>';?>



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
    <!-- End Navbar -->

    <div class="content">
      <!--Элементы добавляемые-->
      <div class="row mt-22">
          <!-- <div class="col-1"></div> -->
          <div class="col-4 ">
            <p class="font_top text-center">0</p>
            <h6 class="text-center white-txt">сегодня</h6>
          </div>
          <div class="col-4 mt-22">
            <p class="font_top text-center">0</p>
            <h6 class="text-center white-txt">будущие</h6>
          </div>
          <div class="col-4 ">
            <p class="font_top text-center">1</p>
            <h6 class="text-center white-txt">просрочено</h6>
          </div>
          <!-- <div class="col-1"></div> -->
        </div>

        <div class="row mt-15">

              <!-- <div class="col-md-3 col-3 mrt10 mrb10">
              </div> -->
              
              <div class="col-md-6 col-6 mrt10 mrb10 text-center">
                <?php 
                // 1 = ASC
                // 0 = DESC
                $t = $_SESSION['t'];
                $o = $_SESSION['o'];
                if($t == 0){
                  $pokaz_t = 'arrow_downward';
                }
                elseif($t == 1){
                  $pokaz_t = 'arrow_upward';
                }

                if($o == 0){
                  $pokaz_o = 'arrow_downward';
                }
                elseif($o == 1){
                  $pokaz_o = 'arrow_upward';
                }

                echo'<a href="php/sort.php?o='.$o.'">
                    <span class=" primetxt circle_bg gg white-txt">Важность<i class="material-icons  pad-15">'.$pokaz_o.'</i></span>
                </a>
              </div>
              <div class="col-md- col- mrt10 mrb10">
              </div>
              <div class="col-md-6 col-6 mrt10 mrb10 text-center">
                <a href="php/sort.php?t='.$t.'">
                  <span class=" primetxt circle_bg gg white-txt">Время<i class="material-icons  pad-15">'.$pokaz_t.'</i></span>
                </a>
                ';
                ?>
              </div>
              <!-- <div class="col-md-3 col-3 mrt10 mrb10">
              </div> -->


        </div>
      
      <div class="row" id="firstch">

        <?php
          require 'connect.php';
          if (isset($_SESSION['sort_o'])){
            $sort_o = $_SESSION['sort_o'];
          }
          else{
            $sort_o = 'ASC';
          }

          if (isset($_SESSION['sort_t'])){
            $sort_t = $_SESSION['sort_t'];
          }
          else{
            $sort_t = 'ASC';
          }
          // Залить на хост
          if (isset($_GET['time'])){
            $time_from_calendar = $_GET['time'];
            $qr_result = mysqli_query($link,"SELECT * FROM `zadachi` WHERE `id-user` = $ses_id AND `time_index`= $time_from_calendar ORDER BY vazhnost $sort_o, zd_time $sort_t");
          }
          else{
            $qr_result = mysqli_query($link,"SELECT * FROM `zadachi` WHERE `id-user` = $ses_id ORDER BY vazhnost $sort_o, zd_time $sort_t");
          }
          // Залить на хост
          // Изменен селектор SQL
          // Выборка в зависимости от параметра get запроса из calendar_all_day.php
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
              
            // $counter="<script>document.write(show);</script>"; 
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
    </div>
  </div>
</div>
<!--   Модальное окно   -->

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