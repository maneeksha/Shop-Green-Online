$(document).ready(function(){
  $('.checking_email').keyup(function(e){
    //alert("Hello am working");
    var email = $('.checking_email').val();
    //alert(email);

    $.ajax({
      type: 'post',
      url: 'login.php',
      data: {
            "check_submit_btn":1,
            "email_id": email,
      },
      success: function(response){
        //alert(response);
        $('.error_email').text(response);
      }

    });
 
  });
 
});