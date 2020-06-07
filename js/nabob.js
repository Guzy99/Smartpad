var sachet= 0;
var inder= 0;
var idshka= 1;
var idstart = "http://api.qrserver.com/v1/create-qr-code/?size=150x150&color=black&data=";
function bootClick() {
    var debunk = " <a class=\"nav-link\" class=\"textat\" href=\"http://example.com\" id=\"navbarDropdownMenuLink\"  data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class=\"material-icons\">build</i></a>"
    var name = document.adder.id_gr.value;
    var post = document.adder.post.value;
    var id_page = document.adder.id_page.value;
    var time = document.adder.time.value;
    var checer = "<div class=\"form-check\"> <label class=\"form-check-label\"> <input name='dele"+ sachet +"' class=\"form-check-input\" type=\"checkbox\" > <span class=\"form-check-sign\"> <span class=\"check\"></span> </span> </label> </div>";
    var tbody = document.getElementById('tabla1').getElementsByTagName('tbody')[0];

    var row = document.createElement("TR");
    tbody.appendChild(row);

    var td1 = document.createElement("TD");
    var td2 = document.createElement("TD");
    var td3 = document.createElement("TD");
    var td4 = document.createElement("TD");
    var td5 = document.createElement("TD");
    var td6 = document.createElement("TD");
    var td7 = document.createElement("TD");
    sachet = sachet+1;
    inder = inder+1;

    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);
    row.appendChild(td4);
    row.appendChild(td5);
    row.appendChild(td6);
    row.appendChild(td7);

    td1.innerHTML = sachet;
    td2.innerHTML = name;
    td3.innerHTML = post;
    td4.innerHTML = id_page;
    td5.innerHTML = time;
    td6.innerHTML = debunk ;
    td7.innerHTML = checer ;
    $("#firstch").append(
    '<div class="col-md-4">'+
        '<div class="card card-chart">'+
        '<div class="textat features_list">'+
        '<div class="card-header card-header-success">'+
        '<h4 class="text-uppercase">'+ name +'</h4>'+
    '</div>'+
    '<div class="ct-chart imgro">'+
        "<img width=\"150\" height=\"150\" alt=\"QR-код адреса статьи\" src='" + idstart + sachet +"'>"+
        '</div>'+
        '<ul class="list-unstyled">'+
        '<li>'+
        '<i class="material-icons">\n' +
        'call\n' +
        '</i>'+
        '<span>'+ id_page +'</span>'+
    '</li>'+
    '<li>'+
        '<i class="material-icons">\n' +
        'euro_symbol\n' +
        '</i>'+
    '<span>'+ time +'</span>'+
    '</li>'+
    '<li>'+
        '<i class="material-icons">\n' +
        'subject\n' +
        '</i>'+
    '<span>'+ post +'</span>'+
    '</li>'+
    '</ul>'+
    '</div>'+
    '</div>'+
    '</div>'
        // "<img width=\"150\" height=\"150\" alt=\"QR-код адреса статьи\" src='" + idstart + idshka +"'>"
    );
    // console.log(id_page)
    // console.log(id_gr)
    // console.log(post)
    // console.log(time)
}
var table = document.getElementById('ss');
function deleteRows(table) {
    var inputs = table.getElementsByTagName("input");
    var i = inputs.length;
    while (i--) {
        var input = inputs[i];
        if (input.checked === true) {
            var tr = input.parentNode.parentNode;
            table.deleteRow(tr.rowIndex);
        }
    }
}