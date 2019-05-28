<?php
    // Check if user logged in if yes
    // continue otherwise redirect to login page
    session_start();
    if( !isset($_SESSION["username"]) ){
        header("Location:login.php");
    }
    
?>
<?php include("header.php"); ?>


    <div id="container">
        <nav id="sidenav">
                <a href="createnewpost.php" id="createnewpost" >Create New Post</a>
                <div id="posts" onclick="highlightSelected(this)">Posts</div>
                <div id="comments" onclick="highlightSelected(this)">Comments</div>
                <div id="drafts" onclick="highlightSelected(this)">Drafts</div>
        </nav>

        <div id="all-post-content">
            <div id="allposts">
                <div id="allpostsheader">
                    <span id="postnumberhash" class="allpostsheader-element">#</span>
                    <span id="posttumbpic" class="allpostsheader-element">Thumbnail</span>
                    <span id="posttitle" class="allpostsheader-element">Title</span>
                    <span id="postvisits" class="allpostsheader-element">Visits</span>
                    <span id="postcomments" class="allpostsheader-element">Comments</span>
                    <span id="delete" class="allpostsheader-element tools">DELETE</span>
                    <span id="edit" class="allpostsheader-element tools">EDIT</span>
                    <span id="draft" class="allpostsheader-element tools">DRAFT</span>
                    <span id="unpublish" class="allpostsheader-element tools">UN <strong>/</strong> PUBLISH</span>
                </div>
                <div id="allpostlist">
                    
                </div>
            </div>
        </div>

    </div>

    <script src="js/dashboard.js"></script>
</body>
</html>