function showFields(){
    var fields = $(".more-fields");
    var fields_container = $(".fields-container");
    
    if( fields_container.hasClass('closed')){
        $('#open_fields_btn>img').addClass('rotate-180');
        $('#open_fields_btn>img').removeClass('rotate-0');
        fields.show();
        showPerFields();
        fields_container.removeClass('closed');
        fields_container.animate({height: '300px'}, 'slow', function (){
        });
    }else{
        $('#open_fields_btn>img').removeClass('rotate-180');
        $('#open_fields_btn>img').addClass('rotate-0');
        fields_container.animate({height: '0px'}, 'slow', function (){
            fields_container.addClass('closed');
            fields.hide();
        });
    }
}
