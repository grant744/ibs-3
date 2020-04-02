

$(document).ready(function(){

    $('.language-event').change(function(){
        if ($('.language-event option:selected').val() == 'ru') {
            location.href = '/language/ru';
        }

        if ($('.language-event option:selected').val() == 'en') {
            location.href = '/language/en';
        }
    });

});