<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
date_default_timezone_set('Asia/Kolkata');
class Home extends BaseController{
	function __construct()
    {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library('upload');
        $this->load->helper('string');
        $this->load->helper('url');
        $this->load->library("pagination");
    }

    function check_login()
    {
       if(empty($this->session->userdata('user')) || $this->session->userdata('user')['user_id'] == '' || $this->session->userdata('user')['user_id'] == 0){
            $this->session->set_flashdata('error', 'Please Login first!');
            redirect('home');
       }
    }
    
   function testMail()
   {
            $smsMessage = "Thanks for reaching out to WHYBROKER.IN \n";
            $smsMessage .= "1414 Here is your login OTP.\n";
            $smsMessage .= "DO NOT SHARE WITH ANYONE !!\n";
            $smsMessage .= "Regards - YBROKR\n";
            
            $result = sms_code_send('8626080622', $smsMessage);
            pre($result);
   }
   
    function index()
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $data['my_city'] = $this->common_model->getdata(array('is_deleted'=>0,'status'=>1), 'city');
        $data['list_pg'] = $this->common_model->getdata(array('is_deleted'=>0,'status'=>1), 'pg');
        $data['banners'] = $this->common_model->getdata(array('is_deleted'=>0), 'banners');
        $data['list_rent_property'] = $this->common_model->getrentpropertydata();
        $data['list_sale_property'] = $this->common_model->getsalepropertydata();
        $data['list_testimonials'] = $this->common_model->getdata(array('is_deleted'=>0), 'testimonials');
        
        $this->get_property_list_details($data['list_rent_property'], 'list_rent_property');
        $this->get_property_list_details($data['list_sale_property'], 'list_sale_property');
        $data['list_subscriptions'] = $this->common_model->getdata(array('status' =>1 ,'is_deleted' => 0), 'subscriptions');
        
