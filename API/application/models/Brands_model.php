<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands_model extends CI_Model {

    // Retrieve a list of brands from the 'brands' table and the average price without decimals of each brand's models from the 'models' table
    public function getBrands()
    {
        $this->db->select('brands.id, brands.brand_name as nombre, FLOOR(AVG(models.average_price)) AS average_price');
        $this->db->from('brands');
        $this->db->join('models', 'brands.id = models.brand_id', 'left');
        $this->db->group_by('brands.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function createBrand($brand_name)
    {
        $data = array(
            'brand_name' => $brand_name
        );

        return $this->db->insert('brands', $data);
    }

    // Check if a brand already exists in the 'brands' table
    public function getBrandByName($brand_name)
    {
        $this->db->where('brand_name', $brand_name);
        $query = $this->db->get('brands');
        $result = $query->row();
        
       return empty($result) ? false : true;
    }

    // Retrieve a brand by its id from the 'brands' table
    public function getBrandById($brand_id)
    {
        $this->db->where('id', $brand_id);
        $query = $this->db->get('brands');
        return $query->row();
    }
}