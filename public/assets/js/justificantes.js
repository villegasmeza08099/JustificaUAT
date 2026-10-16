document.addEventListener('DOMContentLoaded', function () {

    const alumno =
        document.getElementById('alumno_id');

    const carrera =
        document.getElementById('carrera');

    const materias =
        document.getElementById('materia_id');

    function actualizarFormulario()
    {
        let opcionAlumno =
            alumno.options[
                alumno.selectedIndex
            ];

        let carreraId =
            opcionAlumno.dataset.carreraId;

        carrera.value =
            opcionAlumno.dataset.carrera || '';

        Array
        .from(materias.options)
        .forEach(function(option){

            if(
                option.dataset.carreraId
                === carreraId
            ){
                option.hidden = false;
            }
            else{
                option.hidden = true;
            }

        });

        let primeraVisible =
            Array.from(materias.options)
            .find(option =>
                option.hidden === false
            );

        if(primeraVisible){
            materias.value =
                primeraVisible.value;
        }
    }

    alumno.addEventListener(
        'change',
        actualizarFormulario
    );

    actualizarFormulario();

});



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