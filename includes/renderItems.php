<?php
     $mappedItem = array_map(function($data){
        include "../includes/connect.php";

        $src = "data:image/jpg;charset=utf8;base64";
        $imageContent = base64_encode($data['image']);
        $user_id = $_SESSION['id'];
        $likes = "";
        $is_liked = "";
        $item_id = $data['item_id'];

        $sql1 = "SELECT * FROM likes WHERE item_id= {$item_id};";
        $result1 = mysqli_query($conn, $sql1);
        $check_result1 = mysqli_num_rows($result1);

        if($check_result1 > 0){
            $likes = $check_result1;
        }

        $sql2 = "SELECT * FROM likes WHERE item_id= {$item_id} AND user_id= $user_id;";
        $result2 = mysqli_query($conn, $sql2);
        $check_result2 = mysqli_num_rows($result2);

        if($check_result2 > 0){
            $is_liked = "user-liked";
        }

        $sql3 = "SELECT * FROM comments WHERE item_id= {$item_id};";
        $result3 = mysqli_query($conn, $sql3);
        $check_result3 = mysqli_num_rows($result3);
        $comments_count = "";

        if($check_result3 > 0){
            $comments_count = $check_result3;
        }

        return "
                <div class='product' onclick='productHandler({$item_id})'>
                    <img src='{$src},{$imageContent}' />
                    <p>{$data['name']}</p>
                    <p>₱ {$data['price']}</p>
                    <div class='btn-container'>
                        <button 
                            class='add-btn' 
                            onclick='addTocart()'
                            data-url='../includes/addItem.php'
                            data-id='{$item_id}'
                        >
                                add to cart
                        </button>
                        <div>
                            <div 
                                id='reviews' 
                                class='{$is_liked}' 
                                onclick='likeItem({$item_id})'
                            >
                                <i id='reviews' class='fa-solid fa-heart'></i>
                                <span id='{$item_id}' class='likes-count'>
                                    {$likes}
                                </span>
                            </div>
                            <a href='../pages/product_comments.php?id={$item_id}'>
                                <i class='fa-solid fa-message'></i>
                                {$comments_count}
                            </a>
                        </div>
                    </div>
                </div>
            ";
    }, $datas);

    echo join("", $mappedItem);
?>