
function seller_send_compliant(){
	
	var seller_message=jQuery("#seller_message").val();
	

 if(seller_message==""){
		alert('Please enter message');
	}else{
		jQuery.ajax({
			url:'seller_send_compliant.php',
			type:'post',
			data:'message='+seller_message,
			success:function(result){
				alert(result);
        
			}	
		});
	}
}
