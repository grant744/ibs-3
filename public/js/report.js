function close_report() {
    
    $(".fixed_report").css({
        'opacity' : '0',
        'right' : '0px',
    });    
}

$(document).ready(function(){

    $(".fixed_report").click(function(){

        close_report();

    }); 

    setInterval(close_report, 2000);

});