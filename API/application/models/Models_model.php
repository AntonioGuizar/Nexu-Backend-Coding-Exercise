<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models_model extends CI_Model {

    // Retrieve a list of models for a specific brand from the 'models' table
    public function getModelsByBrand($brand_id)
    {
        $this->db->select('models.id, models.name, models.average_price');
        $this->db->where('brand_id', $brand_id);
        $query = $this->db->get('models');
        return $query->result();
    }

    public function createModel($data)
    {
        return $this->db->insert('models', $data);
    }

    public function updateModel($model_id, $data)
    {
        // Update an existing model in the 'models' table
        $this->db->where('id', $model_id);
        $this->db->update('models', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }

    // Get the average price of all models from a specific brand
    public function getAveragePriceByBrand($brand_id)
    {
        $this->db->select_avg('average_price');
        $this->db->where('brand_id', $brand_id);
        $query = $this->db->get('models');
        return $query->row();
    }

    // Check if a model already exists with the same name for a specific brand in the 'models' table
    public function getModelByName($name, $brand_id)
    {
        $this->db->where('name', $name);
        $this->db->where('brand_id', $brand_id);
        $query = $this->db->get('models');
        $result = $query->row();
        
        return empty($result) ? false : true;
    }

    // Retrieve a model by its id from the 'models' table
    public function getModelById($model_id)
    {
        $this->db->where('id', $model_id);
        $query = $this->db->get('models');
        $result = $query->row();

        return empty($result) ? false : true;
    }

    // Return the average price of all models from the 'models' table
    public function getAveragePriceByModelId($model_id)
    {
        $this->db->select_avg('average_price');
        $this->db->where('id', $model_id);
        $query = $this->db->get('models');
        return $query->row();
    }

    // Retrieve a list of all the models (if the param greater of lower is set, the list will be contain the models with an average price greater or lower than the param)
    public function getModelsByAveragePrice($greater = NULL, $lower = NULL)
    {
        if ($greater && !$lower) {
            $this->db->where('average_price >', $greater);
        } else if ($lower && !$greater) {
            $this->db->where('average_price <', $lower);
        } else if ($greater && $lower) {
            $this->db->where('average_price >', $greater);
            $this->db->where('average_price <', $lower);
        }
        $query = $this->db->get('models');
        return $query->result();
    }
}