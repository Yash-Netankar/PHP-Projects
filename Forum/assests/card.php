<?php
    include "dbcon.php";
    $sql = "select * from category";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $catid = $row['category_id'];
        $cat = $row['category_name'];
        $desc = $row['category_desc'];
        echo'
        <div class="cardContainer">

            <div class="card">
                <figure class="card-front">
                    <div class="imgDiv">
                        <img src="https://source.unsplash.com/1000x450/?programming,'. $cat.' " alt="' . $cat . '" />
                    </div>
                    <h1>' . $cat . '</h1>
                    <p>' . substr($desc, 0, 50) .'...</p>
                </figure>

                <figure class="card-back">
                    <h2>Go For It!!</h2>
                    <p>Valid only till 10hrs</p>
                    <a href="./threads.php?catid='.$catid.'">View Threads</a>
                </figure>
            </div>

    </div>';
    }
?>