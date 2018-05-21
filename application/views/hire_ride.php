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
        <li class="active"><a href="<?php echo base_url('hire_ride'); ?>">Get a Ride</a></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Available Rides</h3>
        </div>
        <div class="panel-body">

                <?php
                if ($numberOfRides > 0) {
                    ?>
           
            <div class="table-responsive" style="margin-top: 20px;">
                    <table class="table table-hover">
                        <tr>
                            <th class="tdlabel">#</th>
                            <th class="tdlabel"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Driver</th>
                            <th class="tdlabel"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;Origin
                            </th>
                            <th class="tdlabel"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;Destination
                            </th>
                            <th class="tdlabel"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Time Leaving
                            </th>
                            <th class="tdlabel"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Seats
                                Available
                            </th>
                            <th class="tdlabel"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;&nbsp; Reserve
                            </th>
                        </tr>
                        <?php
                        foreach ($rentRideDetails as $rideDetails):
                            $tbl_id = $rideDetails->rent_id;
                            $driver_id = $rideDetails->user_id;
                            $origin = $rideDetails->originLocation;
                            $destination = $rideDetails->destinationLocation;
                            $travelTime = $rideDetails->leaveTime;
                            $seatsAvailable = $rideDetails->seatsAvailable;
                            ?>
                            <tr>
                            <td class="tdlabel"><?php echo $tbl_id; ?></td>
                            <td class="tdlabel"><?php echo $this->Ridehire->get_driver_name($driver_id); ?></td>
                            <td class="tdlabel"><?php echo $origin; ?></td>
                            <td class="tdlabel"><?php echo $destination; ?></td>
                            <td class="tdlabel"><?php echo $travelTime; ?></td>
                            <td class="tdlabel"><?php echo $seatsAvailable; ?></td>
                            <td class="tdlabel">
                                <form role="form" method="post" action="<?php echo base_url('hireRideAction')?>">

                                    <input type="number" class="form-control col-md-6" name="seats_booked"
                                           placeholder="0 Booked" required>
                                    <input type="text" class="hidden form-control" name="rent_id"
                                           value="<?php echo $tbl_id?>" />
                                    <input type="text" class="hidden form-control" name="pass_id"
                                           value="<?php echo $this->session->userdata('user_id');?>" />
                                    <button type="submit"
                                            class=" col-md-6 btn btn-success btn-block form-block"
                                            style="margin-top: 20px;">Book a Ride &nbsp;</button>
<!--                                    <button data-toggle="modal" data-target="#email_modal" ><span class="glyphicon glyphicon-thumbs-up"></span></button>-->
                                </form>
                            </td>
                            </tr>
                            <div class="modal fade" id="email_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span
                                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Passenger Confirmation</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <strong>Oops!</strong> We shall send a confirmation email, with your info;
                                            </div>

                                            <div style="width: 340px;margin:0 auto;">
                                                <form role="form" method="post" action="<?php echo base_url('hireRideAction')?>">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="contact_name" class="hidden-xs">No. of Seats Booked : </label>
                                                                <input type="number" class="form-control" name="seats_booked"
                                                                       placeholder="# of seats" required>
                                                            </div>
                                                        </div>
                                                    </div>
<!--                                                    <input type="text" class="  form-control" name="rent_id"-->
<!--                                                           value="--><?php //echo $tbl_id?><!--" />-->
<!--                                                    <input type="text" class="  form-control" name="pass_id"-->
<!--                                                           value="--><?php //echo $this->session->userdata('user_id');?><!--" />-->
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-6" style="margin-top: 5px;">
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                   class="btn btn-success btn-block form-block"
                                                                   style="margin-top: 20px;">Book a Ride &nbsp;</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <?php
                        endforeach;
                        ?>
                    </table>
                <?php } else {
                    ?>

                    <!-- There is no operation available -->
                    <div class="text-left">
                        <h3 class="text-center">Sorry! You have no active rides</h3>
                    </div>
                    <?php
                }
                ?>

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