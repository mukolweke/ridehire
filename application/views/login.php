<?php include_once ('header.php')?>
<div class="container" style="margin-top: 120px;">
    <h3 class="text-center text-success">Welcome to RideHire</h3>
    <div class="panel panel-default panelSignin" style="margin-top: 20px;">
        <div class="panel-body">
            <div class="alert alert-success <?php echo $hd; ?>">
                <span><?php echo $activationMessage; ?></span>
            </div>
            <div class="alert alert-danger <?php echo $hderror; ?>">
                <span><?php echo validation_errors(); ?></span>
            </div>
            <br/>
            <?php
            echo form_open("signinAction");
            ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <p for="contact_name" class="hidden-xs">Email : </p>
                            <input type="email" class="form-control" name="email_address" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <p for="contact_name" class="hidden-xs">Password : </p>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block form-block" style="margin-top: 20px;">LOGIN &nbsp; <span class="glyphicon glyphicon-log-in"></span> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p class="text-center" style="margin-top: 30px;">Not a registered user <a href="<?php echo base_url('sign_up')?>">Sign Up</a> </p>
</div>

<footer style="margin-top: 120px;">
    <p class="text-center">&copy; 2018 TestProject</p>
</footer>

<!--JS-->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('style/js/main.js'); ?>"></script>
</body>
</html>