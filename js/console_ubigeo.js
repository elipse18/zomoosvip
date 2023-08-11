
// function listar_servicios(){
//     $.ajax({
//         url:'../controlador/servicios_controlador.php',
//         type:'POST'
//     }).done(function(resp){
//         var data = JSON.parse(resp);
//         var cadena="";
//         if(data.length>0){
//             for (var i =0; i < data.length; i++) {
//                 cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
                
//             }
//             $("#sel_servicio").html(cadena);
//             //var idservicio = $("#sel_servicio").val();
//             //listar_pronvincia(idservicio);
//         }else{
//             cadena +="<option value=''>'NO SE ENCONTRARON REGISTROS'</option>";
//             $("#sel_servicio").html(cadena);
//         }
//     })
// }

function listar_servicios() {
    $.ajax({
        url: '../controlador/servicios_controlador.php',
        type: 'POST',
        dataType: 'json', // Agrega esta línea para indicar que esperas una respuesta en formato JSON
    }).done(function (data) {
        var cadena = "";
        console.log(data);
            if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
            }
            $("#sel_servicio").html(cadena);
        } else {
            cadena += "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#sel_servicio").html(cadena);
        }
    });
}
