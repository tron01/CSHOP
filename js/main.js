function validateEmail() {
  // get value of input email
  var email = $("#r_email").val();
  // use reular expression
  var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (reg.test(email)) {
    return true;
  } else {
    return false;
  }
}
function alphanumeric()
{
 var name = $("#r_name").val(); 
 var letterNumber = /^[a-zA-Z]+$/;
 if(letterNumber.test(name)) {
   return true;
  }else{ 
   return false; 
  } 
}

$("document").ready(function () {
  
  
  
  /*slider function*/
  $(".slider").bxSlider({
    auto: true,
  });
  
  $(".slider2").bxSlider({
    auto: true,
  });

  
  /*register btn*/
 $("#register").click(function () {
    $("#register_error").html("");
    $("#rname_error").html("");
    $("#remail_error").html("");
    $("#rmobile_error").html("");
    $("#rpassword_error").html("");
    var name = $("#r_name").val();
    var email = $("#r_email").val();
    var mobile = $("#r_mobile").val();
    var password = $("#r_password").val();
    var is_error = "";

    /*name validation */
    if (name == "") {
      $("#rname_error").html("please enter the name");
      $("#r_name").css("border", "2px solid red");
      is_error = "yes";
    }
    if(alphanumeric() && name!=''){
      
      $("#r_name").css("border", "2px solid green");
    }else{
      $("#rname_error").html(" enter the name");
      $("#r_name").css("border", "2px solid red");
      is_error = "yes";
    }
    /*name validation end */

    /*email validation */
    if (email == "") {
      $("#remail_error").html("please enter the email");
      $("#r_email").css("border", "2px solid red");
      is_error = "yes";
    }else{
      if (validateEmail()==true) {
       
       $("#remail_error").html("");

       $("#r_email").css("border", "2px solid green");
     } else{
      is_error = "yes";
      $("#r_email").css("border", "2px solid red");
      $("#remail_error").html("not a vaild  email");   
    }
  }
    /*email  validation end*/

    /*mobile validation */
    if (mobile == "") {
      $("#rmobile_error").html("please enter the mobile");
      $("#r_mobile").css("border", "2px solid red");
      is_error = "yes";
    }else{
      $("#r_mobile").css("border", "2px solid green");
    }
    if (mobile.length < 10 && mobile!='') {
      $("#rmobile_error").html("mobile must be the 10 digits");
      $("#r_mobile").css("border", "2px solid red");
      is_error = "yes";
    }
    if (isNaN(mobile)) {
      $("#rmobile_error").html("enter only numeric valus");
      $("#r_mobile").css("border", "2px solid red");
      is_error = "yes";
    }
/* end mobile validation */

    if (password == "") {
      $("#rpassword_error").html("please enter the password");
      $("#r_password").css("border", "2px solid red");
      is_error = "yes";
    }

    if (is_error == "") {
      $.ajax({
        url: "register_submit.php",
        type: "post",
        data:
          "name=" +
          name +
          "&email=" +
          email +
          "&mobile=" +
          mobile +
          "&password=" +
          password,
        success: function (data2) {
          var res = $.trim(data2);
          if (res == "email_present") {
            $("#register_error").html("email present");
          }

          if (res == "insert") {
            $("#register_error").html("login now.....");
          }
        },
      });
    }
  });
  /*register btn end*/

  /*login btn */
  $("#user_login").click(function () {
    $("#login_error").html("");
    $("#name_error").html("");
    $("#pass_error").html("");
    var email = jQuery("#name").val();
    var password = jQuery("#login_password").val();
    var is_error = "";

    if (email == "") {
      $("#name_error").html("please enter the email");
      is_error = "yes";
    }
    if (password == "") {
      $("#pass_error").html("please enter the password");
      is_error = "yes";
    }

    if (is_error == "") {
      jQuery.ajax({
        url: "login_submit.php",
        type: "post",
        data: "email=" + email + "&password=" + password,
        success: function (data) {
          var result = $.trim(data);
          if (result == "wrong") {
            $("#login_error").html("wrong");
          } else if (result == "valid") {
            window.location.href='index.php';
          }
        },
      });
    }
  });
   /*login btn end */

   
  /*jquery_onload function end */ 
});









 




