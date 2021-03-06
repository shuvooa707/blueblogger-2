

function shootcomment() {
    // setting data variables
    var comment_content = N("#newcomment").value;
    if ( comment_content.length < 1 ) {
        console.log("Write Something First");
        return;
    }
    var commentor_post_author_username = N("#userpane-userdetail").getAttribute("data-username");
    var commentor_fullname = N("#rightNav > a").getAttribute("data-username");
    var comment_post_id = parseInt(document.querySelector("#content").getAttribute("data-post-id"));
    const ajaxReq = new XMLHttpRequest();
    ajaxReq.open("POST","comments.php",false);
    ajaxReq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    ajaxReq.send(`operation=registernewcomment&comment_content='${comment_content}'&commentor_post_author_username='${commentor_post_author_username}'&comment_post_id=${comment_post_id}&commentor_fullname='${commentor_fullname}'`);

    if ( ajaxReq.responseText.split(":") != "failed" ) {        
        var newcomment = `<div class="comment newcommentanimation" data-show-more="${ comment_content.length > 310 ? 'yes': 'no' }" >
                                <div class="commentor">
                                    <img src=img/profilepic/${ajaxReq.responseText.split(":")[1]} alt="" width="80px" height="80px" class="commentorAvatar">  <!-- Commentor Avatar -->
                                    <label for="commentorAvatar">${ajaxReq.responseText.split(":")[0]}</label>
                                </div>                       
                                <div class="commentcontent"> 
                                    <div style="height: 114%;width: 100%;overflow:hidden;line-height: 15px;" class="comment-text"> 
                                    ${comment_content}                    
                                    </div>
                                </div>
                            </div>`;
        N("#comments").innerHTML = newcomment + N("#comments").innerHTML;
        N("#newcomment").value = "";
        // setTimeout(() => {
        //     N(".comment").classList.remove("newcommentanimation");
        // }, 3001);
    } else {
        //alert(ajaxReq.responseText);
    }
    addShowMore();
}

function N(identifier) {
    return document.querySelector(identifier);
}




function postpage_sidelogin(node) {

    var username = node.querySelector("#userpane-username").value;
    var password = node.querySelector("#userpane-password").value;

    var ajaxReqquest = new XMLHttpRequest();
    ajaxReqquest.open("POST","login.php",false);    
    ajaxReqquest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajaxReqquest.send(`operation=homepagesidebarlogin&username=${username}&password=${password}`);    
    if( ajaxReqquest.responseText && ajaxReqquest.responseText != "login failed" ){
        response = JSON.parse(ajaxReqquest.responseText);
        // removing the login pane on being logged in
        node.remove();
        // changing the left side nav button
        document.querySelector("#navbar > a:first-child").innerText = "Dashboard";
        document.querySelector("#navbar > a:first-child").href = "dashboard.php";
        // adding the commenting option after being logged in
        N("#commentbox").innerHTML = `    
                    <label for="comment"> Shoot a Comment</label>
                    <textarea name="newcomment" id="newcomment" cols="80" rows="6"></textarea>
                    <button onclick="shootcomment()">Shoot</button>` + N("#commentbox").innerHTML;
        // adding the right side profile nav pic
        N("#navbar").innerHTML += ` 
                <div id="rightNav"> 
                    <span id="notification">
                    <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;">
                        <g class="style-scope yt-icon">
                            <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" class="style-scope yt-icon">
                            </path>
                        </g>
                    </svg>
                    </span>
                    <a href="profile.php">
                        <span style="background-image:url(img/profilepic/${response.user_profile_picture_link})"   id="profile" title="Click to go to Profile Page">                        
                        </span>
                    </a>
                </div>`;



    } else {
        node.classList.add("shake");
        node.querySelector("#userpane-username").value = "";
        node.querySelector("#userpane-password").value = "";
        setTimeout(()=>{            
            node.classList.remove("shake");
        },1000);
    }
}

function addShowMore() {
    let comments = document.querySelectorAll(".comment");
    comments.forEach( (comment)=>{
        var flag = comment.getAttributeNode("data-show-more").value;
        console.log(flag);
        var commentcontent = comment.querySelector(".commentcontent");
        if ( flag == "yes" &&  !commentcontent.innerHTML.includes("show-more") ) {
            comment.querySelector(".commentcontent").innerHTML += `<span class="show-more" onclick="showMore(this)">Show More ↓↓↓ </span>`;
        }
    });
} addShowMore();


function showMore(node) {
    if( node.parentElement.style.height == "100px" || node.parentElement.style.height == "" ){
        node.parentElement.style.height = "auto";
        node.innerText = "Show More ↓↓↓ ";
    } else {        
        node.parentElement.style.height = "100px";
        node.innerText = "Show Less ↑↑↑ ";
    }
}

function highLightComment(){
    var givenCommentId = parseInt(window.location.search.split("commentid=")[1]);
    if( !givenCommentId ) return;
    let comments = [...document.querySelectorAll(".comment")];
    comments.forEach( comment => {
        var comment_id = comment.getAttributeNode("data-commentid") ? comment.getAttributeNode("data-commentid").value : "";            
        if( givenCommentId == comment_id ){
            var toScroll = parseInt(N("#container").offsetTop + N("#commentbox").offsetTop + comment.offsetTop ) - window.pageYOffset - 100;
            console.log(toScroll);
            window.scrollBy(0,toScroll);
            comment.classList.add("commenthighlightAnimation");
        }
    });
}


window.addEventListener("load",()=>{
    setTimeout( ()=>{highLightComment()},300);
});