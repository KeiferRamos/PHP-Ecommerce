<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE id = $user_id;";
    $result = mysqli_query($conn, $sql);
    $check_result = mysqli_num_rows($result);

    if($check_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            $image = "";
            $imageEncoder = "data:image/jpeg;charset:utf8;base64";
            $encodedImage = base64_encode($row['profile_pic']);

            if($row['profile_pic']){
                $image = "{$imageEncoder},{$encodedImage}";
            }else{
                $image = "https://avatars.dicebear.com/api/initials/{$row['username']}.svg";
            }

            echo "
                <div class='image'>
                    <img src='{$image}' alt='user profile'/>
                    <br/>
                    <input type='file' />
                    <button>Upload image</button>
                </div> 
                <div class='user-info'>
                    <div>
                        <p>username</p>
                        <div class='update-input'>
                            <input readonly type='text' id='username' value='{$row['username']}'>
                            <i onclick='updateInfo()' data-id='username' class='fa-solid fa-pen-to-square'></i>
                        </div>
                    </div>
                    <div>   
                        <p>password</p>
                        <div class='update-input'>
                            <input readonly type='password' id='password' value='**********'> 
                            <i onclick='updateInfo()' data-id='password' class='fa-solid fa-pen-to-square'></i>
                        </div>
                        <div class='password-checkbox'>
                            <input type='checkbox' id='checkbox' id='password'>
                            <span>show password</span>
                        </div>
                    </div>
                    <div class='update-input'>
                        <p>confirm</p>
                        <input type='password' id='confirm' value='**********'>
                    </div>
                    <p class='warning-text'></p>
                </div> ";
        }
    }
?>