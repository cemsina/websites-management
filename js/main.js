function login(){
	$("a#login_button").prop("disabled", true );
	$("a#login_button").html("Loading...");
	$.ajax({
		type: "POST",
		url: "ajax/login.php",
		data: $("form#login_form").serialize(),
		success: function(cb){    
			if(cb == "true"){
				location.href="index.php";
			}else{
				$("#status .modal-title").html("Hata !");
				$("#status .modal-body").html(cb);
				$("#status").modal("show");
				$("a#login_button").prop("disabled", false );
				$("a#login_button").html("Login");
			}
		}
	});
}
function cemsinaAjaxRequest(id){
	var req = $("#"+id).attr("data-request");
	$.ajax({
		type: "POST",
		url: "ajax/"+req,
		data: $("#"+id).serialize(),
		success: function(cb){ 
			var json = $.parseJSON(cb);
			new PNotify(json);
		}
	});
}
function cemsina_run_php(php){
	$.ajax({
		type: "GET",
		url: php,
		data: null,
		success: function(cb){ 
			var json = $.parseJSON(cb);
			new PNotify(json);
		}
	});
}
function website_delete(id){
	$.ajax({
		type: "GET",
		url: 'ajax/website_delete.php?id='+id,
		data: null,
		success: function(cb){ 
			var json = $.parseJSON(cb);
			new PNotify(json);
		}
	});
}
function user_delete(id){
	$.ajax({
		type: "GET",
		url: 'ajax/user_delete.php?id='+id,
		data: null,
		success: function(cb){ 
			var json = $.parseJSON(cb);
			new PNotify(json);
		}
	});
}
function delete_model(table,id){
	$.ajax({
		type: "GET",
		url: 'ajax/delete.php?id='+id+'&table='+table,
		data: null,
		success: function(cb){ 
			var json = $.parseJSON(cb);
			new PNotify(json);
		}
	});
}
function data_list(id){
	$.ajax({
		type: "POST",
		url: 'ajax/data-list.php?id='+id,
		data: $("form#data-list-form").serialize(),
		success: function(cb){ 
			$("#data-list").html("");
			var json = $.parseJSON(cb);
			new PNotify(json[0]);
			if(json.length > 1){
				var toplam = 0;
				var toplam_user = 0;
				for(var i=1;i<json.length;i++){
					var the_user_part = (Math.floor(parseFloat(json[i].user_part)*parseFloat(json[i].the_data))/100);
					var the_data = Math.floor(parseFloat(json[i].the_data)*100)/100;
					toplam_user += the_user_part;
					toplam += the_data;
					$("#data-list").append('<tr><th scope="row">'+json[i].id+'</th><td>'+json[i].data_date+'</td><td>'+the_data+'</td><td>'+the_user_part+'</td></tr>');
				}
				toplam = Math.round(toplam*100)/100;
				toplam_user = Math.round(toplam_user*100)/100;
				$("#toplam").html("Toplam : "+toplam+" Payınız :" + toplam_user);
			}
		}
	});
}