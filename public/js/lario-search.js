$(function () {
    //inizializza datepickers
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        clearBtn: true,
        orientation: 'bottom auto',
        autoclose: true,
        todayHighlight: true,
    });
    $(".more-fields").hide();
});    

function updateServs(data){
    var servspick = $('#servizi');
    var nearpick = $('#vicino');
    var allservs = $(".servs");

    allservs.find('option').remove();
    $.each(data, function (key, val) {
        var element = '<option class="no-ctrl" value="' + val.id + '">' + val.nome.replace(/vicino_/, '').replace(/_/g, ' ') + '</option>';
        if (val.nome.includes('vicino_')){
            nearpick.append(element);
        }
        else{
            servspick.append(element);
        }
    });

    // selezione multipla senza ctrl
    $('.no-ctrl').mousedown(function(e) {
        e.preventDefault();
        var originalScrollTop = $(this).parent().scrollTop();
        console.log(originalScrollTop);
        $(this).prop('selected', $(this).prop('selected') ? false : true);
        var self = this;
        $(this).parent().focus();
        setTimeout(function() {
            $(self).parent().scrollTop(originalScrollTop);
        }, 0);
    return false;
    });
}

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

function showPerFields(){;
    var tipo = $("#tipo");
    var allApp = $(".appartamento");
    var allLet = $(".letto");

    if ( tipo.val() == "posto_letto" ){
        allApp.prop('disabled', true);
        allApp.hide();
        allLet.prop('disabled', false);
        allLet.show();
    }
    else{
        allLet.prop('disabled', true);
        allLet.hide();
        allApp.prop('disabled', false);
        allApp.show();
    }
}

$('#filter-form').submit(function() {
    $('#filter-form').find('input').each(function(elem){
          if (elem.val() === undefined || elem.val() === "") {
            elem.prop('name', 'empty_' + elem.attr('name'));
          } else {
            elem.prop('name', elem.attr('name'));        
          }
    });
});
