<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Razorpay extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();   
        $this->load->model('Site', 'site');   
        $this->load->model('common_model');     
    }
    // index page
    public function index() {
        $data['title'] = 'Razorpay ';  
        $data['productInfo'] = $this->site->getProduct();           
        $this->load->view('razorpay/index', $data);
    }
    
    public function razorPaySuccess()
    {
        $data = [
               'user_id' => $this->session->userdata('user')['user_id'],
               'payment_id' => $this->input->post('razorpay_payment_id'),
               'amount' => $this->input->post('totalAmount'),
               'product_id' => $this->input->post('product_id'),
               'paymant_date' => date('Y-m-d h:i:s'),
            ];
        $insert = $this->db->insert('payments', $data);
        $subscriptions = $this->common_model->getdata(array('id'=> $this->input->post('product_id')), 'subscriptions');
        $user = $this->common_model->getdata(array('user_id' => $this->session->userdata('user')['user_id']), 'users');
        
        $new = $user[0]->leads_pending + $subscriptions[0]->listings;
        $this->common_model->update(array('leads_pending' => $new, 'subscription' => 1, 'sub_id' =>  $this->input->post('product_id')), array('user_id' => $this->session->userdata('user')['user_id']),
        'users');
        $arr = array('msg' => 'Payment successfully credited', 'status' => true);
        echo json_encode($arr);
    }
    
    public function RazorThankYou()
    {
     $this->load->view('razorthankyou');
    }

    public function success()
    {
        $this->session->set_flashdata('success', 'Payment Done!');
        redirect('home/dashboard');
    }

    public function failed()
    {
        $this->session->set_flashdata('error', 'Payment Failed!');
        redirect('home/dashboard');
    } 
}
?>
