<?php
require 'config.php';

if(isset($_POST['save_offers']))
{
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $title=mysqli_real_escape_string($db,$_POST['title']);
    $description=mysqli_real_escape_string($db,$_POST['description']);
    $expdate=mysqli_real_escape_string($db,$_POST['expdate']);
    $code=mysqli_real_escape_string($db,$_POST['code']);

    if($email == NULL || $title==NULL || $description==NULL || $expdate==NULL || $code==NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query="INSERT INTO couponcode (email,title,description,expirydate,code) VALUES ('$email', '$title', '$description','$expdate','$code')";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Details added Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Details Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_coupon']))
{
    $student_id = mysqli_real_escape_string($db, $_POST['student_id3']);

    $query = "DELETE FROM couponcode WHERE uid='$student_id'";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Details Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
?>