# Nexu Backend Coding Exercise

Welcome to the Nexu Backend Coding Exercise! This README provides information about the available routes and parameters for this API.

## Available Routes

-   **GET /brands**
    
-   **GET /brands/:id/models**
    
-   **POST /brands**
    
-   **POST /brands/:id/models**
    
-   **PUT /models/:id**
    
-   **GET /models**
    

## Parameters for POST /brands/:id/models Route

-   **model_name** (required)
-   **average_price** (optional)

## Parameters for PUT /models/:id Route

-   **average_price** (required)

## Parameters for GET /models Route

-   **greater** (optional)
-   **lower** (optional)

## Examples of endpoints
Certainly! Here are some examples of how you can use the endpoints described in the Nexu Backend Coding Exercise:

### Example 1: Retrieve a List of Brands

**GET /brands**

This endpoint retrieves a list of all brands with their models average_price

    GET https//nexu.exti.mx/API/brands

### Example 2: Retrieve Models for a Specific Brand

**GET /brands/:id/models**

This endpoint retrieves models for a specific brand by providing the `:id` of the brand.

    GET https//nexu.exti.mx/API/brands/1/models

### Example 3: Create a New Brand

**POST /brands**

This endpoint allows you to create a new brand. You need to include the brand name in the request body. (use POST or form-data)

    POST https//nexu.exti.mx/API/brands

"brand_name": "Toyota"

### Example 4: Create a New Model for a Brand

**POST /brands/:id/models**

This endpoint allows you to create a new model for a specific brand. You need to provide the brand ID in the URL and include the model name and optional average price in the request body. (use POST or form-data)

    POST https//nexu.exti.mx/API/brands/1/models

"model_name": "Camry",
"average_price": 280000


### Example 5: Update Model Information

**PUT /models/:id**

This endpoint allows you to update the information for a specific model by providing the model ID. You need to include the updated average price in the request body. (use GET format ?average_price=125000)

    PUT https//nexu.exti.mx/API/models/1?average_price=125000

### Example 6: Retrieve Models with Price Range

**GET /models**

This endpoint retrieves models within a specified price range. You can include the optional parameters `greater` and `lower` in the query string to filter models.

    GET https//nexu.exti.mx/API/models?greater=250000&lower=350000

Feel free to use these routes and parameters to interact with the API and perform various operations related to brands and models.

This project was deployed in nexu.exti.mx

You can test it using the next endpoints collection in postman
https://api.postman.com/collections/4979939-01a63d21-d349-430a-91a5-686db75d9962?access_key=PMAT-01HBSY3MTNPVBNHPCSGJ6Z60NP
