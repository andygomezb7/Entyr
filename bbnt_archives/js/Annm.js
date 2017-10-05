var anonimo = {
	login: function () {
mydialog.loading('Espera...');
$.post(global_data.url+'/ajax/babanta-login.php?time='+Math.round(Math.random()*1000000), function(h){
	mydialog.end_loading();
mydialog.show(true);
mydialog.title('Ingresar a '+global_data.name);
mydialog.body(h);
mydialog.buttons(true, true, 'Entrar', 'anonimo.loginset()', true, true, true, 'Cancelar', 'close', true, false);
mydialog.center();
});
	},
	register: function () {
//mydialog.alert('Registro','<div class="alert alert-danger">Registro cerrado temporamente. contacta a: <ul><li><a href="mailito:andygomezb7@gmail.com">andygomezb7@gmail.com</a></li><li><a href="mailito:luisunion11@hotmail.com">luisunion11@hotmail.com</a></li></ul></div>');
mydialog.loading('Espera...');
$.post(global_data.url+'/ajax/babanta-register.php?time='+Math.round(Math.random()*1000000), function(h){
mydialog.end_loading();
mydialog.show(true);
mydialog.title('Registrarme en '+global_data.name);
mydialog.body(h);
mydialog.buttons(true, true, 'Registrarme', 'anonimo.registerset()', true, true, true, 'Cancelar', 'close', true, false);
mydialog.center();
});
	},
	loginset: function(){
var params = $('#loginform input[name], #loginform select[name], #loginform textarea[name]');
$.ajax({
type: 'POST',
url: global_data.url+'/ajax/babanta-login.php?eject=true&time='+Math.round(Math.random()*1000000),
data: $.param(params),
beforeSend: function(){
$('#mydialog #procesando #error').fadeIn(250).html('Enviando...');
},
success: function(h){
switch(h.charAt(0)){
case 0: case '0': default:
$('#mydialog #procesando #error').fadeIn(250).html(h.substring(3));
break;
case 1: case '1':
$('#mydialog #procesando #error').fadeIn(250).html('Actualizando...');
location.reload(true);
break;
}
},
error: function(){
mydialog.error_500("anonimo.loginset()");
}
});
	},
	registerset: function(){
var params = $('#registerform input[name], #registerform select[name], #registerform textarea[name]');
$.ajax({
type: 'POST',
url: global_data.url+'/ajax/babanta-register.php?eject=true&time='+Math.round(Math.random()*1000000),
data: $.param(params),
beforeSend: function(){
$('#mydialog #procesando #error').fadeIn(250).html('Enviando...');
},
success: function(h){
switch(h.charAt(0)){
case 0: case '0': default: grecaptcha.reset();
$('#mydialog #procesando #error').fadeIn(250).html(h.substring(3));
break;
case 1: case '1':
$('#mydialog #procesando #error').fadeIn(250).html('Actualizando...');
location.reload(true);
break;
}
},
error: function(){
mydialog.error_500("anonimo.registerset()");
}
});
	}
}