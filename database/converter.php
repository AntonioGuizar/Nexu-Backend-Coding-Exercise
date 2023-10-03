<?php

//read the json from this directory with the name data.json
$json = file_get_contents('data.json');

//convert json object to php associative array
$data = json_decode($json, true);

//get all the differents brands names from the structure of the json ({"id": 12, "name": "A6", "average_price": 499782, "brand_name": "Audi"})
$brands = array_unique(array_column($data, 'brand_name'));

//order the array alphabetically
sort($brands);

//create insert queries for each brand
foreach ($brands as $brand) {
    $query = "INSERT INTO brands (brand_name) VALUES ('$brand');";
    echo $query . "<br>";
}

//create insert queries for the model from the structure of the json ({"id": 12, "name": "A6", "average_price": 499782, "brand_name": "Audi"})
foreach ($data as $car) {
    $query = "INSERT INTO models (id, name, average_price, brand_id) VALUES (" . $car['id'] . ", '" . $car['name'] . "', " . $car['average_price'] . ", (SELECT id FROM brands WHERE brand_name = '" . $car['brand_name'] . "'));";
    echo $query . "<br>";
}

?>