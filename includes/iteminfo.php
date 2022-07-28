<?php
    include "../includes/connect.php";

    if(isset($_GET['id'])){

        $sql = "SELECT * FROM products WHERE id = {$_GET['id']};";
        $result = mysqli_query($conn, $sql);
        $check_result = mysqli_num_rows($result);

        if($check_result > 0){
            while($row = mysqli_fetch_assoc($result)){
                $src = "data:image/jpeg;charset:utf8;base64";
                $imagecontent = base64_encode($row['image']);

                echo  "
                    <div class='product-info'>
                        <img src='{$src},{$imagecontent}' alt=''>
                        <article>
                            <header>
                                <h1>What is {$row['name']}</h1>
                                <button 
                                    class='add-btn' 
                                    onclick='addTocart()'
                                    data-url='../includes/addItem.php'
                                    data-id='{$row['id']}'>
                                        add to cart
                                </button>
                            </header>
                            <br/>
                            {$row['info']}
                        </article>
                    </div>
                    <br/>
                    <div class='nutrients'>
                        <h1>Nutrients in {$row['name']}</h1>
                        <br/>
                        {$row['nutrients']}
                    </div>
                    <br/>
                    <div class='benifits'>
                        <h1>Potential benefits of {$row['name']}</h1>
                        <br/>
                        {$row['benifits']}
                    </div>";
            }
        }
       
    }
?>
