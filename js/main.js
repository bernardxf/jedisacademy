const menu = document.getElementById('menu');
const menuHamburguer = document.getElementById('menu-hamburguer');

menuHamburguer.onclick = function () {
  menu.classList.toggle('active');
}

$('#phone').mask('(99) 99999-9999');

$('#form-contato').on('submit', function (event) {
  event.preventDefault();
  // console.log($(this).serialize());

  var name  = $('#name').val();
  var email = $('#email').val();
  var age = $('#age').val();
  var phone = $('#phone').val();
  var city = $('#city').val();
  var availability = $('#availability').val();
  var schooling = $('#schooling').val();
  var experience = $('#experience').val();
  var classes = $('#classes').val();
  var citiesWork = $('#cities-work').val();
  

  var urlData = "&name=" + name +
			"&email=" + email +
			"&age=" + age +
			"&phone=" + phone +
			"&city=" + city +
			"&availability=" + availability +
			"&schooling=" + schooling +
			"&experience=" + experience +
			"&classes=" + classes +
			"&citiesWork=" + citiesWork ;

  $.ajax({
    type: "POST",
    url: "sendmail.php",
    async: true,
    data: urlData,
    success: function (data) {
      $('#retornoHTML').html(data);
    },
    beforeSend: function () {
      $('.loading').fadeIn('fast');
    },
    complete: function () {
      $('.loading').fadeOut('fast');
    }
  });
  
  $(this)[0].reset();
});