<?php include('constant.php');?>
<?php

    //get id to be deleted
    $id=$_GET['id'];

    //sql query
    $sql="DELETE FROM ad_login WHERE id=$id";

    //execute
    $res=mysqli_query($conn,$sql);

    if($res==TRUE){
        //successfully
        //echo "employee deleted successfully";
        $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
        header("location:".SITEURL.'/admin_login.php');    }
    else{
        //failed
        //echo "failed to delete employee";
        $_SESSION['delete']="<div class='error'>Admin deletion failed.Try again later</div>";
        header("location:".SITEURL.'/admin_login.php');    }

?>