jQuery(document).ready(function($){

	$("#btnnuevo").click(function(){
		$("#modalnuevo").modal("show");
	});

	var i=1;

	$("#add").click(function(){
		i++;
		$("#camposdinamicos").append('<tr id="row'+i+'"><td><label for="txtnombre" class="col-form-label" style="margin-left:5px"> Pregunta'+i+'</label></td><td><input type="text" name="name[]" id="name" class="form-control name_list"></td><td><button name="remove" id="'+i+'" class="btn btn-danger" style="margin-left:5px">x</button></td></tr>');
		return false;

	});
});