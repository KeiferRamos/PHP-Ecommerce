<?php
    include "../includes/connect.php";

    $item_id = $_REQUEST['itemID'];
    $limit = $_REQUEST['limit'];
    
    $sql1 = "SELECT * FROM comments WHERE item_id = $item_id ORDER BY comment_id DESC LIMIT $limit;";
    $result = mysqli_query($conn, $sql1);
    $check_result = mysqli_num_rows($result);
    $datas = [];

    if($check_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($datas, $row);
        }
    }else{
        echo "<div class='empty'>
                <img src='https://cdni.iconscout.com/illustration/premium/thumb/friends-discussing-product-comments-2706064-2259748.png' />
                <p>Be the first one to comment!</p>
            </div>";
        return;
    }   

    if(!isset($_SESSION)){
        session_start();
    }

    $mappedDatas = array_map(function($data){
        $imgSrc = "https://avatars.dicebear.com/api/initials/{$data['username']}.svg";
        $displayIcons = "none;";

        if($_SESSION['username'] == $data['username']){
           $displayIcons  = "block;";
        }

        return "
            <div class='comments-container'>
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
                        <i 
                            onclick='updateComment()' 
                            class='fa-solid fa-pen'
                            data-comment='{$data['user_comment']}'
                            data-cid = {$data['comment_id']}
                        >
                        </i>
                    </div>
                    <span>{$data['time']}</span>
                </div>   
            </div>
        ";
    },$datas);

    $sql3 = "SELECT * FROM comments WHERE item_id = $item_id;";
    $result3 = mysqli_query($conn, $sql3);

    if($check_result < mysqli_num_rows($result3)){
        echo "<button id='viewmore' onclick='viewMore()'>view more comments</button>";
    }

    echo join("", $mappedDatas);
?>