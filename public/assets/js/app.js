document.addEventListener(
    'DOMContentLoaded',
    function () {

        console.log(
            'JustificaUAT DSS'
        );

    }
);


document.addEventListener(
    'DOMContentLoaded',
    function(){

        const rol =
            document.getElementById('rol_id');

        const bloque =
            document.getElementById('datosAlumno');

        function actualizar()
        {
            if(rol.value == 3)
            {
                bloque.style.display = 'block';
            }
            else
            {
                bloque.style.display = 'none';
            }
        }

        rol.addEventListener(
            'change',
            actualizar
        );

        actualizar();
    }
);