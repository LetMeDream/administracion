$(document).ready(function(){

    /** Seteando precio y calculando total  */
    $(document).on('click', '.myLabel', function(){

        /** ¿Cuanto más necesito para ser Dios? */
        let span = $(this);
        let form = span.parent().prev().prev().children().first();
        console.log(form);
        form.submit();

    });

    /** Filtrando por mes */
    $(document).on('change', '#mySelect', function(){

        let select = $(this);

        let form = select.parent();
        form.submit();

    });

    /** Sumando columnas
     * Aunque ya esta funcionalidad no se usa (desde acá)
    */
    $(document).on('click', '#sumar', function(){

        let valoresAsignados = true;
        let sumandos = $('.sumandos');
        let valores = $('.valores');
        let resultado = 0;

        valores.each(function(i, element){
            if(isNaN($(this).html())){
                valoresAsignados = false;
                /* console.log($(this).html()); */
            }else{
                /* console.log($(this).html()); */
                /* resultado += $(this).html(); */
            }
        });


        if(valoresAsignados == false){
            alert('Hay valores no asignados');
        }else{
            /* console.log(resultado); */
            sumandos.each(function(i, elemento){
                console.log($(this).attr('valor'));
                let x = parseInt( $(this).attr('valor'),10 );
                resultado += x;
            });
        }

        console.log(resultado);
        if(valoresAsignados != false){
            $('.sumTotal').html(resultado);

        }



    });


});