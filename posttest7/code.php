<?php
session_start();
require 'dbcon.php';

date_default_timezone_set("Asia/Makassar");
if(isset($_POST['delete_mobil']))
{
    $mobil_id = mysqli_real_escape_string($con, $_POST['delete_mobil']);

    $query = "DELETE FROM mobil WHERE id='$mobil_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "mobil Deleted Successfully";
        header("Location: index6.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "mobil Not Deleted";
        header("Location: index6.php");
        exit(0);
    }
}

date_default_timezone_set("Asia/Makassar");
if(isset($_POST['update_mobil']))
{
    $mobil_id = mysqli_real_escape_string($con, $_POST['mobil_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    $tahun = mysqli_real_escape_string($con, $_POST['tahun']);
    $jarak = mysqli_real_escape_string($con, $_POST['jarak']);
    $img = mysqli_real_escape_string($con, $_POST['img']);
    $d = strtotime("now");
    $tgl = date("d-m-Y h:i:sa", $d);

    $query = "UPDATE mobil SET name='$name', brand='$brand', tahun='$tahun', jarak='$jarak', img='$img', time='$tgl' WHERE id='$mobil_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "mobil Updated Successfully";
        header("Location: index6.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "mobil Not Updated";
        header("Location: index6.php");
        exit(0);
    }

}

date_default_timezone_set("Asia/Makassar");
if(isset($_POST['save_mobil']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    $tahun = mysqli_real_escape_string($con, $_POST['tahun']);
    $jarak = mysqli_real_escape_string($con, $_POST['jarak']);
    $img = mysqli_real_escape_string($con, $_POST['img']);
    $d = strtotime("now");
    $tgl = date("d-m-Y h:i:sa", $d);

    $query = "INSERT INTO mobil (name,brand,tahun,jarak,time,img) VALUES ('$name','$brand','$tahun','$jarak','$tgl','$img')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "mobil Created Successfully";
        header("Location: create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "mobil Not Created";
        header("Location: create.php");
        exit(0);
    }
}

?>