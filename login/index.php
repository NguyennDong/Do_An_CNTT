<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();

	//Initialize User class
	$user = new User();

	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'maGV'    => $gpUserProfile['given_name'],
        'tenGV'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);

	//Storing user data into session
	$_SESSION['userData'] = $userData;

	//Render facebook profile data
    if(!empty($userData)){
        /*
        $output = '<h1>Google+ Profile Details </h1>';
        $output .= '<br/>Name : ' . $userData['maGV'].' '.$userData['tenGV'];
        $output .= '<br/>Email : ' . $userData['email'];

        */
        //
        $output = '<br/>Logout from <a href="logout.php">Google</a>';
        header("Location: ../main/index.php");
    }else{
        $output = '<h1 style="color:#abb0ba; margin-top: 250px; font-size: 50px;">Fail to login!</h1><img src="images/error.png" alt="" style="width: 300px;"/>';

        $output .= '<br/><span style="color:#abb0ba; margin-top: 250px; font-size: 50px;">Back to Login page</span><a href="logout.php" style="color:#abb0ba; margin-top: 250px; font-size: 50px;"><i class="fas fa-undo-alt"></i></a>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'" ><img src="images/glogin.png" alt="" style="width: 300px; margin-top: 250px;"/></a>';
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login TDTU</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>

    <body onload="myFunction()">

        <!-- Loader Animation-->
        <div id="loader">
            <img src="css/loader.svg" alt=" Loader Animation">
        </div>
        <!-- End Loader Animation-->

        <!-- Page Content -->
        <div id="content" class="animate-bottom">
            <div id="google-icon"><?php echo $output; ?></div>
        </div>
        <!-- End Page Content -->

        <script type="text/javascript">
            var Start;

            //Show Page Content after 2.5s
            function myFunction(){
            Start = setTimeout(showpage,2500);
            }

            //Hide animation loader and show page content
            function showpage(){
            document.getElementById("loader").style.display="none";
            document.getElementById("content").style.display="block";
            }
        </script>
    </body>
</html>