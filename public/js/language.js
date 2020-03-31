

$(document).ready(function(){

    $('.language_event').change(function(){
        if ($('.language_event option:selected').val() == 'ru') {
            location.href = "?language=ru";
        }

        if ($('.language_event option:selected').val() == 'en') {
            location.href = "?language=en";
        }
    });

});