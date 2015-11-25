
// Functions
function getCookie(){
  var cookie = {};
  var tmp1 = document.cookie.split('; ');
  for (var key in tmp1){
    var tmp2 = tmp1[key].split('=');
    cookie[tmp2[0]] = tmp2[1];
  }
  return cookie;
}
//
function headerBtnTrigger(){
  var cookie = getCookie();
  if (cookie.user && cookie.auth){
    $('#btn_exit').parent('div.btn-group').removeClass('hidden');
    $('#btn_login').parent('div.btn-group').addClass('hidden');
  } else {
    $('#btn_exit').parent('div.btn-group').addClass('hidden');
    $('#btn_login').parent('div.btn-group').removeClass('hidden');
  }
}
 
// Events
$(document).ready(function(){
  
  // Замена кнопок главной панели
  headerBtnTrigger();
  
  // Вход на сайт
  $('#modal_login form').on('submit',function(){
    //
    // Тут будет запрос на сервер
    var data = $(this).serializeArray();
    document.cookie = 'user='+this.login.value;
    document.cookie = 'auth='+this.password1.value;
    //
    headerBtnTrigger();
    $('#modal_login :input').val('');
    $('#modal_login').modal('hide');
    event.preventDefault();
  });
  
  // Регистрация на сайте
  $('#modal_reg form').on('submit',function(){
    if (this.password1.value !== this.password2.value){
      $(this.password2).nextAll('span.help-block').text('Не совпадает с паролем');
      return false;
    } else {
      $(this.password2).nextAll('span.help-block').text('');
    }
    //
    // Тут будет запрос на сервер
    var data = $(this).serializeArray();
    document.cookie = 'user='+this.login.value;
    document.cookie = 'auth='+this.password1.value;
    //
    headerBtnTrigger();
    $('#modal_reg :input').val('');
    $('#modal_reg').modal('hide');
    event.preventDefault();
  });
    
  // Выход
  $('#btn_exit').on('click',function(){
    document.cookie = 'user=; auth=; expires=-1';
    headerBtnTrigger();
  });
});
