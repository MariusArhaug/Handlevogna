<?php include('comp/server.php');?>
<?php include('comp/head.php');?>
<!DOCTYPE html>
<html>	<!-- Body starter her-->
<?php include('comp/sidenav.php');?>

<?php 
if (isset($_SESSION['bruker_id'])) {

include('comp/index_logged.php'); }

else {		
include('comp/index_guest.php');}
?>
<!--Body slutter her -->
<?php
	include('comp/footer.php'); 
?>
</html>