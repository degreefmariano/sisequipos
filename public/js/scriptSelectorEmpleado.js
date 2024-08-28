function cargar() {

	var id = $('#legajo').val();


	$.ajax({
        type: 'get',
        url: '../getPersonal', 
        data: {
            'id': id
        },
        dataType: 'json', // a JSON object to send back
        success: function (response) {
            $.each(response.empleado, function (key, registro) {
                $("#personal_entrega").val(registro.ni+" "+registro.apeynom);
                
            });
        },
        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
       		console.log(errorThrown);
        }
    });
}

function cargarDev() {

    var id = $('#legajoDev').val();


    $.ajax({
        type: 'get',
        url: '../getPersonalDev', 
        data: {
            'id': id
        },
        dataType: 'json', // a JSON object to send back
        success: function (response) {
            $.each(response.empleado, function (key, registro) {
                $("#personal_retira").val(registro.ni+" "+registro.apeynom);
                
            });
        },
        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
            console.log(errorThrown);
        }
    });
}