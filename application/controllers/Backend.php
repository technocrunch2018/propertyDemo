<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
date_default_timezone_set('Asia/Kolkata');
class Backend extends BaseController {

	function __construct()
    {
        parent::__construct();
        $this->isAdminLoggedIn();
        $this->load->model('Common_model');
        $this->load->helper('form');
    }

    function index()
    {
        // pre($this->session->flashdata());
    	$data = $this->commonpage_data();
    	$search_value = !empty($this->input->post('search_value')) ? $this->input->post('search_value') : '';
    	$data['dashboard'] = $this->dashboard_data();
    	if($search_value != '' && $search_value != NULL){
    	    $data['result'] = $this->search_user_details_by_email_contact($search_value);
    	}
    // 	pre($this->session->userdata());
    	$data['search_value'] = $search_value;
    // 	pre($data['dashboard']);
    	$this->BackendView('admin/dashboard', $data);
    }
    
    function dashboard_data(){
        /*$new_lead_count = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $new_buyer = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0), 'post_requirement', 'post_id'); 
        $new_seller = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0), 'post_property', 'post_id'); 
        $new_on_process = $this->Common_model->count_rows(array('status'=> 'In Process'), 'property_interested_details', 'id'); 
        $pending_payments = $this->Common_model->count_rows(array('status'=> 'Payment Pending'), 'property_interested_details', 'id'); 
        $new_lead_partners = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0), 'lead_partners', 'user_id');
        $new_user = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0, 'usertype'=>'Owner'), 'users', 'user_id');
        $new_agent = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0, 'usertype'=>'Agent'), 'users', 'user_id');
        $new_builder = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0, 'usertype'=>'Builder'), 'users', 'user_id');
        $new_society = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0), 'society', 'id');
        $new_location = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0), 'location', 'id');
        // pre($new_buyer);
        return array('new_lead_count'=>$new_lead_count, 'new_buyer'=>$new_buyer, 'new_seller'=>$new_seller, 'new_on_process'=>$new_on_process, 
                     'pending_payments'=>$pending_payments, 'new_lead_partners'=>$new_lead_partners, 'new_user'=>$new_user, 'new_agent'=>$new_agent, 
                     'new_builder'=>$new_builder, 'new_society'=>$new_society, 'new_location'=>$new_location);*/
                     
        /*$total_users = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'users', 'user_id');
        $total_lead_partners = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $partners_lead = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $residential_rental_leads = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $commercial_rental_leads = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $residential_buyer_leads = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $commercial_buyer_leads = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $residential_rental_owner = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $commercial_rental_owner = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $residential_buyer_owner = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $commercial_buyer_owner = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        $sold_out = $this->Common_model->count_rows(array('status'=> 'Closed', 'rent_sell' => 'Sell'), 'property_interested_details', 'id'); 
        $rent_out = $this->Common_model->count_rows(array('status'=> 'Closed', 'rent_sell' => 'Rent'), 'property_interested_details', 'id'); 
        $agent = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0, 'usertype'=>'Agent'), 'users', 'user_id'); 
        $builder = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0, 'usertype'=>'Builder'), 'users', 'user_id'); 
        $projects = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'post_project', 'post_id'); 
        $current_viewers = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id'); 
        return array('total_users'=>$total_users, 'total_lead_partners'=>$total_lead_partners, 'partners_lead'=>$partners_lead, 'residential_rental_leads'=>$residential_rental_leads, 
                     'commercial_rental_leads'=>$commercial_rental_leads, 'residential_buyer_leads'=>$residential_buyer_leads, 'commercial_buyer_leads'=>$commercial_buyer_leads, 'residential_rental_owner'=>$residential_rental_owner, 
                     'commercial_rental_owner'=>$commercial_rental_owner, 'residential_buyer_owner'=>$residential_buyer_owner, 'commercial_buyer_owner'=>$commercial_buyer_owner,'sold_out'=>$sold_out,'rent_out'=>$rent_out,'agent'=>$agent
                     ,'builder'=>$builder,'projects'=>$projects,'current_viewers'=>$current_viewers);*/
        $new_owner = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0, 'usertype'=>'Owner'), 'users', 'user_id');
        $new_agent = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0, 'usertype'=>'Agent'), 'users', 'user_id');
        $new_builder = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0, 'usertype'=>'Builder'), 'users', 'user_id');
        $new_lead_partner = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0), 'lead_partners', 'user_id');
        $new_buyer_lead = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0, 'user_type'=>'lead_partner'), 'post_requirement', 'post_id');
        $new_seller_lead = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0, 'user_type'=>'lead_partner'), 'post_property', 'post_id');
        $new_home_loan_lead = $this->Common_model->count_rows(array('status'=> 0, 'is_deleted' => 0, 'user_type'=>'lead_partner'), 'home_loan', 'id');
        $new_buyer = $this->Common_model->count_rows("'status' = 0 AND 'is_deleted' = 0 AND ('user_type' = 'Owner' OR 'user_type' = 'Agent' OR 'user_type' = 'Builder')", 'post_requirement', 'post_id');
        $new_seller = $this->Common_model->count_rows("'status' = 0 AND 'is_deleted' = 0 AND ('user_type' = 'Owner' OR 'user_type' = 'Agent' OR 'user_type' = 'Builder')", 'post_property', 'post_id');
        $new_society = $this->Common_model->count_rows(array('status' => 0, 'is_deleted'=>0), 'society', 'id');
        $new_location = $this->Common_model->count_rows(array('status' => 0, 'is_deleted'=>0), 'location', 'id');
        $new_in_process = $this->Common_model->count_rows(array('status' => 'In Process'), 'property_interested_details', 'id');
        $new_pending_payment = $this->Common_model->count_rows(array('status' => 'Payment Pending'), 'property_interested_details', 'id');
        $new_builder_project = $this->Common_model->count_rows(array('is_deleted'=>0, 'status' => 0, 'user_type'=>'Builder'), 'post_project', 'post_id');
        $new_owner_property = $this->Common_model->count_rows("'status' = 0 AND 'is_deleted' = 0 AND 'user_type' = 'Owner'", 'post_property', 'post_id');
        $new_agent_property = $this->Common_model->count_rows("'status' = 0 AND 'is_deleted' = 0 AND 'user_type' = 'Agent'", 'post_property', 'post_id');
        $new_pending_requirement = $this->Common_model->count_rows("'status' = 1 AND 'in_process_flag' = 0 AND 'is_deleted' = 0", 'post_requirement', 'post_id');
        $this_month_start_date = date('Y-m-01');
        $this_month_end_date = date('Y-m-t');
        $rental_refresh_count = $this->Common_model->count_rows("`rent_sell` LIKE 'Rent' AND status = 'Closed' AND (expiry_date BETWEEN '$this_month_start_date' AND '$this_month_end_date')", 'property_interested_details', 'id');
        // pre($this->db->last_query());
        
        $total_users = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'users', 'user_id');
        $total_lead_partners = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0), 'lead_partners', 'user_id');
        $total_users = $total_users + $total_lead_partners;
        $total_owner = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0, 'usertype'=>'Owner'), 'users', 'user_id');
        $total_agent = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0, 'usertype'=>'Agent'), 'users', 'user_id');
        $total_builder = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0, 'usertype'=>'Builder'), 'users', 'user_id');
        $total_buyer_lead = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0, 'user_type'=>'lead_partner'), 'post_requirement', 'post_id');
        $total_seller_lead = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0, 'user_type'=>'lead_partner'), 'post_property', 'post_id');
        $total_home_loan_lead = $this->Common_model->count_rows(array('status'=> 1, 'is_deleted' => 0, 'user_type'=>'lead_partner'), 'home_loan', 'id');
        $total_buyer = $this->Common_model->count_rows("'status' = 1 AND 'is_deleted' = 0 AND ('user_type' = 'Owner' OR 'user_type' = 'Agent' OR 'user_type' = 'Builder')", 'post_requirement', 'post_id');
        $total_seller = $this->Common_model->count_rows("'status' = 1 AND 'is_deleted' = 0 AND ('user_type' = 'Owner' OR 'user_type' = 'Agent' OR 'user_type' = 'Builder')", 'post_property', 'post_id');
        $total_sold_out = $this->Common_model->count_rows(array('status'=> 'Closed', 'rent_sell' => 'Sell'), 'property_interested_details', 'id'); 
        $total_rent_out = $this->Common_model->count_rows(array('status'=> 'Closed', 'rent_sell' => 'Rent'), 'property_interested_details', 'id'); 
        $total_pending_requirement = $this->Common_model->count_rows("'status' = 1 AND 'in_process_flag' = 0 AND 'is_deleted' = 0", 'post_requirement', 'post_id');
        $total_in_process = $this->Common_model->count_rows(array('status' => 'In Process'), 'property_interested_details', 'id');
        $total_closed = $this->Common_model->count_rows(array('status' => 'Closed'), 'property_interested_details', 'id');
        //$total_live_viewers = $this->Common_model->count_rows(array('status' => 'Closed'), 'property_interested_details', 'id');
        
        $enquiry_emails = $this->Common_model->selectdistinctdataarray('user_email', array(), 'property_enquiries');
        $users_emails = $this->Common_model->selectdistinctdataarray('email', array('status' => 1, 'is_deleted'=>0), 'users');
        $lead_partners_emails = $this->Common_model->selectdistinctdataarray('email', array('status' => 1, 'is_deleted'=>0), 'lead_partners');
        $home_loan_emails = $this->Common_model->selectdistinctdataarray('email', array('status' => 1, 'is_deleted'=>0), 'home_loan');
        $get_in_touch_emails = $this->Common_model->selectdistinctdataarray('email', array(), 'get_in_touch');
        $property_enquiries_emails = $this->Common_model->selectdistinctdataarray('user_email', array(), 'property_enquiries');
        $enquiry_emails = array_column($enquiry_emails, 'user_email');
        $total_live_viewers = array_merge($enquiry_emails, array_column($users_emails, 'email'), array_column($lead_partners_emails, 'email'), array_column($home_loan_emails, 'email'), array_column($get_in_touch_emails, 'email'), array_column($property_enquiries_emails, 'user_email'));
        $total_live_viewers = array_unique($total_live_viewers);
        // pre(array_filter($total_live_viewers));
        
        return array('new_owner'=>$new_owner, 'new_agent'=>$new_agent,'new_builder'=>$new_builder,'new_lead_partner'=>$new_lead_partner, 'new_buyer_lead'=>$new_buyer_lead, 'new_seller_lead'=>$new_seller_lead, 'new_home_loan_lead'=>$new_home_loan_lead,
        'new_buyer'=>$new_buyer, 'new_seller'=>$new_seller, 'new_society'=>$new_society, 'new_location'=>$new_location, 'new_in_process'=>$new_in_process, 'new_pending_payment'=>$new_pending_payment, 'new_builder_project'=>$new_builder_project,
        'new_owner_property'=>$new_owner_property, 'new_agent_property'=>$new_agent_property, 'new_pending_requirement'=>$new_pending_requirement,'rental_refresh_count'=>$rental_refresh_count, 'total_users'=>$total_users, 'total_lead_partners'=>$total_lead_partners, 'total_owner'=>$total_owner,
        'total_agent'=>$total_agent, 'total_builder'=>$total_builder, 'total_buyer_lead'=>$total_buyer_lead, 'total_seller_lead'=>$total_seller_lead, 'total_home_loan_lead'=>$total_home_loan_lead, 'total_buyer'=>$total_buyer, 'total_seller'=>$total_seller,
        'total_sold_out'=>$total_sold_out, 'total_rent_out'=>$total_rent_out,'total_pending_requirement'=>$total_pending_requirement, 'total_in_process'=>$total_in_process,'total_closed'=>$total_closed,'total_live_viewers'=>count($total_live_viewers) );
    }


    function manage_admin()
    {
        $data = $this->commonpage_data();
        $data['admin'] = $this->Common_model->getdata(array('user_id !='=> "1", 'is_deleted' => 0), 'admin_users'); 
        // pre($data['admin']);
        $this->BackendView('admin/manage_admin', $data);
    }
    
    function manage_ex_admin()
    {
        $data = $this->commonpage_data();
        $data['admin'] = $this->Common_model->getdata(array('user_id !='=> "1", 'resignation_date!=' => "", 'is_deleted' => 0), 'admin_users'); 
        // pre($data['admin']);
        $this->BackendView('admin/ex_admin', $data);
    }
    
    function save_admin()
    {
        $this->load->library('upload');
        $form_data = $this->input->post(array('name', 'desognation', 'department', 'weeky_off', 'mobile', 'official_mobile', 'email', 'official_email', 'address', 'password', 'bank_name', 'sallery', 'bank_branch', 'targer', 'account_no', 'pf',
        'ifsc', 'insurance', 'aadhar_no', 'ta', 'pan', 'after_target_percentage', 'join_date', 'resignation_date', 'gender', 'status', 'esi', 'p_tax', 'profile', 'cv'));
        
        $admin_data = $this->Common_model->getdata(array('email'=> $form_data['email'], 'mobile' => $form_data['mobile']), 'admin_users');
        if(empty($admin_data))
        {
            $ext = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
            $filename_without_extension = explode('.'.$ext,$_FILES['profile']['name']);
            $filename1 = str_replace(' ','_',$filename_without_extension[0]);
            $final_filename = str_replace('.','_',$filename1);
            $filename = $final_filename.'.'.$ext;
            $config['upload_path'] = './Uploads/user_profile/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $filename;
            $this->upload->initialize($config);
            if(!empty($this->upload->do_upload('profile'))){$profile = 'Uploads/user_profile/' . $filename;}
            else{$profile = "";}
            
            $ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
            $filename_without_extension = explode('.'.$ext,$_FILES['cv']['name']);
            $filename1 = str_replace(' ','_',$filename_without_extension[0]);
            $final_filename = str_replace('.','_',$filename1);
            $filename = $final_filename.'.'.$ext;
            $config['upload_path'] = './Uploads/cv/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $filename;
            $this->upload->initialize($config);
            if(!empty($this->upload->do_upload('cv'))){$cv = 'Uploads/cv/' . $filename;}
            else{$cv = "";}
            
            $insert_data = array(
                'user_type' => 'admin','name' => $form_data['name'], 'desognation' => $form_data['desognation'], 'official_mobile' => $form_data['official_mobile'], 'email' => $form_data['email'], 'official_email' => $form_data['official_email'], 'password' => $form_data['password'], 'mobile' => $form_data['mobile'],
                'address' => $form_data['address'], 'bank_name' =>$form_data['bank_name'], 'sallery' =>$form_data['sallery'], 'bank_branch' =>$form_data['bank_branch'],
                'target' => $form_data['targer'], 'account_no' => $form_data['account_no'], 'pf' => $form_data['pf'], 'ifsc' => $form_data['ifsc'], 'insurance' => $form_data['insurance'],
                'adhar_no' => $form_data['aadhar_no'], 'ta' => $form_data['ta'], 'pan' => $form_data['pan'], 'after_target_payment' => $form_data['after_target_percentage'], 
                'join_date' => $form_data['join_date'], 'esi' => $form_data['esi'], 'p_tax'  => $form_data['p_tax'], 'profile' => $profile, 'cv' => $cv, 
                'department' => $form_data['department'], 'weekly_offs' => $form_data['weeky_off'],
                'resignation_date' => $form_data['resignation_date'], 'gender' => $form_data['gender'], 'status' => $form_data['status'], 'created_at' => date('Y-m-d'));
    
            $result = $this->Common_model->insert_data('admin_users',$insert_data);  
            if($result){$this->session->set_flashdata('success', 'Data Saved Successfully!');}
            else{$this->session->set_flashdata('error', 'Data Not Saved!');}
        }
        else{$this->session->set_flashdata('error', 'Data Already Present!');}
        redirect('backend/manage_admin');
    }
    
    function edit_admins($id)
    {
        $data = $this->commonpage_data();
        $data['admin'] = $this->Common_model->getdata(array('user_id'=> $id), 'admin_users');
        $this->BackendView('admin/edit_admins', $data);
    }
    
    function view_admin($id)
    {
        $data = $this->commonpage_data();
        $data['admin'] = $this->Common_model->getdata(array('user_id'=> $id), 'admin_users');
        $this->BackendView('admin/view_admins', $data);
    }
    
    function update_admin()
    {
        $this->load->library('upload');
        $form_data = $this->input->post(array('name', 'id', 'desognation', 'department', 'weeky_off', 'mobile', 'official_mobile', 'email', 'official_email', 'address', 'password', 'bank_name', 'sallery', 'bank_branch', 'targer', 'account_no', 'pf',
        'ifsc', 'insurance', 'aadhar_no', 'ta', 'pan', 'after_target_percentage', 'join_date', 'resignation_date', 'gender', 'status', 'esi', 'p_tax'));
        
        $ext = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
        $filename_without_extension = explode('.'.$ext,$_FILES['profile']['name']);
        $filename1 = str_replace(' ','_',$filename_without_extension[0]);
        $final_filename = str_replace('.','_',$filename1);
        $filename = $final_filename.'.'.$ext;
        $config['upload_path'] = './Uploads/user_profile/';
        $config['allowed_types'] = '*';
        $config['file_name'] = $filename;
        $this->upload->initialize($config);
        if(!empty($this->upload->do_upload('profile'))){$profile = 'Uploads/user_profile/' . $filename;
            $this->Common_model->update(array('profile' => $profile), array('user_id'=>$form_data['id']), 'admin_users');  
        }
        
        $ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
        $filename_without_extension = explode('.'.$ext,$_FILES['cv']['name']);
        $filename1 = str_replace(' ','_',$filename_without_extension[0]);
        $final_filename = str_replace('.','_',$filename1);
        $filename = $final_filename.'.'.$ext;
        $config['upload_path'] = './Uploads/cv/';
        $config['allowed_types'] = '*';
        $config['file_name'] = $filename;
        $this->upload->initialize($config);
        if(!empty($this->upload->do_upload('cv'))){$cv = 'Uploads/cv/' . $filename;
            $this->Common_model->update(array('cv' => $cv), array('user_id'=>$form_data['id']), 'admin_users');  
        }
        
        $insert_data = array(
            'name' => $form_data['name'], 'desognation' => $form_data['desognation'], 'department' => $form_data['department'], 'weekly_offs' => $form_data['weeky_off'], 'official_mobile' => $form_data['official_mobile'], 'email' => $form_data['email'], 'official_email' => $form_data['official_email'], 'password' => $form_data['password'], 'mobile' => $form_data['mobile'],
            'address' => $form_data['address'], 'bank_name' =>$form_data['bank_name'], 'sallery' =>$form_data['sallery'], 'bank_branch' =>$form_data['bank_branch'],
            'target' => $form_data['targer'], 'account_no' => $form_data['account_no'], 'pf' => $form_data['pf'], 'ifsc' => $form_data['ifsc'], 'insurance' => $form_data['insurance'],
            'adhar_no' => $form_data['aadhar_no'], 'ta' => $form_data['ta'], 'pan' => $form_data['pan'], 'after_target_payment' => $form_data['after_target_percentage'], 
            'join_date' => $form_data['join_date'], 'resignation_date' => $form_data['resignation_date'], 'gender' => $form_data['gender'], 'esi' => $form_data['esi'], 'p_tax'  => $form_data['p_tax'], 'status' => $form_data['status'], 'modified_at' => date('Y-m-d'));
        
        $result = $this->Common_model->update($insert_data, array('user_id'=>$form_data['id']), 'admin_users');  
        if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Updated!');}
        redirect('backend/manage_admin');
    }
    
    function delete_admin($id)
    {
        $result = $this->Common_model->update(array('is_deleted' => 1), array('user_id'=>$id), 'admin_users');  
        if($result){$this->session->set_flashdata('success', 'Data Deleted Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Deleted!');}
        redirect($_SERVER['HTTP_REFERER']);
    }

    function manage_admin_perfomance()
    {
        $data = $this->commonpage_data();
        $data['performance'] = $this->Common_model->get_admin_performance();
        $data['users'] = $this->Common_model->getdata(array('is_deleted' => 0), 'admin_users');
        if(!empty($this->input->post('pdate'))){
            $year = date('Y', strtotime($this->input->post('pdate')));
            $month = date('m', strtotime($this->input->post('pdate')));
        }else{
            $year = date('Y');
            $month = date('m');
        }
        $data['month'] = $month;
        $data['year'] = $year;
        foreach($data['users'] as $i=>$user){
            $admin_id = $user->user_id;
            $performance = $this->Common_model->getadminperformancebyidmonthyear($admin_id, $month, $year);
            // print_r($this->db->last_query());
            // print_r($performance);
            $achieved_amount = 0;
            $target = !empty($user->target) ? $user->target : 0;
            if(!empty($performance)){
                foreach($performance as $row){
                    if($row->executive == $admin_id){
                        $achieved_amount+=$row->executive_commission;
                    }
                    if($row->caller == $admin_id){
                        $achieved_amount+=$row->caller_commision;
                    }
                }
            }
            $data['users'][$i]->achieved_amount = $achieved_amount;
            $data['users'][$i]->remaining_amount = $target - $achieved_amount;
        }
        // pre($data);
        
        if(!empty($this->input->post('admin_id'))){
            $admin_id = $this->input->post('admin_id');
            $data['admin_id'] = $admin_id;
            $home_loans = $this->Common_model->count(array('user_id' => $admin_id,'user_type' => "Admin",'is_deleted' => 0), 'home_loan', 'id');
            $clients = $this->Common_model->count(array('user_id' => $admin_id,'user_type' => "admin",'is_deleted' => 0), 'post_requirement', 'post_id');
            $ads = $this->Common_model->count(array('user_id' => $admin_id,'user_type' => "admin",'ad_flag' => 1,'is_deleted' => 0), 'post_project', 'post_id');
            $data['info'] = array($clients->count,0,0,$home_loans->count,$ads->count);    
        }else{
            $data['admin_id'] = 0;
            $data['info'] = array(0,0,0,0,0);
        }
        $this->BackendView('admin/perfomance', $data);
    }
    
    function get_performance_by_admin_id(){
        $post = $this->input->post();
        $admin_id = $post['admin_id'];
    }
    
    function  manage_admin_attendance()
    {
        $data = $this->commonpage_data();
        if(!empty($this->input->post('adate'))){
            $year = date('Y', strtotime($this->input->post('adate')));
            $month = date('m', strtotime($this->input->post('adate')));
        }else{
            $year = date('Y');
            $month = date('m');
        }
        $data['month'] = $month;
        $data['year'] = $year;
        $data['admin_list'] = $this->Common_model->getAdminAttendance($month, $year); 
        // pre($this->db->last_query());
        // pre($data['admin_list']);
        $this->BackendView('admin/manage_admin_attendance', $data);
    }
    
    function add_attendance(){
        $data = $this->commonpage_data();
        $data['admin_list'] = $this->Common_model->getdata(array('is_deleted' => 0), 'admin_users'); 
        $post = $this->input->post();
        if(!empty($post['admin_id'])){ 
            $data['admin_id'] = $post['admin_id'];
            $data['admin_data'] = $this->Common_model->getdatabyid(array('user_id' => $post['admin_id']), 'admin_users');  
        }else{ 
            $data['admin_id'] = 0; 
        }
        $this->BackendView('admin/add_admin_attendance', $data);
    }
    
    /*function  manage_admin_salary()
    {
        $data = $this->commonpage_data();
        $post = $this->input->post();
        $data['admin_list'] = $this->Common_model->getdata(array('is_deleted' => 0), 'admin_users');
        if(!empty($post['sdate'])){ 
            $year = date('Y', strtotime($post['sdate']));
            $month = date('m', strtotime($post['sdate']));
        }else{
            $year = date('Y');
            $month = date('m');
        } 
        $data['month'] = $month;
        $data['year'] = $year;
        // echo $year;
        // echo $month; 
        // echo date('Y-01-01', strtotime($year)); exit;
        foreach($data['admin_list'] as $i=>$admin){
            $per_day_salary = $admin->sallery/365;
            $start = date('Y-01-01', strtotime($year));
            $end = date('Y-m-t', strtotime("$year-$month"));
            $total_leaves = 0;
            $remaining_leaves = 0;
            $leave_details = $this->Common_model->getAdminLeaveDetailsById($admin->user_id, $start, $end);
            // pre($this->db->last_query());
            if(!empty($leave_details)){
                foreach($leave_details as $leave){
                    $total_leaves += $leave->no_of_days;
                }
            }
            $paid_leaves = ($total_leaves >= 37) ? 37 : ($total_leaves);
            $unpaid_leaves = ($total_leaves >= 37) ? ($total_leaves-37) : 0;
            $remaining_leaves = ($total_leaves > 37) ? 0 : (37 - $total_leaves);
            $data['admin_list'][$i]->total_leaves = $total_leaves;
            $data['admin_list'][$i]->total_paid_leaves = $paid_leaves;
            $data['admin_list'][$i]->total_unpaid_leaves = $unpaid_leaves;
            $data['admin_list'][$i]->remaining_leaves = $remaining_leaves;
            $data['admin_list'][$i]->salary_amount = (($admin->sallery) - ($unpaid_leaves*$per_day_salary));
        }
        // pre($data['$data['admin_list']']);
        $this->BackendView('admin/manage_admin_salary', $data);
    }*/
    
    function  manage_admin_salary()
    {
        $data = $this->commonpage_data();
        $post = $this->input->post();
        $data['admin_list'] = $this->Common_model->getdata(array('is_deleted' => 0), 'admin_users');
        if(!empty($post['sdate'])){ 
            $year = date('Y', strtotime($post['sdate']));
            $month = date('m', strtotime($post['sdate']));
        }else{
            $year = date('Y');
            $month = date('m');
        } 
        $data['month'] = $month;
        $data['year'] = $year;
        // echo $year;
        // echo $month; 
        // echo date('Y-01-01', strtotime($year)); exit;
        foreach($data['admin_list'] as $i=>$admin){
            $per_day_salary = $admin->sallery/365;
            $start = date('Y-01-01', strtotime($year));
            $month1 = ($month-1);
            $end = date('Y-m-t', strtotime("$year-$month1")); 
            $total_leaves = 0;
            $total_current_leaves = 0;
            $remaining_leaves = 0;
            $leave_details = $this->Common_model->getAdminLeaveDetailsById($admin->user_id, $start, $end);
            // pre($this->db->last_query());
            if(!empty($leave_details)){
                foreach($leave_details as $leave){
                    $total_leaves += $leave->no_of_days;
                }
            }
            $start = date('Y-m-01', strtotime("$year-$month"));
            $end = date('Y-m-t', strtotime("$year-$month")); 
            $current_month_leave_details = $this->Common_model->getAdminLeaveDetailsById($admin->user_id, $start, $end);
            if(!empty($current_month_leave_details)){
                foreach($current_month_leave_details as $leave){
                    $total_current_leaves += $leave->no_of_days;
                }
            }
            if($total_leaves > 37){
                $unpaid_leaves = $total_current_leaves;
                $paid_leaves = 0;
                $remaining_leaves = 0;
            }else{
                if(($total_leaves + $total_current_leaves)>37){
                    $unpaid_leaves = ($total_leaves + $total_current_leaves) - 37;
                    $paid_leaves = $total_current_leaves - $unpaid_leaves;
                    $remaining_leaves = 0;
                }else{
                    $unpaid_leaves = 0;
                    $paid_leaves = $total_current_leaves;
                    $remaining_leaves = 37 - ($total_leaves + $total_current_leaves);
                }
            }
            /*$paid_leaves = ($total_leaves >= 37) ? 37 : ($total_leaves);
            $unpaid_leaves = ($total_leaves >= 37) ? ($total_leaves-37) : 0;
            $remaining_leaves = ($total_leaves > 37) ? 0 : (37 - $total_leaves);*/
            $data['admin_list'][$i]->total_leaves = ($total_leaves+$total_current_leaves);
            $data['admin_list'][$i]->total_paid_leaves = $paid_leaves;
            $data['admin_list'][$i]->total_unpaid_leaves = $unpaid_leaves;
            $data['admin_list'][$i]->remaining_leaves = $remaining_leaves;
            $data['admin_list'][$i]->salary_amount = (($admin->sallery) - ($unpaid_leaves*$per_day_salary));
        }
        // pre($data['$data['admin_list']']);
        $this->BackendView('admin/manage_admin_salary', $data);
    }
    
    function owner($option = '')
    {
        $data = $this->commonpage_data();
        if($option == 'new'){
            $data['users'] = $this->Common_model->getdata(array('usertype'=> "Owner", 'status'=>0, 'is_deleted' => 0), 'users'); 
        }else{
            $data['users'] = $this->Common_model->getdata(array('usertype'=> "Owner", 'is_deleted' => 0), 'users'); 
        }
        // pre($data['users']);
        $this->BackendView('admin/owner', $data);
    }

    function agent($option = '')
    {
        $data = $this->commonpage_data();
        if($option == 'new'){
            $data['users'] = $this->Common_model->getdata(array('usertype'=> "Agent", 'status'=>0, 'is_deleted' => 0), 'users'); 
        }else{
            $data['users'] = $this->Common_model->getdata(array('usertype'=> "Agent", 'is_deleted' => 0), 'users');
        }
       $this->BackendView('admin/agent', $data);
    }

    function builder($option = '')
    {
        $data = $this->commonpage_data();
        if($option == 'new'){
            $data['users'] = $this->Common_model->getdata(array('usertype'=> "Builder", 'status'=>0, 'is_deleted' => 0), 'users');
        }else{
            $data['users'] = $this->Common_model->getdata(array('usertype'=> "Builder", 'is_deleted' => 0), 'users');
        }
        $this->BackendView('admin/builder', $data);
    }
    
    function buyers()
    {
        $data = $this->commonpage_data();
        $data['buyers'] = $this->Common_model->getUserBuyers();
        $this->BackendView('admin/buyers', $data);
    }
    
    function pg()
    {
        $data = $this->commonpage_data();
        $data['pg'] = $this->Common_model->getdata(array('is_deleted' => 0), 'pg');
        $this->BackendView('admin/pg/pg', $data);
    }
    
    
    function add_pg()
    {
        $data = $this->commonpage_data();
        $data['ami'] = $this->Common_model->getdata(array('is_deleted' => 0, 'status' => 1), 'pg_amenities');
        $this->BackendView('admin/pg/add_pg', $data);
    }
    
    function save_pg()
    {
        $form_data = $this->input->post(array('state', 'city', 'location', 'landmark', 'pincode', 'managedby', 'pg_name', 'private_room_price', 'double_sharing_room', 'triple_sharing_room', 'near_location1', 'near_location2', 'near_location3', 
        'bike', 'car', 'girls', 'boys', 'both', 'pgami', 'UploadImages', 'details'));
        
        $insert_data = array('state' => $form_data['state'], 'city' => $form_data['city'], 'location'  => $form_data['location'], 'landmark'  => $form_data['landmark'], 'pincode'  => $form_data['pincode'], 'managedby'  => $form_data['managedby'],
        'pg_name'  => $form_data['pg_name'], 'private_room_price'  => $form_data['private_room_price'], 'double_sharing_room'  => $form_data['double_sharing_room'], 'triple_sharing_room'  => $form_data['triple_sharing_room'],
        'near_location1' => $form_data['near_location1'] , 'near_location2' => $form_data['near_location2'] , 'near_location3' => $form_data['near_location3'], 'bike' => $form_data['bike'], 'car' => $form_data['car'], 'girls' =>$form_data['girls'],
        'boys' =>$form_data['boys'], 'both' =>$form_data['both'], 'details' =>$form_data['details'], 'date_added' => date('Y-m-d H:i:s'));
        
        $result = $this->Common_model->insert_data('pg',$insert_data);
        if($result)
        {
            
            if(!empty($_FILES['UploadImages'])){
                if (!is_dir('./Uploads/user_pg/'.$result.'/')) 
                {
                    mkdir('./Uploads/user_pg/'.$result.'/', 0777, TRUE);
                }
                $files = $_FILES;
                $mum_files = count($files['UploadImages']['name']);
                for($i=0; $i<$mum_files; $i++)
                {
                    $random_name = rand(10000,999999);
                    if ( isset($files['UploadImages']['name'][$i]) ) {
                        $config['file_name'] = $random_name;
                        $config['upload_path'] = './Uploads/user_pg/'.$result.'/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['overwrite']     = FALSE;
                        $this->load->library('upload');
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
                            $image_path = './Uploads/user_pg/'.$result.'/'.$info['file_name'];
                            $this->Common_model->insert_data('pg_images',array('pg_id' => $result, 'file' => $image_path));
                        }
                    }
                }
            }
            
            foreach($form_data['pgami'] as $list)
            {
                $this->Common_model->insert_data('pg_amenities_booked',array('pg_id' => $result, 'amenities_id' => $list));
            }
            $this->session->set_flashdata('success', 'Data added Successfully!');
        }
        else{$this->session->set_flashdata('error', 'Data Not added!');}
        redirect('backend/pg');  
        
       
    }
    
    function edit_pg($id)
    {
        $data = $this->commonpage_data();
        $data['ami'] = $this->Common_model->getdata(array('is_deleted' => 0, 'status' => 1), 'pg_amenities');
        $data['pg_details'] = $this->Common_model->getdata(array('id' => $id), 'pg');
        $data['ami_booked'] = $this->Common_model->selectdataarray('amenities_id', array('pg_id' => $id), 'pg_amenities_booked');
        $this->BackendView('admin/pg/add_pg', $data);   
    }
    
    function update_pg()
    {
        $form_data = $this->input->post(array('id', 'state', 'city', 'location', 'landmark', 'pincode', 'managedby', 'pg_name', 'private_room_price', 'double_sharing_room', 'triple_sharing_room', 'near_location1', 'near_location2', 'near_location3', 
        'bike', 'car', 'girls', 'boys', 'both', 'pgami', 'UploadImages', 'details'));
        
        $insert_data = array('state' => $form_data['state'], 'city' => $form_data['city'], 'location'  => $form_data['location'], 'landmark'  => $form_data['landmark'], 'pincode'  => $form_data['pincode'], 'managedby'  => $form_data['managedby'],
        'pg_name'  => $form_data['pg_name'], 'private_room_price'  => $form_data['private_room_price'], 'double_sharing_room'  => $form_data['double_sharing_room'], 'triple_sharing_room'  => $form_data['triple_sharing_room'],
        'near_location1' => $form_data['near_location1'] , 'near_location2' => $form_data['near_location2'] , 'near_location3' => $form_data['near_location3'], 'bike' => $form_data['bike'], 'car' => $form_data['car'], 'girls' =>$form_data['girls'],
        'boys' =>$form_data['boys'], 'both' =>$form_data['both'], 'details' =>$form_data['details'], 'date_added' => date('Y-m-d H:i:s'));

        $result = $this->Common_model->update($insert_data, array('id'=>$form_data['id']),'pg'); 
        if($result)
        {
            if(!empty($_FILES['UploadImages'])){
                if (!is_dir('./Uploads/user_pg/'.$form_data['id'].'/')) 
                {
                    mkdir('./Uploads/user_pg/'.$form_data['id'].'/', 0777, TRUE);
                }
                $files = $_FILES;
                $mum_files = count($files['UploadImages']['name']);
                for($i=0; $i<$mum_files; $i++)
                {
                    $random_name = rand(10000,999999);
                    if ( isset($files['UploadImages']['name'][$i]) ) {
                        $config['file_name'] = $random_name;
                        $config['upload_path'] = './Uploads/user_pg/'.$form_data['id'].'/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['overwrite']     = FALSE;
                        $this->load->library('upload');
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
                            $image_path = './Uploads/user_pg/'.$form_data['id'].'/'.$info['file_name'];
                            $this->Common_model->insert_data('pg_images',array('pg_id' => $form_data['id'], 'file' => $image_path));
                        }
                    }
                }
            }
            
            $delete = $this->db->query('DELETE FROM pg_amenities_booked WHERE pg_id =' . $form_data['id']);
            foreach($form_data['pgami'] as $list)
            {
                $this->Common_model->insert_data('pg_amenities_booked',array('pg_id' => $form_data['id'], 'amenities_id' => $list));
            }
            $this->session->set_flashdata('success', 'Data Updated Successfully!');
        }
        else{$this->session->set_flashdata('error', 'Data Not Updated!');}
        redirect('backend/pg');  
        
       
    }
    
    function approve_pg($status, $id){
        $result = $this->Common_model->update(array('status'=> $status), array('id'=>$id),'pg'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Status Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Status Not Updated!');
        }
        redirect('backend/pg');
    }
    
    function delete_pg($id)
    {
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('id'=>$id),'pg'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Deleted!');
        }
        redirect('backend/pg');
    }
    
    function sellers()
    {
        $data = $this->commonpage_data();
        $data['sellers'] = $this->Common_model->getUserSellers();
        $this->BackendView('admin/sellers', $data);
    }
    
    function pg_amenities()
    {
        $data = $this->commonpage_data();
        $data['aminities'] = $this->Common_model->getdata(array('is_deleted' => 0), 'pg_amenities'); 
        $this->BackendView('admin/pg/pg_amenities', $data);
    }
    
    function save_amanities()
    {
        $form_data = $this->input->post(array('name', 'id'));
        if($form_data['id'])
        {
            $result = $this->Common_model->update(array('name'=> $form_data['name']), array('id'=>$form_data['id']),'pg_amenities'); 
            if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
            else{$this->session->set_flashdata('error', 'Data Not Updated!');}
            redirect('backend/pg_amenities');   
        }
        else
        {
            $insert_data = array('name' => $form_data['name'], 'date_added' => date('Y-m-d H:i:s'));
            $result = $this->Common_model->insert_data('pg_amenities',$insert_data);
            if($result){$this->session->set_flashdata('success', 'Data added Successfully!');}
            else{$this->session->set_flashdata('error', 'Data Not added!');}
            redirect('backend/pg_amenities');   
        }
    }
    
    function approve_aminities($status, $id){
        $result = $this->Common_model->update(array('status'=> $status), array('id'=>$id),'pg_amenities'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Status Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Status Not Updated!');
        }
        redirect('backend/pg_amenities');
    }
    
    function delete_aminities($id)
    {
         $result = $this->Common_model->update(array('is_deleted'=> 1), array('id'=>$id),'pg_amenities'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Deleted!');
        }
        redirect('backend/pg_amenities');
    }
    
    public function edit_aminities()
    {
        $post_id = $this->input->post('post_id');
        $project = $this->Common_model->getarraydatabyid(array('id'=>$post_id),'pg_amenities');
        echo json_encode($project);
    }
    
    function edit_user($id)
    {
        $data = $this->commonpage_data();
        $data['last_url'] = $_SERVER['HTTP_REFERER'];    
        $data['users'] = $this->Common_model->getdata(array('user_id' => $id), 'users'); 
        $data['city'] = $this->Common_model->getdata(array('is_deleted' => 0), 'city'); 
        $data['state'] = $this->Common_model->getdata(array('is_deleted' => 0), 'state'); 
        $this->BackendView('admin/edit_users', $data);
    }
    
    function update_users()
    {
        $form_data = $this->input->post(array('name', 'last_url', 'mobile', 'email', 'state', 'city', 'landmark', 'pincode', 'address', 'com_name', 'website', 'about_us', 'user_id'));
        $insert_data = array('name' => $form_data['name'], 'email' => $form_data['email'], 'phone' => $form_data['mobile'], 'website' => $form_data['website'], 
        'company_name' =>$form_data['com_name'], 'address' => $form_data['address'], 'pincode' => $form_data['pincode'], 'landmark' => $form_data['landmark'],
        'state' => $form_data['state'], 'city' => $form_data['city'], 'about_us' => $form_data['about_us']);

        $result = $this->Common_model->update($insert_data, array('user_id'=>$form_data['user_id']), 'users');  
        if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Updated!');}
        
        redirect($form_data['last_url']);
    }
    
    function delete_users($id)
    {
        $result = $this->Common_model->update(array('is_deleted' => 1), array('user_id'=>$id), 'users');  
        if($result){$this->session->set_flashdata('success', 'Data Deleted Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Deleted!');}
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    function lead_partners($option = '')
    {
        $data = $this->commonpage_data();
        if($option == 'new'){
            $data['lead_partners'] = $this->Common_model->getdata(array('status'=> 0, 'is_deleted' => 0), 'lead_partners');
        }else{
            $data['lead_partners'] = $this->Common_model->getdata(array('is_deleted'=>0), 'lead_partners');
        }
        // pre($data['lead_partners']);
        $this->BackendView('admin/lead_partners', $data);
    }
    
     function change_status($status, $id){
        $result = $this->Common_model->update(array('status'=> $status), array('user_id'=>$id),'lead_partners'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Updated!');
        }
        redirect('backend/lead_partners');
    }
    
    function change_status_user($status, $id)
    {
        $result = $this->Common_model->update(array('status'=> $status), array('user_id'=>$id),'users'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Updated!');
        }
         redirect($_SERVER['HTTP_REFERER']);
    }
    
    function add_lead_partner()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/add_lead_partners', $data);
    }
    
    function edit_lead_partners($id)
    {
        $data = $this->commonpage_data();
        $data['users'] = $this->Common_model->getdata(array('user_id'=> $id), 'lead_partners');
        $this->BackendView('admin/edit_lead_partners', $data);
    }
    
    function save_lead_partners()
    {
        $form_data = $this->input->post(array('name', 'mobile', 'alt_mobile', 'landline', 'email', 'bankname', 'bank_branch', 'ac_holder', 'ifsc', 'acc_number',
        'aadhar', 'pan', 'address'));
        
        $insert_data = array('name' => $form_data['name'], 'email' => $form_data['email'], 'phone' => $form_data['mobile'], 'ifsc' => $form_data['ifsc'], 
        'account_no' =>$form_data['acc_number'], 'ac_holder' => $form_data['ac_holder'], 'bank_branch' => $form_data['bank_branch'], 'bank_name' => $form_data['bankname'],
        'aadhar' => $form_data['aadhar'], 'pan' => $form_data['pan'], 'alt_mobile' => $form_data['alt_mobile'], 'address' => $form_data['address'], 'landline' => $form_data['landline'], 'admin_id' => $this->session->userdata('admin_id'));
        $result = $this->Common_model->insert_data('lead_partners',$insert_data);
        if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Updated!');}
        redirect('backend/lead_partners');
    }
    
    
    function update_lead_partners()
    {
        $form_data = $this->input->post(array('name', 'mobile', 'alt_mobile', 'landline', 'email', 'bankname', 'bank_branch', 'ac_holder', 'ifsc', 'acc_number',
        'aadhar', 'pan', 'address', 'user_id'));
        
        $insert_data = array('name' => $form_data['name'], 'email' => $form_data['email'], 'phone' => $form_data['mobile'], 'ifsc' => $form_data['ifsc'], 
        'account_no' =>$form_data['acc_number'], 'ac_holder' => $form_data['ac_holder'], 'bank_branch' => $form_data['bank_branch'], 'bank_name' => $form_data['bankname'],
        'aadhar' => $form_data['aadhar'], 'pan' => $form_data['pan'], 'alt_mobile' => $form_data['alt_mobile'], 'address' => $form_data['address'], 'landline' => $form_data['landline']);
        // pre($insert_data);
        
        $result = $this->Common_model->update($insert_data, array('user_id'=>$form_data['user_id']), 'lead_partners');  
        if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Updated!');}
        redirect('backend/lead_partners');
    }
    
    function delete_lead_partners($id)
    {
        $result = $this->Common_model->update(array('is_deleted' => 1), array('user_id'=>$id), 'lead_partners');  
        if($result){$this->session->set_flashdata('success', 'Data Deleted Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Deleted!');}
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    
    function list_advertisement(){
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'advertisements');
        $this->BackendView('admin/list_advertisement', $data);
    }
    
    
    public function save_advertisement(){
        $this->load->library('upload');
        $post=$this->input->post();
        $id = $post['id'];
        if($id == 0){
            $random_name = rand(10000,999999);
            if(!empty($_FILES['UploadImages'])){
                if (!is_dir('./Uploads/advertisements/')) 
                {
                    mkdir('./Uploads/advertisements/', 0777, TRUE);
                }
                $config['upload_path']          = './Uploads/advertisements';
                $config['file_name']            = $random_name;
                $config['allowed_types']        = 'jpeg|jpg|png';
                // $config['allowed_types']        = '*';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
    
                $this->upload->initialize($config);
                if ($this->upload->do_upload('UploadImages'))
                {                    
                    $upload_data = $this->upload->data();
                    $image_name = "Uploads/advertisements/".$upload_data['file_name'];
                }
                else
                {
                    // echo $this->upload->display_errors();
                    $image_name = $post['prevUploadImages'];
                }   
            }else{
                    $image_name = $post['prevUploadImages'];
            }
            
            $insert_data = array('title'=>$post['title'],'type'=>$post['type'],'city'=>$post['city'],'location'=>$post['location'],'add_by'=>$post['add_by'],'price'=>$post['price'],'description'=>@$post['description'],'image'=>@$image_name,'created'=>date('Y-m-d H:i:s'));
            $res = $this->Common_model->insert_data('advertisements', $insert_data);
            if($res){
                $this->session->set_flashdata('success', 'Saved!');
            }else{
                $this->session->set_flashdata('error', 'Failed!');
            }
        }else{
             $update_data = array('title'=>$post['title'],'type'=>$post['type'],'city'=>$post['city'],'location'=>$post['location'],'add_by'=>$post['add_by'],'price'=>$post['price'],'description'=>@$post['description']);
        
            $res = $this->Common_model->update($update_data, array('id'=>$id), 'advertisements');
                if($res){
                    $this->session->set_flashdata('success', 'Updated!');
                }else{
                    $this->session->set_flashdata('error', 'Failed!');
                }
        }
        redirect('backend/list_advertisement');
    }
    
    
    public function add_post_to_advertisement(){
        $post = $this->input->post();
        $post_id = $post['ad_post_id'];
        $type = $post['ad_post_type'];
        $ad_size = $post['ad_size'];
        $ad_expiry_date = $post['ad_expiry_date'];
        $redirect_url = $post['redirect_url'];
        
        if($type == 'project'){
            $result = $this->Common_model->update(array('ad_flag' => 1, 'ad_size'=>$ad_size, 'ad_expiry_date'=>date('Y-m-d', strtotime($ad_expiry_date))), array('post_id'=>$post_id), 'post_project');  
            if($result){$this->session->set_flashdata('success', 'Project added to adverstisement!');}
            else{$this->session->set_flashdata('error', 'Failed to add project to adverstisement!');}
            
        }elseif($type == 'property'){
            $result = $this->Common_model->update(array('ad_flag' => 1, 'ad_size'=>$ad_size, 'ad_expiry_date'=>date('Y-m-d', strtotime($ad_expiry_date))), array('post_id'=>$post_id), 'post_property');  
            if($result){$this->session->set_flashdata('success', 'Property added to adverstisement!');}
            else{$this->session->set_flashdata('error', 'Failed to add property to adverstisement!');}
        }
        redirect($redirect_url);
    }
    
    public function remove_from_ad($post_type, $post_id){
        //$redirect_url = $post['redirect_url'];
        
        if($post_type == 'project'){
            $result = $this->Common_model->update(array('ad_flag' => 0), array('post_id'=>$post_id), 'post_project');  
            if($result){$this->session->set_flashdata('success', 'Project removed from adverstisement!');}
            else{$this->session->set_flashdata('error', 'Failed to remove project from adverstisement!');}
            
        }/*elseif($post_type == 'property'){
            $result = $this->Common_model->update(array('ad_flag' => 0), array('post_id'=>$post_id), 'post_property');  
            if($result){$this->session->set_flashdata('success', 'Property removed from adverstisement!');}
            else{$this->session->set_flashdata('error', 'Failed to remove property from adverstisement!');}
        }*/
        redirect("property/projects");
    }
    
    
    public function send_link(){
        $post = $this->input->post();
        $send_method = $post['send_method'];
        $send_link_type = $post['send_link_type'];
        $redirect_url = $post['redirect_url'];
        if($send_link_type == 'post_property'){
            $link = base_url()."home/post_property/".$this->session->userdata('admin_id');
            $message = "Dear customer, Please visit this $link link to add your property.";
        }
        if($send_link_type == 'post_requirement'){
            $link = base_url()."home/post_requirements/".$this->session->userdata('admin_id');
            $message = "Dear customer, Please visit this $link link to add your requirement.";
        }
        //$message = "<img src=".base_url('assets/front/img/main-logo.webp')." width='100%' height='100%'> <br/><br/> Dear customer, Please <a href='".$link."'>click here</a> add your new property";
        if($send_method == 'sms' || $send_method == 'all'){
            $mobile_sms = $post['mobile_sms'];
            $result = sms_code_send($mobile_sms, $message);
        }
        if($send_method == 'whatsapp' || $send_method == 'all'){
            $mobile_whatsapp = $post['mobile_whatsapp']; 
        }
        if($send_method == 'email' || $send_method == 'all'){
            $email_id = $post['email_id'];
            $subject = "Add Stock Link from FloorMantra";
            if($send_link_type == 'post_property'){
                $message = "<img src=".base_url('assets/front/img/main-logo.webp')." width='100%' height='100%'> <br/><br/> Dear customer, Please <a href='".$link."'>click here</a> add your new property.";
            }else{
                $message = "<img src=".base_url('assets/front/img/main-logo.webp')." width='100%' height='100%'> <br/><br/> Dear customer, Please <a href='".$link."'>click here</a> add your new requirement.";
            }
            
            $result = $this->send_mail($email_id, $subject, $message);            
            // $result = $this->send_mail('info@floormantra.com','rutuja.s@montekservices.in', $subject, $message);     
            // pre($result);
        }
        if($result)
        { //echo 'Success';
            $this->session->set_flashdata('success', 'Link send Successfully!');
        }
        else
        { //echo 'error';
            $this->session->set_flashdata('error', 'Link Not Sent!');
        }
        redirect($redirect_url);
    }
    
    //Factory - Commercial-seller
    function factory()
    {
        $data = $this->commonpage_data();
        $data['factory_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'stock_rent_commercial');
       $this->BackendView('admin/factory', $data);
    }

    function get_factory_details_by_id(){
        $factory_id = $this->input->post('factory_id');
        $result = $this->Common_model->getdatabyid(array('factory_id'=>$factory_id), 'stock_rent_commercial'); 
        echo json_encode($result);
    }

    function save_factory(){
        $post = $this->input->post();
        //print_r($post); exit;
        $factory_id = $post['factory_id'];
        $random_name = rand(10000,999999);
        if(!empty($_FILES['image'])){
            if (!is_dir('./Uploads/factory/')) 
            {
                mkdir('./Uploads/factory/', 0777, TRUE);
            }
            $config['upload_path']          = './Uploads/factory';
            $config['file_name']            = $random_name;
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image'))
            {                    
                $upload_data = $this->upload->data();
                $file_name = "Uploads/factory/".$upload_data['file_name'];
            }
            else
            {
                $file_name = $post['prev_image'];
            }   
        }
        if($factory_id == 0){
            $insert_data = array('added_by'=>$post['added_by'],
                                 'name'=>$post['name'],
                                 'mobile'=>$post['mobile'],
                                 'mobile_official'=>$post['mobile_official'],
                                 'phone'=>$post['phone'],
                                 'email'=>$post['email'],
                                 'state'=>$post['state'],
                                 'city'=>$post['city'],
                                 'location'=>$post['location'],
                                 'landmark'=>$post['landmark'],
                                 'pincode'=>$post['pincode'],
                                 'address'=>$post['address'],
                                 'security_deposite'=>$post['security_deposite'],
                                 'rent_month'=>$post['rent_month'],
                                 'rent_sell'=>$post['rent_sell'],
                                 'furnish_status'=>$post['furnish_status'],
                                 'complex_society_building_name'=>$post['complex_society_building_name'],
                                 'super_built_up_area'=>$post['super_built_up_area'],
                                 'super_built_up_area_unit'=>$post['super_built_up_area_unit'],
                                 'built_up_area'=>$post['built_up_area'],
                                 'built_up_area_unit'=>$post['built_up_area_unit'],
                                 'covered_area'=>$post['covered_area'],
                                 'covered_area_unit'=>$post['covered_area_unit'],
                                 'factory_number'=>$post['factory_number'],
                                 'floor'=>$post['floor'],
                                 'total_floor'=>$post['total_floor'],
                                 'number_of_cabin'=>$post['number_of_cabin'],
                                 'number_of_work_station'=>$post['number_of_work_station'],
                                 'pentry'=>$post['pentry'],
                                 'pentry_user_for'=>$post['pentry_user_for'],
                                 'roof'=>$post['roof'],
                                 'bathroom'=>$post['bathroom'],
                                 'bathroom_use_for'=>$post['bathroom_use_for'],
                                 'road_wide'=>$post['road_wide'],
                                 'road_wide_unit'=>$post['road_wide_unit'],
                                 'heavy_vehicle_parking'=>$post['heavy_vehicle_parking'],
                                 'electric_power'=>$post['electric_power'],
                                 'electric_power_unit'=>$post['electric_power_unit'],
                                 'manufacturing_type'=>$post['manufacturing_type'],
                                 'possession'=>$post['possession'],
                                 'possession_date'=>date('Y-m-d', strtotime($post['possession_date'])),
                                 'open'=>$post['open'],
                                 'covered'=>$post['covered'],
                                 'basement'=>$post['basement'],
                                 'lift_parking'=>$post['lift_parking'],
                                 'age_of_properties'=>$post['age_of_properties'],
                                 'properties_type_end'=>$post['properties_type_end'],
                                 'reception'=>$post['reception'],
                                 'description'=>$post['description'],
                                 'video'=>$post['video'],
                                 'image'=>$file_name,
                             );    
            $result = $this->Common_model->insert_data('stock_rent_commercial',$insert_data);  
            if($result){
                $this->session->set_flashdata('success', 'Data Saved Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Saved!');
            }      
        }else{
            $insert_data = array('added_by'=>$post['added_by'],
                                 'name'=>$post['name'],
                                 'mobile'=>$post['mobile'],
                                 'mobile_official'=>$post['mobile_official'],
                                 'phone'=>$post['phone'],
                                 'email'=>$post['email'],
                                 'state'=>$post['state'],
                                 'city'=>$post['city'],
                                 'location'=>$post['location'],
                                 'landmark'=>$post['landmark'],
                                 'pincode'=>$post['pincode'],
                                 'address'=>$post['address'],
                                 'security_deposite'=>$post['security_deposite'],
                                 'rent_month'=>$post['rent_month'],
                                 'rent_sell'=>$post['rent_sell'],
                                 'furnish_status'=>$post['furnish_status'],
                                 'complex_society_building_name'=>$post['complex_society_building_name'],
                                 'super_built_up_area'=>$post['super_built_up_area'],
                                 'super_built_up_area_unit'=>$post['super_built_up_area_unit'],
                                 'built_up_area'=>$post['built_up_area'],
                                 'built_up_area_unit'=>$post['built_up_area_unit'],
                                 'covered_area'=>$post['covered_area'],
                                 'covered_area_unit'=>$post['covered_area_unit'],
                                 'factory_number'=>$post['factory_number'],
                                 'floor'=>$post['floor'],
                                 'total_floor'=>$post['total_floor'],
                                 'number_of_cabin'=>$post['number_of_cabin'],
                                 'number_of_work_station'=>$post['number_of_work_station'],
                                 'pentry'=>$post['pentry'],
                                 'pentry_user_for'=>$post['pentry_user_for'],
                                 'roof'=>$post['roof'],
                                 'bathroom'=>$post['bathroom'],
                                 'bathroom_use_for'=>$post['bathroom_use_for'],
                                 'road_wide'=>$post['road_wide'],
                                 'road_wide_unit'=>$post['road_wide_unit'],
                                 'heavy_vehicle_parking'=>$post['heavy_vehicle_parking'],
                                 'electric_power'=>$post['electric_power'],
                                 'electric_power_unit'=>$post['electric_power_unit'],
                                 'manufacturing_type'=>$post['manufacturing_type'],
                                 'possession'=>$post['possession'],
                                 'possession_date'=>date('Y-m-d', strtotime($post['possession_date'])),
                                 'open'=>$post['open'],
                                 'covered'=>$post['covered'],
                                 'basement'=>$post['basement'],
                                 'lift_parking'=>$post['lift_parking'],
                                 'age_of_properties'=>$post['age_of_properties'],
                                 'properties_type_end'=>$post['properties_type_end'],
                                 'reception'=>$post['reception'],
                                 'description'=>$post['description'],
                                 'video'=>$post['video'],
                                 'image'=>$file_name,
                             );    
            $result = $this->Common_model->update($insert_data, array('factory_id'=>$factory_id), 'stock_rent_commercial');  
            if($result){
                $this->session->set_flashdata('success', 'Data Updated Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Updated!');
            }      
        }
        redirect('backend/factory');
    }

    function delete_factory($factory_id){
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('factory_id'=>$factory_id),'stock_rent_commercial'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Deleted!');
        }
        redirect('backend/factory');
    }


    // Land 
    function land()
    {
        $data = $this->commonpage_data();
        $data['list_land'] = $this->Common_model->getdata(array('is_deleted'=>0), 'land_rent_commercial');
        $this->BackendView('admin/land', $data);
    }

    function save_land(){
        $post = $this->input->post();
        $land_id = $post['land_id'];
        $random_name = rand(10000,999999);
        if(!empty($_FILES['image'])){
            if (!is_dir('./Uploads/land/')) 
            {
                mkdir('./Uploads/land/', 0777, TRUE);
            }
            $config['upload_path']          = './Uploads/land';
            $config['file_name']            = $random_name;
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image'))
            {                    
                $upload_data = $this->upload->data();
                $file_name = "Uploads/land/".$upload_data['file_name'];
            }
            else
            {
                $file_name = $post['prev_image'];
            }   
        }
        if($land_id == 0){
            $insert_data = array('added_by' => $post['added_by'],
                                 'name' => $post['name'],
                                 'mobile' => $post['mobile'],
                                 'mobile_official' => $post['mobile_official'],
                                 'phone' => $post['phone'],
                                 'email' => $post['email'],
                                 'state' => $post['state'],
                                 'city' => $post['city'],
                                 'location' => $post['location'],
                                 'landmark' => $post['landmark'],
                                 'pin_code' => $post['pin_code'],
                                 'address' => $post['address'],
                                 'rent_sell' => $post['rent_sell'],
                                 'com_res' => $post['com_res'],
                                 'security_deposite' => $post['security_deposite'],
                                 'rent_month' => $post['rent_month'],
                                 'land_area' => $post['land_area'],
                                 'land_area_unit' => $post['land_area_unit'],
                                 'covered_area' => $post['covered_area'],
                                 'covered_area_unit' => $post['covered_area_unit'],
                                 'land_status' => $post['land_status'],
                                 'existing_owner' => $post['existing_owner'],
                                 'nature_of_land' => $post['nature_of_land'],
                                 'number_of_owner' => $post['number_of_owner'],
                                 'property_taxt' => $post['property_taxt'],
                                 'mutation' => $post['mutation'],
                                 'land_facing' => $post['land_facing'],
                                 'land_road_wide' => $post['land_road_wide'],
                                 'land_road_wide_unit' => $post['land_road_wide_unit'],
                                 'possesion' => $post['possession'],
                                 'possession_date' => date('Y-m-d', strtotime($post['possession_date'])),
                                 'age_of_properties' => $post['age_of_properties'],
                                 'property_type' => $post['property_type'],
                                 'description' => $post['description'],
                                 'video' => $post['video'],
                                 'image' => $file_name,
                                 'is_deleted' => 0,
                            );
            $result = $this->Common_model->insert_data('land_rent_commercial',$insert_data); 

            if($result){ 
                $this->session->set_flashdata('success', 'Data Saved Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Saved!');
            }
        }else{
            $insert_data = array('name' => $post['name'],
                                 'mobile' => $post['mobile'],
                                 'mobile_official' => $post['mobile_official'],
                                 'phone' => $post['phone'],
                                 'email' => $post['email'],
                                 'state' => $post['state'],
                                 'city' => $post['city'],
                                 'location' => $post['location'],
                                 'landmark' => $post['landmark'],
                                 'pin_code' => $post['pin_code'],
                                 'address' => $post['address'],
                                 'rent_sell' => $post['rent_sell'],
                                 'com_res' => $post['com_res'],
                                 'security_deposite' => $post['security_deposite'],
                                 'rent_month' => $post['rent_month'],
                                 'land_area' => $post['land_area'],
                                 'land_area_unit' => $post['land_area_unit'],
                                 'covered_area' => $post['covered_area'],
                                 'covered_area_unit' => $post['covered_area_unit'],
                                 'land_status' => $post['land_status'],
                                 'existing_owner' => $post['existing_owner'],
                                 'nature_of_land' => $post['nature_of_land'],
                                 'number_of_owner' => $post['number_of_owner'],
                                 'property_taxt' => $post['property_taxt'],
                                 'mutation' => $post['mutation'],
                                 'land_facing' => $post['land_facing'],
                                 'land_road_wide' => $post['land_road_wide'],
                                 'land_road_wide_unit' => $post['land_road_wide_unit'],
                                 'possesion' => $post['possession'],
                                 'possession_date' => date('Y-m-d', strtotime($post['possession_date'])),
                                 'age_of_properties' => $post['age_of_properties'],
                                 'property_type' => $post['property_type'],
                                 'description' => $post['description'],
                                 'video' => $post['video'],
                                 'image' => $file_name
                            );
            $result = $this->Common_model->update($insert_data, array('land_id'=>$land_id), 'land_rent_commercial'); 

            if($result){ 
                $this->session->set_flashdata('success', 'Data updated Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not updated!');
            }
        }
        redirect('backend/land');
    }

    function get_land_details_by_id(){
        $land_id = $this->input->post('land_id');
        $result = $this->Common_model->getdatabyid(array('land_id'=>$land_id), 'land_rent_commercial'); 
        echo json_encode($result);
    }

    function delete_land($land_id){
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('land_id'=>$land_id),'land_rent_commercial'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Deleted!');
        }
        redirect('backend/land');
    }


    //Office
    function office()
    {
        $data = $this->commonpage_data();
        $data['list_office'] = $this->Common_odeml->getdata(array('is_deleted'=>0), 'office_rent_commercial');
        $this->BackendView('admin/office', $data);
    }

    function get_office_details_by_id(){
        $office_id = $this->input->post('office_id');
        $result = $this->Common_model->getdatabyid(array('office_id'=>$office_id), 'office_rent_commercial'); 
        echo json_encode($result);
    }

    function save_office(){
        $post = $this->input->post();
        // print_r($post); exit;
        $office_id = $post['office_id'];
        $random_name = rand(10000,999999);
        if(!empty($_FILES['image'])){
            if (!is_dir('./Uploads/office/')) 
            {
                mkdir('./Uploads/office/', 0777, TRUE);
            }
            $config['upload_path']          = './Uploads/office';
            $config['file_name']            = $random_name;
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image'))
            {                    
                $upload_data = $this->upload->data();
                $file_name = "Uploads/office/".$upload_data['file_name'];
            }
            else
            {
                $file_name = $post['prev_image'];
            }   
        }
        if($office_id == 0){
            $insert_data = array('added_by'=>$post['added_by'],
                                 'property_id'=>$post['property_id'],
                                 'name'=>$post['name'],
                                 'mobile'=>$post['mobile'],
                                 'mobile_official'=>$post['mobile_official'],
                                 'phone'=>$post['phone'],
                                 'email'=>$post['email'],
                                 'state'=>$post['state'],
                                 'city'=>$post['city'],
                                 'location'=>$post['location'],
                                 'land_mark'=>$post['landmark'],
                                 'pin_code'=>$post['pin_code'],
                                 'address'=>$post['address'],
                                 'rent_sell'=>$post['rent_sell'],
                                 'security_deposite'=>$post['security_deposite'],
                                 'rent_month'=>$post['rent_month'],
                                 'furnished_status'=>$post['furnished_status'],
                                 'complex_society_building_name'=>$post['complex_society_building_name'],
                                 'super_built_up_area'=>$post['super_built_up_area'],
                                 'super_built_up_area_unit'=>$post['super_built_up_area_unit'],
                                 'built_up_area'=>$post['built_up_area'],
                                 'built_up_area_unit'=>$post['built_up_area_unit'],
                                 'carpet_area'=>$post['carpet_area'],
                                 'carpet_area_unit'=>$post['carpet_area_unit'],
                                 'office_number'=>$post['office_number'],
                                 'floor'=>$post['floor'],
                                 'block_number'=>$post['block_number'],
                                 'total_floor'=>$post['total_floor'],
                                 'number_of_cabin'=>$post['number_of_cabin'],
                                 'number_of_work_station'=>$post['number_of_work_station'],
                                 'pentry'=>$post['pentry'],
                                 'use_for'=>$post['use_for'],
                                 'bathroom'=>$post['bathroom'],
                                 'ac'=>$post['ac'],
                                 'possession'=>$post['possession'],
                                 'possession_date'=>date('Y-m-d', strtotime($post['possession_date'])),
                                 'open_parking'=>$post['open'],
                                 'covered_parking'=>$post['covered'],
                                 'basment_parking'=>$post['basement'],
                                 'lift_parking'=>$post['lift_parking'],
                                 'age_of_properties'=>$post['age_of_properties'],
                                 'power_backup'=>!empty($post['power_backup']) ? $post['power_backup'] : '',
                                 'description'=>$post['description'],
                                 'video'=>$post['video'],
                                 'image'=>$file_name,
                             );    
            $result = $this->Common_model->insert_data('office_rent_commercial',$insert_data);  
            if($result){
                $this->session->set_flashdata('success', 'Data Saved Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Saved!');
            }      
        }else{
            $insert_data = array('name'=>$post['name'],
                                 'mobile'=>$post['mobile'],
                                 'mobile_official'=>$post['mobile_official'],
                                 'phone'=>$post['phone'],
                                 'email'=>$post['email'],
                                 'state'=>$post['state'],
                                 'city'=>$post['city'],
                                 'location'=>$post['location'],
                                 'land_mark'=>$post['landmark'],
                                 'pin_code'=>$post['pin_code'],
                                 'address'=>$post['address'],
                                 'rent_sell'=>$post['rent_sell'],
                                 'security_deposite'=>$post['security_deposite'],
                                 'rent_month'=>$post['rent_month'],
                                 'furnished_status'=>$post['furnished_status'],
                                 'complex_society_building_name'=>$post['complex_society_building_name'],
                                 'super_built_up_area'=>$post['super_built_up_area'],
                                 'super_built_up_area_unit'=>$post['super_built_up_area_unit'],
                                 'built_up_area'=>$post['built_up_area'],
                                 'built_up_area_unit'=>$post['built_up_area_unit'],
                                 'carpet_area'=>$post['carpet_area'],
                                 'carpet_area_unit'=>$post['carpet_area_unit'],
                                 'office_number'=>$post['office_number'],
                                 'floor'=>$post['floor'],
                                 'block_number'=>$post['block_number'],
                                 'total_floor'=>$post['total_floor'],
                                 'number_of_cabin'=>$post['number_of_cabin'],
                                 'number_of_work_station'=>$post['number_of_work_station'],
                                 'pentry'=>$post['pentry'],
                                 'use_for'=>$post['use_for'],
                                 'bathroom'=>$post['bathroom'],
                                 'ac'=>$post['ac'],
                                 'possession'=>$post['possession'],
                                 'possession_date'=>date('Y-m-d', strtotime($post['possession_date'])),
                                 'open_parking'=>$post['open'],
                                 'covered_parking'=>$post['covered'],
                                 'basment_parking'=>$post['basement'],
                                 'lift_parking'=>$post['lift_parking'],
                                 'age_of_properties'=>$post['age_of_properties'],
                                 'power_backup'=>!empty($post['power_backup']) ? $post['power_backup'] : '',
                                 'description'=>$post['description'],
                                 'video'=>$post['video'],
                                 'image'=>$file_name,
                             );
            $result = $this->Common_model->update($insert_data, array('office_id'=>$office_id), 'office_rent_commercial');  
            if($result){
                $this->session->set_flashdata('success', 'Data Updated Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Updated!');
            }      
        }
        redirect('backend/office');
    }

    function delete_office($office_id){
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('office_id'=>$office_id),'office_rent_commercial'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Deleted!');
        }
        redirect('backend/office');
    }

    //Shop
    function shop()
    {
        $data = $this->commonpage_data();
        $data['list_shop'] = $this->Common_model->getdata(array('is_deleted'=>0), 'shop_rent_commercial');
        $this->BackendView('admin/shop', $data);
    }

    function get_shop_details_by_id(){
        $shop_id = $this->input->post('shop_id');
        $result = $this->Common_model->getdatabyid(array('shop_id'=>$shop_id), 'shop_rent_commercial'); 
        echo json_encode($result);
    }

    function save_shop(){
        $post = $this->input->post();
        // print_r($post); exit;
        $shop_id = $post['shop_id'];
        $random_name = rand(10000,999999);
        if(!empty($_FILES['image'])){
            if (!is_dir('./Uploads/shop/')) 
            {
                mkdir('./Uploads/shop/', 0777, TRUE);
            }
            $config['upload_path']          = './Uploads/shop';
            $config['file_name']            = $random_name;
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image'))
            {                    
                $upload_data = $this->upload->data();
                $file_name = "Uploads/shop/".$upload_data['file_name'];
            }
            else
            {
                $file_name = $post['prev_image'];
            }   
        }
        if($shop_id == 0){
            $insert_data = array('added_by'=>$post['added_by'],
                                 'property_id'=>$post['property_id'],
                                 'name'=>$post['name'],
                                 'mobile'=>$post['mobile'],
                                 'mobile_official'=>$post['mobile_official'],
                                 'phone'=>$post['phone'],
                                 'email'=>$post['email'],
                                 'state'=>$post['state'],
                                 'city'=>$post['city'],
                                 'location'=>$post['location'],
                                 'land_mark'=>$post['land_mark'],
                                 'pin_code'=>$post['pin_code'],
                                 'address'=>$post['address'],
                                 'rent_sell'=>$post['rent_sell'],
                                 'security_deposite'=>$post['security_deposite'],
                                 'rent_month'=>$post['rent_month'],
                                 'frontage'=>$post['frontage'],
                                 'frontage_unit'=>$post['frontage_unit'],
                                 'super_built_up_area'=>$post['super_built_up_area'],
                                 'built_up_area'=>$post['built_up_area'],
                                 'built_up_area_unit'=>$post['built_up_area_unit'],
                                 'open_area'=>$post['open_area'],
                                 'open_area_unit'=>$post['open_area_unit'],
                                 'covered_area'=>$post['covered_area'],
                                 'shop_number'=>$post['shop_number'],
                                 'complex_society_building_name'=>$post['complex_society_building_name'],
                                 'floor'=>$post['floor'],
                                 'total_floor'=>$post['total_floor'],
                                 'bathroom'=>$post['bathroom'],
                                 'bathroom_use_for'=>$post['bathroom_use_for'],
                                 'pentry'=>$post['pentry'],
                                 'pentry_use_for'=>$post['pentry_use_for'],
                                 'road_wide'=>$post['road_wide'],
                                 // 'road_wide_unit'=>$post['road_wide_unit'],
                                 'available_for_war'=>$post['available_for_war'],
                                 'restaurant'=>$post['restaurant'],
                                 'electric_power'=>$post['electric_power'],
                                 'electric_power_unit'=>$post['electric_power_unit'],
                                 'heavy_vehicle_parking'=>$post['heavy_vehicle_parking'],
                                 'possession'=>$post['possession'],
                                 'possession_date'=>date('Y-m-d', strtotime($post['possession_date'])),
                                 'open_parking'=>$post['open_parking'],
                                 'covered_parking'=>$post['covered_parking'],
                                 'basment'=>$post['basement_parking'],
                                 'lift_parking'=>$post['lift_parking'],
                                 'age_of_properties'=>$post['age_of_properties'],
                                 'roof'=>$post['roof'],
                                 'property_type'=>$post['property_type'],
                                 'power_backup'=>!empty($post['power_backup']) ? $post['power_backup'] : '',
                                 'description'=>$post['description'],
                                 'video'=>$post['video'],
                                 'image'=>$file_name,
                             );    
            $result = $this->Common_model->insert_data('shop_rent_commercial',$insert_data);  
            if($result){
                $this->session->set_flashdata('success', 'Data Saved Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Saved!');
            }      
        }else{
            $insert_data = array('name'=>$post['name'],
                                 'mobile'=>$post['mobile'],
                                 'mobile_official'=>$post['mobile_official'],
                                 'phone'=>$post['phone'],
                                 'email'=>$post['email'],
                                 'state'=>$post['state'],
                                 'city'=>$post['city'],
                                 'location'=>$post['location'],
                                 'land_mark'=>$post['landmark'],
                                 'pin_code'=>$post['pin_code'],
                                 'address'=>$post['address'],
                                 'rent_sell'=>$post['rent_sell'],
                                 'security_deposite'=>$post['security_deposite'],
                                 'rent_month'=>$post['rent_month'],
                                 'furnished_status'=>$post['furnished_status'],
                                 'complex_society_building_name'=>$post['complex_society_building_name'],
                                 'super_built_up_area'=>$post['super_built_up_area'],
                                 'super_built_up_area_unit'=>$post['super_built_up_area_unit'],
                                 'built_up_area'=>$post['built_up_area'],
                                 'built_up_area_unit'=>$post['built_up_area_unit'],
                                 'carpet_area'=>$post['carpet_area'],
                                 'carpet_area_unit'=>$post['carpet_area_unit'],
                                 'office_number'=>$post['office_number'],
                                 'floor'=>$post['floor'],
                                 'block_number'=>$post['block_number'],
                                 'total_floor'=>$post['total_floor'],
                                 'number_of_cabin'=>$post['number_of_cabin'],
                                 'number_of_work_station'=>$post['number_of_work_station'],
                                 'pentry'=>$post['pentry'],
                                 'use_for'=>$post['use_for'],
                                 'bathroom'=>$post['bathroom'],
                                 'ac'=>$post['ac'],
                                 'possession'=>$post['possession'],
                                 'possession_date'=>date('Y-m-d', strtotime($post['possession_date'])),
                                 'open_parking'=>$post['open'],
                                 'covered_parking'=>$post['covered'],
                                 'basment_parking'=>$post['basement'],
                                 'lift_parking'=>$post['lift_parking'],
                                 'age_of_properties'=>$post['age_of_properties'],
                                 'power_backup'=>!empty($post['power_backup']) ? $post['power_backup'] : '',
                                 'description'=>$post['description'],
                                 'video'=>$post['video'],
                                 'image'=>$file_name,
                             );
            $result = $this->Common_model->update($insert_data, array('shop_id'=>$shop_id), 'shop_rent_commercial');  
            if($result){
                $this->session->set_flashdata('success', 'Data Updated Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Updated!');
            }      
        }
        redirect('backend/shop');
    }

    function delete_shop($shop_id){
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('shop_id'=>$shop_id),'shop_rent_commercial'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Deleted!');
        }
        redirect('backend/shop');
    }

    function warehouse()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/warehouse', $data);
    }

    function duplex_flat()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/duplex_flat', $data);
    }

    function pent_house()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/pent_house', $data);
    }

    function flat()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/flat', $data);
    }

    function house()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/house', $data);
    }

    function stock_factory_buyer()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_factory_buyer', $data);
    }

    function stock_land_buyer()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_land_buyer', $data);
    }

    function stock_office_buyer()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_office_buyer', $data);
    }

    function stock_shop_buyer()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_shop_buyer', $data);
    }

    function stock_warehouse_buyer()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_warehouse_buyer', $data);
    }

    function stock_factory_rent()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_factory_rent', $data);
    }

    function stock_land_rent()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_land_rent', $data);
    }

    function stock_office_rent()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_office_rent', $data);
    }

    function stock_shop_rent()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_shop_rent', $data);
    }

    function stock_warehouse_rent()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_warehouse_rent', $data);
    }

    function onprocess()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/onprocess', $data);
    }

    function change_password()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/change_password', $data);
    }
    
    function admin_profile()
    {
        $data = $this->commonpage_data();
        $data['admin'] =  $this->Common_model->getdata(array('user_id'=> $this->admin_id ), 'admin_users');
        $this->BackendView('admin/admin_profile', $data);
    }
    
    function duplex_flat_buyer()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/duplex_flat_buyer', $data);
    }

    function pent_house_buyer()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/pent_house_buyer', $data);
    }

    function stock_flat_buyer()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_flat_buyer', $data);
    }

    function stock_house_buyer()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_house_buyer', $data);
    }

    function stock_land_buyer_residential()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_land_buyer_residential', $data);
    }

    function duplex_flat_rent_residential()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/duplex_flat_rent_residential', $data);
    }

    function pent_house_rent_residential()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/pent_house_rent_residential', $data);
    }

    function stock_flat_rent_residential()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_flat_rent_residential', $data);
    }

    function stock_house_rent_residential()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_house_rent_residential', $data);
    }

    function stock_land_rent_residential()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/stock_land_rent_residential', $data);
    }
    
    function list_testimonials()
    {
        $data = $this->commonpage_data();
        $data['list_testimonials'] = $this->Common_model->getdata(array('is_deleted'=>0), 'testimonials');
        $this->BackendView('admin/list_testimonials', $data);
    }
    
    function save_testimonial()
    {
        $post = $this->input->post();
        // pre($_FILES['image']);
        $id = $post['id'];
        
        if(!empty($_FILES['image'])){
            $random_name = rand(10000,999999);
            if (!is_dir('./Uploads/testimonial_image/')) 
            {
                mkdir('./Uploads/testimonial_image/', 0777, TRUE);
            }
            $config['upload_path']          = './Uploads/testimonial_image';
            $config['file_name']            = $random_name;
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image'))
            {                    
                $upload_data = $this->upload->data();
                $file_name = "Uploads/testimonial_image/".$upload_data['file_name'];
            }
            else
            {
                // echo $this->upload->display_errors();
                $file_name = $post['prev_image'];
            }   
        }else
            {
                $file_name = $post['prev_image'];
            }
        if($id == 0){
            $insert_data = array('type'=>$post['type'],'by'=>$post['by'],'desc'=>$post['desc'],'img'=>$file_name, 'created'=>date('Y-m-d H:i:s'));
            $result = $this->Common_model->insert_data('testimonials',$insert_data);  
            if($result){
                $this->session->set_flashdata('success', 'Data Saved Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Saved!');
            }  
        }else{
            $update_data = array('type'=>$post['type'],'by'=>$post['by'],'desc'=>$post['desc'],'img'=>$file_name);
            $result =$this->Common_model->update($update_data, array('id'=>$id), 'testimonials');  
            if($result){
                $this->session->set_flashdata('success', 'Data updated Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not updated!');
            }  
        }
        
        redirect('backend/list_testimonials');
    }
    
    public function delete_testimonial($id){
        $update_data = array('is_deleted'=>1);
        $result =$this->Common_model->update($update_data, array('id'=>$id), 'testimonials');  
        if($result){
            $this->session->set_flashdata('success', 'Record deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not deleted!');
        }
        redirect('backend/list_testimonials');
    }
    
    public function get_testimonial(){
        $post = $this->input->post();
        $result = $this->Common_model->getdatabyid(array('id'=>$post['id']), 'testimonials'); 
        echo json_encode($result);
    }
    
    function list_contact_us()
    {
        $data = $this->commonpage_data();
        $data['contact_us'] = $this->Common_model->getdata(array('is_deleted' => 0), 'contact_us');
        // pre($data['contact_us']);
        $this->BackendView('admin/list_contact_us', $data);
    }

    function list_state()
    {
        $data = $this->commonpage_data();
        $data['list_state'] = $this->Common_model->getdata(array('is_deleted'=>0, 'country_id'=>101), 'state');
        $this->BackendView('admin/list_state', $data);
    }
    
    function state_status($status, $id){
        $result = $this->Common_model->update(array('status'=> $status), array('id'=>$id),'state'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Updated!');
        }
        redirect('backend/list_state');
    }
    
    function city_status($status, $id){
        $result = $this->Common_model->update(array('status'=> $status), array('id'=>$id),'city'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Updated!');
        }
        redirect('backend/list_city');
    }
    
    function save_state()
    {
        $post = $this->input->post();
        $id = $post['id'];
        
        if($id == 0){
            $insert_data = array('name'=>$post['name'],'country_id'=>101);
            $result = $this->Common_model->insert_data('state',$insert_data);  
            if($result){
                $this->session->set_flashdata('success', 'Data Saved Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Saved!');
            }  
        }else{
            $update_data = array('name'=>$post['name']);
            $result =$this->Common_model->update($update_data, array('id'=>$id), 'state');  
            if($result){
                $this->session->set_flashdata('success', 'Data updated Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not updated!');
            }  
        }
        
        redirect('backend/list_state');
    }
    
    public function delete_state($id){
        $update_data = array('is_deleted'=>1);
        $result =$this->Common_model->update($update_data, array('id'=>$id), 'state');  
        if($result){
            $this->session->set_flashdata('success', 'Record deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not deleted!');
        }
        redirect('backend/list_state');
    }
    
     public function delete_location($id){
        $update_data = array('is_deleted'=>1);
        $result =$this->Common_model->update($update_data, array('id'=>$id), 'location');  
        if($result){
            $this->session->set_flashdata('success', 'Record deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not deleted!');
        }
        redirect('backend/list_location');
    }
    
    function list_city()
    {
        if(!empty($this->input->post('state'))){
            $state_id = $this->input->post('state');
        }else{
            $state_id = '22';
        }
        $data = $this->commonpage_data();
        $data['list_city'] = $this->Common_model->getdata(array('is_deleted'=>0, 'state_id'=>$state_id),'city');
        $data['list_state'] = $this->Common_model->getdata(array('country_id'=>101),'state');
        $data['state_id'] = $state_id;
        $this->BackendView('admin/list_city', $data);
    }
    
    function save_city()
    {
        $post = $this->input->post();
        $id = $post['id'];
        
        if($id == 0){
            $result = $this->Common_model->getdatabyid(array('name'=>$post['name'],'is_deleted'=>0), 'city');
            if(empty($result)){
                $insert_data = array('name'=>$post['name'],'state_id'=>$post['state']);
                $result = $this->Common_model->insert_data('city',$insert_data);  
                if($result){
                    $this->session->set_flashdata('success', 'Data Saved Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not Saved!');
                } 
            }else{
                $this->session->set_flashdata('error', 'Data already exists!');
            }
        }else{
            $update_data = array('name'=>$post['name'],'state_id'=>$post['state']);
            $result =$this->Common_model->update($update_data, array('id'=>$id), 'city');  
            if($result){
                $this->session->set_flashdata('success', 'Data updated Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not updated!');
            }  
        }
        
        redirect('backend/list_city');
    }
    
    public function delete_city($id){
        $update_data = array('is_deleted'=>1);
        $result =$this->Common_model->update($update_data, array('id'=>$id), 'city');  
        if($result){
            $this->session->set_flashdata('success', 'Record deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not deleted!');
        }
        redirect('backend/list_city');
    }
 
    function list_get_in_touch()
    {
        $data = $this->commonpage_data();
        $data['list_get_in_touch'] = $this->Common_model->getdata(array(),'get_in_touch');
        $this->BackendView('admin/list_get_in_touch', $data);
    }
    
    
    function list_post_requirement()
    {
        $data = $this->commonpage_data();
        $data['list_post_requirements'] = $this->Common_model->getdata(array(),'post_requirement');
        $this->BackendView('admin/list_post_requirement', $data);
    }
    
    function list_home_loans()
    {
        $data = $this->commonpage_data();
        $data['list_home_loans'] = $this->Common_model->getdata(array(),'home_loan');
        $this->BackendView('admin/list_home_loans', $data);
    }
    
    function view_requirement_locations()
    {
        $data = $this->commonpage_data();
        $id = $this->input->post('id');
        $res = $this->Common_model->getdata(array('requirement_id'=>$id),'post_requirement_locations');
        if(!empty($res)){ ?><ul>
        <?php foreach($res as $row){ ?>
                <li><?php echo $row->location; ?></li>
        <?php } ?>
            </ul>
        <?php }else{ ?>
            <h3>No more locations..</h3>
        <?php }
    }
    
    function add_subelement()
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('is_deleted' => 0),'tblSubElements');
        $this->BackendView('admin/list_subelement', $data);
    }

    function save_subemelement()
    {
        $form_data = $this->input->post(array('name', 'desc'));
        $insert_data = array('name' => $form_data['name'], 'details' => $form_data['desc'], 'addedAt'=>date('Y-m-d H:i:s'));
        $result = $this->Common_model->insert_data('tblSubElements',$insert_data);  
        if($result){$this->session->set_flashdata('success', 'Data Saved Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Saved!');} 
        redirect('backend/add_subelement');
    }

    function delete_subelement($id)
    {
        $result =$this->Common_model->update(array('is_deleted' => 1, 'updatedAt' => date('Y-m-d H:i:s')), array('id'=>$id), 'tblSubElements');  
        if($result){$this->session->set_flashdata('success', 'Record deleted Successfully!');}
        else{$this->session->set_flashdata('error', 'Record Not deleted!');}
        redirect('backend/add_subelement');
    }

    function package()
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('is_deleted' => 0, 'status' => 1),'subscriptions');
        $this->BackendView('admin/list_active_subscriptions', $data);
    }
    
    function inactive_subscriptions()
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('is_deleted' => 0, 'status' => 0),'subscriptions');
        $this->BackendView('admin/list_inactive_subscriptions', $data);
    }
    
    function subscriber()
    {
        $data = $this->commonpage_data();
        $data['sub'] = $this->Common_model->get_subscriber_data();
        $this->BackendView('admin/subscriber', $data);
    }
    
    function package_intersted()
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('is_deleted' => 0, 'status' => 0),'subscriptions');
        $this->BackendView('admin/package_intersted', $data);
    }
    
    function package_total_collection()
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('is_deleted' => 0, 'status' => 0),'subscriptions');
        $this->BackendView('admin/package_total_collection', $data);
    }
    
    function package_payments()
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('is_deleted' => 0, 'status' => 0),'subscriptions');
        $this->BackendView('admin/package_payments', $data);
    }
    
    function add_subscriptions()
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('is_deleted' => 0),'tblSubElements');
        $this->BackendView('admin/add_subscriptions', $data);
    }
    
    function save_subscription()
    {
        $form_data = $this->input->post(array('name', 'user_type', 'purpose', 'validity', 'listings', 'oldprice', 'price', 'subElements'));
        $insert_data = array('name' => $form_data['name'], 'user_type'=>$form_data['user_type'],'purpose'=>$form_data['purpose'], 
        'subElements' => implode(',', $form_data['subElements']), 'validity'=>$form_data['validity'], 'listings' => $form_data['listings'], 
        'price' => $form_data['price'], 'oldPrice' => $form_data['oldprice'], 'created_at'=>date('Y-m-d H:i:s'));
        $result = $this->Common_model->insert_data('subscriptions',$insert_data);  
        if($result){$this->session->set_flashdata('success', 'Data Saved Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Saved!');} 
        redirect('backend/package');
    }
    
    function edit_subscription($id)
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('id' => $id),'subscriptions');
        $data['subElements'] = $this->Common_model->getdata(array('is_deleted' => 0),'tblSubElements');
        $this->BackendView('admin/edit_subscriptions', $data);
    }
    
    function upate_subscription()
    {
        $form_data = $this->input->post(array('name', 'id', 'user_type', 'details', 'purpose', 'validity', 'listings', 'oldprice', 'price', 'subElements'));
        $insert_data = array('name' => $form_data['name'], 'details' => $form_data['details'], 'user_type'=>$form_data['user_type'],'purpose'=>$form_data['purpose'],
        'validity'=>$form_data['validity'], 'listings' => $form_data['listings'], 'subElements' => implode(',', $form_data['subElements']), 'oldPrice' => $form_data['oldprice'], 'price' => $form_data['price'], 'modified_at'=>date('Y-m-d H:i:s'));
        
        $result =$this->Common_model->update($insert_data, array('id'=>$form_data['id']), 'subscriptions');  
        if($result){$this->session->set_flashdata('success', 'Data Saved Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Saved!');} 
        redirect('backend/package');
    }
    
    function delete_subscription($id)
    {
        $result =$this->Common_model->update(array('is_deleted' => 1), array('id'=>$id), 'subscriptions');  
        if($result){$this->session->set_flashdata('success', 'Record deleted Successfully!');}
        else{$this->session->set_flashdata('error', 'Record Not deleted!');}
        redirect('backend/package');
    }
    
    function coupons()
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('is_deleted' => 0, 'status' => 0),'coupons');
        $this->BackendView('admin/coupons/coupons', $data);
    }

    function save_coupon()
    {
        $form_data = $this->input->post(array('name', 'discount'));
        $insert_data = array('coupon' => $form_data['name'], 'discount'=>$form_data['discount'], 'createdAt'=>date('Y-m-d H:i:s'));
        $result = $this->Common_model->insert_data('coupons',$insert_data);  
        if($result){$this->session->set_flashdata('success', 'Data Saved Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Saved!');} 
        redirect('backend/coupons');
    }

    function delete_coupon($id)
    {
        $result =$this->Common_model->update(array('is_deleted' => 1), array('id'=>$id), 'coupons');  
        if($result){$this->session->set_flashdata('success', 'Record deleted Successfully!');}
        else{$this->session->set_flashdata('error', 'Record Not deleted!');}
        redirect('backend/coupons');
    }
    function sendsms($number, $message_body, $return = '0') {

        $sender = 'SEDEMO'; // Can be customized
        
        $smsGatewayUrl = 'http://springedge.com';
        
        $apikey = '62q3xxxxxxxxxxxxxxxxxxxxxx'; // Need to change
        
        $textmessage = urlencode($textmessage);
        
        $api_element = '/api/web/send/';
        
        $api_params = $api_element.'?apikey='.$apikey.'&sender='.$sender.'&to='.$number.'&message='.$textmessage;
        $smsgatewaydata = $smsGatewayUrl.$api_params;
        
        $url = $smsgatewaydata;
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_POST, false);
        
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); $output = curl_exec($ch);
        
        curl_close($ch);
        
        if(!$output){ $output = file_get_contents($smsgatewaydata); }
        
        if($return == '1'){ return $output; }else{ echo "Sent"; }

        }
        
        function address_contact_details()
        {
            $data = $this->commonpage_data();
            $data['tab'] = $this->Common_model->getdata(array('id' => 1),'address_contact_config');
            $this->BackendView('admin/contact_address_details', $data);
        }
        
        function update_address_contact_details()
        {
            $form_data = $this->input->post(array('name', 'mobile1', 'mobile2', 'mobile3', 'email1', 'email2', 'email3', 'address1', 'address2', 'address3'));
            $insert_data = array('name' => $form_data['name'], 'mobile1' => $form_data['mobile1'], 'mobile2' => $form_data['mobile2'], 'mobile3' => $form_data['mobile3'], 
            'email1' => $form_data['email1'], 'email2' => $form_data['email2'], 'email3' => $form_data['email3'], 'address1' => $form_data['address1'], 
            'address2' => $form_data['address2'], 'address3' => $form_data['address3']);
            
            $result = $this->Common_model->update($insert_data, array('id'=> 1), 'address_contact_config');  
            if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
            else{$this->session->set_flashdata('error', 'Data Not Updated!');}
            redirect('backend');
        }
        
        function update_terms()
        {
            $terms = $this->input->post('terms');
            $result = $this->Common_model->update(array('terms' => $terms), array('id'=> 1), 'address_contact_config');
            
            if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
            else{$this->session->set_flashdata('error', 'Data Not Updated!');}
            redirect('backend/address_contact_details');
        }
        
        function policy()
        {
            $policy = $this->input->post('policy');
            $result = $this->Common_model->update(array('policy' => $policy), array('id'=> 1), 'address_contact_config');
            
            if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
            else{$this->session->set_flashdata('error', 'Data Not Updated!');}
            redirect('backend/address_contact_details');
        }
        
        function disclaimer()
        {
            $disclaimer = $this->input->post('disclaimer');
            $result = $this->Common_model->update(array('disclaimer' => $disclaimer), array('id'=> 1), 'address_contact_config');
            
            if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
            else{$this->session->set_flashdata('error', 'Data Not Updated!');}
            redirect('backend/address_contact_details');
        }
        
        function active_city($id){
            $result =$this->Common_model->update(array('status' => 1), array('id'=>$id), 'city');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_city');
        }
        
        function deactive_city($id){
            $result =$this->Common_model->update(array('status' => 0), array('id'=>$id), 'city');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_city');
        }
        
        function list_location($option = '')
        {
            $data = $this->commonpage_data();
            $data['list_state'] = $this->Common_model->getdata(array('is_deleted'=>0),'state');
            if($option == 'new'){
                // $data['list_locations'] = $this->Common_model->get_location_list(array('status'=>0,'is_deleted'=>0),'location');
                $data['list_locations'] = $this->Common_model->get_location_list(array('BaseTbl.status'=>0,'BaseTbl.is_deleted'=>0));
            }else{
                $data['list_locations'] = $this->Common_model->get_location_list(array('BaseTbl.is_deleted'=>0));
            }
            
            // $data['list_state'] = $this->Common_model->getdata(array('country_id'=>101),'state');
            $this->BackendView('admin/list_locations', $data);
        }
        
        function save_location()
        {
            $post = $this->input->post();
            $id = $post['id'];
            
            if($id == 0){
                $insert_data = array('name'=>$post['name'], 'pincode_id'=>$post['pincode']);
                $result = $this->Common_model->insert_data('location',$insert_data);  
                if($result){
                    $this->session->set_flashdata('success', 'Data Saved Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not Saved!');
                }  
            }else{
                $update_data = array('name'=>$post['name'], 'pincode_id'=>$post['pincode']);
                $result =$this->Common_model->update($update_data, array('id'=>$id), 'location');  
                if($result){
                    $this->session->set_flashdata('success', 'Data updated Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not updated!');
                }  
            }
            
            redirect('backend/list_location');
        }
        
        function active_location($id){
            $result =$this->Common_model->update(array('status' => 1), array('id'=>$id), 'location');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_location');
        }
        
        function deactive_location($id){
            $result =$this->Common_model->update(array('status' => 2), array('id'=>$id), 'location');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_location');
        }
        
        
        //Complex Society
        function list_society($option = '')
        {
            $data = $this->commonpage_data();
            $data['list_state'] = $this->Common_model->getdata(array('is_deleted'=>0),'state');
            if($option == 'new'){
                // $data['list_society'] = $this->Common_model->getdata(array('status'=>0,'is_deleted'=>0),'society');
                $data['list_society'] = $this->Common_model->get_society_list(array('BaseTbl.status'=>0,'BaseTbl.is_deleted'=>0),'society');
            }else{
                // $data['list_society'] = $this->Common_model->getdata(array('is_deleted'=>0),'society');
                $data['list_society'] = $this->Common_model->get_society_list(array('BaseTbl.is_deleted'=>0),'society');
            }
            // $data['list_state'] = $this->Common_model->getdata(array('country_id'=>101),'state');
            $this->BackendView('admin/list_society', $data);
        }
        
        function save_society()
        {
            $post = $this->input->post();
            $id = $post['id'];
            
            if($id == 0){
                $insert_data = array('name'=>$post['name'],'location_id'=>$post['location'], 'created'=>date('Y-m-d H:i:s'));
                $result = $this->Common_model->insert_data('society',$insert_data);  
                if($result){
                    $this->session->set_flashdata('success', 'Data Saved Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not Saved!');
                }  
            }else{
                $update_data = array('name'=>$post['name'],'location_id'=>$post['location']);
                $result =$this->Common_model->update($update_data, array('id'=>$id), 'society');  
                if($result){
                    $this->session->set_flashdata('success', 'Data updated Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not updated!');
                }  
            }
            
            redirect('backend/list_society');
        }
        
        function active_society($id){
            $result =$this->Common_model->update(array('status' => 1), array('id'=>$id), 'society');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_society');
        }
        
        function deactive_society($id){
            $result =$this->Common_model->update(array('status' => 2), array('id'=>$id), 'society');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_society');
        }
        
        function delete_society($id){
            $result =$this->Common_model->update(array('is_deleted' => 1), array('id'=>$id), 'society');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_society');
        }
        
        //Pincode
        function list_pincode()
        {
            $data = $this->commonpage_data();
            $data['list_state'] = $this->Common_model->getdata(array('is_deleted'=>0),'state');
            $data['list_pincode'] = $this->Common_model->get_pincode_list();
            /*pre($this->db->last_query());
            $data['list_pincode'] = $this->Common_model->getdata(array('is_deleted'=>0),'pincode');
            $data['list_pincode'] = $this->Common_model->selectquerydata("SELECT pincode.* FROM pincode LEFT JOIN city ON city.id = pincode.pincode_id AND pincode.is_deleted = 1");
            foreach($data['list_pincode'] as $i=>$pincode){
                $result = $this->Common_model->getdatabyid(array('id'=>$pincode->city_id), 'city');
                if(!empty($result)){
                    $data['list_pincode'][$i]->city_name = $result->name;
                }else{
                    $data['list_pincode'][$i]->city_name = '';
                }
            }*/
            $this->BackendView('admin/list_pincode', $data);
        }
        
        function save_pincode()
        {
            $post = $this->input->post();
            $id = $post['id'];
            // pre($post);
            if($id == 0){
                $result = $this->Common_model->getdatabyid(array('pincode'=>$post['pincode'],'is_deleted'=>0), 'pincode');
                if(empty($result)){
                    $insert_data = array('pincode'=>$post['pincode'],'city_id'=>$post['city'], 'created'=>date('Y-m-d H:i:s'));
                    $result = $this->Common_model->insert_data('pincode',$insert_data);  
                    if($result){
                        $this->session->set_flashdata('success', 'Data Saved Successfully!');
                    }else{
                        $this->session->set_flashdata('error', 'Data Not Saved!');
                    } 
                }else{
                    $this->session->set_flashdata('error', 'Data already exists!');
                }
            }else{
                $update_data = array('pincode'=>$post['pincode'],'city_id'=>$post['city']);
                $result =$this->Common_model->update($update_data, array('id'=>$id), 'pincode');  
                if($result){
                    $this->session->set_flashdata('success', 'Data updated Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not updated!');
                }  
            }
            
            redirect('backend/list_pincode');
        }
        
        /*function active_society($id){
            $result =$this->Common_model->update(array('status' => 1), array('id'=>$id), 'pincode');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_pincode');
        }
        
        function deactive_society($id){
            $result =$this->Common_model->update(array('status' => 0), array('id'=>$id), 'pincode');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_pincode');
        }*/
        
        function delete_pincode($id){
            $result =$this->Common_model->update(array('is_deleted' => 1), array('id'=>$id), 'pincode');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_pincode');
        }
        
        
        //Bank
        function list_bank()
        {
            $data = $this->commonpage_data();
            $data['list_bank'] = $this->Common_model->getdata(array('is_deleted'=>0),'bank');
            /*foreach($data['list_pincode'] as $i=>$pincode){
                $result = $this->Common_model->getdatabyid(array('id'=>$pincode->city_id), 'city');
                if(!empty($result)){
                    $data['list_pincode'][$i]->city_name = $result->name;
                }else{
                    $data['list_pincode'][$i]->city_name = '';
                }
            }*/
            $this->BackendView('admin/list_bank', $data);
        }
        
        function save_bank()
        {
            $post = $this->input->post();
            $id = $post['id'];
            
            if($id == 0){
                $insert_data = array('name'=>$post['name'], 'created'=>date('Y-m-d H:i:s'));
                $result = $this->Common_model->insert_data('bank',$insert_data);  
                if($result){
                    $this->session->set_flashdata('success', 'Data Saved Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not Saved!');
                }  
            }else{
                $update_data = array('name'=>$post['name']);
                $result =$this->Common_model->update($update_data, array('id'=>$id), 'bank');  
                if($result){
                    $this->session->set_flashdata('success', 'Data updated Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not updated!');
                }  
            }
            
            redirect('backend/list_bank');
        }
        
        function active_bank($id){
            $result =$this->Common_model->update(array('status' => 1), array('id'=>$id), 'bank');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_bank');
        }
        
        function deactive_bank($id){
            $result =$this->Common_model->update(array('status' => 2), array('id'=>$id), 'bank');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_bank');
        }
        
        function delete_bank($id){
            $result =$this->Common_model->update(array('is_deleted' => 1), array('id'=>$id), 'bank');  
            if($result){$this->session->set_flashdata('success', 'Record activated Successfully!');}
            else{$this->session->set_flashdata('error', 'Record Not activated!');}
            redirect('backend/list_bank');
        }
        
        function get_cities(){
            $result = array();
            $post = $this->input->post();
            $list_city = $this->Common_model->getdata("name LIKE '".$post['city']."%'", 'city');
            foreach($list_city as $row){
                $result[] = $row->name;
            }
            echo json_encode($result);
        }
        
        function get_city_list_by_state(){
            $post = $this->input->post();
            $list_city = $this->Common_model->getdata(array('state_id'=>$post['state'], 'is_deleted'=>0), 'city'); ?>
            <option value="">Select City</option>
       <?php     foreach($list_city as $row){ ?>
            <option value="<?=$row->id;?>"><?=$row->name;?></option>
        <?php }
        }
        
        function get_city_list_by_state_name(){
            $post = $this->input->post();
            $state = $this->Common_model->getdatabyid(array('name'=>$post['state']), 'state');
            if(!empty($state)){
            $list_city = $this->Common_model->getdata(array('state_id'=>$state->id, 'is_deleted'=>0), 'city'); ?>
            <option value="">Select City</option>
               <?php     foreach($list_city as $row){ ?>
                    <option value="<?=$row->name;?>"><?=$row->name;?></option>
                <?php }
            }
        }
        
        function get_pincode_list_by_city(){
            $post = $this->input->post();
            $list_pincode = $this->Common_model->getdata(array('city_id'=>$post['city'], 'is_deleted'=>0), 'pincode'); ?>
            <option value="">Select Pincode</option>
       <?php     foreach($list_pincode as $row){ ?>
            <option value="<?=$row->id;?>"><?=$row->pincode;?></option>
        <?php }
        }
        
        function get_pincode_list_by_city_name(){
            $post = $this->input->post();
            $city = $this->Common_model->getdatabyid(array('name'=>$post['city']), 'city');
            if(!empty($city)){
            $list_pincode = $this->Common_model->getdata(array('city_id'=>$city->id, 'is_deleted'=>0), 'pincode'); ?>
            <option value="">Select Pincode</option>
       <?php     foreach($list_pincode as $row){ ?>
            <option value="<?=$row->pincode;?>"><?=$row->pincode;?></option>
        <?php }
            }
        }
        
        function get_location_list_by_pincode(){
            $post = $this->input->post();
            $list_location = $this->Common_model->getdata(array('pincode_id'=>$post['pincode'], 'is_deleted'=>0), 'location'); ?>
            <option value="">Select Location</option>
       <?php     foreach($list_location as $row){ ?>
            <option value="<?=$row->id;?>"><?=$row->name;?></option>
        <?php }
        }
        
        function get_location_list_by_pincode_code(){
            $post = $this->input->post();
            $code = $this->Common_model->getdatabyid(array('pincode'=>$post['pincode']), 'pincode');
            if(!empty($code)){
            $list_location = $this->Common_model->getdata(array('pincode_id'=>$code->id, 'is_deleted'=>0), 'location'); ?>
            <option value="">Select Location</option>
       <?php     foreach($list_location as $row){ ?>
            <option value="<?=$row->name;?>"><?=$row->name;?></option>
        <?php }
            }
        }
        
        
        function get_location_list_by_city_name(){
            $post = $this->input->post();
            $list_location = $this->Common_model->get_location_list_by_city_name($post['city']); ?>
            <option value="">Select Location</option>
            <?php     foreach($list_location as $row){ ?>
            <option value="<?=$row->name;?>"><?=$row->name;?></option>
            <?php }
            
        }
        
        function refund()
        {
            $data = $this->commonpage_data();
            $data['tab'] = $this->Common_model->getdata(array('id' => 1),'address_contact_config');
            $this->BackendView('admin/refund', $data);
        }
        
        function save_refund()
        {
            $form_data = $this->input->post(array('about_us'));
            $result = $this->Common_model->update(array('refund' => $form_data['about_us']), array('id'=> 1), 'address_contact_config');  
            if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
            else{$this->session->set_flashdata('error', 'Data Not Updated!');}
            redirect('backend/refund');
        }
        
        function about_us()
        {
            $data = $this->commonpage_data();
            $data['tab'] = $this->Common_model->getdata(array('id' => 1),'address_contact_config');
            $this->BackendView('admin/about_us', $data);
        }
        
        function save_about_us()
        {
            $this->load->library('upload');
            $form_data = $this->input->post(array('about_us', 'about_img'));
            $random_name = rand(10000,999999);
            if(!empty($_FILES['about_img']))
            {
                if (!is_dir('./Uploads/abour_img/')) {mkdir('./Uploads/abour_img/', 0777, TRUE);}
                $config['upload_path']          = './Uploads/abour_img';
                $config['file_name']            = $random_name;
                $config['allowed_types']        = 'jpeg|jpg|png';
                
                $this->upload->initialize($config);
                if ($this->upload->do_upload('about_img'))
                {                    
                    $upload_data = $this->upload->data();
                    $image_name = "Uploads/abour_img/".$upload_data['file_name'];
                    $this->Common_model->update(array( 'about_img' => $image_name), array('id'=> 1), 'address_contact_config');  
                }
            }
            $result = $this->Common_model->update(array('about_us' => $form_data['about_us']), array('id'=> 1), 'address_contact_config');  
            if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
            else{$this->session->set_flashdata('error', 'Data Not Updated!');}
            redirect('backend/about_us');
        }
        
        //Admin Attendance 
        
        public function getAdminLeaveDetailsById(){
            //echo json_encode(array('id'=>2, 'title'=>'Test', 'description'=>'Demo'));
            $post = $this->input->post();
            $employee_id = $post['employee_id'];
            $start = $post['start'];
            $end = $post['end'];
            if($employee_id != 0){
                $result = $this->Common_model->getAdminLeaveDetailsById($employee_id, $start, $end);  
                foreach($result as $i=>$res){
                    if($res->leave_type == 'Leave'){
                        $className = 'typeLeave';
                    }elseif($res->leave_type == 'Holiday'){
                        $className = 'typeHoliday';
                    }else{
                        $className = 'typeOverDay';
                    }
                    $result[$i]->className = $className;
                }
            }else{
                $result = array();
            }
            if($result){echo json_encode($result);}
            else{echo json_encode($result);}
        }
        
        public function addAdminLeaveDetails(){
            $post = $this->input->post();
            $employee_id = $post['employee_id'];
            $leave_type = $post['leave_type'];
            $description = $post['description'];
            $start = $post['start'];
            $end = $post['end'];
            $diff = abs(strtotime($end) - strtotime($start));
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $no_of_days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $insert_data = array('employee_id'=>$employee_id, 'leave_type'=>$leave_type, 'description'=>$description, 'start'=>$start, 'end'=>$end, 'no_of_days'=>$no_of_days, 'created'=>date('Y-m-d H:i:s'));
            $result = $this->Common_model->insert_data('admin_leave_details',$insert_data);  
            if($result){echo json_encode(array('status'=>true));}
            else{echo json_encode(array('status'=>false));}
        }
        
        public function updateAdminLeaveDetails(){
            $post = $this->input->post();
            $id = $post['id'];
            $leave_type = $post['leave_type'];
            $description = $post['description'];
            $update_data = array('description'=>$description,'leave_type'=>$leave_type);
            $result = $this->Common_model->update($update_data, array('id'=>$id), 'admin_leave_details');  
            if($result){echo json_encode(array('status'=>true));}
            else{echo json_encode(array('status'=>false));}
        }
        
        public function deleteAdminLeaveDetails(){
            $post = $this->input->get();
            $id = $post['id'];
            $update_data = array('is_deleted'=>1);
            $result = $this->Common_model->update($update_data, array('id'=>$id), 'admin_leave_details');  
            if($result){echo json_encode(array('status'=>true));}
            else{echo json_encode(array('status'=>false));}
        }
        
        public function search_user_details_by_email_contact($search_value = ''){ 
            $result = array();
            $project_list = array();
            $property_list = array();
            $data = $this->Common_model->getdatabyid("`email` = '$search_value' OR `phone` = '$search_value'", 'users');
            if(!empty($data)){
                $status = $data->status == 0 ? 'Pending' : ($data->status == 1 ? 'Active' : 'Deactive'); 
                $result[] = array('user_type'=>$data->usertype, 'name'=>$data->name, 'contact1'=>$data->phone, 'contact2'=>'', 'email'=>$data->email, 'status'=>$status);
                $projectList = $this->Common_model->getdata("`user_id` = ".$data->user_id." AND (`user_type` = 'Owner' OR `user_type` = 'Builder' OR `user_type` = 'Agent') AND is_deleted = 0",'post_project');
                $propertyList = $this->Common_model->getpropertydata("`user_id` = ".$data->user_id." AND (`user_type` = 'Owner' OR `user_type` = 'Builder' OR `user_type` = 'Agent') AND is_deleted = 0",'post_property');
                // pre($project_list);
                foreach($projectList as $list){
                    $project_list[] = $list;
                }
                foreach($propertyList as $list){
                    $property_list[] = $list;
                }
            }
            $data = $this->Common_model->getdatabyid("`email` = '$search_value' OR `phone` = '$search_value' OR `alt_mobile` = '$search_value'", 'lead_partners');
            if(!empty($data)){
                $status = $data->status == 0 ? 'Pending' : ($data->status == 1 ? 'Active' : 'Deactive'); 
                $result[] = array('user_type'=>'Lead Partner', 'name'=>$data->name, 'contact1'=>$data->phone, 'contact2'=>$data->alt_mobile, 'email'=>$data->email, 'status'=>$status);
                $projectList = $this->Common_model->getdata("`user_id` = ".$data->user_id." AND `user_type` = 'lead_partners' AND is_deleted = 0",'post_project');
                $propertyList = $this->Common_model->getdata("`user_id` = ".$data->user_id." AND `user_type` = 'lead_partners' AND is_deleted = 0",'post_property');
                foreach($projectList as $list){
                    $project_list[] = $list;
                }
                foreach($propertyList as $list){
                    $property_list[] = $list;
                }
            }
            $data = $this->Common_model->getdatabyid("`email` = '$search_value' OR `phone` = '$search_value'", 'get_in_touch');
            if(!empty($data)){
                $status = ''; 
                $result[] = array('user_type'=>'Get In Touch Enquiry', 'name'=>'', 'contact1'=>$data->phone, 'contact2'=>'', 'email'=>$data->email, 'status'=>$status);
            }
            $data = $this->Common_model->getdatabyid("`email` = '$search_value' OR `mobile` = '$search_value' OR `mobile2` = '$search_value'", 'home_loan');
            if(!empty($data)){
                $status = $data->status == 0 ? 'Pending' : ($data->status == 1 ? 'Active' : 'Deactive');  
                $result[] = array('user_type'=>'Home Loan Request', 'name'=>$data->name, 'contact1'=>$data->mobile, 'contact2'=>$data->mobile2, 'email'=>$data->email, 'status'=>$status);
            }
            $data = $this->Common_model->getdatabyid("`email` = '$search_value'", 'property_contact_form');
            if(!empty($data)){
                $status = ''; 
                $result[] = array('user_type'=>'Property Contact', 'name'=>$data->full_name, 'contact1'=>'', 'contact2'=>'', 'email'=>$data->email, 'status'=>$status);
            }
            $data = $this->Common_model->getdatabyid("`mobile` = '$search_value' OR `mobile1` = '$search_value' OR `email` = '$search_value' OR `phone` = '$search_value'", 'post_property');
            if(!empty($data)){
                $status = $data->status == 0 ? 'Pending' : ($data->status == 1 ? 'Active' : 'Deactive');  
                $result[] = array('user_type'=>'Seller', 'name'=>$data->name, 'contact1'=>$data->mobile, 'contact2'=>$data->mobile1, 'email'=>$data->email, 'status'=>$status);
            }
            $data = $this->Common_model->getdatabyid("`mobile` = '$search_value' OR `mobile2` = '$search_value' OR `email` = '$search_value' OR `phone` = '$search_value'", 'post_requirement');
            if(!empty($data)){
                $status = $data->status == 0 ? 'Pending' : ($data->status == 1 ? 'Active' : 'Deactive');  
                $result[] = array('user_type'=>'Buyer', 'name'=>$data->name, 'contact1'=>$data->mobile, 'contact2'=>$data->mobile2, 'email'=>$data->email, 'status'=>$status);
            }
            $userProperty = $this->Common_model->getpropertydata("`mobile` = '$search_value' OR `mobile1` = '$search_value' OR `email` = '$search_value' OR `phone` = '$search_value'", 'post_property');
            foreach($userProperty as $property)
            {
                $property_list[] = $property;
            }
            // pre($property_list);
            return array('result'=>$result, 'project_list'=>$project_list, 'property_list'=>$property_list);
        }
        
        
        //States,City,Pincode, Locations, Complex
         function get_all_states(){
            $result = array();
            $list_location = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
            foreach($list_location as $row){
                $result[] = $row->name;
            }
            echo json_encode($result);
        }
        
        function get_all_cities_by_state(){
            $result = array();
            $post = $this->input->post();
            $list_location = $this->Common_model->get_cities_by_state($post['state']);
            foreach($list_location as $row){
                $result[] = $row->name;
            }
            echo json_encode($result);
        }
        function get_all_pincode_list_by_city_name(){
            $result = array();
            $post = $this->input->post();
            $list_pincode = $this->Common_model->get_all_pincode_list_by_city_name($post['city']);
            foreach($list_pincode as $row){
                $result[] = $row->pincode;
            }
            echo json_encode($result);
        }
        function get_all_location_list_by_pincode_code(){
            $result = array();
            $post = $this->input->post();
            $code = $this->Common_model->getdatabyid(array('pincode'=>$post['pincode']), 'pincode');
            if(!empty($code)){
                $list_location = $this->Common_model->getdata(array('pincode_id'=>$code->id, 'is_deleted'=>0), 'location');
                foreach($list_location as $row){
                    $result[] = $row->name;
                }
            }
            echo json_encode($result);
        }
        
        function get_all_society_list_by_location(){
            $result = array();
            $post = $this->input->post();
            $code = $this->Common_model->getdatabyid(array('name'=>$post['location']), 'location');
            if(!empty($code)){
                $list_society = $this->Common_model->getdata(array('location_id'=>$code->id, 'is_deleted'=>0), 'society');
                foreach($list_society as $row){
                    $result[] = $row->name;
                }
            }
            echo json_encode($result);
        }
        
        function get_location(){
            $result = array();
            $post = $this->input->post();
            $list_location = $this->Common_model->getdata(array("name LIKE '".$post['location']."%'"), 'location');
            foreach($list_location as $row){
                $result[] = $row->name;
            }
            echo json_encode($result);
        }
        
       
        
        function get_complex(){
            $result = array();
            $post = $this->input->post();
            $list_complex = $this->Common_model->getdata(array("name LIKE '".$post['complex']."%'"), 'society');
            foreach($list_complex as $row){
                $result[] = $row->name;
            }
            echo json_encode($result);
        }
        
        
        //Admin
        
        function admin_attendance(){
            $data = $this->commonpage_data();
            $post = $this->input->post();
            $data['admin_list'] = $this->Common_model->getdata(array('is_deleted' => 0), 'admin_users');
            if(!empty($post['adate'])){ 
                $year = date('Y', strtotime($post['adate']));
                $month = date('m', strtotime($post['adate']));
            }else{
                $year = date('Y');
                $month = date('m');
            } 
            $data['month'] = $month;
            $data['year'] = $year;
            // echo $date =$this->dayCount("Sunday", $month, $year)."<br/>"; 
            // echo $date =$this->dayCount("Monday", $month, $year)."<br/>"; 
            // echo $date =$this->dayCount("Tuesday", $month, $year)."<br/>"; 
            // echo $date =$this->dayCount("Wednesday", $month, $year)."<br/>"; 
            // echo $date =$this->dayCount("Thursday", $month, $year)."<br/>"; 
            // echo $date =$this->dayCount("Friday", $month, $year)."<br/>"; 
            // echo $date =$this->dayCount("Saturday", $month, $year)."<br/>"; 
            // pre($date);
            // exit;
            $start = date('Y-m-01', strtotime($year.'-'.$month));
            $end = date('Y-m-t');
            $total_sundays = $this->total_sunday($month, $year);
            $result = array();
            if(!empty($data['admin_list'])){
                foreach($data['admin_list'] as $row){
                    $admin = $row->user_id;
                    $weekly_off = $row->weekly_offs;
                    $weekly_off_days =$this->dayCount($weekly_off, $month, $year); 
                    $weekly_off_used_days =$this->weekly_off_used_days($weekly_off, $admin, $month, $year); 
                    $leaves = $this->Common_model->getAdminAttendanceById($month, $year, $row->user_id);  
                    // $leaves = $this->Common_model->getAdminLeaveDetailsById($row->user_id, $start, $end);  
                    $holidays = $this->Common_model->getAdminHolidayCountByStartEnd($start, $end);  
                    $holidays_used = $this->getAdminHolidayUsedCount($admin, $start, $end);  
                    $over_days = $this->Common_model->getAdminOverDayCount($month, $year, $row->user_id);  
                    // pre($leaves);
                    $no_of_leaves = !empty($leaves->no_of_days) ? $leaves->no_of_days : 0;
                    $holidays = !empty($holidays->no_of_days) ? $holidays->no_of_days : 0;
                    $over_days = !empty($over_days->no_of_days) ? $over_days->no_of_days : 0;
                    $working = date('t') - ($total_sundays + $no_of_leaves + $no_of_leaves);
                    /*$admin = array('id'=>$row->user_id, 
                    'name'=>$row->name, 'month_year'=>$month.'/'.$year,'days'=>date('t'), 'w_holiday'=>$weekly_off_days, 'w_h_use'=>($weekly_off_days - $weekly_off_used_days), 'holiday'=>$holidays, 'h_use'=>$holidays_used, 'leave'=>$no_of_leaves, 'over_day'=>$$over_days, 'effect'=>'', 'working'=>$working); */
                    $admin = array('id'=>$row->user_id, 
                    'name'=>$row->name, 'month_year'=>$month.'/'.$year,'days'=>date('t'), 'w_holiday'=>$weekly_off_days, 'w_h_use'=>($weekly_off_days - $weekly_off_used_days), 'holiday'=>$holidays, 'h_use'=>$holidays_used, 'leave'=>$no_of_leaves, 'over_day'=>$over_days, 'effect'=>'', 'working'=>$working);
                    
                    $result[] = $admin;
                }
            }
            $data['attendance_result'] = $result;
            $this->BackendView('admin/admin_attendance', $data);
        }
        
        
        function admin_perfomance(){
            $data = $this->commonpage_data();
            $post = $this->input->post();
            $data['users'] = $this->Common_model->getdata(array('is_deleted' => 0), 'admin_users');
            $data['admin_list'] = $this->Common_model->getdata(array('is_deleted' => 0), 'admin_users');
            if(!empty($post['adate'])){ 
                $year = date('Y', strtotime($post['adate']));
                $month = date('m', strtotime($post['adate']));
            }else{
                $year = date('Y');
                $month = date('m');
            } 
            $data['month'] = $month;
            $data['year'] = $year;
            $from_date = date('Y-m-01');
            $to_date = date('Y-m-t');
            $result = array();
            if(!empty($data['admin_list'])){
                foreach($data['admin_list'] as $row){
                    $admin_id = $row->user_id;
                    $sellerA = $this->Common_model->count("(`user_id` = $admin_id AND `user_type` = 'admin') OR (`admin_id` =  $admin_id) AND `is_deleted` = 0", 'post_property', 'post_id');
                    $buyerA = $this->Common_model->count("(`user_id` = $admin_id AND `user_type` = 'admin') OR (`admin_id` =  $admin_id) AND `is_deleted` = 0", 'post_requirement', 'post_id');
                    $lead_partnersA = $this->Common_model->count("`admin_id` =  $admin_id AND `is_deleted` = 0", 'lead_partners', 'user_id');
                    $builderA = $this->Common_model->count("`admin_id` =  $admin_id AND `usertype` = 'Builder' AND `is_deleted` = 0", 'users', 'user_id');
                    $agentA = $this->Common_model->count("`admin_id` =  $admin_id AND `usertype` = 'Agent' AND `is_deleted` = 0", 'users', 'user_id');
                    $ownerA = $this->Common_model->count("`admin_id` =  $admin_id AND `usertype` = 'Owner' AND `is_deleted` = 0", 'users', 'user_id');
                    $closedA = $this->Common_model->count("`status` =  'Closed' AND (`executive` = $admin_id OR `caller` = $admin_id) AND (`created` BETWEEN '$from_date' AND '$to_date')", 'property_interested_details', 'id');
                    $in_processA = $this->Common_model->count("`status` =  'In Process' AND (`executive` = $admin_id OR `caller` = $admin_id) AND (`created` BETWEEN '$from_date' AND '$to_date')", 'property_interested_details', 'id');
                    $verifyProperty = $this->Common_model->count("`approved_by` = $admin_id AND (`created` BETWEEN '$from_date' AND '$to_date')", 'post_property', 'post_id');
                    $verifyProject = $this->Common_model->count("`approved_by` = $admin_id AND (`created` BETWEEN '$from_date' AND '$to_date')", 'post_project', 'post_id');
                    $performance = $this->Common_model->getadminperformancebyidmonthyear($row->user_id, $month, $year);
                    $seller = !empty($sellerA) ? $sellerA->count : 0;
                    $buyer = !empty($buyerA) ? $buyerA->count : 0;
                    $lead_partners = !empty($lead_partnersA) ? $lead_partnersA->count : 0;
                    $builder = !empty($builderA) ? $builderA->count : 0;
                    $agent = !empty($agentA) ? $agentA->count : 0;
                    $owner = !empty($ownerA) ? $ownerA->count : 0;
                    $closed = !empty($closedA) ? $closedA->count : 0;
                    $in_process = !empty($in_processA) ? $in_processA->count : 0;
                    $verify = (!empty($verifyProject) ? $verifyProject->count : 0) + (!empty($verifyProperty) ? $verifyProperty->count : 0);
                    $achieved_amount = 0;
                    $target = !empty($row->target) ? $row->target : 0;
                    if(!empty($performance)){
                        foreach($performance as $r){
                            if($r->executive == $row->user_id){
                                $achieved_amount+=$r->executive_commission;
                            }
                            if($r->caller == $row->user_id){
                                $achieved_amount+=$r->caller_commision;
                            }
                        }
                    }
                    if($achieved_amount < $target){
                        $status = ($achieved_amount - $target);
                        $status = ($status - $row->remaining_target);
                    }else{
                        $status = ($achieved_amount - $target);
                        if($row->remaining_target < 0)
                        $status = ($status + $row->remaining_target);
                    }
                    
                    
                    $admin = array('id'=>$row->user_id, 
                    'name'=>$row->name, 'month_year'=>$month.'/'.$year,'salary'=>$row->sallery, 'target'=>$row->target, 'achieved'=>$achieved_amount, 'status'=>$status, 'lead_partners'=>$lead_partners, 'builder'=>$builder, 'agent'=>$agent, 'owner'=>$owner, 'seller'=>$seller, 'buyers'=>$buyer, 'closed'=>$closed, 'in_process'=>$in_process, 'verify'=>$verify);
            
                    $result[] = $admin;
                }
            }
            $graphData = array(0,0,0,0,0,0,0,0);
            if(!empty($post['admin_id'])){
                $data['admin_id'] = $post['admin_id'];
                $admin_id = $post['admin_id'];
                $sellerA = $this->Common_model->count("(`user_id` = $admin_id AND `user_type` = 'admin') OR (`admin_id` =  $admin_id) AND `is_deleted` = 0", 'post_property', 'post_id');
                $buyerA = $this->Common_model->count("(`user_id` = $admin_id AND `user_type` = 'admin') OR (`admin_id` =  $admin_id) AND `is_deleted` = 0", 'post_requirement', 'post_id');
                $lead_partnersA = $this->Common_model->count("`admin_id` =  $admin_id AND `is_deleted` = 0", 'lead_partners', 'user_id');
                $builderA = $this->Common_model->count("`admin_id` =  $admin_id AND `usertype` = 'Builder' AND `is_deleted` = 0", 'users', 'user_id');
                $agentA = $this->Common_model->count("`admin_id` =  $admin_id AND `usertype` = 'Agent' AND `is_deleted` = 0", 'users', 'user_id');
                $ownerA = $this->Common_model->count("`admin_id` =  $admin_id AND `usertype` = 'Owner' AND `is_deleted` = 0", 'users', 'user_id');
                $closedA = $this->Common_model->count("`status` =  'Closed' AND (`executive` = $admin_id OR `caller` = $admin_id) AND (`created` BETWEEN '$from_date' AND '$to_date')", 'property_interested_details', 'id');
                $in_processA = $this->Common_model->count("`status` =  'In Process' AND (`executive` = $admin_id OR `caller` = $admin_id) AND (`created` BETWEEN '$from_date' AND '$to_date')", 'property_interested_details', 'id');
                $verifyProperty = $this->Common_model->count("`approved_by` = $admin_id AND (`created` BETWEEN '$from_date' AND '$to_date')", 'post_property', 'post_id');
                $verifyProject = $this->Common_model->count("`approved_by` = $admin_id AND (`created` BETWEEN '$from_date' AND '$to_date')", 'post_project', 'post_id');
                $seller = !empty($sellerA) ? $sellerA->count : 0;
                $buyer = !empty($buyerA) ? $buyerA->count : 0;
                $lead_partners = !empty($lead_partnersA) ? $lead_partnersA->count : 0;
                $builder = !empty($builderA) ? $builderA->count : 0;
                $agent = !empty($agentA) ? $agentA->count : 0;
                $owner = !empty($ownerA) ? $ownerA->count : 0;
                $closed = !empty($closedA) ? $closedA->count : 0;
                $in_process = !empty($in_processA) ? $in_processA->count : 0;
                $verify = (!empty($verifyProject) ? $verifyProject->count : 0) + (!empty($verifyProperty) ? $verifyProperty->count : 0);
                $achieve = 0;
                foreach($performance as $r){
                    if($r->executive == $admin_id){
                        $achieve+=$r->executive_commission;
                    }
                    if($r->caller == $admin_id){
                        $achieve+=$r->caller_commision;
                    }
                }
                // $graphData = array("Achieve"=>$achieve, "Lead_Partner"=>$lead_partners,"Owner"=>$owner, "Builder"=>$builder, "Agent"=>$agent, "Seller"=>$seller, "Buyer"=>$buyer,"Closed"=>$closed , "Verify"=>$verify);
                $graphData = array($achieve,$lead_partners,$owner,$builder,$agent,$seller,$buyer,$closed,$verify);
            }
            $data['graphData'] = $graphData;
            $data['performance_list'] = $result;
            $this->BackendView('admin/admin_perfomance', $data);
        }
        
        
        
        function admin_salary(){
            $data = $this->commonpage_data();
            $post = $this->input->post();
            $data['admin_list'] = $this->Common_model->getdata(array('is_deleted' => 0), 'admin_users');
            if(!empty($post['sdate'])){ 
                $year = date('Y', strtotime($post['sdate']));
                $month = date('m', strtotime($post['sdate']));
            }else{
                $year = date('Y');
                $month = date('m');
            } 
            $data['month'] = $month;
            $data['year'] = $year;
            $result = array();
            
            if(!empty($data['admin_list'])){
                foreach($data['admin_list'] as $row){
                    $bank_name = $row->bank_name;
                    $salary = $row->sallery;
                    $per_day_salary = $salary/30;
                    $ta = $row->ta;
                    $esi = $row->esi;
                    $pf = $row->pf;
                    $p_tax = $row->p_tax;
                    $less_any = 0;
                    $add_any = 0;
                    $over_days = (0*$per_day_salary);
                    $bonus = 0;
                    $generation_flag = 0;
                    $transaction_id = '';
                    $transaction_date = date('Y-m-d');
                    $created = date('Y-m-d');
                    $salary_generation = $this->Common_model->getdatabyid(array('admin_id'=>$row->user_id, 'month_year'=>$month.'/'.$year), 'admin_salary_details'); 
                    if(!empty($salary_generation)){
                        $generation_flag = 1;
                        $transaction_id = $salary_generation->transaction_id;
                        $transaction_date = date('Y-m-d', strtotime($salary_generation->transaction_date));
                        $created = date('Y-m-d', strtotime($salary_generation->created));
                        $less_any = $salary_generation->less_any;
                        $add_any = $salary_generation->add_any;
                    }/*else{
                        
                    }*/
                    $performance = $this->Common_model->getadminperformancebyidmonthyear($row->user_id, $month, $year);
                    $achieved_amount = 0;
                    if(!empty($performance)){
                        foreach($performance as $r){
                            if($r->executive == $row->user_id){
                                $achieved_amount+=$r->executive_commission;
                            }
                            if($r->caller == $row->user_id){
                                $achieved_amount+=$r->caller_commision;
                            }
                        }
                    }
                    $incentive = ($achieved_amount*$row->after_target_payment);
                    $amount = ($salary + $incentive +$ta+$add_any+$over_days+$bonus)- ($esi+$pf+$less_any+$p_tax);
                    $over_days=$this->Common_model->getAdminOverDayCount($month, $year, $row->user_id);
                    $over_days = !empty($over_days) ? $over_days->no_of_days : 0;

                    $admin = array('id'=>$row->user_id, 
                    'name'=>$row->name, 'month_year'=>$month.'/'.$year, 
                    'salary'=>$salary, 'incentive'=>$incentive, 
                    'TA'=>$ta,'ESI'=>$esi, 'PF'=>$pf, 
                    'effect'=>'',
                    'over_day'=>$over_days,
                    'bonus'=>'',
                    'less_any'=>$less_any,
                    'add_any'=>$add_any,
                    'PT'=>$p_tax,
                    'amount'=>$amount,
                    'date'=>$created,
                    'transaction_id'=>$transaction_id, 'transaction_date'=>$transaction_date, 'generation_flag'=>$generation_flag, 'bank_name'=>$bank_name);
                    
                    $result[] = $admin;
                }
            }
            $data['admin_list'] = $result;
            $this->BackendView('admin/admin_salary', $data);
        }
        
        function total_sunday($month,$year)
        {
            $sundays=0;
            $total_days=cal_days_in_month(CAL_GREGORIAN, $month, $year);
            for($i=1;$i<=$total_days;$i++)
            if(date('N',strtotime($year.'-'.$month.'-'.$i))==7)
            $sundays++;
            return $sundays;
        }
        
        function save_admin_salary_details(){
            $post = $this->input->post();
            // pre($post);
            $insert_data = array('admin_id'=>$post['admin_id'], 'month_year'=>$post['admin_salary_month_year'], /*'add_any'=>$post['add_any'], 'less_any'=>$post['less_any'], */
            'final_amount'=>$post['admin_salary_final_amount'], 'transaction_id'=>$post['admin_salary_transaction_id'], 'transaction_date'=>date('Y-m-d', strtotime($post['admin_salary_transaction_date'])), 
            'remark'=>$post['admin_salary_remark'],'bank_name'=>$post['admin_salary_bank_name'],'advance_amount'=>$post['admin_salary_advance_amount'],'cutting_amount'=>$post['admin_salary_cutting_amount'],
            'bonus'=>$post['bonus'],'income_tax'=>$post['income_tax'],'created'=>date('Y-m-d H:i:s'));
            
            $result = $this->Common_model->insert_data('admin_salary_details',$insert_data);  
            if($result){
                $this->session->set_flashdata('success', 'Admin salary generated Successfully!');
                $row = $this->Common_model->getdatabyid(array('user_id'=>$post['admin_id']), 'admin_users'); 
                if(!empty($row)){
                    $oldAdvanceAmount = $row->advance_amount;
                    $oldBalanceAdvance = $row->balance_advance;
                    $newAdvanceAmount = $oldAdvanceAmount+$post['admin_salary_advance_amount'];

                    if($oldAdvanceAmount == 0){
                        $newBalanceAdvance = $newAdvanceAmount-$post['admin_salary_cutting_amount'];
                    }else{
                        $newBalanceAdvance = ($post['admin_salary_advance_amount']+$oldBalanceAdvance)-$post['admin_salary_cutting_amount'];
                    }
                    
                    $update_data = array('advance_amount'=>$newAdvanceAmount, 'balance_advance'=>$newBalanceAdvance, 'bank_name'=>$post['admin_salary_bank_name']);

                    $res = $this->Common_model->update($update_data, array('user_id'=>$row->user_id), 'admin_users');
                    

                    $performance = $this->Common_model->getadminperformancebyidmonthyear($row->user_id, $month, $year);
                    $status = 0;
                    $achieved_amount = 0;
                    $target = !empty($row->target) ? $row->target : 0;
                    if(!empty($performance)){
                        foreach($performance as $r){
                            if($r->executive == $row->user_id){
                                $achieved_amount+=$r->executive_commission;
                            }
                            if($r->caller == $row->user_id){
                                $achieved_amount+=$r->caller_commision;
                            }
                        }
                    }
                    if($achieved_amount < $target){
                        $status = ($achieved_amount - $target);
                        $status = ($status - $row->remaining_target);
                    }else{
                        $status = ($achieved_amount - $target);
                        if($row->remaining_target < 0)
                        $status = ($status + $row->remaining_target);
                    }
                    $res = $this->Common_model->update(array('remaining_target'=>$status), array('user_id'=>$row->user_id), 'admin_users');
                }
            }
            else{$this->session->set_flashdata('error', 'Admin salary not generated.');}
            redirect('backend/admin_salary');
        }
        
        
        //Admin Holidays
        function add_holidays(){
            $data = $this->commonpage_data();
            // $data['admin_list'] = $this->Common_model->getdata(array('is_deleted' => 0), 'admin_users'); 
            $post = $this->input->post();
            if(!empty($post['admin_id'])){ $data['admin_id'] = $post['admin_id']; }else{ $data['admin_id'] = 0; }
            $this->BackendView('admin/add_holidays', $data);
        }
        
        public function getAdminHolidayDetailsById(){
            //echo json_encode(array('id'=>2, 'title'=>'Test', 'description'=>'Demo'));
            $post = $this->input->post();
            $start = $post['start'];
            $end = $post['end'];
            //if($employee_id != 0){
                $result = $this->Common_model->getAdminHolidayDetailsById($start, $end);  
            //}else{
             //   $result = array();
            //}
            if($result){echo json_encode($result);}
            else{echo json_encode($result);}
        }
        
        public function getAdminHolidayDetailsByMonth(){
            $post = $this->input->post();
            $year = date('Y');
            $month = $post['month'];
            $start = date('Y-m-01', strtotime($year.'-'.$month.'-'.'01'));
            $end = date('Y-m-t', strtotime($start));
            $result = $this->Common_model->getAdminHolidayDetailsByMonth($start, $end);  
            if($result){echo json_encode($result);}
            else{echo json_encode($result);}
        }
        
        public function addAdminHolidayDetails(){
            $post = $this->input->post();
            $description = $post['description'];
            $start = $post['start'];
            $end = $post['end'];
            $diff = abs(strtotime($end) - strtotime($start));
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $no_of_days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $insert_data = array('description'=>$description, 'start'=>$start, 'end'=>$end, 'no_of_days'=>$no_of_days, 'created'=>date('Y-m-d H:i:s'));
            $result = $this->Common_model->insert_data('admin_holiday_details',$insert_data);  
            if($result){echo json_encode(array('status'=>true));}
            else{echo json_encode(array('status'=>false));}
        }
        
        public function updateAdminHolidayDetails(){
            $post = $this->input->post();
            $id = $post['id'];
            $description = $post['description'];
            $update_data = array('description'=>$description);
            $result = $this->Common_model->update($update_data, array('id'=>$id), 'admin_holiday_details');  
            if($result){echo json_encode(array('status'=>true));}
            else{echo json_encode(array('status'=>false));}
        }
        
        public function deleteAdminHolidayDetails(){
            $post = $this->input->get();
            $id = $post['id'];
            $update_data = array('is_deleted'=>1);
            $result = $this->Common_model->update($update_data, array('id'=>$id), 'admin_holiday_details');  
            if($result){echo json_encode(array('status'=>true));}
            else{echo json_encode(array('status'=>false));}
        }
        
        
        public function other_settings(){
            $data['details'] = $this->Common_model->getdatabyid(array('id'=>1), 'other_settings'); 
            $this->BackendView('admin/other_settings', $data);
        }
        public function update_other_settings(){
            $post = $this->input->post();
            // pre($post);
            $gst = $post['gst'];
            $cgst = $post['cgst'];
            $sgst = $post['sgst'];
            $tds = $post['tds'];
            $update_data = array('gst'=>$gst, 'cgst'=>$cgst, 'sgst'=>$sgst, 'tds'=>$tds);
            $result = $this->Common_model->update($update_data, array('id'=>1), 'other_settings');  
            if($result){$this->session->set_flashdata('success','Settings updated!');}
            else{$this->session->set_flashdata('error','Settings not updated!');}
            $data['details'] = $this->Common_model->getdatabyid(array('id'=>1), 'other_settings'); 
            redirect('backend/other_settings');
        }
        
        public function print_admin_salary_slip($admin_id, $month, $year){
            // echo $admin_id;
            ini_set("pcre.backtrack_limit", "5000000");
            $margin_left = 5;
            $margin_right = 5;
            $margin_top = 5;
            $margin_bottom = 0;
            $orientation = 'L';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->defaultfooterfontsize=9;
            $mpdf->defaultfooterfontstyle='calibri';
            $data = array();
            // $stylesheet = file_get_contents(base_url().'assets/admin/css/salarySlip.css');
            // $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

            $data['month'] = $month;
            $data['year'] = $year;
            $data['admin'] = $this->Common_model->getdatabyid(array('user_id' =>$admin_id),'admin_users');
            $data['floormantra'] = $this->Common_model->getdatabyid(array('id' =>1),'address_contact_config');
            $data['total_days'] = date('t');

            $performance = $this->Common_model->getadminperformancebyidmonthyear($admin_id, $month, $year);
            
            $achieved_amount = 0;
            if(!empty($performance)){
                foreach($performance as $r){
                    if($r->executive == $admin_id){
                        $achieved_amount+=$r->executive_commission;
                    }
                    if($r->caller == $admin_id){
                        $achieved_amount+=$r->caller_commision;
                    }
                }
            }
            $data['incentive'] = ($achieved_amount*@$data['admin']->after_target_payment);

            $data['over_days']=$this->Common_model->getAdminOverDayCount($month, $year,$admin_id);
            $data['over_days'] = !empty($data['over_days']) ? $data['over_days']->no_of_days : 0;
            $data['leaves'] = $this->Common_model->getAdminAttendanceById($month, $year, $admin_id);
            $data['leaves'] = !empty($data['leaves']) ? $data['leaves']->no_of_days : 0;
            $data['holiday'] = $this->Common_model->getAdminHolidayDayCount($month, $year, $admin_id);
            $data['holiday'] = !empty($data['holiday']) ? $data['holiday']->no_of_days : 0;

            $data['transaction_id'] = '';
            $data['transaction_date'] = '';
            $data['created'] = '';
            $data['less_any'] = '';
            $data['add_any'] = '';
            $data['final_amount'] = '';
            $data['advance_amount'] = '';
            $data['cutting_amount'] = '';
            $data['bonus'] = '';
            $data['income_tax'] = '';

            $salary_generation = $this->Common_model->getdatabyid(array('admin_id'=>$admin_id, 'month_year'=>$month.'/'.$year), 'admin_salary_details'); 
            if(!empty($salary_generation)){
                $generation_flag = 1;
                $data['transaction_id'] = $salary_generation->transaction_id;
                $data['transaction_date'] = date('Y-m-d', strtotime($salary_generation->transaction_date));
                $created = date('Y-m-d', strtotime($salary_generation->created));
                $data['less_any'] = $salary_generation->less_any;
                $data['add_any'] = $salary_generation->add_any;
                $data['final_amount'] = $salary_generation->final_amount;
                $data['advance_amount'] = $salary_generation->advance_amount;
                $data['cutting_amount'] = $salary_generation->cutting_amount;
                $data['bonus'] = $salary_generation->bonus;
                $data['income_tax'] = $salary_generation->income_tax;
            }
            // $this->load->view('admin/PaySlip', $data);
            // pre($data['admin']);
            $checklist = $this->load->view('admin/PaySlip', $data, true);
            $pdfFilePath ="salary_slip_".$admin_id.""."-".time().".pdf"; 
            $mpdf->WriteHTML($checklist, \Mpdf\HTMLParserMode::HTML_BODY);
            $mpdf->Output();
            exit;
        }
        
        
        /*public function print_admin_salary_slip($admin_id, $month, $year){
            // echo $admin_id;
            ini_set("pcre.backtrack_limit", "5000000");
            $margin_left = 5;
            $margin_right = 5;
            $margin_top = 5;
            $margin_bottom = 0;
            $orientation = 'L';
            $this->load->library('m_pdf');//load mPDF library     
            $mpdf = $this->m_pdf->load();
            $mpdf->WriteHTML(utf8_encode($content),2);
            $data = array();
            $stylesheet = file_get_contents(base_url().'assets/admin/css/salarySlip.css');
            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

            $data['month'] = $month;
            $data['year'] = $year;
            $data['admin'] = $this->Common_model->getdatabyid(array('user_id' =>$admin_id),'admin_users');
            $data['floormantra'] = $this->Common_model->getdatabyid(array('id' =>1),'address_contact_config');
            $data['total_days'] = date('t');

            $performance = $this->Common_model->getadminperformancebyidmonthyear($admin_id, $month, $year);
            
            $achieved_amount = 0;
            if(!empty($performance)){
                foreach($performance as $r){
                    if($r->executive == $admin_id){
                        $achieved_amount+=$r->executive_commission;
                    }
                    if($r->caller == $admin_id){
                        $achieved_amount+=$r->caller_commision;
                    }
                }
            }
            $data['incentive'] = ($achieved_amount*@$data['admin']->after_target_payment);

            $data['over_days']=$this->Common_model->getAdminOverDayCount($month, $year,$admin_id);
            $data['over_days'] = !empty($data['over_days']) ? $data['over_days']->no_of_days : 0;
            $data['leaves'] = $this->Common_model->getAdminAttendanceById($month, $year, $admin_id);
            $data['leaves'] = !empty($data['leaves']) ? $data['leaves']->no_of_days : 0;
            $data['holiday'] = $this->Common_model->getAdminHolidayDayCount($month, $year, $admin_id);
            $data['holiday'] = !empty($data['holiday']) ? $data['holiday']->no_of_days : 0;

            $data['transaction_id'] = '';
            $data['transaction_date'] = '';
            $data['created'] = '';
            $data['less_any'] = '';
            $data['add_any'] = '';
            $data['final_amount'] = '';
            $data['advance_amount'] = '';

            $salary_generation = $this->Common_model->getdatabyid(array('admin_id'=>$admin_id, 'month_year'=>$month.'/'.$year), 'admin_salary_details'); 
            if(!empty($salary_generation)){
                $generation_flag = 1;
                $data['transaction_id'] = $salary_generation->transaction_id;
                $data['transaction_date'] = date('Y-m-d', strtotime($salary_generation->transaction_date));
                $created = date('Y-m-d', strtotime($salary_generation->created));
                $data['less_any'] = $salary_generation->less_any;
                $data['add_any'] = $salary_generation->add_any;
                $data['final_amount'] = $salary_generation->final_amount;
                $data['advance_amount'] = $salary_generation->advance_amount;
                $data['cutting_amount'] = $salary_generation->cutting_amount;
            }
            // $this->load->view('admin/PaySlip', $data);
            // pre($data['admin']);
            $checklist = $this->load->view('admin/PaySlip', $data, true);
            $pdfFilePath ="salary_slip_".$admin_id.""."-".time().".pdf"; 
            $mpdf->WriteHTML($checklist, \Mpdf\HTMLParserMode::HTML_BODY);
            $mpdf->Output();
            exit;
        }*/

       /*public function getWednesdays($y, $m)
        {
            return new DatePeriod(
                new DateTime("first wednesday of $y-$m"),
                DateInterval::createFromDateString('next wednesday'),
                new DateTime("last day of $y-$m")
            );
        }*/
        
        function dayCount($day,$month,$year){
            $totalDay=cal_days_in_month(CAL_GREGORIAN,$month,$year);
            $count=0;
            for($i=1;$totalDay>=$i;$i++){
                if( date('l', strtotime($year.'-'.$month.'-'.$i))==ucwords($day)){
                    $count++;
                }
            }
            return $count;
        }

        function weekly_off_used_days($day,$admin_id,$month,$year){
            $totalDay=cal_days_in_month(CAL_GREGORIAN,$month,$year);
            $count=0;
            for($i=1;$totalDay>=$i;$i++){
                if( date('l', strtotime($year.'-'.$month.'-'.$i))==ucwords($day)){
                    $thisDay = date('Y-m-d', strtotime($year.'-'.$month.'-'.$i));
                    $leave = $this->Common_model->getdatabyid("`employee_id` =$admin_id AND (`start` <= '$thisDay' AND `end` >= '$thisDay') AND leave_type = 'Over day'",'admin_leave_details');
                    // pre($this->db->last_query());
                    if(!empty($leave)){
                        $count++;    
                    }                    
                }
            }
            return $count;
        } 

        function getAdminHolidayUsedCount($admin_id,$start,$end){
            $count=0;
            $holidays = $this->Common_model->getAdminHolidayDetailsByMonth($start, $end);
            if(!empty($holidays)){
                foreach($holidays as $holiday){
                    $thisDay = $holiday->start;
                    $leave = $this->Common_model->getdatabyid("`employee_id` =$admin_id AND (`start` <= '$thisDay' AND `end` >= '$thisDay') AND leave_type = 'Holiday'",'admin_leave_details');
                    if(!empty($leave)){
                        $count++;    
                    }   
                }
            }
            return $count;
        }
        
    function total_collection()
    {
        $data = $this->commonpage_data();  
        $collection_list = array();      
        $collections = $this->Common_model->join_payment_pending_details_with_property_interested_details_by_deal_status('Close');
        // pre($collections);
        foreach ($collections as $key => $value) {
            $name = '';
            $mobile = '';
            $email = '';
            $lead_id = '';
            if($value->deal_type == 'Client'){
                $client = $this->Common_model->getdatabyid(array('post_id'=>$value->buyer), 'post_requirement'); 
                if(!empty($client)){
                    $name = $client->name;
                    $mobile = $client->mobile;
                    $email = $client->email;
                    $lead_id = $client->lead_id;
                }
            }else{
                $seller = $this->Common_model->getdatabyid(array('post_id'=>$value->post_id), 'post_property'); 
                if(!empty($seller)){
                    $name = $seller->name;
                    $mobile = $seller->mobile;
                    $email = $seller->email;
                    $lead_id = $seller->lead_id;
                }
            }
            $payment_pending_details_id = $value->payment_pending_details;
            $payment_details = $this->Common_model->getdatabyid(array('payment_pending_details_id'=>$payment_pending_details_id), 'deal_payment_details'); 
            if(!empty($payment_details)){
                $bank = $payment_details->payment_ref;
                $transaction_id = $payment_details->payment_bank;
            }else{
                $bank = '';
                $transaction_id = '';
            }
            $row = array('date'=>$value->created,'inv_no'=>$value->inv_no,'for'=>'Commission', 'deal_id'=>$value->deal_id,'lead_by'=>$lead_id,'client_id'=>$value->party_id,'name'=>$name,'mobile'=>$mobile,'email'=>$email,'purpose'=>$value->rent_sell,'amount'=>$value->deal_total,'gst'=>$value->deal_gst,'sgst'=>$value->deal_sgst,'cgst'=>$value->deal_cgst,'tds'=>$value->deal_tds,'received'=>$value->deal_received,'bank'=>$bank,'transaction_id'=>$transaction_id);
            $collection_list[] = $row;
        }
        $data['collection_list'] = $collection_list;
        // pre($collection_list);
        $this->BackendView('admin/total_collection', $data);
    }
    
    function pending_collection()
    {
        $data = $this->commonpage_data();  
        $collection_list = array();      
        $collections = $this->Common_model->join_payment_pending_details_with_property_interested_details_by_deal_status('Pending');
        // pre($collections);
        foreach ($collections as $key => $value) {
            $name = '';
            $mobile = '';
            $email = '';
            $lead_id = '';
            if($value->deal_type == 'Client'){
                $client = $this->Common_model->getdatabyid(array('post_id'=>$value->buyer), 'post_requirement'); 
                if(!empty($client)){
                    $name = $client->name;
                    $mobile = $client->mobile;
                    $email = $client->email;
                    $lead_id = $client->user_type;
                }
            }else{
                $seller = $this->Common_model->getdatabyid(array('post_id'=>$value->post_id), 'post_property'); 
                if(!empty($seller)){
                    $name = $client->name;
                    $mobile = $client->mobile;
                    $email = $client->email;
                    $lead_id = $client->user_type;
                }
            }
            $payment_pending_details_id = $value->payment_pending_details;
            $payment_details = $this->Common_model->getdatabyid(array('payment_pending_details_id'=>$payment_pending_details_id), 'deal_payment_details'); 
            if(!empty($payment_details)){
                $bank = $payment_details->payment_ref;
                $transaction_id = $payment_details->payment_bank;
            }else{
                $bank = '';
                $transaction_id = '';
            }
            $row = array('date'=>$value->created,'inv_no'=>$value->inv_no,'for'=>'Commission', 'deal_id'=>$value->deal_id,'lead_by'=>$lead_id,'client_id'=>$value->party_id,'name'=>$name,'mobile'=>$mobile,'email'=>$email,'purpose'=>$value->rent_sell,'amount'=>$value->deal_total,'gst'=>$value->deal_gst,'sgst'=>$value->deal_sgst,'cgst'=>$value->deal_cgst,'tds'=>$value->deal_tds,'due'=>$value->deal_pending,'bank'=>$bank,'transaction_id'=>$transaction_id);
            $collection_list[] = $row;
        }
        $data['collection_list'] = $collection_list;
        // pre($collection_list);
        $this->BackendView('admin/pending_collection', $data);
    }
    
    function total_payments()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/total_payment', $data);
    }
    
    function pending_payments()
    {
        $data = $this->commonpage_data();
        $pending_list = array();
        $list = $this->Common_model->get_pending_payment_details('Closed');        
        // pre($this->db->last_query());
        foreach ($list as $key => $value) {
            if($value->agent_payment_status == 0 && $value->agent_commission != 0){
                $commission = $value->agent_commission;
                $seller = $this->Common_model->getdatabyid(array('post_id'=>$value->post_id), 'post_property'); 
                if(!empty($seller)){
                    $name = $seller->name;
                    $mobile = $seller->mobile;
                    $email = $seller->email;
                    $lead_id = $seller->lead_id;
                    $user_type = $seller->user_type;
                    if($user_type == 'Agent'){
                        $lead = $this->Common_model->getdatabyid(array('user_id'=>$seller->user_id), 'users'); 
                        $lead_by_name = !empty($lead) ? $lead->name : '';
                    }elseif($user_type == 'lead_partner' || $user_type == 'lead_partners'){
                        $lead = $this->Common_model->getdatabyid(array('user_id'=>$seller->user_id), 'lead_partners'); 
                        $lead_by_name = !empty($lead) ? $lead->name : '';
                    }
                }else{
                    $name = '';
                    $mobile = '';
                    $email = '';
                    $lead_id = '';
                }
                $row = array('deal_id'=>$value->id,'date'=>$value->created,'pay_slip_no'=>'','for'=>'Commission','lead_by'=>$value->property_user_type,'lead_by_name'=>'',
                     'do_no'=>'','user_id'=>'Seller','name'=>'','mobile'=>'','email'=>'','received_amount'=>'',
                     'commission'=>'','tds'=>'','transaction_id'=>'','bank'=>'');
                $pending_list[] = $row;
            }

            if($value->agent_payment_status1 == 0 && $value->agent_commission1 != 0){
                $commission = $value->agent_commission1;
                $client = $this->Common_model->getdatabyid(array('post_id'=>$value->buyer), 'post_requirement'); 
                if(!empty($client)){
                    $name = $client->name;
                    $mobile = $client->mobile;
                    $email = $client->email;
                    $user_type = $client->user_type;
                    if($user_type == 'Agent'){
                        $lead = $this->Common_model->getdatabyid(array('user_id'=>$client->user_id), 'users'); 
                        $lead_by_name = !empty($lead) ? $lead->name : '';
                    }elseif($user_type == 'lead_partner' || $user_type == 'lead_partners'){
                        $lead = $this->Common_model->getdatabyid(array('user_id'=>$client->user_id), 'lead_partners'); 
                        $lead_by_name = !empty($lead) ? $lead->name : '';
                    }
                }else{
                    $name = '';
                    $mobile = '';
                    $email = '';
                    $lead_id = '';
                }
                $row = array('deal_id'=>$value->id,'date'=>$value->created,'pay_slip_no'=>'','for'=>'Commission','lead_by'=>$value->buyer_user_type,'lead_by_name'=>'',
                     'do_no'=>'','user_id'=>'Buyer','name'=>$name,'mobile'=>$mobile,'email'=>$email,'received_amount'=>0,
                     'commission'=>$commission,'tds'=>'','transaction_id'=>'','bank'=>'');
                $pending_list[] = $row;
            }            
        }
        $data['pending_list'] = $pending_list;
        // pre($pending_list);
        $this->BackendView('admin/pending_payments', $data);
    }
    
    function list_banners()
    {
        $data = $this->commonpage_data();
        $data['list_banners'] = $this->Common_model->getdata(array('is_deleted' => 0),'banners');
        $this->BackendView('admin/list_banners', $data);
    }
    
    function delete_banners($id)
    {
        $result = $this->Common_model->update(array('is_deleted' => 1), array('id'=>$id), 'banners');  
        if($result){$this->session->set_flashdata('success', 'Data Deleted Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Deleted!');}
        redirect($_SERVER['HTTP_REFERER']);
    }
    function save_banners()
    {
        $this->load->library('upload');
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename_without_extension = explode('.'.$ext,$_FILES['image']['name']);
        $filename1 = str_replace(' ','_',$filename_without_extension[0]);
        $final_filename = str_replace('.','_',$filename1);
        $filename = $final_filename.'.'.$ext;
        $config['upload_path'] = './Uploads/banner_image/';
        $config['allowed_types'] = '*';
        $config['file_name'] = $filename;
        $this->upload->initialize($config);
        if(!empty($this->upload->do_upload('image'))){$image = 'Uploads/banner_image/' . $filename;}
        else{$image = "";}
        $result = $this->Common_model->insert_data('banners',array('image' => $image, 'created_at' => date('Y-m-d')));  
        if($result){$this->session->set_flashdata('success', 'Data Saved Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Saved!');}
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    function update_accept_terms()
    {
        $result = $this->Common_model->update(array('accept_terms' => $this->input->post('accept_terms'), 'accept_terms_status' => $this->input->post('status')), array('id'=> 1), 'address_contact_config');  
        if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Updated!');}
        redirect('backend');
    }
    
    function faq()
    {
        $data = $this->commonpage_data();
        $data['faq'] = $this->Common_model->getdata(array('is_deleted' => 0),'faq');
        $this->BackendView('admin/list_faq', $data);
    }
    
    function save_faq()
    {
        $data = $this->input->post(array('question', 'ans'));
        $result = $this->Common_model->insert_data('faq',array('question' => $data['question'], 'ans' => $data['ans'], 'created_at' => date('Y-m-d')));  
        if($result){$this->session->set_flashdata('success', 'Data Saved Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Saved!');}
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    function edit_faq($id)
    {
        $data = $this->commonpage_data();
        $data['faq'] = $this->Common_model->getdata(array('id' => $id),'faq');
        $this->BackendView('admin/edit_faq', $data);
    }
    
    function update_faq()
    {
        $data = $this->input->post(array('question', 'ans', 'id'));
        $result = $this->Common_model->update(array('question' => $data['question'], 'ans' => $data['ans'], 'modified_at' => date('Y-m-d')), array('id'=> $data['id']), 'faq');  

        if($result){$this->session->set_flashdata('success', 'Data Updated Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Updated!');}
        redirect('backend/faq');
    }
    
    function delete_faq()
    {
        $result = $this->Common_model->update(array('is_deleted' => 1), array('id'=> $this->input->post('id')), 'faq');  
        if($result){$this->session->set_flashdata('success', 'Data Deleted Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Deleted!');}
        redirect('backend/faq');
    }
}
?>