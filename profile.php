
<?php
require('top_user.php');

if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$user_id=$_SESSION['USER_ID'];
$res=mysqli_query($con,"SELECT * FROM user WHERE id='$user_id'");

?>

<style>
    .field_error{
        color:red;
    }
    body{
   
    background-color: #fff;
}
.avatar-xl img {
    width: 110px;
}
.rounded-circle {
    border-radius: 50% !important;
}
img {
    vertical-align: middle;
    border-style: none;
}
.text-muted {
    color: #aeb0b4 !important;
}
.text-muted {
    font-weight: 300;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #4d5154;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #eef0f3;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
  </style>
<div class="container-fluid bg-light"> 
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="#">profile</a></li>
      </ol>
    </nav>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8 mx-auto">
            <h2 class="h3 mb-4 page-title">Settings</h2>
            <div class="my-4">
                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Profile</a>
                    </li>
                </ul>
                <form>
                    <div class="row mt-5 align-items-center">
                        <div class="col-md-3 text-center mb-5">
                            <div class="avatar avatar-xl">
                                <img src="img/user _image.png" alt="..." class="avatar-img rounded-circle" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h4 class="mb-1"><?php echo $_SESSION['USER_NAME']?></h4>
                                    <p class="small mb-3"><span class="badge badge-dark"></span></p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-7">
                                    <p class="text-muted">
                                <?php    while($row=mysqli_fetch_assoc($res)){  ?>
                                       <span><?php echo $row['mobile']; ?></span><br>
                                       <span><?php echo $row['email']; ?> </span>
                                      <?php } ?>
                                    </p>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                   
                   <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="firstname">Name</label>
                          <input type="text" id="name" class="form-control"  placeholder="Your Name*" style="width:100%" value="<?php echo $_SESSION['USER_NAME']?>"   />
                          <span class="field_error" id="name_error"></span>
                        </div>
                     
                  </div>
                 
                  <div class="contact-btn">
                    <button type="button" class="btn btn-info" onclick="update_profile()" id="btn_submit">Update</button>
                    
                  </div>
                   </form>
                    
                    
                    <hr class="my-4" />
                    <div class="row mb-4">
                        <div class="col-md-6">
                          <h4 class="title-muted">Change Password</h4>

                            <div class="form-group">
                                <label for="inputPassword4">Current password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" id="inputPassword5" />
                                <span class="field_error" id="current_password_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword5">New Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control" id="inputPassword5" />
                                <span class="field_error" id="new_password_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword6">Confirm Password</label>
                                <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" id="inputPassword6" />
                                <span class="field_error" id="confirm_new_password_error"></span> 
                            </div>

                        </div>
                       
                    </div>
                    <button type="submit" onclick="update_password()" id="btn_update_password" class="btn btn-primary">Save Change</button>
                </form>
            </div>
        </div>
    </div>
    
    </div>

    <script>


      function update_profile(){
        jQuery('.field_error').html('');
        var name=jQuery('#name').val();
        if(name==''){
          jQuery('#name_error').html('Please enter your name');
        }else{
          jQuery('#btn_submit').html('Please wait...');
          jQuery('#btn_submit').attr('disabled',true);
          jQuery.ajax({
            url:'update_profile.php',
            type:'post',
            data:'name='+name,
            success:function(result){
              jQuery('#name_error').html(result);
              jQuery('#btn_submit').html('Update');
              jQuery('#btn_submit').attr('disabled',false);
              window.location.href='profile.php';

            }
          })
        }
      }
      
      function update_password(){
        jQuery('.field_error').html('');
        var current_password=jQuery('#current_password').val();
        var new_password=jQuery('#new_password').val();
        var confirm_new_password=jQuery('#confirm_new_password').val();
        var is_error='';
        
        if(current_password==''){
          jQuery('#current_password_error').html('Please enter password');
          is_error='yes';
        }if(new_password==''){
          jQuery('#new_password_error').html('Please enter password');
          is_error='yes';
        }if(confirm_new_password==''){
          jQuery('#confirm_new_password_error').html('Please enter password');
          is_error='yes';
        }
        
        if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
          jQuery('#confirm_new_password_error').html('Please enter same password');
          is_error='yes';
        }
        
        if(is_error==''){
          jQuery('#btn_update_password').html('Please wait...');
          jQuery('#btn_update_password').attr('disabled',true);
          jQuery.ajax({
            url:'update_password.php',
            type:'post',
            data:'current_password='+current_password+'&new_password='+new_password,
            success:function(result){
              jQuery('#current_password_error').html(result);
              jQuery('#btn_update_password').html('Update');
              jQuery('#btn_update_password').attr('disabled',false);
              jQuery('#frmPassword')[0].reset();
            }
          })
        }
        
      }
      </script>


</div>

<?php
require('footer_user.php');
?>

