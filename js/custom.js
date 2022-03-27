function send_compliant() {
  var message = jQuery("#message").val();

  if (message == "") {
    alert("Please enter message");
  } else {
    jQuery.ajax({
      url: "send_compliant.php",
      type: "post",
      data: "message=" + message,
      success: function (result) {
        alert(result);
      },
    });
  }
}

function send_message() {
  var name = jQuery("#name").val();
  var email = jQuery("#email").val();
  var mobile = jQuery("#mobile").val();
  var message = jQuery("#message").val();

  if (name == "") {
    alert("Please enter name");
  } else if (email == "") {
    alert("Please enter email");
  } else if (mobile == "") {
    alert("Please enter mobile");
  } else if (message == "") {
    alert("Please enter message");
  } else {
    jQuery.ajax({
      url: "send_message.php",
      type: "post",
      data:
        "name=" +
        name +
        "&email=" +
        email +
        "&mobile=" +
        mobile +
        "&message=" +
        message,
      success: function (result) {
        alert(result);
      },
    });
  }
}

/*add to cart btn */
function manage_cart(pid, type) {
  if (type == "update") {
    var qty = jQuery("#" + pid + "qty").val();
    if(qty<=0){
      qty=1;
    }
  } else {
    var qty = jQuery("#qty").val();
  }
  
    jQuery.ajax({
      url: "manage_cart.php",
      type: "post",
      data: "pid=" + pid + "&qty=" + qty + "&type=" + type,
      success: function (data) {
        if (type == "update" || type == "remove") {
          window.location.href = "cart.php";
        }
        jQuery(".cart_num").html(data);
      },
    });
  
}
/*add to cart btn end */

function sort_product_drop(cat_id, site_path) {
  var sort_product_id = jQuery("#sort_product_id").val();
  window.location.href =
    site_path + "categories.php?id=" + cat_id + "&sort=" + sort_product_id;
}
