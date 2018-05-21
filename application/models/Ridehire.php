<?php

//table used to post and get details from ridehire database
class Ridehire extends CI_Model {

    //submit driver renting details to table rent
    function submit_rent_details($user_id,$originLocation, $destinationLocation, $leaveTime, $seatsAvailable) {

        //insert values
        $rentDetailsArray = array(
            'user_id'=> $user_id,
            'originLocation' => $originLocation,
            'destinationLocation' => $destinationLocation,
            'leaveTime'=> $leaveTime,
            'seatsAvailable'=> $seatsAvailable
        );

        $rentQuery = $this->db->insert('rent_table', $rentDetailsArray);

        return $rentQuery;
    }

    //submit passenger details to table hire
    function submit_hire_details($rent_id, $pass_id, $seatsBooked) {

        //insert values
        $hireDetailsArray = array(
            'rent_id'=> $rent_id,
            'pass_id'=> $pass_id,
            'seats_booked'=> $seatsBooked
        );

        $hireQuery = $this->db->insert('hire_table', $hireDetailsArray);

        return $hireQuery;
    }

    //update seats after hire
    function update_seats_available($rent_id, $seatsBooked){
        $available_seats = $this->get_available_seats($rent_id);

        $update_data = array(
            'seatsAvailable' => ($available_seats - $seatsBooked)
        );

        //update
        $this->db->where('rent_id', $rent_id);
        $seats_update_success = $this->db->update('rent_table', $update_data);

        return $seats_update_success;
    }

    //search rent table details
    function get_rent_details() {


        $this->db->select('*');
        $this->db->where('seatsAvailable >', '0');
        $foundDetails = $this->db->get('rent_table');

        if ($foundDetails->num_rows() > 0) {
            foreach ($foundDetails->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return FALSE;
        }
    }

    //get rides count
    function get_rides_count() {
        $this->db->where('seatsAvailable >', '0');
        $queryNumber = $this->db->count_all_results('rent_table');

        return $queryNumber;
    }

    //search  hire table details
    function get_hire_details($hire_id) {


        $this->db->select('*');
        $this->db->where('hire_id', $hire_id);
        $foundDetails = $this->db->get('hire_table');

        if ($foundDetails->num_rows() > 0) {
            foreach ($foundDetails->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return FALSE;
        }
    }

    //user signup
    function user_signup($userName, $userEmail, $userPassword){
        //insert values
        $usersDetailsArray = array(
            'full_name' => $userName,
            'email_address' => $userEmail,
            'password' => do_hash($userPassword)
        );

        $rentQuery = $this->db->insert('users', $usersDetailsArray);

        return $rentQuery;
    }

    //login check & validation
    function login($userMail, $userPass) {
        $this->db->select('*');
        $this->db->where('email_address', $userMail);
        $this->db->where('password', do_hash($userPass));
        $this->db->limit(1);

        $loginQuery = $this->db->get('users');

        if ($loginQuery->num_rows() == 1) {
            return $loginQuery->result();
        } else {
            return FALSE;
        }
    }

    //get user id logged in
    function get_user_id($userMail) {
        //Setup a database connection returning a single row value
        $this->db->select("*");
        $this->db->where("email_address", $userMail);
        $query = $this->db->get("users");

        if($query->num_rows() > 0) {
            $variable = $query->row("user_id");
            return $variable;
        } else {
            return FALSE;
        }
    }


    //get user name logged in
    function get_user_name($userMail) {
        //Setup a database connection returning a single row value
        $this->db->select("*");
        $this->db->where("email_address", $userMail);
        $query = $this->db->get("users");

        if($query->num_rows() > 0) {
            $variable = $query->row("full_name");
            return $variable;
        } else {
            return FALSE;
        }
    }

    //get user name logged in
    function get_driver_name($driver_id) {
        //Setup a database connection returning a single row value
        $this->db->select("*");
        $this->db->where("user_id", $driver_id);
        $query = $this->db->get("users");

        if($query->num_rows() > 0) {
            $variable = $query->row("full_name");
            return $variable;
        } else {
            return FALSE;
        }
    }

    //get available seats logged in
    function get_available_seats($rent_id) {
        //Setup a database connection returning a single row value
        $this->db->select("*");
        $this->db->where("rent_id", $rent_id);
        $query = $this->db->get("rent_table");

        if($query->num_rows() > 0) {
            $variable = $query->row("seatsAvailable");
            return $variable;
        } else {
            return FALSE;
        }
    }
}
