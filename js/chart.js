function get_cookie ( cookie_name ){
  var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
 
  if ( results )
    return ( unescape ( results[2] ) );
  else
    return null;
}

var now_position = get_cookie ( "to_graph" );

var otric = 100 - now_position ;

now_position = 100 - otric;

colvo_now_month = get_cookie ( "colvo_now_month" );

google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['', 'Заданий'],
          ["Этот месяц", colvo_now_month],
          ["Прошлый", colvo_now_month]
          // ["Knight to King 3 (Nf3)", 12],
          // ["Queen's bishop pawn (c4)", 10]
        ]);

        var options = {
          title: 'Ваши задачи в этом месяце',
          // width: 200,
          colors: ['#4caf50','#ef5350'],
          legend: { position: 'none' },
          chart: { title: 'Выполненные задания',
                   subtitle: 'Изменения за месяц'
                   },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            // x: {
            //   0: { side: 'top', label: 'Percentage'} // Top x-axis.
            // }
          },
          bar: { groupWidth: "50%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
      
      
      
