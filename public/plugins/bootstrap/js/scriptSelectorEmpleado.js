function filtrar() {

	var id = $('#legajo').val();

	$.ajax({
        type: 'get',
        url: 'getPersonal', 
        data: {
            'id': id
        },
        dataType: 'json', // a JSON object to send back
        success: function (response) {
            $.each(response.empleado, function (key, registro) {
                $("#nombre").append('<input value=' + registro.apeynom + '>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
       		console.log(errorThrown);
        }
    });
}