function doElemValidation(id, actionUrl, formId){
	var elems;

	console.log(id);
	console.log(formId);
	console.log(actionUrl);

	function addFormToken(){
		var tokenVal = $("#" + formId + " input[name=_token]").val();
		elems.append('_token', tokenVal);
	}
	
	function sendAjaxReq(){
		$.ajax({
			type: 'POST',
			url: actionUrl,
			data: elems,
			dataType: "json",
			error: function (data){
				if (data.status == 422) {
					$("#" + id).after(getErrorList(JSON.parse(data.responseText)[id]));
				}
			},
			contentType: false,
			processData: false
		});
	}

	var elem = $('#' + formId + " :input[name="+id+"]");
	inputVal = elem.val();
	elems = new FormData();
	elems.append(id, inputVal);
	addFormToken();
	sendAjaxReq();
	
};

function getErrorList(errors){
	var errorlist = '<ul class="errors">';
	for (var i = 0; i < errors.length; i++){
		errorlist +='<li>' + errors[i] + '</li>';
	}
	errorlist += '</ul>';
	return errorlist;
}

function editForm(){
	$('#editButtons, #passForm').toggleClass('visually-hidden');
        $('#birthday').toggleClass('text-muted');
        $('#nome, #lastname, #birthday, #gender,  #username').prop('disabled', false);
}
