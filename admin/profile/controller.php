
<?php
function user($id){

Global $conn;
$sql = "SELECT * from users WHERE id = $id";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: index.php?error=sqlerror");
    exit();
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$show = mysqli_fetch_assoc($result);
return $show;

}