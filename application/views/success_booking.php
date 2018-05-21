<?php include_once ('header_in.php')?>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 style="margin-top: 50px;text-align: left;">Get a ride</h1>
        <hr class="title-hr pull-left"/>
    </div>
</div>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('_in'); ?>">Home</a></li>
        <li><a href="<?php echo base_url('hire_ride'); ?>">Hire a Ride</a></li>
        <li class="disabled"><a href="#">Success Passenger Booking</a></li>
    </ol>
    <div class="text-center">
        <span class="glyphicon glyphicon-ok-circle" style="font-size: 90px;"></span>
        <h1 style="font-size: 40px;">Success Ride Booking</h1>
        <p>Check your Email Address for the rides details!!!</p>
    </div>

</div> <!-- /container -->

<footer>
    <p class="text-center">&copy; 2018 TestProject</p>
</footer>

<!--JS-->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('style/js/main.js'); ?>"></script>
</body>
</html>