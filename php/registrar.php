<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>registrar</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 <style type="text/css">
 	.form_registrar {
    padding: 10px;
    background: #0d860d;
    color: white;
    border-radius: 3px;
    font-size: 12px;
	}
	.container{   border-width: 2px 2px 0px 2px;		  margin-top: 17px;
    float: left;}
 	.ok_ { background:#0d860d; }
	.bad_ {background: #bb0a0a; }
 </style>
</head>
<body>

	<!-- action="controller/RegistrarController.php" method="post" -->
		<div class="form_registrar"></div>
		<div class="container">
			<input type="text" id="nombre" name="nombre" placeholder="nombre" class="require">
			<input type="text" id="apellido" name="apellido" placeholder="apellido" class="require">
			<input type="text" id="usuario" name="usuario" placeholder="usuario" class="require">
			<input type="password" id="password" name="password" placeholder="contraseña" class="require">
			<input type="text" id="pais" name="pais" placeholder="pais" class="require">
			<input type="date" id="fechanacimiento" name="fechanacimiento" placeholder="fecha de nacimiento" class="require">
			<input type="email" id="email" name="email" placeholder="correo" class="require">
			<input type="text" id="telefono" name="telefono"  placeholder="telefono" class="require">	
			<!-- <input type="submit" id="guardar" value="guardar"> -->
		</div>
		
		
<input type="button" class="guardar" value="guardar">
	
</body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

<script >
	
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

var con_1 = 0;
var con_2 = 0;
var con_3 = 0;
var con_4 = 0;

$("#password").keyup(function(){
	var val = $(this).val();
	if(val.length<8 ){
		$(".form_registrar").addClass("bad_");
		$(".form_registrar").removeClass("ok_");
		$(".form_registrar").html("Password necesita minimo 8 caracteres ");
		con_1 = 0;
	} else if(val.length>=8){
		$(".form_registrar").addClass("ok_");
		$(".form_registrar").removeClass("bad_");
		$(".form_registrar").html("la password es buena ");
		con_1 = 1;
	}
});

$("#email").keyup(function(){
	var val = $(this).val();
	if(validateEmail(val)){
		$(".form_registrar").addClass("ok_");
		$(".form_registrar").removeClass("bad_");
		$(".form_registrar").html("Email valido");
		con_2 = 1;
			$.getJSON( "controller/validar_email.php", { email:val},function(data){
			console.log(data);		
			 // alert(data);
			if(data>0){
				
			$(".form_registrar").addClass("bad_");
			$(".form_registrar").removeClass("ok_");
			$(".form_registrar").html("User already exists <i class='icon-warning'></i>");	
			con_3 = 0;
			} else {

			$(".form_registrar").addClass("ok_");
			$(".form_registrar").removeClass("bad_");
			$(".form_registrar").html("User available <i class='icon-wink'></i>");
			con_3 = 1;	
			}
		});

	} else {
		$(".form_registrar").addClass("bad_");
		$(".form_registrar").removeClass("ok_");
		$(".form_registrar").html("Email no valido");	
		con_2 = 0;	
	}
});



	$(".guardar").click(function(){
		var yes = con_1+con_2+con_3;
		console.log(yes);
		if(yes==3){
		var num = 0;
		$(".require").each(function(){
			console.log($(this).val());
			if($(this).val() == '' || $(this).val() == null){
			$(this).addClass("focus");
			} else {
			$(this).removeClass("focus");
			num++;
			}
		});
		if(num<8){
			open_d("hay un campo vacio, revise el formulario");
		} else {
			var pass=$("#password").val();
			$(".form_registrar").addClass("ok_");
			$(".form_registrar").removeClass("bad_");
			$(".form_registrar").html("todo esta correcto");
			if($("#password").val()===pass){
				// var inputFileImage = document.getElementById("imagen");
				// var file = inputFileImage.files[0];
				var nombre = $("#nombre").val().toLowerCase();
				var apellido = $("#apellido").val().toLowerCase();
				var usuario = $("#usuario").val().toLowerCase();
				var password = $("#password").val().toLowerCase();
				var pais = $("#pais").val().toLowerCase();
				var fechanacimiento = $("#fechanacimiento").val().toLowerCase();
				var email = $("#email").val();
				var telefono = $("#telefono").val().toLowerCase();
				var form_data = new FormData();  
				form_data.append('nombre',nombre);  
				form_data.append('apellido',apellido);
				form_data.append('usuario',usuario);
				form_data.append('password',password);
				form_data.append('pais',pais);
				form_data.append('fechanacimiento',fechanacimiento);
				form_data.append('email',email);
				form_data.append('telefono',telefono);
				$.ajax({
                url: "controller/RegistrarController.php", 
            	type: 'POST',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                success: function(data){
					var dat = data.trim();
					alert(data);
					console.log(dat);
					if(dat>"0"){
						// open_m("Thanks for the information, now we redirect you to the placement test.");
						setTimeout(function(){
						window.location = "../index.html";	
						// window.location = "../platform/modules/test_start.php?name="+name+"&user="+user+"&native="+natives+"&id="+dat;
						}, 2000);			
					} else if(dat=="-1"){
						open_d("Existing user or email, please check the information");
					} else if(dat=="0"){
						open_d("Failed to connect to database, please try again");
					}
				}
			});

			} else {
				
				open_d("la password no coinciden ");
			}
		}//fin del si de los campos vacios 
	} else {
		$(".form_registrar").addClass("bad_");
		$(".form_registrar").removeClass("ok_");
		$(".form_registrar").html("Error: User exist, passwords don't match or password must be 8 characters <i class='icon-warning'></i>");
	}
	});


</script>
</html>