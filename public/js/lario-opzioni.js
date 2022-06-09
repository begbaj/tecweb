
function showFields(id){
    var fields_container = $(".fields-container-" + id);
    var fields = fields_container.find("*");
    var btn = $('#open_fields_btn-' + id);
    

    if( fields_container.hasClass('closed')){
        btn.addClass('rotate-180');
        btn.removeClass('rotate-0');

        fields.show();
        fields_container.removeClass('closed');
        fields_container.css('height', 'auto');
        var autoHeight = fields_container.height();
        fields_container.height(0).animate({height: autoHeight}, 'slow');
    }else{
        btn.removeClass('rotate-180');
        btn.addClass('rotate-0');
        fields_container.animate({height: '0px'}, 'slow', function (){
            fields_container.addClass('closed');
            fields.hide();
        });
    }
}
