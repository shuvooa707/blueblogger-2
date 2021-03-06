<?php
    if( session_status() == 1)
        session_start();

    // code for registering a new comment
    if ( isset($_POST["operation"]) && $_POST["operation"]=="registernewcomment" && isset($_POST["comment_content"]) ) {        
        include("connect_to_db.php"); // including db connect file
        
        // setting the variable for inserting into db
        $comment_post_id = $_POST["comment_post_id"];
        $comment_commentor_username = $_SESSION["username"];
        $comment_commentor_fullname = $conn->query("SELECT `user_fullname` FROM `users` Where `user_username`="."'$comment_commentor_username'")->fetch_assoc()["user_fullname"];
        $comment_post_author_username = $_POST["commentor_post_author_username"];
        $comment_content = $_POST["comment_content"];
        $comment_birthdate = date("d-m-y h:m:s");
        $comment_order = (int)($conn->query("SELECT MAX(comment_id) AS comment_id from `comments` WHERE `comment_post_id`='$comment_post_id'")->fetch_assoc()["comment_id"]) + 1;
        $comment_date = date("d-m-y h:m:s");
        $sql = "INSERT INTO `comments`( `comment_post_id`, `comment_commentor_username`, `comment_commentor_fullname`, `comment_post_author_username`, `comment_content`, `comment_birthdate`, `comment_order`) VALUES ($comment_post_id, '$comment_commentor_username', '$comment_commentor_fullname', $comment_post_author_username, $comment_content, '$comment_birthdate', $comment_order)";

        // executing sql command to insert a new comment into db
        $r = $conn->query( $sql );
        
        // if execution done successfully then increment the post_comment_count variable in posts table
        if( $r ){
            $post_comment_count =  (int)$conn->query( "SELECT `post_comment_count` FROM `posts` WHERE `post_id`='$comment_post_id'" )->fetch_assoc()["post_comment_count"] + 1;
            $result = $conn->query("UPDATE `posts` SET `post_comment_count`='$post_comment_count' WHERE `post_id`='$comment_post_id'");
            if( $result ){
                echo $comment_commentor_fullname.":".$conn->query("SELECT `user_profile_picture_link` FROM `users` Where `user_username`="."'$comment_commentor_username'")->fetch_assoc()["user_profile_picture_link"];
            }
        } else {
            echo $sql;
        }
        exit(0);
    }


    // code for deleting all the comments when any post is deleted
    if( isset($_POST["operation"]) && $_POST["operation"]=="registernewcomment" &&  isset($_POST["comment_post_id"]) ){
        
    }

?>