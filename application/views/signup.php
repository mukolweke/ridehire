<?php include_once ('header.php')?>

<div class="container" style="margin-top: 80px;">
    <h3 class="text-center text-success">Signup for RideHire</h3>
    <div class="panel panel-default panelSignup">
        <div class="panel-body">
            <div class="alert alert-warning alert-dismissible  <?php echo $error_hide; ?>" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Oops!</strong> An error occurred. Try again later.
            </div>

            <div class="alert alert-success alert-dismissible <?php echo $success_hide; ?>" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Sign up Successful!</strong> Login now.
            </div>
            <form role="form" method="post" action="<?php echo base_url('signupAction')?>">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <p for="contact_name" class="hidden-xs">Full Name : </p>
                            <?php echo form_error('full_name'); ?>
                            <input type="text" class="form-control" name="full_name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <p for="contact_name" class="hidden-xs">Email : </p>
                            <?php echo form_error('email_address'); ?>
                            <input type="email" class="form-control" name="email_address" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <p for="contact_name" class="hidden-xs">Password : </p>
                            <?php echo form_error('password'); ?>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <p for="contact_name" class="hidden-xs">Confirm Password : </p>
                            <?php echo form_error('confirm_password'); ?>
                            <input type="password" class="form-control" name="confirm_password" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block form-block" style="margin-top: 20px;">SIGNUP &nbsp; <span class="glyphicon glyphicon-thumbs-up"></span> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p class="text-center" style="margin-top: 10px;">Already a registered user <a href="<?php echo base_url('sign_in')?>">Sign In</a> </p>
</div>

<footer style="margin-top: 20px;">
    <p class="text-center">&copy; 2018 TestProject</p>
</footer>

<!--JS-->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('style/js/main.js'); ?>"></script>
</body>
</html>