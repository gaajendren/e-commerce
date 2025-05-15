<?php
	  require '../../db.php';

	 $conn->query("DELETE FROM `product` WHERE `id` = '$_GET[id]'") or die(mysqli_error());
	 header("location: product.php?success=delete");
     exit();