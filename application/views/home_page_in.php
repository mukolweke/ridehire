<?php include_once ('header_in.php')?>
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img style="height: 170px;"  src="<?php echo base_url('assets/img/car-rent.png/')?>" alt="...">
                <div class="caption">
                    <h3 class="text-center">Give a Ride</h3>
                    <p>Driver who has available space and travelling and wants to give a ride/lift can post there information so the passengers can see and be able to book a seat, stating the time, origin and destination of the journey. </p>
                    <a type="button" href="<?php echo base_url('rent_ride')?>" class="btn btn-myn btn-primary btn-lg" style="margin-right: 50px;">Rent a Ride&raquo;</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img style="height: 170px;" src="<?php echo base_url('assets/img/car-hire.png')?>" alt="...">
                <div class="caption">
                    <h3 class="text-center">Get a Ride</h3>
                    <p>Passengers that need require rides/lift to certain destination can search from the available list and choose which suits them, they can book for more than one seat and be able get their ride. Trip details shall be passed via email.</p>
                    <a type="button" href="<?php echo base_url('hire_ride')?>" class="btn  btn-myn btn-lg btn-primary">Hire a Ride &raquo;</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?php echo base_url('assets/img/policy.png')?>" alt="...">
                <div class="caption">
                    <h3 class="text-center">Policy</h3>
                    <p>The Driver will take of 20mins from the specified time, if the passenger hasn't arrived the Driver has a right to get another passenger and take off.They have no obligation of waiting for the passengers.<br><br> Passengers are required to email/phone cancellation of trip. Time is keen, arrive 10 mins before the
                        specified time so that the depature will be as scheduled.</p>
                </div>
            </div>
        </div>
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