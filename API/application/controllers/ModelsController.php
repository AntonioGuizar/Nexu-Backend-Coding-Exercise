<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelsController extends CI_Controller {

    // Constructor to load the models
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Brands_model');
        $this->load->model('Models_model');
    }

    // Retrieve a list of all the models (if the param greater of lower is set, the list will be contain the models with an average price greater or lower than the param)
    public function index()
    {
        if ($this->input->get('greater') && !$this->input->get('lower')) {
            $models = $this->Models_model->getModelsByAveragePrice($this->input->get('greater'), NULL);
        } else if ($this->input->get('lower') && !$this->input->get('greater')) {
            $models = $this->Models_model->getModelsByAveragePrice(NULL, $this->input->get('lower'));
        } else if ($this->input->get('greater') && $this->input->get('lower')) {
            $models = $this->Models_model->getModelsByAveragePrice($this->input->get('greater'), $this->input->get('lower'));
        } else {
            $models = $this->Models_model->getModels();
        }

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

    public function create($brand_id)
    {
        $name = $this->input->post('model_name');
        $average_price = $this->input->post('average_price');

        // Check if the model name is empty
        if (empty($name)) {
            http_response_code(422);
            echo "Model name is required";
            return;
        }

        // Check if the average price is empty and set it to 0
        if (empty($average_price)) {
            $average_price = 0;
        }

        // Check if the brand exists
        if (!$this->Brands_model->getBrandById($brand_id)) {
            http_response_code(404);
            echo "Brand not found";
            return;
        }

        // Check if the model already exists
        if ($this->Models_model->getModelByName($name, $brand_id)) {
            http_response_code(400);
            echo "Model already exists";
            return;
        }

        // Check if the average price is a number and is greater than 100000
        if (!is_numeric($average_price) || $average_price < 100000) {
            http_response_code(422);
            echo "Average price must be a number and must be greater than 100000";
            return;
        }

        $data = array(
            'name' => $name,
            'average_price' => $average_price,
            'brand_id' => $brand_id
        );

        if (!$this->Models_model->createModel($data)) {
            http_response_code(400);
            echo "Error creating model";
            return;
        }

        http_response_code(201);
        echo "Model created successfully";
    }

    // Edit the average price of a model.
    public function update($model_id)
    {
        $average_price = $this->input->get('average_price');

        // Check if the average price is empty
        if (empty($average_price)) {
            http_response_code(422);
            echo "Average price is required";
            return;
        }

        // Check if the average price is a number and is greater than 100000
        if (!is_numeric($average_price) || $average_price < 100000) {
            http_response_code(422);
            echo "Average price must be a number and must be greater than 100000";
            return;
        }

        // Check if the model exists
        if (!$this->Models_model->getModelById($model_id)) {
            http_response_code(404);
            echo "Model not found";
            return;
        }

        // Check if the average price is already the same as the one in the database
        if ($this->Models_model->getAveragePriceByModelId($model_id)->average_price == $average_price) {
            http_response_code(400);
            echo "Average price is already the same";
            return;
        }

        $data = array(
            'average_price' => $average_price
        );

        // Update the model
        if (!$this->Models_model->updateModel($model_id, $data)) {
            http_response_code(400);
            echo "Error updating model";
            return;
        }

        http_response_code(200);
        echo "Model updated successfully";
    }
}