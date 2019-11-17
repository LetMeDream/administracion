$(document).ready(function(){


    $(document).on('click', '.myLabel', function(){

        /** ¿Cuanto más necesito para ser Dios? */
        let span = $(this);
        let form = span.parent().prev().prev().children().first();
        console.log(form);
        form.submit();

    });


});