<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
    public function getcurrentuser($cid,$id,$table)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from("$table as BaseTbl");
        $this->db->where($cid,$id);
        $this->db->where('is_deleted',0);
        $qry = $this->db->get();
        return $qry->result();
    }

    public function insert_data($table,$Insertdata,$where = NULL)
    {
        if($where == NULL){
        $this->db->insert($table,$Insertdata); }
        else { $this->db->where($where)->insert($table,$Insertdata); }
        return $this->db->insert_id();
    }

    public function selectmaxid($maxid,$where,$table){
      $row = $this->db->select_max($maxid)->where($where)->get($table)->row();
      return $row->$maxid;
    }

    public function count($where, $table, $fild)
    {
        $this->db->select("COUNT($fild) as count")->where($where);
        $qry = $this->db->get($table);
        return $qry->row();
    }

    public function count_rows($where, $table, $fild)
    {
        $this->db->select("COUNT($fild) as count")->where($where);
        $num = $this->db->count_all_results($table);
        return $num;
    }


    public function update($update, $where, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $update);
        return true;
    }
    
    /*public function update_batch($update, $where, $table)
    {
        $this->db->where($where);
        $this->db->update_batch($table, $update);
        return true;
    }*/

    public function getdatabyid($where, $table)
    {
        $this->db->select('*')->where($where);
        $qry = $this->db->get($table);
        return $qry->row();
    }
    
    public function getarraydatabyid($where, $table)
    {
        $this->db->select('*')->where($where);
        $qry = $this->db->get($table);
        return $qry->row_array();
    }
    
    public function getdataorderby($where, $table, $order_by)
    {
        $this->db->select('*')->where($where)->order_by($order_by);
        $qry = $this->db->get($table);
        return $qry->result();
    }

    public function getdataorderbyid($where, $table, $order_by)
    {
        $this->db->select('*')->where($where)->order_by($order_by);
        $qry = $this->db->get($table);
        return $qry->row();
    }

    public function getdata($where, $table)
    {
        $this->db->select('*')->where($where);
        $qry = $this->db->get($table);
        return $qry->result();
    }
    
    public function selectdata($select = '*', $where, $table)
    {
        $this->db->select($select)->where($where);
        $qry = $this->db->get($table);
        return $qry->result();
    }
    
    public function selectdistinctdataarray($select, $where, $table)
    {
        $this->db->distinct();
        $this->db->select("$select")->where($where);
        $qry = $this->db->get($table);
        return $qry->result_array();
    }
    
    public function selectdataarray($select = '*', $where, $table)
    {
        $this->db->select($select)->where($where);
        $qry = $this->db->get($table);
        return $qry->result_array();
    }
    
    public function selectquerydata($query)
    {
        $query = $this->db->query($query);
        return $query->result();
    }
    
    public function selectrowdata($select = '*', $where, $table)
    {
        $this->db->select($select)->where($where);
        $qry = $this->db->get($table);
        return $qry->row();
    }
    
    function get_cities_by_state($state_name){
        $query = $this->db->query("SELECT c.* FROM city c, state s WHERE c.state_id = s.id AND s.id = $state_name");
        return $query->result();
    }
    
    function get_pincode_list(){
        $this->db->select('BaseTbl.*, c.name as city_name,c.id as city_id, s.name as state_name,s.id as state_id')
                 ->from('pincode as BaseTbl')
                 ->join('city as c', 'c.id = BaseTbl.city_id', 'left')
                 ->join('state as s', 's.id = c.state_id', 'left')
                 ->where('BaseTbl.is_deleted', 0);
        return $this->db->get()->result();
    }
    
    function get_all_pincode_list_by_city_name($city){
        $this->db->select('BaseTbl.*')
                 ->from('pincode as BaseTbl')
                 ->join('city as c', 'c.id = BaseTbl.city_id', 'left')
                 ->where('BaseTbl.is_deleted', 0)
                 ->like('c.name', $city);
        return $this->db->get()->result();
    }
    
    function get_location_list($where = array()){
        $this->db->select('BaseTbl.*, p.pincode, p.id as pincode_id, c.name as city_name, c.id as city_id, s.name as state_name, s.id as state_id')
                 ->from('location as BaseTbl')
                 ->join('pincode as p', 'p.id = BaseTbl.pincode_id', 'left')
                 ->join('city as c', 'c.id = p.city_id', 'left')
                 ->join('state as s', 's.id = c.state_id', 'left')
                 ->where($where);
        return $this->db->get()->result();
    }
    
    function get_society_list($where = array()){
        $this->db->select('BaseTbl.*, l.name as location_name,l.id as location_id, p.pincode,p.id as pincode_id, c.name as city_name, c.id as city_id, s.name as state_name, s.id as state_id')
                 ->from('society as BaseTbl')
                 ->join('location as l', 'l.id = BaseTbl.location_id', 'left')
                 ->join('pincode as p', 'p.id = l.pincode_id', 'left')
                 ->join('city as c', 'c.id = p.city_id', 'left')
                 ->join('state as s', 's.id = c.state_id', 'left')
                 ->where($where);
        return $this->db->get()->result();
    }
    
    
    function get_sub_category()
    {
        $this->db->select('BaseTbl.*, cate.cat_name')
                 ->from('catagory_sub as BaseTbl')
                 ->join('categories as cate', 'cate.cat_id = BaseTbl.main_cat_id', 'left')
                 ->where('BaseTbl.is_deleted', 0)
                 ->order_by('BaseTbl.sub_cat_id', 'DESC');
        return $this->db->get()->result();
    }

    function get_all_ads_by_status($status)
    {
        $this->db->select('BaseTbl.*, cate.cat_name, user.name as username')
                 ->from('all_posted_ads as BaseTbl')
                 ->join('categories as cate', 'cate.cat_id = BaseTbl.category_id', 'left')
                 ->join('catagory_sub as subcate', 'subcate.sub_cat_id = BaseTbl.subcategory_id', 'left')
                 ->join('users as user', 'user.id = BaseTbl.user_id', 'left')
                 ->where('BaseTbl.is_deleted', 0)
                 ->where('BaseTbl.status', $status)
                 ->order_by('BaseTbl.created_at', 'DESC');
        return $this->db->get()->result();
    }

    function get_all()
    {
        $this->db->select('BaseTbl.*, cate.cat_name, user.name as username')
                 ->from('all_posted_ads as BaseTbl')
                 ->join('categories as cate', 'cate.cat_id = BaseTbl.category_id', 'left')
                 ->join('catagory_sub as subcate', 'subcate.sub_cat_id = BaseTbl.subcategory_id', 'left')
                 ->join('users as user', 'user.id = BaseTbl.user_id', 'left')
                 ->where('BaseTbl.is_deleted', 0)
                 ->order_by('BaseTbl.created_at', 'DESC');
        return $this->db->get()->result();
    }

    function get_list_blogs_admin()
    {
        $this->db->select('BaseTbl.*, cate.title, admin.username')
                 ->from('blogs as BaseTbl')
                 ->join('blog_categories as cate', 'cate.id = BaseTbl.category', 'left')
                 ->join('admins as admin', 'admin.id = BaseTbl.author', 'left')
                 ->where('BaseTbl.is_deleted', 0)
                 ->order_by('BaseTbl.created_at', 'DESC');
        return $this->db->get()->result();
    }

    function get_all_front_blogs()
    {
        $this->db->select('BaseTbl.*, cate.title, admin.username')
                 ->from('blogs as BaseTbl')
                 ->join('blog_categories as cate', 'cate.id = BaseTbl.category', 'left')
                 ->join('admins as admin', 'admin.id = BaseTbl.author', 'left')
                 ->where('BaseTbl.is_deleted', 0)
                 ->order_by('BaseTbl.created_at', 'DESC');
        return $this->db->get()->result();
    }

    function get_all_front_blogs_details($blog_id)
    {
        $this->db->select('BaseTbl.*, cate.title, admin.username')
                 ->from('blogs as BaseTbl')
                 ->join('blog_categories as cate', 'cate.id = BaseTbl.category', 'left')
                 ->join('admins as admin', 'admin.id = BaseTbl.author', 'left')
                 ->where('BaseTbl.id', $blog_id);
        return $this->db->get()->result();
    }
    
    function home_page_search_pg($post)
    {
            $this->db->select('pg.*');
            $this->db->from('pg');
            if(!empty($post['city']) && $post['city'] != ''){
                $this->db->like('pg.city', $city);
            }
            $this->db->like('pg.pg_name', $post['search_box']);
            $this->db->or_like('pg.location', $post['search_box'], 'both');
            $this->db->where('pg.is_deleted', 0);
            $this->db->where('pg.status', 1);
            $this->db->group_by('pg.id');
            return $this->db->get()->result();
    }
    
    function get_my_favourite_project()
    {
        $user_id = $this->session->userdata('user')['user_id'];
        $user_type = $this->session->userdata('user')['usertype'];
        if($user_type == 'lead_partner'){
            $this->db->select('*')
                 ->from('post_project')
                 ->like('favourite_by_lead', ','.$user_id, 'before')
                 ->or_like('favourite_by_lead', $user_id.',', 'after')
                 ->or_like('favourite_by_lead', ','.$user_id.',', 'both')
                 ->or_like('favourite_by_lead', $user_id, 'both')
                 ->where('is_deleted', 0);
            return $this->db->get()->result();
        }else{
            $this->db->select('*')
                 ->from('post_project')
                 ->like('favourite_by', ','.$user_id, 'before')
                 ->or_like('favourite_by', $user_id.',', 'after')
                 ->or_like('favourite_by', ','.$user_id.',', 'both')
                 ->or_like('favourite_by', $user_id, 'both')
                 ->where('is_deleted', 0);
            return $this->db->get()->result();
        }
    }
    
    function get_my_favourite_property()
    {
        $user_id = $this->session->userdata('user')['user_id'];
        $user_type = $this->session->userdata('user')['usertype'];
        if($user_type == 'lead_partner'){
            $this->db->select('post.*,type.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->like('post.favourite_by_lead', ','.$user_id, 'before')
                     ->or_like('post.favourite_by_lead', $user_id.',', 'after')
                     ->or_like('post.favourite_by_lead', ','.$user_id.',', 'both')
                     ->or_like('post.favourite_by_lead', $user_id, 'both')
                     ->where('is_deleted', 0);
            return $this->db->get()->result();
        }else{
            $this->db->select('post.*,type.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->like('post.favourite_by', ','.$user_id, 'before')
                     ->or_like('post.favourite_by', $user_id.',', 'after')
                     ->or_like('post.favourite_by', ','.$user_id.',', 'both')
                     ->or_like('post.favourite_by', $user_id, 'both')
                     ->where('is_deleted', 0);
            return $this->db->get()->result();
        }
    }
    
    function get_my_favourite_property_new($user_id)
    {
        $this->db->select('post.*,type.*')
                 ->from('post_property post')
                 ->join('property_type type', 'type.post_id = post.post_id', 'left')
                 ->like('post.favourite_by', ','.$user_id, 'before')
                 ->or_like('post.favourite_by', $user_id.',', 'after')
                 ->or_like('post.favourite_by', ','.$user_id.',', 'both')
                 ->or_like('post.favourite_by', $user_id, 'both')
                 ->where('is_deleted', 0);
        return $this->db->get()->result();
    }
    
    function get_new_projects(){
        $this->db->select('*')
                 ->from('post_project')
                 ->where('is_deleted', 0)
                 ->where('refresh_date >=', date('Y-m-d',strtotime("-3 months")))
                 ->order_by('refresh_date', 'DESC');
            return $this->db->get()->result();
    }
    
    function getpropertydata($where){
         $this->db->select('post.*,type.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->where('refresh_date >=', date('Y-m-d',strtotime("-3 months")))
                     ->where($where)
                     ->order_by('post.refresh_date', 'DESC');
        return $this->db->get()->result();
    }
    
    function getpropertydatabyid($post_id){
         $this->db->select('post.*,type.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->where('post.post_id', $post_id);
        return $this->db->get()->row();
    }
    
    function getrentpropertydata(){
         $this->db->select('post.*,type.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', 'Rent')
                    //  ->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")))
                     ->where('post.is_deleted', 0)
                     ->where('post.status', 1)
                     ->limit('5')
                     ->order_by('post.refresh_date', 'DESC');
        return $this->db->get()->result();
    }
    
    function getsalepropertydata(){
         $this->db->select('post.*,type.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', 'Sell')
                    //  ->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")))
                     ->where('post.is_deleted', 0)
                     ->where('post.status', 1)
                     ->limit('5')
                     ->order_by('post.refresh_date', 'DESC');
        return $this->db->get()->result();
    }
    
    function get_my_property_responses_data($post_id, $type){
        $this->db->select('enquiry.*,type.rent_sell')
                     ->from('property_enquiries enquiry')
                     ->join('property_type type', 'type.post_id = enquiry.post_id', 'left')
                     ->where('enquiry.post_type', $type)
                     ->where('type.post_id', $post_id);
        return $this->db->get()->result();
    }
    
    function get_my_project_responses_data($post_id, $type){
        $this->db->select('enquiry.*, "Rent" as rent_sell ')
                     ->from('property_enquiries enquiry')
                     ->where('enquiry.post_id', $post_id)
                     ->where('enquiry.post_type', $type);
        return $this->db->get()->result();
    }
    
    function getnearbypropertydata($pincode, $location, $city){
        $this->db->select('post.*,type.*')
             ->from('post_property post')
             ->join('property_type type', 'type.post_id = post.post_id', 'left')
             ->where('post.pincode', $pincode)
             ->or_where('post.location LIKE ', "$location%")
             ->or_where('post.city LIKE ', "$city%")
             ->where('post.is_deleted', 0);
        $res = $this->db->get()->result();
    }
    
    function get_residential_flat_list($rent_sell, $interested_flag){
         $this->db->select('post.*,type.*,details.*,flat.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('flat_details flat', 'flat.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'Flat')
                     ->where('post.is_deleted', 0)
                     ->where('post.interested_flag', $interested_flag)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    }
    
    function get_residential_house_bunglow_list($rent_sell,  $interested_flag){
         $this->db->select('post.*,type.*,details.*,house.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('house_details house', 'house.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'HouseorBanglow')
                     ->where('post.is_deleted', 0)
                     ->where('post.interested_flag', $interested_flag)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    }
    
    function get_residential_pent_house_list($rent_sell, $interested_flag){
         $this->db->select('post.*,type.*,details.*,house.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('pent_house_details house', 'house.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'PentHouse')
                     ->where('post.is_deleted', 0)
                     ->where('post.interested_flag', $interested_flag)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    }
    
    function get_residential_duplex_flat_list($rent_sell, $interested_flag){
         $this->db->select('post.*,type.*,details.*,flat.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('duplex_flat_details flat', 'flat.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'DuplexFlat')
                     ->where('post.interested_flag', $interested_flag)
                     ->where('post.is_deleted', 0)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    } 
    
    function get_residential_land_list($rent_sell, $interested_flag){
         $this->db->select('post.*,type.*,details.*,land.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('land_details land', 'land.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'Land')
                     ->where('type.res_com', 'Residential')
                     ->where('post.is_deleted', 0)
                     ->where('post.interested_flag', $interested_flag)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    }
    
    function get_commercial_land_list($rent_sell, $interested_flag){
         $this->db->select('post.*,type.*,details.*,land.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('land_details land', 'land.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'Land')
                     ->where('type.res_com', 'Commercial')
                     ->where('post.is_deleted', 0)
                     ->where('post.interested_flag', $interested_flag)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    }
    
    
    function get_commercial_office_list($rent_sell, $interested_flag){
         $this->db->select('post.*,type.*,details.*,office.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('office_details office', 'office.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'Office')
                     ->where('post.is_deleted', 0)
                     ->where('post.interested_flag', $interested_flag)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    } 
    
    function get_commercial_shop_showroom_list($rent_sell, $interested_flag){
         $this->db->select('post.*,type.*,details.*,shop.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('shop_details shop', 'shop.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'ShopOrShowroom')
                     ->where('post.is_deleted', 0)
                     ->where('post.interested_flag', $interested_flag)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    }
    
    function get_commercial_warehouse_list($rent_sell, $interested_flag){
         $this->db->select('post.*,type.*,details.*,warehouse.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('warehouse_details warehouse', 'warehouse.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'Warehouse')
                     ->where('post.is_deleted', 0)
                     ->where('post.interested_flag', $interested_flag)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    }
    
    function get_commercial_factory_list($rent_sell, $interested_flag){
         $this->db->select('post.*,type.*,details.*,factory.*')
                     ->from('post_property post')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->join('factory_details factory', 'factory.post_id = post.post_id', 'left')
                     ->where('type.rent_sell', $rent_sell)
                     ->where('type.residential', 'Factory')
                     ->where('post.is_deleted', 0)
                     ->where('post.interested_flag', $interested_flag)
                     ->order_by('post.created', 'DESC');
        return $this->db->get()->result();
    }
    
    
    
    function getbuyerslead($status){
         $this->db->select('post.*,lead.name as lead_name, lead.email as lead_email, lead.phone as lead_phone,')
                     ->from('post_requirement post')
                     ->join('lead_partners lead', 'lead.user_id = post.user_id', 'left')
                     ->where('post.user_type', 'lead_partner')
                     ->where('post.is_deleted', 0)
                     ->where('post.status', $status);
        return $this->db->get()->result();
    } 
    
    function getsellerlead($status){
         $this->db->select('post.*,lead.*,type.*,details.*,post.status')
                     ->from('post_property post')
                     ->join('lead_partners lead', 'lead.user_id = post.user_id', 'left')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->where('post.user_type', 'lead_partner')
                     ->where('post.is_deleted', 0)
                     ->where('post.status', $status);
        return $this->db->get()->result();
    } 
    
    function getUserBuyers(){
         $this->db->select('post.*,user.name as lead_name, user.email as lead_email, user.phone as lead_phone,')
                     ->from('post_requirement post')
                     ->join('users user', 'user.user_id = post.user_id', 'left')
                    //  ->where('post.user_type', 'lead_partner')
                     ->where("post.user_type = 'Owner' OR post.user_type = 'Agent' OR post.user_type = 'Builder'")
                     ->where('post.is_deleted', 0);
                    //  ->where('post.status', $status);
        return $this->db->get()->result();
    } 
    
    function getUserSellers(){
         $this->db->select('post.*, user.*, type.*, details.*, post.status')
                     ->from('post_property post')
                     ->join('users user', 'user.user_id = post.user_id', 'left')
                     ->join('property_type type', 'type.post_id = post.post_id', 'left')
                     ->join('other_details details', 'details.post_id = post.post_id', 'left')
                     ->where("post.user_type = 'Owner' OR post.user_type = 'Agent' OR post.user_type = 'Builder'")
                     ->where('post.is_deleted', 0);
                    //  ->where('post.status', $status);
        return $this->db->get()->result();
    } 
    
    function gethomeloanlead($status = NULL){
         $this->db->select('loan.*,lead.name as lead_name, lead.phone as lead_phone, lead.email as lead_email')
                     ->from('home_loan loan')
                     ->join('lead_partners lead', 'lead.user_id = loan.user_id', 'left')
                     ->where('loan.user_type', 'lead_partner')
                     ->where('loan.is_deleted', 0);
                     if(!empty($status)){$this->db->where('loan.status', $status);}
        return $this->db->get()->result();
    }
    
    function getbuyersleadbypostid($post_id){
         $this->db->select('post.*,lead.lead_id as partners_lead_id, lead.name as lead_name, lead.email as lead_email, lead.phone as lead_phone')
                     ->from('post_requirement post')
                     ->join('lead_partners lead', 'lead.user_id = post.user_id', 'left')
                    /* ->where('post.user_type', 'lead_partner')*/
                     ->where('post.post_id', $post_id);
        return $this->db->get()->result();
    } 
    
    function getsellerleadbypostid($post_id){
         $this->db->select('post.*,lead.lead_id as partners_lead_id, lead.name as lead_name, lead.email as lead_email, lead.phone as lead_phone')
                     ->from('post_property post')
                     ->join('lead_partners lead', 'lead.user_id = post.user_id', 'left')
                     /*->where('post.user_type', 'lead_partner')*/
                     ->where('post.post_id', $post_id);
        return $this->db->get()->result();
    } 
    
    function gethomeloandetailsbyid($id){
         $this->db->select('loan.*,lead.name as lead_name, lead.phone as lead_phone, lead.email as lead_email')
                     ->from('home_loan loan')
                     ->join('lead_partners lead', 'lead.user_id = loan.user_id', 'left')
                     ->where('loan.id', $id);
        return $this->db->get()->row();
    }
    
    
    //Find Project 
    
    /*function search_project($post, $per_page, $pageno){
        $this->db->select('*');
        $this->db->from('post_project post');
        if(!empty($post['price_minimum']))
            $this->db->where('post.price >=', $post['price_minimum']);
        if(!empty($post['price_maximum']))
            $this->db->where('post.price <=', $post['price_maximum']);
        if(!empty($post['under_construction'])){
            $this->db->where('post.section', 'PossessionFrom');
        }
        if(!empty($post['availability'])){
            $this->db->where('post.section', 'PossessionFrom');
            foreach($post['availability'] as $yr){
                if($yr != '')
                    $this->db->like('post.PossessionDate', "$yr-%");
            }
        }
        if(!empty($post['state']) && $post['state'] != ''){
            $this->db->like('post.state', $post['state']);
        }
        if(!empty($post['city']) && $post['city'] != ''){
            $this->db->like('post.city', $post['city']);
        }
        if(!empty($post['location']) && $post['location'] != ''){
            $this->db->like('post.location', $post['location']);
        }
        if(!empty($post['ready_to_move'])){
            $this->db->where('post.section', 'ReadyToMove');
        }
        if(!empty($post['res_com']) && $post['res_com'] != '' && $post['res_com'] != false){
            $this->db->where('post.PropertyStatus', $post['res_com']);
        }
        if(!empty($post['category']) && $post['category'] != ''){
            $this->db->where('post.propertyTypeRes', $post['category']);
            $this->db->or_where('post.propertyTypeCom', $post['category']);
        }
        if(!empty($post['age'])){
            // $this->db->where('post.section', 'ReadyToMove');
            foreach($post['age'] as $yr){
                $range = explode('-', $yr);
                $r1 = $range[0];
                $r2 = $range[1];
                if($r2 == '*'){
                    $this->db->or_where('post.AgeofPropeety >=', $r1);
                }else{
                    $this->db->or_where('post.AgeofPropeety >=', $r1);
                    $this->db->or_where('post.AgeofPropeety <=', $r2);
                }
            }
        }
        if(!empty($post['posted_by'])){
            $this->db->where_in('post.user_type', $post['posted_by']);
        }
        if(!empty($post['area_value']) && !empty($post['area_unit']) && !empty($post['area'])){
            if($post['area'] == 'Min' && $post['area_value'] != ''){
                $this->db->where('post.sizestartingfrom >=', $post['area_value']);
                $this->db->where('post.sizestartingfromUnit', $post['area_unit']);
            }elseif($post['area'] == 'Max' && $post['area_value'] != ''){
                $this->db->where('post.sizeupto <=', $post['area_value']);
                $this->db->where('post.sizeuptoUnit', $post['area_unit']);
            }
        }
        $this->db->where('post.is_deleted', 0);
        $this->db->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")));
        if(!empty($post['sort_by'])){
            if($post['sort_by'] == 'Date: Newest'){
                $this->db->order_by('post.refresh_date', 'DESC');
            }
            if($post['sort_by'] == 'Price: Low-High'){
                $this->db->order_by('post.price', 'ASC');
            }
            if($post['sort_by'] == 'Price: High-Low'){
                $this->db->order_by('post.price', 'DESC');
            }
        }
        
        $this->db->limit($per_page, $pageno);
        return $this->db->get()->result();
    }*/
    
    
    function search_project($post, $per_page, $pageno){
        $this->db->select('*');
        $this->db->from('post_project post');
        if(!empty($post['price_minimum']))
            $this->db->where('post.price >=', $post['price_minimum']);
        if(!empty($post['price_maximum']))
            $this->db->where('post.price <=', $post['price_maximum']);
        if(!empty($post['under_construction'])){
            $this->db->where('post.section', 'PossessionFrom');
        }
        if(!empty($post['ready_to_move']) && $post['ready_to_move'] == 'true'){
            $this->db->where('post.section', 'ReadyToMove');
        }
        if(!empty($post['under_construction']) && $post['under_construction'] == 'true'){
            if(!empty($post['availability'])){
                //$this->db->where('post.section', 'PossessionFrom');
                foreach($post['availability'] as $i=>$yr){
                    if($yr != ''){
                        if($i == 0){
                            $this->db->like('post.PossessionDate', "$yr-%");
                        }else{
                            $this->db->or_like('post.PossessionDate', "$yr-%");
                        }
                    }
                }
            }
        }
        if(!empty($post['state']) && $post['state'] != ''){
            $this->db->like('post.state', $post['state']);
        }
        if(!empty($post['city']) && $post['city'] != ''){
            $this->db->like('post.city', $post['city']);
        }
        if(!empty($post['location']) && $post['location'] != ''){
            $this->db->like('post.location', $post['location']);
        }
        /*if(!empty($post['ready_to_move'])){
            $this->db->where('post.section', 'ReadyToMove');
        }*/
        if(!empty($post['res_com']) && $post['res_com'] != '' && $post['res_com'] != false){
            $this->db->where('post.PropertyStatus', $post['res_com']);
        }
        if(!empty($post['category']) && $post['category'] != ''){
            $this->db->where('post.propertyTypeRes', $post['category']);
            $this->db->or_where('post.propertyTypeCom', $post['category']);
        }
        if(!empty($post['age'])){
            foreach($post['age'] as $yr){
                $range = explode('-', $yr);
                $r1 = $range[0];
                $r2 = $range[1];
                if($r2 == '*'){
                    $this->db->or_where('post.AgeofPropeety >=', $r1);
                }else{
                    $this->db->or_where('post.AgeofPropeety >=', $r1);
                    $this->db->or_where('post.AgeofPropeety <=', $r2);
                }
            }
        }
        if(!empty($post['posted_by'])){
            $this->db->where_in('post.user_type', $post['posted_by']);
        }
        $this->db->where('post.is_deleted', 0);
        // $this->db->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")));
        if(!empty($post['sort_by'])){
            if($post['sort_by'] == 'Date: Newest'){
                $this->db->order_by('post.refresh_date', 'DESC');
            }
            if($post['sort_by'] == 'Price: Low-High'){
                $this->db->order_by('post.price', 'ASC');
            }
            if($post['sort_by'] == 'Price: High-Low'){
                $this->db->order_by('post.price', 'DESC');
            }
        }
        $this->db->limit($per_page, $pageno);
        return $this->db->get()->result();
    }
    
    
    function search_property_count($post){
        $this->db->select('*');
        $this->db->from('post_project post');
        if(!empty($post['price_minimum']))
            $this->db->where('post.price >=', $post['price_minimum']);
        if(!empty($post['price_maximum']))
            $this->db->where('post.price <=', $post['price_maximum']);
        if(!empty($post['under_construction'])){
            $this->db->where('post.section', 'PossessionFrom');
        }
        if(!empty($post['ready_to_move']) && $post['ready_to_move'] == 'true'){
            $this->db->where('post.section', 'ReadyToMove');
        }
        if(!empty($post['under_construction']) && $post['under_construction'] == 'true'){
            if(!empty($post['availability'])){
                //$this->db->where('post.section', 'PossessionFrom');
                foreach($post['availability'] as $i=>$yr){
                    if($yr != ''){
                        if($i == 0){
                            $this->db->like('post.PossessionDate', "$yr-%");
                        }else{
                            $this->db->or_like('post.PossessionDate', "$yr-%");
                        }
                    }
                }
            }
        }
        if(!empty($post['state']) && $post['state'] != ''){
            $this->db->like('post.state', $post['state']);
        }
        if(!empty($post['city']) && $post['city'] != ''){
            $this->db->like('post.city', $post['city']);
        }
        if(!empty($post['location']) && $post['location'] != ''){
            $this->db->like('post.location', $post['location']);
        }
        /*if(!empty($post['ready_to_move'])){
            $this->db->where('post.section', 'ReadyToMove');
        }*/
        if(!empty($post['res_com']) && $post['res_com'] != '' && $post['res_com'] != false){
            $this->db->where('post.PropertyStatus', $post['res_com']);
        }
        if(!empty($post['category']) && $post['category'] != ''){
            $this->db->where('post.propertyTypeRes', $post['category']);
            $this->db->or_where('post.propertyTypeCom', $post['category']);
        }
        if(!empty($post['age'])){
            foreach($post['age'] as $yr){
                $range = explode('-', $yr);
                $r1 = $range[0];
                $r2 = $range[1];
                if($r2 == '*'){
                    $this->db->or_where('post.AgeofPropeety >=', $r1);
                }else{
                    $this->db->or_where('post.AgeofPropeety >=', $r1);
                    $this->db->or_where('post.AgeofPropeety <=', $r2);
                }
            }
        }
        if(!empty($post['posted_by'])){
            $this->db->where_in('post.user_type', $post['posted_by']);
        }
        $this->db->where('post.is_deleted', 0);
        $this->db->where('post.status !=', 2);
        // $this->db->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")));
        if(!empty($post['sort_by'])){
            if($post['sort_by'] == 'Date: Newest'){
                $this->db->order_by('post.refresh_date', 'DESC');
            }
            if($post['sort_by'] == 'Price: Low-High'){
                $this->db->order_by('post.price', 'ASC');
            }
            if($post['sort_by'] == 'Price: High-Low'){
                $this->db->order_by('post.price', 'DESC');
            }
        }
        $res1 =  $this->db->count_all_results();
        //pre($this->db->last_query());
        
        //Property
        $this->db->select('post.*, type.*, details.*');
        $this->db->from('post_property post');
        $this->db->join('property_type type', 'type.post_id = post.post_id', 'left');
        $this->db->join('other_details details', 'details.post_id = post.post_id', 'left');
        if(!empty($post['price_minimum'])){
            $this->db->where('type.rentPerMonth >=', $post['price_minimum']);
            $this->db->or_where('type.net_amount >=', $post['price_minimum']);
        }
        if(!empty($post['price_maximum'])){
            $this->db->where('type.rentPerMonth <=', $post['price_maximum']);
            $this->db->or_where('type.net_amount <=', $post['price_maximum']);
        }
        if(!empty($post['ready_to_move']) && $post['ready_to_move'] == 'true'){ 
            $this->db->where('details.section', 'ReadyToMove');
        }
        if(!empty($post['under_construction']) && $post['under_construction'] == 'true'){
            $this->db->where('details.section', 'PossessionFrom');
            if(!empty($post['availability'])){
                foreach($post['availability'] as $i=>$yr){
                    if($yr != ''){
                        if($i == 0){
                            $this->db->like('details.PossessionDate', "$yr-%");
                        }else{
                            $this->db->or_like('details.PossessionDate', "$yr-%");
                        }
                    }
                }
            }
        }
        if(!empty($post['state']) && $post['state'] != ''){
            $this->db->like('post.state', $post['state']);
        }
        if(!empty($post['city']) && $post['city'] != ''){
            $this->db->like('post.city', $post['city']);
        }
        if(!empty($post['location']) && $post['location'] != ''){
            $this->db->like('post.location', $post['location']);
        }
        if(!empty($post['res_com']) && $post['res_com'] != '' && $post['res_com'] != 'false'){
            $this->db->where('type.res_com', $post['res_com']);
        }
        if(!empty($post['rent_sell'])){
            $this->db->where_in('type.rent_sell', $post['rent_sell']);
        }
        if(!empty($post['category']) && $post['category'] != ''){
            $this->db->where('type.residential', $post['category']);
        }
        
        /*if(!empty($post['type'])){
            $this->db->where('type.rent_sell', $post['type']);
        }*/
        if(!empty($post['age'])){
            // $this->db->where('post.section', 'ReadyToMove');
            foreach($post['age'] as $yr){
                $range = explode('-', $yr);
                $r1 = $range[0];
                $r2 = $range[1];
                if($r2 == '*'){
                    $this->db->or_where('details.AgeofPropeety >=', $r1);
                }else{
                    $this->db->or_where('details.AgeofPropeety >=', $r1);
                    $this->db->or_where('details.AgeofPropeety <=', $r2);
                }
            }
        }
        if(!empty($post['posted_by'])){
            $this->db->where_in('post.user_type', $post['posted_by']);
        }
        $this->db->where('post.is_deleted', 0);
        // $this->db->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")));
        if(!empty($post['sort_by'])){
            if($post['sort_by'] == 'Date: Newest'){
                $this->db->order_by('post.refresh_date', 'DESC');
            }
            if($post['sort_by'] == 'Price: Low-High'){
                if(!empty($post['rent_sell'])){
                    if($post['rent_sell'] == 'sell'){
                        $this->db->order_by('type.net_amount', 'ASC');
                    }else{
                        $this->db->order_by('type.rentPerMonth', 'ASC');
                    }
                }else{
                    $this->db->order_by('type.net_amount', 'ASC');
                }
            }
            if($post['sort_by'] == 'Price: High-Low'){
                if(!empty($post['rent_sell'])){
                    if($post['rent_sell'] == 'sell'){
                        $this->db->order_by('type.net_amount', 'DESC');
                    }else{
                        $this->db->order_by('type.rentPerMonth', 'DESC');
                    }
                }else{
                    $this->db->order_by('type.net_amount', 'DESC');
                }
            }
        }
        $res2 = $this->db->count_all_results();
        return ($res1+$res2);
    }
    
    
    /*function search_property($post, $per_page, $pageno){
        $this->db->select('post.*, type.*, details.*');
        $this->db->from('post_property post');
        $this->db->join('property_type type', 'type.post_id = post.post_id', 'left');
        $this->db->join('other_details details', 'details.post_id = post.post_id', 'left');
        if(!empty($post['price_minimum'])){
            $this->db->where('type.rentPerMonth >=', $post['price_minimum']);
            $this->db->or_where('type.net_amount >=', $post['price_minimum']);
        }
        if(!empty($post['price_maximum'])){
            $this->db->where('type.rentPerMonth <=', $post['price_maximum']);
            $this->db->or_where('type.net_amount <=', $post['price_maximum']);
        }
        if(!empty($post['ready_to_move'])){
            $this->db->where('details.section', 'ReadyToMove');
        }else{
            if(!empty($post['under_construction'])){
                $this->db->where('details.section', 'PossessionFrom');
            }
            if(!empty($post['availability'])){
                $this->db->where('details.section', 'PossessionFrom');
                foreach($post['availability'] as $yr){
                    if($yr != '')
                        $this->db->like('details.PossessionDate', "$yr-%");
                }
            }
        }
        
        if(!empty($post['state']) && $post['state'] != ''){
            $this->db->like('post.state', $post['state']);
        }
        if(!empty($post['city']) && $post['city'] != ''){
            $this->db->like('post.city', $post['city']);
        }
        if(!empty($post['location']) && $post['location'] != ''){
            $this->db->like('post.location', $post['location']);
        }
        
        if(!empty($post['type'])){
            $this->db->where('type.rent_sell', $post['type']);
        }
        if(!empty($post['category']) && $post['category'] != ''){
            $this->db->where('type.residential', $post['category']);
        }
        if(!empty($post['resale'])){
            $this->db->where('type.rent_sell', $post['type']);
        }
        if(!empty($post['age'])){
            // $this->db->where('post.section', 'ReadyToMove');
            foreach($post['age'] as $yr){
                $range = explode('-', $yr);
                $r1 = $range[0];
                $r2 = $range[1];
                if($r2 == '*'){
                    $this->db->or_where('details.AgeofPropeety >=', $r1);
                }else{
                    $this->db->or_where('details.AgeofPropeety >=', $r1);
                    $this->db->or_where('details.AgeofPropeety <=', $r2);
                }
            }
        }
        if(!empty($post['posted_by'])){
            $this->db->where_in('post.user_type', $post['posted_by']);
        }
        $this->db->where('post.is_deleted', 0);
        $this->db->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")));
        if(!empty($post['sort_by'])){
            if($post['sort_by'] == 'Date: Newest'){
                $this->db->order_by('post.refresh_date', 'DESC');
            }
            if($post['sort_by'] == 'Price: Low-High'){
                if(!empty($post['rent_sell'])){
                    if($post['rent_sell'] == 'sell'){
                        $this->db->order_by('type.net_amount', 'ASC');
                    }else{
                        $this->db->order_by('type.rentPerMonth', 'ASC');
                    }
                }else{
                    $this->db->order_by('type.net_amount', 'ASC');
                }
            }
            if($post['sort_by'] == 'Price: High-Low'){
                if(!empty($post['rent_sell'])){
                    if($post['rent_sell'] == 'sell'){
                        $this->db->order_by('type.net_amount', 'DESC');
                    }else{
                        $this->db->order_by('type.rentPerMonth', 'DESC');
                    }
                }else{
                    $this->db->order_by('type.net_amount', 'DESC');
                }
            }
        }
        $this->db->limit($per_page, $pageno);
        return $this->db->get()->result();
    }*/
    
    function search_property($post, $per_page, $pageno){
        $this->db->select('post.*, type.*, details.*');
        $this->db->from('post_property post');
        $this->db->join('property_type type', 'type.post_id = post.post_id', 'left');
        $this->db->join('other_details details', 'details.post_id = post.post_id', 'left');
        if(!empty($post['price_minimum'])){
            $this->db->where('type.rentPerMonth >=', $post['price_minimum']);
            $this->db->or_where('type.net_amount >=', $post['price_minimum']);
        }
        if(!empty($post['price_maximum'])){
            $this->db->where('type.rentPerMonth <=', $post['price_maximum']);
            $this->db->or_where('type.net_amount <=', $post['price_maximum']);
        }
        if(!empty($post['ready_to_move']) && $post['ready_to_move'] == 'true'){ 
            $this->db->where('details.section', 'ReadyToMove');
        }
        if(!empty($post['under_construction']) && $post['under_construction'] == 'true'){
            $this->db->where('details.section', 'PossessionFrom');
            if(!empty($post['availability'])){
                foreach($post['availability'] as $i=>$yr){
                    if($yr != ''){
                        if($i == 0){
                            $this->db->like('details.PossessionDate', "$yr-%");
                        }else{
                            $this->db->or_like('details.PossessionDate', "$yr-%");
                        }
                    }
                }
            }
        }
        if(!empty($post['state']) && $post['state'] != ''){
            $this->db->like('post.state', $post['state']);
        }
        if(!empty($post['city']) && $post['city'] != ''){
            $this->db->like('post.city', $post['city']);
        }
        if(!empty($post['location']) && $post['location'] != ''){
            $this->db->like('post.location', $post['location']);
        }
        if(!empty($post['res_com']) && $post['res_com'] != '' && $post['res_com'] != 'false'){
            $this->db->where('type.res_com', $post['res_com']);
        }
        if(!empty($post['rent_sell'])){
            $this->db->where_in('type.rent_sell', $post['rent_sell']);
        }
        if(!empty($post['category']) && $post['category'] != ''){
            $this->db->where('type.residential', $post['category']);
        }
        
        /*if(!empty($post['type'])){
            $this->db->where('type.rent_sell', $post['type']);
        }*/
        if(!empty($post['age'])){
            // $this->db->where('post.section', 'ReadyToMove');
            foreach($post['age'] as $yr){
                $range = explode('-', $yr);
                $r1 = $range[0];
                $r2 = $range[1];
                if($r2 == '*'){
                    $this->db->or_where('details.AgeofPropeety >=', $r1);
                }else{
                    $this->db->or_where('details.AgeofPropeety >=', $r1);
                    $this->db->or_where('details.AgeofPropeety <=', $r2);
                }
            }
        }
        if(!empty($post['posted_by'])){
            $this->db->where_in('post.user_type', $post['posted_by']);
        }
        $this->db->where('post.is_deleted', 0);
        // $this->db->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")));
        if(!empty($post['sort_by'])){
            if($post['sort_by'] == 'Date: Newest'){
                $this->db->order_by('post.refresh_date', 'DESC');
            }
            if($post['sort_by'] == 'Price: Low-High'){
                if(!empty($post['rent_sell'])){
                    if($post['rent_sell'] == 'sell'){
                        $this->db->order_by('type.net_amount', 'ASC');
                    }else{
                        $this->db->order_by('type.rentPerMonth', 'ASC');
                    }
                }else{
                    $this->db->order_by('type.net_amount', 'ASC');
                }
            }
            if($post['sort_by'] == 'Price: High-Low'){
                if(!empty($post['rent_sell'])){
                    if($post['rent_sell'] == 'sell'){
                        $this->db->order_by('type.net_amount', 'DESC');
                    }else{
                        $this->db->order_by('type.rentPerMonth', 'DESC');
                    }
                }else{
                    $this->db->order_by('type.net_amount', 'DESC');
                }
            }
        }else{
            $this->db->order_by('post.refresh_date', 'DESC');
        }
        $this->db->limit($per_page, $pageno);
        return $this->db->get()->result();
    }
    
    function home_page_search($post, $type = ''){
        // pre($post);
        if($post){
            $this->db->select('post.*,type.*, other.*');
            $this->db->from('post_property post');
            $this->db->join('property_type type', 'type.post_id = post.post_id', 'left');
            $this->db->join('other_details other', 'other.post_id = post.post_id', 'left');
            
            if(!empty($post['search_type']) && $post['search_type'] == '1'){
                $this->db->where('type.rent_sell', 'Rent');
            }
            
            if(!empty($post['search_type']) && $post['search_type'] == '2'){
                $this->db->where('type.rent_sell', 'Sell');
            }
            
            if(!empty($post['category']) && $post['category'] != ''){
                $this->db->where('type.residential', $post['category']);
            }
            if(!empty($post['posted_by']) && $post['posted_by'] != ''){
                $this->db->where('post.user_type', $post['posted_by']);
            }
            if(!empty($post['price_minimum']) && $post['price_minimum'] != ''){
                if($post['search_type'] == '1'){
                    $this->db->where('type.rentPerMonth >=', $post['price_minimum']);
                }else{
                    $this->db->where('type.net_amount >=', $post['price_minimum']);
                }
            }
            if(!empty($post['price_maximum']) && $post['price_maximum'] != ''){
                if($post['search_type'] == '1'){
                    $this->db->where('type.rentPerMonth <=', $post['price_maximum']);
                }else{
                    $this->db->where('type.net_amount <=', $post['price_maximum']);
                }
            }
            // $this->db->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")));
            $this->db->where('post.is_deleted', 0);
            $this->db->where('post.status', 1);
            
            if(!empty($post['city']) && $post['city'] != ''){
                $this->db->like('post.city', $post['city']);
            }
            
            if(!empty($post['search_box']) && $post['search_box'] != ''){
            $this->db->like('post.location', $post['search_box']);
            }
            
            
            if(!empty($post['sort_by'])){
                if($post['sort_by'] == 'Date: Newest'){
                    $this->db->order_by('post.refresh_date', 'DESC');
                }
                if($post['sort_by'] == 'Price: Low-High'){
                    if(!empty($post['search_type'])){
                        if($post['search_type'] == '1'){
                            $this->db->order_by('type.net_amount', 'ASC');
                        }else{
                            $this->db->order_by('type.rentPerMonth', 'ASC');
                        }
                    }else{
                        $this->db->order_by('type.net_amount', 'ASC');
                    }
                }
                if($post['sort_by'] == 'Price: High-Low'){
                    if(!empty($post['search_type'])){
                        if($post['search_type'] == '2'){
                            $this->db->order_by('type.net_amount', 'DESC');
                        }else{
                            $this->db->order_by('type.rentPerMonth', 'DESC');
                        }
                    }else{
                        $this->db->order_by('type.net_amount', 'DESC');
                    }
                }
            }else{
                $this->db->order_by('post.refresh_date', 'DESC');
            }
            
            
            
            
            $this->db->group_by('post.lead_id');
            return $this->db->get()->result();
        }
        
        else {
            $this->db->select('post.*,type.*, other.*');
            $this->db->from('post_property post');
            $this->db->join('property_type type', 'type.post_id = post.post_id', 'left');
            $this->db->join('other_details other', 'other.post_id = post.post_id', 'left');
            $this->db->where('type.rent_sell', $type);
            $this->db->where('post.is_deleted', 0);
            $this->db->where('post.status', 1);
            $this->db->order_by('post.refresh_date', 'DESC');
            $this->db->group_by('post.lead_id');
            return $this->db->get()->result();
        }
    }
    
    // function home_page_search($post){
    //     if($post){
    //         if(!empty($post['state']) && $post['state']!=''){$state_name = $this->getdatabyid(array('id' => $post['state']), 'state');}
    //         if(!empty($post['city']) && $post['city']!=''){$city_name = $this->getdatabyid(array('id' => $post['city']), 'city');}
    //         if(!empty($post['location']) && $post['location']!=''){$location_name = $this->getdatabyid(array('id' => $post['location']), 'location');}
    //         $this->db->select('post.*,type.*, other.*');
    //         $this->db->from('post_property post');
    //         $this->db->join('property_type type', 'type.post_id = post.post_id', 'left');
    //         $this->db->join('other_details other', 'other.post_id = post.post_id', 'left');
    //         if($post['residential_commercial'] == 'Residential'){
    //             $this->db->join('commercial_amenities amenities', 'other.post_id = post.post_id', 'left');
    //         }else{
    //             $this->db->join('residential_amenities amenities', 'other.post_id = post.post_id', 'left');
    //         };
            
    //         $this->db->where('type.rent_sell', $post['rent_sell']);
    //         $this->db->where('type.res_com', $post['residential_commercial']);
    //         $this->db->where('post.refresh_date >=', date('Y-m-d',strtotime("-3 months")));
    //         $this->db->where('post.is_deleted', 0);
    //         $this->db->where('post.status', 1);
            
    //         if(!empty($post['state']) && $post['state']!=''){
    //             $this->db->like('post.state', $state_name->name);
    //         }
            
    //         if(!empty($post['city']) && $post['city'] != ''){
    //             $this->db->like('post.city', $city_name->name);
    //         }
    //         if(!empty($post['location']) && $post['location']!=''){
    //             $this->db->like('post.location', $location_name->name);
    //         }
    //         if(!empty($post['property_type']) && $post['property_type'] != ''){
    //             $this->db->where('type.residential', $post['property_type']);
    //         }
    //         if(!empty($post['FurnishedStatus']) && $post['FurnishedStatus'] != ''){
    //             $this->db->where('type.FurnishedStatus', $post['FurnishedStatus']);
    //         }
    //         if(!empty($post['posted_by']) && $post['posted_by'] != ''){
    //             $this->db->where('post.user_type', $post['posted_by']);
    //         }
    //         if(!empty($post['price_minimum']) && $post['price_minimum'] != ''){
    //             if($post['rent_sell'] == 'Rent'){
    //                 $this->db->where('type.rentPerMonth >=', $post['price_minimum']);
    //             }else{
    //                 $this->db->where('type.net_amount >=', $post['price_minimum']);
    //             }
    //         }
    //         if(!empty($post['price_maximum']) && $post['price_maximum'] != ''){
    //             if($post['rent_sell'] == 'Rent'){
    //                 $this->db->where('type.rentPerMonth <=', $post['price_maximum']);
    //             }else{
    //                 $this->db->where('type.net_amount <=', $post['price_maximum']);
    //             }
    //         }
    //         if($post['bhk'] != '0' && !empty($post['bhk']) && $post['bhk'] != ''){
    //             $this->db->where('post.flatno', $post['bhk']);
    //         }
    //         if($post['residential_commercial'] == 'Residential'){
    //             if(!empty($post['PowerBackup'])){ $this->db->where('amenities.PowerBackup', $post['PowerBackup']); }
    //             if(!empty($post['ServiveLift'])){ $this->db->where('amenities.ServiveLift', $post['ServiveLift']); }
    //             if(!empty($post['BanquetHall'])){ $this->db->where('amenities.BanquetHall', $post['BanquetHall']); }
    //             if(!empty($post['GYM'])){ $this->db->where('amenities.GYM', $post['GYM']); }
    //             if(!empty($post['VisitorParking'])){ $this->db->where('amenities.VisitorParking', $post['VisitorParking']); }
    //             if(!empty($post['Intercom'])){ $this->db->where('amenities.Intercom', $post['Intercom']); }
    //             if(!empty($post['CCTV'])){ $this->db->where('amenities.CCTV', $post['CCTV']); }
    //             if(!empty($post['SwimmingPool'])){ $this->db->where('amenities.SwimmingPool', $post['SwimmingPool']); }
    //             if(!empty($post['CloubHouse'])){ $this->db->where('amenities.CloubHouse', $post['CloubHouse']); }
    //             if(!empty($post['SarvantRoom'])){ $this->db->where('amenities.SarvantRoom', $post['SarvantRoom']); }
    //             if(!empty($post['WIFI'])){ $this->db->where('amenities.WIFI', $post['WIFI']); }
    //             if(!empty($post['CommunityHall'])){ $this->db->where('amenities.CommunityHall', $post['CommunityHall']); }
    //             if(!empty($post['IndoorGame'])){ $this->db->where('amenities.IndoorGame', $post['IndoorGame']); }
    //             if(!empty($post['OutDoorGame'])){ $this->db->where('amenities.OutDoorGame', $post['OutDoorGame']); }
    //             if(!empty($post['GasPipeLine'])){ $this->db->where('amenities.GasPipeLine', $post['GasPipeLine']); }
    //             if(!empty($post['Park'])){ $this->db->where('amenities.Park', $post['Park']); }
    //             if(!empty($post['Security'])){ $this->db->where('amenities.Security', $post['Security']); }
    //         }else{
    //             if(!empty($post['PowerBackup'])){ $this->db->where('amenities.PowerBackup', $post['PowerBackup']); }
    //             if(!empty($post['ServiveLift'])){ $this->db->where('amenities.ServiveLift', $post['ServiveLift']); }
    //             if(!empty($post['Intercom'])){ $this->db->where('amenities.Intercom', $post['Intercom']); }
    //             if(!empty($post['CCTV'])){ $this->db->where('amenities.CCTV', $post['CCTV']); }
    //             if(!empty($post['WIFI'])){ $this->db->where('amenities.WIFI', $post['WIFI']); }
    //             if(!empty($post['VisitorParking'])){ $this->db->where('amenities.VisitorParking', $post['VisitorParking']); }
    //             if(!empty($post['Security'])){ $this->db->where('amenities.Security', $post['Security']); }
    //         }
    //         $this->db->order_by('post.refresh_date', 'DESC');
    //         $this->db->group_by('post.lead_id');
    //         return $this->db->get()->result();
    //     }
    // }
    
    public function getInterestedDealDetailsById($id){
        $this->db->select('interested.*,property.lead_id as property_lead,property.name as owner_name,buyer.lead_id as buyer_lead,buyer.name as buyer_name');
        $this->db->from('property_interested_details interested');
        $this->db->join('post_property property', 'property.post_id = interested.post_id', 'left');
        $this->db->join('post_requirement buyer', 'buyer.post_id = interested.buyer', 'left');
        $this->db->where('interested.id', $id);
        return $this->db->get()->row();
    }
    
    
    public function getdealbystatus($status){
        $this->db->select('interested.*,property.in_process_flag as owner_in_process_flag,property.lead_id,property.name as owner_name,buyer.in_process_flag as client_in_process_flag,buyer.lead_id as buyer_lead,buyer.name as buyer_name, executive.name as executive_name, caller.name as caller_name ');
        $this->db->from('property_interested_details interested');
        $this->db->join('post_property property', 'property.post_id = interested.post_id', 'left');
        $this->db->join('post_requirement buyer', 'buyer.post_id = interested.buyer', 'left');
        //$this->db->join('property_type type', 'type.post_id = interested.post_id', 'left');
        $this->db->join('admin_users executive', 'executive.user_id = interested.executive', 'left');
        $this->db->join('admin_users caller', 'caller.user_id = interested.caller', 'left');
        $this->db->where('interested.status', $status);
        return $this->db->get()->result();
    }
    
    public function getdealbystatusandwhere($status, $where = array()){
        $this->db->select('interested.*,property.in_process_flag as owner_in_process_flag,property.lead_id,property.name as owner_name,buyer.in_process_flag as client_in_process_flag,buyer.lead_id as buyer_lead,buyer.name as buyer_name, executive.name as executive_name, caller.name as caller_name ');
        $this->db->from('property_interested_details interested');
        $this->db->join('post_property property', 'property.post_id = interested.post_id', 'left');
        $this->db->join('post_requirement buyer', 'buyer.post_id = interested.buyer', 'left');
        //$this->db->join('property_type type', 'type.post_id = interested.post_id', 'left');
        $this->db->join('admin_users executive', 'executive.user_id = interested.executive', 'left');
        $this->db->join('admin_users caller', 'caller.user_id = interested.caller', 'left');
        $this->db->where('interested.status', $status);
        $this->db->where($where);
        return $this->db->get()->result();
    }
    
    public function get_admin_performance(){
        $this->db->select('interested.*, executive.name as executive_name, caller.name as caller_name');
        $this->db->from('property_interested_details interested');
        $this->db->join('post_property property', 'property.post_id = interested.post_id', 'left');
        $this->db->join('property_type type', 'type.post_id = interested.post_id', 'left');
        $this->db->join('admin_users executive', 'executive.user_id = interested.executive', 'left');
        $this->db->join('admin_users caller', 'caller.user_id = interested.caller', 'left');
        $this->db->where('interested.status', 'Closed');
        return $this->db->get()->result();
    }
    
    public function getadminperformancebyidmonthyear($admin_id, $month, $year){
        /*$this->db->select('interested.*');
        $this->db->from('property_interested_details interested');
        $this->db->where('interested.status', 'Closed');
        $this->db->where('interested.executive', $admin_id);
        $this->db->or_where('interested.caller', $admin_id);
        $this->db->like('interested.created', $year.'-'.$month);
        return $this->db->get()->result();*/
        $query = $this->db->query("SELECT `interested`.* FROM `property_interested_details` `interested` WHERE `interested`.`status` = 'Closed' AND (`interested`.`executive` = $admin_id OR `interested`.`caller` = $admin_id) AND `interested`.`created` LIKE '$year-$month-%'");
        return $query->result();
    }
    
    public function load_buyer($lead_id){
        $this->db->select('post_requirement.*');
        $this->db->from('post_requirement');
        $this->db->where('post_requirement.is_deleted', 0);
        $this->db->where('post_requirement.status', 1);
        $this->db->like('post_requirement.lead_id', $lead_id);
        return $this->db->get()->result();
    }
    
    public function load_seller($lead_id){
        $this->db->select('post_property.*');
        $this->db->from('post_property');
        $this->db->where('post_property.is_deleted', 0);
        $this->db->where('post_property.status', 1);
        $this->db->like('post_property.lead_id', $lead_id);
        return $this->db->get()->result();
    }
    
    public function getLeadPartnersCommission(){
        $query = $this->db->query("SELECT `interested`.* FROM `property_interested_details` `interested` WHERE `interested`.`status` = 'Closed' AND (`interested`.`property_user_type` = 'lead_partners' OR `interested`.`buyer_user_type` = 'lead_partners')");
        return $query->result();
    }
    
    public function getAdminLeaveDetailsById($employee_id, $start, $end){
        $sql = "SELECT *, description as title FROM admin_leave_details where employee_id = $employee_id AND (start BETWEEN '$start' AND '$end') AND is_deleted = 0 ORDER BY start ASC";
        return $this->db->query($sql)->result();
    }
    
    public function getAdminAttendance($month, $year){
        $sql = "SELECT user.*, SUM(attendance.no_of_days) as no_of_days FROM admin_users user, admin_leave_details attendance WHERE user.user_id = attendance.employee_id AND MONTH(attendance.start) = $month AND YEAR(attendance.start) = $year AND attendance.is_deleted = 0 GROUP BY user.user_id ";
        return $this->db->query($sql)->result();
        
        /*$this->db->select('SUM(attendance.no_of_days) as no_of_days, user.user_id, user.name');
        $this->db->from('admin_users user');
        $this->db->join('admin_leave_details attendance', 'attendance.employee_id  = user.user_id ', 'left');
        $this->db->where('MONTH(attendance.start)', $month);
        $this->db->where('YEAR(attendance.start)', $year);
        $this->db->where('user.is_deleted', 0);
        $this->db->where('attendance.is_deleted', 0);
        return $this->db->get()->result();*/
    }
    
    public function getAdminAttendanceById($month, $year, $admin_id){
        $sql = "SELECT user.*, SUM(attendance.no_of_days) as no_of_days FROM admin_users user, admin_leave_details attendance WHERE user.user_id = attendance.employee_id AND MONTH(attendance.start) = $month AND YEAR(attendance.start) = $year AND attendance.is_deleted = 0 AND attendance.leave_type = 'Leave' GROUP BY user.user_id ";
        return $this->db->query($sql)->row();
    }

    public function getAdminOverDayCount($month, $year, $admin_id){
        $sql = "SELECT SUM(attendance.no_of_days) as no_of_days FROM admin_leave_details attendance WHERE MONTH(attendance.start) = $month AND YEAR(attendance.start) = $year AND attendance.is_deleted = 0 AND attendance.employee_id = $admin_id AND attendance.leave_type = 'Over Day'";
        return $this->db->query($sql)->row();
    }

    public function getAdminHolidayDayCount($month, $year, $admin_id){
        $sql = "SELECT SUM(attendance.no_of_days) as no_of_days FROM admin_leave_details attendance WHERE MONTH(attendance.start) = $month AND YEAR(attendance.start) = $year AND attendance.is_deleted = 0 AND attendance.employee_id = $admin_id AND attendance.leave_type = 'Holiday'";
        return $this->db->query($sql)->row();
    }

    
    public function getAdminHolidayDetailsById($start, $end){
        $sql = "SELECT *, description as title FROM admin_holiday_details where (start BETWEEN '$start' AND '$end') AND is_deleted = 0 ORDER BY start ASC";
        return $this->db->query($sql)->result();
    }
    
    public function getAdminHolidayDetailsByMonth($start, $end){
        $sql = "SELECT *, description as title FROM admin_holiday_details where (start BETWEEN '$start' AND '$end') AND is_deleted = 0 ORDER BY start ASC";
        return $this->db->query($sql)->result();
    }

    public function getAdminHolidayCountByStartEnd($start, $end){
        $sql = "SELECT count(id) as count FROM admin_holiday_details where (start BETWEEN '$start' AND '$end') AND is_deleted = 0";
        return $this->db->query($sql)->row();
    }

    /*public function getDealPaymentDetailsByStatus($status, $where)
    {
        $this->db->select('interested.*, payment.deal_type,payment.payment_pending_details,payment.party_id,payment.deal_commission,payment.deal_gst,payment.deal_tds,payment.deal_total,payment.deal_received,payment.deal_pending,payment.deal_status,payment.deal_close_reason');
        $this->db->from('payment_pending_details payment');
        $this->db->join('property_interested_details interested', 'interested.id = payment.deal_id', 'left');
        $this->db->where('payment.deal_status', $status);
        if(!empty($where)){
            $this->db->where($where);
        }        
        return $this->db->get()->result();
    }*/

    public function getDealPaymentDetailsByStatus($status, $where)
    {
        $this->db->select('interested.*, payment.deal_type,payment.payment_pending_details,payment.party_id,payment.deal_commission,payment.deal_gst,payment.deal_tds,payment.deal_total,payment.deal_received,payment.deal_pending,payment.deal_status,payment.deal_close_reason');
        $this->db->from('payment_pending_details payment');
        $this->db->join('property_interested_details interested', 'interested.id = payment.deal_id', 'left');
        $this->db->where('payment.deal_status', $status);
        if(!empty($where)){
            $this->db->where($where);
        }        
        return $this->db->get()->result();
    }

    /*public function getDealPaymentPending()
    {
        $this->db->select('interested.*, payment.*');
        $this->db->from('property_interested_details interested');
        $this->db->join('payment_pending_details payment', 'payment.deal_id = interested.id', 'left');
        return $this->db->get()->result();
    }*/
    
    public function join_payment_pending_details_with_property_interested_details_by_deal_status($status)
    {
        /*$this->db->select('interested.*, payment.payment_pending_details,payment.inv_no,payment.deal_type,payment.party_id,payment.deal_commission,payment.deal_gst,payment.deal_cgst,payment.deal_sgst,payment.deal_tds,payment.deal_total,payment.deal_received,payment.deal_pending,payment.deal_status,payment.deal_close_reason');
        $this->db->from('property_interested_details interested');
        $this->db->join('payment_pending_details payment', 'payment.deal_id = interested.id', 'left');
        $this->db->order_by('payment.created', 'desc');
        return $this->db->get()->result();*/

        $this->db->select('interested.*, payment.payment_pending_details,payment.inv_no,payment.deal_type,payment.party_id,payment.deal_commission,payment.deal_gst,payment.deal_cgst,payment.deal_sgst,payment.deal_tds,payment.deal_total,payment.deal_received,payment.deal_pending,payment.deal_status,payment.deal_close_reason');
        $this->db->from('payment_pending_details payment');
        $this->db->join('property_interested_details interested', 'interested.id = payment.deal_id', 'left');
        $this->db->where('payment.deal_status', $status);
        $this->db->order_by('payment.created', 'desc');
        return $this->db->get()->result();
    }

    public function get_pending_payment_details($status = 'Close'){
        $this->db->select('interested.*');
        $this->db->from('property_interested_details interested');
        $this->db->where('interested.status', $status);
        $this->db->order_by('interested.created', 'desc');
        return $this->db->get()->result();
    }
    
    //Rhutuja 
    function get_location_list_by_city_name($city_name){
        $this->db->select('location.*');
        $this->db->from('location');
        $this->db->join('pincode', 'pincode.id = location.pincode_id', 'left');
        $this->db->join('city', 'city.id = pincode.city_id', 'left');
        $this->db->where('city.name', $city_name);
        return $this->db->get()->result();
    }
   
   function get_subscriber_data()
   {
       $this->db->select('BaseTbl.user_id, MAX(user.name) as username, MAX(user.phone) as userphone, MAX(user.email) as email, MAX(user.usertype) as usertype, MAX(user.leads_pending) as leads_pending, MAX(sub.name) as subname')
                ->from('payments as BaseTbl')
                ->join('users as user', 'user.user_id = BaseTbl.user_id', 'left')
                ->join('subscriptions as sub', 'sub.id = BaseTbl.product_id', 'left')
                ->group_by('BaseTbl.user_id');
        return $this->db->get()->result_array();
   }
   
    function get_location_list_by_city_name_new($post){
        $this->db->select('location.*');
        $this->db->from('location');
        $this->db->join('pincode', 'pincode.id = location.pincode_id', 'left');
        $this->db->join('city', 'city.id = pincode.city_id', 'left');
        $this->db->where('city.name', $post['search_city'])
                ->where('location.is_deleted', 0)
                ->where('location.status', 1);
        $this->db->like('location.name', $post['location']);
        return $this->db->get()->result();
    }
    
    function get_property_request_view($user_id) {
        $this->db->select('request.requestor_name, request.request_message, request.request_date, request.request_time, request.created, post.lead_id, post.post_id, post.image_name')
                     ->from('property_request_view request')
                     ->join('post_property post', 'post.post_id = request.post_id', 'left')
                     ->where('post.user_id', $user_id);
        return $this->db->get()->result();
    }
    
    function get_property_contact_form($user_id) {
        $this->db->select('request.full_name, request.email, request.contact, request.message, request.created, post.lead_id, post.post_id, post.image_name')
                     ->from('property_contact_form request')
                     ->join('post_property post', 'post.post_id = request.post_id', 'left')
                     ->where('post.user_id', $user_id);
        return $this->db->get()->result();
    }
   
}


?>