function get_cookie ( cookie_name ){
    var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
   
    if ( results )
      return ( unescape ( results[2] ) );
    else
      return null;
  }
good = "#4caf50";

var nuled_size = get_cookie ( "nuled" );
nuled_size = parseInt(nuled_size, 10);
var three_size = get_cookie ( "three" );
three_size = parseInt(three_size, 10);
var six_size = get_cookie ( "six" );
six_size = parseInt(six_size, 10);
var nine_size = get_cookie ( "nine" );
nine_size = parseInt(nine_size, 10);
var twelve_size = get_cookie ( "twelve" );
twelve_size = parseInt(twelve_size, 10);
var fifty_size = get_cookie ( "fifty" );
fifty_size = parseInt(fifty_size, 10);
var eighteen_size = get_cookie ( "eighteen" );
eighteen_size = parseInt(eighteen_size, 10);
var twentyone_size = get_cookie ( "twentyone" );
twentyone_size = parseInt(twentyone_size, 10);

all_size = nuled_size + three_size + six_size + nine_size + twelve_size + fifty_size + eighteen_size + twentyone_size;

midl = Math.floor(all_size / 8)
console.log(all_size)
console.log(midl)

if (nuled_size > midl){
  nuled_color = "#4caf50"
}
else{
  nuled_color = "#e5e4e2"
}

if (three_size > midl){
  three_color = "#4caf50"
}
else{
  three_color = "#e5e4e2"
}

if (six_size > midl){
  six_color = "#4caf50"
}
else{
  six_color = "#e5e4e2"
}

if (nine_size > midl){
  nine_color = "#4caf50"
}
else{
  nine_color = "#e5e4e2"
}

if (twelve_size > midl){
  twelve_color = "#4caf50"
}
else{
  twelve_color = "#e5e4e2"
}

if (fifty_size > midl){
  fifty_color = "#4caf50"
}
else{
  fifty_color = "#e5e4e2"
}

if (eighteen_size > midl){
  eighteen_color = "#4caf50"
}
else{
  eighteen_color = "#e5e4e2"
}

if (twentyone_size > midl){
  twentyone_color = "#4caf50"
}
else{
  twentyone_color = "#e5e4e2"
}

google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Element", "Задачи", { role: "style" } ],
    ["0", nuled_size, nuled_color],
    ["3", three_size, three_color],
    ["6", six_size, six_color],
    ["9", nine_size, nine_color],
    ["12", twelve_size, twelve_color],
    ["15", fifty_size, fifty_color],
    ["18", eighteen_size, eighteen_color],
    ["21", twentyone_size, twentyone_color]
  ]);

  var view = new google.visualization.DataView(data);
  view.setColumns([0, 1,
                   { calc: "stringify",
                     sourceColumn: 1,
                     type: "string",
                     role: "annotation" },
                   2]);

  var options = {
    title: "Часы/Задачи",
    // height: 400,
    bar: {groupWidth: "95%"},
    legend: { position: "none" },
  };
  var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
  chart.draw(view, options);
}

// google.charts.load('current', {packages: ['corechart', 'bar']});
// google.charts.setOnLoadCallback(drawBasic);

// function drawBasic() {

//     var data = new google.visualization.DataTable();
//     data.addColumn('timeofday', '');
//     data.addColumn('number', 'Заданий выполнено');

//     data.addRows([
//       [{v: [0, 0, 0], f: '0'}, nuled_size],
//       [{v: [3, 0, 0], f: '3'}, nuled_size],
//       [{v: [6, 0, 0], f:'6'}, nuled_size],
//       [{v: [9, 0, 0], f: '9'}, nuled_size],
//       [{v: [12, 0, 0], f: '12'}, nuled_size],
//       [{v: [15, 0, 0], f: '15'}, nuled_size],
//       [{v: [18, 0, 0], f: '18'}, nuled_size],
//       [{v: [21, 0, 0], f: '21'}, nuled_size],
//       console.log(nuled_size)
//     //   [{v: [16, 0, 0], f: '4 pm'}, 9],
//     //   [{v: [17, 0, 0], f: '5 pm'}, 10],
//     ]);

//     var options = {
//       colors: ['#4caf50','#ef5350'],
//       title: 'Когда вы чаще всего выполняете задачи',
//       hAxis: {
//         title: '',
//         format: 'HH',
//         viewWindow: {
//           min: [0, 0, 0],
//           max: [22, 0, 0]
//         }
//       },
//     //   vAxis: {
//     //     title: 'Rating (scale of 1-10)'
//     //   }
//     };

//     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
//     chart.draw(data, options);
//   }