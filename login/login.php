

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="../width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bs-css/animate.css">
  <link rel="stylesheet" href="../bs-css/bootstrap.min.css">
  <link rel="stylesheet" href="../bs-css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../jq-css/jquery-ui.css">
  <link rel="stylesheet" href="../fa-css/css/font-awesome.min.css">
  <script src="../bs-js/bootstrap.min.js"></script> <!-- for bootstrap -->
  <script src="../jq-js/jquery-3.5.1.min.js"></script>
  <script src="../jq-js/jquery-ui.js"></script>

</head>

<body>
    <div class="container-fluid">
    	<div class="col-sm-4 col-md-4 col-lg-4">
        <!-- Crearing Spaces -->
        </div>

        <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="panel panel-default">

            <div class="panel-heading" align="center">Login Form</div>

            <div class="col-md-offset-5">
              <img src="../img/ng_icon2.bmp" style="width: 50px; height:50px; margin-bottom: 4px; background: #ffffff;" class="img-circle"/>
            </div>

            <div class="col-md-offset-2">
                
                <h1 class="logo-name-1">NOMAN GROUP</h1>
                
            </div>

            <div class="col-md-offset-4">
              <h3>Welcome, </h3>
            </div>
           <div class="col-md-offset-3">
              <p>ZnZ Home QC Management Software<br/></p>
            </div>
            
            
            
            <!-- Login From starts -->
            <form class="m-t" role="form" method="POST" action="login_check.php" onSubmit="return Form_Validation(this)">
                <div class="form-group">
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b col-md-offset-5" name="login" style="">Login</button>
                <br>
                <br>

            <div class="col-md-offset-5">
              <p><b>Help Line:</b></p>
            </div>

            <div class="col-md-offset-3">
              <p>Please Contact ICT Department</p>
            </div>
                
                
            </form>
            <!-- /Login From ends -->
           </div> <!-- end of <div class="panel panel-default"> -->
        </div>  <!-- end of <div class="col-sm-6 col-md-6 col-lg-6"> -->
    </div> <!-- End of <div class="container-fluid"> -->

</body>
</html>
 <!-- Login from validation script -->
 <script language="javascript">
    
    function Form_Validation(whole_form)
    {
        if (whole_form.user_id.value == "")
        {
            //missing_alert("user_id");
            alert("Please provide your user name.")
            return false;
        }
        else if (whole_form.password.value == "")
        {
            missing_alert("password");
            return false;
        }
    }

</script>     

   