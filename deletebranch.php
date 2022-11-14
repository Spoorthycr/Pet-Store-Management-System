<?php
    //INCLUDE CONSTANT.PHP
    include('constant.php');

    //get the id of customer to be deleted
    $id=$_GET['id'];


    //create sql query to delete
    $sql = "DELETE FROM branches WHERE branch_id=$id";


    //execute the query
    $res = mysqli_query($conn,$sql);

    //check whether the query is executed successfully
    if($res==TRUE)
    {
        //success (deleted)
        //echo "customer deleted";
        //create session variable to display message
        $_SESSION['delete'] = "<div class='success'> BRANCH ID DELETED!</div>";
        //redirect
        header('location:'.SITEURL.'/branches.php');
    }
    else 
    {
        //failed
        //echo "failed to delete";
        $_SESSION['delete'] = "<div class ='error'>Failed to delete</div>";
        header('location:'.SITEURL.'/branches.php');

    }


    //redirect to add admin with msg success or error



?>