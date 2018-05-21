<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load Session Library
        $this->load->library('session');

        // load url helper
        $this->load->helper('url');

        //email
        $this->load->helper('email');

    }


    //main index view
    public function index()
    {
        $this->load->view('home_page');
    }

    //index view logged in
    public function index_in()
    {

            $session_array = array(
                'full_name' => $this->session->userdata('full_name'),
                'user_id' => $this->session->userdata('user_id'),
                'email_address' => $this->session->userdata('email_address')
            );

            $this->load->view('home_page_in', $session_array);
    }

    //user login view
    function login()
    {
        $loginData = array('activationMessage' => "",
            'hd' => 'hidden',
            'hderror' => 'hidden');

        $this->load->view('login', $loginData);
    }

    //user sign up view
    function signup()
    {
        $signupData = array(
            'userName' => '',
            'userEmail' => '',
            'error_hide' => "hidden",
            'success_hide' => "hidden"
        );

        $this->load->view('signup', $signupData);
    }

    //signup user
    function signupUser()
    {
        //get feedback and submit data first
        $userName = $_POST['full_name'];
        $userEmail = $_POST['email_address'];
        $userPassword = $_POST['password'];
        $userConPassword = $_POST['confirm_password'];

        //validate submitted data
        $this->form_validation->set_rules('full_name', 'User name', "trim|required");
        $this->form_validation->set_rules('email_address', 'Your email', 'trim|required|is_unique[users.email_address]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm password', 'matches[password]');

        $validationState = $this->form_validation->run();


        //if statements for the validation errors and success
        if ($validationState == FALSE) {

            //redirect to sign with errors
            $signupData = array(
                'userName' => $userName,
                'userEmail' => $userEmail,
                'error_hide' => "active",
                'success_hide' => "hidden"
            );

            $this->load->view('signup', $signupData);
        } else {
            //call signup model
            $success_signup = $this->Ridehire->user_signup($userName, $userEmail, $userPassword);
            if ($success_signup) {

//                //send verification email; check configuration in you php.ini file
//                $this->email->from('mukolwesofts@gmail.com', 'mukolweDevs');
//                $this->email->to($userEmail);
//                $this->email->subject("Verify your email");
//                $this->email->message('This is an email confirming your Signup to HireRide Website');
                $this->email->send();

                //redirect to success page
                redirect("redirectsuc");
            } else {

                redirect("redirecterr");
            }
        }
    }

    //redirect on signup success
    function signup_success()
    {
        $signupData = array(
            'activationMessage' => "Success, you now login",
            'hd' => 'visible',
            'hderror' => 'hidden'
        );
        $this->load->view('login', $signupData);
    }

    //redirect on signup success
    function login_success()
    {
        $homeData = array(
            'full_name' => $this->session->userdata('full_name'),
            'user_id' => $this->session->userdata('user_id'),
            'email_address' => $this->session->userdata('email_address')
        );
        $this->load->view('home_page_in', $homeData);
    }

    //redirect on signup error
    function signup_error()
    {
        $signupData = array(
            'full_name' => "",
            'email_address' => "",
            'error_hide' => "visible",
            'success_hide' => "hidden"
        );
        $this->load->view('signup', $signupData);
    }

    //login user
    function signinUser()
    {

        $this->form_validation->set_rules('email_address', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_login_data');

        if ($this->form_validation->run() == FALSE) {

            //Field & db validation failed redirected to login page
            $loginData = array(
                'activationMessage' => "Wrong email or password or inactive account",
                'hd' => 'hidden',
                'hderror' => 'visible'
            );

            $this->load->view('login', $loginData);
        } else {
            $user_mail = $this->input->post('email_address');
            // set array of items in session
            $session_array = array(
                'full_name' => $this->session->userdata('full_name'),
                'user_id' => $this->session->userdata('user_id'),
                'email_address' => $this->session->userdata('email_address'),
                'logged_in' => TRUE
            );

            $this->load->view('home_page_in', $session_array);

        }
    }

    //Verify login details
    function check_login_data($user_pass)
    {
        //Field validation succeeded validate against database
        $user_mail = $this->input->post('email_address');

        //query the users table
        $queryResult = $this->Ridehire->login($user_mail, $user_pass);
        if ($queryResult) {
            $session_array = array(
                'user_id' => $this->Ridehire->get_user_id($user_mail),
                'full_name' => $this->Ridehire->get_user_name($user_mail),
                'email_address' => $this->input->post('email_address'),
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_array);

            return TRUE;

        } else {
            $this->form_validation->set_message('check_login_data', 'Wrong email or password or inactive account');
            return false;
        }
    }

    //logout function
    function signout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        //Go to doctor login area
        $this->login();
    }

    //rent ride view
    function rent()
    {
        $session_array = array(
            'full_name' => $this->session->userdata('full_name'),
            'user_id' => $this->session->userdata('user_id'),
            'email_address' => $this->session->userdata('email_address')
        );

        $this->load->view('rent_ride',$session_array);
    }

    //hire ride view
    public function hire()
    {
        $data = array(
            'full_name' => $this->session->userdata('full_name'),
            'user_id' => $this->session->userdata('user_id'),
            'email_address' => $this->session->userdata('email_address'),
            'rentRideDetails' => $this->Ridehire->get_rent_details(),
            'numberOfRides' => $this->Ridehire->get_rides_count()
        );

        $this->load->view('hire_ride', $data);
    }

    //success passenger booking view
    public function success_booking()
    {
        $session_array = array(
            'full_name' => $this->session->userdata('full_name'),
            'user_id' => $this->session->userdata('user_id'),
            'email_address' => $this->session->userdata('email_address')
        );

        $this->load->view('success_booking', $session_array);
    }

    //success driver posting view
    public function success_rent()
    {
        $session_array = array(
            'full_name' => $this->session->userdata('full_name'),
            'user_id' => $this->session->userdata('user_id'),
            'email_address' => $this->session->userdata('email_address')
        );

        $this->load->view('success_rent', $session_array);
    }

    //redirect on driver posting view
    function error_rent()
    {
        $submitArray = array(
            'full_name' => $this->session->userdata('full_name'),
            'user_id' => $this->session->userdata('user_id'),
            'email_address' => $this->session->userdata('email_address'),
            'driverName' => '',
            'driverEmail' => '',
            'error_hide' => "hidden",
            'success_hide' => "hidden"
        );
        $this->load->view('rent_ride', $submitArray);
    }

    //save rent ride details
    function submitRideDetails()
    {

        //get feedback and submit data first
        $user_id = $_POST['user_id'];
        $origin = $_POST['origin_location'];
        $destination = $_POST['destination_location'];
        $travelTime = $_POST['travel_time'];
        $seatsAvailable = $_POST['seats_available'];

        //validate submitted data
        $this->form_validation->set_rules('origin_location', 'Origin Name', 'trim|required');
        $this->form_validation->set_rules('destination_location', 'Destination Name', "trim|required");
        $this->form_validation->set_rules('travel_time', 'Travel Time', 'trim|required');
        $this->form_validation->set_rules('seats_available', '# of Available Seats', 'trim|required');

        $validationState = $this->form_validation->run();


        //if statements for the validation errors and success
        if ($validationState == FALSE) {

            //redirect to sign with errors
            $submitArray = array(
                'full_name' => $this->session->userdata('full_name'),
                'user_id' => $this->session->userdata('user_id'),
                'email_address' => $this->session->userdata('email_address'),
                'error_hide' => "hidden",
                'success_hide' => "hidden"
            );

            $this->load->view('rent_ride', $submitArray);
        } else {
            //call Ridehire model
            $success_rent = $this->Ridehire->submit_rent_details($user_id, $origin, $destination, $travelTime, $seatsAvailable);
            if ($success_rent) {

                redirect("success_rent");

            } else {

                redirect("error_rent");

            }
        }
    }

    //save hire ride details
    function submitHireDetails()
    {

        //get feedback and submit data first
        $rent_id = $_POST['rent_id'];
        $pass_id = $_POST['pass_id'];
        $seatsBooked = $_POST['seats_booked'];


        //call Ridehire model
        $queryArray = array(
            'success_hire' => $this->Ridehire->submit_hire_details($rent_id, $pass_id, $seatsBooked),
            'update_seats' => $this->Ridehire->update_seats_available($rent_id, $seatsBooked)
        );

        if ($queryArray) {
            //send verification email; configuration php.ini file
//            $this->email->from('mukolwesofts@gmail.com', 'mukolweDevs');
//            $this->email->to('michaelolukaka@gmail.com');//$this->session->userdata('email_address')
//            $this->email->subject("RIDEHIRE: Booked Ride");
//            $this->email->message('You have Booked a Ride with');
//            $this->email->send();

            redirect("success_booking");

        } else {

            redirect("error_rent");

        }
    }

    //get available rides
    function active_rides()
    {
        $data = array(
            'rentRideDetails' => $this->Ridehire->get_rent_details(),
            'numberOfRides' => $this->Ridehire->get_rides_count()
        );

        $this->load->view('hire_ride', $data);
    }
}
