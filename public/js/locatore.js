$(function () {
    $('#tipo').change(function (event) {
        if ($('#tipo').val() == "-- Seleziona --") {
            $('#servizi').find('option').remove();
            return
        }
        $.ajax({
            type: 'GET',
            url: '',
            data: "reg=" + $('#selReg').val(),
            dataType: 'json',
            success: setProvince
        });
    });
});

function setProvince(data) {
    $('#selProv').find('option').remove();
    $.each(data, function (key, val) {
        $('#selProv').append('<option>' + val.Prov + '</option>');
        console.log(key+': '+val);
    });
}
