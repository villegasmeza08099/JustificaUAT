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



document.addEventListener('DOMContentLoaded', function () {

    const alumno = document.getElementById('alumno_id');
    const carrera = document.getElementById('carrera');

    console.log(alumno);
    console.log(carrera);

    function actualizarCarrera() {

        let opcion =
            alumno.options[
                alumno.selectedIndex
            ];

        console.log(opcion);
        console.log(opcion.dataset.carrera);

        carrera.value =
            opcion.dataset.carrera || '';
    }

    alumno.addEventListener(
        'change',
        actualizarCarrera
    );

    actualizarCarrera();

});



document.addEventListener('DOMContentLoaded', function(){

    const alumno =
        document.getElementById('alumno_id');

    const carrera =
        document.getElementById('carrera');

    function actualizarCarrera()
    {
        let opcion =
            alumno.options[
                alumno.selectedIndex
            ];

        carrera.value =
            opcion.dataset.carrera || '';
    }

    alumno.addEventListener(
        'change',
        actualizarCarrera
    );

    actualizarCarrera();
});



document.addEventListener('DOMContentLoaded', function(){

    const alumno =
        document.getElementById('alumno_id');

    const carrera =
        document.getElementById('carrera');

    alumno.addEventListener(
        'change',
        function(){

            let opcion =
                this.options[
                    this.selectedIndex
                ];

            carrera.value =
                opcion.dataset.carrera || '';

        }
    );

});