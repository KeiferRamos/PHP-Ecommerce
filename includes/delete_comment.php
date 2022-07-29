<?php
    include "../includes/connect.php";

    $comment_id = $_REQUEST['id'];
    $itemId = $_REQUEST['item_id'];

    $sql1 = "DELETE FROM comments WHERE comment_id = $comment_id;";
    mysqli_query($conn, $sql1);

    $sql2 = "SELECT * FROM comments WHERE item_id= {$itemId};";
    $result = mysqli_query($conn, $sql2);
    $check_result = mysqli_num_rows($result);
    $datas = [];

    if($check_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($datas, $row);
        }
    }
    
    session_start();

    $mappedItem = array_map(function($data){
        $imgSrc = "https://avatars.dicebear.com/api/initials/{$data['username']}.svg";
        $displayIcons = "none;";

        if($_SESSION['username'] == $data['username']){
           $displayIcons  = "block;";
        }
    
        return "
            <div>
                <img src={$imgSrc} alt='user-profile' />
                <div class='user-comment'>
                    <h3>{$data['username']}</h3>
                    <p>{$data['user_comment']}</p>
                    <div style='display: {$displayIcons}'>
                         <i 
                        onclick='deleteComment({$data['comment_id']})'  
                        class='fa-solid fa-trash'
                        >
                        </i>
                        <i class='fa-solid fa-pen'></i>
                    </div>
                </div>   
            </div>
        ";
    },$datas);

    echo join("", $mappedItem);
?>