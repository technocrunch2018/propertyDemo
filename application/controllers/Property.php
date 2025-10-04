<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
date_default_timezone_set('Asia/Kolkata');
class Property extends BaseController {

    function __construct()
    {
        parent::__construct();
        $this->isAdminLoggedIn();
        $this->load->model('Common_model');
        $this->load->library('upload');
    }

    function index()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/dashboard', $data);
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
    
    function get_new_invoice_no(){
        $result = $this->Common_model->count(array(), 'payment_pending_details', 'payment_pending_details');  
        if(!empty($result)){
            $cnt = $result->count;
            $nozero = 5 - strlen($cnt);
            $zeros = '';
            for($j=0;$j<$nozero;$j++){
                $zeros .= '0';
            }
            $invoice_id = 'INV'.$zeros.($cnt+1);
        }else{
            $invoice_id = "INV00001";
        }
        // pre($invoice_id);
        return $lead_id;
    }
    
    
    function get_cities_by_state(){
        $post = $this->input->post();
        $state_name = $post['state_name'];
        $data['city_list'] = $this->Common_model->get_cities_by_state($state_name);
        $this->load->view('admin/load/load_cities', $data);
    }

    // Buyer Residential Sale Flat
    function buyer_residential_sale_flat()
    {
        $data = $this->commonpage_data();
        $data['flat_list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'Flat', 'interested_flag'=>1), 'post_requirement');
        foreach($data['flat_list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['flat_list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_flat_details');
        }
        $data['seller_list'] = $this->Common_model->getpropertydata(array('status'=>1,'is_deleted'=>0, 'res_com'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Flat'), 'post_property');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        // pre($data);
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/residential/flat', $data);
    }
    
    function buyer_residential_sale_flat_not_intrested()
    {
        $data = $this->commonpage_data();
        $data['flat_list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'Flat', 'interested_flag'=>0), 'post_requirement');
        foreach($data['flat_list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['flat_list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_flat_details');
        }
        $data['seller_list'] = $this->Common_model->getpropertydata(array('status'=>1,'is_deleted'=>0, 'res_com'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Flat'), 'post_property');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        // pre($data);
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/residential/flat_not_int', $data);
    }
    
    // Buyer Residential Sale HouseOrBunglow
    function buyer_residential_sale_house_bunglow()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'HouseorBanglow', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/residential/house_bunglow', $data);
    }
    
    function buyer_residential_sale_house_bunglow_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'HouseorBanglow', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/residential/house_bunglow_not_int', $data);
    }
     // Buyer Residential Sale Pent House
    function buyer_residential_sale_pent_house()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'PentHouse', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row)
        {
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_flat_details');
        }
        $data['rent_sell'] = "Sell";
        $this->BackendView('admin/buyer/residential/pent_house', $data);
    }
    
    function buyer_residential_sale_pent_house_not_intrested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'PentHouse', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/residential/pent_house_not_int', $data);
    }
    
    // Buyer Residential Sale duplex Flat
    function buyer_residential_sale_duplex_flat()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'DuplexFlat', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $this->BackendView('admin/buyer/residential/duplex_flat', $data);
    }
    
    function buyer_residential_sale_duplex_flat_not_intrested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'DuplexFlat', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/residential/duplex_flat_not_int', $data);
    }
     // Buyer Residential Sale Land
    function buyer_residential_sale_land()
    {
        $data = $this->commonpage_data();
        $data['seller_list'] = $this->Common_model->getpropertydata(array('status'=>1,'is_deleted'=>0, 'res_com'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Land', 'interested_flag'=>1), 'post_property');
        // echo $this->db->last_query();
        // pre($data['seller_list']);
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'Land'), 'post_requirement');
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/residential/land', $data);
    }
    
    function buyer_residential_sale_land_not_intrested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Residential', 'residential'=>'Land', 'interested_flag'=>0), 'post_requirement');
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/residential/land_not_int', $data);
    }
    // Buyer Residential Rent Flat
    function buyer_residential_rent_flat()
    {
        $data = $this->commonpage_data();
        $data['flat_list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'Flat', 'interested_flag'=>1), 'post_requirement');
        foreach($data['flat_list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['flat_list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_flat_details');
        }
        $data['seller_list'] = $this->Common_model->getpropertydata(array('status'=>1,'is_deleted'=>0, 'res_com'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'Flat'), 'post_property');
        //pre($data['seller_list']);
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/residential/flat', $data);
    }

    function buyer_residential_rent_flat_not_intrested()
    {
        $data = $this->commonpage_data();
        $data['flat_list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'Flat', 'interested_flag'=>0), 'post_requirement');
        foreach($data['flat_list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['flat_list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_flat_details');
        }
        $data['seller_list'] = $this->Common_model->getpropertydata(array('status'=>1,'is_deleted'=>0, 'res_com'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'Flat'), 'post_property');
        //pre($data['seller_list']);
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/residential/flat_not_int', $data);
    }
    
    // Buyer Residential Rent HouseOrBunglow
    function buyer_residential_rent_house_bunglow()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'HouseorBanglow', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/residential/house_bunglow', $data);
    }

    function buyer_residential_rent_house_bunglow_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'HouseorBanglow', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/residential/house_bunglow_not_int', $data);
    }
     // Buyer Residential Rent Pent House
    function buyer_residential_rent_pent_house()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'PentHouse', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/residential/pent_house', $data);
    }

    function buyer_residential_rent_pent_house_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'PentHouse', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/residential/pent_house_not_int', $data);
    }
    // Buyer Residential Rent duplex Flat
    function buyer_residential_rent_duplex_flat()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'DuplexFlat', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/residential/duplex_flat', $data);
    }

    function buyer_residential_rent_duplex_flat_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'DuplexFlat', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
        }
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/residential/duplex_flat_not_int', $data);
    }
     // Buyer Residential Rent Land
    function buyer_residential_rent_land()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'Land', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_land_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/residential/land', $data);
    }

    function buyer_residential_rent_land_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Residential', 'residential'=>'Land', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_land_details_not_int');
        }
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/residential/land', $data);
    }
      // Buyer Commercial Sale Office
    function buyer_commercial_sale_office()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'Office', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_office_details');
        }
        $data['rent_sell'] = 'Sell';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/office', $data);
    }

    function buyer_commercial_sale_office_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'Office', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_office_details');
        }
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/commercial/office_not_int', $data);
    }
    
    // Buyer Commercial Sale Shop Showroom
    function buyer_commercial_sale_shop_showroom()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'ShopOrShowroom', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_shop_details');
        }
        $data['rent_sell'] = 'Sell';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/shop_showroom', $data);
    }

    function buyer_commercial_sale_shop_showroom_not_intersted()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'ShopOrShowroom', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_shop_details');
        }
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/commercial/shop_showroom_not_int', $data);
    }
    // Buyer Commercial Sale Warehouse
    function buyer_commercial_sale_warehouse()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'Warehouse', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_warehouse_details');
        }
        $data['rent_sell'] = 'Sell';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/warehouse', $data);
    }

    function buyer_commercial_sale_warehouse_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'Warehouse', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_warehouse_details');
        }
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/commercial/warehouse_not_int', $data);
    }
    // Buyer Commercial Sale Factory
    function buyer_commercial_sale_factory()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'Factory', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_factory_details');
        }
        $data['rent_sell'] = 'Sell';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/factory', $data);
    }

    function buyer_commercial_sale_factory_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'Factory', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_factory_details');
        }
        $data['rent_sell'] = 'Sell';
        $this->BackendView('admin/buyer/commercial/factory_not_int', $data);
    }
    // Buyer Commercial Sale Land
    function buyer_commercial_sale_land()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'Land2', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_land_details');
        }
        $data['rent_sell'] = 'Sell';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/land', $data);
    }

    function buyer_commercial_sale_land_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Sell', 'residential_commercial'=>'Commercial', 'residential'=>'Land2', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_land_details');
        }
        $data['rent_sell'] = 'Sell';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/land_not_int', $data);
    }
    
      // Buyer Commercial Rent Office
    function buyer_commercial_rent_office()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'Office', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_office_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/office', $data);
    }

    function buyer_commercial_rent_office_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'Office', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_office_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/office_not_int', $data);
    }
    
    // Buyer Commercial Rent Shop Showroom
    function buyer_commercial_rent_shop_showroom()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'ShopOrShowroom', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_shop_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/shop_showroom', $data);
    }

    function buyer_commercial_rent_shop_showroom_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'ShopOrShowroom', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_shop_details');
        }
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/commercial/shop_showroom_not_int', $data);
    }
    // Buyer Commercial Rent Warehouse
    function buyer_commercial_rent_warehouse()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'Warehouse', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_warehouse_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/warehouse', $data);
    }

    function buyer_commercial_rent_warehouse_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'Warehouse', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_warehouse_details');
        }
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/commercial/warehouse_not_int', $data);
    }
    // Buyer Commercial Rent Factory
    function buyer_commercial_rent_factory()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'Factory', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_factory_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/factory', $data);
    }

    function buyer_commercial_rent_factory_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'Factory', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_factory_details');
        } 
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/commercial/factory_not_int', $data);
    }
    // Buyer Commercial Rent Land
    function buyer_commercial_rent_land()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'Land2', 'interested_flag'=>1), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_land_details');
        }
        $data['rent_sell'] = 'Rent';
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/commercial/land', $data);
    }

    function buyer_commercial_rent_land_not_interested()
    {
        $data = $this->commonpage_data();
        $data['list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'rent_sell'=>'Rent', 'residential_commercial'=>'Commercial', 'residential'=>'Land2', 'interested_flag'=>0), 'post_requirement');
        foreach($data['list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_land_details');
        }
        $data['rent_sell'] = 'Rent';
        $this->BackendView('admin/buyer/commercial/land_not_int', $data);
    }
    
    
    function save_buyer()
    {
        $post = $this->input->post();
        // pre($post);
        
        $post_id = $post['post_id'];
        if($post_id == 0){
            $maxid = $this->Common_model->selectmaxid('post_id', array(), 'post_requirement');
            $nozero = 7 - strlen($maxid);
            $zeros = '';
            for($j=0;$j<$nozero;$j++){
                $zeros .= '0';
            }
            $lead_id = $this->RandomString().$zeros;
            $lead_id = 'REQ'.$zeros.($maxid+1);
            $insert_data = array('user_id'=>$this->session->userdata('admin_id'),
                                 'user_type'=> $this->session->userdata('user_type'),
                                 'lead_id'=>$lead_id,
                                 'residential'=>$post['residential'],
                                 'residential_commercial'=>$post['residential_commercial'],
                                 'rent_sell'=>$post['rent_sell'],
                                 'name'=>$post['name'],
                                 'mobile'=>$post['mobile'],
                                 'mobile2'=>$post['mobile2'],
                                 'phone'=>$post['phone'],
                                 'email'=>$post['email'],
                                 'state'=>$post['state'],
                                 'city'=>$post['city'],
                                 'location'=>!empty($post['location']) ? implode(',',$post['location']) : '',
                                 'MinimumRent'=>$post['MinimumRent'],
                                 'MaximumRent'=>$post['MaximumRent'],
                                 'FurnishedStatus'=>!empty($post['FurnishedStatus']) ? $post['FurnishedStatus'] : '',
                                 'ComplexSoceityBuilding'=>!empty($post['ComplexSoceityBuilding']) ? $post['ComplexSoceityBuilding'] : '',
                                 'section'=>!empty($post['section']) ? $post['section'] : '',
                                 'PossessionDate'=>(!empty($post['PossessionDate']) && $post['PossessionDate'] != '') ? date('Y-m-d H:i:s', strtotime($post['PossessionDate'])) : NULL,
                                 'OpenParking'=>$post['OpenParking'],
                                 'CoveredParking'=>$post['CoveredParking'],
                                 'Basement'=>$post['Basement'],
                                 'LiftParking'=>$post['LiftParking'],
                                 'TwoWheeler'=>$post['TwoWheeler'],
                                 'status'=>1,
                                 
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
                                 'created'=>date('Y-m-d H:i:s'));
                $result = $this->Common_model->insert_data('post_requirement',$insert_data);  
                if($result){
                    
                    if($post['residential'] == 'Flat'){
                        $duplex_flat = array(
                                     'post_id'=>$result,
                                     'Room'=>$post['Room'],
                                     'Bathroom'=>$post['Bathroom'],
                                     'FlatMinimumAreaRequired'=>$post['FlatMinimumAreaRequired'],
                                     'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                     'FlatMaximumAreaRequired'=>$post['FlatMaximumAreaRequired'],
                                     'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                                     'MinimumFloorHeight'=>$post['MinimumFloorHeight'],
                                     'MaximumFloorHeight'=>$post['MaximumFloorHeight'],
                                     
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupUnit'=>$post['SuperBuildupUnit'],
                                     'BuildupArea'=>$post['BuildupArea'],
                                     'BuildupUnit'=>$post['BuildupUnit'],
                                     'CarpetArea'=>$post['CarpetArea'],
                                     'CarpetAreaUnit'=>$post['CarpetAreaUnit'],
                                     'balcony'=>$post['balcony'],
                                     'kitchen'=>$post['kitchen'],
                                     'totalfloor'=>$post['totalfloor'],
                                     'created'=>date('Y-m-d H:i:s'));
                        $res = $this->Common_model->insert_data('requirement_flat_details',$duplex_flat);
                    }elseif($post['residential'] == 'HouseorBanglow'){
                        $house = array(
                             'post_id'=>$result,
                             'HouseRoom'=>$post['HouseRoom'],
                             'HouseBathroom'=>$post['HouseBathroom'],
                             'SuperBuildupArea'=>$post['SuperBuildupArea'],
                             'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                             'MinimumAreaRequired'=>$post['MinimumAreaRequired'],
                             'StockMinimumAreaRequiredUnit'=>$post['StockMinimumAreaRequiredUnit'],
                             'HouseMaximumAreaRequired'=>$post['HouseMaximumAreaRequired'],
                             'HouseMaximumOpenAreaUnit'=>$post['HouseMaximumOpenAreaUnit'],
                             
                             
                             'CarpetArea'=>$post['CarpetArea'],
                             'CarpetUnit'=>$post['CarpetUnit'],
                             'BuildupArea'=>$post['BuildupArea'],
                             'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                             'TotalLandArea'=>$post['TotalLandArea'],
                             'TotalLandAreaUnit'=>$post['TotalLandAreaUnit'],
                             'TotalUncoveredLandArea'=>$post['TotalUncoveredLandArea'],
                             'TotalUncoveredLandAreaUnit'=>$post['TotalUncoveredLandAreaUnit'],
                             'balcony'=>$post['balcony'],
                             'kitchen'=>$post['kitchen'],
                             'totalfloor'=>$post['totalfloor'],
                             'created'=>date('Y-m-d H:i:s'));
                        $res = $this->Common_model->insert_data('requirement_house_details',$house);
                    }elseif($post['residential'] == 'PentHouse'){
                        $duplex_flat = array(
                                     'post_id'=>$result,
                                     'Room'=>$post['Room'],
                                     'Bathroom'=>$post['Bathroom'],
                                     'FlatMinimumAreaRequired'=>$post['FlatMinimumAreaRequired'],
                                     'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                     'FlatMaximumAreaRequired'=>$post['FlatMaximumAreaRequired'],
                                     'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                                     'MinimumFloorHeight'=>$post['MinimumFloorHeight'],
                                     'MaximumFloorHeight'=>$post['MaximumFloorHeight'],
                                     
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupUnit'=>$post['SuperBuildupUnit'],
                                     'BuildupArea'=>$post['BuildupArea'],
                                     'BuildupUnit'=>$post['BuildupUnit'],
                                     'CarpetArea'=>$post['CarpetArea'],
                                     'CarpetAreaUnit'=>$post['CarpetAreaUnit'],
                                     'openTerrace'=>$post['openTerrace'],
                                     'openTerraceUnit'=>$post['openTerraceUnit'],
                                     'balcony'=>@$post['balcony'],
                                     'kitchen'=>@$post['kitchen'],
                                     'totalfloor'=>@$post['totalfloor'],
                                     'created'=>date('Y-m-d H:i:s'));
                        $res = $this->Common_model->insert_data('requirement_flat_details',$duplex_flat);
                    }elseif($post['residential'] == 'DuplexFlat'){
                        $duplex_flat = array(
                                     'post_id'=>$result,
                                     'Room'=>$post['Room'],
                                     'Bathroom'=>$post['Bathroom'],
                                     'FlatMinimumAreaRequired'=>$post['FlatMinimumAreaRequired'],
                                     'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                     'FlatMaximumAreaRequired'=>$post['FlatMaximumAreaRequired'],
                                     'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                                     'MinimumFloorHeight'=>$post['MinimumFloorHeight'],
                                     'MaximumFloorHeight'=>$post['MaximumFloorHeight'],
                                     
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupUnit'=>$post['SuperBuildupUnit'],
                                     'BuildupArea'=>$post['BuildupArea'],
                                     'BuildupUnit'=>$post['BuildupUnit'],
                                     'CarpetArea'=>$post['CarpetArea'],
                                     'CarpetAreaUnit'=>$post['CarpetAreaUnit'],
                                     'openTerrace'=>$post['openTerrace'],
                                     'openTerraceUnit'=>$post['openTerraceUnit'],
                                     'balcony'=>@$post['balcony'],
                                     'kitchen'=>@$post['kitchen'],
                                     'totalfloor'=>@$post['totalfloor'],
                                     'created'=>date('Y-m-d H:i:s'));
                        $res = $this->Common_model->insert_data('requirement_flat_details',$duplex_flat);
                    }elseif($post['residential'] == 'Land'){
                         $land = array(
                         'post_id'=>$result,
                         'LandMinimumAreaRequired'=>$post['LandMinimumAreaRequired'],
                         'LandSuperBuildupAreaUnit'=>$post['LandSuperBuildupAreaUnit'],
                         'LandMaximumAreaRequired'=>$post['LandMaximumAreaRequired'],
                         'MaximumAreaRequiredUnit'=>$post['MaximumAreaRequiredUnit'],
                         'LandFacing'=>$post['LandFacing'],
                         'LandRoadWide'=>$post['LandRoadWide'],
                         'LandRoadWideUnit'=>$post['LandRoadWideUnit'],
                         'LandStatus'=>$post['LandStatus'],
                         'NatureofLand'=>$post['NatureofLand'],
                         'PropertyTax'=>$post['PropertyTax'],
                         'Mutation'=>$post['Mutation'],
                         'SuperBuildupArea'=>$post['SuperBuildupArea'],
                         'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                         'CoveredArea'=>$post['CoveredArea'],
                         'CoveredAreaUnit'=>$post['CoveredAreaUnit'],
                         'created'=>date('Y-m-d H:i:s'));
                        $res = $this->Common_model->insert_data('requirement_land_details',$land);
                    }elseif($post['residential'] == 'Office'){
                        $office = array(
                            'post_id'=>$result,
                            'NumberofCabin'=>$post['NumberofCabin'],
                            'NumberofWorkStation'=>$post['NumberofWorkStation'],
                            'MinimumAreaRequired'=>$post['OfficeMinimumAreaRequired'],
                            'OfficeSuperBuildupAreaUnit'=>$post['OfficeSuperBuildupAreaUnit'],
                            'MaximumAreaRequired'=>$post['MaximumAreaRequired'],
                            'OfficeMaximumAreaRequiredUnit'=>$post['OfficeMaximumAreaRequiredUnit'],
                            'Pentry'=>$post['Pentry'],
                            'PentryUsedFor'=>$post['PentryUsedFor'],
                            'AC'=>$post['AC'],
                            'OfficeMinimumFloorHeight'=>$post['OfficeMinimumFloorHeight'],
                            'OfficeMaximumFloorHeight'=>$post['OfficeMaximumFloorHeight'],
                            
                            'SuperBuildupArea'=>$post['SuperBuildupArea'],
                            'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                            'CarpetArea'=>$post['CarpetArea'],
                            'CarpetAreaUnit'=>$post['CarpetAreaUnit'],
                            'BuildupArea'=>$post['BuildupArea'],
                            'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                             
                             
                             'OfficeBathroom'=>$post['OfficeBathroom'],
                             'OfficeNatureofBusiness'=>$post['OfficeNatureofBusiness'],
                             'created'=>date('Y-m-d H:i:s'));
                        $res = $this->Common_model->insert_data('requirement_office_details',$office);
                    }elseif($post['residential'] == 'ShopOrShowroom'){ //pre($post);
                        $shop = array(
                                 'post_id'=>$result,
                                 'ShopNatureofBusiness'=>$post['ShopNatureofBusiness'],
                                 'Frontage'=>$post['Frontage'],
                                 'FrontageUnit'=>$post['FrontageUnit'],
                                 'ShopMinimumAreaRequired'=>$post['ShopMinimumAreaRequired'],
                                 'MinimumAreaRequiredUnit'=>$post['MinimumAreaRequiredUnit'],
                                 'ShopMaximumAreaRequired'=>$post['ShopMaximumAreaRequired'],
                                 'ShopMaximumAreaRequiredUnit'=>$post['ShopMaximumAreaRequiredUnit'],
                                 
                                 'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                 'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                 'CoveredArea'=>$post['CoveredArea'],
                                 'CoveredAreaUnit'=>$post['CoveredAreaUnit'],
                                 'BuildupArea'=>$post['BuildupArea'],
                                 'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                                 'OpenArea'=>$post['OpenArea'],
                                 'OpenAreaUnit'=>$post['OpenAreaUnit'],
                                 'roof'=>$post['roof'],
                                 'Floor'=>$post['Floor'],
                                 'Bathroom'=>$post['Bathroom'],
                                 'Pentry'=>$post['Pentry'],
                                 'bathroom_used_for' => $post['bathroom_user_for'],
                                 'pentry_used_for' => $post['penhtry_user_for'],
                                 'RoadWide'=>$post['RoadWide'],
                                 'RoadWideUnit'=>$post['RoadWideUnit'],
                                 'ElectricPower'=>$post['ElectricPower'],
                                 'ElectricPowerUnit'=>$post['ElectricPowerUnit'],
                                 'AvailableForBar'=>$post['AvailableForBar'],
                                 'ForResturant'=>$post['ForResturant'],
                                 'HeavyVehicleParkingUpto'=>$post['HeavyVehicleParkingUpto'],
                                 'created'=>date('Y-m-d H:i:s'));
                        $res = $this->Common_model->insert_data('requirement_shop_details',$shop);
                    }elseif($post['residential'] == 'Warehouse'){
                         $warehouse = array(
                             'post_id'=>$result,
                             'WarehouseRoof'=>$post['WarehouseRoof'],
                             'WarehouseRoadWide'=>$post['WarehouseRoadWide'],
                             'WarehouseRoadWideUnit'=>$post['WarehouseRoadWideUnit'],
                             
                             'WarehouseMinimumCoveredArea'=>$post['WarehouseMinimumCoveredArea'],
                             'WarehouseMinimumOpenArea'=>$post['WarehouseMinimumOpenArea'],
                             'WarehouseMinimumCoveredAreaUnit'=>$post['WarehouseMinimumCoveredAreaUnit'],
                             'WarehouseMinimumOpenAreaUnit'=>$post['WarehouseMinimumOpenAreaUnit'],
                             'WarehouseMaximumOpenArea'=>$post['WarehouseMaximumOpenArea'],
                             'WarehouseMaximumCoveredAreaUnit'=>$post['WarehouseMaximumCoveredAreaUnit'],
                             'WarehouseMaximumOpenAreaUnit'=>$post['WarehouseMaximumOpenAreaUnit'],
                             'WarehouseMaximumCoveredArea'=>$post['WarehouseMaximumCoveredArea'],
                             'WarehouseHeavyVehicleParkingUpto'=>$post['WarehouseHeavyVehicleParkingUpto'],
                             'MinimumFloor'=>$post['MinimumFloor'],
                             'MaximumFloor'=>$post['MaximumFloor'],
                             
                             'SuperBuildupArea'=>$post['SuperBuildupArea'],
                             'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                             /*'CoveredArea'=>$post['CoveredArea'],
                             'CoveredAreaUnit'=>$post['CoveredAreaUnit'],*/
                             'BuildupArea'=>$post['BuildupArea'],
                             'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                             /*'OpenArea'=>$post['OpenArea'],
                             'OpenAreaUnit'=>$post['OpenAreaUnit'],*/
                             
                             'NumberofCabin'=>$post['NumberofCabin'],
                             'NumberofWorkStation'=>$post['NumberofWorkStation'],
                             'Pentry'=>$post['Pentry'],
                             'PentryUsedFor'=>$post['PentryUsedFor'],
                             'Bathroom'=>$post['Bathroom'],
                             'bathroom_used_for'=>$post['BathroomUsedFor'],
                             'created'=>date('Y-m-d H:i:s'));
                        $res = $this->Common_model->insert_data('requirement_warehouse_details',$warehouse);
                    }elseif($post['residential'] == 'Factory'){
                        $factory = array(
                                     'post_id'=>$result,
                                     'MinimumOpenArea'=>$post['MinimumOpenArea'],
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
                                     
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                     'BuildupArea'=>$post['BuildupArea'],
                                     'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                                     
                                     'RoadWide'=>$post['RoadWide'],
                                     'RoadWideUnit'=>$post['RoadWideUnit'],
                                     'HeavyVehicleParkingUpto'=>$post['HeavyVehicleParkingUpto'],
                                     
                                     'NumberofCabin'=>$post['NumberofCabin'],
                                     'NumberofWorkStation'=>$post['NumberofWorkStation'],
                                     'Pentry'=>$post['Pentry'],
                                     'PentryUsedFor'=>$post['PentryUsedFor'],
                                     'Bathroom'=>$post['Bathroom'],
                                     'bathroom_user_for' => $post['bathroom_user_for'],
                                     'created'=>date('Y-m-d H:i:s'));
                        $res = $this->Common_model->insert_data('requirement_factory_details',$factory);             
                    }elseif($post['residential'] == 'Land2'){
                         $land = array(
                                     'post_id'=>$result,
                                     'LandMinimumAreaRequired'=>$post['LandMinimumAreaRequired'],
                                     'LandSuperBuildupAreaUnit'=>$post['LandSuperBuildupAreaUnit'],
                                     'LandMaximumAreaRequired'=>$post['LandMaximumAreaRequired'],
                                     'MaximumAreaRequiredUnit'=>$post['MaximumAreaRequiredUnit'],
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                     'CoveredArea'=>$post['CoveredArea'],
                                     'CoveredAreaUnit'=>$post['CoveredAreaUnit'],
                                     'LandFacing'=>$post['LandFacing'],
                                     'LandRoadWide'=>$post['LandRoadWide'],
                                     'LandRoadWideUnit'=>$post['LandRoadWideUnit'],
                                     'LandStatus'=>$post['LandStatus'],
                                     'NatureofLand'=>$post['NatureofLand'],
                                     'PropertyTax'=>$post['PropertyTax'],
                                     'Mutation'=>$post['Mutation'],
                                     'created'=>date('Y-m-d H:i:s'));
                         $res = $this->Common_model->insert_data('requirement_land_details',$land);
                    }
                
                    $this->session->set_flashdata('success', 'Data Saved Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not Saved!');
                }  
        }else{
            $update_data = array('residential_commercial'=>$post['residential_commercial'],
                                 'name'=>$post['name'],
                                 'mobile'=>$post['mobile'],
                                 'mobile2'=>$post['mobile2'],
                                 'phone'=>$post['phone'],
                                 'email'=>$post['email'],
                                 'state'=>$post['state'],
                                 'city'=>$post['city'],
                                 'location'=>!empty($post['location']) ? implode(',',$post['location']) : '',
                                 'MinimumRent'=>$post['MinimumRent'],
                                 'MaximumRent'=>$post['MaximumRent'],
                                 'FurnishedStatus'=>$post['FurnishedStatus'],
                                 'ComplexSoceityBuilding'=>$post['ComplexSoceityBuilding'],
                                 'section'=>$post['section'],
                                 'PossessionDate'=>date('Y-m-d H:i:s', strtotime($post['PossessionDate'])),
                                 'OpenParking'=>$post['OpenParking'],
                                 'CoveredParking'=>$post['CoveredParking'],
                                 'Basement'=>$post['Basement'],
                                 'LiftParking'=>$post['LiftParking'],
                                 'TwoWheeler'=>$post['TwoWheeler'],
                                
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
                                  'Security'=>(!empty($post['Security'])) ? 1 : 0);
                $result = $this->Common_model->update($update_data, array('post_id'=>$post_id), 'post_requirement');  
                // pre($this->db->last_query());
                if($result){
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
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupUnit'=>$post['SuperBuildupUnit'],
                                     'BuildupArea'=>$post['BuildupArea'],
                                     'BuildupUnit'=>$post['BuildupUnit'],
                                     'CarpetArea'=>$post['CarpetArea'],
                                     'CarpetAreaUnit'=>$post['CarpetAreaUnit'],
                                     'balcony'=>$post['balcony'],
                                     'kitchen'=>$post['kitchen'],
                                     'totalfloor'=>$post['totalfloor']);
                        $this->Common_model->update($duplex_flat, array('post_id'=>$post_id), 'requirement_flat_details');
                    }elseif($post['residential'] == 'HouseorBanglow'){
                        $house = array(
                             'HouseRoom'=>$post['HouseRoom'],
                             'HouseBathroom'=>$post['HouseBathroom'],
                             'MinimumAreaRequired'=>$post['MinimumAreaRequired'],
                             'StockMinimumAreaRequiredUnit'=>$post['StockMinimumAreaRequiredUnit'],
                             'HouseMaximumAreaRequired'=>$post['HouseMaximumAreaRequired'],
                             'HouseMaximumOpenAreaUnit'=>$post['HouseMaximumOpenAreaUnit'],
                             'SuperBuildupArea'=>$post['SuperBuildupArea'],
                             'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                             'CarpetArea'=>$post['CarpetArea'],
                             'CarpetUnit'=>$post['CarpetUnit'],
                             'BuildupArea'=>$post['BuildupArea'],
                             'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                             'TotalLandArea'=>$post['TotalLandArea'],
                             'TotalLandAreaUnit'=>$post['TotalLandAreaUnit'],
                             'TotalUncoveredLandArea'=>$post['TotalUncoveredLandArea'],
                             'TotalUncoveredLandAreaUnit'=>$post['TotalUncoveredLandAreaUnit'],
                             'balcony'=>$post['balcony'],
                             'kitchen'=>$post['kitchen'],
                             'totalfloor'=>$post['totalfloor'],);
                        $this->Common_model->update($house, array('post_id'=>$post_id), 'requirement_house_details');
                    }elseif($post['residential'] == 'PentHouse'){
                        $duplex_flat = array(
                                     'Room'=>$post['Room'],
                                     'Bathroom'=>$post['Bathroom'],
                                     'FlatMinimumAreaRequired'=>$post['FlatMinimumAreaRequired'],
                                     'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                     'MinimumFloorHeight'=>$post['MinimumFloorHeight'],
                                     'FlatMaximumAreaRequired'=>$post['FlatMaximumAreaRequired'],
                                     'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                                     'MaximumFloorHeight'=>$post['MaximumFloorHeight'],
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupUnit'=>$post['SuperBuildupUnit'],
                                     'BuildupArea'=>$post['BuildupArea'],
                                     'BuildupUnit'=>$post['BuildupUnit'],
                                     'CarpetArea'=>$post['CarpetArea'],
                                     'openTerrace'=>$post['openTerrace'],
                                     'openTerraceUnit'=>$post['openTerraceUnit'],
                                     'balcony'=>$post['balcony'],
                                     'kitchen'=>$post['kitchen'],
                                     'totalfloor'=>$post['totalfloor'],);
                        $this->Common_model->update($duplex_flat, array('post_id'=>$post_id), 'requirement_flat_details');
                    }elseif($post['residential'] == 'DuplexFlat'){
                        $duplex_flat = array(
                                     'Room'=>$post['Room'],
                                     'Bathroom'=>$post['Bathroom'],
                                     'FlatMinimumAreaRequired'=>$post['FlatMinimumAreaRequired'],
                                     'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                     'MinimumFloorHeight'=>$post['MinimumFloorHeight'],
                                     'FlatMaximumAreaRequired'=>$post['FlatMaximumAreaRequired'],
                                     'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupUnit'=>$post['SuperBuildupUnit'],
                                     'BuildupArea'=>$post['BuildupArea'],
                                     'BuildupUnit'=>$post['BuildupUnit'],
                                     'CarpetArea'=>$post['CarpetArea'],
                                     'openTerrace'=>$post['openTerrace'],
                                     'openTerraceUnit'=>$post['openTerraceUnit'],
                                     'MaximumFloorHeight'=>$post['MaximumFloorHeight'],
                                     'balcony'=>$post['balcony'],
                                     'kitchen'=>$post['kitchen'],
                                     'totalfloor'=>$post['totalfloor']);
                        $this->Common_model->update($duplex_flat, array('post_id'=>$post_id), 'requirement_flat_details');
                    }elseif($post['residential'] == 'Land'){
                        $land = array(
                             'LandMinimumAreaRequired'=>$post['LandMinimumAreaRequired'],
                             'LandSuperBuildupAreaUnit'=>$post['LandSuperBuildupAreaUnit'],
                             'LandMaximumAreaRequired'=>$post['LandMaximumAreaRequired'],
                             'MaximumAreaRequiredUnit'=>$post['MaximumAreaRequiredUnit'],
                             'SuperBuildupArea'=>$post['SuperBuildupArea'],
                             'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                             'CoveredArea'=>$post['CoveredArea'],
                             'CoveredAreaUnit'=>$post['CoveredAreaUnit'],
                             'LandFacing'=>$post['LandFacing'],
                             'LandRoadWide'=>$post['LandRoadWide'],
                             'LandRoadWideUnit'=>$post['LandRoadWideUnit'],
                             'LandStatus'=>$post['LandStatus'],
                             'NatureofLand'=>$post['NatureofLand'],
                             'PropertyTax'=>$post['PropertyTax'],
                             'Mutation'=>$post['Mutation']);
                        $this->Common_model->update($land, array('post_id'=>$post_id), 'requirement_land_details');
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
                            'SuperBuildupArea'=>$post['SuperBuildupArea'],
                            'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                            'CarpetArea'=>$post['CarpetArea'],
                            'CarpetAreaUnit'=>$post['CarpetAreaUnit'],
                            'BuildupArea'=>$post['BuildupArea'],
                            'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                            'OfficeMaximumAreaRequiredUnit'=>$post['OfficeMaximumAreaRequiredUnit'],
                            'OfficeMaximumFloorHeight'=>$post['OfficeMaximumFloorHeight'],
                            'OfficeBathroom'=>$post['OfficeBathroom'],
                            'OfficeNatureofBusiness'=>$post['OfficeNatureofBusiness']);
                        $this->Common_model->update($office, array('post_id'=>$post_id), 'requirement_office_details');
                    }elseif($post['residential'] == 'ShopOrShowroom'){
                        $shop = array(
                                 'ShopNatureofBusiness'=>$post['ShopNatureofBusiness'],
                                 'ShopMinimumAreaRequired'=>$post['ShopMinimumAreaRequired'],
                                 'MinimumAreaRequiredUnit'=>$post['MinimumAreaRequiredUnit'],
                                 'ShopMaximumAreaRequired'=>$post['ShopMaximumAreaRequired'],
                                 'ShopMaximumAreaRequiredUnit'=>$post['ShopMaximumAreaRequiredUnit'],
                                 
                                 'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                 'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                 'CoveredArea'=>$post['CoveredArea'],
                                 'CoveredAreaUnit'=>$post['CoveredAreaUnit'],
                                 'Frontage'=>$post['Frontage'],
                                 'FrontageUnit'=>$post['FrontageUnit'],
                                 'BuildupArea'=>$post['BuildupArea'],
                                 'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                                 'OpenArea'=>$post['OpenArea'],
                                 'OpenAreaUnit'=>$post['OpenAreaUnit'],

                                 'roof'=>$post['roof'],
                                 'Floor'=>$post['Floor'],
                                 'Bathroom'=>$post['Bathroom'],
                                 'Pentry'=>$post['Pentry'],
                                 'RoadWide'=>$post['RoadWide'],
                                 'RoadWideUnit'=>$post['RoadWideUnit'],
                                 'ElectricPower'=>$post['ElectricPower'],
                                 'ElectricPowerUnit'=>$post['ElectricPowerUnit'],
                                 'AvailableForBar'=>$post['AvailableForBar'],
                                 'ForResturant'=>$post['ForResturant'],
                                 'HeavyVehicleParkingUpto'=>$post['HeavyVehicleParkingUpto']);
                        $this->Common_model->update($shop, array('post_id'=>$post_id), 'requirement_shop_details');
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
                             
                             'SuperBuildupArea'=>$post['SuperBuildupArea'],
                             'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                             'BuildupArea'=>$post['BuildupArea'],
                             'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                             
                             'NumberofCabin'=>$post['NumberofCabin'],
                             'NumberofWorkStation'=>$post['NumberofWorkStation'],
                             'Pentry'=>$post['Pentry'],
                             'PentryUsedFor'=>$post['PentryUsedFor'],
                             'Bathroom'=>$post['Bathroom']);
                        $this->Common_model->update($warehouse, array('post_id'=>$post_id), 'requirement_warehouse_details');
                    }elseif($post['residential'] == 'Factory'){
                        $factory = array(
                                     'MinimumOpenArea'=>$post['MinimumOpenArea'],
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
                                     
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                     'BuildupArea'=>$post['BuildupArea'],
                                     'BuildupAreaUnit'=>$post['BuildupAreaUnit'],
                                     
                                     'RoadWide'=>$post['RoadWide'],
                                     'RoadWideUnit'=>$post['RoadWideUnit'],
                                     'HeavyVehicleParkingUpto'=>$post['HeavyVehicleParkingUpto'],
                                     'NumberofCabin'=>$post['NumberofCabin'],
                                     'NumberofWorkStation'=>$post['NumberofWorkStation'],
                                     'Pentry'=>$post['Pentry'],
                                     'PentryUsedFor'=>$post['PentryUsedFor'],
                                     'Bathroom'=>$post['Bathroom']);
                        $this->Common_model->update($factory, array('post_id'=>$post_id), 'requirement_factory_details');
                    }elseif($post['residential'] == 'Land2'){
                         $land = array(
                                     'LandMinimumAreaRequired'=>$post['LandMinimumAreaRequired'],
                                     'LandSuperBuildupAreaUnit'=>$post['LandSuperBuildupAreaUnit'],
                                     'LandMaximumAreaRequired'=>$post['LandMaximumAreaRequired'],
                                     'MaximumAreaRequiredUnit'=>$post['MaximumAreaRequiredUnit'],
                                     
                                     'SuperBuildupArea'=>$post['SuperBuildupArea'],
                                     'SuperBuildupAreaUnit'=>$post['SuperBuildupAreaUnit'],
                                     'CoveredArea'=>$post['CoveredArea'],
                                     'CoveredAreaUnit'=>$post['CoveredAreaUnit'],

                                     'LandFacing'=>$post['LandFacing'],
                                     'LandRoadWide'=>$post['LandRoadWide'],
                                     'LandRoadWideUnit'=>$post['LandRoadWideUnit'],
                                     'LandStatus'=>$post['LandStatus'],
                                     'NatureofLand'=>$post['NatureofLand'],
                                     'PropertyTax'=>$post['PropertyTax']
                                     );
                         $res = $this->Common_model->insert_data('requirement_land_details',$land);
                         $this->Common_model->update($land, array('post_id'=>$post_id), 'requirement_land_details');
                    }
                    $this->session->set_flashdata('success', 'Data updated Successfully!');
                }else{
                    $this->session->set_flashdata('error', 'Data Not updated!');
                }  
        }
        redirect($post['redirect_url']);
    }
    
    function get_requirement_details_by_id(){
        $post = $this->input->post();
        $result = $this->Common_model->getarraydatabyid(array('post_id'=>$post['post_id']), 'post_requirement'); 
        $residential = $result['residential'];
        $post_id = $post['post_id'];
        if($residential == 'DuplexFlat'){
            //Duplex Flat
            $duplex_flat_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_flat_details');
            $result = array_merge($result, !empty($duplex_flat_details) ? $duplex_flat_details : array() );
        }elseif($residential == 'PentHouse'){
        //Pent House
            $pent_house_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_flat_details');
            $result = array_merge($result, !empty($pent_house_details) ? $pent_house_details : array() );
        }elseif($residential == 'Factory'){
            //Factory Rent
            $factory_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_factory_details');
            $result = array_merge($result, !empty($factory_details) ? $factory_details : array() );
        }elseif($residential == 'Flat'){
            //Flat Rent
            $flat_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_flat_details');
            $result = array_merge($result, !empty($flat_details) ? $flat_details : array());
        }elseif($residential == 'HouseorBanglow'){
            //House Rent
            $house_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_house_details');
            $result = array_merge($result, !empty($house_details) ? $house_details : array() );
        }elseif($residential == 'Land' || $residential == 'Land2'){
            //Land Rent
            $land_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_land_details');
            $result = array_merge($result, !empty($land_details) ? $land_details : array() );
        }elseif($residential == 'Office'){
            //Office Rent
            $office_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_office_details');
            $result = array_merge($result, !empty($office_details) ? $office_details : array());
        }elseif($residential == 'ShopOrShowroom'){
            //Shop Rent
            $shop_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_shop_details');
            $result = array_merge($result, !empty($shop_details) ? $shop_details : array());
        }elseif($residential == 'Warehouse'){
            //Warehouse Rent
            $warehouse_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_warehouse_details');
            $result = array_merge($result, !empty($warehouse_details) ? $warehouse_details : array());
        }
        echo json_encode($result);
    }
    
    
    function save_buyer_not_interested(){
        $post = $this->input->post();
        $buyer_not_interested_post_id = $post['buyer_not_interested_post_id'];
        $reason = $post['reason'];
        $update_data = array('not_interested_reason'=>$reason, 'interested_flag'=>0);
        $result = $this->Common_model->update($update_data, array('post_id'=>$buyer_not_interested_post_id),'post_requirement'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Buyer status changed Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Buyer status Not changed!');
        }
        redirect($post['redirect_url']);
    }

    function save_buyer_to_interested(){
        $post = $this->input->post();
        // pre($post);
        $save_buyer_to_interested_post_id = $post['save_buyer_to_interested_post_id'];
        $update_data = array('interested_flag'=>1,'status'=>1);
        $result = $this->Common_model->update($update_data, array('post_id'=>$save_buyer_to_interested_post_id),'post_requirement'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Buyer status changed Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Buyer status Not changed!');
        }
        redirect($post['redirect_url']);
    }
    
    public function get_property_details_by_id(){
        $amenities = array();
        $post = $this->input->post();
        $residential = $post['property_type'];
        $post_id = $post['post_id'];
        $property = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'post_property');
        $other_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'other_details');
        $property_type = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'property_type');
        $residential = $property_type['residential'];
        $user_type = $property['user_type'];
        if($residential == 'DuplexFlat'){
            //Duplex Flat
            $duplex_flat_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'duplex_flat_details');
            $result = array_merge($property, $other_details, $property_type, $duplex_flat_details);
        }elseif($residential == 'PentHouse'){
        //Pent House
            $pent_house_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'pent_house_details');
            $result = array_merge($property, $other_details, $property_type, $pent_house_details);
        }elseif($residential == 'Factory'){
            //Factory Rent
            $factory_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'factory_details');
            $result = array_merge($property, $other_details, $property_type, $factory_details);
        }elseif($residential == 'Flat'){
            //Flat Rent
            $flat_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'flat_details');
            $result = array_merge($property, $other_details, $property_type, $flat_details);
        }elseif($residential == 'HouseorBanglow'){
            //House Rent
            $house_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'house_details');
            $result = array_merge($property, $other_details, $property_type, $house_details);
        }elseif($residential == 'Land'){
            //Land Rent
            $land_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'land_details');
            $result = array_merge($property, $other_details, $property_type, $land_details);
        }elseif($residential == 'Office'){
            //Office Rent
            $office_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'office_details');
            $result = array_merge($property, $other_details, $property_type, $office_details);
        }elseif($residential == 'ShopOrShowroom'){
            //Shop Rent
            $shop_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'shop_details');
            $result = array_merge($property, $other_details, $property_type, $shop_details);
        }elseif($residential == 'Warehouse'){
            //Warehouse Rent
            $warehouse_details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'warehouse_details');
            $result = array_merge($property, $other_details, $property_type, $warehouse_details);
        }
        $amenities = array();
        if($property_type['res_com'] == 'Residential'){
            $amenities = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'residential_amenities');
            $amenities = !empty($amenities) ? $amenities : array();
        }else{
            $amenities = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'commercial_amenities');
            $amenities = !empty($amenities) ? $amenities : array();
        }
        $result = array_merge($result, $amenities);
        $post_user = array();
        if($user_type == 'Owner' || $user_type == 'Builder' || $user_type == 'Agent'){
            $user = $this->Common_model->getarraydatabyid(array('user_id'=>$property['user_id']),'users');
            $post_user = array('posted_by'=>$user['name'],'posted_by_email'=>$user['email'], 'posted_by_mobile'=>$user['phone']);
        }elseif($user_type == 'lead_partner'){
            $user = $this->Common_model->getarraydatabyid(array('user_id'=>$property['user_id']),'lead_partners');
            $post_user = array('posted_by'=>$user['name'],'posted_by_email'=>$user['email'], 'posted_by_mobile'=>$user['phone']);
         }elseif($user_type == 'Super Admin' || $user_type == 'Admin'){
            $user  = $this->Common_model->getarraydatabyid(array('user_id'=>$property['user_id']),'admin_users');
            $post_user = array('posted_by'=>@$user['name'],'posted_by_email'=>@$user['email'], 'posted_by_mobile'=>@$user['mobile']);
        }
        if(!empty($post_user))
        $result = array_merge($result, $post_user);
        // pre($result);
        echo json_encode($result);
    }
    
    /*function delete_buyer($post_id){
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('post_id'=>$post_id),'post_requirement'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Deleted!');
        }
        redirect('property/buyer_residential_sale_flat');
    }*/
    
    function delete_buyer(){
        $post = $this->input->post();
        $post_id = $post['delete_buyer_post_id'];
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('post_id'=>$post_id),'post_requirement'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Deleted!');
        }
        redirect($post['redirect_url']);
    }
    
    
    
    
    // Seller Residential Sale Flat
    function seller_residential_sale_flat()
    { 
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['flat_list'] = $this->Common_model->get_residential_flat_list('Sell', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['buyer_list'] = $this->Common_model->getdata(array('status'=>1,'is_deleted'=>0, 'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Flat'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['flat_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/flat', $data);
    }
    

    function seller_residential_sale_flat_not_int()
    { 
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['flat_list'] = $this->Common_model->get_residential_flat_list('Sell',0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['buyer_list'] = $this->Common_model->getdata(array('status'=>1,'is_deleted'=>0, 'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Flat'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['flat_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['location_list']);
        $this->BackendView('admin/seller/residential/flat_not_int', $data);
    }
    
    function seller_residential_sale_house_bunglow()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['house_list'] = $this->Common_model->get_residential_house_bunglow_list('Sell',1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'HouseOrBanglow'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['house_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/house_bunglow', $data);
    }

    function seller_residential_sale_house_bunglow_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['house_list'] = $this->Common_model->get_residential_house_bunglow_list('Sell',0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'HouseOrBanglow'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['house_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/house_bunglow_not_int', $data);
    }
    
    function seller_residential_sale_pent_house()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['pent_house_list'] = $this->Common_model->get_residential_pent_house_list('Sell', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'PentHouse'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['pent_house_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['pent_house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['pent_house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/pent_house', $data);
    }

    function seller_residential_sale_pent_house_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['pent_house_list'] = $this->Common_model->get_residential_pent_house_list('Sell', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'PentHouse'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['pent_house_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['pent_house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['pent_house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/pent_house_not_int', $data);
    }
    
    
    function seller_residential_sale_duplex_flat()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['flat_list'] = $this->Common_model->get_residential_duplex_flat_list('Sell', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'DuplexFlat'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['flat_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/duplex_flat', $data);
    }

    function seller_residential_sale_duplex_flat_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['flat_list'] = $this->Common_model->get_residential_duplex_flat_list('Sell', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'DuplexFlat'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['flat_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/duplex_flat_not_int', $data);
    }
    
    function seller_residential_sale_land()
    {
        $data = $this->commonpage_data();
        $data = $this->get_inactive_records();
        $data['rent_sell'] = 'Sell';
        $data['land_list'] = $this->Common_model->get_residential_land_list('Sell', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Land'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['land_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/land', $data);
    }

    function seller_residential_sale_land_not_int()
    {
        $data = $this->commonpage_data();
        $data = $this->get_inactive_records();
        $data['rent_sell'] = 'Sell';
        $data['land_list'] = $this->Common_model->get_residential_land_list('Sell', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Land'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['land_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/land_not_int', $data);
    }
    
    function seller_residential_rent_flat()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['flat_list'] = $this->Common_model->get_residential_flat_list('Rent', 1);
        // pre($this->db->last_query());
        // pre($data['flat_list']);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('status'=>1,'is_deleted'=>0, 'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Flat'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        

        foreach($data['flat_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        $this->BackendView('admin/seller/residential/flat', $data);
    }

    function seller_residential_rent_flat_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['flat_list'] = $this->Common_model->get_residential_flat_list('Rent', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('status'=>1,'is_deleted'=>0, 'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Flat'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        foreach($data['flat_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/flat_not_int', $data);
    }
    
    function seller_residential_rent_house_bunglow()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['house_list'] = $this->Common_model->get_residential_house_bunglow_list('Rent',1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'HouseOrBanglow'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['house_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/house_bunglow', $data);
    }

    function seller_residential_rent_house_bunglow_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['house_list'] = $this->Common_model->get_residential_house_bunglow_list('Rent',0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'HouseOrBanglow'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['house_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/house_bunglow_not_int', $data);
    } 
    
    function seller_residential_rent_pent_house()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['pent_house_list'] = $this->Common_model->get_residential_pent_house_list('Rent', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'PentHouse'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['pent_house_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['pent_house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['pent_house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/pent_house', $data);
    }

    
    function seller_residential_rent_pent_house_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['pent_house_list'] = $this->Common_model->get_residential_pent_house_list('Rent', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'PentHouse'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['pent_house_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['pent_house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['pent_house_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/pent_house_not_int', $data);
    }
    
    function seller_residential_rent_duplex_flat()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['flat_list'] = $this->Common_model->get_residential_duplex_flat_list('Rent', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'DuplexFlat'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['flat_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/duplex_flat', $data);
    }

    function seller_residential_rent_duplex_flat_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['flat_list'] = $this->Common_model->get_residential_duplex_flat_list('Rent', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'DuplexFlat'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['flat_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/duplex_flat_not_int', $data);
    }
    
    function seller_residential_rent_land()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['land_list'] = $this->Common_model->get_residential_land_list('Rent', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'Land'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['land_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/land', $data);
    }

    function seller_residential_rent_land_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['land_list'] = $this->Common_model->get_residential_land_list('Rent', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Residential', 'rent_sell'=>'Rent', 'residential'=>'Land'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['land_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/residential/land_not_int', $data);
    }
    
    function seller_commercial_sale_land()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['land_list'] = $this->Common_model->get_commercial_land_list('Sell', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'Land'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['land_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/land', $data);
    }

    function seller_commercial_sale_land_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['land_list'] = $this->Common_model->get_commercial_land_list('Sell', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'Land'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['land_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/land_not_int', $data);
    }
    
    function seller_commercial_sale_office()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['office_list'] = $this->Common_model->get_commercial_office_list('Sell', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'Office'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['office_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['office_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['office_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/office', $data);
    }

    function seller_commercial_sale_office_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['office_list'] = $this->Common_model->get_commercial_office_list('Sell', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'Office'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['office_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['office_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['office_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/office_not_int', $data);
    }
    
    function seller_commercial_sale_shop_showroom()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['shop_showroom_list'] = $this->Common_model->get_commercial_shop_showroom_list('Sell', 1);
        // pre($data['shop_showroom_list']);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'ShopShowroom'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['shop_showroom_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['shop_showroom_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['shop_showroom_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/shop_showroom', $data);
    }

    function seller_commercial_sale_shop_showroom_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['shop_showroom_list'] = $this->Common_model->get_commercial_shop_showroom_list('Sell', 0);
        // pre($data['shop_showroom_list']);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'ShopShowroom'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['shop_showroom_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['shop_showroom_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['shop_showroom_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/shop_showroom_not_int', $data);
    }
    
    function seller_commercial_sale_warehouse()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['warehouse_list'] = $this->Common_model->get_commercial_warehouse_list('Sell', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'Warehouse'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['warehouse_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['warehouse_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['warehouse_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/warehouse', $data);
    }

    function seller_commercial_sale_warehouse_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['warehouse_list'] = $this->Common_model->get_commercial_warehouse_list('Sell', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'Warehouse'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['warehouse_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['warehouse_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['warehouse_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/warehouse_not_int', $data);
    }
    
    function seller_commercial_sale_factory()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['factory_list'] = $this->Common_model->get_commercial_factory_list('Sell', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'Factory'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['factory_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['factory_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['factory_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/factory', $data);
    }

    function seller_commercial_sale_factory_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        $data['factory_list'] = $this->Common_model->get_commercial_factory_list('Sell', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Sell', 'residential'=>'Factory'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['factory_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['factory_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['factory_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/factory_not_int', $data);
    }
    
    
    
    function seller_commercial_rent_land()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['land_list'] = $this->Common_model->get_commercial_land_list('Rent', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'Land'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['land_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/land', $data);
    }

    function seller_commercial_rent_land_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['land_list'] = $this->Common_model->get_commercial_land_list('Rent', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'Land'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['land_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['land_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/land_not_int', $data);
    }
    
    function seller_commercial_rent_office()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['office_list'] = $this->Common_model->get_commercial_office_list('Rent', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'Office'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['office_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['office_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['office_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/office', $data);
    }

    function seller_commercial_rent_office_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['office_list'] = $this->Common_model->get_commercial_office_list('Rent', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'Office'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['office_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['office_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['office_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/office_not_int', $data);
    }
    
    function seller_commercial_rent_shop_showroom()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['shop_showroom_list'] = $this->Common_model->get_commercial_shop_showroom_list('Rent', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'ShopShowroom'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['shop_showroom_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['shop_showroom_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['shop_showroom_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/shop_showroom', $data);
    }

    function seller_commercial_rent_shop_showroom_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['shop_showroom_list'] = $this->Common_model->get_commercial_shop_showroom_list('Rent', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'ShopShowroom'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['shop_showroom_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['shop_showroom_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['shop_showroom_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/shop_showroom_not_int', $data);
    }
    
    function seller_commercial_rent_warehouse()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['warehouse_list'] = $this->Common_model->get_commercial_warehouse_list('Rent', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'Warehouse'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['warehouse_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['warehouse_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['warehouse_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/warehouse', $data);
    }

    function seller_commercial_rent_warehouse_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['warehouse_list'] = $this->Common_model->get_commercial_warehouse_list('Rent', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'Warehouse'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['warehouse_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['warehouse_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['warehouse_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/warehouse_not_int', $data);
    }
    
    function seller_commercial_rent_factory()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['factory_list'] = $this->Common_model->get_commercial_factory_list('Rent', 1);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'Factory'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['factory_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['factory_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['factory_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/factory', $data);
    }

    function seller_commercial_rent_factory_not_int()
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Rent';
        $data['factory_list'] = $this->Common_model->get_commercial_factory_list('Rent', 0);
        $data['state_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'state');
        $data['location_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'location');
        $data['buyer_list'] = $this->Common_model->getdata(array('is_deleted'=>0,'residential_commercial'=>'Commercial', 'rent_sell'=>'Rent', 'residential'=>'Factory'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['factory_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['factory_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['factory_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        // pre($data['flat_list']);
        $this->BackendView('admin/seller/commercial/factory_not_int', $data);
    }
    
    
    function save_seller()
    {
        
        $post = $this->input->post(); //pre($post);
        $post_id = $post['post_id'];
        $image_name = @$post['prevUploadImages'];
        if($post_id == 0){
                $random_name = rand(10000,999999);
                $maxid = $this->Common_model->selectmaxid('post_id', array(), 'post_property');
                $newmaxid = $maxid+1;
                // $dataInfo = array();
                $dataInfo = !empty($post['prev_image']) ? explode(';',$post['prev_image']) : array();
                /*if(!empty($_FILES['UploadImages'])){
                    if (!is_dir('./Uploads/user_post_images/')) 
                    {
                        mkdir('./Uploads/user_post_images/', 0777, TRUE);
                    }
                    if (!is_dir('./Uploads/user_property_images/'.$newmaxid.'/')) 
                    {
                        mkdir('./Uploads/user_property_images/'.$newmaxid.'/', 0777, TRUE);
                    }
                    $files = $_FILES;
                    $mum_files = count($files['UploadImages']);
                    for($i=0; $i<$mum_files; $i++)
                    {
                        $random_name = rand(10000,999999);
                        if ( isset($files['UploadImages']['name'][$i]) ) {
        
                            $config['file_name'] = $random_name;
                            if($i==0){
                                $config['upload_path'] = './Uploads/user_post_images';
                            }else{
                                $config['upload_path'] = './Uploads/user_property_images/'.$newmaxid.'/';
                            }
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
                                    $dataInfo[] = './Uploads/user_property_images/'.$newmaxid.'/'.$info['file_name'];
                                }
                            }
        
                        }
                    }
                }else{
                    $image_name = $post['prevUploadImages'];
                }*/
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
                /*$random_name = rand(10000,999999);
                if(!empty($_FILES['UploadVideos'])){
                    if (!is_dir('./Uploads/user_post_videos/')) 
                    {
                        mkdir('./Uploads/user_post_videos/', 0777, TRUE);
                    }
                    $config['upload_path']          = './Uploads/user_post_videos';
                    $config['file_name']            = $random_name;
                    $config['allowed_types']        = '*';
                    $config['max_size']             = 0;
                    $config['max_width']            = 0;
                    $config['max_height']           = 0;
        
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('UploadVideos'))
                    {                    
                        $upload_data = $this->upload->data();
                        $video_name = "Uploads/user_post_videos/".$upload_data['file_name'];
                    }
                    else
                    {
                        // echo $this->upload->display_errors();
                        $video_name = $post['prevUploadVideos'];
                    }   
                }else{
                    $video_name = $post['prevUploadVideos'];
                }*/ 
                $nozero = 7 - strlen($maxid);
                $zeros = '';
                for($j=0;$j<$nozero;$j++){
                    $zeros .= '0';
                }
                $lead_id = "PRT".$zeros.$newmaxid;
                $data = array('user_id'=>$this->session->userdata('admin_id'),
                              'user_type'=>$this->session->userdata('user_type'),
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
                              'image_name'=>@$image_name,
                              'video_name'=>$post['video_name'],
                              'images'=>@$images,
                              'status'=>1,
                              'created'=>date('Y-m-d'),
                              'refresh_date'=>date('Y-m-d'),
                             );
                $post_id = $this->Common_model->insert_data('post_property', $data);
                // pre($post);
                //Property Type
                if($post['rent_sell'] == 'Rent'){
                    $data = array('post_id'=>$post_id,
                                  'rent_sell'=>$post['rent_sell'],
                                  'res_com'=>$post['res_com'],
                                  'FurnishedStatus'=>@$post['FurnishedStatus'],
                                  'residential'=>$post['residential'],
                                  'security_deposite'=>$post['security_deposite'],
                                  'rentPerMonth'=>$post['rentPerMonth'],
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('property_type', $data);
                }else{             
                    $data = array('post_id'=>$post_id,
                                  'rent_sell'=>$post['rent_sell'],
                                  'res_com'=>$post['res_com'],
                                  'FurnishedStatus'=>@$post['FurnishedStatus'],
                                  'residential'=>$post['residential'],
                                  'net_amount'=>$post['net_amount'],
                                  'amount'=>$post['amount'],
                                  'per_unit'=>!empty($post['per_unit']) ? $post['per_unit'] : '',
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('property_type', $data);
                }
                
                
                $residential = $post['residential'];
                $rent_sell = $post['rent_sell'];
                $res_com = $post['res_com'];
                if($residential == 'DuplexFlat'){
                    //Duplex Flat
                    $data = array('post_id'=>$post_id,
                                  'room'=>$post['room'],
                                  'bathroom'=>$post['bathroom'],
                                  'balcony'=>$post['balcony'],
                                  'kitchen'=>$post['kitchen'],
                                  'lower_floor_no'=>$post['lower_floor_no'],
                                  'upperfloorno'=>$post['upperfloorno'],
                                  'totalfloor'=>$post['totalfloor'],
                                  'super_buildup_area'=>$post['super_buildup_area'],
                                  'super_buildup_area_unit'=>$post['super_buildup_area_unit'],
                                  'buildup_area'=>$post['buildup_area'],
                                  'buildup_area_Unit'=>$post['buildup_area_Unit'],
                                  'carpet_area'=>$post['carpet_area'],
                                  'carpet_unit'=>$post['carpet_unit'],
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('duplex_flat_details', $data);
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_residential_rent_duplex_flat';
                    else
                        $redirect = 'property/seller_residential_sale_duplex_flat';
                }elseif($residential == 'PentHouse'){
                //Pent House
                $data = array('post_id'=>$post_id,
                              'pent_room'=>$post['pent_room'],
                              'pent_bathroom'=>$post['pent_bathroom'],
                              'pent_balcony'=>$post['pent_balcony'],
                              'pent_kitchen'=>$post['pent_kitchen'],
                              'pent_floor'=>$post['pent_floor'],
                              'total_floor'=>$post['total_floor'],
                              'pent_super_buildup_area'=>$post['pent_super_buildup_area'],
                              'pent_super_buildup_area_Unit'=>$post['pent_super_buildup_area_Unit'],
                              'pent_buildup_area'=>$post['pent_buildup_area'],
                              'pent_buildup_area_Unit'=>$post['pent_buildup_area_Unit'],
                              'pent_carpet_area'=>$post['pent_carpet_area'],
                              'pent_carpet_unit'=>$post['pent_carpet_unit'],
                              'open_terrace'=>$post['open_terrace'],
                              'pent_open_terrace_unit'=>$post['pent_open_terrace_unit'],
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->Common_model->insert_data('pent_house_details', $data);
                $redirect = 'property/seller_residential_sale_pent_house';
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_residential_rent_pent_house';
                    else
                        $redirect = 'property/seller_residential_sale_pent_house';
                }elseif($residential == 'Factory'){
                    //Factory Rent
                    $data = array('post_id'=>$post_id,'factory_numberofcabin'=>$post['factory_numberofcabin'],
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
                                  'factory_Bathroom_UsedFor'=>$post['factory_Bathroom_UsedFor'],
                                  'factory_HeavyVehicleParkingUpto'=>$post['factory_HeavyVehicleParkingUpto'],
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('factory_details', $data);
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_commercial_rent_factory';
                    else
                        $redirect = 'property/seller_commercial_sale_factory';
                }elseif($residential == 'Flat'){
                    //Flat Rent
                    $data = array('post_id'=>$post_id,
                                  'flat_Room'=>$post['flat_Room'],
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
                                //   'flat_HeavyVehicleParkingUpto'=>$post['flat_HeavyVehicleParkingUpto'],
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('flat_details', $data);
                    $redirect = 'property/seller_residential_sale_flat';
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_residential_rent_flat';
                    else
                        $redirect = 'property/seller_residential_sale_flat';
                }elseif($residential == 'HouseorBanglow'){
                    //House Rent
                    $data = array('post_id'=>$post_id,
                                  'house_Room'=>$post['house_Room'],
                                  'house_Bathroom'=>$post['house_Bathroom'],
                                  'house_Balcony'=>$post['house_Balcony'],
                                  'house_Kitchen'=>$post['house_Kitchen'],
                                  'house_TotalFloor'=>$post['house_TotalFloor'],
                                  'house_SuperBuildupArea'=>$post['house_SuperBuildupArea'],
                                  'house_SuperBuildupArea_Unit'=>$post['house_SuperBuildupArea_Unit'],
                                  'house_BuildupArea'=>$post['house_BuildupArea'],
                                  'house_BuildupAreaUnit'=>$post['house_BuildupAreaUnit'],
                                  
                                  'house_CarpetArea'=>$post['house_CarpetArea'],
                                   'house_Carpet_Unit'=>$post['house_Carpet_Unit'],
                                   'house_TotalLandArea'=>$post['house_TotalLandArea'],
                                   'house_TotalLandArea_Unit'=>$post['house_TotalLandArea_Unit'],
                                   'house_TotalUncoveredLandArea'=>$post['house_TotalUncoveredLandArea'],
                                  'house_TotalUncoveredLandArea_Unit'=>$post['house_TotalUncoveredLandArea_Unit'],
                                  'house_TotalCoveredLandArea'=>$post['house_TotalCoveredLandArea'],
                                  'house_TotalCoveredLandArea_unit'=>$post['house_TotalCoveredLandArea_unit'],
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('house_details', $data);
                    $redirect = 'property/seller_residential_sale_house_bunglow';
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_residential_rent_house_bunglow';
                    else
                        $redirect = 'property/seller_residential_sale_house_bunglow';
                }elseif($residential == 'Land'){
                    //Land Rent
                    $data = array('post_id'=>$post_id,
                                   'LandArea'=>$post['LandArea'],
                                  'land_SuperBuildupArea_Unit'=>$post['land_SuperBuildupArea_Unit'],
                                  'landCoveredArea'=>$post['landCoveredArea'],
                                  'landCoveredAreaUnit'=>$post['landCoveredAreaUnit'],
                                  'LandRoadWide'=>$post['LandRoadWide'],
                                  'LandRoadWideUnit'=>$post['LandRoadWideUnit'],
                                  'LandStatus'=>$post['LandStatus'],
                                  'IstheExistingOwner'=>$post['IstheExistingOwner'],
                                  'NatureofLand'=>$post['NatureofLand'],
                                  'NoOfOwner'=>$post['NoOfOwner'],
                                  'PropertyTax'=>$post['PropertyTax'],
                                  'Mutation'=>$post['Mutation'],
                                  'LandFacing'=>$post['LandFacing'],
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('land_details', $data);
                    $redirect = 'property/seller_residential_sale_land';
                    if($res_com == 'Residential'){
                        if($rent_sell == 'Rent')
                            $redirect = 'property/seller_residential_rent_land';
                        else
                            $redirect = 'property/seller_residential_sale_land';
                    }else{
                        if($rent_sell == 'Rent')
                            $redirect = 'property/seller_commercial_rent_land';
                        else
                            $redirect = 'property/seller_commercial_sale_land';
                    }
                    
                }elseif($residential == 'Office'){
                    //Office Rent
                    $data = array('post_id'=>$post_id,
                                  'officeNumberofCabin'=>$post['officeNumberofCabin'],
                                  'officeNumberofWorkStation'=>$post['officeNumberofWorkStation'],
                                  'officeSuperBuildupArea'=>$post['officeSuperBuildupArea'],
                                  'officeSuperBuildupAreaUnit'=>$post['officeSuperBuildupAreaUnit'],
                                  'officeBuildupArea'=>$post['officeBuildupArea'],
                                  'officeBuildupAreaUnit'=>$post['officeBuildupAreaUnit'],
                                  'officeCarpetArea'=>$post['officeCarpetArea'],
                                  'officeCarpetUnit'=>$post['officeCarpetUnit'],
                                  'officeAC'=>$post['officeAC'],
                                  'Flooroffice'=>$post['Flooroffice'],
                                  'officeTotalFloor'=>$post['officeTotalFloor'],
                                  'Pentryoffice'=>$post['Pentryoffice'],
                                  'PentryofficeUsedFor'=>$post['PentryofficeUsedFor'],
                                  'officeBathroom'=>$post['officeBathroom'],
                                  'BathroomofficeUsedFor'=>$post['BathroomofficeUsedFor'],
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('office_details', $data);
                    $redirect = 'property/seller_commercial_sale_office';
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_commercial_rent_office';
                    else
                        $redirect = 'property/seller_commercial_sale_office';
                }elseif($residential == 'ShopOrShowroom'){
                    //Shop Rent
                    $data = array('post_id'=>$post_id,
                                  'shoproof'=>$post['shoproof'],
                                  'shopFrontage'=>$post['shopFrontage'],
                                  'shopFrontageUnit'=>$post['shopFrontageUnit'],
                                  'shopSuperBuildupArea'=>$post['shopSuperBuildupArea'],
                                  'shopSuperBuildupAreaUnit'=>$post['shopSuperBuildupAreaUnit'],
                                  'shopBuildupArea'=>$post['shopBuildupArea'],
                                  'shopBuildupAreaUnit'=>$post['shopBuildupAreaUnit'],
                                  'shopCoveredArea'=>$post['shopCoveredArea'],
                                  'shopCoveredAreaUnit'=>$post['shopCoveredAreaUnit'],
                                  'shopOpenArea'=>$post['shopOpenArea'],
                                  'shopOpenAreaUnit'=>$post['shopOpenAreaUnit'],
                                  'shopFloor'=>$post['shopFloor'],
                                  'shopTotalFloor'=>$post['shopTotalFloor'],
                                  'shopBathroom'=>$post['shopBathroom'],
                                  'shopBathroomUnit'=>$post['shopBathroomUnit'],
                                  'shopPentry'=>$post['shopPentry'],
                                  'shopPentryUsedFor'=>$post['shopPentryUsedFor'],
                                  'shopRoadWide'=>$post['shopRoadWide'],
                                  'shopRoadWideUnit'=>$post['shopRoadWideUnit'],
                                  'shopElectricPower'=>$post['shopElectricPower'],
                                  'shopElectricPowerUnit'=>$post['shopElectricPowerUnit'],
                                  'shopAvailableForBar'=>$post['shopAvailableForBar'],
                                  'shopForResturant'=>$post['shopForResturant'],
                                  'shopHeavyVehicleParkingUpto'=>$post['shopHeavyVehicleParkingUpto'],
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('shop_details', $data);
                    $redirect = 'property/seller_commercial_sale_shop_showroom';
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_commercial_rent_shop_showroom';
                    else
                        $redirect = 'property/seller_commercial_sale_shop_showroom';
                }elseif($residential == 'Warehouse'){
                    //Warehouse Rent
                    $data = array('post_id'=>$post_id,
                                  'warehouseNumberofCabin'=>$post['warehouseNumberofCabin'],
                                  'warehouseSuperBuildupArea'=>$post['warehouseSuperBuildupArea'],
                                  'warehouseSuperBuildupAreaUnit'=>$post['warehouseSuperBuildupAreaUnit'],
                                  'warehouseCoveredArea'=>$post['CoveredArea'],
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
                    $res = $this->Common_model->insert_data('warehouse_details', $data);
                    $redirect = 'property/seller_commercial_sale_warehouse';
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_commercial_rent_warehouse';
                    else
                        $redirect = 'property/seller_commercial_sale_warehouse';
                }
                //Other info
                $data = array('post_id'=>$post_id,
                              'section'=>$post['section'],
                              'AgeofPropeety'=>$post['AgeofPropeety'],
                              'PossessionDate'=>date('Y-m-d',strtotime($post['PossessionDate'])),
                              'PropertyType'=>$post['PropertyType'],
                              'OpenParking'=>!empty($post['OpenParking']) ? $post['OpenParking'] : 0,
                              'CoveredParking'=>!empty($post['CoveredParking']) ? $post['CoveredParking'] : 0,
                              'Basement'=>!empty($post['Basement']) ? $post['Basement'] : 0,
                              'LiftParking'=>!empty($post['LiftParking']) ? $post['LiftParking'] : 0,
                              'TwoWheeler'=>!empty($post['TwoWheeler']) ? $post['TwoWheeler'] : 0,
                              'created'=>date('Y-m-d'),
                             );
                $res = $this->Common_model->insert_data('other_details', $data);
        
                if($post['res_com'] == 'Commercial'){
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
                                  'comment'=>(!empty($post['comment'])) ?$post['comment'] :'' ,
                                  'created'=>date('Y-m-d'),
                                 );
                    $res = $this->Common_model->insert_data('commercial_amenities', $data);
                }else{
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
                    $res = $this->Common_model->insert_data('residential_amenities', $data);
                }
                if($res){
                    $this->session->set_flashdata('success', 'Saved!');
                }else{
                    $this->session->set_flashdata('error', 'Failed!');
                }
        }else{
            // pre($post);
            $oldimages = @$post['prevUploadImages'];
            if(!empty($_FILES['UploadImages'])){
                $dataInfo = array();
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
                $images =  !empty($dataInfo) ? implode(';', $dataInfo) : '';
                if($images != '')
                    $oldimages = $oldimages.';'.$images;
            }
            $data = array('name'=>$post['name'],
                          'mobile'=>$post['mobile'],
                          'phone'=>$post['phone'],
                          'mobile1'=>$post['mobile1'],
                          'email'=>$post['email'],
                          'state'=>$post['state'],
                          'location'=>@$post['location'],
                          'city'=>@$post['city'],
                          'complex_society_building'=>$post['complex_society_building'],
                          'address'=>$post['address'],
                          'blockno'=>$post['blockno'],
                          'landmark'=>$post['landmark'],
                          'flatno'=>$post['flatno'],
                          'pincode'=>$post['pincode'],
                          'images'=>$oldimages,
                          'video_name'=>$video_name);
            $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'post_property');
            $rent_sell = $post['rent_sell'];
                //Property Type
                if($rent_sell == 'Rent'){
                    $data = array('rent_sell'=>$post['rent_sell'],
                              'res_com'=>$post['res_com'],
                              'FurnishedStatus'=>$post['FurnishedStatus'],
                              'residential'=>$post['residential'],
                              'security_deposite'=>$post['security_deposite'],
                              'rentPerMonth'=>$post['rentPerMonth']);
                }else{
                    $data = array('rent_sell'=>$post['rent_sell'],
                              'res_com'=>$post['res_com'],
                              'FurnishedStatus'=>$post['FurnishedStatus'],
                              'residential'=>$post['residential'],
                              'net_amount'=>$post['net_amount'],
                              'amount'=>$post['amount'],
                              'per_unit'=>$post['per_unit']);
                }
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'property_type');
            
            $residential = $post['residential'];
            
            $res_com = $post['res_com'];
            if($residential == 'DuplexFlat'){
                //Duplex Flat
                $data = array('room'=>$post['room'],
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
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'duplex_flat_details');
                if($rent_sell == 'Rent')
                    $redirect = 'property/seller_residential_rent_duplex_flat';
                else
                    $redirect = 'property/seller_residential_sale_duplex_flat';
            }elseif($residential == 'PentHouse'){
            //Pent House
            $data = array('pent_room'=>$post['pent_room'],
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
            $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'pent_house_details');
                if($rent_sell == 'Rent')
                    $redirect = 'property/seller_residential_rent_pent_house';
                else
                    $redirect = 'property/seller_residential_sale_pent_house';
            }elseif($residential == 'Factory'){
                //Factory Rent
                $data = array('factory_numberofcabin'=>$post['factory_numberofcabin'],
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
                              'factory_Bathroom_UsedFor'=>$post['factory_Bathroom_UsedFor'],
                              'factory_HeavyVehicleParkingUpto'=>$post['factory_HeavyVehicleParkingUpto']);
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'factory_details');
                if($rent_sell == 'Rent')
                    $redirect = 'property/seller_commercial_rent_factory';
                else
                    $redirect = 'property/seller_commercial_sale_factory';
            }elseif($residential == 'Flat'){
                //Flat Rent
                $data = array('flat_Room'=>@$post['flat_Room'],
                              'flat_Balcony'=>@$post['flat_Balcony'],
                              'flat_SuperBuildupArea'=>$post['flat_SuperBuildupArea'],
                              'flat_CarpetArea'=>$post['flat_CarpetArea'],
                              'flat_SuperBuildupAreaUnit'=>$post['flat_SuperBuildupAreaUnit'],
                              'flat_Carpet_Unit'=>$post['flat_Carpet_Unit'],
                              'flat_TotalFloor'=>$post['flat_TotalFloor'],
                              'flat_Bathroom'=>@$post['flat_Bathroom'],
                              'flat_Kitchen'=>@$post['flat_Kitchen'],
                              'flat_BuildupArea'=>$post['flat_BuildupArea'],
                              'flat_BuildupArea_Unit'=>$post['flat_BuildupArea_Unit'],
                              'flat_Floor'=>$post['flat_Floor'],
                              'flat_HeavyVehicleParkingUpto'=>@$post['flat_HeavyVehicleParkingUpto']);
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'flat_details');
                if($rent_sell == 'Rent')
                    $redirect = 'property/seller_residential_rent_flat';
                else
                    $redirect = 'property/seller_residential_sale_flat';
            }elseif($residential == 'HouseorBanglow'){
                //House Rent
                $data = array('house_Room'=>$post['house_Room'],
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
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'house_details');
                if($rent_sell == 'Rent')
                    $redirect = 'property/seller_residential_rent_house_bunglow';
                else
                    $redirect = 'property/seller_residential_sale_house_bunglow';
            }elseif($residential == 'Land'){
                //Land Rent
                $data = array('LandArea'=>$post['LandArea'],
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
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'land_details');
                if($res_com == 'Residential'){
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_residential_rent_land';
                    else
                        $redirect = 'property/seller_residential_sale_land';
                }else{
                    if($rent_sell == 'Rent')
                        $redirect = 'property/seller_commercial_rent_land';
                    else
                        $redirect = 'property/seller_commercial_sale_land';
                }
                
            }elseif($residential == 'Office'){
                //Office Rent
                $data = array('officeNumberofCabin'=>$post['officeNumberofCabin'],
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
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'office_details');
                if($rent_sell == 'Rent')
                    $redirect = 'property/seller_commercial_rent_office';
                else
                    $redirect = 'property/seller_commercial_sale_office';
            }elseif($residential == 'ShopOrShowroom'){
                //Shop Rent
                $data = array('shoproof'=>$post['shoproof'],
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
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'shop_details');
                if($rent_sell == 'Rent')
                    $redirect = 'property/seller_commercial_rent_shop_showroom';
                else
                    $redirect = 'property/seller_commercial_sale_shop_showroom';
            }elseif($residential == 'Warehouse'){
                //Warehouse Rent
                $data = array('warehouseNumberofCabin'=>$post['warehouseNumberofCabin'],
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
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'warehouse_details');
                if($rent_sell == 'Rent')
                    $redirect = 'property/seller_commercial_rent_warehouse';
                else
                    $redirect = 'property/seller_commercial_sale_warehouse';
            }
                //Other info
                $data = array('section'=>@$post['section'],
                              'AgeofPropeety'=>@$post['AgeofPropeety'],
                              'PossessionDate'=>date('Y-m-d',strtotime($post['PossessionDate'])),
                              'PropertyType'=>$post['PropertyType'],
                              'OpenParking'=>$post['OpenParking'],
                              'CoveredParking'=>$post['CoveredParking'],
                              'Basement'=>$post['Basement'],
                              'LiftParking'=>$post['LiftParking'],
                              'TwoWheeler'=>$post['TwoWheeler']);
                $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'other_details');
        
                if($res_com == 'Commercial'){
                    //AMENITIES FOR COMMERCIAL
                    $data = array('PowerBackup'=>(!empty($post['PowerBackup'])) ? 1 : 0,
                                  'ServiveLift'=>(!empty($post['ServiveLift'])) ? 1 : 0,
                                  'Intercom'=>(!empty($post['Intercom'])) ? 1 : 0,
                                  'CCTV'=>(!empty($post['CCTV'])) ? 1 : 0,
                                  'Lift'=>(!empty($post['Lift'])) ? 1 : 0,
                                  'WIFI'=>(!empty($post['WIFI'])) ? 1 : 0,
                                  'VisitorParking'=>(!empty($post['VisitorParking'])) ? 1 : 0,
                                  'Security'=>(!empty($post['Security'])) ? 1 : 0,
                                  'comment'=>$post['comment']);
                    $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'commercial_amenities');
                }else{
                    //AMENITIES FOR RESIDENTIAL ONLY
                    // pre($post);
                    $data = array('PowerBackup'=>(!empty($post['PowerBackup'])) ? 1 : 0,
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
                    $res = $this->Common_model->update($data, array('post_id'=>$post_id), 'residential_amenities');
                }
        }
        redirect($redirect);
    }
    
    
    
    function delete_property(){
        $post_id = $this->input->post('delete_seller_post_id');
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('post_id'=>$post_id),'post_property'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Record Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not Deleted!');
        }
        redirect($this->input->post('redirect_url'));
    }
    
    function approve_property($post_id){
        $result = $this->Common_model->update(array('status'=> 1, 'approved_by'=>$this->session->userdata('admin_id')), array('post_id'=>$post_id),'post_property'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Record updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not updated!');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    function reject_property($post_id){
        $result = $this->Common_model->update(array('status'=> 2), array('post_id'=>$post_id),'post_property'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Record updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not updated!');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    function verify($post_id)
    {
        $result = $this->Common_model->update(array('is_show' => 1), array('post_id'=>$post_id),'post_property'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Record updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not updated!');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    function save_seller_not_interested(){
        $post = $this->input->post();
        $seller_not_interested_post_id = $post['seller_not_interested_post_id'];
        $reason = $post['reason'];
        $update_data = array('interested_flag'=>0,'not_interested_reason'=>$reason, 'status'=>0);
        $result = $this->Common_model->update($update_data, array('post_id'=>$seller_not_interested_post_id),'post_property'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Seller status changed Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Seller status Not changed!');
        }
        redirect($post['redirect_url']);
    }

    function save_seller_to_interested(){
        $post = $this->input->post();
        $save_seller_to_interested_post_id = $post['save_seller_to_interested_post_id'];
        $update_data = array('interested_flag'=>1,'status'=>1);
        $result = $this->Common_model->update($update_data, array('post_id'=>$save_seller_to_interested_post_id),'post_property'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Seller status changed Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Seller status Not changed!');
        }
        redirect($post['redirect_url']);
    }

    function projects($option='')
    {
        $data = $this->commonpage_data();
        if($option == 'new-builder-projects'){
            $data['project_list'] = $this->Common_model->getdataorderby(array('is_deleted'=>0, 'status'=>0, 'user_type'=>'Builder'), 'post_project', "'post_id' DESC");
        }else{
            $data['project_list'] = $this->Common_model->getdataorderby(array('is_deleted'=>0), 'post_project', "'post_id' DESC");
        }
        
        // pre($data['project_list']);
        $this->BackendView('admin/projects', $data);
    }
    
    
    function add_project(){ 
        $post = $this->input->post();
        $post_id = $post['post_id'];
        // pre($_FILES);
        $image_name = '';
        $video_name = '';
        
        $maxid = $this->Common_model->selectmaxid('post_id', array(), 'post_project');
        $newpostid = $maxid+1;
        $dataInfo = !empty($post['prev_image']) ? explode(';',$post['prev_image']) : array();
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
        }else{
            $image_name = $post['prev_image'];
        }
        $images =  !empty($dataInfo) ? implode(';', $dataInfo) : '';
        // echo $image_name; exit;
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
        // echo $pdf_name; exit;
        if($post_id == 0){
                $maxid = $this->Common_model->selectmaxid('post_id', array(), 'post_project');
                $nozero = 7 - strlen($newpostid);
                $zeros = '';
                for($j=0;$j<$nozero;$j++){
                    $zeros .= '0';
                }
               // $lead_id = $this->RandomString().$zeros;
                $lead_id = "PRJ".$zeros.($maxid+1);
                $insert_data = array('user_id'=>$this->session->userdata('admin_id'),
                            'user_type'=>$this->session->userdata('user_type'),
                            'lead_id'=>$lead_id,
                            'PropertyStatus'=>$post['PropertyStatus'],
                            'sizestartingfrom'=>$post['sizestartingfrom'],
                            'sizestartingfromUnit'=>$post['sizestartingfromUnit'],
                            'bhk1'=>$post['bhk1'],
                            'bhk2'=>$post['bhk2'],
                            'startPrice'=>$post['startPrice'],
                            'uptoPrice'=>$post['uptoPrice'],
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
                            'project_name' => $post['project_name'],
                            'Marketingby'=>$post['Marketingby'],
                            'section'=>$post['section'],
                            'AgeofPropeety'=>$post['AgeofPropeety'],
                            'PossessionDate'=>date('Y-m-d',strtotime($post['PossessionDate'])),
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
                            'video_file'=>$video_name,
                            'images'=>$images,
                            'is_deleted'=>0,
                            'created'=>date('Y-m-d H:i:s'),
                            'refresh_date'=>date('Y-m-d', strtotime('+3 months')),
                        );
                $res = $this->Common_model->insert_data('post_project', $insert_data);
                
                if(!empty($post['state']) && $post['state'] != ''){ 
                    $state = $this->Common_model->getdatabyid(array('name'=>$post['state']),'state');
                    if(empty($state)){ $this->Common_model->insert_data('state', array('name'=>$post['state'], 'status'=>1)); }
                }
                
                if(!empty($post['location']) && $post['location'] != ''){ 
                    $location = $this->Common_model->getdatabyid(array('name'=>$post['location']),'location');
                    if(empty($location)){ $this->Common_model->insert_data('location', array('name'=>$post['location'], 'status'=>1)); }
                }
                $state = $this->Common_model->getdatabyid(array('name'=>$post['state']),'state');
                if(!empty($post['city']) && $post['city'] != ''){
                    $city = $this->Common_model->getdatabyid(array('name'=>$post['city']),'city');
                    if(empty($city)){
                        $state = $this->Common_model->getdatabyid(array('name'=>$post['state']),'state');
                        $this->Common_model->insert_data('city', array('name'=>$post['city'], 'state_id'=>!empty($state) ? $state->id : 0,'status'=>1));
                    }
                }
                if(!empty($post['pincode']) && $post['pincode'] != ''){
                    $pincode = $this->Common_model->getdatabyid(array('pincode'=>$post['pincode']),'pincode');
                    if(empty($pincode)){
                        $city = $this->Common_model->getdatabyid(array('name'=>$post['city']),'city');
                        $this->Common_model->insert_data('pincode', array('pincode'=>$post['pincode'], 'city_id'=>!empty($city) ? $city->id : 0, 'status'=>1));
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
                            'startPrice'=>$post['startPrice'],
                            'uptoPrice'=>$post['uptoPrice'],
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
                $res = $this->Common_model->update($update_data, array('post_id'=>$post_id), 'post_project');
                if($res){
                    $this->session->set_flashdata('success', 'Updated!');
                }else{
                    $this->session->set_flashdata('error', 'Failed!');
                }
            }
            redirect('property/projects');
    }
    
    public function edit_project(){
        $post_id = $this->input->post('post_id');
        $project = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'post_project');
        echo json_encode($project);
        //$this->Webview('home/post_project', $data);
    }
    
    function delete_project($post_id){
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('post_id'=>$post_id),'post_project'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Record Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not Deleted!');
        }
        redirect('property/projects');
    }
    
    function approve_project($post_id){
        $result = $this->Common_model->update(array('status'=> 1, 'approved_by'=>$this->session->userdata('admin_id')), array('post_id'=>$post_id),'post_project'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Record updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not updated!');
        }
        redirect('property/projects');
    }
    
    function reject_project($post_id){
        $result = $this->Common_model->update(array('status'=> 2), array('post_id'=>$post_id),'post_project'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Record updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not updated!');
        }
        redirect('property/projects');
    }
    
    
    
    //Buyer's Lead 
    
    public function buyers_lead($option = ''){
        $data = $this->commonpage_data();
        if($option == 'new'){
            $data['list_buyers_lead'] = $this->Common_model->getbuyerslead(0);
        }else{
           $data['list_buyers_lead'] = $this->Common_model->getbuyerslead(1); 
        }
        
        $this->BackendView('admin/leads/buyers_lead', $data);
    }
    
    
    public function sellers_lead($option = ''){
        $data = $this->commonpage_data();
        if($option == 'new'){
            $data['seller_lead_list'] = $this->Common_model->getsellerlead(0);
        }else{
            $data['seller_lead_list'] = $this->Common_model->getsellerlead(1);    
        }
        
        // pre($data['seller_lead_list']);
        $this->BackendView('admin/leads/sellers_lead', $data);
    }
    
    public function home_lead($option = '')
    {
        $data = $this->commonpage_data();
        if($option == 'new'){
            $data['list_home_loans'] = $this->Common_model->gethomeloanlead(0);
        }else{
            $data['list_home_loans'] = $this->Common_model->gethomeloanlead();
        }
        $this->BackendView('admin/leads/home_lead', $data);
    }
    
    
    function delete_home_loan(){
        $post = $this->input->post();
        $id = $post['delete_home_loan_id'];
        $result = $this->Common_model->update(array('is_deleted'=> 1), array('id'=>$id),'home_loan'); 
        if($result){ 
            $this->session->set_flashdata('success', 'Data Deleted Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data Not Deleted!');
        }
        redirect($post['redirect_url']);
    }
    
    function get_home_loan_details_by_id(){
        $post = $this->input->post();
        $id = $post['id'];
        $result = $this->Common_model->gethomeloandetailsbyid($id); 
        echo json_encode($result);
    }
    
    function save_home_loan(){
        $post = $this->input->post();
        // pre($post);
        if($post['id'] == 0){
            $maxid = $this->Common_model->selectmaxid('id', array(), 'home_loan');
            $nozero = 7 - strlen($maxid);
            $zeros = '';
            for($j=0;$j<$nozero;$j++){
                $zeros .= '0';
            }
            $lead_id = $this->RandomString().$zeros;
            $lead_id = 'HLN'.$zeros.($maxid+1);
            $insert_data = array('lead_id'=>$lead_id,
                                'name'=>$post['name'],
                                'mobile'=>$post['mobile'],
                                'mobile2'=>$post['mobile2'],
                                'email'=>$post['email'],
                                'country'=>$post['country'],
                                'state'=>$post['state'],
                                'city'=>$post['city'],
                                'location'=>$post['location'],
                                'Address'=>$post['Address'],
                                'pincode'=>$post['pincode'],
                                'companyname'=>$post['companyname'],
                                'LoanRequiredUpto'=>$post['LoanRequiredUpto'],
                                'bank'=>$post['bank'],
                                'annualIncome'=>$post['annualIncome'],
                                'comment'=>$post['comment'],
                                'created'=>date('Y-m-d H:i:s'));
            $result = $this->Common_model->insert_data('home_loan',$insert_data);  
            if($result){
                $this->session->set_flashdata('success', 'Data added Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not added!');
            }   
        }else{
             $update_data = array('name'=>$post['name'],
                                'mobile'=>$post['mobile'],
                                'mobile2'=>$post['mobile2'],
                                'email'=>$post['email'],
                                'country'=>$post['country'],
                                'state'=>$post['state'],
                                'city'=>$post['city'],
                                'location'=>$post['location'],
                                'Address'=>$post['Address'],
                                'pincode'=>$post['pincode'],
                                'companyname'=>$post['companyname'],
                                'LoanRequiredUpto'=>$post['LoanRequiredUpto'],
                                'bank'=>$post['bank'],
                                'annualIncome'=>$post['annualIncome'],
                                'comment'=>$post['comment']);
            $result = $this->Common_model->update($update_data, array('id'=>$post['id']), 'home_loan');  
            if($result){
                $this->session->set_flashdata('success', 'Data Updated Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Updated!');
            } 
        }
        redirect($post['redirect_url']);
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
    
    function get_buyer(){
        $result = array();
        $post = $this->input->post();
        $list_buyer = $this->Common_model->load_buyer($post['buyer']);
        // pre($this->db->last_query());
        foreach($list_buyer as $row){
            if($row->lead_id != ''){
                $result[] = $row->lead_id;
            }
        }
        echo json_encode($result);
    }
    
    function get_seller(){
        $result = array();
        $post = $this->input->post();
        $list_buyer = $this->Common_model->load_seller($post['seller']);
        foreach($list_buyer as $row){
            $result[] = $row->lead_id;
        }
        echo json_encode($result);
    }


    //Office
    function office()
    {
        $data = $this->commonpage_data();
        $data['list_office'] = $this->Common_model->getdata(array('is_deleted'=>0), 'office_rent_commercial');
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
       $this->BackendView('admin/change_password');
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
    
    function list_city()
    {
        $data = $this->commonpage_data();
        $data['list_city'] = $this->Common_model->getdata(array('is_deleted'=>0),'city');
        $data['list_state'] = $this->Common_model->getdata(array('country_id'=>101),'state');
        $this->BackendView('admin/list_city', $data);
    }
    
    function save_city()
    {
        $post = $this->input->post();
        $id = $post['id'];
        
        if($id == 0){
            $insert_data = array('name'=>$post['name'],'state_id'=>$post['state']);
            $result = $this->Common_model->insert_data('city',$insert_data);  
            if($result){
                $this->session->set_flashdata('success', 'Data Saved Successfully!');
            }else{
                $this->session->set_flashdata('error', 'Data Not Saved!');
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
    
    function activated_sub()
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('is_deleted' => 0, 'status' => 1),'subscriptions');
        $this->BackendView('admin/list_active_subscriptions', $data);
    }
    
    function add_subscriptions()
    {
        $data = $this->commonpage_data();
        $this->BackendView('admin/add_subscriptions', $data);
    }
    
    function save_subscription()
    {
        $form_data = $this->input->post(array('name', 'user_type', 'purpose', 'validity', 'listings', 'price'));
        $insert_data = array('name' => $form_data['name'], 'user_type'=>$form_data['user_type'],'purpose'=>$form_data['purpose'],
        'validity'=>$form_data['validity'], 'listings' => $form_data['listings'], 'price' => $form_data['price'], 'created_at'=>date('Y-m-d H:i:s'));
        $result = $this->Common_model->insert_data('subscriptions',$insert_data);  
        if($result){$this->session->set_flashdata('success', 'Data Saved Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Saved!');} 
        redirect('backend/activated_sub');
    }
    
    function edit_subscription($id)
    {
        $data = $this->commonpage_data();
        $data['active_sub'] = $this->Common_model->getdata(array('id' => $id),'subscriptions');
        $this->BackendView('admin/edit_subscriptions', $data);
    }
    
    function upate_subscription()
    {
        $form_data = $this->input->post(array('name', 'id', 'user_type', 'purpose', 'validity', 'listings', 'price'));
        $insert_data = array('name' => $form_data['name'], 'user_type'=>$form_data['user_type'],'purpose'=>$form_data['purpose'],
        'validity'=>$form_data['validity'], 'listings' => $form_data['listings'], 'price' => $form_data['price'], 'modified_at'=>date('Y-m-d H:i:s'));
        
        $result =$this->Common_model->update($insert_data, array('id'=>$form_data['id']), 'subscriptions');  
        if($result){$this->session->set_flashdata('success', 'Data Saved Successfully!');}
        else{$this->session->set_flashdata('error', 'Data Not Saved!');} 
        redirect('backend/activated_sub');
    }
    
    function delete_subscription($id)
    {
        $result =$this->Common_model->update(array('is_deleted' => 1), array('id'=>$id), 'subscriptions');  
        if($result){$this->session->set_flashdata('success', 'Record deleted Successfully!');}
        else{$this->session->set_flashdata('error', 'Record Not deleted!');}
        redirect('backend/activated_sub');
    }
    
    function save_property_interested_details()
    {
        $post =$this->input->post();
        // pre($post);
        $post_id = $post['seller_interested_post_id'];
        $agent_commission = 0;
        $floormantra_commision = 0;
        $executive_commision = 0;
        $caller_commision = 0;
        $property_user_type = '';
        $property_user_id = '';
        $agent_commission1 = 0;
        $floormantra_commision1 = 0;
        $executive_commision1 = 0;
        $caller_commision1 = 0;
        $buyer_user_type = '';
        $buyer_user_id = '';
        
        $result = $this->Common_model->getdatabyid(array('post_id'=>$post_id), 'post_property'); 
        if($result){
            $property_user_type = $result->user_type;
            $property_user_id = $result->user_id;
            if(!empty($post['interested_commission'])){
                if($property_user_type == 'Admin' || $property_user_type == 'Super Admin'|| $property_user_type == 'admin'){
                    $floormantra_commision = $post['interested_commission']/2;
                    $executive_commision = $post['interested_commission']/4;
                    $caller_commision = $post['interested_commission']/4;
                }elseif($property_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission = $post['interested_commission']/2;
                    $floormantra_commision = $post['interested_commission']/4;
                    $executive_commision = $post['interested_commission']/8;
                    $caller_commision = $post['interested_commission']/8;
                }
            }
        }
        
        
        $result = $this->Common_model->getdatabyid(array('post_id'=>$post['interested_buyer']), 'post_requirement'); 
        if($result){
            $buyer_user_type = $result->user_type;
            $buyer_user_id = $result->user_id;
            if(!empty($post['interested_commission1'])){
                if($buyer_user_type == 'Admin' || $buyer_user_type == 'Super Admin'|| $buyer_user_type == 'admin'){
                    $floormantra_commision1 = $post['interested_commission1']/2;
                    $executive_commision1 = $post['interested_commission1']/4;
                    $caller_commision1 = $post['interested_commission1']/4;
                }elseif($buyer_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission1 = $post['interested_commission1']/2;
                    $floormantra_commision1 = $post['interested_commission1']/4;
                    $executive_commision1 = $post['interested_commission1']/8;
                    $caller_commision1 = $post['interested_commission1']/8;
                }
            }
        }
        
        // pre($this->session->userdata['admin_id']);
        $maxid = $this->Common_model->selectmaxid('id', array(), 'property_interested_details');
        $newmaxid = $maxid+1;
        $nozero = 7 - strlen($maxid);
        $zeros = '';
        for($j=0;$j<$nozero;$j++){
            $zeros .= '0';
        }
        $deal_id = "DEAL".$zeros.$newmaxid;
        if($post['seller_interested_rent_sell'] == 'Sell'){
            $insert_data = array('deal_id'=>$deal_id,'post_id'=>$post['seller_interested_post_id'],'property_user_id'=>$property_user_id, 'property_user_type'=>$property_user_type,'post_type'=>'property', 'rent_sell'=>$post['seller_interested_rent_sell'], 
                             'buyer'=>$post['interested_buyer'],'buyer_user_id'=>$buyer_user_id, 'buyer_user_type'=>$buyer_user_type, 'amount'=>!empty($post['interested_amount']) ? $post['interested_amount'] : 0, 
                             'commission'=>$post['interested_commission'],'commission1'=>$post['interested_commission1'],
                             'agent_commission'=>$agent_commission, 'floormantra_commision'=>$floormantra_commision,'executive_commission'=>$executive_commision,'caller_commision'=>$caller_commision, 
                             'executive'=>!empty($post['interested_executive']) ? $post['interested_executive'] : 0, 'caller'=>!empty($post['interested_telecaller']) ? $post['interested_telecaller'] : 0, 
                             'agent_commission1'=>$agent_commission1, 'floormantra_commision1'=>$floormantra_commision1,'executive_commission1'=>$executive_commision1,'caller_commision1'=>$caller_commision1, 
                             'status'=>$post['interested_status'],'added_by'=>$this->session->userdata('admin_id'), 'created'=>date('y-m-d H:i:s'));
        }else{
            $insert_data = array('deal_id'=>$deal_id,'post_id'=>$post['seller_interested_post_id'],'property_user_id'=>$property_user_id, 'property_user_type'=>$property_user_type,'post_type'=>'property', 'rent_sell'=>$post['seller_interested_rent_sell'], 
                             'buyer'=>$post['interested_buyer'],'buyer_user_id'=>$buyer_user_id, 'buyer_user_type'=>$buyer_user_type, 'deposite'=>!empty($post['interested_deposite']) ? $post['interested_deposite'] : 0,'rent'=>!empty($post['interested_rent']) ? $post['interested_rent'] : 0, 'expiry_date'=>date('Y-m-d', strtotime(!empty($post['interested_expiry_date']) ? $post['interested_expiry_date'] : NULL)), 
                             'commission'=>$post['interested_commission'],'commission1'=>$post['interested_commission1'],
                             'agent_commission'=>$agent_commission, 'floormantra_commision'=>$floormantra_commision,'executive_commission'=>$executive_commision,'caller_commision'=>$caller_commision, 
                             'executive'=>!empty($post['interested_executive']) ? $post['interested_executive'] : 0, 'caller'=>!empty($post['interested_telecaller']) ? $post['interested_telecaller'] : 0, 'status'=>$post['interested_status'],
                             'agent_commission1'=>$agent_commission1, 'floormantra_commision1'=>$floormantra_commision1,'executive_commission1'=>$executive_commision1,'caller_commision1'=>$caller_commision1, 
                             'added_by'=>$this->session->userdata('admin_id'), 'created'=>date('y-m-d H:i:s'));
        }
        // pre($insert_data);
        $result = $this->Common_model->insert_data('property_interested_details',$insert_data);  
        if($result){
            $this->session->set_flashdata('success', 'Record Added Successfully!');
            if($post['interested_status'] == 'In Process'){
                $update_data = array('in_process_flag'=>1);
                $result =$this->Common_model->update($update_data, array('post_id'=>$post['seller_interested_post_id']), 'post_property'); 
                $result =$this->Common_model->update($update_data, array('post_id'=>$post['interested_buyer']), 'post_requirement'); 
            }
        }
        else{$this->session->set_flashdata('error', 'Record Not Added!');}
        redirect($post['redirect_url']);
    }
    
    
    function update_property_interested_details(){
        $post =$this->input->post(); 
        $id = $post['interested_details_id'];
        $post_id = $post['interested_post_id'];
        $agent_commission = 0;
        $floormantra_commision = 0;
        $executive_commision = 0;
        $caller_commision = 0;
        
        if(!empty($post['interested_commission'])){
            $result = $this->Common_model->getdatabyid(array('post_id'=>$post_id), 'post_property'); 
            if($result){
                $posted_by = $result->user_type;
                if($posted_by == 'Admin' || $posted_by == 'Super Admin'){
                    $floormantra_commision = $post['interested_commission']/2;
                    $executive_commision = $post['interested_commission']/4;
                    $caller_commision = $post['interested_commission']/4;
                }elseif($posted_by == 'Agent'){
                    $agent_commission = $post['interested_commission']/2;
                    $floormantra_commision = $post['interested_commission']/4;
                    $executive_commision = $post['interested_commission']/8;
                    $caller_commision = $post['interested_commission']/8;
                }
            }
        }
        
        if($post['interested_rent_sell'] == 'Sell'){
            $update_data = array('amount'=>!empty($post['interested_amount']) ? $post['interested_amount'] : 0, 'commission'=>!empty($post['interested_commission']) ? $post['interested_commission'] : 0,
                             'agent_commission'=>$agent_commission, 'floormantra_commision'=>$floormantra_commision,'executive_commission'=>$executive_commision,'caller_commision'=>$caller_commision, 
                             'executive'=>!empty($post['interested_executive']) ? $post['interested_executive'] : 0, 'caller'=>!empty($post['interested_telecaller']) ? $post['interested_telecaller'] : 0, 
                             'status'=>$post['interested_status']);
        }else{
            $update_data = array('deposite'=>!empty($post['interested_deposite']) ? $post['interested_deposite'] : 0,'rent'=>!empty($post['interested_rent']) ? $post['interested_rent'] : 0, 'expiry_date'=>date('Y-m-d', strtotime(!empty($post['interested_expiry_date']) ? $post['interested_expiry_date'] : NULL)), 
                             'commission'=>$post['interested_commission'], 'agent_commission'=>$agent_commission, 'floormantra_commision'=>$floormantra_commision,'executive_commission'=>$executive_commision,'caller_commision'=>$caller_commision, 
                             'executive'=>!empty($post['interested_executive']) ? $post['interested_executive'] : 0, 'caller'=>!empty($post['interested_telecaller']) ? $post['interested_telecaller'] : 0, 'status'=>$post['interested_status']);
        }
        $result =$this->Common_model->update($update_data, array('id'=>$post['interested_details_id']), 'property_interested_details'); 
        if($result){
            $this->session->set_flashdata('success', 'Record updated Successfully!');
            $update_data = array('in_process_flag'=>1);
            $result =$this->Common_model->update($update_data, array('post_id'=>$post_id), 'post_property'); 
            $result =$this->Common_model->update($update_data, array('post_id'=>$post['interested_buyer']), 'post_requirement'); 
        }
        else{$this->session->set_flashdata('error', 'Record Not updated!');}
        redirect('property/deal_interested');
    }
    
    function get_interested_details_by_id(){
        $post = $this->input->post();
        $result = $this->Common_model->getdatabyid(array('id'=>$post['id']), 'property_interested_details'); 
        echo json_encode($result);
    }
    
    function close_deal(){
        $post =$this->input->post(); 
        $id = $post['deal_details_id'];
        $received_amount = $post['received_amount'];
        $update_data = array('received_amount'=>$received_amount, 'status'=>'Closed');
        $result =$this->Common_model->update($update_data, array('id'=>$post['deal_details_id']), 'property_interested_details'); 
        if($result){$this->session->set_flashdata('success', 'Record updated Successfully!');}
        else{$this->session->set_flashdata('error', 'Record Not updated!');}
        redirect('property/deal_interested');
    }
    
    
    function deal_interested($type = 'Rent')
    {
        $data = $this->commonpage_data();
        $data['rent_sell'] = $type;
        if($type == 'Sale'){$type = 'Sell'; } 
        $data['seller_list'] = $this->Common_model->getpropertydata(array('status'=>1,'is_deleted'=>0,'rent_sell'=>$type), 'post_property');
        // $data['list_interested'] = $this->Common_model->getdealbystatus('interested');
        $list_interested = $this->Common_model->getdealbystatusandwhere('interested', array('interested.rent_sell'=>$type));
        // pre($list_interested);
        if(!empty($list_interested)){
            foreach($list_interested as $i=>$row){
                $lead_by_name = '';
                $lead_by = $row->buyer_user_id;
                $lead_by_type = $row->buyer_user_type;
                if($lead_by_type == 'Owner' || $lead_by_type == 'Agent'|| $lead_by_type == 'Builder'){
                    $result = $this->Common_model->getdatabyid(array('user_id'=>$lead_by), 'users'); 
                    if(!empty($result)){ $lead_by_name =  $result->name;}
                }
                if($lead_by_type == 'lead_partner'){
                    $result = $this->Common_model->getdatabyid(array('user_id'=>$lead_by), 'lead_partners'); 
                    if(!empty($result)){ $lead_by_name =  $result->name;}
                }
                if($lead_by_type == 'Super Admin' || $lead_by_type == 'Admin'){
                    $result = $this->Common_model->getdatabyid(array('user_id'=>$lead_by), 'admin_users'); 
                    if(!empty($result)){ $lead_by_name =  $result->name;}
                }
                $list_interested[$i]->lead_by_name = $lead_by_name;
            }
        }
        $data['list_interested'] = $list_interested;
        $data['buyer_list'] = $this->Common_model->getdata(array(), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        // pre($data['list_interested']);
        $this->BackendView('admin/deals/deal_interested', $data);
    }
    
    function deal_in_process($type = 'Rent')
    {
        if($type == 'Sale'){ $type = 'Sell'; }
        $data = $this->commonpage_data();
        $data['type'] = $type;
        $list_in_process = array();
        $list_interested = $this->Common_model->getdealbystatusandwhere('In Process', array('interested.rent_sell'=>$type));
        if(!empty($list_interested)){
            foreach($list_interested as $i=>$row){
                if($row->close_status1 ==0){
                    $lead_by_name = '';
                    $lead_by = $row->property_user_id;
                    $lead_by_type = $row->property_user_type;
                    if($lead_by_type == 'Owner' || $lead_by_type == 'Agent'|| $lead_by_type == 'Builder'){
                        $result = $this->Common_model->getdatabyid(array('user_id'=>$lead_by), 'users'); 
                        if(!empty($result)){ $lead_by_name =  $result->name;}
                    }
                    if($lead_by_type == 'lead_partner'){
                        $result = $this->Common_model->getdatabyid(array('user_id'=>$lead_by), 'lead_partners'); 
                        if(!empty($result)){ $lead_by_name =  $result->name;}
                    }
                    if($lead_by_type == 'Super Admin' || $lead_by_type == 'Admin'){
                        $result = $this->Common_model->getdatabyid(array('user_id'=>$lead_by), 'admin_users'); 
                        if(!empty($result)){ $lead_by_name =  $result->name;}
                    }
                    
                    $row1 = array('id'=>$row->id,'rent_sell'=>$row->rent_sell,'post_id'=>$row->post_id,'buyer'=>$row->buyer,'created'=>$row->created, 'deal_id'=>$row->deal_id,'type'=>'Owner','client_id'=>$row->buyer_lead, 'client_name'=>$row->buyer_name,
                                  'property_id'=>$row->lead_id, 'owner_name'=>$row->owner_name,'lead_by'=>$lead_by_type,'lead_by_name'=>$lead_by_name,'admin1'=>$row->executive_name, 
                                  'admin2'=>$row->caller_name,'commission'=>$row->commission,'commission1'=>$row->commission1,'deposite'=>$row->deposite,'rent'=>$row->rent,'amount'=>$row->amount,
                                  'expiry_date'=>$row->expiry_date,'extra_services'=>$row->extra_services,'owner_in_process_flag'=>$row->owner_in_process_flag,'client_in_process_flag'=>$row->client_in_process_flag);
                    
                    $list_in_process[] = $row1;
                }
                if($row->close_status2 ==0){
                    $lead_by_name = '';
                    $lead_by = $row->buyer_user_id;
                    $lead_by_type = $row->buyer_user_type;
                    if($lead_by_type == 'Owner' || $lead_by_type == 'Agent'|| $lead_by_type == 'Builder'){
                        $result = $this->Common_model->getdatabyid(array('user_id'=>$lead_by), 'users'); 
                        if(!empty($result)){ $lead_by_name =  $result->name;}
                    }
                    if($lead_by_type == 'lead_partner'){
                        $result = $this->Common_model->getdatabyid(array('user_id'=>$lead_by), 'lead_partners'); 
                        if(!empty($result)){ $lead_by_name =  $result->name;}
                    }
                    if($lead_by_type == 'Super Admin' || $lead_by_type == 'Admin'){
                        $result = $this->Common_model->getdatabyid(array('user_id'=>$lead_by), 'admin_users'); 
                        if(!empty($result)){ $lead_by_name =  $result->name;}
                    }
                    $lead_by_name = $lead_by_name;
                    $row1 = array('id'=>$row->id,'rent_sell'=>$row->rent_sell,'post_id'=>$row->post_id,'buyer'=>$row->buyer,'created'=>$row->created, 'deal_id'=>$row->deal_id,'type'=>'Client','client_id'=>$row->buyer_lead, 'client_name'=>$row->buyer_name,
                                  'property_id'=>$row->lead_id, 'owner_name'=>$row->owner_name,'lead_by'=>$lead_by_type,'lead_by_name'=>$lead_by_name, 'admin1'=>$row->executive_name, 
                                  'admin2'=>$row->caller_name,'commission'=>$row->commission1,'commission1'=>$row->commission,'deposite'=>$row->deposite,'rent'=>$row->rent,'amount'=>$row->amount,
                                  'expiry_date'=>$row->expiry_date,'extra_services'=>$row->extra_services,'owner_in_process_flag'=>$row->owner_in_process_flag,'client_in_process_flag'=>$row->client_in_process_flag);
                    
                    $list_in_process[] = $row1;
                }
            }
        }
        $data['list_interested'] = $list_in_process;
        // pre($data['list_interested']);
        $data['other_settings'] = $this->Common_model->getdatabyid(array('id'=>1), 'other_settings');
        $this->BackendView('admin/deals/deal_in_process', $data);
    }
    
    function deal_payment_pending()
    {
        $data = $this->commonpage_data();
        $data['list_pending_payment'] = $this->Common_model->getDealPaymentDetailsByStatus('Pending', array());
        // pre($data['list_pending_payment']);
        $this->BackendView('admin/deals/deal_payment_pending', $data);
    }
    
    function deal_closed($option = '')
    {
        $data = $this->commonpage_data();
        if($option == 'rent-out'){
            /*$data['list_interested'] = $this->Common_model->getdealbystatusandwhere('Closed', array('interested.rent_sell'=>'Rent'));*/
            $data['list_closed_payment'] = $this->Common_model->getDealPaymentDetailsByStatus('Close', array('interested.rent_sell'=>'Rent'));        
        }elseif($option == 'sold-out'){
            /*$data['list_interested'] = $this->Common_model->getdealbystatusandwhere('Closed', array('interested.rent_sell'=>'Sell'));*/
            $data['list_closed_payment'] = $this->Common_model->getDealPaymentDetailsByStatus('Close', array('interested.rent_sell'=>'Sell'));  
        }else{
            /*$data['list_interested'] = $this->Common_model->getdealbystatus('Closed');*/
            $data['list_closed_payment'] = $this->Common_model->getDealPaymentDetailsByStatus('Close', array()); 
        }
        // pre($this->db->last_query());
        // pre($data['list_closed_payment']);
        $this->BackendView('admin/deals/deal_closed', $data);
    }
    
    function deal_sold_out()
    {
        $data = $this->commonpage_data();
        $result = array();
        // $data['list_interested'] = $this->Common_model->getdealbystatusandwhere('Closed', array('interested.rent_sell'=>'Sell'));
        $list_sold_out = $this->Common_model->getDealPaymentDetailsByStatus('Close', array('interested.rent_sell'=>'Sell'));
        // pre($list_sold_out);
        foreach ($list_sold_out as $key => $value) {
            $party_name = '';
            $party_mobile = '';
            $party_email = '';
            if($value->deal_type == 'Client'){
                $lead_id = $value->property_user_id;
                $lead_by = $value->property_user_type;
                $party = $this->Common_model->getpropertydatabyid($value->post_id);
                if(!empty($party)){
                    $party_name = $party->name;
                    $party_mobile = $party->mobile;
                    $party_email = $party->email;
                }
            }else{
                $lead_id = $value->buyer_user_id;
                $lead_by = $value->buyer_user_type;
                $party = $this->Common_model->getdatabyid(array('post_id'=>$value->buyer), 'post_requirement');
                if(!empty($party)){
                    $party_name = $party->name;
                    $party_mobile = $party->mobile;
                    $party_email = $party->email;                    
                }
            }
            $PropertyType = $this->Common_model->getpropertydatabyid($value->post_id);
            $executive = $this->Common_model->getdatabyid(array('user_id'=>$value->executive), 'admin_users');
            $caller = $this->Common_model->getdatabyid(array('user_id'=>$value->caller), 'admin_users');
            // pre($PropertyType);
            $row = array('created'=>$value->created,'type'=>$value->deal_type,'deal_id'=>$value->deal_id,'party_id'=>$value->party_id,'party_name'=>$party_name,'party_mobile'=>$party_mobile,'party_email'=>$party_email,'lead_id'=>$lead_id,'lead_by'=>$lead_by,'admin1'=>!empty($executive)?$executive->name : '','admin2'=>!empty($caller)?$caller->name : '','property_type'=>!empty($PropertyType) ? $PropertyType->residential : '','price'=>$value->amount, 'commission'=>$value->deal_commission);
            $result[] = $row;
        }
        $data['list_sold_out'] = $result;
        // pre($result);
        $this->BackendView('admin/deals/deal_sold_out', $data);
    }
    
    function deal_rent_out()
    {
        $data = $this->commonpage_data();
        /*$data['list_interested'] = $this->Common_model->getdealbystatusandwhere('Closed', array('interested.rent_sell'=>'Rent'));*/
        $result = array();
        $list_rent_out = $this->Common_model->getDealPaymentDetailsByStatus('Close', array('interested.rent_sell'=>'Rent'));
        // pre($data['list_rent_out']);
        foreach ($list_rent_out as $key => $value) {
            $party_name = '';
            $party_mobile = '';
            $party_email = '';
            if($value->deal_type == 'Client'){
                $lead_id = $value->property_user_id;
                $lead_by = $value->property_user_type;
                $party = $this->Common_model->getpropertydatabyid($value->post_id);
                if(!empty($party)){
                    $party_name = $party->name;
                    $party_mobile = $party->mobile;
                    $party_email = $party->email;
                }
            }else{
                $lead_id = $value->buyer_user_id;
                $lead_by = $value->buyer_user_type;
                $party = $this->Common_model->getdatabyid(array('post_id'=>$value->buyer), 'post_requirement');
                if(!empty($party)){
                    $party_name = $party->name;
                    $party_mobile = $party->mobile;
                    $party_email = $party->email;                    
                }
            }
            $PropertyType = $this->Common_model->getpropertydatabyid($value->post_id);
            $executive = $this->Common_model->getdatabyid(array('user_id'=>$value->executive), 'admin_users');
            $caller = $this->Common_model->getdatabyid(array('user_id'=>$value->caller), 'admin_users');
            /*$row = array('created'=>$value->created,'type'=>$value->deal_type,'deal_id'=>$value->deal_id,'party_id'=>$value->party_id,'party_name'=>$party_name,'party_mobile'=>$party_mobile,'party_email'=>$party_email,'lead_id'=>$lead_id,'lead_by'=>$lead_by,'admin1'=>!empty($executive)?$executive->name : '','admin2'=>!empty($caller)?$caller->name : '','property_type'=>!empty($PropertyType) ? $PropertyType->residential : '','price'=>$value->amount, 'commission'=>$value->deal_commission);*/
            $row = array('created'=>$value->created,'type'=>$value->deal_type,'deal_id'=>$value->deal_id,'party_id'=>$value->party_id,'party_name'=>$party_name,'party_mobile'=>$party_mobile,'party_email'=>$party_email,'lead_id'=>$lead_id,'lead_by'=>$lead_by,'admin1'=>!empty($executive)?$executive->name : '','admin2'=>!empty($caller)?$caller->name : '','property_type'=>!empty($PropertyType) ? $PropertyType->residential : '','rent'=>$value->rent, 'deposite'=>$value->deposite,'commission'=>$value->deal_commission,'rent_start_from'=>$value->rent_start_from,'rent_upto'=>$value->rent_upto);
            $result[] = $row;
        }
        $data['list_rent_out'] = $result;
        $this->BackendView('admin/deals/deal_rent_out', $data);
    }
    
    function deal_no_interested_seller()
    {
        $data = $this->commonpage_data();
        $data['list_interested'] = $this->Common_model->getdealbystatus('No Interested Seller');
        $this->BackendView('admin/deals/deal_no_interested_seller', $data);
    }
    
    function deal_no_interested_buyer()
    {
        $data = $this->commonpage_data();
        $data['list_interested'] = $this->Common_model->getdealbystatus('No Interested Buyer');
        $this->BackendView('admin/deals/deal_no_interested_buyer', $data);
    }
    
    
    function change_interested_status(){
        $post =$this->input->post(); 
        $change_interested_id = $post['change_interested_id'];
        $comment = $post['comment'];
        
        $update_data = array('status'=>$post['status'], 'comment'=>$comment);
        
        $result =$this->Common_model->update($update_data, array('id'=>$change_interested_id), 'property_interested_details'); 
        if($result){$this->session->set_flashdata('success', 'Record updated Successfully!');}
        else{$this->session->set_flashdata('error', 'Record Not updated!');}
        redirect('property/deal_interested');
    }
    
    function cancel_deal($post_id){
        $update_data = array('status'=>'Interested');
        $result =$this->Common_model->update($update_data, array('post_id'=>$post_id, 'status'=>'In Process'), 'property_interested_details'); 
        if($result){
            $this->session->set_flashdata('success', 'Record updated Successfully!');
            $result =$this->Common_model->update(array('in_process_flag'=>0), array('post_id'=>$post_id), 'post_property'); 
        }
        else{$this->session->set_flashdata('error', 'Record Not updated!');}
        redirect('property/deal_interested');
    }
    
    function cancel_property_deals(){
        $post = $this->input->post();
        $data['active_deals'] = $this->Common_model->getdata(array('post_id' => $post['cancel_deal_post_id'], 'status'=>'In Process'),'property_interested_details');
        // pre($data['active_deals']);
        foreach($data['active_deals'] as $row){
            $buyer = $row->buyer;
            $result =$this->Common_model->update(array('in_process_flag'=>0), array('post_id'=>$buyer), 'post_requirement');
        }
        $update_data = array('status'=>'Cancelled');
        $result =$this->Common_model->update($update_data, array('post_id'=>$post['cancel_deal_post_id'], 'status'=>'In Process'), 'property_interested_details'); 
        if($result){
            $this->session->set_flashdata('success', 'Deals cancelled Successfully!');
            $result =$this->Common_model->update(array('in_process_flag'=>0), array('post_id'=>$post['cancel_deal_post_id']), 'post_property'); 
        }
        else{$this->session->set_flashdata('error', 'Record Not updated!');}
        redirect($post['redirect_url']);
    }
    
    function cancel_requirement_deals(){
        $post = $this->input->post();
        $data['active_deals'] = $this->Common_model->getdata(array('buyer' => $post['cancel_deal_post_id'], 'status'=>'In Process'),'property_interested_details');
        // pre($data['active_deals']);
        foreach($data['active_deals'] as $row){
            $seller = $row->post_id;
            $result =$this->Common_model->update(array('in_process_flag'=>0), array('post_id'=>$seller), 'post_property');
        }
        // $update_data = array('status'=>'Interested');
        $update_data = array('status'=>'Cancelled');
        $result =$this->Common_model->update($update_data, array('buyer'=>$post['cancel_deal_post_id'], 'status'=>'In Process'), 'property_interested_details'); 
        if($result){
            $this->session->set_flashdata('success', 'Deals cancelled Successfully!');
            $result =$this->Common_model->update(array('in_process_flag'=>0), array('post_id'=>$post['cancel_deal_post_id']), 'post_requirement'); 
        }
        else{$this->session->set_flashdata('error', 'Record Not updated!');}
        redirect($post['redirect_url']);
    }
    
    
    public function save_requirement_interested_details(){
        $post =$this->input->post(); 
        // pre($post);
        $post_id = $post['buyer_interested_post_id'];
        $agent_commission = 0;
        $floormantra_commision = 0;
        $executive_commision = 0;
        $caller_commision = 0;
        $agent_commission1 = 0;
        $floormantra_commision1 = 0;
        $executive_commision1 = 0;
        $caller_commision1 = 0;
        $buyer_user_id ='';
        $requirement_posted_by ='';
        $result = $this->Common_model->getdatabyid(array('post_id'=>$post_id), 'post_requirement'); 
        if($result){
            $buyer_user_id = $result->user_id;
            $requirement_posted_by = $result->user_type;
            if(!empty($post['interested_commission'])){
                if($requirement_posted_by == 'Admin' || $requirement_posted_by == 'Super Admin'){
                    $floormantra_commision1 = $post['interested_commission']/2;
                    $executive_commision1 = $post['interested_commission']/4;
                    $caller_commision1 = $post['interested_commission']/4;
                }elseif($requirement_posted_by == 'Agent'){
                    $agent_commission1 = $post['interested_commission']/2;
                    $floormantra_commision1 = $post['interested_commission']/4;
                    $executive_commision1 = $post['interested_commission']/8;
                    $caller_commision1 = $post['interested_commission']/8;
                }
            }
        }
        
        $result = $this->Common_model->getdatabyid(array('post_id'=>$post['interested_seller']), 'post_property'); 
        if($result){
            $property_user_type = $result->user_type;
            $property_user_id = $result->user_id;
            if(!empty($post['interested_commission1'])){
                if($property_user_type == 'Admin' || $property_user_type == 'Super Admin'|| $property_user_type == 'admin'){
                    $floormantra_commision = $post['interested_commission1']/2;
                    $executive_commision = $post['interested_commission1']/4;
                    $caller_commision = $post['interested_commission1']/4;
                }elseif($property_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission = $post['interested_commission1']/2;
                    $floormantra_commision = $post['interested_commission1']/4;
                    $executive_commision = $post['interested_commission1']/8;
                    $caller_commision = $post['interested_commission1']/8;
                }
            }
        }
        $property_user_id = '';
        $property_user_type = '';
        $seller = $this->Common_model->getdatabyid(array('post_id'=>$post['interested_seller']), 'post_property'); 
        if($seller){
            $property_user_id = $seller->user_id;
            $property_user_type = $seller->user_type;
        }
        // pre($this->session->userdata['admin_id']);
        $maxid = $this->Common_model->selectmaxid('id', array(), 'property_interested_details');
        $newmaxid = $maxid+1;
        $nozero = 7 - strlen($maxid);
        $zeros = '';
        for($j=0;$j<$nozero;$j++){
            $zeros .= '0';
        }
        $deal_id = "DEAL".$zeros.$newmaxid;
        
        if($post['interested_rent_sell'] == 'Sell'){
            $insert_data = array('deal_id'=>$deal_id,'buyer'=>$post['buyer_interested_post_id'], 'post_type'=>'property', 'rent_sell'=>$post['interested_rent_sell'], 
                             'post_id'=>$post['interested_seller'], 'amount'=>!empty($post['interested_amount']) ? $post['interested_amount'] : 0, 
                             'commission'=>!empty($post['interested_commission']) ? $post['interested_commission'] : 0,
                             'commission1'=>!empty($post['interested_commission1']) ? $post['interested_commission1'] : 0,
                             'agent_commission'=>$agent_commission, 'floormantra_commision'=>$floormantra_commision,
                             'executive_commission'=>$executive_commision,'caller_commision'=>$caller_commision, 
                             'agent_commission1'=>$agent_commission1, 'floormantra_commision1'=>$floormantra_commision1,
                             'executive_commission1'=>$executive_commision1,'caller_commision1'=>$caller_commision1, 
                             'executive'=>!empty($post['interested_executive']) ? $post['interested_executive'] : 0, 
                             'caller'=>!empty($post['interested_telecaller']) ? $post['interested_telecaller'] : 0, 
                             'status'=>$post['interested_status'],'added_by'=>$this->session->userdata('admin_id'),
                             'property_user_id'=>$property_user_id,'property_user_type'=>$property_user_type,'buyer_user_id'=>$buyer_user_id, 'buyer_user_type'=>$requirement_posted_by, 
                             'created'=>date('y-m-d H:i:s'));
        }else{
            $insert_data = array('deal_id'=>$deal_id,'buyer'=>$post['buyer_interested_post_id'], 'post_type'=>'property', 'rent_sell'=>$post['interested_rent_sell'], 
                             'post_id'=>$post['interested_seller'], 'deposite'=>!empty($post['interested_deposite']) ? $post['interested_deposite'] : 0,
                             'rent'=>!empty($post['interested_rent']) ? $post['interested_rent'] : 0, 'expiry_date'=>date('Y-m-d', strtotime(!empty($post['interested_expiry_date']) ? $post['interested_expiry_date'] : NULL)), 
                             'commission'=>$post['interested_commission'], 'agent_commission'=>$agent_commission, 'floormantra_commision'=>$floormantra_commision,
                             'executive_commission'=>$executive_commision,'caller_commision'=>$caller_commision, 
                             'executive'=>!empty($post['interested_executive']) ? $post['interested_executive'] : 0, 
                             'caller'=>!empty($post['interested_telecaller']) ? $post['interested_telecaller'] : 0, 
                             'status'=>$post['interested_status'],
                             'property_user_id'=>$property_user_id,'property_user_type'=>$property_user_type,'buyer_user_id'=>$buyer_user_id, 'buyer_user_type'=>$requirement_posted_by, 
                             'added_by'=>$this->session->userdata('admin_id'), 'created'=>date('y-m-d H:i:s'));
        }
        // pre($insert_data);
        $result = $this->Common_model->insert_data('property_interested_details',$insert_data);  
        if($result){
            $this->session->set_flashdata('success', 'Record Added Successfully!');
            if($post['interested_status'] == 'In Process'){
                $update_data = array('in_process_flag'=>1); 
                $result =$this->Common_model->update($update_data, array('post_id'=>$post['buyer_interested_post_id']), 'post_requirement'); 
                $result =$this->Common_model->update($update_data, array('post_id'=>$post['interested_seller']), 'post_property'); 
            }
        }
        else{$this->session->set_flashdata('error', 'Record Not Added!');}
        redirect($post['redirect_url']);
    }
    
    
    public function lead_commissions(){
        $data = $this->commonpage_data();
        $data['records'] = $this->Common_model->getLeadPartnersCommission();
        $data['commission_list'] = array();
        foreach($data['records'] as $i=>$record){
            // $seller_details = $this->Common_model->getdatabyid(array('post_id'=>$record->post_id), 'post_property');
            if($record->property_user_type == 'lead_partners'){
                $seller_details = $this->Common_model->getsellerleadbypostid($record->post_id);
                $info = array('partner_lead_id'=>$seller_details->partners_lead_id,'partner_name'=>$seller_details->lead_name,'lead_id'=>$seller_details->lead_id,'deal_type'=>$record->rent_sell, 'commission'=>$record->commission, 'partners_commission'=>$record->agent_commission);
                $data['commission_list'][] = $info;
            }
            if($record->buyer_user_type == 'lead_partners'){
                $buyer_details = $this->Common_model->getbuyersleadbypostid($record->buyer);
                $info = array('partner_lead_id'=>$buyer_details->partners_lead_id,'partner_name'=>$buyer_details->lead_name,'lead_id'=>$buyer_details->lead_id,'deal_type'=>$record->rent_sell, 'commission'=>$record->commission, 'partners_commission'=>$record->agent_commission);
                $data['commission_list'][] = $info;
            }
        }
        $this->BackendView('admin/leads/commission', $data);
    }
    
    
    function activate_new_state_city_location_pincode(){
        $post = $this->input->post();
        if(!empty($post['activate_state'])){
            $state = $post['new_state_name'];
            $result = $this->Common_model->update(array('status'=>1), array('name'=>$state), 'state');
        }
        if(!empty($post['new_city_name'])){
            $city = $post['new_city_name'];
            $result = $this->Common_model->update(array('status'=>1), array('name'=>$city), 'city');
        }
        if(!empty($post['activate_location'])){
            $location = $post['new_location_name'];
            $result = $this->Common_model->update(array('status'=>1), array('name'=>$location), 'location');
        }
        if(!empty($post['activate_pincode'])){
            $pincode = $post['new_pincode_name'];
            $result = $this->Common_model->update(array('status'=>1), array('pincode'=>$pincode), 'pincode');
        }
        if($result){
            $this->session->set_flashdata('success', 'Data updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Data not updated!');
        }
        redirect($post['redirect_url']);
    }
    
    public function new_buyer($option = ''){
        $data = $this->commonpage_data();
        if($option == 'pending'){
            $data['flat_list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'status'=>0, 'in_process_flag'=>0), 'post_requirement');
        }elseif($option == 'users'){
            $data['flat_list'] = $this->Common_model->getdata("'status' = 0 AND 'is_deleted' = 0 AND ('user_type' = 'Owner' OR 'user_type' = 'Agent' OR 'user_type' = 'Builder')", 'post_requirement');    
        }else{
            $data['flat_list'] = $this->Common_model->getdata(array('is_deleted'=>0, 'status'=>0), 'post_requirement');    
        }
        
        /*foreach($data['flat_list'] as $i=>$row){
            $post_id = $row->post_id;
            $data['flat_list'][$i]->details = $this->Common_model->getarraydatabyid(array('post_id'=>$post_id),'requirement_flat_details');
        }*/
        $data['seller_list'] = $this->Common_model->getpropertydata(array('status'=>1,'is_deleted'=>0, 'res_com'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Flat'), 'post_property');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $this->BackendView('admin/buyer/new_buyer', $data);
    }
    
    
    public function new_seller($option = ''){
        $data = $this->commonpage_data();
        $data['rent_sell'] = 'Sell';
        if($option == 'owner'){
            $data['flat_list'] = $this->Common_model->getpropertydata(array('status'=>0, 'is_deleted'=>0, 'user_type'=>'Owner'));
        }elseif($option == 'agent'){
            $data['flat_list'] = $this->Common_model->getpropertydata(array('status'=>0, 'is_deleted'=>0, 'user_type'=>'Agent'));
        }elseif($option == 'users'){
            $data['flat_list'] = $this->Common_model->getpropertydata("'status' = 0 AND 'is_deleted' = 0 AND ('user_type' = 'Owner' OR 'user_type' = 'Agent' OR 'user_type' = 'Builder')");
        }else{
            $data['flat_list'] = $this->Common_model->getpropertydata(array('status'=>0, 'is_deleted'=>0));
        }
        // echo $option;
        $data['buyer_list'] = $this->Common_model->getdata(array('status'=>1,'is_deleted'=>0, 'residential_commercial'=>'Residential', 'rent_sell'=>'Sell', 'residential'=>'Flat'), 'post_requirement');
        $data['executive_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        $data['telecaller_list'] = $this->Common_model->getdata(array('is_deleted'=>0), 'admin_users');
        foreach($data['flat_list'] as $i=>$row){
            if($row->res_com == 'Residential'){
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'residential_amenities'); 
            }else{
                $data['flat_list'][$i]->amenities = $this->Common_model->getdatabyid(array('post_id'=>$row->post_id), 'commercial_amenities'); 
            }
        }
        $this->BackendView('admin/seller/new_seller', $data);
    }
    
    public function rental_refresh(){
        $data = $this->commonpage_data();
        $this_month_start_date = date('Y-m-01');
        $this_month_end_date = date('Y-m-t');
        $data['rental_refresh'] = $this->Common_model->getdata("`rent_sell` LIKE 'Rent' AND status = 'Closed' AND (expiry_date BETWEEN '$this_month_start_date' AND '$this_month_end_date')", 'property_interested_details');
        // print_r($rental_refresh);
        $this->BackendView('admin/deals/rental_refresh', $data);
    }
    
    function load_more_property_photos(){
        $post = $this->input->post();
        $cnt = $post['cnt'];
        $cnt++;
        ?>
            <div class="col-md-4 col-sm-8 col-xs-8">
                <div class="file-drop-area">
                    <span class="fake-btn">Choose files</span>
                    <span class="file-msg">or drag and drop files here</span>
                    <input class="file-input" type="file" name="UploadImages[]" id="fileImage UploadImages" value="<?php if(!empty($post_property)){ echo $post_property->image_name; }else{ echo ''; }?>"  onblur="checkValue(this)" accept="image/*" onchange="validateFileType()">
                    <input class="file-input" type="hidden" name="prevUploadImages" value="<?php if(!empty($post_property)){ echo $post_property->image_name; }else{ echo ''; }?>"  onblur="checkValue(this)" >
                </div>
            </div>
    <?php }
    
    function load_more_project_images(){
        $post = $this->input->post();
        $cnt = $post['cnt'];
        $cnt++;
        ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="file-drop-area">
                    <span class="fake-btn">Choose images</span>
                    <span class="file-msg">or drag and drop images here</span>
                    <input class="file-input" type="file" name="UploadImages[]" accept="image/*" id="fileImage_<?php echo $cnt; ?>">
                    <input type="hidden" class="gui-file" name="prev_image" id="prev_image_<?php echo $cnt; ?>" value="">
                </div>
            </div>
    <?php }
    
    function load_more_locations(){
        $post = $this->input->post();
        $cnt = $post['cnt'];
        $list_location = $this->Common_model->get_location_list_by_city_name($post['city']); 
        $cnt++;
        ?>
            <div class="col-md-3 col-sm-7 col-xs-12">
                <label>Locations</label><b style="color:red;">*</b>
                <select id="location_<?=$cnt?>" name="location[]" class="locations">
                    <option hidden value="">--Select--</option>
                    <?php  if(!empty($list_location)){ ?>
                    <?php  foreach($list_location as $row){ ?>
                    <option value="<?=$row->name;?>"><?=$row->name;?></option>
                    <?php } } ?>
                </select>
            </div>
    <?php }
    
    
    function search_property(){
        $data = $this->commonpage_data();
        $where_array = array();
        $post = $this->input->post();
        // print_r($post);
        $data['buyer_seller'] = !empty($post['buyer_seller']) ? $post['buyer_seller'] : 'Seller';
        $data['list_state'] = $this->Common_model->getdata(array('is_deleted'=>0, 'country_id'=>101), 'state');
        if(!empty($post)){
            if(!empty($post['res_com'])){
                $data['res_com'] = $post['res_com'];
                if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array('type.res_com'=>$post['res_com']));
                else
                    $where_array = array_merge($where_array, array('residential_commercial'=>$post['res_com']));
            }
            if(!empty($post['email'])){
                $data['email'] = $post['email'];
                //if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array('post.email'=>$post['email']));
                /*else
                    $where_array = array_merge($where_array, array('residential_commercial'=>$post['res_com']));*/
            }
            if(!empty($post['contact'])){
                $data['contact'] = $post['contact'];
                if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array("(post.mobile = '".$post['contact']."' OR post.mobile1 = '".$post['contact']."' OR post.phone = '".$post['contact']."' )"));
                else
                    $where_array = array_merge($where_array, array("(post.mobile = '".$post['contact']."' OR post.mobile2 = '".$post['contact']."' OR post.phone = '".$post['contact']."' )"));
            }
            if(!empty($post['residential'])){
                $data['residential'] = $post['residential'];
                if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array('type.residential'=>$post['residential']));
                else
                    $where_array = array_merge($where_array, array('residential'=>$post['residential']));
            }
            if(!empty($post['rent_sell'])){
                $data['rent_sell'] = $post['rent_sell'];
                if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array('type.rent_sell'=>$post['rent_sell']));
                else
                    $where_array = array_merge($where_array, array('rent_sell'=>$post['rent_sell']));
            }
            if(!empty($post['state'])){
                $data['state'] = $post['state'];
                if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array('post.state'=>$post['state']));
                else
                    $where_array = array_merge($where_array, array('state'=>$post['state']));
                $state = $this->Common_model->getdatabyid(array('name'=>$post['state']), 'state');
                if(!empty($state)){
                    $data['list_city'] = $this->Common_model->getdata(array('state_id'=>$state->id, 'is_deleted'=>0), 'city');
                }
            }
            if(!empty($post['city'])){
                $data['city'] = $post['city'];
                if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array('post.city'=>$post['city']));
                else
                    $where_array = array_merge($where_array, array('city'=>$post['city']));
                $city = $this->Common_model->getdatabyid(array('name'=>$post['city']), 'city');
                if(!empty($city)){
                    $data['list_pincode'] = $this->Common_model->getdata(array('city_id'=>$city->id, 'is_deleted'=>0), 'pincode');
                }
            }
            if(!empty($post['pincode']) && $post['buyer_seller'] == 'Seller'){
                $data['pincode'] = $post['pincode'];
                if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array('post.pincode'=>$post['pincode']));
                else
                    $where_array = array_merge($where_array, array('pincode'=>$post['pincode']));
                $code = $this->Common_model->getdatabyid(array('pincode'=>$post['pincode']), 'pincode');
                if(!empty($code)){
                    $data['list_location'] = $this->Common_model->getdata(array('pincode_id'=>$code->id, 'is_deleted'=>0), 'location');
                }
            }
            if(!empty($post['location'])){
                $data['location'] = $post['location'];
                if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array('post.location'=>$post['location']));
                else
                    $where_array = array_merge($where_array, array('location LIKE'=>"%".$post['location']."%"));
            }
            if(!empty($post['society'])){
                $data['society'] = $post['society'];
                if($post['buyer_seller'] == 'Seller')
                    $where_array = array_merge($where_array, array('post.complex_society_building'=>$post['society']));
                else
                    $where_array = array_merge($where_array, array('ComplexSoceityBuilding'=>$post['society']));    
            }
            if($post['buyer_seller'] == 'Seller'){
                if(!empty($post['block_no'])){
                    $data['block_no'] = $post['block_no'];
                    $where_array = array_merge($where_array, array('post.blockno'=>$post['block_no']));
                }
                if(!empty($post['flat_no'])){
                    $data['flat_no'] = $post['flat_no'];
                    $where_array = array_merge($where_array, array('post.flatno'=>$post['flat_no']));
                }
            }elseif($post['buyer_seller'] == 'Buyer'){
                if(!empty($post['minimum_price'])){
                    $data['minimum_price'] = $post['minimum_price'];
                    $where_array = array_merge($where_array, array('MinimumRent >='=>$post['minimum_price']));
                }
                if(!empty($post['maximum_price'])){
                    $data['maximum_price'] = $post['maximum_price'];
                    $where_array = array_merge($where_array, array('MaximumRent <='=>$post['maximum_price']));
                }
            }
            // pre($where_array);
            if($post['buyer_seller'] == 'Seller')
                $result = $this->Common_model->getpropertydata($where_array);
            else
                $result = $this->Common_model->getdata($where_array, 'post_requirement');
            
            if($post['buyer_seller'] == 'Seller')
                $roomArray = array('DuplexFlat'=>'room', 'PentHouse'=>'pent_room', 'Flat'=>'flat_Room', 'HouseorBanglow'=>'house_Room', 'Land'=>'', 'Factory'=>'factory_numberofcabin', 'Office'=>'officeNumberofCabin', 'ShopOrShowroom'=>'', 'Warehouse'=>'warehouseNumberofCabin');
            else
                $roomArray = array('DuplexFlat'=>'Room', 'PentHouse'=>'Room', 'Flat'=>'Room', 'HouseorBanglow'=>'HouseRoom', 'Land'=>'', 'Factory'=>'NumberofCabin', 'Office'=>'NumberofCabin', 'ShopOrShowroom'=>'', 'Warehouse'=>'NumberofCabin');
            
            $MinSizeArray = array('DuplexFlat'=>'FlatMinimumAreaRequired', 'PentHouse'=>'FlatMinimumAreaRequired', 'Flat'=>'FlatMinimumAreaRequired', 'HouseorBanglow'=>'MinimumAreaRequired', 'Land'=>'LandMinimumAreaRequired', 'Factory'=>'MinimumOpenArea', 'Office'=>'MinimumAreaRequired', 'ShopOrShowroom'=>'ShopMinimumAreaRequired', 'Warehouse'=>'WarehouseMinimumCoveredArea');
            $MinSizeUnitArray = array('DuplexFlat'=>'SuperBuildupAreaUnit', 'PentHouse'=>'SuperBuildupAreaUnit', 'Flat'=>'SuperBuildupAreaUnit', 'HouseorBanglow'=>'StockMinimumAreaRequiredUnit', 'Land'=>'LandSuperBuildupAreaUnit', 'Factory'=>'MinimumOpenAreaUnit', 'Office'=>'OfficeSuperBuildupAreaUnit', 'ShopOrShowroom'=>'MinimumAreaRequiredUnit', 'Warehouse'=>'WarehouseMinimumCoveredAreaUnit');
            $MaxSizeArray = array('DuplexFlat'=>'FlatMaximumAreaRequired', 'PentHouse'=>'FlatMaximumAreaRequired', 'Flat'=>'FlatMaximumAreaRequired', 'HouseorBanglow'=>'HouseMaximumAreaRequired', 'Land'=>'LandMaximumAreaRequired', 'Factory'=>'MaximumOpenArea', 'Office'=>'MaximumAreaRequired', 'ShopOrShowroom'=>'ShopMaximumAreaRequired', 'Warehouse'=>'WarehouseMaximumCoveredArea');
            $MaxSizeUnitArray = array('DuplexFlat'=>'BuildupAreaUnit', 'PentHouse'=>'BuildupAreaUnit', 'Flat'=>'BuildupAreaUnit', 'HouseorBanglow'=>'HouseMaximumOpenAreaUnit', 'Land'=>'MaximumAreaRequiredUnit', 'Factory'=>'MaximumOpenAreaUnit', 'Office'=>'OfficeMaximumAreaRequiredUnit', 'ShopOrShowroom'=>'ShopMaximumAreaRequiredUnit', 'Warehouse'=>'WarehouseMaximumCoveredAreaUnit');
            
            $myArr = $result; 
            $final_result = $result; 
            
            if(!empty($post['rooms']) || !empty($post['minimum_size']) || !empty($post['minimum_size_unit']) || !empty($post['maximum_size']) || !empty($post['maximum_size_unit'])){
            $data['rooms'] = $post['rooms'];
            $data['minimum_size'] = $post['minimum_size'];
            $data['minimum_size_unit'] = $post['minimum_size_unit'];
            $data['maximum_size'] = $post['maximum_size'];
            $data['maximum_size_unit'] = $post['maximum_size_unit'];
                if(!empty($myArr)){
                    $final_result = array(); 
                    foreach($myArr as $myArray){
                        $code = array();
                        if($post['buyer_seller'] == 'Seller'){
                            if($post['residential'] == 'DuplexFlat'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'duplex_flat_details');
                            }
                            if($post['residential'] == 'PentHouse'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'pent_house_details');
                            }
                            if($post['residential'] == 'Flat'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'flat_details');
                            }
                            if($post['residential'] == 'HouseorBanglow'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'house_details');
                            }
                            if($post['residential'] == 'Factory'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'factory_details');
                            }
                            if($post['residential'] == 'Office'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'office_details');
                            }
                            if($post['residential'] == 'Warehouse'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'warehouse_details');
                            }
                        }else{
                            if($post['residential'] == 'DuplexFlat'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'requirement_flat_details');
                            }
                            if($post['residential'] == 'PentHouse'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'requirement_flat_details');
                            }
                            if($post['residential'] == 'Flat'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'requirement_flat_details');
                            }
                            if($post['residential'] == 'HouseorBanglow'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'requirement_house_details');
                            }
                            if($post['residential'] == 'Factory'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'requirement_factory_details');
                            }
                            if($post['residential'] == 'Office'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'requirement_office_details');
                            }
                            if($post['residential'] == 'Warehouse'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'requirement_warehouse_details');
                            }
                            if($post['residential'] == 'Land'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'requirement_land_details');
                            }
                            if($post['residential'] == 'ShopOrShowroom'){
                                $code = $this->Common_model->getdatabyid(array('post_id'=>$myArray->post_id), 'requirement_shop_details');
                            }
                        }
                        // print_r($post);
                        if(!empty($code)){
                            // print_r($code);
                            // print_r($post['residential']);
                            $room_column_name = $roomArray[$post['residential']];
                            $min_size_column_name = $MinSizeArray[$post['residential']];
                            $min_size_unit_column_name = $MinSizeUnitArray[$post['residential']];
                            $max_size_column_name = $MaxSizeArray[$post['residential']];
                            $max_size_unit_column_name = $MaxSizeUnitArray[$post['residential']];
                            // echo $room_column_name;
                            if($post['buyer_seller'] == 'Seller'){ 
                                if($post['rooms'] != ''){
                                    if(($code->$room_column_name == $post['rooms'])){
                                        $final_result[] =  $myArray;
                                    }
                                }else{
                                    $final_result[] =  $myArray;
                                }
                            }else{
                                if(($code->$min_size_column_name >= $post['minimum_size']) || ($code->$min_size_unit_column_name == $post['minimum_size_unit']) || ($code->$max_size_column_name <= $post['maximum_size']) || ($code->$max_size_unit_column_name == $post['maximum_size_unit'])){
                                   if($post['residential'] != 'Land' && $post['residential'] != 'ShopOrShowroom' && !empty($post['rooms'])){
                                       if(($code->$room_column_name == $post['rooms'])){
                                            $final_result[] =  $myArray;
                                       }
                                   }else{
                                    $final_result[] =  $myArray;
                                   }
                                }   
                            }
                        }
                    }
                }
            }
            $data['result'] = $final_result;
            // pre($this->db->last_query());
            // pre($data);
        }
        $this->BackendView('admin/search_property', $data);
    }
    
    public function save_deal_pending_details(){
        $post = $this->input->post();
        // pre($post);
        $deal_id = $post['deal_details_id'];
        $deal_type = $post['deal_type'];
        //if($deal_type == 'Owner'){
            $newInvNo = $this->get_new_invoice_no();
            $insert_data = array('inv_no'=>$newInvNo,'deal_id'=>$deal_id,'deal_type'=>$deal_type,'party_id'=>$post['party_id'],'deal_commission'=>$post['deal_commission'],
            'deal_gst'=>$post['deal_gst'],'deal_cgst'=>$post['deal_cgst'],'deal_sgst'=>$post['deal_sgst'],'deal_tds'=>$post['deal_tds'],
            'deal_total'=>$post['deal_total'],'deal_received'=>$post['deal_received'],'deal_pending'=>$post['deal_pending'], 
            'deal_status'=>$post['deal_close_type'],'deal_close_reason'=>$post['deal_reason'], 'created'=>date('Y-m-d H:i:s'));
            $result = $this->Common_model->insert_data('payment_pending_details',$insert_data);  
            if($result){
                $insert_data = array('payment_pending_details_id'=>$result,'received'=>$post['deal_received'], 'date'=>date('Y-m-d', strtotime($post['deal_date'])), 'mode'=>$post['deal_mode'], 'payment_ref'=>$post['deal_payment_ref'], 'payment_bank'=>$post['deal_payment_bank']);
                $result = $this->Common_model->insert_data('deal_payment_details',$insert_data); 
                if($post['deal_close_type'] == 'Close'){
                    if($post['deal_type'] == 'Client'){
                        $update_interested_details = array('close_status2'=>1);
                    }else{
                        $update_interested_details = array('close_status1'=>1);
                    }
                    $result = $this->Common_model->update($update_interested_details, array('id'=>$deal_id), 'property_interested_details');  
                }
                
                $this->session->set_flashdata('success', 'Payment details Added Successfully!');
            }
        //}
        redirect($post['redirect_url']);
    }
    
    /*public function save_deal_close_details(){
        $post = $this->input->post();
        // pre($post);
        $deal_id = $post['close_deal_details_id'];
        $close_deal_reason = $post['close_deal_reason'];
        $update_data = array('close_deal_reason'=>$close_deal_reason, '');
    }*/
    
    public function get_in_process_deal_details_by_id(){
        $post = $this->input->post();
        // pre($post)
        $id = $post['id'];
        // $rent_sell = $post['rent_sell'];
        $data = $this->Common_model->getInterestedDealDetailsById($id);
        echo json_encode($data);
        /*if(!empty($data)){
            if($rent_sell == 'Rent'){
                echo json_encode(array('deposite'=>$data->deposite,'rent'=>$data->rent,'commission'=>$data->commission,'post_id'=>$data->post_id,'rent_start_from'=>$data->rent_start_from,'rent_upto'=>$data->rent_upto));
            }else{
                
            }
        }*/
    }
    public function change_rent_interested_status_to_inprocess(){
        $post = $this->input->post();
        // pre($post);
        // $id = $post['id'];
        // $rent_sell = $post['rent_sell'];
        $agent_commission = 0;
        $floormantra_commision = 0;
        $executive_commission = 0;
        $caller_commision = 0;
        $property_user_type = '';
        $property_user_id = '';
        $agent_commission1 = 0;
        $floormantra_commision1 = 0;
        $executive_commission1 = 0;
        $caller_commision1 = 0;
        
        $result = $this->Common_model->getdatabyid(array('lead_id'=>$post['rent_inprocess_owner_id']), 'post_property'); 
        if($result){
            $property_user_type = $result->user_type;
            $property_user_id = $result->user_id;
            if(!empty($post['rent_inprocess_owner_commission'])){
                if($property_user_type == 'Admin' || $property_user_type == 'Super Admin'|| $property_user_type == 'admin'){
                    $floormantra_commision = $post['rent_inprocess_owner_commission']/2;
                    $executive_commission = $post['rent_inprocess_owner_commission']/4;
                    $caller_commision = $post['rent_inprocess_owner_commission']/4;
                }elseif($property_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission = $post['rent_inprocess_owner_commission']/2;
                    $floormantra_commision = $post['rent_inprocess_owner_commission']/4;
                    $executive_commission = $post['rent_inprocess_owner_commission']/8;
                    $caller_commision = $post['rent_inprocess_owner_commission']/8;
                }
            }
        }
        
        
        $result = $this->Common_model->getdatabyid(array('lead_id'=>$post['rent_inprocess_client_id']), 'post_requirement'); 
        if($result){
            $buyer_user_type = $result->user_type;
            $buyer_user_id = $result->user_id;
            if(!empty($post['rent_inprocess_client_commission'])){
                if($buyer_user_type == 'Admin' || $buyer_user_type == 'Super Admin'|| $buyer_user_type == 'admin'){
                    $floormantra_commision1 = $post['rent_inprocess_client_commission']/2;
                    $executive_commission1 = $post['rent_inprocess_client_commission']/4;
                    $caller_commision1 = $post['rent_inprocess_client_commission']/4;
                }elseif($buyer_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission1 = $post['rent_inprocess_client_commission']/2;
                    $floormantra_commision1 = $post['rent_inprocess_client_commission']/4;
                    $executive_commission1 = $post['rent_inprocess_client_commission']/8;
                    $caller_commision1 = $post['rent_inprocess_client_commission']/8;
                }
            }
        }
        $update_data = array('deposite'=>$post['rent_inprocess_deposite'], 'rent'=>$post['rent_inprocess_rent'],
        'commission'=>$post['rent_inprocess_owner_commission'],'agent_commission'=>$agent_commission,'floormantra_commision'=>$floormantra_commision,'caller_commision'=>$caller_commision,'executive_commission'=>$executive_commission,
        'commission1'=>$post['rent_inprocess_client_commission'],'agent_commission1'=>$agent_commission1,'floormantra_commision1'=>$floormantra_commision1,'caller_commision1'=>$caller_commision1,'executive_commission1'=>$executive_commission1,
        'extra_services'=>$post['rent_inprocess_owner_details'],'extra_services1'=>$post['rent_inprocess_client_details'], 'status'=>'In Process');
        $result = $this->Common_model->update($update_data, array('id'=>$post['rent_inprocess_interested_id']), 'property_interested_details'); 
        if($result){
            $update_data = array('in_process_flag'=>1); 
            $result =$this->Common_model->update($update_data, array('lead_id'=>$post['rent_inprocess_client_id']), 'post_requirement'); 
            $result =$this->Common_model->update($update_data, array('lead_id'=>$post['rent_inprocess_owner_id']), 'post_property'); 
            $this->session->set_flashdata('success', 'Record Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not Updated!');
        }
        redirect('property/deal_in_process/Rent');
    }
    
    
    public function change_sale_interested_status_to_inprocess(){
        $post = $this->input->post();
        // pre($post);
        $agent_commission = 0;
        $floormantra_commision = 0;
        $executive_commission = 0;
        $caller_commision = 0;
        $property_user_type = '';
        $property_user_id = '';
        $agent_commission1 = 0;
        $floormantra_commision1 = 0;
        $executive_commission1 = 0;
        $caller_commision1 = 0;
        
        $result = $this->Common_model->getdatabyid(array('lead_id'=>$post['sale_inprocess_owner_id']), 'post_property'); 
        if($result){
            $property_user_type = $result->user_type;
            $property_user_id = $result->user_id;
            if(!empty($post['sale_inprocess_owner_commission'])){
                if($property_user_type == 'Admin' || $property_user_type == 'Super Admin'|| $property_user_type == 'admin'){
                    $floormantra_commision = $post['sale_inprocess_owner_commission']/2;
                    $executive_commission = $post['sale_inprocess_owner_commission']/4;
                    $caller_commision = $post['sale_inprocess_owner_commission']/4;
                }elseif($property_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission = $post['sale_inprocess_owner_commission']/2;
                    $floormantra_commision = $post['sale_inprocess_owner_commission']/4;
                    $executive_commission = $post['sale_inprocess_owner_commission']/8;
                    $caller_commision = $post['sale_inprocess_owner_commission']/8;
                }
            }
        }
        
        
        $result = $this->Common_model->getdatabyid(array('lead_id'=>$post['sale_inprocess_client_id']), 'post_requirement'); 
        if($result){
            $buyer_user_type = $result->user_type;
            $buyer_user_id = $result->user_id;
            if(!empty($post['sale_inprocess_client_commission'])){
                if($buyer_user_type == 'Admin' || $buyer_user_type == 'Super Admin'|| $buyer_user_type == 'admin'){
                    $floormantra_commision1 = $post['sale_inprocess_client_commission']/2;
                    $executive_commission1 = $post['sale_inprocess_client_commission']/4;
                    $caller_commision1 = $post['sale_inprocess_client_commission']/4;
                }elseif($buyer_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission1 = $post['sale_inprocess_client_commission']/2;
                    $floormantra_commision1 = $post['sale_inprocess_client_commission']/4;
                    $executive_commission1 = $post['sale_inprocess_client_commission']/8;
                    $caller_commision1 = $post['sale_inprocess_client_commission']/8;
                }
            }
        }
        $update_data = array('amount'=>$post['sale_inprocess_price'],
        'commission'=>$post['sale_inprocess_owner_commission'],'agent_commission'=>$agent_commission,'floormantra_commision'=>$floormantra_commision,'caller_commision'=>$caller_commision,'executive_commission'=>$executive_commission,
        'commission1'=>$post['sale_inprocess_client_commission'],'agent_commission1'=>$agent_commission1,'floormantra_commision1'=>$floormantra_commision1,'caller_commision1'=>$caller_commision1,'executive_commission1'=>$executive_commission1,
        'extra_services'=>$post['sale_inprocess_owner_details'],'extra_services1'=>$post['sale_inprocess_client_details'], 'status'=>'In Process');
        $result = $this->Common_model->update($update_data, array('id'=>$post['sale_inprocess_interested_id']), 'property_interested_details'); 
        if($result){
            $update_data = array('in_process_flag'=>1); 
            $result =$this->Common_model->update($update_data, array('lead_id'=>$post['sale_inprocess_client_id']), 'post_requirement'); 
            $result =$this->Common_model->update($update_data, array('lead_id'=>$post['sale_inprocess_owner_id']), 'post_property'); 
            $this->session->set_flashdata('success', 'Record Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not Updated!');
        }
        redirect('property/deal_in_process/Sale');
    }
    
    
    function cancel_interested_deal($rent_sell, $id){
        $update_data = array('status'=>'Cancelled');
        $result = $this->Common_model->update($update_data, array('id'=>$id, 'status'=>'In Process'), 'property_interested_details'); 
        $result = $this->Common_model->getdatabyid(array('id'=>$id), 'property_interested_details'); 
        if($result){
            $post_id = $result->post_id;
            $buyer = $result->buyer;
            $update_data = array('in_process_flag'=>0); 
            $result =$this->Common_model->update($update_data, array('post_id'=>$buyer), 'post_requirement');
            $result =$this->Common_model->update($update_data, array('post_id'=>$post_id), 'post_property');
        }
        if($rent_sell == 'Rent'){
            redirect('property/deal_interested/Rent');
        }else{
            redirect('property/deal_interested/Sale');
        }
    }
    
    function cancel_in_process_deal($rent_sell, $id){
        $update_data = array('status'=>'Cancelled');
        $result = $this->Common_model->update($update_data, array('id'=>$id, 'status'=>'In Process'), 'property_interested_details'); 
        $result = $this->Common_model->getdatabyid(array('id'=>$id), 'property_interested_details'); 
        if($result){
            $post_id = $result->post_id;
            $buyer = $result->buyer;
            $update_data = array('in_process_flag'=>0); 
            $result =$this->Common_model->update($update_data, array('post_id'=>$buyer), 'post_requirement');
            $result =$this->Common_model->update($update_data, array('post_id'=>$post_id), 'post_property');
        }
        if($rent_sell == 'Rent'){
            redirect('property/deal_in_process/Rent');
        }else{
            redirect('property/deal_in_process/Sale');
        }
    }
    
    
    function update_sale_interested_details(){
        $post = $this->input->post();
        // pre($post);
        
        $agent_commission = 0;
        $floormantra_commision = 0;
        $executive_commission = 0;
        $caller_commision = 0;
        $property_user_type = '';
        $property_user_id = '';
        $agent_commission1 = 0;
        $floormantra_commision1 = 0;
        $executive_commission1 = 0;
        $caller_commision1 = 0;
        
        $result = $this->Common_model->getdatabyid(array('post_id'=>$post['sale_post_id']), 'post_property'); 
        if($result){
            $property_user_type = $result->user_type;
            $property_user_id = $result->user_id;
            if(!empty($post['sale_property_commission'])){
                if($property_user_type == 'Admin' || $property_user_type == 'Super Admin'|| $property_user_type == 'admin'){
                    $floormantra_commision = $post['sale_property_commission']/2;
                    $executive_commission = $post['sale_property_commission']/4;
                    $caller_commision = $post['sale_property_commission']/4;
                }elseif($property_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission = $post['sale_property_commission']/2;
                    $floormantra_commision = $post['sale_property_commission']/4;
                    $executive_commission = $post['sale_property_commission']/8;
                    $caller_commision = $post['sale_property_commission']/8;
                }
            }
        }
        
        
        $result = $this->Common_model->getdatabyid(array('lead_id'=>$post['sale_buyer_id']), 'post_requirement'); 
        if($result){
            $buyer_user_type = $result->user_type;
            $buyer_user_id = $result->user_id;
            if(!empty($post['sale_client_commission'])){
                if($buyer_user_type == 'Admin' || $buyer_user_type == 'Super Admin'|| $buyer_user_type == 'admin'){
                    $floormantra_commision1 = $post['sale_client_commission']/2;
                    $executive_commission1 = $post['sale_client_commission']/4;
                    $caller_commision1 = $post['sale_client_commission']/4;
                }elseif($buyer_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission1 = $post['sale_client_commission']/2;
                    $floormantra_commision1 = $post['sale_client_commission']/4;
                    $executive_commission1 = $post['sale_client_commission']/8;
                    $caller_commision1 = $post['sale_client_commission']/8;
                }
            }
        }
        
        $update_data = array('amount'=>$post['sale_price'],'executive'=>$post['sale_executive'],'caller'=>$post['sale_caller'],
        'commission'=>$post['sale_property_commission'],'agent_commission'=>$agent_commission,'floormantra_commision'=>$floormantra_commision,'caller_commision'=>$caller_commision,'executive_commission'=>$executive_commission,
        'commission1'=>$post['sale_client_commission'],'agent_commission1'=>$agent_commission1,'floormantra_commision1'=>$floormantra_commision1,'caller_commision1'=>$caller_commision1,'executive_commission1'=>$executive_commission1,
        'extra_services'=>$post['sale_details_owner'],'extra_services1'=>$post['sale_details_client']);
        $result = $this->Common_model->update($update_data, array('id'=>$post['sale_interested_id']), 'property_interested_details'); 
        if($result){
            $this->session->set_flashdata('success', 'Record Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not Updated!');
        }
        redirect('property/deal_interested/Sale');
    }
    
    
    
    function update_rent_interested_details(){
        $post = $this->input->post();
        // pre($post);
        
        $agent_commission = 0;
        $floormantra_commision = 0;
        $executive_commission = 0;
        $caller_commision = 0;
        $property_user_type = '';
        $property_user_id = '';
        $agent_commission1 = 0;
        $floormantra_commision1 = 0;
        $executive_commission1 = 0;
        $caller_commision1 = 0;
        
        $result = $this->Common_model->getdatabyid(array('post_id'=>$post['rent_property_id']), 'post_property'); 
        if($result){
            $property_user_type = $result->user_type;
            $property_user_id = $result->user_id;
            if(!empty($post['rent_commission'])){
                if($property_user_type == 'Admin' || $property_user_type == 'Super Admin'|| $property_user_type == 'admin'){
                    $floormantra_commision = $post['rent_commission']/2;
                    $executive_commission = $post['rent_commission']/4;
                    $caller_commision = $post['rent_commission']/4;
                }elseif($property_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission = $post['rent_commission']/2;
                    $floormantra_commision = $post['rent_commission']/4;
                    $executive_commission = $post['rent_commission']/8;
                    $caller_commision = $post['rent_commission']/8;
                }
            }
        }
        
        
        $result = $this->Common_model->getdatabyid(array('post_id'=>$post['rent_client_id']), 'post_requirement'); 
        if($result){
            $buyer_user_type = $result->user_type;
            $buyer_user_id = $result->user_id;
            if(!empty($post['rent_commission1'])){
                if($buyer_user_type == 'Admin' || $buyer_user_type == 'Super Admin'|| $buyer_user_type == 'admin'){
                    $floormantra_commision1 = $post['rent_commission1']/2;
                    $executive_commission1 = $post['rent_commission1']/4;
                    $caller_commision1 = $post['rent_commission1']/4;
                }elseif($buyer_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission1 = $post['rent_commission1']/2;
                    $floormantra_commision1 = $post['rent_commission1']/4;
                    $executive_commission1 = $post['rent_commission1']/8;
                    $caller_commision1 = $post['rent_commission1']/8;
                }
            }
        }
        
        $update_data = array('deposite'=>$post['security_deposite'],'rent'=>$post['rent'],'rent_start_from'=>!empty($post['rent_start_from']) ? date('Y-m-d H:i:s', strtotime($post['rent_start_from'])) : NULL,'rent_upto'=>!empty($post['rent_upto']) ? date('Y-m-d H:i:s', strtotime($post['rent_upto'])) : NULL,'executive'=>$post['rent_executive'],'caller'=>$post['rent_caller'],
        'commission'=>$post['rent_commission'],'agent_commission'=>$agent_commission,'floormantra_commision'=>$floormantra_commision,'caller_commision'=>$caller_commision,'executive_commission'=>$executive_commission,
        'commission1'=>$post['rent_commission1'],'agent_commission1'=>$agent_commission1,'floormantra_commision1'=>$floormantra_commision1,'caller_commision1'=>$caller_commision1,'executive_commission1'=>$executive_commission1,
        'extra_services'=>$post['rent_owner_details'],'extra_services1'=>$post['rent_client_details']);
        $result = $this->Common_model->update($update_data, array('id'=>$post['interested_id']), 'property_interested_details'); 
        if($result){
            $this->session->set_flashdata('success', 'Record Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not Updated!');
        }
        redirect('property/deal_interested/Rent');
    }


    function save_in_process_rent_details(){
        $post = $this->input->post();
        // pre($post);
        
        $agent_commission = 0;
        $floormantra_commision = 0;
        $executive_commission = 0;
        $caller_commision = 0;
        $property_user_type = '';
        $property_user_id = '';
        $agent_commission1 = 0;
        $floormantra_commision1 = 0;
        $executive_commission1 = 0;
        $caller_commision1 = 0;    

        $result = $this->Common_model->getdatabyid(array('post_id'=>$post['rent_property_id']), 'post_property'); 
        if($result){
            $property_user_type = $result->user_type;
            $property_user_id = $result->user_id;
            if(!empty($post['rent_owner_commission'])){
                if($property_user_type == 'Admin' || $property_user_type == 'Super Admin'|| $property_user_type == 'admin'){
                    $floormantra_commision = $post['rent_owner_commission']/2;
                    $executive_commission = $post['rent_owner_commission']/4;
                    $caller_commision = $post['rent_owner_commission']/4;
                }elseif($property_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission = $post['rent_owner_commission']/2;
                    $floormantra_commision = $post['rent_owner_commission']/4;
                    $executive_commission = $post['rent_owner_commission']/8;
                    $caller_commision = $post['rent_owner_commission']/8;
                }
            }
        }

        $result = $this->Common_model->getdatabyid(array('post_id'=>$post['rent_client_id']), 'post_requirement'); 
        if($result){
            $buyer_user_type = $result->user_type;
            $buyer_user_id = $result->user_id;
            if(!empty($post['rent_client_commission'])){
                if($buyer_user_type == 'Admin' || $buyer_user_type == 'Super Admin'|| $buyer_user_type == 'admin'){
                    $floormantra_commision1 = $post['rent_client_commission']/2;
                    $executive_commission1 = $post['rent_client_commission']/4;
                    $caller_commision1 = $post['rent_client_commission']/4;
                }elseif($buyer_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission1 = $post['rent_client_commission']/2;
                    $floormantra_commision1 = $post['rent_client_commission']/4;
                    $executive_commission1 = $post['rent_client_commission']/8;
                    $caller_commision1 = $post['rent_client_commission']/8;
                }
            }
        }
        
        $update_data = array('deposite'=>$post['rent_security_deposite'],'rent'=>$post['rent'],'rent_start_from'=>!empty($post['rent_start_from']) ? date('Y-m-d H:i:s', strtotime($post['rent_start_from'])) : NULL,'rent_upto'=>!empty($post['rent_upto']) ? date('Y-m-d H:i:s', strtotime($post['rent_upto'])) : NULL,
        'commission'=>$post['rent_owner_commission'],'agent_commission'=>$agent_commission,'floormantra_commision'=>$floormantra_commision,'caller_commision'=>$caller_commision,'executive_commission'=>$executive_commission,
        'commission1'=>$post['rent_client_commission'],'agent_commission1'=>$agent_commission1,'floormantra_commision1'=>$floormantra_commision1,'caller_commision1'=>$caller_commision1,'executive_commission1'=>$executive_commission1,
        'extra_services'=>$post['rent_owner_details'],'extra_services1'=>$post['rent_client_details']);
        $result = $this->Common_model->update($update_data, array('id'=>$post['rent_interested_id']), 'property_interested_details'); 
        if($result){
            $this->session->set_flashdata('success', 'Record Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not Updated!');
        }
        redirect('property/deal_in_process/Rent');

    }


    function save_in_process_sale_details(){
        $post = $this->input->post();
        // pre($post);
        
        $agent_commission = 0;
        $floormantra_commision = 0;
        $executive_commission = 0;
        $caller_commision = 0;
        $property_user_type = '';
        $property_user_id = '';
        $agent_commission1 = 0;
        $floormantra_commision1 = 0;
        $executive_commission1 = 0;
        $caller_commision1 = 0;
        
        $result = $this->Common_model->getdatabyid(array('post_id'=>$post['sale_property_id']), 'post_property'); 
        if($result){
            $property_user_type = $result->user_type;
            $property_user_id = $result->user_id;
            if(!empty($post['sale_owner_commission'])){
                if($property_user_type == 'Admin' || $property_user_type == 'Super Admin'|| $property_user_type == 'admin'){
                    $floormantra_commision = $post['sale_owner_commission']/2;
                    $executive_commission = $post['sale_owner_commission']/4;
                    $caller_commision = $post['sale_owner_commission']/4;
                }elseif($property_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission = $post['sale_owner_commission']/2;
                    $floormantra_commision = $post['sale_owner_commission']/4;
                    $executive_commission = $post['sale_owner_commission']/8;
                    $caller_commision = $post['sale_owner_commission']/8;
                }
            }
        }
        
        
        $result = $this->Common_model->getdatabyid(array('lead_id'=>$post['sale_client_id']), 'post_requirement'); 
        if($result){
            $buyer_user_type = $result->user_type;
            $buyer_user_id = $result->user_id;
            if(!empty($post['sale_client_commission'])){
                if($buyer_user_type == 'Admin' || $buyer_user_type == 'Super Admin'|| $buyer_user_type == 'admin'){
                    $floormantra_commision1 = $post['sale_client_commission']/2;
                    $executive_commission1 = $post['sale_client_commission']/4;
                    $caller_commision1 = $post['sale_client_commission']/4;
                }elseif($buyer_user_type == 'Agent' || $property_user_type == 'lead_partners'){
                    $agent_commission1 = $post['sale_client_commission']/2;
                    $floormantra_commision1 = $post['sale_client_commission']/4;
                    $executive_commission1 = $post['sale_client_commission']/8;
                    $caller_commision1 = $post['sale_client_commission']/8;
                }
            }
        }
        
        $update_data = array('amount'=>$post['sale_price'],
        'commission'=>$post['sale_owner_commission'],'agent_commission'=>$agent_commission,'floormantra_commision'=>$floormantra_commision,'caller_commision'=>$caller_commision,'executive_commission'=>$executive_commission,
        'commission1'=>$post['sale_client_commission'],'agent_commission1'=>$agent_commission1,'floormantra_commision1'=>$floormantra_commision1,'caller_commision1'=>$caller_commision1,'executive_commission1'=>$executive_commission1,
        'extra_services'=>$post['sale_owner_details'],'extra_services1'=>$post['sale_client_details']);
        $result = $this->Common_model->update($update_data, array('id'=>$post['sale_interested_id']), 'property_interested_details'); 
        if($result){
            $this->session->set_flashdata('success', 'Record Updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Record Not Updated!');
        }
        redirect('property/deal_in_process/Sale');
    }

    public function close_payment_pending_deal(){
        $post = $this->input->post();
        // pre($post);
        $deal_id = $post['deal_id'];   
        $deal_type = $post['deal_type'];   
        $payment_pending_details = $post['payment_pending_details'];   
        $close_deal_reason = $post['close_deal_reason'];   
        if($deal_type == 'Client'){
            $update_interested_details = array('close_status2'=>1);
        }else{
            $update_interested_details = array('close_status1'=>1);
        }
        $result = $this->Common_model->update($update_interested_details, array('id'=>$deal_id), 'property_interested_details');  
        $update_data = array('deal_close_reason'=>$close_deal_reason,'deal_status'=>'Close');
        $result = $this->Common_model->update($update_data, array('payment_pending_details'=>$payment_pending_details), 'payment_pending_details');  
        if($result){
            $this->session->set_flashdata('success', 'Deal Closed Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Failed to close deal!');
        }
        redirect('property/deal_payment_pending');        
    }


    public function view_deal_payment_details(){
        $post = $this->input->post();
        $payment_pending_details = $post['payment_pending_details']; 
        $data['payment_pending_details'] = $this->Common_model->getdatabyid(array('payment_pending_details'=>$payment_pending_details), 'payment_pending_details');
        $data['deal_payment_details'] = $this->Common_model->getdata(array('payment_pending_details_id'=>$payment_pending_details), 'deal_payment_details');
        $this->load->view('admin/deals/view_deal_payment_details', $data);     
    }

    public function add_deal_payment_details(){
        $post = $this->input->post();
        // pre($post);  
        $property_interested_details_id = $post['property_interested_details_id'];  
        $payment_pending_details_id = $post['payment_pending_details_id'];  
        $payment_amount = $post['payment_amount'];  
        $payment_date = $post['payment_date'];  
        $payment_mode = $post['payment_mode'];  
        $payment_ref = $post['payment_ref'];  
        $payment_bank = $post['payment_bank'];  
        $interested_details = $this->Common_model->getdatabyid(array('id'=>$property_interested_details_id), 'property_interested_details');
        $paymentPendingDetails = $this->Common_model->getdatabyid(array('payment_pending_details'=>$payment_pending_details_id), 'payment_pending_details');
        if(!empty($paymentPendingDetails)){
            $pending_amount = ($paymentPendingDetails->deal_pending - $payment_amount);
            $received_amount = ($paymentPendingDetails->deal_received + $payment_amount);
            if($pending_amount <= 0){
                $update_data = array('deal_pending'=>$pending_amount, 'deal_received'=>$received_amount, 'deal_status'=>'Close');   
                $this->Common_model->update(array('status'=>'Closed'), array('id'=>$property_interested_details_id), 'property_interested_details'); 
            }else{
                $update_data = array('deal_pending'=>$pending_amount, 'deal_received'=>$received_amount);
            }
            $result = $this->Common_model->update($update_data, array('payment_pending_details'=>$payment_pending_details_id), 'payment_pending_details');  
            if($result){
                $this->session->set_flashdata('success', 'Payment details added Successfully!');
                $insert_data = array('payment_pending_details_id'=>$payment_pending_details_id, 'received'=>$payment_amount, 'date'=>date('Y-m-d H:i:s', strtotime($payment_date)), 'mode'=>$payment_mode,'payment_ref'=>$payment_ref,'payment_bank'=>$payment_bank,'created'=>date('Y-m-d H:i:s'));
                $result = $this->Common_model->insert_data('deal_payment_details',$insert_data); 
            }else{
                $this->session->set_flashdata('error', 'Failed to add Payment details!');
            }
            redirect('property/deal_payment_pending');  
        }
    }
    
    public function print_invoice($deal_id, $deal_type){
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
        $data['deal_type'] = $deal_type;

        $deal = $this->Common_model->getdatabyid(array('id'=>$deal_id),'property_interested_details');
        $data['deal'] = $deal;
        // pre($data['deal']);
        if(!empty($deal)){
            if($deal_type == 'Client'){
                $data['party'] = $this->Common_model->getdatabyid(array('post_id'=>$deal->buyer),'post_requirement');
            }else{
                $data['party'] = $this->Common_model->getdatabyid(array('post_id'=>$deal->post_id),'post_property');
            }
            $data['property'] = $this->Common_model->getpropertydatabyid($deal->post_id);
        }
        // print_r($data['deal']);
        
        $payment_details = $this->Common_model->getdatabyid(array('deal_id'=>$deal_id, 'deal_type'=>$deal_type),'payment_pending_details');

        if(!empty($payment_details)){
            $deal_payment_details = $this->Common_model->getdataorderbyid(array('payment_pending_details_id'=>$payment_details->payment_pending_details),'deal_payment_details', "'id' DESC");
            $data['deal_payment_details'] = $deal_payment_details;
            // pre($deal_payment_details);
        }
        $floormantra = $this->Common_model->getdatabyid(array('id'=>1),'address_contact_config');

        $data['floormantra'] = $floormantra;
        $data['payment_details'] = $payment_details;


        // $stylesheet = file_get_contents(base_url().'assets/admin/css/dealInvoice.css');
        // $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        // $this->load->view('admin/dealInvoice', $data);

        $checklist = $this->load->view('admin/dealInvoice', $data, true);
        $pdfFilePath ="salary_slip_".$admin_id.""."-".time().".pdf"; 
        $mpdf->WriteHTML($checklist, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output();
        exit;
    }
    
}
?>