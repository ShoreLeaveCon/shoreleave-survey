<?php

function GetRequestValue( $key ) {
    $value = "";
    if(isset($_REQUEST[$key]))
        $value = $_REQUEST[$key];
    return $value;
}

function GetServerVariable( $key ) {
    $value = "";
    if(isset($_SERVER[$key]))
        $value = $_SERVER[$key];
    return $value;
}

if( $_SERVER['REQUEST_METHOD'] == "GET" ) {
    header("Location: /survey/");
	die();
}
else {
    $CurrentShow1 = GetRequestValue( "CurrentShow1" );
    $CurrentShow2 = GetRequestValue( "CurrentShow2" );
    $CurrentShow3 = GetRequestValue( "CurrentShow3" );

    $AllTimeFavoriteShow1 = GetRequestValue( "AllTimeFavoriteShow1" );
    $AllTimeFavoriteShow2 = GetRequestValue( "AllTimeFavoriteShow2" );
    $AllTimeFavoriteShow3 = GetRequestValue( "AllTimeFavoriteShow3" );

    $Actor1 = GetRequestValue( "actor1" );
    $Actor2 = GetRequestValue( "actor2" );
    $Actor3 = GetRequestValue( "actor3" );

    $FirstShoreLeave = GetRequestValue( "firstShoreLeave" );

    $IP = GetServerVariable( "HTTP_CF_CONNECTING_IP" );
    $Country = GetServerVariable( "HTTP_CF_IPCOUNTRY" );

    $db_name = "DATABASE_NAME"; //Name of Database
    $db_host = "SERVER_NAME"; //Host address (most likely localhost)
    $db_user = "DATABASE_USER"; //Name of database user (must have write permission)
    $db_pass = "DATABASE_PASS"; //Password for database user

    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    $stmt = $mysqli->prepare("INSERT INTO `survey` (`CurrentShow1`, `CurrentShow2`, `CurrentShow3`, `AllTimeFavoriteShow1`, `AllTimeFavoriteShow2`, `AllTimeFavoriteShow3`, `actor1`, `actor2`, `actor3`, `IP_Address`, `Country`, `FirstShoreLeave`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
    $stmt->bind_param("ssssssssssss", $CurrentShow1, $CurrentShow2, $CurrentShow3, $AllTimeFavoriteShow1, $AllTimeFavoriteShow2, $AllTimeFavoriteShow3, $Actor1, $Actor2, $Actor3, $IP, $Country, $FirstShoreLeave);
    $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php  require_once("../layout/head-common.txt"); ?>
		<title>Fan Survey - Shore Leave 40</title>

		<?php  require_once("../layout/metaheaders.htm"); ?>
		<link rel="canonical" href="https://www.shore-leave.com/survey/survey.php" />

	</head>
	<body>
        <?php  require_once("../layout/header.htm"); ?>
		<?php  require_once("../layout/navbar.php"); ?>

		<div id="contents" class="container-fluid col-sm-10">

            <p>What are three Sci-Fi, Fantasy, or related genre TV series which you currently watch?</p>
            <ol>
                <li class="line"><?php print "$CurrentShow1"; ?></li>
                <li class="line"><?php print "$CurrentShow2"; ?></li>
                <li class="line"><?php print "$CurrentShow3"; ?></li>
            </ol>

			<p>What are your three all-time favorite TV series and movies in the Sci-Fi, Fantasy, or related genres?</p>
            <ol>
                <li class="line"><?php print "$AllTimeFavoriteShow1"; ?></li>
                <li class="line"><?php print "$AllTimeFavoriteShow2"; ?></li>
                <li class="line"><?php print "$AllTimeFavoriteShow3"; ?></li>
            </ol>

			<p>Who are your three favorite actors from the Sci-Fi, Fantasy, and related genres?</p>
            <ol>
                <li class="line"><?php print "$Actor1"; ?></li>
                <li class="line"><?php print "$Actor2"; ?></li>
                <li class="line"><?php print "$Actor3"; ?></li>
            </ol>

            <p>What was the first Shore Leave you attended? <?php print "$FirstShoreLeave"; ?></p>
            <p>Your IP address: <?php print "$IP"; ?></p>
            <p>Your Country: <?php print "$Country"; ?></p>

		</div>

        <?php  require_once("../layout/footer.htm"); ?>
	</body>
</html>