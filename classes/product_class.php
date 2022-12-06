<?php

include_once(dirname(__FILE__)).'../../settings/connection.php';

//inheriting the methods from connection

class Product extends Connection {

//brand methods
    
//add brand
    function add_brand($brandname){
        //returns true or false
        return $this->query("insert into brands(brand_name) values('$brandname')");
    }

    function update_one_brand($brand_id, $brandname){
		// return true or false
		return $this->query("update brands set brand_name='$brandname' where brand_id = '$brand_id'");
	}

    //delete one brand
    function delete_one_brand($brand_id){
        //returns true or false
        return $this->query("delete from brands where brand_id = '$brand_id'");
    }

    function select_one_brand($brand_id){
		// return associative array or false
		return $this->fetchOne("select * from brands where brand_id='$brand_id'");
	}

    function select_one_brandname($brandname){
        //returns true or false
        return $this->fetchOne("select brand_name from brands where brand_name = '$brandname'");
    }

    
    function select_all_brands(){
        //returns true or false
        return $this->fetch("select * from brands");
    }


//product category methods

function add_category($category){
    // return true or false
    return $this->query("insert into categories(cat_name) values('$category')");
}

function select_all_categories(){
    //returns true or false
    return $this->fetch("select * from categories");
}

function select_one_category($cat_id){
    //returns true or false
    return $this->fetchOne("select * from categories where cat_id = '$cat_id'");
}

function update_one_category($cat_id, $category){
    // return true or false
    return $this->query("update categories set cat_name='$category' where cat_id = '$cat_id'");

}

function delete_one_category($cat_id){
    //returns true or false
    return $this->query("delete from categories where cat_id = '$cat_id'");
}


function select_one_categoryname($category){
    //returns true or false
    return $this->fetchOne("select cat_name from categories where cat_name = '$category'");
}


// products methods

// add product method
    function add_product($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords, $product_yards){

		return $this->query("insert into products(product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords, product_yards) values('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc', '$product_image','$product_keywords', '$product_yards')");
	}

// update one product method
    function update_one_product ($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords, $product_yards) {
        // return true or false
        return $this->query("update products set product_cat = '$product_cat', product_brand = '$product_brand', product_title = '$product_title', product_price = '$product_price', product_desc = '$product_desc', product_keywords = '$product_keywords',  product_yards = '$product_yards' where product_id = '$product_id'");

    }
    //update one product image

    function update_one_image($product_image, $product_id){
        return $this->query("update products set product_image = '$product_image' where product_id = '$product_id'");
    }

//delete one product method

    function delete_one_product($product_id){
        //returns true or false
        return $this->query("delete from products where product_id = '$product_id'");
    }

//select all products method
    function select_all_products (){
        return $this->fetch("select * from products inner join brands on product_brand = brand_id inner join categories on product_cat = cat_id");
    }

//select one product and use an inner join to retrieve its brand and category from respective tables

    function select_one_product($product_id){
        return $this->fetchOne("select * from products inner join brands on product_brand = brand_id inner join categories on product_cat = cat_id where product_id = '$product_id'");
    }

//search products

    function search_products($search){

        $sql = "select * from products where product_title LIKE '%$search%' OR product_keywords LIKE '%$search%'";

        return $this->fetch($sql);

    }
//search pagination
function search_pagination($search, $start_from, $num_per_page){

    $sql = "select * from products where product_title LIKE '%$search%' OR product_keywords LIKE '%$search%' limit $start_from,$num_per_page";

    return $this->fetch($sql);

}

// counting the number of items being searched 
function count_search($search){

    $sql = "select * from products where product_title LIKE '%$search%' OR product_keywords LIKE '%$search%'";

    return $this->count($sql);

}

    //selecting top three products
    function random_four_numbers(){
        return $this->fetch("SELECT * FROM products ORDER BY RAND()LIMIT 4");
    }

    //selecting top three products
    function random_three_numbers(){
        return $this->fetch("SELECT * FROM products ORDER BY RAND()LIMIT 3");
    }

    //select three products from different types
    function pick_three(){
        return $this->fetch('select * from products where product_cat=34 limit 3');
    }

    /// the number of products that should show on each page
    function pagation($start_from, $num_per_page){
        return $this->fetch("select * from products limit $start_from,$num_per_page");
    }

    // counting the number fof rows 
    function count_rows(){
        return $this->count("select * from products");
    }

}

?>