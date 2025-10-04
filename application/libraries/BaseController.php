<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
date_default_timezone_set('Asia/Kolkata');
class BaseController extends CI_Controller  {
	protected $admin_id = '';
	protected $global = array ();
	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 * 
	 *	Developed By Pratik Dhamande
	 *
	 * @access public
	 * @param array|NULL $data
	 *        	Data to output to the user
	 *        	running the script; otherwise, exit
	 */
	public function response($data = NULL) {
		$this->output->set_status_header (200)->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}
	
	
	function get_inactive_records(){
	    $this->load->model('Common_model');
        // $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $inactive_state_list = $this->Common_model->selectdataarray('name',array('status'=>0), 'state');
        if(!empty($inactive_state_list)){
            foreach($inactive_state_list as $r){
                $data['inactive_state_list'][] = $r['name'];
            }
        }
        // $data['city_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'city');
        $inactive_city_list = $this->Common_model->selectdataarray('name',array('status'=>0), 'city');
        if(!empty($inactive_city_list)){
            foreach($inactive_city_list as $r){
                $data['inactive_city_list'][] = $r['name'];
            }
        }
        //  pre($data['inactive_city_list']);
        // $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $inactive_location_list = $this->Common_model->selectdataarray('name',array('status'=>0), 'location');
        if(!empty($inactive_location_list)){
            foreach($inactive_location_list as $r){
                $data['inactive_location_list'][] = $r['name'];
            }
        }
        $inactive_pincode_list = $this->Common_model->selectdataarray('pincode',array('status'=>0), 'pincode');
        if(!empty($inactive_pincode_list)){
            foreach($inactive_pincode_list as $r){
                $data['inactive_pincode_list'][] = $r['pincode'];
            }
        }
        return $data;
    }

    function isAdminLoggedIn() 
    {
		$isAdminLoggedIn = $this->session->userdata('isAdminLoggedIn');
	    if (! isset ( $isAdminLoggedIn ) || $isAdminLoggedIn != TRUE)
	    {
			redirect ( 'Admin' );
		}
		else
		{
		    $this->admin_id = $this->session->userdata('admin_id');
		}
	}
	
	function isuserLoggedIn() 
    {
		$isuserLoggedIn = $this->session->userdata('isuserLoggedIn');
		    if (! isset ( $isuserLoggedIn ) || $isuserLoggedIn != TRUE){redirect ( 'home/login' );}
			else{$this->user_id = $this->session->userdata('user_id');}
	}


	function commonpage_data()
	{
		$this->load->model('Common_model');
        $admin_id = $this->admin_id;
        $data['admindata'] = $this->Common_model->getcurrentuser('user_id', $admin_id,'admin_users');
        
        $data['inactive_city_list'] = array();
        $data['inactive_location_list'] = array();
        $data['inactive_state_list'] = array();
        $data['inactive_pincode_list'] = array();
        
        // $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $inactive_state_list = $this->Common_model->selectdataarray('name',array('status'=>0), 'state');
        if(!empty($inactive_state_list)){
            foreach($inactive_state_list as $r){
                $data['inactive_state_list'][] = $r['name'];
            }
        }
        // $data['city_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'city');
        $inactive_city_list = $this->Common_model->selectdataarray('name',array('status'=>0), 'city');
        if(!empty($inactive_city_list)){
            foreach($inactive_city_list as $r){
                $data['inactive_city_list'][] = $r['name'];
            }
        }
        //  pre($data['inactive_city_list']);
        // $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $inactive_location_list = $this->Common_model->selectdataarray('name',array('status'=>0), 'location');
        if(!empty($inactive_location_list)){
            foreach($inactive_location_list as $r){
                $data['inactive_location_list'][] = $r['name'];
            }
        }
        $inactive_pincode_list = $this->Common_model->selectdataarray('pincode',array('status'=>0), 'pincode');
        if(!empty($inactive_pincode_list)){
            foreach($inactive_pincode_list as $r){
                $data['inactive_pincode_list'][] = $r['pincode'];
            }
        }
        //$data['frontpagedata'] = $this->common_model->getdatabyid(array('id'=>1),'address_contact_config');
        return $data;
	}
	
	function frontpagedata()
	{
		$this->load->model('common_model');
        $data = $this->common_model->getdatabyid(array('id'=>1),'address_contact_config');
        return $data;
	}

    function BackendView($viewName = "", $data = NULL)
    {
        $this->load->view('admin/include/header', $data);
        $this->load->view($viewName, $data);
        $this->load->view('admin/include/footer', $data);
    }

    function commonuser_data()
	{
		$this->load->model('common_model');
        $user_id = $this->user_id;
        $data['user_data'] = $this->common_model->getcurrentuser('id', $user_id,'users');
        return $data;
	}

    function Webview($viewName = "", $data = NULL)
    {
        $data['frontpagedata'] = $this->frontpagedata();
        $this->load->view('home/include/header', $data);
        $this->load->view($viewName, $data);
        $this->load->view('home/include/footer', $data);
    }
	/**
	 * This function used provide the pagination resources
	 * @param {string} $link : This is page link
	 * @param {number} $count : This is page count
	 * @param {number} $perPage : This is records per page limit
	 * @return {mixed} $result : This is array of records and pagination data
	 */

	function custompaginationCompress($uri_segment, $link, $count, $perPage = 20) {
		$this->load->library ( 'pagination' );
	
		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = $uri_segment;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 4;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ( $uri_segment );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}
	
    protected function get_entity($table, $where = NULL)
    {
          $this->load->model('common_model');
          $data = $this->common_model->gatdatabyid($where, $table);
          return $data;
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
        $this->email->from('info@stayeekart.in');
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
   
}