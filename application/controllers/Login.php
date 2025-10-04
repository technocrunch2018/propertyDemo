<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
date_default_timezone_set('Asia/Kolkata');
class Login extends BaseController {

	function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
    }

    function index()
    {
        $this->load->view('home/include/header');
    	$this->load->view('home/home');
        $this->load->view('home/include/footer');
    }

    

}
?>