    //   print_r($data['list_sale_property']); exit;
        $this->load->view('home/include/header', $data);
    	$this->load->view('home/home', $data);
        $this->load->view('home/include/footer', $data);
    }
    
    function subscription()
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $data['list_subscriptions'] = $this->common_model->getdata(array('status' => 1 ,'is_deleted' => 0), 'subscriptions');
        $this->Webview('home/subscription', $data);
    }

    function subscriptionDetails($subId, $propertyID = NULL)
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $data['subscriptionsDetails'] = $this->common_model->getdata(array('status' => 1 ,'is_deleted' => 0, 'id' => $subId), 'subscriptions');
        $data['subscriptionPropertyId'] = $propertyID;
        $this->Webview('home/subscriptionDetails', $data);
    }
    
    function about_us()
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $this->Webview('home/about_us', $data);
    }
    
    function refund()
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $this->Webview('home/refund', $data);
    }
    
    function term_condition()
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $this->Webview('home/term_condition', $data);
    }
    
    function disclaimer()
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $this->Webview('home/disclaimer', $data);
    }
    
    function faq()
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $data['faq'] = $this->common_model->getdata(array('is_deleted' => 0),'faq');
        $this->Webview('home/faq', $data);
    }
    
    function privacy_policy()
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $this->Webview('home/privacy_policy', $data);
    }
    
    function home_loan()
    {
        $this->Webview('home/home_loan');
    }

    function contact_us()
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $this->Webview('home/contact_us', $data);
    }

    function list_all_ads()
    {
        $this->Webview('home/list_all_ads');
    }

    function register()
    {
        $this->Webview('home/register');
    }

    function user_registration()
    {
        $post = $this->input->post();
        $usertype = $post['usertype'];
        $name = $post['name'];
        $phone = $post['phone'];
        $email = $post['email'];
        
        $res = $this->common_model->getdatabyid(array('phone' => $phone), 'users');
        if($res)
        {
            $this->session->set_flashdata('error', 'Your are already registered!');
            redirect();
        }
        else
        {
            $mobile_otp = random_string('numeric', 4);
            $data = array('usertype' => $usertype, 'name' => $name, 'email' => $email, 'phone' => $phone, 'status' => 0, 'otp' => $mobile_otp, 'email_otp' => '', 'created' => date('Y-m-d H:i:s'));
            $user_id = $this->common_model->insert_data('users', $data);

            $result = whatsapp_login_otp($phone, $mobile_otp);
            if($result)
            {
                $this->session->set_flashdata('success', 'OTP send successfully to your registered mobile, Please check');
                redirect('home/verification/'.$user_id);
            }
            else
            {
                $this->session->set_flashdata('error', 'Failed to send OTP');
                redirect();
            }
        }        
    }
    
    function verification($user_id)
    {
        $data['user_data'] = $this->common_model->getdatabyid(array('user_id'=>$user_id), 'users');
        $this->Webview('home/verification', $data);
    }
    
    function verify_email_otp()
    {
        $otp = $this->input->post('otp');
        $userid = $this->input->post('userid');
        $user_data = $this->common_model->getdatabyid(array('user_id' => $userid),'users');
        if($user_data->email_otp == $otp)
        {
            $this->common_model->update(array('email_otp' => '', 'email_verify' => 1), array('user_id' =>$userid), 'users');
            $this->session->set_flashdata('success', 'OTP verified successfully!');    
        }
        else{$this->session->set_flashdata('success', 'OTP verifification Failed');}
        
        $user_data = $this->common_model->getdatabyid(array('user_id' => $userid),'users');
        if($user_data->email_verify == 1 && $user_data->mobile_verify == 1)
        {redirect('home');}else{redirect('home/verification/'.$userid);}
    }
    
    function verify_sms_otp()
    {
        $otp = $this->input->post('otp');
        $userid = $this->input->post('userid');
        $res = $this->common_model->getdatabyid(array('user_id' => $userid),'users');
        if($res->otp == $otp)
        {
            $this->common_model->update(array('otp' => '', 'mobile_verify' => 1), array('user_id' =>$userid), 'users');
            
            $session_array = array('user_id' => $res->user_id, 'leads' => $res->leads_pending, 'name' => $res->name, 'email' => $res->email,'usertype' => $res->usertype,'phone' => $res->phone,'state' => $res->state,'city' => $res->city);
            $this->session->set_userdata('user',$session_array);
            $this->session->set_flashdata('success', 'Logged in successfully! '); 
            if ($res->leads_pending == 0) {
                redirect('home/subscription');
            }
        }
        else{$this->session->set_flashdata('error', 'OTP verifification Failed');}
    
        redirect($this->session->userdata('redirect_url'));
    }
    
    
    function lead_partner_registration()
    {
        $post = $this->input->post();
        $name = $post['name'];
        $email = $post['email'];
        $phone = $post['phone'];
        $password = $post['password'];
        $res = $this->common_model->getdatabyid(array('email'=>$email),'lead_partners');
        if($res)
        {
            $this->session->set_flashdata('error', 'Your are already registered!');
            redirect('home');
        }
        else
        {
            $email_otp = random_string('numeric', 4);
            $mobile_otp = random_string('numeric', 4);
            $data = array('name'=>$name, 'email'=>$email, 'phone'=>$phone,'password'=>md5($password), 'status'=>0,'otp' => $mobile_otp, 'email_otp' => $email_otp, 'created'=>date('Y-m-d H:i:s'));
            $result = $this->common_model->insert_data('lead_partners',$data);

            if($result)
            {
                $res = $this->send_mail($email, "StayeeKart - OTP", "Thank you for showing interest at StayeeKart!\n\n Use This OTP to verify \n\n $email_otp");
                $res = sms_code_send($phone, 'Dear customer, Thank you for showing interest at StayeeKart!, Your OTP is ' . $mobile_otp);
                if($res)
                {
                    $this->session->set_flashdata('success', 'OTP has been send to your registered mail id.. Please check mail.');
                    redirect('home/partner_verification/'.$result);
                }else{
                    $this->session->set_flashdata('error', 'Failed to send OTP');
                    redirect('home');
                }
            }else{
                $this->session->set_flashdata('error', 'Your are not registered');
                redirect('home/register');
            }
        }        
    }
    
    function partner_verification($user_id)
    {
        $data['user_data'] = $this->common_model->getdatabyid(array('user_id'=>$user_id), 'lead_partners');
        $this->Webview('home/partner_verification', $data);
    }
    
    function verify_partner_sms_otp()
    {
        $otp = $this->input->post('otp');
        $userid = $this->input->post('userid');
        $user_data = $this->common_model->getdatabyid(array('user_id' => $userid),'lead_partners');
        if($user_data->otp == $otp)
        {
            $this->common_model->update(array('otp' => '', 'mobile_verify' => 1), array('user_id' =>$userid), 'lead_partners');
            $this->session->set_flashdata('success', 'OTP verified successfully!');    
        }
        else{$this->session->set_flashdata('error', 'OTP verifification Failed');}
        
        $user_data = $this->common_model->getdatabyid(array('user_id' => $userid),'lead_partners');
        if($user_data->email_verify == 1 && $user_data->mobile_verify == 1)
        {redirect('home');}else{redirect('home/partner_verification/'.$userid);}
    }
    
    function verify_partner_email_otp()
    {
        $otp = $this->input->post('otp');
        $userid = $this->input->post('userid');
        $user_data = $this->common_model->getdatabyid(array('user_id' => $userid),'lead_partners');
        // pre($user_data);
        if($user_data->email_otp == $otp)
        {
            $this->common_model->update(array('email_otp' => '', 'email_verify' => 1), array('user_id' =>$userid), 'lead_partners');
            $this->session->set_flashdata('success', 'OTP verified successfully!');    
        }
        else{$this->session->set_flashdata('error', 'OTP verifification Failed');}
        
        $user_data = $this->common_model->getdatabyid(array('user_id' => $userid),'lead_partners');
        if($user_data->email_verify == 1 && $user_data->mobile_verify == 1)
        {redirect('home');}else{redirect('home/partner_verification/'.$userid);}
    }
    
    function login()
    {
        $this->Webview('home/login');
    }
    
    function check_user_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $PostID = $this->input->post('PostID');
        $RentSale = $this->input->post('RentSale');

        $this->session->set_userdata('RentSale', $RentSale);
        $this->session->set_userdata('PostID', $PostID);

        $res = $this->common_model->getdatabyid(array('phone' => $email, 'is_deleted' => 0),'users');
        if($res)
        {
            $mobile_otp = random_string('numeric', 4);
            $result = whatsapp_login_otp($res->phone, $mobile_otp);
            $this->common_model->update(array('otp' => $mobile_otp), array('user_id' => $res->user_id), 'users');
            $this->session->set_flashdata('success', 'OTP send on mobile');
            $this->session->set_userdata('redirect_url', $this->input->post('redirect_url'));
            redirect('home/verification/'.$res->user_id);

        }
        else
        {
            $name = $this->input->post('name');
            $mobile_otp = random_string('numeric', 4);
            $data = array('usertype' => 'Owner', 'name' => $name, 'phone' => $email, 'status' => 0, 'otp' => $mobile_otp, 'email_otp' => '', 'created' => date('Y-m-d H:i:s'));
            $user_id = $this->common_model->insert_data('users', $data);
            
            $result = whatsapp_login_otp($email, $mobile_otp);
            if($result)
            {
                $this->session->set_flashdata('success', 'OTP send successfully to your registered mobile, Please check');
                redirect('home/verification/'.$user_id);
            }
            else
            {
                $this->session->set_flashdata('error', 'Failed to send OTP');
            }
        }
        
        if(!empty($this->session->userdata('redirect_url')) && $this->session->userdata('redirect_url') != ''){
             redirect($this->session->userdata('redirect_url'));
        }elseif(!empty($this->input->post('redirect_url')) && @$this->input->post('redirect_url') != ''){
            redirect($this->input->post('redirect_url'));
        }else{
             redirect('home');
        }
    }
    
    function check_lead_partner_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $res = $this->common_model->getdatabyid(array('email'=>$email, 'password'=>md5($password)),'lead_partners');
        if($res)
        {
            if($res->email_verify == 1 && $res->mobile_verify == 1)
            {
                $session_array = array('user_id' => $res->user_id, 'name' => $res->name, 'email' => $res->email,'phone' => $res->phone,'usertype' => 'lead_partner');
                $this->session->set_userdata('user',$session_array);
                $this->session->set_flashdata('success', 'Login successfully!');
                redirect('home');
            }
            else
            {
                $email_otp = random_string('numeric', 4);
                $mobile_otp = random_string('numeric', 4);
                if($res->email_verify == '0')
                {
                    $result = $this->send_mail($res->email, "StayeeKart - OTP", "Thank you for showing interest at StayeeKart!\n\n Use This OTP to verify \n\n $email_otp");
                    $this->common_model->update(array('email_otp' => $email_otp, 'email_verify' => 0), array('user_id'=>$res->user_id), 'lead_partners');
                }
                
                if($res->mobile_verify == '0')
                {
                    sms_code_send($res->phone, 'Dear customer, Thank you for showing interest at StayeeKart!, Your OTP is ' . $mobile_otp);
                    $this->common_model->update(array('otp' => $mobile_otp, 'mobile_verify' => 0), array('user_id'=>$res->user_id), 'lead_partners');
                }
                
                $this->session->set_flashdata('error', 'Please Verify Your Details First!');
                redirect('home/partner_verification/'.$res->user_id);
            }
        }
        else
        {
           $this->session->set_flashdata('error', 'Login Failed!'); 
        }
        if(!empty($this->session->userdata('redirect_url')) && $this->session->userdata('redirect_url') != ''){
             redirect($this->session->userdata('redirect_url'));
        }else{
            redirect('home');
        }
    }


    function check_lead_partner_otp()
    {
        $post = $this->input->post();
        $email = $post['email'];
        $otp = $post['otp'];
        $res = $this->common_model->getdatabyid(array('email'=>$email, 'otp'=>$otp),'lead_partners');
        if($res){
            $update_data = array('status'=>1, 'otp'=>'');
            $result = $this->common_model->update($update_data, array('user_id'=>$res->user_id), 'lead_partners');
            $this->session->set_flashdata('success', 'OTP verified successfully!');
            redirect('home');
        }else{
            $this->session->set_flashdata('success', 'Failed to vefiry OTP!');
            redirect('home/lead_partner_verification/'.$email);
        }
    }
    
    function resend_otp($user_type, $user_email){
        $otp=random_string('numeric', 6);
        if($user_type == 'lead_partner'){
            $update_data = array('otp'=>$otp);
            $result = $this->common_model->update($update_data, array('email'=>$user_email), 'lead_partners');
            $res = $this->send_mail($user_email, "StayeeKart - OTP", "Thank you for showing interest at StayeeKart!\n\n Your One Time Password for registration is - $otp");
            if($res){
                $this->session->set_flashdata('success', 'OTP send successfully!');
            }else{
                $this->session->set_flashdata('error', 'Failed to vefiry OTP!');
            }
            // redirect('home/lead_partner_verification/'.$user_email);
            redirect('home');
        }else{
            $update_data = array('otp'=>$otp);
            $result = $this->common_model->update($update_data, array('email'=>$user_email), 'users');
            $res = $this->send_mail($user_email, "StayeeKart - OTP", "Thank you for showing interest at StayeeKart!\n\n Your One Time Password for registration is - $otp");
            if($res){
                $this->session->set_flashdata('success', 'OTP send successfully!');
            }else{
                $this->session->set_flashdata('error', 'Failed to vefiry OTP!');
            }
            redirect('home/user_verification/'.$user_email);
        }
    }
    
    function logout(){
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('RentSale');
        $this->session->unset_userdata('PostID');

        redirect('home');
    }

    function save_user()
    {
        $form_data = $this->input->post(array('name', 'email', 'password', 'c_password'));
    }
    
    function find_property($type = '')
    {
        if($post = $this->input->post()){
            $data['post'] = $post;
            // search_type ==> Rent = 1, sale = 2, PG = 3
            // city ==> name;
            //category
            //price_minimum, price_maximum, posted_by, sort_by
            // search_box ==> name, location, etc
            if($post['search_type'] == 3)
            {
                $list_property = $this->common_model->home_page_search_pg($post);
                $data['list_property'] = $list_property;
                $this->Webview('home/find_property_pg', $data);
            }
            else
            {
                $data['list_property'] = $this->common_model->home_page_search($post);
                $this->get_property_list_details($data['list_property'], 'list_property');
            }
        }
        
        else
        {
            if($type == 'sell'){$new_type = 2;}else{$new_type = 1;}
            $data['post'] = array('search_type' =>  $new_type);
            $data['list_property'] = $this->common_model->home_page_search('', $type);
            $this->get_property_list_details($data['list_property'], 'list_property');
        }
        $this->Webview('home/find_property_new', $data);
    }
    
    
    // To Get the all details related to the property name and all use this function
    function get_property_list_details($data, $name)
    {
        $data[$name] = $data;
        foreach ($data[$name] as $i=>$row) {
            $residential = $row->residential;
            if($residential == 'DuplexFlat'){
                //Duplex Flat
                $data[$name][$i]->details = $this->common_model->getdatabyid(array('post_id'=>$row->post_id),'duplex_flat_details');
            }elseif($residential == 'PentHouse'){
            //Pent House
                $data[$name][$i]->details = $this->common_model->getdatabyid(array('post_id'=>$row->post_id),'pent_house_details');
            }elseif($residential == 'Factory'){
                //Factory Rent
                $data[$name][$i]->details = $this->common_model->getdatabyid(array('post_id'=>$row->post_id),'factory_details');
            }elseif($residential == 'Flat'){
                //Flat Rent
                $data[$name][$i]->details = $this->common_model->getdatabyid(array('post_id'=>$row->post_id),'flat_details');
            }elseif($residential == 'HouseorBanglow'){
                //House Rent
                $data[$name][$i]->details = $this->common_model->getdatabyid(array('post_id'=>$row->post_id),'house_details');
            }elseif($residential == 'Land'){
                //Land Rent
                $data[$name][$i]->details = $this->common_model->getdatabyid(array('post_id'=>$row->post_id),'land_details');
            }elseif($residential == 'Office'){
                //Office Rent
                $data[$name][$i]->details = $this->common_model->getdatabyid(array('post_id'=>$row->post_id),'office_details');
            }elseif($residential == 'ShopOrShowroom'){
                //Shop Rent
                $data[$name][$i]->details = $this->common_model->getdatabyid(array('post_id'=>$row->post_id),'shop_details');
            }elseif($residential == 'Warehouse'){
                //Warehouse Rent
                $data[$name][$i]->details = $this->common_model->getdatabyid(array('post_id'=>$row->post_id),'warehouse_details');
            }
            
            $user_type = $data[$name][$i]->user_type;
                if($user_type == 'Owner' || $user_type == 'Builder' || $user_type == 'Agent'){
                    $dealers = $this->common_model->getdatabyid(array('user_id'=>$data[$name][$i]->user_id),'users');
                    $data[$name][$i]->dealer_name = $dealers->name;
                    $data[$name][$i]->dealer_contact = $dealers->phone;
                    $data[$name][$i]->dealer_email = $dealers->email;
                }elseif($user_type == 'lead_partner'){
                    $dealers = $this->common_model->getdatabyid(array('user_id'=>$data[$name][$i]->user_id),'lead_partners');
                    $data[$name][$i]->dealer_name = $dealers->name;
                    $data[$name][$i]->dealer_contact = $dealers->phone;
                    $data[$name][$i]->dealer_email = $dealers->email;
                }elseif($user_type == 'Super Admin' || $user_type == 'Admin'){
                    $dealers = $this->common_model->getdatabyid(array('user_id'=>$data[$name][$i]->user_id),'admin_users');
                    $data[$name][$i]->dealer_name = $dealers->name;
                    $data[$name][$i]->dealer_contact = $dealers->mobile;
                    $data[$name][$i]->dealer_email = $dealers->email;
                }
                
                
                
                
            $subscription = 'Unpaid';
            if($row->user_type == 'Owner' || $row->user_type == 'Agent' || $row->user_type == 'Builder'){
                $posted_user = $this->common_model->getdatabyid(array('user_id'=>$row->user_id),'users');
                if(!empty($posted_user)){
                    $subscription = ($posted_user->subscription != 0) ? 'Paid' : 'Unpaid';
                    $data[$name][$i]->posted_user_name = $posted_user->name;
                    $data[$name][$i]->posted_user_type = $row->user_type;
                }
            }elseif($row->user_type == 'lead_partner'){
                $posted_user = $this->common_model->getdatabyid(array('user_id'=>$row->user_id),'lead_partners');
                if(!empty($posted_user)){
                    $subscription = ($posted_user->subscription != 0) ? 'Paid' : 'Unpaid';
                    $data[$name][$i]->posted_user_name = $posted_user->name;
                    $data[$name][$i]->posted_user_type = 'Partner';
                }
            }else{
                $subscription = 'Paid';
                $data[$name][$i]->posted_user_name = 'Pratik Dhamande';
                $data[$name][$i]->posted_user_type = 'Techno Mantra';
            }
            $data[$name][$i]->subscription = $subscription;
            
            }
            
            return $data;
    }
    
    function dashboard()
    {
        $this->check_login();
        if($this->session->userdata('user')['usertype'] == 'lead_partner'){
            $data['user_details'] = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id']),'lead_partners');
        }else{
            $data['user_details'] = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id']),'users');
        }
        // pre($this->session->userdata());
        $data['list_subscriptions'] = $this->common_model->getdata(array('status'=>1,'is_deleted'=>0, 'user_type'=>$this->session->userdata('user')['usertype']), 'subscriptions');
    
        $data['list_post_requirements'] = $this->common_model->getdata(array('user_id'=>$this->session->userdata('user')['user_id'], 'user_type'=>$this->session->userdata('user')['usertype'],'is_deleted'=>0), 'post_requirement');
        $data['list_home_loans'] = $this->common_model->getdata(array('user_id'=>$this->session->userdata('user')['user_id'], 'user_type'=>$this->session->userdata('user')['usertype'],'is_deleted'=>0), 'home_loan');
        $data['list_post_project'] = $this->common_model->getdata(array('user_id'=>$this->session->userdata('user')['user_id'],'is_deleted'=>0), 'post_project');
        $data['list_post_property'] = $this->common_model->getdata(array('user_id'=>$this->session->userdata('user')['user_id'],'user_type'=>$this->session->userdata('user')['usertype'],'is_deleted'=>0), 'post_property');
        // pre($data);
        foreach($data['list_post_property'] as $i=>$list){
            $post_id = $list->post_id;
            $data['list_post_property'][$i]->list_duplex_flat=$this->common_model->getdata(array('post_id'=>$post_id),'duplex_flat_details');
            $data['list_post_property'][$i]->list_factory=$this->common_model->getdata(array('post_id'=>$post_id),'factory_details');
            $data['list_post_property'][$i]->list_flat=$this->common_model->getdata(array('post_id'=>$post_id),'flat_details');
            $data['list_post_property'][$i]->list_house=$this->common_model->getdata(array('post_id'=>$post_id),'house_details');
            $data['list_post_property'][$i]->list_land=$this->common_model->getdata(array('post_id'=>$post_id),'land_details');
            $data['list_post_property'][$i]->list_office=$this->common_model->getdata(array('post_id'=>$post_id),'office_details');
            $data['list_post_property'][$i]->list_other=$this->common_model->getdata(array('post_id'=>$post_id),'other_details');
            $data['list_post_property'][$i]->list_pent=$this->common_model->getdata(array('post_id'=>$post_id),'pent_house_details');
            $data['list_post_property'][$i]->list_shop=$this->common_model->getdata(array('post_id'=>$post_id),'shop_details');
            $data['list_post_property'][$i]->list_warehouse=$this->common_model->getdata(array('post_id'=>$post_id),'warehouse_details');
            $data['list_post_property'][$i]->property_type=$this->common_model->getdata(array('post_id'=>$post_id),'property_type');
            
            
            $data['list_post_property'][$i]->request_view_count=$this->common_model->count(array('post_id'=>$post_id, 'post_type'=>'property'),'property_request_view', 'id');
            $data['list_post_property'][$i]->enquiry_count=$this->common_model->count(array('post_id'=>$post_id, 'post_type'=>'property'),'property_enquiries', 'id');
        }
        $user_id = $this->session->userdata('user')['user_id'];
        $data['list_my_favourite_project'] = $this->common_model->get_my_favourite_project();
        $data['list_my_favourite_property'] = $this->common_model->get_my_favourite_property();
        $data['list_my_property_responses'] = array();
        $data['list_my_project_responses'] = array();
        foreach($data['list_post_property'] as $i=>$row){
            $enquiry = $this->common_model->get_my_property_responses_data($row->post_id, 'property');
            foreach($enquiry as $r){
                $data['list_my_property_responses'][] = $r;
            }
        }
        foreach($data['list_post_project'] as $i=>$row){
            $enquiry = $this->common_model->get_my_project_responses_data($row->post_id, 'project');
            foreach($enquiry as $r){
                $data['list_my_project_responses'][] = $r;
            }
            $data['list_post_project'][$i]->request_views=$this->common_model->count(array('post_id'=>$row->post_id, 'post_type'=>'project'),'property_request_view', 'id');
            $data['list_post_project'][$i]->enquiries=$this->common_model->count(array('post_id'=>$row->post_id, 'post_type'=>'project'),'property_enquiries', 'id');
            // echo $this->db->last_query();
        }
        // print_r();
         // print_r($data['user_details']);
        //  pre($data['list_my_property_responses']);
        $this->Webview('home/dashboard', $data);
    }

    function update_user_profile(){
        $post = $this->input->post();
        // print_r($post); exit;
        $random_name = rand(10000,999999);
        if(!empty($_FILES['profile'])){
            if (!is_dir('./Uploads/user_profile/')) 
            {
                mkdir('./Uploads/user_profile/', 0777, TRUE);
            }
            $config['upload_path']          = './Uploads/user_profile';
            $config['file_name']            = $random_name;
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('profile'))
            {                    
                $upload_data = $this->upload->data();
                $file_name = "Uploads/user_profile/".$upload_data['file_name'];
            }
            else
            {
                $file_name = $post['prev_profile'];
            }   
        }
        $update_data = array('name'=>$post['name'], 
                             'usertype'=>$post['usertype'],
                             'email'=>$post['email'],
                             'website'=>$post['website'],
                             'company_name'=>$post['company_name'],
                             'address'=>$post['address'],
                             'pincode'=>$post['pincode'],
                             'area'=>$post['area'],
                             'landmark'=>$post['landmark'],
                             'country'=>$post['country'],
                             'state'=>$post['state'],
                             'city'=>$post['city'],
                             'phone'=>$post['phone'],
                             /*'landline'=>$post['landline'],*/
                             'about_us'=>$post['about_us'],
                             'profile'=>$file_name,
                            );
        $result = $this->common_model->update($update_data, array('user_id'=>$this->session->userdata('user')['user_id']), 'users');
        // print_r($this->db->last_query());
        if($result){
            $this->session->set_flashdata('success', 'Saved!');
            redirect('home/dashboard');
        }else{
            $this->session->set_flashdata('error', 'Failed!');
            redirect('dashboard');
        }

    }

    function update_lead_profile(){
        $post = $this->input->post();
        // print_r($_FILES); exit;
        $random_name = rand(10000,999999);
        if(!empty($_FILES['imageUpload'])){
            if (!is_dir('./Uploads/lead_profile/')) 
            {
                mkdir('./Uploads/lead_profile/', 0777, TRUE);
            }
            $config['upload_path']          = './Uploads/lead_profile';
            $config['file_name']            = $random_name;
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('imageUpload'))
            {                    
                $upload_data = $this->upload->data();
                $file_name = "Uploads/lead_profile/".$upload_data['file_name'];
            }
            else
            {
                //$this->upload->display_errors();
                $file_name = $post['prev_profile'];
            }   
        }else
        {
            $file_name = $post['prev_profile'];
        }
        $update_data = array('name'=>$post['name'], 
                             'code'=>$post['code'],
                             'email'=>$post['email'],
                             'phone'=>$post['phone'],
                             'alt_mobile'=>$post['alt_mobile'],
                             'address'=>$post['address'],
                             'pan'=>$post['pan'],
                             'aadhar'=>$post['aadhar'],
                             'bank_name'=>$post['bank_name'],
                             'bank_branch'=>$post['bank_branch'],
                             'ac_holder'=>$post['ac_holder'],
                             'account_no'=>$post['account_no'],
                             'ifsc'=>$post['ifsc'],
                             'contact'=>$post['contact'],
                             'landline'=>$post['landline'],
                             'profile'=>$file_name,
                            );
        // print_r($update_data); exit;
        $result = $this->common_model->update($update_data, array('user_id'=>$this->session->userdata('user')['user_id']), 'lead_partners');
        // print_r($this->db->last_query());
        if($result){
            $this->session->set_flashdata('success', 'Saved!');
            redirect('home/dashboard');
        }else{
            $this->session->set_flashdata('error', 'Failed!');
            redirect('home/dashboard');
        }

    }

    function buy_now()
    {
        $this->load->view('home/buy_now');   
    }

    function post_project()
    {
        $this->check_login();
        $data['post_id'] = 0;
        $data['list_state'] = $this->common_model->getdata(array('is_deleted'=>0,'status'=>0), 'state');
        $this->Webview('home/post_project', $data);   
    }

    function post_property($admin_id = 0)
    {
        $this->session->set_userdata('redirect_url', current_url());
        if($admin_id == 0){ $this->check_login(); 
            if($this->session->userdata('user')['usertype'] == 'Owner' || $this->session->userdata('user')['usertype'] == 'Builder' || $this->session->userdata('user')['usertype'] == 'Agent'){
                $data['user_data'] = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id']),'users');
            }else{
                $data['user_data'] = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id']),'lead_partners');
            }
            $subscriptions = $this->common_model->getdatabyid(array('id'=> $data['user_data']->subscription),'subscriptions');
            $_property = $this->common_model->count(array('user_id'=>$this->session->userdata('user')['user_id'],'user_type'=>$this->session->userdata('user')['usertype']),'post_property', 'post_id');
        }
        $data['list_state'] = $this->common_model->getdata(array('is_deleted'=>0,'status'=>0), 'state');
        
        $data['post_id'] = 0;
        $data['admin_id'] = $admin_id;
        // pre($data);
        $this->Webview('home/post_property', $data);   
    }

    function post_requirements($admin_id = 0)
    {
        $data['admin_id'] = $admin_id;
        if($this->session->userdata('user')['usertype'] == 'Owner' || $this->session->userdata('user')['usertype'] == 'Builder' || $this->session->userdata('user')['usertype'] == 'Agent'){
                $data['user_data'] = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id']),'users');
            }else{
                $data['user_data'] = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id']),'lead_partners');
            }
        $this->Webview('home/post_requirements', $data);   
    }

    function add_poperty()
    {
        if($this->session->userdata('user'))
        {
            $image_name = '';
            $video_name = '';
            $post = $this->input->post();
            $post_id = $post['post_id'];
            $random_name = rand(10000,999999);
            
            if(!empty($_FILES['UploadImages'])){
                if (!is_dir('./Uploads/user_post_images/')) 
                {
                    mkdir('./Uploads/user_post_images/', 0777, TRUE);
                }
                if (!is_dir('./Uploads/user_property_images/'.$post_id.'/')) 
                {
                    mkdir('./Uploads/user_property_images/'.$post_id.'/', 0777, TRUE);
                }
                $files = $_FILES;
                $mum_files = count($files['UploadImages']['name']);
                for($i=0; $i<$mum_files; $i++)
                {
                    $random_name = rand(10000,999999);
                    if ( isset($files['UploadImages']['name'][$i]) ) {
                        $config['file_name'] = $random_name;
                        if($i==0){
                            $config['upload_path'] = './Uploads/user_post_images';
                        }else{
                            $config['upload_path'] = './Uploads/user_property_images/'.$post_id.'/';
                        }
                        $config['allowed_types'] = '*';
                        $this->upload->initialize($config);
                        $_FILES['userfile']['name']= $files['UploadImages']['name']["$i"];
                        $_FILES['userfile']['type']= $files['UploadImages']['type']["$i"];
                        $_FILES['userfile']['tmp_name']= $files['UploadImages']['tmp_name']["$i"];
                        $_FILES['userfile']['error']= $files['UploadImages']['error']["$i"];
                        $_FILES['userfile']['size']= $files['UploadImages']['size']["$i"];    
    
                        $filename = rand().'-'.$_FILES['userfile']['name'];
    
                        if ( ! $this->upload->do_upload('userfile'))
                        {
                            // $error_message = $this->upload->display_errors();
                        }
                        else
                        {
                             $info = $this->upload->data();
                             if($i==0){
                                $image_name = "Uploads/user_post_images/".$info['file_name'];
                             }else{
                                $dataInfo[] = './Uploads/user_property_images/'.$post_id.'/'.$info['file_name'];
                            }
                        }
    
                    }
                }
            }
            $images =  !empty($dataInfo) ? implode(';', $dataInfo) : '';
            $random_name = rand(10000,999999);
            
            
            if($post_id == 0){
                $maxid = $this->common_model->selectmaxid('post_id', array(), 'post_property');
                $post_id = $maxid+1;
                $dataInfo = array();
                $nozero = 7 - strlen($maxid);
                $zeros = '';
                for($j=0;$j<$nozero;$j++){
                    $zeros .= '0';
                }
                if($post['admin_id'] == 0){
                    $user_id = $this->session->userdata('user')['user_id'];
                    $user_type = $this->session->userdata('user')['usertype'];
                }else{
                    $user_id = $post['admin_id'];
                    $user_type = 'Super Admin';
                }
                
                $lead_id = "PRT".$zeros.$post_id;
               
                $data = array('user_id'=>$user_id,
                              'user_type'=>$user_type,
                              'lead_id'=>$lead_id,
                              'name'=>$post['name'],
                              'name'=>$post['name'],
                              'mobile'=>$post['mobile'],
                              'phone'=>$post['phone'],
                              'mobile1'=>$post['mobile1'],
                              'email'=>$post['email'],
                              'state'=>$post['state'],
                              'location'=>$post['location'],
                              'city'=>$post['city'],
                              'complex_society_building'=>$post['complex_society_building'],
                              'address'=>$post['address'],
                              'blockno'=>$post['blockno'],
                              'landmark'=>$post['landmark'],
                              'flatno'=>$post['flatno'],
                              'pincode'=>$post['pincode'],
                              'image_name'=>$image_name,
                              'video_name'=>$post['UploadVideo'],
                              'images'=>$images,
                              'admin_id'=>$post['admin_id'],
                              'created'=>date('Y-m-d'),
                              'refresh_date'=>date('Y-m-d'),
                             );
                $post_id = $this->common_model->insert_data('post_property', $data);
                if(!empty($post['state']) && $post['state'] != ''){ 
                    $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                    if(empty($state)){ $this->common_model->insert_data('state', array('name'=>$post['state'], 'status'=>0)); }
                }
                $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                if(!empty($post['city']) && $post['city'] != ''){
                    $city = $this->common_model->getdatabyid(array('name'=>$post['city']),'city');
                    if(empty($city)){
                        $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                        $this->common_model->insert_data('city', array('name'=>$post['city'], 'state_id'=>!empty($state) ? $state->id : 0, 'status'=>0));
                    }
                }
                if(!empty($post['pincode']) && $post['pincode'] != ''){
                    $pincode = $this->common_model->getdatabyid(array('pincode'=>$post['pincode']),'pincode');
                    if(empty($pincode)){
                        $city = $this->common_model->getdatabyid(array('name'=>$post['city']),'city');
                        $this->common_model->insert_data('pincode', array('pincode'=>$post['pincode'], 'city_id'=>!empty($city) ? $city->id : 0, 'status'=>0));
                    }
                }
                if(!empty($post['location']) && $post['location'] != ''){ 
                    $location = $this->common_model->getdatabyid(array('name'=>$post['location']),'location');
                    if(empty($location)){ 
                        $pincode = $this->common_model->getdatabyid(array('pincode'=>$post['pincode']),'pincode');
                        $this->common_model->insert_data('location', array('name'=>$post['location'], 'pincode_id'=> !empty($pincode) ? $pincode->id : 0,'status'=>0)); 
                    }
                }
                if(!empty($post['complex_society_building'])){ 
                    if($post['complex_society_building'] != ''){
                        $society = $this->common_model->getdatabyid(array('name'=>$post['complex_society_building']),'society');
                        if(empty($society)){ 
                            $location = $this->common_model->getdatabyid(array('name'=>$post['location']),'location');
                            $this->common_model->insert_data('society', array('name'=>$post['complex_society_building'], 'location_id'=>!empty($location) ? $location->id : 0)); 
                        }
                    }
                }
                //Property Type
                $data = array('post_id'=>$post_id,
                              'rent_sell'=>$post['rent_sell'],
                              'res_com'=>$post['res_com'],
                              'FurnishedStatus'=>$post['FurnishedStatus'],
                              'residential'=>$post['residential'],
                              'security_deposite'=>$post['security_deposite'],
                              'rentPerMonth'=>$post['rentPerMonth'],
                              'net_amount'=>$post['net_amount'],
                            //   'amount'=>$post['amount'],
                            //   'per_unit'=>$post['per_unit'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('property_type', $data);
                
                $residential = $post['residential'];
                if($residential == 'DuplexFlat'){
                    //Duplex Flat
                    $data = array('post_id'=>$post_id,
                                  'room'=>@$post['room'],
                                  'balcony'=>@$post['balcony'],
                                  'super_buildup_area'=>@$post['super_buildup_area'],
                                  'super_buildup_area_unit'=>@$post['super_buildup_area_unit'],
                                  'carpet_area'=>@$post['carpet_area'],
                                  'carpet_unit'=>@$post['carpet_unit'],
                                  'upperfloorno'=>@$post['upperfloorno'],
                                  'bathroom'=>@$post['bathroom'],
                                  'kitchen'=>@$post['kitchen'],
                                  'buildup_area'=>@$post['buildup_area'],
                                  'buildup_area_Unit'=>@$post['buildup_area_Unit'],
                                  'lower_floor_no'=>@$post['lower_floor_no'],
                                  'totalfloor'=>@$post['totalfloor'],
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->common_model->insert_data('duplex_flat_details', $data);
                }elseif($residential == 'PentHouse'){
                //Pent House
                $data = array('post_id'=>$post_id,
                              'pent_room'=>@$post['pent_room'],
                              'pent_balcony'=>@$post['pent_balcony'],
                              'pent_super_buildup_area'=>@$post['pent_super_buildup_area'],
                              'pent_super_buildup_area_Unit'=>@$post['pent_super_buildup_area_Unit'],
                              'pent_carpet_area'=>@$post['pent_carpet_area'],
                              'pent_carpet_unit'=>@$post['pent_carpet_unit'],
                              'pent_floor'=>@$post['pent_floor'],
                              'pent_bathroom'=>@$post['pent_bathroom'],
                              'pent_kitchen'=>@$post['pent_kitchen'],
                              'pent_buildup_area'=>@$post['pent_buildup_area'],
                              'open_terrace'=>@$post['open_terrace'],
                              'pent_buildup_area_Unit'=>@$post['pent_buildup_area_Unit'],
                              'pent_open_terrace_unit'=>@$post['pent_open_terrace_unit'],
                              'total_floor'=>@$post['total_floor'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('pent_house_details', $data);
                }elseif($residential == 'Factory'){
                //Factory Rent
                $data = array('post_id'=>$post_id,
                              'factory_numberofcabin'=>@$post['factory_numberofcabin'],
                              'factory_super_buildup_area'=>@$post['factory_super_buildup_area'],
                              'factory_carpet_area'=>@$post['factory_carpet_area'],
                              'factory_super_buildup_area_unit'=>@$post['factory_super_buildup_area_unit'],
                              'factory_carpet_unit'=>@$post['factory_carpet_unit'],
                              'factory_floor'=>@$post['factory_floor'],
                              'factory_pentry'=>@$post['factory_pentry'],
                              'factory_roadWide'=>@$post['factory_roadWide'],
                              'factory_pentry_usedFor'=>@$post['factory_pentry_usedFor'],
                              'factory_roadWide_unit'=>@$post['factory_roadWide_unit'],
                              'factory_ManufacturingType'=>@$post['factory_ManufacturingType'],
                              'factory_NumberofWorkStation'=>@$post['factory_NumberofWorkStation'],
                              'factory_BuildupArea'=>@$post['factory_BuildupArea'],
                              'factory_OpenArea'=>@$post['factory_OpenArea'],
                              'factory_BuildupAreaUnit'=>@$post['factory_BuildupAreaUnit'],
                              'factory_OpenAreaUnit'=>@$post['factory_OpenAreaUnit'],
                              'factory_TotalFloor'=>@$post['factory_TotalFloor'],
                              'factory_Bathroom'=>@$post['factory_Bathroom'],
                              'factory_ElectricPower'=>@$post['factory_ElectricPower'],
                              'factory_ElectricPower_Unit'=>@$post['factory_ElectricPower_Unit'],
                              'factory_Bathroom_UsedFor'=>@$post['factory_Bathroom_UsedFor'],
                              'factory_HeavyVehicleParkingUpto'=>@$post['factory_HeavyVehicleParkingUpto'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('factory_details', $data);
                }elseif($residential == 'Flat'){
                //Flat Rent
                $data = array('post_id'=>$post_id,
                'flat_Room'=>@$post['flat_Room'],
                              'flat_Balcony'=>@$post['flat_Balcony'],
                              'flat_SuperBuildupArea'=>@$post['flat_SuperBuildupArea'],
                              'flat_CarpetArea'=>@$post['flat_CarpetArea'],
                              'flat_SuperBuildupAreaUnit'=>@$post['flat_SuperBuildupAreaUnit'],
                              'flat_Carpet_Unit'=>@$post['flat_Carpet_Unit'],
                              'flat_TotalFloor'=>@$post['flat_TotalFloor'],
                              'flat_Bathroom'=>@$post['flat_Bathroom'],
                              'flat_Kitchen'=>@$post['flat_Kitchen'],
                              'flat_BuildupArea'=>@$post['flat_BuildupArea'],
                              'flat_BuildupArea_Unit'=>@$post['flat_BuildupArea_Unit'],
                              'flat_Floor'=>@$post['flat_Floor'],
                              'flat_HeavyVehicleParkingUpto'=>@$post['flat_HeavyVehicleParkingUpto'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('flat_details', $data);
                }elseif($residential == 'HouseorBanglow'){
                //House Rent
                $data = array('post_id'=>$post_id,
                              'house_Room'=>$post['house_Room'],
                              'house_Balcony'=>$post['house_Balcony'],
                              'house_SuperBuildupArea'=>$post['house_SuperBuildupArea'],
                              'house_CarpetArea'=>$post['house_CarpetArea'],
                              'house_TotalCoveredLandArea'=>$post['house_TotalCoveredLandArea'],
                              'house_SuperBuildupArea_Unit'=>$post['house_SuperBuildupArea_Unit'],
                              'house_Carpet_Unit'=>$post['house_Carpet_Unit'],
                              'house_TotalCoveredLandArea_unit'=>$post['house_TotalCoveredLandArea_unit'],
                              'house_TotalFloor'=>$post['house_TotalFloor'],
                              'house_Bathroom'=>$post['house_Bathroom'],
                              'house_Kitchen'=>$post['house_Kitchen'],
                              'house_BuildupArea'=>$post['house_BuildupArea'],
                              'house_TotalLandArea'=>$post['house_TotalLandArea'],
                              'house_TotalUncoveredLandArea'=>$post['house_TotalUncoveredLandArea'],
                              'house_BuildupAreaUnit'=>$post['house_BuildupAreaUnit'],
                              'house_TotalLandArea_Unit'=>$post['house_TotalLandArea_Unit'],
                              'house_TotalUncoveredLandArea_Unit'=>$post['house_TotalUncoveredLandArea_Unit'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('house_details', $data);
                }elseif($residential == 'Land'){
                //Land Rent
                $data = array('post_id'=>$post_id,
                                'LandArea'=>$post['LandArea'],
                              'land_SuperBuildupArea_Unit'=>$post['land_SuperBuildupArea_Unit'],
                              'LandStatus'=>$post['LandStatus'],
                              'NatureofLand'=>$post['NatureofLand'],
                              'PropertyTax'=>$post['PropertyTax'],
                              'LandFacing'=>$post['LandFacing'],
                              'landCoveredArea'=>$post['landCoveredArea'],
                              'landCoveredAreaUnit'=>$post['landCoveredAreaUnit'],
                              'IstheExistingOwner'=>$post['IstheExistingOwner'],
                              'NoOfOwner'=>$post['NoOfOwner'],
                              'Mutation'=>$post['Mutation'],
                              'LandRoadWide'=>$post['LandRoadWide'],
                              'LandRoadWideUnit'=>$post['LandRoadWideUnit'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('land_details', $data);
                }elseif($residential == 'Office'){
                //Office Rent
                $data = array('post_id'=>$post_id,
                                'officeNumberofCabin'=>$post['officeNumberofCabin'],
                              'officeSuperBuildupArea'=>$post['officeSuperBuildupArea'],
                              'officeCarpetArea'=>$post['officeCarpetArea'],
                              'officeSuperBuildupAreaUnit'=>$post['officeSuperBuildupAreaUnit'],
                              'officeCarpetUnit'=>$post['officeCarpetUnit'],
                              'Flooroffice'=>$post['Flooroffice'],
                              'Pentryoffice'=>$post['Pentryoffice'],
                              'PentryofficeUsedFor'=>$post['PentryofficeUsedFor'],
                              'officeNumberofWorkStation'=>$post['officeNumberofWorkStation'],
                              'officeBuildupArea'=>$post['officeBuildupArea'],
                              'officeBuildupAreaUnit'=>$post['officeBuildupAreaUnit'],
                              'officeAC'=>$post['officeAC'],
                              'officeTotalFloor'=>$post['officeTotalFloor'],
                              'officeBathroom'=>$post['officeBathroom'],
                              'BathroomofficeUsedFor'=>$post['BathroomofficeUsedFor'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('office_details', $data);
                }elseif($residential == 'ShopOrShowroom'){
                //Shop Rent
                $data = array('post_id'=>$post_id,
                              'shoproof'=>$post['shoproof'],
                              'shopSuperBuildupArea'=>$post['shopSuperBuildupArea'],
                              'shopCoveredArea'=>$post['shopCoveredArea'],
                              'shopSuperBuildupAreaUnit'=>$post['shopSuperBuildupAreaUnit'],
                              'shopCoveredAreaUnit'=>$post['shopCoveredAreaUnit'],
                              'shopFloor'=>$post['shopFloor'],
                              'shopBathroom'=>$post['shopBathroom'],
                              'shopRoadWide'=>$post['shopRoadWide'],
                              'shopAvailableForBar'=>$post['shopAvailableForBar'],
                              'shopBathroomUnit'=>$post['shopBathroomUnit'],
                              'shopRoadWideUnit'=>$post['shopRoadWideUnit'],
                              'shopForResturant'=>$post['shopForResturant'],
                              'shopFrontage'=>$post['shopFrontage'],
                              'shopBuildupArea'=>$post['shopBuildupArea'],
                              'shopOpenArea'=>$post['shopOpenArea'],
                              'shopFrontageUnit'=>$post['shopFrontageUnit'],
                              'shopBuildupAreaUnit'=>$post['shopBuildupAreaUnit'],
                              'shopOpenAreaUnit'=>$post['shopOpenAreaUnit'],
                              'shopTotalFloor'=>$post['shopTotalFloor'],
                              'shopPentry'=>$post['shopPentry'],
                              'shopElectricPower'=>$post['shopElectricPower'],
                              'shopPentryUsedFor'=>$post['shopPentryUsedFor'],
                              'shopElectricPowerUnit'=>$post['shopElectricPowerUnit'],
                              'shopHeavyVehicleParkingUpto'=>$post['shopHeavyVehicleParkingUpto'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('shop_details', $data);
                }elseif($residential == 'Warehouse'){
                //Warehouse Rent
                $data = array('post_id'=>$post_id,
                              'warehouseNumberofCabin'=>$post['warehouseNumberofCabin'],
                              'warehouseSuperBuildupArea'=>$post['warehouseSuperBuildupArea'],
                              'warehouseSuperBuildupAreaUnit'=>$post['warehouseSuperBuildupAreaUnit'],
                              'warehouseCoveredAreaUnit'=>$post['warehouseCoveredAreaUnit'],
                              'warehouseFloor'=>$post['warehouseFloor'],
                              'warehouseroof'=>$post['warehouseroof'],
                              'warehouseRoadWide'=>$post['warehouseRoadWide'],
                              'warehouseRoadWideUnit'=>$post['warehouseRoadWideUnit'],
                              'warehouseHeavyVehicleParkingUpto'=>$post['warehouseHeavyVehicleParkingUpto'],
                              'warehouseNumberofWorkStation'=>$post['warehouseNumberofWorkStation'],
                              'warehouseBuildupArea'=>$post['warehouseBuildupArea'],
                              'warehouseOpenArea'=>$post['warehouseOpenArea'],
                              'warehouseBuildupAreaUnit'=>$post['warehouseBuildupAreaUnit'],
                              'warehouseOpenAreaUnit'=>$post['warehouseOpenAreaUnit'],
                              'warehouseTotalFloor'=>$post['warehouseTotalFloor'],
                              'warehousePentry'=>$post['warehousePentry'],
                              'warehouseBathroom'=>$post['warehouseBathroom'],
                              'warehousePentryUsedFor'=>$post['warehousePentryUsedFor'],
                              'warehouseBathroomUsedFor'=>$post['warehouseBathroomUsedFor'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('warehouse_details', $data);
                }
                //Other info
                $data = array('post_id'=>$post_id,
                                'section'=>@$post['section'],
                              'AgeofPropeety'=>@$post['AgeofPropeety'],
                              'PossessionDate'=>date('Y-m-d',strtotime(@$post['PossessionDate'])),
                              'PropertyType'=>@$post['PropertyType'],
                              'OpenParking'=>@$post['OpenParking'],
                              'CoveredParking'=>@$post['CoveredParking'],
                              'Basement'=>@$post['Basement'],
                              'LiftParking'=>@$post['LiftParking'],
                              'TwoWheeler'=>@$post['TwoWheeler'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('other_details', $data);
        
                //AMENITIES FOR COMMERCIAL
                $data = array('post_id'=>$post_id,
                              'PowerBackup'=>(!empty($post['PowerBackup'])) ? 1 : 0,
                              'ServiveLift'=>(!empty($post['ServiveLift'])) ? 1 : 0,
                              'Intercom'=>(!empty($post['Intercom'])) ? 1 : 0,
                              'CCTV'=>(!empty($post['CCTV'])) ? 1 : 0,
                              'Lift'=>(!empty($post['Lift'])) ? 1 : 0,
                              'WIFI'=>(!empty($post['WIFI'])) ? 1 : 0,
                              'VisitorParking'=>(!empty($post['VisitorParking'])) ? 1 : 0,
                              'Security'=>(!empty($post['Security'])) ? 1 : 0,
                              'comment'=>$post['comment'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('commercial_amenities', $data);
        
                //AMENITIES FOR RESIDENTIAL ONLY
                $data = array('post_id'=>$post_id,
                              'PowerBackup'=>(!empty($post['PowerBackup'])) ? 1 : 0,
                              'ServiveLift'=>(!empty($post['ServiveLift'])) ? 1 : 0,
                              'BanquetHall'=>(!empty($post['BanquetHall'])) ? 1 : 0,
                              'GYM'=>(!empty($post['GYM'])) ? 1 : 0,
                              'VisitorParking'=>(!empty($post['VisitorParking'])) ? 1 : 0,
                              'Intercom'=>(!empty($post['Intercom'])) ? 1 : 0,
                              'CCTV'=>(!empty($post['CCTV'])) ? 1 : 0,
                              'SwimmingPool'=>(!empty($post['SwimmingPool'])) ? 1 : 0,
                              'CloubHouse'=>(!empty($post['CloubHouse'])) ? 1 : 0,
                              'SarvantRoom'=>(!empty($post['SarvantRoom'])) ? 1 : 0,
                              'Lift'=>(!empty($post['Lift'])) ? 1 : 0,
                              'WIFI'=>(!empty($post['WIFI'])) ? 1 : 0,
                              'CommunityHall'=>(!empty($post['CommunityHall'])) ? 1 : 0,
                              'IndoorGame'=>(!empty($post['IndoorGame'])) ? 1 : 0,
                              'OutDoorGame'=>(!empty($post['OutDoorGame'])) ? 1 : 0,
                              'GasPipeLine'=>(!empty($post['GasPipeLine'])) ? 1 : 0,
                              'Park'=>(!empty($post['Park'])) ? 1 : 0,
                              'Security'=>(!empty($post['Security'])) ? 1 : 0,
                              'comment1'=>$post['comment1'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('residential_amenities', $data);
    
                $user = $this->common_model->getdata(array('user_id' => $this->session->userdata('user')['user_id']), 'users');
                if($user[0]->subscription == 1)
                {
                    $this->common_model->update(array('leads_pending' => $user[0]->leads_pending - 1), array('user_id' => $this->session->userdata('user')['user_id']), 'users');
                    if($res){$this->session->set_flashdata('success', 'Saved!');}
                    else{$this->session->set_flashdata('error', 'Failed!');}
                }
                else
                {
                    $this->session->set_flashdata('error', 'Failed!, Please Buy A Package');
                }
    
                
            }else{
                $update_data = array('name'=>$post['name'],
                              'mobile'=>$post['mobile'],
                              'phone'=>$post['phone'],
                              'mobile1'=>$post['mobile1'],
                              'email'=>$post['email'],
                              'state'=>$post['state'],
                              'location'=>$post['location'],
                              'city'=>$post['city'],
                              'complex_society_building'=>$post['complex_society_building'],
                              'address'=>$post['address'],
                              'blockno'=>$post['blockno'],
                              'landmark'=>$post['landmark'],
                              'flatno'=>$post['flatno'],
                              'pincode'=>$post['pincode'],
                              'image_name'=>$image_name,
                              'images'=>$images);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'post_property');
                $update_data = array('rent_sell'=>$post['rent_sell'],
                              'res_com'=>$post['res_com'],
                              'FurnishedStatus'=>$post['FurnishedStatus'],
                              'residential'=>$post['residential'],
                              'security_deposite'=>$post['security_deposite'],
                              'rentPerMonth'=>$post['rentPerMonth'],
                              'net_amount'=>$post['net_amount'],
                              'amount'=>$post['amount'],
                              'per_unit'=>$post['per_unit']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'property_type');
                $residential = $post['residential'];
                if($residential == 'DuplexFlat'){
                    //Duplex Flat
                    $update_data = array('room'=>$post['room'],
                                  'balcony'=>$post['balcony'],
                                  'super_buildup_area'=>$post['super_buildup_area'],
                                  'super_buildup_area_unit'=>$post['super_buildup_area_unit'],
                                  'carpet_area'=>$post['carpet_area'],
                                  'carpet_unit'=>$post['carpet_unit'],
                                  'upperfloorno'=>$post['upperfloorno'],
                                  'bathroom'=>$post['bathroom'],
                                  'kitchen'=>$post['kitchen'],
                                  'buildup_area'=>$post['buildup_area'],
                                  'buildup_area_Unit'=>$post['buildup_area_Unit'],
                                  'lower_floor_no'=>$post['lower_floor_no'],
                                  'totalfloor'=>$post['totalfloor']);
                    $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'duplex_flat_details');
                }elseif($residential == 'PentHouse'){
                //Pent House
                $update_data = array( 'pent_room'=>$post['pent_room'],
                                      'pent_balcony'=>$post['pent_balcony'],
                                      'pent_super_buildup_area'=>$post['pent_super_buildup_area'],
                                      'pent_super_buildup_area_Unit'=>$post['pent_super_buildup_area_Unit'],
                                      'pent_carpet_area'=>$post['pent_carpet_area'],
                                      'pent_carpet_unit'=>$post['pent_carpet_unit'],
                                      'pent_floor'=>$post['pent_floor'],
                                      'pent_bathroom'=>$post['pent_bathroom'],
                                      'pent_kitchen'=>$post['pent_kitchen'],
                                      'pent_buildup_area'=>$post['pent_buildup_area'],
                                      'open_terrace'=>$post['open_terrace'],
                                      'pent_buildup_area_Unit'=>$post['pent_buildup_area_Unit'],
                                      'pent_open_terrace_unit'=>$post['pent_open_terrace_unit'],
                                      'total_floor'=>$post['total_floor']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'pent_house_details');
                }elseif($residential == 'Factory'){
                //Factory Rent
                $update_data = array('factory_numberofcabin'=>$post['factory_numberofcabin'],
                              'factory_super_buildup_area'=>$post['factory_super_buildup_area'],
                              'factory_carpet_area'=>$post['factory_carpet_area'],
                              'factory_super_buildup_area_unit'=>$post['factory_super_buildup_area_unit'],
                              'factory_carpet_unit'=>$post['factory_carpet_unit'],
                              'factory_floor'=>$post['factory_floor'],
                              'factory_pentry'=>$post['factory_pentry'],
                              'factory_roadWide'=>$post['factory_roadWide'],
                              'factory_pentry_usedFor'=>$post['factory_pentry_usedFor'],
                              'factory_roadWide_unit'=>$post['factory_roadWide_unit'],
                              'factory_ManufacturingType'=>$post['factory_ManufacturingType'],
                              'factory_NumberofWorkStation'=>$post['factory_NumberofWorkStation'],
                              'factory_BuildupArea'=>$post['factory_BuildupArea'],
                              'factory_OpenArea'=>$post['factory_OpenArea'],
                              'factory_BuildupAreaUnit'=>$post['factory_BuildupAreaUnit'],
                              'factory_OpenAreaUnit'=>$post['factory_OpenAreaUnit'],
                              'factory_TotalFloor'=>$post['factory_TotalFloor'],
                              'factory_Bathroom'=>$post['factory_Bathroom'],
                              'factory_ElectricPower'=>$post['factory_ElectricPower'],
                              'factory_ElectricPower_Unit'=>$post['factory_ElectricPower_Unit'],
                              'factory_Bathroom_UsedFor'=>$post['factory_Bathroom_UsedFor'],
                              'factory_HeavyVehicleParkingUpto'=>$post['factory_HeavyVehicleParkingUpto']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'factory_details');
                }elseif($residential == 'Flat'){
                //Flat Rent
                $update_data = array('flat_Room'=>$post['flat_Room'],
                              'flat_Balcony'=>$post['flat_Balcony'],
                              'flat_SuperBuildupArea'=>$post['flat_SuperBuildupArea'],
                              'flat_CarpetArea'=>$post['flat_CarpetArea'],
                              'flat_SuperBuildupAreaUnit'=>$post['flat_SuperBuildupAreaUnit'],
                              'flat_Carpet_Unit'=>$post['flat_Carpet_Unit'],
                              'flat_TotalFloor'=>$post['flat_TotalFloor'],
                              'flat_Bathroom'=>$post['flat_Bathroom'],
                              'flat_Kitchen'=>$post['flat_Kitchen'],
                              'flat_BuildupArea'=>$post['flat_BuildupArea'],
                              'flat_BuildupArea_Unit'=>$post['flat_BuildupArea_Unit'],
                              'flat_Floor'=>$post['flat_Floor'],
                              'flat_HeavyVehicleParkingUpto'=>$post['flat_HeavyVehicleParkingUpto']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'flat_details');
                }elseif($residential == 'HouseorBanglow'){
                //House Rent
                $update_data = array('house_Room'=>$post['house_Room'],
                              'house_Balcony'=>$post['house_Balcony'],
                              'house_SuperBuildupArea'=>$post['house_SuperBuildupArea'],
                              'house_CarpetArea'=>$post['house_CarpetArea'],
                              'house_TotalCoveredLandArea'=>$post['house_TotalCoveredLandArea'],
                              'house_SuperBuildupArea_Unit'=>$post['house_SuperBuildupArea_Unit'],
                              'house_Carpet_Unit'=>$post['house_Carpet_Unit'],
                              'house_TotalCoveredLandArea_unit'=>$post['house_TotalCoveredLandArea_unit'],
                              'house_TotalFloor'=>$post['house_TotalFloor'],
                              'house_Bathroom'=>$post['house_Bathroom'],
                              'house_Kitchen'=>$post['house_Kitchen'],
                              'house_BuildupArea'=>$post['house_BuildupArea'],
                              'house_TotalLandArea'=>$post['house_TotalLandArea'],
                              'house_TotalUncoveredLandArea'=>$post['house_TotalUncoveredLandArea'],
                              'house_BuildupAreaUnit'=>$post['house_BuildupAreaUnit'],
                              'house_TotalLandArea_Unit'=>$post['house_TotalLandArea_Unit'],
                              'house_TotalUncoveredLandArea_Unit'=>$post['house_TotalUncoveredLandArea_Unit']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'house_details');
                }elseif($residential == 'Land'){
                //Land Rent
                $update_data = array('LandArea'=>$post['LandArea'],
                              'land_SuperBuildupArea_Unit'=>$post['land_SuperBuildupArea_Unit'],
                              'LandStatus'=>$post['LandStatus'],
                              'NatureofLand'=>$post['NatureofLand'],
                              'PropertyTax'=>$post['PropertyTax'],
                              'LandFacing'=>$post['LandFacing'],
                              'landCoveredArea'=>$post['landCoveredArea'],
                              'landCoveredAreaUnit'=>$post['landCoveredAreaUnit'],
                              'IstheExistingOwner'=>$post['IstheExistingOwner'],
                              'NoOfOwner'=>$post['NoOfOwner'],
                              'Mutation'=>$post['Mutation'],
                              'LandRoadWide'=>$post['LandRoadWide'],
                              'LandRoadWideUnit'=>$post['LandRoadWideUnit']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'land_details');
                }elseif($residential == 'Office'){
                //Office Rent
                $update_data = array('officeNumberofCabin'=>$post['officeNumberofCabin'],
                              'officeSuperBuildupArea'=>$post['officeSuperBuildupArea'],
                              'officeCarpetArea'=>$post['officeCarpetArea'],
                              'officeSuperBuildupAreaUnit'=>$post['officeSuperBuildupAreaUnit'],
                              'officeCarpetUnit'=>$post['officeCarpetUnit'],
                              'Flooroffice'=>$post['Flooroffice'],
                              'Pentryoffice'=>$post['Pentryoffice'],
                              'PentryofficeUsedFor'=>$post['PentryofficeUsedFor'],
                              'officeNumberofWorkStation'=>$post['officeNumberofWorkStation'],
                              'officeBuildupArea'=>$post['officeBuildupArea'],
                              'officeBuildupAreaUnit'=>$post['officeBuildupAreaUnit'],
                              'officeAC'=>$post['officeAC'],
                              'officeTotalFloor'=>$post['officeTotalFloor'],
                              'officeBathroom'=>$post['officeBathroom'],
                              'BathroomofficeUsedFor'=>$post['BathroomofficeUsedFor']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'office_details');
                }elseif($residential == 'ShopOrShowroom'){
                //Shop Rent
                $update_data = array('shoproof'=>$post['shoproof'],
                              'shopSuperBuildupArea'=>$post['shopSuperBuildupArea'],
                              'shopCoveredArea'=>$post['shopCoveredArea'],
                              'shopSuperBuildupAreaUnit'=>$post['shopSuperBuildupAreaUnit'],
                              'shopCoveredAreaUnit'=>$post['shopCoveredAreaUnit'],
                              'shopFloor'=>$post['shopFloor'],
                              'shopBathroom'=>$post['shopBathroom'],
                              'shopRoadWide'=>$post['shopRoadWide'],
                              'shopAvailableForBar'=>$post['shopAvailableForBar'],
                              'shopBathroomUnit'=>$post['shopBathroomUnit'],
                              'shopRoadWideUnit'=>$post['shopRoadWideUnit'],
                              'shopForResturant'=>$post['shopForResturant'],
                              'shopFrontage'=>$post['shopFrontage'],
                              'shopBuildupArea'=>$post['shopBuildupArea'],
                              'shopOpenArea'=>$post['shopOpenArea'],
                              'shopFrontageUnit'=>$post['shopFrontageUnit'],
                              'shopBuildupAreaUnit'=>$post['shopBuildupAreaUnit'],
                              'shopOpenAreaUnit'=>$post['shopOpenAreaUnit'],
                              'shopTotalFloor'=>$post['shopTotalFloor'],
                              'shopPentry'=>$post['shopPentry'],
                              'shopElectricPower'=>$post['shopElectricPower'],
                              'shopPentryUsedFor'=>$post['shopPentryUsedFor'],
                              'shopElectricPowerUnit'=>$post['shopElectricPowerUnit'],
                              'shopHeavyVehicleParkingUpto'=>$post['shopHeavyVehicleParkingUpto']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'shop_details');
                }elseif($residential == 'Warehouse'){
                //Warehouse Rent
                $update_data = array('warehouseNumberofCabin'=>$post['warehouseNumberofCabin'],
                              'warehouseSuperBuildupArea'=>$post['warehouseSuperBuildupArea'],
                              'warehouseSuperBuildupAreaUnit'=>$post['warehouseSuperBuildupAreaUnit'],
                              'warehouseCoveredAreaUnit'=>$post['warehouseCoveredAreaUnit'],
                              'warehouseFloor'=>$post['warehouseFloor'],
                              'warehouseroof'=>$post['warehouseroof'],
                              'warehouseRoadWide'=>$post['warehouseRoadWide'],
                              'warehouseRoadWideUnit'=>$post['warehouseRoadWideUnit'],
                              'warehouseHeavyVehicleParkingUpto'=>$post['warehouseHeavyVehicleParkingUpto'],
                              'warehouseNumberofWorkStation'=>$post['warehouseNumberofWorkStation'],
                              'warehouseBuildupArea'=>$post['warehouseBuildupArea'],
                              'warehouseOpenArea'=>$post['warehouseOpenArea'],
                              'warehouseBuildupAreaUnit'=>$post['warehouseBuildupAreaUnit'],
                              'warehouseOpenAreaUnit'=>$post['warehouseOpenAreaUnit'],
                              'warehouseTotalFloor'=>$post['warehouseTotalFloor'],
                              'warehousePentry'=>$post['warehousePentry'],
                              'warehouseBathroom'=>$post['warehouseBathroom'],
                              'warehousePentryUsedFor'=>$post['warehousePentryUsedFor'],
                              'warehouseBathroomUsedFor'=>$post['warehouseBathroomUsedFor']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'warehouse_details');
                }
                
                //Other info
                $update_data = array('section'=>$post['section'],
                              'AgeofPropeety'=>$post['AgeofPropeety'],
                              'PossessionDate'=>date('Y-m-d',strtotime($post['PossessionDate'])),
                              'PropertyType'=>$post['PropertyType'],
                              'OpenParking'=>$post['OpenParking'],
                              'CoveredParking'=>$post['CoveredParking'],
                              'Basement'=>$post['Basement'],
                              'LiftParking'=>$post['LiftParking'],
                              'TwoWheeler'=>$post['TwoWheeler']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'other_details');
                
                //AMENITIES FOR COMMERCIAL
                $update_data = array('PowerBackup'=>(!empty($post['PowerBackup'])) ? 1 : 0,
                              'ServiveLift'=>(!empty($post['ServiveLift'])) ? 1 : 0,
                              'Intercom'=>(!empty($post['Intercom'])) ? 1 : 0,
                              'CCTV'=>(!empty($post['CCTV'])) ? 1 : 0,
                              'Lift'=>(!empty($post['Lift'])) ? 1 : 0,
                              'WIFI'=>(!empty($post['WIFI'])) ? 1 : 0,
                              'VisitorParking'=>(!empty($post['VisitorParking'])) ? 1 : 0,
                              'Security'=>(!empty($post['Security'])) ? 1 : 0,
                              'comment'=>$post['comment']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'commercial_amenities');
                
                //AMENITIES FOR RESIDENTIAL ONLY
                $update_data = array('PowerBackup'=>(!empty($post['PowerBackup'])) ? 1 : 0,
                              'ServiveLift'=>(!empty($post['ServiveLift'])) ? 1 : 0,
                              'BanquetHall'=>(!empty($post['BanquetHall'])) ? 1 : 0,
                              'GYM'=>(!empty($post['GYM'])) ? 1 : 0,
                              'VisitorParking'=>(!empty($post['VisitorParking'])) ? 1 : 0,
                              'Intercom'=>(!empty($post['Intercom'])) ? 1 : 0,
                              'CCTV'=>(!empty($post['CCTV'])) ? 1 : 0,
                              'SwimmingPool'=>(!empty($post['SwimmingPool'])) ? 1 : 0,
                              'CloubHouse'=>(!empty($post['CloubHouse'])) ? 1 : 0,
                              'SarvantRoom'=>(!empty($post['SarvantRoom'])) ? 1 : 0,
                              'Lift'=>(!empty($post['Lift'])) ? 1 : 0,
                              'WIFI'=>(!empty($post['WIFI'])) ? 1 : 0,
                              'CommunityHall'=>(!empty($post['CommunityHall'])) ? 1 : 0,
                              'IndoorGame'=>(!empty($post['IndoorGame'])) ? 1 : 0,
                              'OutDoorGame'=>(!empty($post['OutDoorGame'])) ? 1 : 0,
                              'GasPipeLine'=>(!empty($post['GasPipeLine'])) ? 1 : 0,
                              'Park'=>(!empty($post['Park'])) ? 1 : 0,
                              'Security'=>(!empty($post['Security'])) ? 1 : 0,
                              'comment1'=>$post['comment1']);
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'residential_amenities');
            }
    
            if($post['admin_id'] == 0){
                $redirect_url = 'home/dashboard';
            }else{
                $redirect_url = '';
            }
            redirect($redirect_url);
        }
    }
    
    
    public function delete_post_requirement($post_id){
        $update_data = array('is_deleted'=>1);
        $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'post_requirement');
        if($res){
            $this->session->set_flashdata('success', 'Deleted!');
        }else{
            $this->session->set_flashdata('error', 'Failed!');
        }
        redirect('home/dashboard');
    }
    
    /*public function add_project(){
        $post = $this->input->post();
        $res = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id'], 'password'=>md5($post['old_password'])),'users');
        if($res){
            $update_data = array('password'=>md5($post['new_password']));
            $result = $this->common_model->update($update_data, array('user_id'=>$this->session->userdata('user')['user_id']), 'users');
            $this->session->set_flashdata('success', 'Password Updated successfully!');
            redirect('home/dashboard');
        }else{
            $this->session->set_flashdata('error', 'Wrong Old Password!');
            redirect('home/dashboard');
        }
    }*/
    
    
    public function change_user_password(){
        $post = $this->input->post();
        $res = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id'], 'password'=>md5($post['old_password'])),'users');
        if($res){
            $update_data = array('password'=>md5($post['new_password']));
            $result = $this->common_model->update($update_data, array('user_id'=>$this->session->userdata('user')['user_id']), 'users');
            $this->session->set_flashdata('success', 'Password Updated successfully!');
            redirect('home/dashboard');
        }else{
            $this->session->set_flashdata('error', 'Wrong Old Password!');
            redirect('home/dashboard');
        }
    }

    function add_project(){ 
        $post = $this->input->post();
        // pre($_FILES);
        $post_id = $post['post_id'];
        
        $maxid = $this->common_model->selectmaxid('post_id', array(), 'post_project');
        $newpostid = $maxid+1;
        $dataInfo = !empty($post['prev_image']) ? explode(';',$post['prev_image']) : array();
        // $dataInfo = array();
        if(!empty($_FILES['UploadImages'])){
            if (!is_dir('./Uploads/user_project_images/')) 
            {
                mkdir('./Uploads/user_project_images/', 0777, TRUE);
            }
            if (!is_dir('./Uploads/user_project_images/'.$newpostid.'/')) 
            {
                mkdir('./Uploads/user_project_images/'.$newpostid.'/', 0777, TRUE);
            }
            $files = $_FILES;
            $mum_files = count($files['UploadImages']['name']);
            for($i=0; $i<$mum_files; $i++)
            {
                $random_name = rand(10000,999999);
                if ( isset($files['UploadImages']['name'][$i]) ) {

                    $config['file_name'] = $random_name;
                    if($i==0){
                        $config['upload_path'] = './Uploads/user_project_images';
                    }else{
                        $config['upload_path'] = './Uploads/user_project_images/'.$newpostid.'/';
                    }
                    $config['allowed_types'] = '*';
                    $this->upload->initialize($config);
                    $_FILES['userfile']['name']= $files['UploadImages']['name']["$i"];
                    $_FILES['userfile']['type']= $files['UploadImages']['type']["$i"];
                    $_FILES['userfile']['tmp_name']= $files['UploadImages']['tmp_name']["$i"];
                    $_FILES['userfile']['error']= $files['UploadImages']['error']["$i"];
                    $_FILES['userfile']['size']= $files['UploadImages']['size']["$i"];    

                    $filename = rand().'-'.$_FILES['userfile']['name'];

                    if ( ! $this->upload->do_upload('userfile'))
                    {
                        // $error_message = $this->upload->display_errors();
                    }
                    else
                    {
                         $info = $this->upload->data();
                         if($i==0){
                            $image_name = "Uploads/user_project_images/".$info['file_name'];
                         }else{
                            $dataInfo[] = './Uploads/user_project_images/'.$newpostid.'/'.$info['file_name'];
                        }
                    }
                }
            }
        }
        $images =  !empty($dataInfo) ? implode(';', $dataInfo) : '';
        // echo $image_name;
        // pre($images);
        $random_name = rand(10000,999999);
        if(!empty($_FILES['UploadPdf'])){
            if (!is_dir('./Uploads/user_project_pdf/')) 
            {
                mkdir('./Uploads/user_project_pdf/', 0777, TRUE);
            }
            $config1['upload_path']          = './Uploads/user_project_pdf';
            $config1['file_name']            = $random_name;
            $config1['allowed_types']        = 'pdf';
            $config1['max_size']             = 0;
            $config1['max_width']            = 0;
            $config1['max_height']           = 0;

            // $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            if ($this->upload->do_upload('UploadPdf'))
            {                    
                $upload_data = $this->upload->data();
                $pdf_name = "Uploads/user_project_pdf/".$upload_data['file_name'];
            }
            else
            {
                // echo $this->upload->display_errors();
                $pdf_name = $post['prev_pdf'];
            }   
        }else{
            $pdf_name = $post['prev_pdf'];
        } 
        /*if(!empty($_FILES['UploadVideo'])){
            if (!is_dir('./Uploads/user_project_video/')) 
            {
                mkdir('./Uploads/user_project_video/', 0777, TRUE);
            }
            $config1['upload_path']          = './Uploads/user_project_video';
            $config1['file_name']            = $random_name;
            // $config1['allowed_types']        = '*';
            $config1['allowed_types']        = 'MP4|MOV|WMV|AVI|MKV';
            $config1['max_size']             = 0;
            $config1['max_width']            = 0;
            $config1['max_height']           = 0;

            // $this->load->library('upload', $config1);
            $this->upload->initialize($config1);
            if ($this->upload->do_upload('UploadVideo'))
            {                    
                $upload_data = $this->upload->data();
                $video_name = "Uploads/user_project_video/".$upload_data['file_name'];
            }
            else
            {
                // echo $this->upload->display_errors();
                $video_name = $post['prev_video'];
            }   
        }else
        {
            $video_name = $post['prev_video'];
        }*/  
        
        // exit;
        if($post_id == 0){
           
	            $maxid = $this->common_model->selectmaxid('post_id', array(), 'post_project');
	            $nozero = 7 - strlen($newpostid);
	            $zeros = '';
	            for($j=0;$j<$nozero;$j++){
	                $zeros .= '0';
	            }
	           // $lead_id = $this->RandomString().$zeros;
	            $lead_id = "PRJ".$zeros.($maxid+1);
                $insert_data = array('user_id'=>$this->session->userdata('user')['user_id'],
                            'user_type'=>$this->session->userdata('user')['usertype'],
                            'lead_id'=>$lead_id,
                            'PropertyStatus'=>$post['PropertyStatus'],
                            'sizestartingfrom'=>$post['sizestartingfrom'],
                            'sizestartingfromUnit'=>$post['sizestartingfromUnit'],
                            'bhk1'=>$post['bhk1'],
                            'bhk2'=>$post['bhk2'],
                            'propertyTypeRes'=>$post['propertyTypeRes'],
                            'sizeupto'=>$post['sizeupto'],
                            'price'=>$post['price'],
                            'propertyTypeCom'=>$post['propertyTypeCom'],
                            'sizeuptoUnit'=>$post['sizeuptoUnit'],
                            'priceUnit'=>$post['priceUnit'],
                            'state'=>$post['state'],
                            'location'=>$post['location'],
                            'city'=>$post['city'],
                            'landmark'=>$post['landmark'],
                            'pincode'=>$post['pincode'],
                            'Marketingby'=>$post['Marketingby'],
                            'project_name' => $post['project_name'],
                            'section'=>$post['section'],
                            'AgeofPropeety'=>$post['AgeofPropeety'],
                            'PossessionDate'=>!empty($post['PossessionDate']) ? date('Y-m-d',strtotime($post['PossessionDate'])) : NULL,
                            'PropertyType'=>$post['PropertyType'],
                            'Open'=>!empty($post['Open']) ? $post['Open'] : 0,
                            'Covered'=>!empty($post['Covered']) ? $post['Covered'] : 0,
                            'Basement'=>!empty($post['Basement']) ? $post['Basement'] : 0,
                            'LiftParking'=>!empty($post['LiftParking']) ? $post['LiftParking'] : 0,
                            'TwoWheeler'=>!empty($post['TwoWheeler']) ? $post['TwoWheeler'] : 0,
                            'PowerBackup'=>(!empty($post['PowerBackup'])) ? 1 : 0,
                            'ServiveLift'=>(!empty($post['ServiveLift'])) ? 1 : 0,
                            'BanquetHall'=>(!empty($post['BanquetHall'])) ? 1 : 0,
                            'GYM'=>(!empty($post['GYM'])) ? 1 : 0,
                            'VisitorParking'=>(!empty($post['VisitorParking'])) ? 1 : 0,
                            'Intercom'=>(!empty($post['Intercom'])) ? 1 : 0,
                            'CCTV'=>(!empty($post['CCTV'])) ? 1 : 0,
                            'SwimmingPool'=>(!empty($post['SwimmingPool'])) ? 1 : 0,
                            'CloubHouse'=>(!empty($post['CloubHouse'])) ? 1 : 0,
                            'SarvantRoom'=>(!empty($post['SarvantRoom'])) ? 1 : 0,
                            'Lift'=>(!empty($post['Lift'])) ? 1 : 0,
                            'WIFI'=>(!empty($post['WIFI'])) ? 1 : 0,
                            'CommunityHall'=>(!empty($post['CommunityHall'])) ? 1 : 0,
                            'IndoorGame'=>(!empty($post['IndoorGame'])) ? 1 : 0,
                            'OutDoorGame'=>(!empty($post['OutDoorGame'])) ? 1 : 0,
                            'GasPipeLine'=>(!empty($post['GasPipeLine'])) ? 1 : 0,
                            'Park'=>(!empty($post['Park'])) ? 1 : 0,
                            'Security'=>(!empty($post['Security'])) ? 1 : 0,
                            'comment'=>$post['comment'],
                            'pdf_file'=>$pdf_name,
                            'image_file'=>$image_name,
                            /*'video_file'=>$video_name,*/
                            'images'=>$images,
                            'is_deleted'=>0,
                            'created'=> date('Y-m-d H:i:s'),
                            'refresh_date'=> date('Y-m-d', strtotime('+3 months')),
                        );
                $res = $this->common_model->insert_data('post_project', $insert_data);
                
                if(!empty($post['state']) && $post['state'] != ''){ 
                    $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                    if(empty($state)){ $this->common_model->insert_data('state', array('name'=>$post['state'], 'status'=>0)); }
                }
                $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                if(!empty($post['city']) && $post['city'] != ''){
                    $city = $this->common_model->getdatabyid(array('name'=>$post['city']),'city');
                    if(empty($city)){
                        $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                        $this->common_model->insert_data('city', array('name'=>$post['city'], 'state_id'=>!empty($state) ? $state->id : 0, 'status'=>0));
                    }
                }
                if(!empty($post['pincode']) && $post['pincode'] != ''){
                    $pincode = $this->common_model->getdatabyid(array('pincode'=>$post['pincode']),'pincode');
                    if(empty($pincode)){
                        $city = $this->common_model->getdatabyid(array('name'=>$post['city']),'city');
                        $this->common_model->insert_data('pincode', array('pincode'=>$post['pincode'], 'city_id'=>!empty($city) ? $city->id : 0, 'status'=>0));
                    }
                }
                if(!empty($post['location']) && $post['location'] != ''){ 
                    $location = $this->common_model->getdatabyid(array('name'=>$post['location']),'location');
                    if(empty($location)){ 
                        $pincode = $this->common_model->getdatabyid(array('pincode'=>$post['pincode']),'pincode');
                        $this->common_model->insert_data('location', array('name'=>$post['location'], 'pincode_id'=> !empty($pincode) ? $pincode->id : 0,'status'=>0)); 
                    }
                }
                
                if($res){
                    $this->session->set_flashdata('success', 'Saved!');
                }else{
                    $this->session->set_flashdata('error', 'Failed!');
                }
            }else{
                $update_data = array('PropertyStatus'=>$post['PropertyStatus'],
                            'sizestartingfrom'=>$post['sizestartingfrom'],
                            'sizestartingfromUnit'=>$post['sizestartingfromUnit'],
                            'bhk1'=>$post['bhk1'],
                            'bhk2'=>$post['bhk2'],
                            'propertyTypeRes'=>$post['propertyTypeRes'],
                            'sizeupto'=>$post['sizeupto'],
                            'price'=>$post['price'],
                            'propertyTypeCom'=>$post['propertyTypeCom'],
                            'sizeuptoUnit'=>$post['sizeuptoUnit'],
                            'priceUnit'=>$post['priceUnit'],
                            'state'=>$post['state'],
                            'location'=>$post['location'],
                            'city'=>$post['city'],
                            'landmark'=>$post['landmark'],
                            'pincode'=>$post['pincode'],
                            'Marketingby'=>$post['Marketingby'],
                            'section'=>$post['section'],
                            'AgeofPropeety'=>$post['AgeofPropeety'],
                            'PossessionDate'=>date('Y-m-d',strtotime($post['PossessionDate'])),
                            'PropertyType'=>$post['PropertyType'],
                            'Open'=>(!empty($post['Open'])) ? 1 : 0,
                            'Covered'=>(!empty($post['Covered'])) ? 1 : 0,
                            'Basement'=>(!empty($post['Basement'])) ? 1 : 0,
                            'LiftParking'=>(!empty($post['LiftParking'])) ? 1 : 0,
                            'TwoWheeler'=>(!empty($post['TwoWheeler'])) ? 1 : 0,
                            'PowerBackup'=>(!empty($post['PowerBackup'])) ? 1 : 0,
                            'ServiveLift'=>(!empty($post['ServiveLift'])) ? 1 : 0,
                            'BanquetHall'=>(!empty($post['BanquetHall'])) ? 1 : 0,
                            'GYM'=>(!empty($post['GYM'])) ? 1 : 0,
                            'VisitorParking'=>(!empty($post['VisitorParking'])) ? 1 : 0,
                            'Intercom'=>(!empty($post['Intercom'])) ? 1 : 0,
                            'CCTV'=>(!empty($post['CCTV'])) ? 1 : 0,
                            'SwimmingPool'=>(!empty($post['SwimmingPool'])) ? 1 : 0,
                            'CloubHouse'=>(!empty($post['CloubHouse'])) ? 1 : 0,
                            'SarvantRoom'=>(!empty($post['SarvantRoom'])) ? 1 : 0,
                            'Lift'=>(!empty($post['Lift'])) ? 1 : 0,
                            'WIFI'=>(!empty($post['WIFI'])) ? 1 : 0,
                            'CommunityHall'=>(!empty($post['CommunityHall'])) ? 1 : 0,
                            'IndoorGame'=>(!empty($post['IndoorGame'])) ? 1 : 0,
                            'OutDoorGame'=>(!empty($post['OutDoorGame'])) ? 1 : 0,
                            'GasPipeLine'=>(!empty($post['GasPipeLine'])) ? 1 : 0,
                            'Park'=>(!empty($post['Park'])) ? 1 : 0,
                            'Security'=>(!empty($post['Security'])) ? 1 : 0,
                            'comment'=>$post['comment'],
                            'pdf_file'=>$pdf_name,
                            'image_file'=>$image_name,
                        );
                $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'post_project');
                if($res){
                    $this->session->set_flashdata('success', 'Updated!');
                }else{
                    $this->session->set_flashdata('error', 'Failed!');
                }
            }
            redirect('home/dashboard');
    }
    
    public function edit_project($post_id){
        $data['post_id'] = $post_id;
        $data['project'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
        $this->Webview('home/post_project', $data);
    }
    
    public function delete_project($post_id){
        $update_data = array('is_deleted'=>1);
        $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'post_project');
        if($res){
            $this->session->set_flashdata('success', 'Deleted!');
        }else{
            $this->session->set_flashdata('error', 'Failed!');
        }
        // echo 'Success';
        redirect('home/dashboard');
    }
    
    public function get_project_images(){
        $post_id = $this->input->post('post_id');
        $data['project'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
        if($data['project']){
            $images = $data['project']->images;
            $data['image_file'] = $data['project']->image_file;
            $data['project_id'] = $post_id;
            if($images != ''){
                $data['project_images'] = explode(';', $images);
            }else{
                $data['project_images'] = array();
            }
            $this->load->view('home/loads/load_project_images', $data);
        }
    }
    
    
    public function add_new_project_image(){
        // print_r($this->input->post());
        $post_id = $this->input->post('project_post_id');
        $dataInfo = array();
        if(!empty($_FILES['userfile'])){
            if (!is_dir('./Uploads/user_project_images/'.$post_id.'/')) 
            {
                mkdir('./Uploads/user_project_images/'.$post_id.'/', 0777, TRUE);
            }
            $files = $_FILES;
            $mum_files = count($files['userfile']);
                $dataInfo = array();
                for($i=0; $i<$mum_files; $i++)
                {

                    if ( isset($files['userfile']['name'][$i]) ) {

                        $config['file_name'] = time().'-'.$files['userfile']['name'][$i];
                        $config['upload_path'] = './Uploads/user_project_images/'.$post_id.'/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']      = '0';
                        $config['overwrite']     = FALSE;
                        // $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $_FILES['userfile']['name']= $files['userfile']['name']["$i"];
                        $_FILES['userfile']['type']= $files['userfile']['type']["$i"];
                        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name']["$i"];
                        $_FILES['userfile']['error']= $files['userfile']['error']["$i"];
                        $_FILES['userfile']['size']= $files['userfile']['size']["$i"];    

                        $filename = rand().'-'.$_FILES['userfile']['name'];

                        if ( ! $this->upload->do_upload('userfile'))
                        {
                            // $error_message = $this->upload->display_errors();
                        }
                        else
                        {
                             $info = $this->upload->data();
                             $dataInfo[] = './Uploads/user_project_images/'.$post_id.'/'.$info['file_name'];
                        }

                    }
                }
        }else{
            echo "files not send";
        }
        $images =  implode(';', $dataInfo);
        $data['project'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
        if($data['project']){
            $oldImage = $data['project']->images;
            if($oldImage != ''){
                $newImage = $oldImage.';'.$images;
            }else{
                $newImage = $images;
            }
            
            $result = $this->common_model->update(array('images'=>$newImage), array('post_id'=>$post_id), 'post_project');
            // print_r($this->db->last_query());
            if($result){
                $this->session->set_flashdata('success', 'Saved!');
                redirect('home/dashboard');
            }else{
                $this->session->set_flashdata('error', 'Failed!');
                redirect('home/dashboard');
            }
        }
    }
    
    
    function RandomString()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 2; $i++) {
            $randstring = strtoupper($characters[rand(0, strlen($characters))]);
        }
        return $randstring;
    }
    
    function RandomNumber()
    {
        $characters = '1234567890';
        $randstring = '';
        for ($i = 0; $i < 2; $i++) {
            $randstring = strtoupper($characters[rand(0, strlen($characters))]);
        }
        return $randstring;
    }
    
    public function edit_property($post_id){
        $data['post_id'] = $post_id;
        $data['property'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_property');
        $data['other_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'other_details');
        $data['property_type'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'property_type');
        $residential = $data['property_type']->residential;
        if($residential == 'DuplexFlat'){
            //Duplex Flat
            $data['duplex_flat_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'duplex_flat_details');
        }elseif($residential == 'PentHouse'){
        //Pent House
            $data['pent_house_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'pent_house_details');
        }elseif($residential == 'Factory'){
            //Factory Rent
            $data['factory_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'factory_details');
        }elseif($residential == 'Flat'){
            //Flat Rent
            $data['flat_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'flat_details');
        }elseif($residential == 'HouseorBanglow'){
            //House Rent
            $data['house_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'house_details');
        }elseif($residential == 'Land'){
            //Land Rent
            $data['land_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'land_details');
        }elseif($residential == 'Office'){
            //Office Rent
            $data['office_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'office_details');
        }elseif($residential == 'ShopOrShowroom'){
            //Shop Rent
            $data['shop_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'shop_details');
        }elseif($residential == 'Warehouse'){
            //Warehouse Rent
            $data['warehouse_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'warehouse_details');
        }
        $data['user_data'] = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id']),'users');  
        $data['residential_amenities'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'residential_amenities');
        $data['commercial_amenities'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'commercial_amenities');
        $this->Webview('home/post_property', $data);
    }
    
    public function delete_property($post_id){
        $update_data = array('is_deleted'=>1);
        $res = $this->common_model->update($update_data, array('post_id'=>$post_id), 'post_property');
        if($res){
            $this->session->set_flashdata('success', 'Deleted!');
        }else{
            $this->session->set_flashdata('error', 'Failed!');
        }
        redirect('home/dashboard');
    }
    
    public function get_property_images(){
        $post_id = $this->input->post('property_id');
        $data['property'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_property');
        if($data['property']){
            $images = $data['property']->images;
            $data['image_name'] = $data['property']->image_name;
            $data['property_id'] = $post_id;
            if($images != ''){
                $data['property_images'] = explode(';', $images);
            }else{
                $data['property_images'] = array();
            }
            $this->load->view('home/loads/load_property_images', $data);
        }
    }
    
    
    public function add_new_property_image(){
        // print_r($this->input->post());
        $post_id = $this->input->post('property_post_id');
        $dataInfo = array();
        if(!empty($_FILES['userfile'])){
            if (!is_dir('./Uploads/user_property_images/'.$post_id.'/')) 
            {
                mkdir('./Uploads/user_property_images/'.$post_id.'/', 0777, TRUE);
            }
            $files = $_FILES;
            $mum_files = count($files['userfile']);
                $dataInfo = array();
                for($i=0; $i<$mum_files; $i++)
                {

                    if ( isset($files['userfile']['name'][$i]) ) {

                        $config['file_name'] = time().'-'.$files['userfile']['name'][$i];
                        $config['upload_path'] = './Uploads/user_property_images/'.$post_id.'/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size']      = '0';
                        $config['overwrite']     = FALSE;
                        // $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $_FILES['userfile']['name']= $files['userfile']['name']["$i"];
                        $_FILES['userfile']['type']= $files['userfile']['type']["$i"];
                        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name']["$i"];
                        $_FILES['userfile']['error']= $files['userfile']['error']["$i"];
                        $_FILES['userfile']['size']= $files['userfile']['size']["$i"];    

                        $filename = rand().'-'.$_FILES['userfile']['name'];

                        if ( ! $this->upload->do_upload('userfile'))
                        {
                            // $error_message = $this->upload->display_errors();
                        }
                        else
                        {
                             $info = $this->upload->data();
                             $dataInfo[] = './Uploads/user_property_images/'.$post_id.'/'.$info['file_name'];
                        }

                    }
                }
        }else{
            echo "files not send";
        }
        $images =  implode(';', $dataInfo);
        $data['project'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_property');
        if($data['project']){
            $oldImage = $data['project']->images;
            if($oldImage != ''){
                $newImage = $oldImage.';'.$images;
            }else{
                $newImage = $images;
            }
            
            $result = $this->common_model->update(array('images'=>$newImage), array('post_id'=>$post_id), 'post_property');
            // print_r($this->db->last_query());
            if($result){
                $this->session->set_flashdata('success', 'Saved!');
                redirect('home/dashboard');
            }else{
                $this->session->set_flashdata('error', 'Failed!');
                redirect('home/dashboard');
            }
        }
    }
    
    
    public function delete_property_image($property_id, $index){
        $project = $this->common_model->getdatabyid(array('post_id'=>$property_id),'post_property');
        if($project){
            $oldImage = $project->images;
            $images = explode(';', $oldImage);
            // print_r($images); exit;
            unset($images[$index]);
            $result = $this->common_model->update(array('images'=>implode(';',$images)), array('post_id'=>$property_id), 'post_property');
            $this->session->set_flashdata('success', 'Saved!');
            redirect('home/dashboard');
        }
        $this->session->set_flashdata('error', 'Failed!');
        redirect('home/dashboard');
    }
    
    public function delete_project_image($project_id, $index){
        $project = $this->common_model->getdatabyid(array('post_id'=>$project_id),'post_project');
        if($project){
            $oldImage = $project->images;
            $images = explode(';', $oldImage);
            unset($images[$index]);
            $result = $this->common_model->update(array('images'=>implode(';',$images)), array('post_id'=>$project_id), 'post_project');
            $this->session->set_flashdata('success', 'Saved!');
            redirect('home/dashboard');
        }
        $this->session->set_flashdata('error', 'Failed!');
        redirect('home/dashboard');
    }
    
    public function add_property_to_favorite($post_id){
        $project = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_property');
        if($project){
            $favourite_by = $project->favourite_by;
            $favourite_by_array = !empty($favourite_by) ? explode(',', $favourite_by) : array();
            if(!in_array($this->session->userdata('user')['user_id'], $favourite_by_array)){
                $new_array = array_merge($favourite_by_array, array($this->session->userdata('user')['user_id']));
                $new_favourite_by = !empty($new_array) ? implode(',', $new_array) : $new_array;
                $result = $this->common_model->update(array('favourite_by'=>implode(',',$new_array)), array('post_id'=>$post_id), 'post_property');
                $this->session->set_flashdata('success', 'Added to favourite!');
                redirect('home');
            }else{
                $this->session->set_flashdata('error', 'Already in favorite list!');
                redirect('home');
            }
        }
        $this->session->set_flashdata('error', 'Failed!');
        redirect('home');
    }
    
    public function add_project_to_favorite($post_id){
        if($this->session->userdata('user')['usertype'] == 'lead_partner'){
            $project = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
            if($project){
                $favourite_by = $project->favourite_by_lead;
                $favourite_by_array = !empty($favourite_by) ? explode(',', $favourite_by) : array();
                // print_r($favourite_by_array); exit;
                if(!in_array($this->session->userdata('user')['user_id'], $favourite_by_array)){
                    $new_array = array_merge($favourite_by_array, array($this->session->userdata('user')['user_id']));
                    // print_r($new_array);
                    $new_favourite_by = !empty($new_array) ? implode(',', $new_array) : $new_array;
                    $result = $this->common_model->update(array('favourite_by_lead'=>implode(',',$new_array)), array('post_id'=>$post_id), 'post_project');
                    $this->session->set_flashdata('success', 'Added to favourite!');
                    redirect('home');
                }
            }
        }else{
            $project = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
            if($project){
                $favourite_by = $project->favourite_by;
                $favourite_by_array = !empty($favourite_by) ? explode(',', $favourite_by) : array();
                // print_r($favourite_by_array);
                if(!in_array($this->session->userdata('user')['user_id'], $favourite_by_array)){
                    $new_array = array_merge($favourite_by_array, array($this->session->userdata('user')['user_id']));
                    // print_r($new_array);
                    $new_favourite_by = !empty($new_array) ? implode(',', $new_array) : $new_array;
                    $result = $this->common_model->update(array('favourite_by'=>implode(',',$new_array)), array('post_id'=>$post_id), 'post_project');
                    $this->session->set_flashdata('success', 'Added to favourite!');
                    redirect('home');
                }
            }
        }
        
        // $this->session->set_flashdata('error', 'Failed!');
        redirect('home');
    }
    
    
    public function delete_my_favourite_project($post_id){
        if($this->session->userdata('user')['usertype'] == 'lead_partner'){
            $project = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
            if($project){
                $favourite_by = $project->favourite_by_lead;
                $favourite_by_array = !empty($favourite_by) ? explode(',', $favourite_by) : array();
                if(in_array($this->session->userdata('user')['user_id'], $favourite_by_array)){
                   $newArr = array();
                    foreach($favourite_by_array as $fv){
                        if($fv!=$this->session->userdata('user')['user_id']){
                            $newArr[] = $fv;
                        }
                    }
                    $new_favourite_by = !empty($newArr) ? implode(',', $newArr) : $newArr;
                    $result = $this->common_model->update(array('favourite_by_lead'=>implode(',',$newArr)), array('post_id'=>$post_id), 'post_project');
                    $this->session->set_flashdata('success', 'Removed from favourite!');
                    redirect('home/dashboard');
                }
            }
        }else{
            $project = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
            if($project){
                $favourite_by = $project->favourite_by;
                $favourite_by_array = !empty($favourite_by) ? explode(',', $favourite_by) : array();
                if(in_array($this->session->userdata('user')['user_id'], $favourite_by_array)){
                   $newArr = array();
                    foreach($favourite_by_array as $fv){
                        if($fv!=$this->session->userdata('user')['user_id']){
                            $newArr[] = $fv;
                        }
                    }
                    $new_favourite_by = !empty($newArr) ? implode(',', $newArr) : $newArr;
                    $result = $this->common_model->update(array('favourite_by'=>implode(',',$newArr)), array('post_id'=>$post_id), 'post_project');
                    $this->session->set_flashdata('success', 'Removed from favourite!');
                    redirect('home/dashboard');
                }
            }
        }
        $this->session->set_flashdata('error', 'Failed!');
        redirect('home/dashboard');
    }
    
    public function delete_my_favourite_property($post_id){
        $project = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_property');
        if($project){
            if($this->session->userdata('user')['usertype'] == 'lead_partner'){
                $favourite_by = $project->favourite_by_lead	;
                $favourite_by_array = !empty($favourite_by) ? explode(',', $favourite_by) : array();
                if(in_array($this->session->userdata('user')['user_id'], $favourite_by_array)){
                    $newArr = array();
                    foreach($favourite_by_array as $fv){
                        if($fv!=$this->session->userdata('user')['user_id']){
                            $newArr[] = $fv;
                        }
                    }
                    $new_favourite_by = !empty($newArr) ? implode(',', $newArr) : $newArr;
                    $result = $this->common_model->update(array('favourite_by_lead	'=>implode(',',$newArr)), array('post_id'=>$post_id), 'post_property');
                    $this->session->set_flashdata('success', 'Removed from favourite!');
                    redirect('home/dashboard');
                }
            }else{
                $favourite_by = $project->favourite_by;
                $favourite_by_array = !empty($favourite_by) ? explode(',', $favourite_by) : array();
                if(in_array($this->session->userdata('user')['user_id'], $favourite_by_array)){
                    $newArr = array();
                    foreach($favourite_by_array as $fv){
                        if($fv!=$this->session->userdata('user')['user_id']){
                            $newArr[] = $fv;
                        }
                    }
                    $new_favourite_by = !empty($newArr) ? implode(',', $newArr) : $newArr;
                    $result = $this->common_model->update(array('favourite_by'=>implode(',',$newArr)), array('post_id'=>$post_id), 'post_property');
                    $this->session->set_flashdata('success', 'Removed from favourite!');
                    redirect('home/dashboard');
                }   
            }
        }
        redirect('home/dashboard');
    }
    
    
    public function change_lead_password(){
        $post = $this->input->post();
        $res = $this->common_model->getdatabyid(array('user_id'=>$this->session->userdata('user')['user_id'], 'password'=>md5($post['lead_old_password'])),'lead_partners');
        if($res){
            $update_data = array('password'=>md5($post['lead_new_password']));
            $result = $this->common_model->update($update_data, array('user_id'=>$this->session->userdata('user')['user_id']), 'lead_partners');
            $this->session->set_flashdata('success', 'Password Updated successfully!');
            redirect('home/dashboard');
        }else{
            $this->session->set_flashdata('error', 'Wrong Old Password!');
            redirect('home/dashboard');
        }
    }
    
    public function add_quick_enquiry(){
        $post = $this->input->post();
        $insert_data = array('contact_name'=>$post['contact_name'], 'contact_email'=>$post['contact_email'], 'contact_number'=>$post['contact_number'], 'contact_subject'=>$post['contact_subject'], 'contact_msg'=>$post['contact_msg'], 'created'=>date('Y-m-d H:i:s'));
        $result = $this->common_model->insert_data('contact_us',$insert_data);
        if($result){
           $this->session->set_flashdata('success', 'Thank you for enquiry! Our team will get back to you soon.');
        //   $this->send_mail($post['contact_email'], "Floor Mantra", 'Thank you for enquiry! Our team will get back to you soon.');
           $message = 'Name : '.$post['contact_name'];
           $message .= 'Email : '.$post['contact_email'].'<br/><br/>';
           $message .= 'Contact : '.$post['contact_number'].'<br/><br/>';
           $message .= 'Subject : '.$post['contact_subject'].'<br/><br/>';
           $message .= 'Message : '.$post['contact_msg'].'<br/><br/>';
        //   $this->send_mail('info@floormantra.com' , "New Enquiry at Floor Mantra", $message);
            redirect('home');
        }else{
            $this->session->set_flashdata('error', 'Sorry! Failed to add your enquiry');
            redirect('home');
        }
    }
    
    public function get_in_touch(){
        $post = $this->input->post();
        $insert_data = array('phone'=>$post['phone'], 'email'=>$post['email'], 'message'=>$post['message'], 'created'=>date('Y-m-d H:i:s'));
        $result = $this->common_model->insert_data('get_in_touch',$insert_data);
        if($result){
            $message = '';
            $this->send_mail($post['email'], "StayeeKart", 'Thank you for enquiry! Our team will get back to you soon.');
            $message .= 'Email : '.$post['email'].'<br/><br/>';
            $message .= 'Contact : '.$post['phone'].'<br/><br/>';
            $message .= 'Message : '.$post['message'].'<br/><br/>';
            $this->send_mail('stayeekart@gmail.com' , "New Enquiry at StayeeKart", $message);
            $this->session->set_flashdata('success', 'Thank you for enquiry! Our team will get back to you soon.');
            redirect('home');
        }else{
            $this->session->set_flashdata('error', 'Sorry! Failed to add your enquiry');
            redirect('home');
        }
        
    }
    
    
    function send_email($send_from, $send_to, $subject, $message)
    {
        $config = Array(
            'smtp_host' => 'ssl://server61.secureclouddns.net',
            'smtp_port' => 465,
            'smtp_user' => 'info@stayeekart.in', // change it to yours
            'smtp_pass' => 'stayeekart@123', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE, 
            'newline' => "\r\n"
        );
        // $config = Array(
        //      'mailtype' => 'html',
        //      'priority' => '3',
        //      'charset'  => 'iso-8859-1',
        //      'validate'  => TRUE ,
        //      'newline'   => "\r\n",
        //      'wordwrap' => TRUE
        //   );
        
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from($send_from, "Do Not Reply");
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
    
    
    public function add_requirement(){
        $post = $this->input->post();
        // print_r($post);
        $location = $post['location'];
        $maxid = $this->common_model->selectmaxid('post_id', array(), 'post_requirement');
        $nozero = 7 - strlen($maxid);
        $zeros = '';
        for($j=0;$j<$nozero;$j++){
            $zeros .= '0';
        }
        // $lead_id = $this->RandomString().$zeros.$maxid;
        $lead_id = "RQT".$zeros.($maxid+1);
        $user_id = !empty($this->session->userdata('user')['user_id']) ? $this->session->userdata('user')['user_id'] : 0;
        $user_type = !empty($this->session->userdata('user')['usertype']) ? $this->session->userdata('user')['usertype'] : "";
        $insert_data = array('user_id'=>$user_id,
                              'lead_id'=>$lead_id,
                              'user_type'=>$user_type,
                              'admin_id'=>$post['admin_id'],
                              'name'=>$post['name'],
                             'mobile'=>$post['mobile'],
                             'phone'=>$post['phone'],
                             'mobile2'=>$post['mobile2'],
                             'email'=>$post['email'],
                             'state'=>$post['state'],
                             'location'=>(!empty($post['location'][0] && $post['location'][0] != '')) ? $post['location'][0] : '',
                             'city'=>$post['city'],
                             'ComplexSoceityBuilding'=>$post['ComplexSoceityBuilding'],
                             'rent_sell'=>$post['rent_sell'],
                             'residential_commercial'=>$post['residential_commercial'],
                             'FurnishedStatus'=>$post['FurnishedStatus'],
                             'residential'=>$post['residential'],
                             'MinimumRent'=>$post['MinimumRent'],
                             'MaximumRent'=>$post['MaximumRent'],
                             'section'=>$post['section'],
                             'PossessionDate'=>$post['PossessionDate'],
                             'OpenParking'=>$post['OpenParking'],
                             'CoveredParking'=>$post['CoveredParking'],
                             'Basement'=>$post['Basement'],
                             'LiftParking'=>$post['LiftParking'],
                             'TwoWheeler'=>$post['TwoWheeler'],
                             'created'=>date('Y-m-d H:i:s')
                             );
                             
        $result = $this->common_model->insert_data('post_requirement',$insert_data);
        if($result){ 
                /*if(!empty($post['state']) && $post['state'] != ''){ 
                    $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                    if(empty($state)){ $this->common_model->insert_data('state', array('name'=>$post['state'], 'status'=>0)); }
                }
                if(!empty($post['location'][0])){ 
                    if($post['location'][0] != ''){
                        $location = $this->common_model->getdatabyid(array('name'=>$post['location'][0]),'location');
                        if(empty($location)){ $this->common_model->insert_data('location', array('name'=>$post['location'][0])); }
                    }
                }
                $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                if(!empty($post['city']) && $post['city'] != ''){
                    $city = $this->common_model->getdatabyid(array('name'=>$post['city']),'city');
                    if(empty($city)){
                        $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                        $this->common_model->insert_data('city', array('name'=>$post['city'], 'state_id'=>!empty($state) ? $state->id : 0, 'status'=>0));
                    }
                }
                if(!empty($post['ComplexSoceityBuilding'])){ 
                    if($post['ComplexSoceityBuilding'] != ''){
                        $society = $this->common_model->getdatabyid(array('name'=>$post['ComplexSoceityBuilding']),'society');
                        if(empty($society)){ $this->common_model->insert_data('society', array('name'=>$post['ComplexSoceityBuilding'])); }
                    }
                }*/
                
                if(!empty($post['state']) && $post['state'] != ''){ 
                    $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                    if(empty($state)){ $this->common_model->insert_data('state', array('name'=>$post['state'], 'status'=>0)); }
                }
                $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                if(!empty($post['city']) && $post['city'] != ''){
                    $city = $this->common_model->getdatabyid(array('name'=>$post['city']),'city');
                    if(empty($city)){
                        $state = $this->common_model->getdatabyid(array('name'=>$post['state']),'state');
                        $this->common_model->insert_data('city', array('name'=>$post['city'], 'state_id'=>!empty($state) ? $state->id : 0, 'status'=>0));
                    }
                }
                /*if(!empty($post['pincode']) && $post['pincode'] != ''){
                    $pincode = $this->common_model->getdatabyid(array('pincode'=>$post['pincode']),'pincode');
                    if(empty($pincode)){
                        $city = $this->common_model->getdatabyid(array('name'=>$post['city']),'city');
                        $this->common_model->insert_data('pincode', array('pincode'=>$post['pincode'], 'city_id'=>!empty($city) ? $city->id : 0, 'status'=>0));
                    }
                }
                if(!empty($post['location']) && $post['location'] != ''){ 
                    $location = $this->common_model->getdatabyid(array('name'=>$post['location']),'location');
                    if(empty($location)){ 
                        $pincode = $this->common_model->getdatabyid(array('pincode'=>$post['pincode']),'pincode');
                        $this->common_model->insert_data('location', array('name'=>$post['location'], 'pincode_id'=> !empty($pincode) ? $pincode->id : 0,'status'=>0)); 
                    }
                }
                if(!empty($post['ComplexSoceityBuilding'])){ 
                    if($post['ComplexSoceityBuilding'] != ''){
                        $society = $this->common_model->getdatabyid(array('name'=>$post['ComplexSoceityBuilding']),'society');
                        if(empty($society)){ 
                            $location = $this->common_model->getdatabyid(array('name'=>$post['location']),'location');
                            $this->common_model->insert_data('society', array('name'=>$post['ComplexSoceityBuilding'], 'location_id'=>!empty($location) ? $location->id : 0)); 
                        }
                    }
                }*/
                
                /*if(!empty($post['pincode']) && $post['pincode'] != ''){
                    $pincode = $this->common_model->getdatabyid(array('pincode'=>$post['pincode']),'pincode');
                    if(empty($pincode)){
                        $city = $this->common_model->getdatabyid(array('name'=>$post['city']),'city');
                        $this->common_model->insert_data('pincode', array('pincode'=>$post['pincode'], 'city_id'=>!empty($city) ? $city->id : 0));
                    }
                }*/
            foreach($location as $row){
                if($row != ''){
                    $insert_data = array('requirement_id'=>$result, 'location'=>$row, 'created'=>date('Y-m-d'));
                    $res = $this->common_model->insert_data('post_requirement_locations',$insert_data);
                }
            }
            if($post['residential'] == 'Flat'){
                $duplex_flat = array(
                             'Room'=>$post['Room'],
                             'Bathroom'=>$post['Bathroom'],
                             'FlatMinimumAreaRequired'=>$post['FlatMinimumAreaRequired'],
                             'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                             'MinimumFloorHeight'=>$post['MinimumFloorHeight'],
                             'FlatMaximumAreaRequired'=>$post['FlatMaximumAreaRequired'],
                             'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                             'MaximumFloorHeight'=>$post['MaximumFloorHeight'],
                              'created'=>date('Y-m-d H:i:s'));
                $res = $this->common_model->insert_data('requirement_flat_details',$duplex_flat);
            }elseif($post['residential'] == 'HouseorBanglow'){
                $house = array(
                     'HouseRoom'=>$post['HouseRoom'],
                     'HouseBathroom'=>$post['HouseBathroom'],
                     'MinimumAreaRequired'=>$post['MinimumAreaRequired'],
                     'StockMinimumAreaRequiredUnit'=>$post['StockMinimumAreaRequiredUnit'],
                     'HouseMaximumAreaRequired'=>$post['HouseMaximumAreaRequired'],
                     'HouseMaximumOpenAreaUnit'=>$post['HouseMaximumOpenAreaUnit'],
                     'created'=>date('Y-m-d H:i:s'));
                $res = $this->common_model->insert_data('requirement_house_details',$house);
            }elseif($post['residential'] == 'PentHouse'){
                $duplex_flat = array(
                             'Room'=>$post['Room'],
                             'Bathroom'=>$post['Bathroom'],
                             'FlatMinimumAreaRequired'=>$post['FlatMinimumAreaRequired'],
                             'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                             'MinimumFloorHeight'=>$post['MinimumFloorHeight'],
                             'Bathroom'=>$post['Bathroom'],
                             'FlatMaximumAreaRequired'=>$post['FlatMaximumAreaRequired'],
                             'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                             'MaximumFloorHeight'=>$post['MaximumFloorHeight'],
                             'created'=>date('Y-m-d H:i:s'));
                $res = $this->common_model->insert_data('requirement_flat_details',$duplex_flat);
            }elseif($post['residential'] == 'DuplexFlat'){
                $duplex_flat = array(
                             'Room'=>$post['Room'],
                             'Bathroom'=>$post['Bathroom'],
                             'FlatMinimumAreaRequired'=>$post['FlatMinimumAreaRequired'],
                             'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                             'MinimumFloorHeight'=>$post['MinimumFloorHeight'],
                             'Bathroom'=>$post['Bathroom'],
                             'FlatMaximumAreaRequired'=>$post['FlatMaximumAreaRequired'],
                             'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                             'MaximumFloorHeight'=>$post['MaximumFloorHeight'],
                             'created'=>date('Y-m-d H:i:s'));
                $res = $this->common_model->insert_data('requirement_flat_details',$duplex_flat);
            }elseif($post['residential'] == 'Land'){
                 $land = array(
                 'LandMinimumAreaRequired'=>$post['LandMinimumAreaRequired'],
                 'LandSuperBuildupAreaUnit'=>$post['LandSuperBuildupAreaUnit'],
                 'LandMaximumAreaRequired'=>$post['LandMaximumAreaRequired'],
                 'MaximumAreaRequiredUnit'=>$post['MaximumAreaRequiredUnit'],
                 'LandFacing'=>$post['LandFacing'],
                 'LandRoadWide'=>$post['LandRoadWide'],
                 'LandRoadWideUnit'=>$post['LandRoadWideUnit'],
                'created'=>date('Y-m-d H:i:s'));
                $res = $this->common_model->insert_data('requirement_land_details',$land);
            }elseif($post['residential'] == 'Office'){
                $office = array(
                    'NumberofCabin'=>$post['NumberofCabin'],
                    'NumberofWorkStation'=>$post['NumberofWorkStation'],
                    'MinimumAreaRequired'=>$post['OfficeMinimumAreaRequired'],
                    'OfficeSuperBuildupAreaUnit'=>$post['OfficeSuperBuildupAreaUnit'],
                    'OfficeMinimumFloorHeight'=>$post['OfficeMinimumFloorHeight'],
                     'Pentry'=>$post['Pentry'],
                     'PentryUsedFor'=>$post['PentryUsedFor'],
                     'AC'=>$post['AC'],
                     'MaximumAreaRequired'=>$post['MaximumAreaRequired'],
                     'OfficeMaximumAreaRequiredUnit'=>$post['OfficeMaximumAreaRequiredUnit'],
                     'OfficeMaximumFloorHeight'=>$post['OfficeMaximumFloorHeight'],
                     'OfficeBathroom'=>$post['OfficeBathroom'],
                     'OfficeNatureofBusiness'=>$post['OfficeNatureofBusiness'],
                     'created'=>date('Y-m-d H:i:s'));
                $res = $this->common_model->insert_data('requirement_office_details',$office);
            }elseif($post['residential'] == 'ShoporShowroom'){
                $shop = array('ShopNatureofBusiness'=>$post['ShopNatureofBusiness'],
                         'ShopMinimumAreaRequired'=>$post['ShopMinimumAreaRequired'],
                         'MinimumAreaRequiredUnit'=>$post['MinimumAreaRequiredUnit'],
                         'ShopMaximumAreaRequired'=>$post['ShopMaximumAreaRequired'],
                         'ShopMaximumAreaRequiredUnit'=>$post['ShopMaximumAreaRequiredUnit'],
                         'created'=>date('Y-m-d H:i:s'));
                $res = $this->common_model->insert_data('requirement_shop_details',$shop);
            }elseif($post['residential'] == 'Warehouse'){
                 $warehouse = array(
                     'WarehouseMinimumCoveredArea'=>$post['WarehouseMinimumCoveredArea'],
                     'WarehouseMinimumOpenArea'=>$post['WarehouseMinimumOpenArea'],
                     'WarehouseMinimumCoveredAreaUnit'=>$post['WarehouseMinimumCoveredAreaUnit'],
                     'WarehouseMinimumOpenAreaUnit'=>$post['WarehouseMinimumOpenAreaUnit'],
                     'WarehouseMaximumOpenArea'=>$post['WarehouseMaximumOpenArea'],
                     'WarehouseMaximumCoveredAreaUnit'=>$post['WarehouseMaximumCoveredAreaUnit'],
                     'WarehouseMaximumOpenAreaUnit'=>$post['WarehouseMaximumOpenAreaUnit'],
                     'WarehouseMaximumCoveredArea'=>$post['WarehouseMaximumCoveredArea'],
                     'WarehouseHeavyVehicleParkingUpto'=>$post['WarehouseHeavyVehicleParkingUpto'],
                     'WarehouseRoof'=>$post['WarehouseRoof'],
                     'WarehouseRoadWide'=>$post['WarehouseRoadWide'],
                     'WarehouseRoadWideUnit'=>$post['WarehouseRoadWideUnit'],
                     'MinimumFloor'=>$post['MinimumFloor'],
                     'MaximumFloor'=>$post['MaximumFloor'],
                     'created'=>date('Y-m-d H:i:s'));
                $res = $this->common_model->insert_data('requirement_warehouse_details',$warehouse);
            }elseif($post['residential'] == 'Factory'){
                $factory = array('MinimumOpenArea'=>$post['MinimumOpenArea'],
                             'MinimumCoveredArea'=>$post['MinimumCoveredArea'],
                             'MinimumOpenAreaUnit'=>$post['MinimumOpenAreaUnit'],
                             'MinimumCoveredAreaUnit'=>$post['MinimumCoveredAreaUnit'],
                             'roof'=>$post['roof'],
                             'ElectricPower'=>$post['ElectricPower'],
                             'ElectricPowerUnit'=>$post['ElectricPowerUnit'],
                             'NatureofBusiness'=>$post['NatureofBusiness'],
                             'MaximumOpenArea'=>$post['MaximumOpenArea'],
                             'MaximumCoveredArea'=>$post['MaximumCoveredArea'],
                             'MaximumOpenAreaUnit'=>$post['MaximumOpenAreaUnit'],
                             'MaximumCoveredAreaUnit'=>$post['MaximumCoveredAreaUnit'],
                             'RoadWide'=>$post['RoadWide'],
                             'RoadWideUnit'=>$post['RoadWideUnit'],
                             'HeavyVehicleParkingUpto'=>$post['HeavyVehicleParkingUpto'],
                             'created'=>date('Y-m-d H:i:s'));
                $res = $this->common_model->insert_data('requirement_factory_details',$factory);             
            }elseif($post['residential'] == 'Land2'){
                 $land = array(
                 'LandMinimumAreaRequired'=>$post['LandMinimumAreaRequired'],
                 'LandSuperBuildupAreaUnit'=>$post['LandSuperBuildupAreaUnit'],
                 'LandMaximumAreaRequired'=>$post['LandMaximumAreaRequired'],
                 'MaximumAreaRequiredUnit'=>$post['MaximumAreaRequiredUnit'],
                 'LandFacing'=>$post['LandFacing'],
                 'LandRoadWide'=>$post['LandRoadWide'],
                 'LandRoadWideUnit'=>$post['LandRoadWideUnit'],
                 'created'=>date('Y-m-d H:i:s'));
                 $res = $this->common_model->insert_data('requirement_land_details',$land);
            }
            
            $this->session->set_flashdata('success', 'Requirement Added Successfully!');
            redirect('home');
        }else{
            $this->session->set_flashdata('error', 'Sorry! Failed to add your requirement');
            redirect('home');
        }         
                             
    }
    
    
    public function add_home_load(){ 
        $post = $this->input->post();
        // print_r($post);
        $maxid = $this->common_model->selectmaxid('id', array(), 'home_loan');
        $nozero = 7 - strlen($maxid);
        $zeros = '';
        for($j=0;$j<$nozero;$j++){
            $zeros .= '0';
        }
        // $lead_id = $this->RandomString().$zeros;
        $lead_id = "HLN".$zeros.($maxid+1);
        $user_id = !empty($this->session->userdata('user')['user_id']) ? $this->session->userdata('user')['user_id'] : 0;
        $user_type = !empty($this->session->userdata('user')['usertype']) ? $this->session->userdata('user')['usertype'] : '';
        $insert_data = array('lead_id'=>$lead_id,'user_id'=>$user_id,'user_type'=>$user_type, 'name'=>$post['name'], 'name'=>$post['name'], 'mobile'=>$post['mobile'], 'mobile2'=>$post['mobile2'], 'email'=>$post['email'], 
                             'country'=>$post['country'], 'city'=>$post['city'], 'pincode'=>$post['pincode'], 'state'=>$post['state'], 
                             'Address'=>$post['Address'], 'location'=>$post['location'], 'LoanRequiredUpto'=>$post['LoanRequiredUpto'], 
                             'companyname'=>$post['companyname'],'bank'=>$post['bank'],'employmentType'=>$post['employmentType'],
                             'annualIncome'=>$post['annualIncome'],'comment'=>$post['comment'],'created'=>date('Y-m-d H:i:s'), 'res_com' => $post['res_com'], 'residential' => $post['residential']);
        $res = $this->common_model->insert_data('home_loan',$insert_data);
        if($res){
          $this->session->set_flashdata('success', 'Requirement for home loan Added Successfully!');
            redirect('home');
        }else{
            $this->session->set_flashdata('error', 'Sorry! Failed to add your requirement');
            redirect('home');
        }     
        
    }
    
    public function delete_home_loan($id){
         $update_data = array('is_deleted'=>1);
        $res = $this->common_model->update($update_data, array('id'=>$id), 'home_loan');
        if($res){
            $this->session->set_flashdata('success', 'Deleted!');
        }else{
            $this->session->set_flashdata('error', 'Failed!');
        }
        redirect('home/dashboard');
    }
    
    function pg_details($id)
    {
        $data['pg_details'] = $this->common_model->getdatabyid(array('id'=>$id),'pg');
        $data['ami_booked'] = $this->common_model->getdata(array('pg_id'=>$id),'pg_amenities_booked');
        $data['ami'] = $this->common_model->getdata(array('is_deleted' => 0, 'status' => 1), 'pg_amenities');
        $data['pg_images'] = $this->common_model->getdata(array('pg_id'=>$id),'pg_images');
        $this->Webview('home/pg/pg_details', $data);
    }
    
    function see_details($type = 'project', $post_id)
    {
        $data['type'] = $type;
        $data['post_id'] = $post_id;
        if($type == 'property'){
                $data['property'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_property');
                $data['property_type'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'property_type');
                $data['nearby_property'] = $this->common_model->getnearbypropertydata($data['property']->pincode,$data['property']->location,$data['property']->city);
                $residential = $data['property_type']->residential;
                $user_type = $data['property']->user_type;
                $user_id = $data['property']->user_id;
                if($residential == 'DuplexFlat'){
                    $data['duplex_flat_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'duplex_flat_details');
                }elseif($residential == 'PentHouse'){
                    $data['pent_house_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'pent_house_details');
                }elseif($residential == 'Factory'){
                    $data['factory_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'factory_details');
                }elseif($residential == 'Flat'){
                    $data['flat_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'flat_details');
                }elseif($residential == 'HouseorBanglow'){
                    $data['house_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'house_details');
                }elseif($residential == 'Land'){
                    $data['land_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'land_details');
                }elseif($residential == 'Office'){
                    $data['office_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'office_details');
                }elseif($residential == 'ShopOrShowroom'){
                    $data['shop_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'shop_details');
                }elseif($residential == 'Warehouse'){
                    $data['warehouse_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'warehouse_details');
                }
                $data['other_details'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'other_details');
                if($data['property_type']->res_com == 'Residential'){
                    $data['amenities'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'residential_amenities');
                }else{
                    $data['amenities'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'commercial_amenities');    
                }
                if($user_type == 'Owner' || $user_type == 'Builder' || $user_type == 'Agent'){
                    $data['post_user'] = $this->common_model->getdatabyid(array('user_id'=>$user_id),'users');
                }elseif($user_type == 'lead_partner'){
                    $data['post_user'] = $this->common_model->getdatabyid(array('user_id'=>$user_id),'lead_partners');
                 }elseif($user_type == 'Super Admin' || $user_type == 'Admin'){
                    $data['post_user']  = $this->common_model->selectrowdata(array("*","mobile1 as phone"),array('id'=>1),'address_contact_config');
                    // $data['post_user']  = $this->common_model->getdatabyid(array('id'=>1),'address_contact_config');
                    
                    // pre($this->db->last_query());
                    // pre( $data['post_user']);
                    // exit;
                }
            $data['list_property'] = $this->common_model->getpropertydata(array('is_deleted'=>0), 'post_property');
            $data['list_reviews'] = $this->common_model->getdata(array('post_id'=>$post_id, 'property_type'=>'property'),'post_review_rating');
            $data['count_rate_1'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>1),'post_review_rating');
            $data['count_rate_2'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>2),'post_review_rating');
            $data['count_rate_3'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>3),'post_review_rating');
            $data['count_rate_4'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>4),'post_review_rating');
            $data['count_rate_5'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>5),'post_review_rating');
            
        }else{
            $data['project'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
            $data['list_reviews'] = $this->common_model->getdata(array('post_id'=>$post_id, 'property_type'=>'project'),'post_review_rating');
            $data['count_rate_1'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'project','post_id'=>$post_id, 'rate'=>1),'post_review_rating');
            $data['count_rate_2'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'project','post_id'=>$post_id, 'rate'=>2),'post_review_rating');
            $data['count_rate_3'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'project','post_id'=>$post_id, 'rate'=>3),'post_review_rating');
            $data['count_rate_4'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'project','post_id'=>$post_id, 'rate'=>4),'post_review_rating');
            $data['count_rate_5'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'project','post_id'=>$post_id, 'rate'=>5),'post_review_rating');
            if($data['project']->user_type == 'lead_partners'){
                $data['post_user'] = $this->common_model->getdatabyid(array('user_id'=>$data['project']->user_id),'lead_partners');
            }elseif($data['project']->user_type == 'Owner' || $data['project']->user_type == 'Builder' || $data['project']->user_type == 'Agent'){
                $data['post_user'] = $this->common_model->getdatabyid(array('user_id'=>$data['project']->user_id),'users');
            }elseif($data['project']->user_type == 'Super Admin' || $data['project']->user_type == 'Admin'){
                $data['post_user']  = $this->common_model->selectrowdata(array("*","mobile1 as phone"),array('id'=>1),'address_contact_config');
            }
        }
        // pre($data['amenities']);
        $rates = 0;
        $data['avg_rate'] = 0;
        if(!empty($data['list_reviews'])){
            foreach($data['list_reviews'] as $i=>$row){
                $rates += $row->rate;
                if($row->user_type == 'lead_partners'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>$row->user_id),'lead_partners');
                    $data['list_reviews'][$i]->name = @$user->name;;
                    $data['list_reviews'][$i]->profile = @$user->profile;
                }elseif($row->user_type == 'Owner' || $row->user_type == 'Builder' || $row->user_type == 'Agent'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>$row->user_id),'users');
                    //$data['list_reviews'][$i] = array_merge($data['list_reviews'][$i], array('name'=>@$user->name, 'profile'=>@$user->profile));
                    $data['list_reviews'][$i]->name = @$user->name;;
                    $data['list_reviews'][$i]->profile = @$user->profile;
                }elseif($row->user_type == 'Super Admin' || $row->user_type == 'Admin'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>1),'admin_users');
                    $data['list_reviews'][$i]->name = @$user->name;;
                    $data['list_reviews'][$i]->profile = '';
                    // $data['list_reviews'][$i] = array_merge($data['list_reviews'][$i], array('name'=>@$user->name, 'profile'=>''));
                }
            }
            $data['avg_rate'] = $rates/count($data['list_reviews']);
        }
        // pre($data['project']);
        $data['list_subscriptions'] = $this->common_model->getdata(array('status' =>1 ,'is_deleted' => 0), 'subscriptions');
        $this->Webview('home/single-property-detail', $data);
    }
    
    function add_more_location(){
        $this->load->view('home/add_more_location');
    }
    
    function get_search_location(){
        $result = array();
        $post = $this->input->post();
        if ($post['search_city']) {
            $list_location = $this->common_model->get_location_list_by_city_name_new($post);
        }
        else {
            $list_location = $this->common_model->getdata(array("name LIKE '".$post['location']."%'", 'is_deleted' => 0, 'status' => 1), 'location');
        }
        foreach($list_location as $row){
            $result[] = $row->name;
        }
        echo json_encode($result);
    }
    
    function get_location(){
        $result = array();
        $post = $this->input->post();
        $list_location = $this->common_model->getdata(array("name LIKE '".$post['location']."%'"), 'location');
        foreach($list_location as $row){
            $result[] = $row->name;
        }
        echo json_encode($result);
    }
    
    function get_states(){
        $result = array();
        $post = $this->input->post();
        $list_location = $this->common_model->getdata("name LIKE '".$post['state']."%'", 'state');
        foreach($list_location as $row){
            $result[] = $row->name;
        }
        echo json_encode($result);
    }
    
    function get_complex(){
        $result = array();
        $post = $this->input->post();
        $list_complex = $this->common_model->getdata(array("name LIKE '".$post['complex']."%'"), 'society');
        foreach($list_complex as $row){
            $result[] = $row->name;
        }
        echo json_encode($result);
    }
    
    function get_bank(){
        $result = array();
        $post = $this->input->post();
        $list_complex = $this->common_model->getdata(array("name LIKE '".$post['bank']."%'"), 'bank');
        foreach($list_complex as $row){
            $result[] = $row->name;
        }
        echo json_encode($result);
    }
    
    function get_cities_by_state(){
        $result = array();
        $post = $this->input->post();
        $list_location = $this->common_model->get_cities_by_state($post['state']);
        foreach($list_location as $row){
            $result[] = $row->name;
        }
        echo json_encode($result);
    }
    
    public function property_contact_form(){
        $post = $this->input->post();
        $insert_data = array('type'=>$post['type'], 'contact' => $post['contact'], 'post_id'=>$post['post_id'],  'full_name'=>$post['full_name'], 'email'=>$post['email'], 'message'=>$post['message'], 'created'=>date('Y-m-d H:i:s'));
        $res = $this->common_model->insert_data('property_contact_form',$insert_data);
        if($res){
          $this->session->set_flashdata('success', 'Message sent Successfully!');
          
            $message = "Contact On Yoour Property - <br/><br/> Name = ".$post['full_name']."<br><br> Email : ".$post['email']."<br><br>  Contact : ".$post['contact'];
            $subject = "StayeeKart - Property Details";
            $result = $this->send_mail($post['user_email'], $subject, $message);
            
            redirect('home');
        }else{
            $this->session->set_flashdata('error', 'Sorry! Failed to send your message');
            redirect('home');
        }   
    }
    
    public function pg_contact_form(){
        $post = $this->input->post();
        $insert_data = array('contact' => $post['contact'], 'post_id'=>$post['post_id'],  'full_name'=>$post['full_name'], 'email'=>$post['email'], 'message'=>$post['message'], 'created'=>date('Y-m-d H:i:s'));
        $res = $this->common_model->insert_data('pg_contact_form',$insert_data);
        if($res){
          $this->session->set_flashdata('success', 'Message sent Successfully!');
          
            // $message = "Contact On Yoour Property - <br/><br/> Name = ".$post['full_name']."<br><br> Email : ".$post['email']."<br><br>  Contact : ".$post['contact'];
            // $subject = "StayeeKart - Property Details";
            // $result = $this->send_mail($post['user_email'], $subject, $message);
            
           redirect($post['redirect_url']);
        }else{
            $this->session->set_flashdata('error', 'Sorry! Failed to send your message');
            redirect($post['redirect_url']);
        }   
    }
    
    public function add_ratings(){
        $post = $this->input->post();

        $insert_data = array('user_id'=>$this->session->userdata['user']['user_id'],'user_type'=>$this->session->userdata['user']['usertype'],'property_type'=>$post['property_type'], 'post_id'=>$post['post_id'], 'review_title'=>$post['review_title'], 'review_msg'=>$post['review_msg'], 'rate'=>$post['rate'], 'created'=>date('Y-m-d H:i:s'));
        $res = $this->common_model->insert_data('post_review_rating',$insert_data);
        if($res){
          $this->session->set_flashdata('success', 'Message sent Successfully!');
            redirect('home');
        }else{
            $this->session->set_flashdata('error', 'Sorry! Failed to send your message');
            redirect('home');
        }   
    }
    
    public function property_enquiry_now(){
        $post = $this->input->post();
        $otp=random_string('numeric', 6);
        $res = $this->common_model->getdatabyid(array('user_phone'=>$post['user_phone']),'property_enquiries');
        if($res){
            $message = "Property details that you are requested for - <br/><br/> Property Name = ".$post['property_name']."<br><br> Dealer Name : ".$post['property_post_user_name']."<br><br> Dealer Contact : ".$post['property_post_user_mobile'];
            $subject = "StayeeKart - Property Details";
            $result = $this->send_mail($post['user_email'], $subject, $message);
            if($res){
              $this->session->set_flashdata('success', 'Details are sent to your mail ID. Please check your mail.');
                redirect($post['redirect_url']);
            }else{
                $this->session->set_flashdata('error', 'Failed to send details to your mail id');
                redirect($post['redirect_url']);
            }
        }else{
            $message = "Please <a href='".base_url('home/verify_property_enquiry/'.$otp)."'>Click Here</a> to verification.";
            //$this->send_sms($post['user_phone'], $message);
            $insert_data = array('post_type'=>$post['enquiry_post_type'], 'post_id'=>$post['enquiry_post_id'], 'user_phone'=>$post['user_phone'],'user_name'=>$post['user_name'], 'user_email'=>$post['user_email'], 'user_message'=>$post['user_message'], 'otp'=>$otp, 'verified'=>0, 'created'=>date('Y-m-d H:i:s'));
            $res = $this->common_model->insert_data('property_enquiries',$insert_data);
            if($res){
              $this->session->set_flashdata('success', 'Verification link send to your contact no. please visit to your verfication link!');
                redirect($post['redirect_url']);
            }else{
                $this->session->set_flashdata('error', 'Sorry! Failed to send verification link to your contact no');
                redirect($post['redirect_url']);
            }   
        }
    }
    
     function verify_property_enquiry($otp = '')
    {
        $res = $this->common_model->getdatabyid(array('otp'=>$otp),'property_enquiries');
        if($res){
            $update_data = array('verified'=>1, 'otp'=>'');
            $result = $this->common_model->update($update_data, array('id'=>$res->id), 'property_enquiries');
            $post_id = $res->post_id;
            $post_type = $res->post_type;
            if($post_type == 'property'){
                $property = $this->common_model->getpropertydatabyid($post_id);
                if(!empty($property)){
                    $property_name = $property->flatno.' BHK '.$property_type->res_com.' '.$property_type->residential.' for '.$property_type->rent_sell.' in '.$property->city;
                    if($property->user_type == 'Owner' || $property->user_type == 'Builder' || $property->user_type == 'Agent'){
                        $post_user = $this->common_model->getdatabyid(array('user_id'=>$property->user_id),'users');
                        $dealer_name = @$post_user->name;
                        $dealer_contact = @$post_user->phone;
                    }elseif($property->user_type == 'lead_partner'){
                        $post_user = $this->common_model->getdatabyid(array('user_id'=>$property->user_id),'lead_partners');
                        $dealer_name = @$post_user->name;
                        $dealer_contact = @$post_user->phone;
                     }elseif($property->user_type == 'Super Admin' || $property->user_type == 'Admin'){
                        $post_user  = $this->common_model->getdatabyid(array('id'=>1),'address_contact_config');
                    }
                    $message = "Property details that you are requested for - <br/><br/> Property Name = ".@$property_name."<br><br> Dealer Name : ".@$dealer_name."<br><br> Dealer Contact : ".@$dealer_contact;
                    $subject = "StayeeKart - Property Details";
                    $result = $this->send_mail($res->user_email, $subject, $message);
                }
            }elseif($post_type == 'project'){
                $project = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
                if(!empty($project)){
                    $propertyType = ($project->PropertyStatus == 'Commercial') ? $project->propertyTypeCom : $project->propertyTypeRes;
                    $property_name = $project->bhk1.' - '.$project->bhk2.' BHK '.$project->PropertyStatus.' '.$propertyType.' for sale in '.$project->city;
                    if($project->user_type == 'Owner' || $project->user_type == 'Builder' || $project->user_type == 'Agent'){
                        $post_user = $this->common_model->getdatabyid(array('user_id'=>$project->user_id),'users');
                        $dealer_name = @$post_user->name;
                        $dealer_contact = @$post_user->phone;
                    }elseif($project->user_type == 'lead_partner'){
                        $post_user = $this->common_model->getdatabyid(array('user_id'=>$project->user_id),'lead_partners');
                        $dealer_name = @$post_user->name;
                        $dealer_contact = @$post_user->phone;
                     }elseif($project->user_type == 'Super Admin' || $project->user_type == 'Admin'){
                        $post_user  = $this->common_model->getdatabyid(array('id'=>1),'address_contact_config');
                    }
                    $message = "Property details that you are requested for - <br/><br/> Property Name = ".@$property_name."<br><br> Dealer Name : ".@$dealer_name."<br><br> Dealer Contact : ".@$dealer_contact;
                    $subject = "StayeeKart - Property Details";
                    $result = $this->send_mail($res->user_email, $subject, $message);
                }
            }
            $this->session->set_flashdata('success', 'OTP verified successfully! Property details sent to your email.');
            redirect('home');
        }else{
            $this->session->set_flashdata('error', 'Failed to vefiry OTP!');
            redirect('home');
        }
    }
    
    
    public function property_request_view(){
        $post = $this->input->post();
        $insert_data = array('post_type'=>$post['request_post_type'], 'post_id'=>$post['request_post_id'], 'request_date'=>date('Y-m-d', strtotime($post['request_date'])),'request_time'=>$post['request_time'], 'requestor_name'=>$post['requestor_name'], 'request_message'=>$post['request_message'], 'created'=>date('Y-m-d H:i:s'));
        $res = $this->common_model->insert_data('property_request_view',$insert_data);
        if($res){
          $this->session->set_flashdata('success', 'Enquiry sent Successfully!');
            redirect($post['redirect_url']);
        }else{
            $this->session->set_flashdata('error', 'Sorry! Failed to send your enquiry');
            redirect($post['redirect_url']);
        }   
    }
    
    public function PG_request_view(){
        $post = $this->input->post();
        $insert_data = array('post_id'=>$post['request_post_id'], 'request_date'=>date('Y-m-d', strtotime($post['request_date'])),'request_time'=>$post['request_time'], 'requestor_name'=>$post['requestor_name'], 'request_message'=>$post['request_message'], 'created'=>date('Y-m-d H:i:s'));
        $res = $this->common_model->insert_data('PG_request_view',$insert_data);
        if($res){
          $this->session->set_flashdata('success', 'Enquiry sent Successfully!');
            redirect($post['redirect_url']);
        }else{
            $this->session->set_flashdata('error', 'Sorry! Failed to send your enquiry');
            redirect($post['redirect_url']);
        }   
    }
    
    public function get_filtered_reviews(){
        $post = $this->input->post();
        $post_id = $post['post_id'];
        $post_type = $post['post_type'];
        $type = $post['type'];
        $data['list_reviews'] = array();
        if($type == 'newest_reviews'){
            $data['list_reviews'] = $this->common_model->selectquerydata("SELECT * FROM post_review_rating WHERE post_id = $post_id AND property_type = '$post_type' ORDER BY created DESC");
        }elseif($type == 'highest_ratings'){
            $data['list_reviews'] = $this->common_model->selectquerydata("SELECT * FROM post_review_rating WHERE post_id = $post_id AND property_type = '$post_type' ORDER BY rate DESC");
        }elseif($type == 'lowest_ratings'){
            $data['list_reviews'] = $this->common_model->selectquerydata("SELECT * FROM post_review_rating WHERE post_id = $post_id AND property_type = '$post_type' ORDER BY rate ASC");
        }
         $rates = 0;
        $data['avg_rate'] = 0;
        if(!empty($data['list_reviews'])){
            foreach($data['list_reviews'] as $i=>$row){
                $rates += $row->rate;
                if($row->user_type == 'lead_partners'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>$row->user_id),'lead_partners');
                    $data['list_reviews'][$i]->name = @$user->name;;
                    $data['list_reviews'][$i]->profile = @$user->profile;
                }elseif($row->user_type == 'Owner' || $row->user_type == 'Builder' || $row->user_type == 'Agent'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>$row->user_id),'users');
                    //$data['list_reviews'][$i] = array_merge($data['list_reviews'][$i], array('name'=>@$user->name, 'profile'=>@$user->profile));
                    $data['list_reviews'][$i]->name = @$user->name;;
                    $data['list_reviews'][$i]->profile = @$user->profile;
                }elseif($row->user_type == 'Super Admin' || $row->user_type == 'Admin'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>1),'admin_users');
                    $data['list_reviews'][$i]->name = @$user->name;;
                    $data['list_reviews'][$i]->profile = '';
                    // $data['list_reviews'][$i] = array_merge($data['list_reviews'][$i], array('name'=>@$user->name, 'profile'=>''));
                }
            }
            $data['avg_rate'] = $rates/count($data['list_reviews']);
        }
        $this->load->view('home/loads/load_filtered_reviews', $data);
    }

    public function get_property_responses(){
        $post = $this->input->post();
        $post_id = $post['post_id'];
        $property_type = $post['property_type'];
        $response_type = $post['response_type'];
        $data['response_type'] = $response_type;
        $data['property_type'] = $property_type;
        if($response_type == 'request_view'){
            $data['responses'] = $this->common_model->getdata(array('post_id'=>$post_id, 'post_type'=>$property_type), 'property_request_view');
        }else{
            $data['responses'] = $this->common_model->getdata(array('post_id'=>$post_id, 'post_type'=>$property_type), 'property_enquiries');
        }
        if($property_type == 'project'){
            $data['property'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_project');
            
        }else{
            $data['property'] = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_property');
        }
        $this->load->view('home/loads/load_property_responses', $data);
    }
    
    public function search_property($pageno){
        $post = $this->input->post(); //pre($post);
        // $post = $this->input->post();
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->common_model->search_property_count($post);
        // pre($post);
        
        $config["per_page"] = 500000;
        // $config["uri_segment"] = 2;
        $config['full_tag_open']    = '<div class="page-nation"><ul class="pagination pagination-large">';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><span>';
        $config['cur_tag_close']    = '</span></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        // $data["links"] = $this->pagination->create_links();
        
        // pre($data["links"]);
        // $pageno = $post['pageno'];
        $type = $post['type'];
        $sort_by = $post['sort_by'];
        $price_minimum = $post['price_minimum'];
        $price_maximum = $post['price_maximum'];
        $under_construction = $post['under_construction'];
        $age = @$post['age'];
        $ready_to_move = $post['ready_to_move'];
        $resale = $post['resale'];
        $new_booking = $post['new_booking'];
        $area = @$post['area'];
        // $area_unit = @$post['area_unit'];
        $posted_by = @$post['posted_by'];
        $availability = @$post['availability'];
        $data['type'] = $type;
        //if($type == 'Rent' || $type == 'Sell'){
            $list_property = $this->common_model->search_property($post, $config["per_page"], $pageno);
            //  pre($this->db->last_query());
            foreach($list_property as $i=>$property){
                $post_id = $property->post_id;
                $residential = $property->res_com;
                if($residential == 'DuplexFlat'){
                    $duplex_flat_details = $this->common_model->getarraydatabyid(array('post_id'=>$post_id),'duplex_flat_details');
                    $list_property[$i]->builtup_area = $duplex_flat_details['buildup_area'];
                    $list_property[$i]->builtup_unit = $duplex_flat_details['buildup_area_Unit'];
                }elseif($residential == 'PentHouse'){
                    $pent_house_details = $this->common_model->getarraydatabyid(array('post_id'=>$post_id),'pent_house_details');
                    $list_property[$i]->builtup_area = $pent_house_details['pent_buildup_area'];
                    $list_property[$i]->builtup_unit = $pent_house_details['pent_buildup_area_Unit'];
                }elseif($residential == 'Factory'){
                    $factory_details = $this->common_model->getarraydatabyid(array('post_id'=>$post_id),'factory_details');
                    $list_property[$i]->builtup_area = $factory_details['factory_BuildupArea'];
                    $list_property[$i]->builtup_unit = $factory_details['factory_BuildupAreaUnit'];
                }elseif($residential == 'Flat'){
                    $flat_details = $this->common_model->getarraydatabyid(array('post_id'=>$post_id),'flat_details');
                    $list_property[$i]->builtup_area = $flat_details['flat_BuildupArea'];
                    $list_property[$i]->builtup_unit = $flat_details['flat_BuildupArea_Unit'];
                }elseif($residential == 'HouseorBanglow'){
                    $house_details = $this->common_model->getarraydatabyid(array('post_id'=>$post_id),'house_details');
                    $list_property[$i]->builtup_area = $house_details['house_BuildupArea'];
                    $list_property[$i]->builtup_unit = $house_details['house_BuildupAreaUnit'];
                }elseif($residential == 'Land'){
                    $land_details = $this->common_model->getarraydatabyid(array('post_id'=>$post_id),'land_details');
                    $list_property[$i]->builtup_area = $land_details['LandArea'];
                    $list_property[$i]->builtup_unit = $land_details['land_SuperBuildupArea_Unit'];
                }elseif($residential == 'Office'){
                    $office_details = $this->common_model->getarraydatabyid(array('post_id'=>$post_id),'office_details');
                    $list_property[$i]->builtup_area = $office_details['officeBuildupArea'];
                    $list_property[$i]->builtup_unit = $office_details['officeBuildupAreaUnit'];
                }elseif($residential == 'ShopOrShowroom'){
                    $shop_details = $this->common_model->getarraydatabyid(array('post_id'=>$post_id),'shop_details');
                    $list_property[$i]->builtup_area = $shop_details['shopBuildupArea'];
                    $list_property[$i]->builtup_unit = $shop_details['shopBuildupAreaUnit'];
                }elseif($residential == 'Warehouse'){
                    $warehouse_details = $this->common_model->getarraydatabyid(array('post_id'=>$post_id),'warehouse_details');
                    $list_property[$i]->builtup_area = $warehouse_details['warehouseSuperBuildupArea'];
                    $list_property[$i]->builtup_unit = $warehouse_details['warehouseBuildupAreaUnit'];
                }
                $user_type = $property->user_type;
                if($user_type == 'Owner' || $user_type == 'Builder' || $user_type == 'Agent'){
                    $dealers = $this->common_model->getdatabyid(array('user_id'=>$property->user_id),'users');
                    $list_property[$i]->dealer_name = $dealers->name;
                    $list_property[$i]->dealer_contact = $dealers->phone;
                    $list_property[$i]->dealer_email = $dealers->email;
                }elseif($user_type == 'lead_partner'){
                    $dealers = $this->common_model->getdatabyid(array('user_id'=>$property->user_id),'lead_partners');
                    $list_property[$i]->dealer_name = $dealers->name;
                    $list_property[$i]->dealer_contact = $dealers->phone;
                    $list_property[$i]->dealer_email = $dealers->email;
                }elseif($user_type == 'Super Admin' || $user_type == 'Admin'){
                    $dealers = $this->common_model->getdatabyid(array('user_id'=>$property->user_id),'admin_users');
                    $list_property[$i]->dealer_name = $dealers->name;
                    $list_property[$i]->dealer_contact = $dealers->mobile;
                    $list_property[$i]->dealer_email = $dealers->email;
                }
        }
            $data['list_property'] = $list_property;
        //}
        
        if($type == 'New_projects'){
            $data['list_project'] = $this->common_model->search_project($post, $config["per_page"], $pageno);
            // pre($this->db->last_query());
            foreach($data['list_project'] as $i=>$project){
                $user_type = $project->user_type;
                if($user_type == 'Owner' || $user_type == 'Builder' || $user_type == 'Agent'){
                    $dealers = $this->common_model->getdatabyid(array('user_id'=>$project->user_id),'users');
                    if(!empty($dealers)){
                        $data['list_project'][$i]->dealer_name = @$dealers->name;
                        $data['list_project'][$i]->dealer_contact = @$dealers->mobile;
                        $data['list_project'][$i]->dealer_email = @$dealers->email;
                    }
                }elseif($user_type == 'lead_partner'){
                    $dealers = $this->common_model->getdatabyid(array('user_id'=>$project->user_id),'lead_partners');
                    if(!empty($dealers)){
                        $data['list_project'][$i]->dealer_name = $dealers->name;
                        $data['list_project'][$i]->dealer_contact = $dealers->phone;
                        $data['list_project'][$i]->dealer_email = $dealers->email;
                    }
                }elseif($user_type == 'Super Admin' || $user_type == 'Admin'){
                    $dealers = $this->common_model->getdatabyid(array('user_id'=>$project->user_id),'admin_users');
                    if(!empty($dealers)){
                        $data['list_project'][$i]->dealer_name = $dealers->name;
                        $data['list_project'][$i]->dealer_contact = $dealers->mobile;
                        $data['list_project'][$i]->dealer_email = $dealers->email;
                    }
                }
            }
            // pre($data);
        }
        
        $this->load->view('home/loads/load_search_property', $data);
    }
    
    
    public function refresh_property($post_id){
        $result = $this->common_model->update(array('refresh_date'=>date('Y-m-d')), array('post_id'=>$post_id), 'post_property');
        $user = $this->common_model->getdata(array('user_id' => $this->session->userdata('user')['user_id']), 'users');
        $new = $user[0]->leads_pending - 1;
        $this->common_model->update(array('leads_pending' => $new), array('user_id' => $this->session->userdata('user')['user_id']), 'users');
        if($result){
            $this->session->set_flashdata('success', 'Property refreshed successfully!');
            redirect('home/dashboard');
        }else{
            $this->session->set_flashdata('success', 'Failed to refresh Property!');
            redirect('home/dashboard');
        }
    }
    
    public function refresh_project($post_id){
        $result = $this->common_model->update(array('refresh_date'=>date('Y-m-d')), array('post_id'=>$post_id), 'post_project');
        if($result){
            $this->session->set_flashdata('success', 'Property refreshed successfully!');
            redirect('home/dashboard');
        }else{
            $this->session->set_flashdata('success', 'Failed to refresh Property!');
            redirect('home/dashboard');
        }
    }
    
    
    public function send_user_forgot_password_mail(){
        $post = $this->input->post();
        $email = $post['user_forgot_email'];
        $user = $this->common_model->getdatabyid(array('email'=>$email),'users');
        if(!empty($user)){
            $otp=random_string('numeric', 6);
            $result = $this->common_model->update(array('otp'=>$otp), array('email'=>$email), 'users');
            $message = "Thank you for showing interest at StayeeKart!\n\n Visit this link to activate your account - <a href='".base_url('home/user_forgot_password/'.$otp)."'>Click Here..</a>"; 
            $result = $this->send_mail($email, "StayeeKart - Reset Your Password", $message);
            $this->session->set_flashdata('success', 'OTP is send to your mail id. Please check your mail to reset your password!');
        }else{
            $this->session->set_flashdata('error', 'Your email ID is not registered in our database!');
        }
        redirect('home');
    }
    
    public function user_forgot_password($otp){
        $user = $this->common_model->getdatabyid(array('otp'=>$otp),'users');
        if(!empty($user)){
            $data['email'] = $user->email;
            $this->Webview('home/user_forgot_password', $data);
        }else{
            $this->session->set_flashdata('error', 'OTP is not valid');
            redirect('home');
        }
    }
    
    public function reset_user_password(){
        $post = $this->input->post();
        $email = $post['email'];
        $new_password = $post['password'];
        $result = $this->common_model->update(array('password'=>md5($new_password), 'otp'=>''), array('email'=>$email), 'users');
        if($result){
            $this->session->set_flashdata('success', 'Your password has been updated successfully!');
        }else{
            $this->session->set_flashdata('error', 'Failed to update your password.');
        }
        redirect('home');
    }
    
    
    public function send_lead_partner_forgot_password_mail(){
        $post = $this->input->post();
        $email = $post['lead_email'];
        $user = $this->common_model->getdatabyid(array('email'=>$email),'lead_partners');
        if(!empty($user)){
            $otp=random_string('numeric', 6);
            $result = $this->common_model->update(array('otp'=>$otp), array('email'=>$email), 'lead_partners');
            $message = "Thank you for showing interest at StayeeKart!\n\n Visit this link to activate your account - <a href='".base_url('home/lead_partners_forgot_password/'.$otp)."'>Click Here..</a>"; 
            $result = $this->send_mail($email, "StayeeKart - Reset Your Password", $message);
            $this->session->set_flashdata('success', 'OTP is send to your mail id. Please check your mail to reset your password!');
        }else{
            $this->session->set_flashdata('error', 'Your email ID is not registered in our database!');
        }
        redirect('home');
    }
    
    public function lead_partners_forgot_password($otp){
        $user = $this->common_model->getdatabyid(array('otp'=>$otp),'lead_partners');
        if(!empty($user)){
            $data['email'] = $user->email;
            $this->Webview('home/lead_partners_forgot_password', $data);
        }else{
            $this->session->set_flashdata('error', 'OTP is not valid');
            redirect('home');
        }
    }
    
    public function reset_lead_partner_password(){
        $post = $this->input->post();
        $email = $post['email'];
        $new_password = $post['password'];
        $result = $this->common_model->update(array('password'=>md5($new_password), 'otp'=>''), array('email'=>$email), 'lead_partners');
        if($result){
            $this->session->set_flashdata('success', 'Your password has been updated successfully!');
        }else{
            $this->session->set_flashdata('error', 'Failed to update your password.');
        }
        redirect('home');
    }
    
    
    public function find_property_enquiry_now(){
        $post = $this->input->post();
        // pre($post);
        $otp=random_string('numeric', 6);
        // $res = $this->common_model->getdatabyid(array('user_email'=>$post['user_email']),'property_enquiries');
        $res = $this->common_model->getdatabyid(array('user_phone'=>$post['user_phone']),'property_enquiries');
        if($res){
            $property_name = '';
            if($post['enquiry_post_type'] == 'property'){
                $property = $this->common_model->getpropertydatabyid($post['enquiry_post_id']);
                $property_name = $property->flatno.' BHK '.$property->res_com.' '.$property->residential.' for '.$property->rent_sell.' in '.$property->city;
                if($property->user_type == 'Owner' || $property->user_type == 'Builder' || $property->user_type == 'Agent'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>$property->user_id), 'users');
                    $property_post_user_name = $user->name;
                    $property_post_user_mobile = $user->phone;
                }elseif($property->user_type == 'lead_partner'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>$property->user_id), 'lead_partners');
                    $property_post_user_name = $user->name;
                    $property_post_user_mobile = $user->phone;
                }else{
                    $user = $this->common_model->getdatabyid(array('id'=>1), 'address_contact_config');
                    $property_post_user_name = $user->name;
                    $property_post_user_mobile = $user->mobile1;
                }
            }elseif($post['enquiry_post_type'] == 'project'){
                $project = $this->common_model->getdatabyid(array('post_id'=>$post['enquiry_post_id']), 'post_project');
                $property_name = $project->bhk1.' - '.$project->bhk2.' BHK '.$project->PropertyStatus.' '.'project'.' for sale in '.$project->city;
            }
            $message = "Property details that you are requested for - <br/><br/> Property Name = ".$property_name."<br><br> Dealer Name : ".$property_post_user_name."<br><br> Dealer Contact : ".$property_post_user_mobile;
            $subject = "StayeeKart - Property Details";
            $result = $this->send_mail($post['user_email'], $subject, $message);
            if($res){
              $this->session->set_flashdata('success', 'Details are sent to your mail ID. Please check your mail.');
                redirect($post['redirect_url']);
            }else{
                $this->session->set_flashdata('error', 'Failed to send details to your mail id');
                redirect($post['redirect_url']);
            }
        }else{
            $message = "Please <a href='".base_url('home/verify_property_enquiry/'.$otp)."'>Click Here</a> to verification.";
            //$this->send_sms($post['user_phone'], $message);
            $insert_data = array('post_type'=>$post['enquiry_post_type'], 'post_id'=>$post['enquiry_post_id'], 'user_phone'=>$post['user_phone'],'user_name'=>$post['user_name'], 'user_email'=>$post['user_email'], 'user_message'=>$post['user_message'], 'otp'=>$otp, 'verified'=>0, 'created'=>date('Y-m-d H:i:s'));
            $res = $this->common_model->insert_data('property_enquiries',$insert_data);
            if($res){
              $this->session->set_flashdata('success', 'Verification link send to your contact no. please visit to your verfication link!');
                redirect($post['redirect_url']);
            }else{
                $this->session->set_flashdata('error', 'Sorry! Failed to send verification link to your contact no');
                redirect($post['redirect_url']);
            }   
        }
    }
    
    
    function load_more_project_photos(){
        $post = $this->input->post();
        $cnt = $post['cnt'];
        $cnt++;
        ?>
            <div class="colm colm4">
                <h2 style="float: left;">Upload Photo</h2>
                <div class="section">
                    <label class="field prepend-icon file">
                    <span class="button btn-primary"> Choose File </span>
                    <input type="file" class="gui-file" name="UploadImages[]" id="UploadImages" accept=".png, .jpeg, .jpg"
                        onChange="document.getElementById('uploader_<?php echo $cnt; ?>').value = this.value;" >
                    <!--<input type="hidden" class="gui-file" name="prev_image" id="prev_image" >-->
                    <input type="text" class="gui-input" id="uploader_<?php echo $cnt; ?>" placeholder="no file selected" readonly>
                    <span class="field-icon"><i class="fa fa-upload"></i></span>
                    </label>
                </div>   
            </div>
    <?php }
    
    
    function load_more_property_photos(){
        $post = $this->input->post();
        $cnt = $post['cnt'];
        $cnt++;
        ?>
            <div class="colm colm6">
                <h2 style="float: left;">Add Photos</h2>
                <div class="section">
                    <label class="field prepend-icon file">
                    <span class="button btn-primary"> Choose File </span>
                    <input type="file" class="gui-file" name="UploadImages[]" id="UploadImages" 
                        onChange="document.getElementById('uploader<?php echo $cnt; ?>').value = this.value;" accept="image/*" multiple>
                    <input type="text" class="gui-input" id="uploader<?php echo $cnt; ?>" placeholder="no file selected" readonly>
                    <span class="field-icon"><i class="fa fa-upload"></i></span>
                    </label>
                </div>  
            </div>
    <?php }
    
    function get_details_on_whatsapp($id)
    {
        $user_data = $this->common_model->getdatabyid(array('user_id' => $this->session->userdata('user')['user_id']), 'users');
        if($user_data->leads_pending > 0)
        {
            $property = $this->common_model->getdatabyid(array('post_id' => $id),'post_property');
            // pre($property);
            $link = 'https://propertyfellows.in/home/see_details/property/' . $property->post_id;
            whatsapp_sms($user_data->phone, $property->name, $property->mobile, $property->email, $property->city, $link);
            $this->common_model->update(array('leads_pending' => $user_data->leads_pending - 1,), array('user_id' => $this->session->userdata('user')['user_id']), 'users');
            $data = array('post_id' => $id, 'user_id' => $this->session->userdata('user')['user_id'], 'created' => date('Y-m-d H:i:s'));
            $user_id = $this->common_model->insert_data('whatsapp_request', $data);
            $this->session->set_flashdata('success', 'Details shared on whatsapp!');
        }
        else
        {
            $this->session->set_flashdata('error', 'Your limit is end please upgrade your plan!');
            redirect('home/subscription');
        }

        if (strpos($_SERVER['HTTP_REFERER'], 'subscriptionDetails')) 
        {
            redirect('home');
        }
        else {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function getEnteredCouponVerified()
    {
        $post = $this->input->post();
        $couponEnter = $post['couponEnter'];
        $amount = $post['amount'];
        $coupon = $this->common_model->getdatabyid(array('coupon' => $couponEnter, 'is_deleted' => 0), 'coupons');
        if ($coupon)
        {
            echo json_encode($coupon);
        }
        else {echo json_encode("Need Valid Data");}

    }

    function subscriptionGenerateOTP()
    {
        $number = $this->input->post('SubMobile');
        $mobile_otp = random_string('numeric', 4);
        // $mobile_otp = 1111;
        $res = $this->common_model->getdatabyid(array('phone' => $number, 'is_deleted' => 0),'users');
        if($res)
        {
            $this->common_model->update(array('otp' => $mobile_otp), array('user_id' => $res->user_id), 'users');
        }
        else
        {
            $data = array('usertype' => "Owner", 'phone' => $number, 'status' => 0, 'otp' => $mobile_otp, 'created' => date('Y-m-d H:i:s'));
            $user_id = $this->common_model->insert_data('users', $data);
        }   
        
        $result = whatsapp_login_otp($res->phone, $mobile_otp);
    
        $response_array = json_decode($result, true);
        // pre($response_array);
        $error_message = $response_array['success'];
        if ($error_message == 1)
        {
            echo json_encode($result);
        }
        else {
            echo json_encode($error_message);
        }
    }

    function VerifyOTP()
    {
        $otp = $this->input->post('SubMobileOTP');
        $res = $this->common_model->getdatabyid(array('otp' => $otp), 'users');
        if ($res)
        {
            $this->common_model->update(array('otp' => '', 'mobile_verify' => 1), array('otp' => $otp), 'users');
            $session_array = array('user_id' => $res->user_id, 'leads' => $res->leads_pending, 'name' => $res->name, 'email' => $res->email,'usertype' => $res->usertype,'phone' => $res->phone,'state' => $res->state,'city' => $res->city);
            $this->session->set_userdata('user', $session_array);
            echo json_encode('OTP Verified!');
        }
        else {
            echo json_encode('Please enter Valid OTP');
        }
    }
    
}
?>