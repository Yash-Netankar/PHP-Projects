<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
    <link rel="stylesheet" href="./assests/styles/threads.css">
    <link rel="stylesheet" href="./assests/styles/thread.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' defer></script>
</head>

<body>


<?php
    include "./assests/dbcon.php";
    $thread_id = $_GET['thread_id'];
    $poster_name = $_GET['name'];

    $sql = "select * from threads where thread_id = $thread_id";
    $result = mysqli_query($con, $sql);
    if(!$result){
        echo "Can't execute query bcoz of".mysqli_error($con);
        exit();
    }

    
    include "assests/nav.php";
    while($row = mysqli_fetch_assoc($result))
    {
        $thread_title = $row['thread_title'];
        $thread_desc = $row['thread_desc'];
    }

    // jumbotron
    if(isset($_SESSION['username']))
    {
        echo'
        <div class="thread-head">
            <div class="thread-jumbotron">
                <h1>'.$thread_title.' </h1>
                <p>'.$thread_desc.'</p>
                <hr>
                <h5>Posted By '.$poster_name.'</h5>
            </div>
        </div>';
    }
    else{
        echo'
        <div class="thread-head">
            <div class="thread-jumbotron">
                <h1>'.$thread_title.' </h1>
                <p>'.$thread_desc.'</p>
                <hr>
                <h5>Posted By Anonmyous User</h5>
            </div>
        </div>';
    }


    // submitting answers to DB if logged in using form at bottom
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(isset($_SESSION['username']))
        {
            $comment = $_POST['comment'];
            $comment_by = $_POST['sno'];

            $sql3 = "insert into comments (comment_text, thread_id, comment_by) values ('$comment', $thread_id, $comment_by)";
            $result3 = mysqli_query($con, $sql3);
        }
        else{
            echo '
                <script>
                    alert("Please Login To Proceed")
                </script>
            ';
        }
    }

    // displaying comments
    $sql2 = "select * from comments where thread_id = $thread_id";
    $result2 = mysqli_query($con, $sql2);
    if(!$result2){
        echo "Can't execute query bcoz of".mysqli_error($con);
        exit();
    }
    $noResult = true;
    while($row2 = mysqli_fetch_assoc($result2))
    {
        $noResult = false;
        if(isset($_SESSION['username']))
        {
            $thread_user_id = $row2['comment_by'];
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
        
                    <div class="question">
                        <p>'.$row2['comment_text'].'</p>
                        <hr>
                        <p class="date">'.$row2['comment_time'].'</p>
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
                        <h5 class="name">Anonymous User</h5>
                    </div>
        
                    <div class="question">
                        <p>'.$row2['comment_text'].'</p>
                        <hr>
                        <p class="date">'.$row2['comment_time'].'</p>
                    </div>
            
                </div>
            </div>';
        }
    }
    
?>


    <!-- form to post a comment -->
    <form action="<?php $_SERVER["REQUEST_URI"]?>" method="POST" class="comment-form" autocomplete="off">
        <h1>Post Your Answer</h1>
        <textarea name="comment" placeholder="Start Typing Your Answer"></textarea>
        <input type="hidden" name="sno" value="<?php echo $_SESSION['sno']?>">
        <button type="submit">Post Comment</button>
    </form>
</body>

</html>