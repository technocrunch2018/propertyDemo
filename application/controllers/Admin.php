<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        $this->isAdminLoggedIn();
    }
   
    function isAdminLoggedIn()
    {
        $isAdminLoggedIn = $this->session->userdata('isAdminLoggedIn');
        if(!isset($isAdminLoggedIn) || $isAdminLoggedIn != TRUE){
            $this->load->view('admin/login');
        }else{
            redirect('Backend');
        }
    }

	function grant_login_admin()
	{
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password','Password','required|max_length[32]');
        
        if($this->form_validation->run() == FALSE){$this->index();}
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->Login_model->loginMe($email,$password);
            if(!empty($result))
            {                
                $sessionArray = array('admin_id' =>$result[0]->user_id, 'user_type' =>$result[0]->user_type, 'isAdminLoggedIn' => TRUE);
                $this->session->set_userdata($sessionArray);
                redirect('Backend');              
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                redirect('Admin');
            }
        }
    }

    function logout()
    {
        $this->session->unset_userdata('isAdminLoggedIn');
        redirect('Admin');
    }

    function user_login()
    {
        $this->load->view('user_login');
    }

    function check_user_email()
    {
        $email = $this->input->post('email');
        $data['email'] = $this->Login_model->get_user_by_email($email);
        if(!empty($data['email']))
        {
            if($data['email'][0]->is_pass_set == 0)
            {
                $this->load->view('user_set_pass', $data);
            }
            else
            {
                $token = $this->generate_token(6);
                $this->Login_model->update(array('token' => $token), array('client_id' => $data['email'][0]->client_id) , 'client_details');
                $this->send_email($data['email'][0]->email, 'Login OTP', $token);
                $this->load->view('user_pass', $data);
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Please Check Your Email');
            redirect('cha');
        }
    }

    function set_user_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm_password','confirm_password', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'required|matches[confirm_password]');
        if($this->form_validation->run() == FALSE)
        {
            redirect('User_Login');
        }
        else
        {
            $password = $this->input->post('password');
            $update_data = array('password' => getHashedPassword($password), 'raw_pass' => $password, 'is_pass_set' => 1);
            $result = $this->Login_model->update($update_data, array('client_id' => $this->input->post('client_id')), 'client_details');
            redirect('User_Login');
        }
    }

    function grant_user_login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required|max_length[32]');
        $this->form_validation->set_rules('password','Password','required|max_length[32]');
        if($this->form_validation->run() == FALSE){redirect('User_Login');}
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->Login_model->loginuser($email, $password);
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('user_id' =>$res->id, 'isuserLoggedIn' => TRUE);
                    $this->session->set_userdata($sessionArray);
                    redirect('user');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                redirect('User_Login');    
            }
        }
    }

    function logout_user()
    {
        $this->session->unset_userdata('isuserLoggedIn');
        redirect('User_Login');
    }


    

    protected function generate_token($len = 24)
    {
        $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 
        );
        shuffle($chars);
        $num_chars = count($chars) - 1;
        $token = '';
        for ($i = 0; $i < $len; $i++)
        {
            $token .= $chars[mt_rand(0, $num_chars)];
        }
        return $token;
    }

    function send_email($send_to, $subject, $message)
    {
        $config = Array(
            'smtp_host' => 'ssl://smtpout.secureserver.net',
            'smtp_port' => 465,
            'smtp_user' => 'pratik.d@montekservices.in', // change it to yours
            'smtp_pass' => 'Montek%Pratik', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE, 
            'newline' => "\r\n"
        );
        
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from('pratik.d@montekservices.in', "Do Not Reply");
        $this->email->to($send_to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        }
        else
        {
            return $this->email->print_debugger();
        }
    }
}
