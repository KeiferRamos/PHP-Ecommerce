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

    session_start();

    $mappedItem = array_map(function($data){
        include "../includes/connect.php";

        $src = "data:image/jpg;charset=utf8;base64";
        $imageContent = base64_encode($data['image']);
        $user_id = $_SESSION['id'];
        $likes = "";
        $is_liked = "";

        $sql1 = "SELECT * FROM likes WHERE item_id= {$data['id']};";
        $result1 = mysqli_query($conn, $sql1);
        $check_result1 = mysqli_num_rows($result1);

        if($check_result1 > 0){
            $likes = $check_result1;
        }

        $sql2 = "SELECT * FROM likes WHERE item_id= {$data['id']} AND user_id= $user_id;";
        $result2 = mysqli_query($conn, $sql2);
        $check_result2 = mysqli_num_rows($result2);

        if($check_result2 > 0){
            $is_liked = "user-liked";
        }

        return "
                <div class='product' onclick='productHandler({$data['id']})'>
                    <img src='{$src},{$imageContent}' />
                    <p>{$data['name']}</p>
                    <p>₱ {$data['price']}</p>
                    <div class='btn-container'>
                        <button 
                            class='add-btn' 
                            onclick='addTocart()'
                            data-url='../includes/addItem.php'
                            data-id='{$data['id']}'>
                                add to cart
                        </button>
                        <div>
                            <div 
                                id='reviews' 
                                class='{$is_liked}' 
                                onclick='likeItem({$data['id']})'
                                >
                                <i id='reviews' class='fa-solid fa-heart'></i>
                                <span id='{$data['id']}' class='likes-count'>{$likes}</span>
                            </div>
                            <div id='reviews'>
                                <i id='reviews' class='fa-solid fa-message'></i>
                            </div>
                        </div>
                    </div>
                </div>
            ";
    },$datas);

    echo join("", $mappedItem);
?>