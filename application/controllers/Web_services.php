<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Web_services extends CI_Controller{
	function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('common_model');
    }
	
    function frontpagedata()
	{
		$this->load->model('common_model');
        $data = $this->common_model->getdatabyid(array('id'=>1),'address_contact_config');
        return $data;
	}
    
    public function send_mail($email_to, $subject_data, $message)
    {
         $config = Array(
            'mailtype' => 'html',
            'priority' => '3',
            'charset'  => 'iso-8859-1',
            'validate'  => TRUE ,
            'newline'   => "\r\n",
            'wordwrap' => TRUE
        );   
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from('info@nabilcreation.com');
        $this->email->to($email_to);
        $this->email->subject($subject_data);
        $this->email->message($message);    
        if ($this->email->send()) {
            return true;
        }
        else
        {
            return $this->email->print_debugger();
        }
    }
    
    protected function generate_token($len = 6)
    {
        $chars = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        shuffle($chars);
        $num_chars = count($chars) - 1;
        $token = '';
        for ($i = 0; $i < $len; $i++)
        {
            $token .= $chars[mt_rand(0, $num_chars)];
        }
        return $token;
    }
    
    function dashboard()
    {
        $form_data = $this->input->get(array('user_id'));
        if (!empty($form_data['user_id']))
        {
            $data['user_details'] = $this->common_model->getdatabyid(array('user_id' => $form_data['user_id']), 'users');
            $data['list_subscriptions'] = $this->common_model->getdata(array('status' => 1, 'is_deleted' => 0, 'user_type' => 'Owner'), 'subscriptions');
            $data['list_post_property'] = $this->common_model->getdata(array('user_id' => $form_data['user_id'], 'user_type' => 'Owner', 'is_deleted' => 0), 'post_property');
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
            
            $data['list_my_property_contact'] = $this->common_model->get_property_contact_form($form_data['user_id']);
            $data['list_my_property_request_view'] = $this->common_model->get_property_request_view($form_data['user_id']);
                
            $data['list_my_favourite_property'] = $this->common_model->get_my_favourite_property_new($form_data['user_id']);
            
            echo json_encode(array('status' => 0, 'data' => $data));
        }
        else
        {
            echo json_encode(array('status' => 2, 'message' => 'Please Login First'));
        }
    }
    
    public function property_request_view() {
        $post = $this->input->post();
        if ($post) {
            $insert_data = array('post_type' => 'property', 'post_id' => $post['request_post_id'], 'request_date' => date('Y-m-d', strtotime($post['request_date'])), 'request_time' => $post['request_time'],
            'requestor_name' => $post['requestor_name'], 'request_message' => $post['request_message'], 'created' => date('Y-m-d H:i:s'));
            $res = $this->common_model->insert_data('property_request_view',$insert_data);
            if ($res) {
                echo json_encode(array('status' => 0, 'message' => 'Enquiry sent Successfully!'));
            } 
            else {
                 echo json_encode(array('status' => 2, 'message' => 'Sorry! Failed to send your enquiry'));
            }
        }
        else{echo json_encode(array('status' => 3, 'message' => 'Request Not Accepted'));}
    }
    
    public function get_property_request_view($user_id) {
        $res = $this->common_model->get_property_request_view($user_id);
        if ($res) {
            echo json_encode(array('status' => 0, 'data' => $res));
        } 
        else {
             echo json_encode(array('status' => 2, 'message' => 'No Message Yet'));
        }
    }
    
    public function PG_request_view(){
        $post = $this->input->post();
        if ($post) {
        $insert_data = array('post_id'=>$post['request_post_id'], 'request_date'=>date('Y-m-d', strtotime($post['request_date'])),'request_time'=>$post['request_time'], 'requestor_name'=>$post['requestor_name'], 'request_message'=>$post['request_message'], 'created'=>date('Y-m-d H:i:s'));
        $res = $this->common_model->insert_data('PG_request_view',$insert_data);
        if ($res) {
                echo json_encode(array('status' => 0, 'message' => 'Enquiry sent Successfully!'));
            } 
            else {
                 echo json_encode(array('status' => 2, 'message' => 'Sorry! Failed to send your enquiry'));
            }
        }
        else{echo json_encode(array('status' => 3, 'message' => 'Request Not Accepted'));}
    }
    
    public function property_contact_form() {
        $post = $this->input->post();
        if ($post) {
            $insert_data = array('type' => 'property', 'contact' => $post['contact'], 'post_id' => $post['post_id'], 'full_name' => $post['full_name'], 'email' => $post['email'], 'message' => $post['message'], 'created'=>date('Y-m-d H:i:s'));
            $res = $this->common_model->insert_data('property_contact_form',$insert_data);
            if ($res) {
                echo json_encode(array('status' => 0, 'message' => 'Message sent Successfully!'));
            } 
            else {
                 echo json_encode(array('status' => 2, 'message' => 'Sorry! Failed to send your message'));
            }
        }
        else{echo json_encode(array('status' => 3, 'message' => 'Request Not Accepted'));}
    }
    
    public function get_property_contact_form($user_id) {
        $res = $this->common_model->get_property_contact_form($user_id);
        if ($res) {
            echo json_encode(array('status' => 0, 'data' => $res));
        } 
        else {
             echo json_encode(array('status' => 2, 'message' => 'No Message Yet'));
        }
    }
    
    public function pg_contact_form() {
        $post = $this->input->post();
        if ($post) {
            $insert_data = array('contact' => $post['contact'], 'post_id'=>$post['post_id'],  'full_name'=>$post['full_name'], 'email'=>$post['email'], 'message'=>$post['message'], 'created'=>date('Y-m-d H:i:s'));
            $res = $this->common_model->insert_data('pg_contact_form',$insert_data);
            if ($res) {
                echo json_encode(array('status' => 0, 'message' => 'Message sent Successfully!'));
            } 
            else {
                 echo json_encode(array('status' => 2, 'message' => 'Sorry! Failed to send your message'));
            }
        }
        else{echo json_encode(array('status' => 3, 'message' => 'Request Not Accepted'));}
    }
    
    function home_page_data()
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
        
        echo json_encode(array('data' => $data));

    }
    
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
    
    function user_login()
    {
        $phone = $this->input->post('phone');
        $res = $this->common_model->getdatabyid(array('phone' => $phone), 'users');
        if($res)
        {
            $mobile_otp = $this->generate_token(4);
            $smsMessage = "Thanks for reaching out to WHYBROKER.IN \n";
            $smsMessage .= $mobile_otp . " Here is your login OTP.\n";
            $smsMessage .= "DO NOT SHARE WITH ANYONE !!\n";
            $smsMessage .= "Regards - YBROKR\n";
                
            $result = sms_code_send($res->phone, $smsMessage);
            $this->common_model->update(array('otp' => $mobile_otp), array('user_id' => $res->user_id), 'users');
            echo json_encode(array('status' => 0, 'user_id' => $res->user_id, 'message' => 'OTP send on mobile'));
        }
        else
        {
            $name = $this->input->post('name');
            $mobile_otp = random_string('numeric', 4);
            $data = array('usertype' => 'Owner', 'name' => $name, 'phone' => $email, 'status' => 0, 'otp' => $mobile_otp, 'email_otp' => '', 'created' => date('Y-m-d H:i:s'));
            $user_id = $this->common_model->insert_data('users', $data);
            
            $smsMessage = "Thanks for reaching out to WHYBROKER.IN \n";
            $smsMessage .= $mobile_otp . " Here is your OTP for registration.\n";
            $smsMessage .= "DO NOT SHARE WITH ANYONE !!\n";
            $smsMessage .= "Regards - YBROKR\n";
            
            $result = sms_register_password($email, $smsMessage);
            if($result)
            {
                $this->session->set_flashdata('success', 'OTP send successfully to your registered mobile, Please check');
                echo json_encode(array('status' => 2, 'user_id' => $res->user_id, 'message' => 'OTP send successfully to your registered mobile, Please check'));
            }
            else
            {
                echo json_encode(array('status' => 2, 'user_id' => $res->user_id, 'message' => 'Failed to send OTP'));
            }
        }
    }
    
    function verify_login_otp()
    {
        $otp = $this->input->post('otp');
        $userid = $this->input->post('userid');
        $user_data = $this->common_model->getdatabyid(array('user_id' => $userid), 'users');
        
        if ($user_data->otp == $otp)
        {
            $session_array = array('user_id' => $user_data->user_id, 'name' => $user_data->name, 'email' => $user_data->email, 'phone' => $user_data->phone, 'requirements_send' => $user_data->requirements_send);
            echo json_encode(array('data' => $session_array, 'status' => 0, 'message' => 'Login success'));
            $this->common_model->update(array('otp' => '', 'mobile_verify' => 1), array('user_id' => $userid), 'users');
        }
        else{echo json_encode(array('status' => 2, 'message' => 'OTP verifification Failed'));}
    }
    
    function user_registration()
    {
        $post = $this->input->POST();
        if(!empty($post))
        {
            $usertype = $post['usertype'];
            $name = $post['name'];
            $email = $post['email'];
            $phone = $post['phone'];
            $password = $post['password'];
            $res = $this->common_model->getdatabyid(array('phone' => $phone),'users');
            if($res){echo json_encode(array('status' => 2, 'message' => 'Your are already registered!'));}
            else
            {
                $mobile_otp = $this->generate_token(4);
                $data = array('usertype'=>$usertype, 'name'=>$name, 'email'=>$email, 'phone'=>$phone,'password'=>md5($password), 'status'=> 0, 'otp' => $mobile_otp, 'email_otp' => '', 'created'=>date('Y-m-d H:i:s'));
                $user_id = $this->common_model->insert_data('users', $data);

                $smsMessage = "Thanks for reaching out to WHYBROKER.IN \n";
                $smsMessage .= $mobile_otp . " Here is your login OTP.\n";
                $smsMessage .= "DO NOT SHARE WITH ANYONE !!\n";
                $smsMessage .= "Regards - YBROKR\n";
                
                $result = sms_code_send($phone, $smsMessage);
                
                if($result)
                {
                    echo json_encode(array('user_id' => $user_id, 'status' => 0, 'message' => 'OTP send successfully to your registered mobile, Please check'));
                }
                else{echo json_encode(array('status' => 3, 'message' => 'Failed to send OTP'));}
            }
        }
        else{echo json_encode(array('status' => 4, 'message' => 'Request Not Accepted'));}
    }
    
    function verify_sms_otp()
    {
        $otp = $this->input->post('otp');
        $userid = $this->input->post('userid');
        $user_data = $this->common_model->getdatabyid(array('user_id' => $userid), 'users');
        if ($user_data->otp == $otp)
        {
            $this->common_model->update(array('otp' => '', 'mobile_verify' => 1), array('user_id' => $userid), 'users');
            echo json_encode(array('status' => 0, 'message' => 'OTP verified successfully!'));
        }
        else{echo json_encode(array('status' => 2, 'message' => 'OTP verifification Failed'));}
    }
    
    function get_login_user()
    {
        $user_id = $this->input->post('user_id');
        $user_data = $this->common_model->getcurrentuser('user_id', $user_id,'users');
        if($user_data){echo json_encode(array('data' => $user_data));}
        else{http_response_code(203); echo json_encode(array('status' => 203, 'message' => 'Please Check Your User Id'));}
        
    }
    
    function add_poperty()
    {
        $image_name = '';
        $video_name = '';
        $post = $this->input->post();
        $post_id = $post['post_id'];
        $random_name = rand(10000,999999);
        if(!empty($_FILES['UploadImages']))
        {
            if (!is_dir('./Uploads/user_post_images/')) {mkdir('./Uploads/user_post_images/', 0777, TRUE);}
            if (!is_dir('./Uploads/user_property_images/'.$post_id.'/')) {mkdir('./Uploads/user_property_images/'.$post_id.'/', 0777, TRUE);}
            $files = $_FILES;
            $mum_files = count($files['UploadImages']['name']);
            for($i=0; $i<$mum_files; $i++)
            {
                $random_name = rand(10000,999999);
                if ( isset($files['UploadImages']['name'][$i]) )
                {
                    $config['file_name'] = $random_name;
                    if($i==0){$config['upload_path'] = './Uploads/user_post_images';}
                    else{$config['upload_path'] = './Uploads/user_property_images/'.$post_id.'/';}
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']      = '0';
                    $config['overwrite']     = FALSE;
                    $this->upload->initialize($config);
                    $_FILES['userfile']['name']= $files['UploadImages']['name']["$i"];
                    $_FILES['userfile']['type']= $files['UploadImages']['type']["$i"];
                    $_FILES['userfile']['tmp_name']= $files['UploadImages']['tmp_name']["$i"];
                    $_FILES['userfile']['error']= $files['UploadImages']['error']["$i"];
                    $_FILES['userfile']['size']= $files['UploadImages']['size']["$i"];    
                    $filename = rand().'-'.$_FILES['userfile']['name'];

                    if ( ! $this->upload->do_upload('userfile')){}
                    else
                    {
                        $info = $this->upload->data();
                        if($i==0){$image_name = "Uploads/user_post_images/".$info['file_name'];}
                        else{$dataInfo[] = './Uploads/user_property_images/'.$post_id.'/'.$info['file_name'];}
                    }
                }
            }
        }
        
        $images =  !empty($dataInfo) ? implode(';', $dataInfo) : '';
        $random_name = rand(10000,999999);
        if($post_id == 0)
        {
            $maxid = $this->common_model->selectmaxid('post_id', array(), 'post_property');
            $post_id = $maxid+1;
            $dataInfo = array();
            $nozero = 7 - strlen($maxid);
            $zeros = '';
            for($j=0;$j<$nozero;$j++){$zeros .= '0';}
            if ($post['admin_id'] == 0) {
                $user_id = $post['user_id'];
                $user_type = 'Owner';
            }
            else {
                $user_id = $post['admin_id'];
                $user_type = 'Super Admin';
            }
            
            $lead_id = "PRT".$zeros.$post_id;
            $data = array('user_id'=>$user_id,
                          'user_type'=>$user_type,
                          'lead_id'=>$lead_id,
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
                          'amount'=>$post['amount'],
                          'per_unit'=>$post['per_unit'],
                          'created'=>date('Y-m-d'),
                         );
            $res = $this->common_model->insert_data('property_type', $data);
            
            $residential = $post['residential'];
            if($residential == 'DuplexFlat') {
                //Duplex Flat
                $data = array('post_id'=>$post_id,
                              'room'=>$post['room'],
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
                              'totalfloor'=>$post['totalfloor'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->common_model->insert_data('duplex_flat_details', $data);
            }elseif($residential == 'PentHouse'){
            //Pent House
            $data = array('post_id'=>$post_id,
                          'pent_room'=>$post['pent_room'],
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
                          'total_floor'=>$post['total_floor'],
                          'created'=>date('Y-m-d'),
                         );
            $res = $this->common_model->insert_data('pent_house_details', $data);
            }elseif($residential == 'Factory'){
            //Factory Rent
            $data = array('post_id'=>$post_id,
                          'factory_numberofcabin'=>$post['factory_numberofcabin'],
                          'factory_super_buildup_area'=>$post['factory_super_buildup_area'],
                          'factory_carpet_area'=>$post['factory_carpet_area'],
                          'factory_super_buildup_area_unit'=>$post['factory_super_buildup_area_unit'],
                          'factory_carpet_unit'=>$post['factory_carpet_unit'],
                          'factory_floor'=>$post['factory_floor'],
                          'factory_pentry'=>$post['factory_pentry'],
                          'factory_roadWide'=>$post['factory_roadWide'],
                          'factory_pentry_usedFor'=>$post['factory_pentry_usedFor'],
                          'factory_roadWide_unit'=>$post['factory_roof'],
                          'factory_ManufacturingType'=>$post['factory_ManufacturingType'],
                          'factory_NumberofWorkStation'=>$post['factory_NumberofWorkStation'],
                          'factory_BuildupArea'=>$post['factory_BuildupArea'],
                          'factory_OpenArea'=>$post['factory_OpenArea'],
                          'factory_BuildupAreaUnit'=>$post['factory_BuildupAreaUnit'],
                          'factory_OpenAreaUnit'=>$post['factory_OpenAreaUnit'],
                          'factory_TotalFloor'=>$post['factory_TotalFloor'],
                          'factory_Bathroom'=>$post['factory_Bathroom'],
                          'factory_ElectricPower'=>$post['factory_ElectricPower'],
                          'factory_Bathroom_UsedFor'=>$post['factory_Bathroom_UsedFor'],
                          'factory_HeavyVehicleParkingUpto'=>$post['factory_HeavyVehicleParkingUpto'],
                          'created'=>date('Y-m-d'),
                         );
            $res = $this->common_model->insert_data('factory_details', $data);
            }elseif($residential == 'Flat'){
            //Flat Rent
            $data = array('post_id'=>$post_id,'flat_Room'=>$post['flat_Room'],
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
                          'flat_HeavyVehicleParkingUpto'=>$post['flat_HeavyVehicleParkingUpto'],
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
                            'section'=>$post['section'],
                          'AgeofPropeety'=>$post['AgeofPropeety'],
                          'PossessionDate'=>date('Y-m-d',strtotime($post['PossessionDate'])),
                          'PropertyType'=>$post['PropertyType'],
                          'OpenParking'=>$post['OpenParking'],
                          'CoveredParking'=>$post['CoveredParking'],
                          'Basement'=>$post['Basement'],
                          'LiftParking'=>$post['LiftParking'],
                          'TwoWheeler'=>$post['TwoWheeler'],
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
            if($res){
                $this->session->set_flashdata('success', 'Saved!');
            }else{
                $this->session->set_flashdata('error', 'Failed!');
            }
        }
        else
        {
            $update_data = array(
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
                          'factory_roadWide_unit'=>$post['factory_roof'],
                          'factory_ManufacturingType'=>$post['factory_ManufacturingType'],
                          'factory_NumberofWorkStation'=>$post['factory_NumberofWorkStation'],
                          'factory_BuildupArea'=>$post['factory_BuildupArea'],
                          'factory_OpenArea'=>$post['factory_OpenArea'],
                          'factory_BuildupAreaUnit'=>$post['factory_BuildupAreaUnit'],
                          'factory_OpenAreaUnit'=>$post['factory_OpenAreaUnit'],
                          'factory_TotalFloor'=>$post['factory_TotalFloor'],
                          'factory_Bathroom'=>$post['factory_Bathroom'],
                          'factory_ElectricPower'=>$post['factory_ElectricPower'],
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

    public function add_property_to_favorite()
    {
        $post_id = $this->input->post('post_id');
        $user_id = $this->input->post('user_id');
        $project = $this->common_model->getdatabyid(array('post_id' => $post_id), 'post_property');
        if($project)
        {
            $favourite_by = $project->favourite_by;
            $favourite_by_array = !empty($favourite_by) ? explode(',', $favourite_by) : array();
            if(!in_array($user_id, $favourite_by_array))
            {
                $new_array = array_merge($favourite_by_array, array($user_id));
                $new_favourite_by = !empty($new_array) ? implode(',', $new_array) : $new_array;
                $result = $this->common_model->update(array('favourite_by' => implode(',',$new_array)), array('post_id'=>$post_id), 'post_property');
                echo json_encode(array('status' => 0, 'message' => 'Added to favourite!'));
            }
            else
            {
                echo json_encode(array('status' => 2, 'message' => 'Already in favorite list!'));
            }
        }
        else
        {
            echo json_encode(array('status' => 3, 'message' => 'No Data found'));
        }
    }
    
    public function delete_my_favourite_property()
    {
        $post_id = $this->input->post('post_id');
        $user_id = $this->input->post('user_id');
        
        $project = $this->common_model->getdatabyid(array('post_id'=>$post_id),'post_property');
        if($project)
        {
            $favourite_by = $project->favourite_by;
            $favourite_by_array = !empty($favourite_by) ? explode(',', $favourite_by) : array();
            if(in_array($user_id, $favourite_by_array)){
                $newArr = array();
                foreach($favourite_by_array as $fv){
                    if($fv!=$user_id){
                        $newArr[] = $fv;
                    }
                }
                $new_favourite_by = !empty($newArr) ? implode(',', $newArr) : $newArr;
                $result = $this->common_model->update(array('favourite_by'=>implode(',',$newArr)), array('post_id'=>$post_id), 'post_property');
                echo json_encode(array('status' => 0, 'message' => 'Removed from favourite!'));
            }   
        }
        else{echo json_encode(array('status' => 2, 'message' => 'No Data found'));}
    }
    
    function see_details($type = 'project', $post_id)
    {
        $data['type'] = $type;
        $data['post_id'] = $post_id;
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
        $data['list_reviews'] = $this->common_model->getdata(array('post_id'=>$post_id, 'property_type'=>'property'),'post_review_rating');
        $data['count_rate_1'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>1),'post_review_rating');
        $data['count_rate_2'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>2),'post_review_rating');
        $data['count_rate_3'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>3),'post_review_rating');
        $data['count_rate_4'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>4),'post_review_rating');
        $data['count_rate_5'] = $this->common_model->selectrowdata(array('COUNT(id) AS count'), array('property_type'=>'property','post_id'=>$post_id, 'rate'=>5),'post_review_rating');
        $rates = 0;
        $data['avg_rate'] = 0;
        if(!empty($data['list_reviews'])){
            foreach($data['list_reviews'] as $i=>$row){
                $rates += $row->rate;
                if($row->user_type == 'Owner' || $row->user_type == 'Builder' || $row->user_type == 'Agent'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>$row->user_id),'users');
                    $data['list_reviews'][$i]->name = @$user->name;;
                    $data['list_reviews'][$i]->profile = @$user->profile;
                }elseif($row->user_type == 'Super Admin' || $row->user_type == 'Admin'){
                    $user = $this->common_model->getdatabyid(array('user_id'=>1),'admin_users');
                    $data['list_reviews'][$i]->name = @$user->name;;
                    $data['list_reviews'][$i]->profile = '';
                }
            }
            $data['avg_rate'] = $rates/count($data['list_reviews']);
        }
        http_response_code(200); echo json_encode(array('status' => 0, 'data' => $data));
        
    }
    
    function faq()
    {
        $data = $this->common_model->getdata(array('is_deleted' => 0),'faq');
        if($data){http_response_code(200); echo json_encode(array('status' => 0, 'data' => $data));}
        else{http_response_code(203); echo json_encode(array('status' => 2, 'message' => 'No Data Found'));}
    }
    
    function get_details_on_whatsapp($id, $user)
    {
        $user_data = $this->common_model->getdatabyid(array('user_id' => $user), 'users');
        if($user_data->leads_pending > 0)
        {
            $property = $this->common_model->getdatabyid(array('post_id' => $id),'post_property');
            $link = 'https://whybroker.in/home/see_details/property/' . $property->post_id;
            $message = "Thanks for reaching out to WHYBROKER.IN \n";
            $message .= "Owner Name: ".$property->name."\n";
            $message .= "Mobile: ".$property->mobile."\n";
            $message .= "Email: ".$property->email."\n";
            $message .= "City: ".$property->city."\n";
            $message .= "Property Link: ".$link."\n";
            whatsapp_sms('8626080622', $message);
            $this->common_model->update(array('leads_pending' => $user_data->leads_pending - 1), array('user_id' => $user), 'users');
            $data = array('post_id' => $id, 'user_id' => $user, 'created' => date('Y-m-d H:i:s'));
            $user_id = $this->common_model->insert_data('whatsapp_request', $data);
            echo json_encode(array('status' => 0, 'success' => 'Details shared on whatsapp!'));
        }
        else
        {
            echo json_encode(array('status' => 2, 'error' => 'Your limit is end please upgrade your plan!'));
        }
    }
    
    function subscription($user_id)
    {
        $data['user_details'] = $this->common_model->getdatabyid(array('user_id' => $user_id), 'users');
        $data['list_subscriptions'] = $this->common_model->getdata(array('status' => 1, 'is_deleted' => 0, 'user_type' => 'Owner'), 'subscriptions');
        if ($data) {
            echo json_encode(array('status' => 0, 'data' => $data));
        }
        else {
            echo json_encode(array('status' => 2, 'message' => 'No Data Found'));
        }
    
    }
    
    function find_property($type = '')
    {
        if($post = $this->input->post()){
            $data['post'] = $post;
            // search_type ==> Rent = 1, sale = 2, PG = 3
            // city ==> Name;
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
        
        echo json_encode(array('status' => 0, 'data' => $data));
    }

    function delete_userby_no($phone)
    {
        $user = $this->db->query('DELETE FROM users WHERE phone=' . $phone);
        if($user)
        {
            echo json_encode(array('status' => 0, 'message' => 'Removed!'));
        }
        else{echo json_encode(array('status' => 2, 'message' => 'No Data found'));}
    }
    
    public function property_management_request() {
        $post = $this->input->post();
        if ($post)
        {
            $name = $post['name'];
            $phone = $post['phone'];
            $email = $post['email'];
            $config = $post['config'];
            $rent = $post['rent'];
            $comment = $post['comment'];
            $terms_check = $post['terms_check'];
            
            $result = $this->common_model->insert_data('pms', array('name' => $name, 'phone' => $phone, 'email'=> $email, 'config' => $config, 'rent' => $rent, 'comment' => $comment, 'terms' => $terms_check, 'created_at' => date('Y-m-d H:i:s')));
            if ($result) {
                echo json_encode(array('status' => 0, 'message' => 'Data inserted'));
            } 
            else {
                echo json_encode(array('status' => 2, 'message' => 'Failed'));
            }
        }
        else
        {
             echo json_encode(array('status' => 3, 'message' => 'Request Not Allowed'));
        }
    }
    
    public function add_ratings() {
        $post = $this->input->post();
        if ($post && !empty($post['user_id'])) {
            $insert_data = array('user_id' => $post['user_id'], 'user_type' => 'Owner', 'property_type' => 'property', 'post_id' => $post['post_id'], 'review_title' => $post['review_title'], 'review_msg' => $post['review_msg'], 
            'rate' => $post['rate'], 'created' => date('Y-m-d H:i:s'));
            $res = $this->common_model->insert_data('post_review_rating',$insert_data);
            if ($res) {
                echo json_encode(array('status' => 0, 'message' => 'Data inserted'));
            } 
            else {
                echo json_encode(array('status' => 2, 'message' => 'Failed'));
            }
        }
        else
        {
             echo json_encode(array('status' => 3, 'message' => 'Request Not Allowed'));
        }
    }
    
    function update_user_profile() {
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
            $this->load->library('upload');
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
        
        $update_data = array('name' => @$post['name'], 
                             'email' => @$post['email'],
                             'address'=> @$post['address'],
                             'pincode'=> @$post['pincode'],
                             'area'=> @$post['area'],
                             'landmark'=> @$post['landmark'],
                             'country'=> @$post['country'],
                             'state'=> @$post['state'],
                             'city'=> @$post['city'],
                             'about_us'=> @$post['about_us'],
                             'profile'=>$file_name,
                            );
        $result = $this->common_model->update($update_data, array('user_id'=> $post['user_id']), 'users');

        if($result){
            $this->session->set_flashdata('success', 'Saved!');
            echo json_encode(array('status' => 0, 'message' => 'Saved'));
        }else{
            $this->session->set_flashdata('error', 'Failed!');
            echo json_encode(array('status' => 2, 'message' => 'Failed'));
        }

    }
    
    function add_user_requirements() {
        $post = $this->input->post();
        $insert_data = array('user_id'=> $post['user_id'],
                            'rent_sale' => @$post['rent_sale'], 
                             'type' => @$post['type'],
                             'cities'=> $post['cities'],
                             'created_at'=> date('Y-m-d H:i:s')
                            );
        $res = $this->common_model->insert_data('submit_user_requirements',$insert_data);
        if ($res) {
            // $result = $this->common_model->update(array('requirements_send' => 1), array('user_id'=> $post['user_id']), 'users');
            echo json_encode(array('status' => 0, 'message' => 'Data inserted'));
        } 
        else {
            echo json_encode(array('status' => 2, 'message' => 'Failed'));
        }

    }
}
?>