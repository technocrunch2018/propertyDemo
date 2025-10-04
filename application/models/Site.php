<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Model {
    private $_productID;
    public function setProductID($productID) {
        $this->_productID = $productID;
    }
    public function getProduct() {
        $this->db->select(array('p.id', 'p.name', 'p.details', 'p.price'));
        $this->db->from('subscriptions as p');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getProductDetails() {
        $this->db->select(array('p.id', 'p.name', 'p.details', 'p.price'));
        $this->db->from('subscriptions as p');
        $this->db->where('p.id', $this->_productID);
        $query = $this->db->get();
        return $query->row_array();
    }

}
