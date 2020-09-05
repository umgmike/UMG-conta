$("#registro").click(function() {
    var numero_partida = $("#numero_partida").val();
    var fecha_asiento = $("#fecha_asiento").val();
    var descripcion = $("#descripcion").val();
    var total_debe = $("#totald").text();
    var total_haber = $("#totalh").text();
    var myTableArray = [];
    var route = "/crear_asiento";
    var token = $("#token").val();

    $("table#detalle_compra tr").each(function() {
        var arrayOfThisRow = [];
        var tableData = $(this).find('td');
        if (tableData.length > 0) {
            tableData.each(function() { arrayOfThisRow.push($(this).text()); });
            myTableArray.push(arrayOfThisRow);
        }
    });

    $.ajax({
        url: route,
        headers: { 'X-CSRF-TOKEN': token },
        type: 'POST',
        dataType: 'json',
        data: {
            fecha_asiento: fecha_asiento,
            numero_partida: numero_partida,
            total_debe: total_debe,
            total_haber: total_haber,
            descripcion: descripcion,
            tab: myTableArray,
        },

        success: function(data) {
            location.reload();  
        },
        error: function(msj) {
        }
    });
});