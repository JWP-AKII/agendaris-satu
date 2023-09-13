 <?php
 
    include '../conn.php';

    $username =$_POST['username'];
    $password =$_POST['password'];
    $jabatan =$_POST['jabatan'];

    mysqli_query($conn, "insert into user values('', '$username', '$password', '$jabatan', '')");

    header('location:index.php');
 
 ?>