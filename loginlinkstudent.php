<?php
session_start();
?>
<?php

$x = $_POST[ "sid" ];
$y = $_POST[ "spass" ];

include( "database.php" );
//searching login id and password entered in $x & $y
$sql = "select * from student where Sid='" . $x . "' and Spass='" . $y . "'";

$result = mysqli_query( $connect, $sql );

if ( $result->num_rows > 0 ) {
	if ( $row = $result->fetch_assoc() ) {
		$_SESSION[ "umail" ] = $row[ "Sid" ];

	}
	//redirecting to welcome admin page
	header( 'Location:welcomestudent.php' );
} else {
	//error message if SQL query fails
	echo "<h3><span style='color:red; '>Invalid Admin ID & Password. Page Will redirect to Login Page after 3 seconds </span></h3>";
	header( "refresh:3;url=Studentlogin.php" );

}
$connect->close();
?>