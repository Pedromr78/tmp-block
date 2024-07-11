export const init = (userid, courseid, url) => {
    // Enviar los datos utilizando AJAX
    function enviarDatos() {
        if (courseid > 1) {

            YUI().use('io', function (Y) {
                var url = '/blocks/tmp/guardar_salida.php'; // Cambia esta URL por la URL de tu API o endpoint
            // Obtener los datos que quieres enviar
                const formData = {
                    userid: userid,
                    courseid: courseid,
                  };
                // Configuración de la solicitud
                var config = {
                    method: 'POST',
                    data: formData,
                    async: true,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' // Asegúrate de que el servidor acepte JSON
                    },
                    on: {
                        success: function (id, response) {
                            // Maneja la respuesta exitosa aquí
                            console.log('Respuesta:', response.responseText);
                        },
                        failure: function (id, response) {
                            // Maneja los errores aquí
                            console.log('Error:', response.statusText);
                        }
                    }
                };
            
                // Realiza la solicitud
                Y.io(url, config);
            });


        }

    }


    // window.addEventListener('pagehide', enviarDatos);
    window.addEventListener('beforeunload', enviarDatos)
    window.console.log('Tmp Amd started');
};
