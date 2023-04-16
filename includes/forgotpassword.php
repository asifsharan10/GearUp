<?php
if(isset($_POST['update']))
{
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $newpassword=md5($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:mobile";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
    $con="update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:mobile";
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
    $chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    echo "<script>alert('Your Password succesfully changed');</script>";
  }
  else {
    echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
  }
}

?>
<script type="text/javascript">
  function valid()
  {
    if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
    {
      alert("New Password and Confirm Password Field do not match  !!");
      document.chngpwd.confirmpassword.focus();
      return false;
    }
    return true;
  }
</script>



<div id="forgotpassword" class="modal fade">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Password Recovery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
       <div class="row">
        <div class="login_wrap">
          <div class="col-md-12 col-sm-6">
           <form name="chngpwd" method="post" onSubmit="return valid();">
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Your Email address*" required="">
            </div>
            <div class="form-group">
              <input type="text" name="mobile" class="form-control" placeholder="Your Reg. Mobile*" required="">
            </div>
            <div class="form-group">
              <input type="password" name="newpassword" class="form-control" placeholder="New Password*" required="">
            </div>
            <div class="form-group">
              <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password*" required="">
            </div>
            <div class="form-group">
              <input type="submit" value="Reset My Password" name="update" class="btn btn-block" style="background-color: #49a3ff;">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer ">
    <p><a href="#loginform" data-toggle="modal" data-dismiss="modal"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
  </div>
  <!-- /.modal-content -->
</div>


