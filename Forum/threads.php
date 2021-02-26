<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Threads</title>
    <link rel="stylesheet" href="./assests/styles/threads.css">
</head>

<body>

    <?php
    include "./assests/dbcon.php";
    $cat_id = $_GET['catid'];

    $sql = "select * from category where category_id = $cat_id";
    $result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $cat_name = $row['category_name'];
        $cat_desc = $row['category_desc'];
    }

    // submitting form data to DB if logged in uisng the from at bottom.
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(isset($_SESSION['username']))
        {
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
            $thread_user_id = $_POST['sno'];

            $sql3 = "insert into threads (thread_title, thread_desc,thread_cat_id, thread_user_id) values ('$th_title', '$th_desc',$cat_id, $thread_user_id)";
            $result3 = mysqli_query($con, $sql3);
        }else{
            echo '
                <script>
                    alert("Please Login To Proceed")
                </script>
            ';
        }      
    }


    include "assests/nav.php";
    // jumbotron
    echo'
    <div class="thread-head">
        <div class="thread-jumbotron">
            <h1>Welcome To '.$cat_name.' Q & A</h1>
            <p>'.$cat_desc.'</p>
            <hr>
            <p>This Forum is very strict</p>
            <p>Please read our terms & condition before proceeding</p>
            <div class="thread-notice-container">
                <p>1].No Spam / Advertising / Self-promote in the forums.</p>
                <p>2].Do not post copyright-infringing material.</p>
                <p>3].Do not post “offensive” posts, links or images.</p>
                <p>4].Remain respectful of other members at all times.</p>

            </div>
            <a href="#" class="show-notice">Learn More</a>
        </div>
    </div>';
    // <!-- main body -->
    $sql2 = "select * from threads where thread_cat_id = $cat_id";
    $result2 = mysqli_query($con, $sql2);

    // displaying thread continer.
    $question_id = 0;
    $noResult = true;
    while($row2 = mysqli_fetch_assoc($result2))
    {
        $noResult = false;
        $question_id+=1;
        $thread_id = $row2['thread_id'];
        if(isset($_SESSION['username']))
        {
            // name of user posted the Q
            $thread_user_id = $row2['thread_user_id'];
            $sql4 = "select uname from signup where sno = $thread_user_id";
            $result4 = mysqli_query($con, $sql4);
            $row4 = mysqli_fetch_assoc($result4);
            $name = $row4['uname'];

            echo'
            <div class="thread-container">
                <div class="thread-item">
        
                    <div class="user-info">
                        <i class=\'fas fa-user\'></i>
                        <h5 class="name">'.$name.'</h5>
                    </div>
        
                    <div class="question" id="question'.$question_id.'">
                        <div class="link-div">
                            <a href="#question'.$question_id.'">
                                <p>'.$row2['thread_title'].'</p>
                                <i class="fas fa-plus btn"></i>
                                <i class="fas fa-minus btn"></i>
                            </a>
                        </div>

                        <div class="answer">
                            <p>'.$row2['thread_desc'].'</p>
                            <a href="thread.php?thread_id='.$cat_id.'&name='.$name.'"><button>Visit Answer</button></a>
                        </div>
                    </div>
            
                </div>
            </div>';
        }
        else{
            echo'
            <div class="thread-container">
                <div class="thread-item">
        
                    <div class="user-info">
                        <i class=\'fas fa-user\'></i>
                        <h5 class="name">Anonmyous User</h5>
                    </div>
        
                    <div class="question" id="question'.$question_id.'">
                        <div class="link-div">
                            <a href="#question'.$question_id.'">
                                <p>'.$row2['thread_title'].'</p>
                                <i class="fas fa-plus btn"></i>
                                <i class="fas fa-minus btn"></i>
                            </a>
                        </div>

                        <div class="answer">
                            <p>'.$row2['thread_desc'].'</p>
                            <a href="thread.php?thread_id='.$cat_id.'"><button>Visit Answer</button></a>
                        </div>
                    </div>
            
                </div>
            </div>';
        }
    }

    $method = $_SERVER["REQUEST_URI"];
    // FORM
    //same as PHP_SELF but also keeps url same.
    echo '
        <form action="'.$method.'" method="POST" class="question-form" autocomplete="off">
            <div class="head">
                <h1>Query Here</h1>
                <h5>Let the people answer it</h5>
            </div>

            <div>
                <label for="title">Title</label>
                <input type="text"  id="title" name="title" placeholder="Describe problem in short">
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>
        
            <div>
                <label for="desc">Description</label>
                <textarea type="text" id="desc" name= "desc" placeholder="Elaborate your concern"></textarea>
            </div>
    
            <button type="submit">Submit</button>
    </form>    
    ';

    if($noResult){
        echo "
            <div class='no-que-found'>
                <h1>No Questions Found For this Forum</h1>
                <h5>Be The First to ask a question</h5>
            </div>
        ";
    }
?>

</body>

<!-- JAVASCRIPT -->
<script>
// jumbotron
const NoticeBtn = document.querySelector(".show-notice");
const noticeContainer = document.querySelector(".thread-notice-container");
NoticeBtn.addEventListener("click", () => {
    noticeContainer.classList.toggle("show-notice-container");
    if (noticeContainer.classList.contains("show-notice-container")) {
        NoticeBtn.innerHTML = "Learn Less";
    } else {
        NoticeBtn.innerHTML = "Learn More";
    }
});
</script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

</html>