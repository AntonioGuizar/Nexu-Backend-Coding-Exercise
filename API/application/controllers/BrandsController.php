<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use the Brands_model and Models_model models
use application\models\Brands_model;
use application\models\Models_model;

class BrandsController extends CI_Controller {

    // Constructor to load the models
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Brands_model');
        $this->load->model('Models_model');
    }

        
    // Retrieve a list of brands with the average price of each brand's models
    public function index()
    {
        $brands = $this->Brands_model->getBrands();

        if (empty($brands)) {
            http_response_code(404);
            echo "No brands found";
            return;
        }

        if (!$brands) {
            http_response_code(400);
            echo "Error retrieving brands";
            return;
        }
        
        http_response_code(200);
        echo json_encode($brands, JSON_PRETTY_PRINT);
    }

    // Create a new brand in the 'brands' table
    public function create()
    {
        $brand_name = $this->input->post('brand_name');

        if (empty($brand_name)) {
            http_response_code(422);
            echo "Brand name is required";
            return;
        }
        
        if ($this->Brands_model->getBrandByName($brand_name)) {
            http_response_code(400);
            echo "Brand already exists";
            return;
        }

        if(!$this->Brands_model->createBrand($brand_name)) {
            http_response_code(400);
            echo "Error creating brand";
            return;
        }

        http_response_code(201);
        echo "Brand created successfully";
    }
    
    // Retrieve models for the specified brand
    public function models($brand_id)
    {
        $this->load->model('Models_model');

        $models = $this->Models_model->getModelsByBrand($brand_id);

        if (empty($models)) {
            http_response_code(404);
            echo "No models found";
            return;
        }

        if (!$models) {
            http_response_code(400);
            echo "Error retrieving models";
            return;
        }
        
        http_response_code(200);
        echo json_encode($models, JSON_PRETTY_PRINT);
    }
}