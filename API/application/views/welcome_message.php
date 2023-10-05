<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to Nexu Backend Coding Exercise</title>

	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding: 0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
</head>

<body>
	<h1>Nexu Backend Coding Exercise</h1>
	<p>Welcome to the Nexu Backend Coding Exercise! This README provides information about the available routes and parameters for this API.</p>

	<h2>Available Routes</h2>
	<ul>
		<li><strong>GET /brands</strong></li>
		<li><strong>GET /brands/:id/models</strong></li>
		<li><strong>POST /brands</strong></li>
		<li><strong>POST /brands/:id/models</strong></li>
		<li><strong>PUT /models/:id</strong></li>
		<li><strong>GET /models</strong></li>
	</ul>

	<h2>Parameters for POST /brands/:id/models Route</h2>
	<ul>
		<li><strong>model_name</strong> (required)</li>
		<li><strong>average_price</strong> (optional)</li>
	</ul>

	<h2>Parameters for PUT /models/:id Route</h2>
	<ul>
		<li><strong>average_price</strong> (required)</li>
	</ul>

	<h2>Parameters for GET /models Route</h2>
	<ul>
		<li><strong>greater</strong> (optional)</li>
		<li><strong>lower</strong> (optional)</li>
	</ul>

	<h2>Examples of endpoints</h2>
	<p>Certainly! Here are some examples of how you can use the endpoints described in the Nexu Backend Coding Exercise:</p>

	<h3>Example 1: Retrieve a List of Brands</h3>
	<p><strong>GET /brands</strong></p>
	<p>This endpoint retrieves a list of all brands with their models average_price</p>
	<code>GET <?php echo base_url(); ?>API/brands</code>

	<h3>Example 2: Retrieve Models for a Specific Brand</h3>
	<p><strong>GET /brands/:id/models</strong></p>
	<p>This endpoint retrieves models for a specific brand by providing the <code>:id</code> of the brand.</p>
	<code>GET <?php echo base_url(); ?>API/brands/1/models</code>

	<h3>Example 3: Create a New Brand</h3>
	<p><strong>POST /brands</strong></p>
	<p>This endpoint allows you to create a new brand. You need to include the brand name in the request body. (use POST or form-data)</p>
	<code>POST <?php echo base_url(); ?>API/brands</code>
	<code>"brand_name": "Toyota"</code>

	<h3>Example 4: Create a New Model for a Brand</h3>
	<p><strong>POST /brands/:id/models</strong></p>
	<p>This endpoint allows you to create a new model for a specific brand. You need to provide the brand ID in the URL and include the model name and optional average price in the request body. (use POST or form-data)</p>
	<code>POST <?php echo base_url(); ?>API/brands/1/models</code>
	<code>"model_name": "Camry",
	"average_price": 280000</code>

	<h3>Example 5: Update Model Information</h3>
	<p><strong>PUT /models/:id</strong></p>
	<p>This endpoint allows you to update the information for a specific model by providing the model ID. You need to include the updated average price in the request body. (use GET format ?average_price=125000)</p>
	<code>PUT <?php echo base_url(); ?>API/models/1?average_price=125000</code>

	<h3>Example 6: Retrieve Models with Price Range</h3>
	<p><strong>GET /models</strong></p>
	<p>This endpoint retrieves models within a specified price range. You can include the optional parameters <code>greater</code> and <code>lower</code> in the query string to filter models.</p>
	<code>GET <?php echo base_url(); ?>API/models?greater=250000&lower=350000</code>

	<p>Feel free to use these routes and parameters to interact with the API and perform various operations related to brands and models.</p>

	<p>This project was deployed in <a href="<?php echo base_url(); ?>API">nexu.exti.mx/API</a></p>

	<p>You can test it using the next endpoints collection in postman <a href="https://api.postman.com/collections/4979939-01a63d21-d349-430a-91a5-686db75d9962?access_key=PMAT-01HBSY3MTNPVBNHPCSGJ6Z60NP">here</a></p>
</body>

</html>