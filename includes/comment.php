<?php
    include "../includes/connect.php";

    session_start();

    $username = $_SESSION['username'];
    $comment = $_REQUEST['comment'];
    $item_id = $_REQUEST['id'];

    $sql1 = "INSERT INTO comments(username, user_comment, item_id)
            VALUES('$username','$comment','$item_id');";

    mysqli_query($conn, $sql1);

    $sql2 = "SELECT * FROM comments WHERE item_id = $item_id;";
    $result = mysqli_query($conn, $sql2);
    $check_result = mysqli_num_rows($result);
    $datas = [];

    if($check_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($datas, $row);
        }
    }   

    $mappedDatas = array_map(function($data){
        $imgSrc = "https://avatars.dicebear.com/api/initials/{$data['username']}.svg";
        return "
            <div>
                <img src={$imgSrc} alt='user-profile' />
                <div class='user-comment'>
                    <h3>{$data['username']}</h3>
                    <p>{$data['user_comment']}</p>
                    <i class='fa-solid fa-trash'></i>
                    <i class='fa-solid fa-pen'></i>
                </div>   
            </div>
        ";
    },$datas);

    echo join("", $mappedDatas);
?>