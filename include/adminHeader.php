<div class = "header" id = "myHeader">
            <a href="Home.html"> <img src="img/konnect-media.png"></a>
            <ul id="header-menu">
                <li><i class='far fa-user'></i><a href="show_signup.php">Users</a></li>
                <li><i class='far fa-images'></i><a href="adminPosts.php">Posts</a></li>
				        <li><i class="fa fa-sitemap"></i><a href="Home.php">Live Site</a></li>
       
 <?php
		if(isset($_SESSION['logged_in']) ){
			echo "<li><a href = 'logout.php'><i class='fas fa-sign-in-alt' ></i>Log Out</a></li>";
		}
	  ?> 
    	</ul>  
</div>
