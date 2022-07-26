<?php
    include "../includes/connect.php";

    $categories = $_REQUEST['c'];
    $sort_by = $_REQUEST['s'];
    $price_range = $_REQUEST['p'];

    $sort_by_cmd;
    if($sort_by == "default"){
        $sort_by_cmd = "";
    }else{
        if($sort_by == "a-z"){
            $sort_by_cmd = " ORDER BY name ASC";
        }else{
            $sort_by_cmd = " ORDER BY price ".($sort_by == 'h-l' ? 'DESC' : 'ASC');
        }
    }

    $prices = explode("-",  $price_range);

    $price_range_cmd = $price_range !== "All" ? "price BETWEEN {$prices[0]} AND {$prices[1]}" : "";

    $cmd = "SELECT * FROM products";

    if($categories != "All" || $price_range != "All"){

       if($categories !== "All"){
            $cmd .= " WHERE category = '{$categories}'";
       }else{
            $cmd .= " WHERE {$price_range_cmd}";
       }

       if($price_range !== "All" && $categories !== "All"){
            $cmd .= " AND {$price_range_cmd}";
       }
    }
    if(!empty($sort_by_cmd)){
        $cmd .= "{$sort_by_cmd};";
    }else{
        $cmd .= ";";
    }

    $result = mysqli_query($conn, $cmd);
    $check_result = mysqli_num_rows($result);

    $datas = array();

    if($check_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($datas, $row);
        }
    }

    $mappedItem = array_map(function($data){
        $src = "data:image/jpeg;charset=utf8;base64";
        $imageContent = base64_encode($data['image']);

        return "
                <div class='product'>
                    <img src='{$src},{$imageContent}' />
                    <p>{$data['name']}</p>
                    <p>₱ {$data['price']}</p>
                    <button class='product-btn'>add to cart</button>
                </div>";
    },$datas);

    echo join("", $mappedItem);
?>