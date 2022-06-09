$(function(){

    $("#etaminim").on("input", function(event) {
        if ($("#etaminim").val() >= 18){
            $("#etamaxim").prop("disabled", false);
        }else{
            $("#etamaxim").prop("disabled", true);
        }
    });


    $("#etaminim").trigger('input');
    $("#titolo").prop('maxlength','100');      
    $("#capp").prop('maxlength','5');  
    $("#beds").prop('maxlength','5');
    $("#bedrooms").prop('maxlength','5');
    $("#price").prop('maxlength','8');
    $("#sup").prop('maxlength','4');
    $("#beds").prop('maxlength','3');
    $("#bedrooms").prop('maxlength','3');
    $("#desc").prop('maxlength','5000');  

    $('#titolo').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z0-9_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#etaminim').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#etamaxim').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });    
    
    $('#price').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9.]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#sup').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9.]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#prov').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#cit').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });

    $('#addr').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z0-9_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#capp').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#beds').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });    
    
    $('#bedrooms').on('input', function() {
    var c = this.selectionStart,
      r = /[^0-9]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    
    $('#desc').on('input', function() {
    var c = this.selectionStart,
      r = /[^a-z0-9_ ]/gi,
      v = $(this).val();
    if(r.test(v)) {
        $(this).val(v.replace(r, ''));
        c--;
    }
    this.setSelectionRange(c, c);
    });
    $('#tipo').change();
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        clearBtn: true,
        orientation: 'bottom',
        autoclose: true,
        todayHighlight: true
    });

});

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
