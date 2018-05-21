<?php include_once ('header_in.php')?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 style="margin-top: 50px;text-align: left;">Give a ride</h1>
        <hr class="title-hr pull-left"/>
    </div>
</div>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('_in'); ?>">Home</a></li>
        <li class="active"><a href="<?php echo base_url('rent_ride'); ?>">Rent Ride</a></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Rent Form</h3>
        </div>
        <div class="panel-body">
            <form role="form"  method="post" action="<?php echo base_url('rentRideAction'); ?>">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="contact_name" class="hidden-xs">Origin Location :</label>
                            <input type="text" class="form-control" name="origin_location"  placeholder="Origin Location" required>
                        </div>
                    </div>
                    <input type="text" class="hidden" name="user_id" value="<?php echo $user_id?>">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="contact_email" class="hidden-xs">Destination Location :</label>
                            <input type="text" class="form-control" name="destination_location" placeholder="Destination Location" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="group_phone" class="hidden-xs">Leaving Time :</label>
                            <input type="datetime-local" id="datetime" class="form-control" name="travel_time" placeholder="DD/MM/YY, HR:MM" required>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="contact_email" class="hidden-xs">No. of Seats Available :</label>
                            <input type="text" class="form-control" name="seats_available" placeholder="0" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block form-block" style="margin-top: 25px;">Rent a Ride &nbsp;<span class="glyphicon glyphicon-thumbs-up"></span> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /container -->

<footer>
    <p class="text-center" style="margin-top: 30px;">&copy; 2018 TestProject</p>
</footer>

<!--JS-->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('style/js/main.js'); ?>"></script>
</body>
</html>