<?php
include('dbcon.php'); // Include the database connection

if (isset($_POST['add_order'])) {

    $cust_name = $_POST['cust_name'];
    $cust_phone = $_POST['cust_phone'];
    $cust_order = $_POST['cust_order'];

    if (empty($cust_name)) {
        header('Location: index.php?message=You need to fill in the customer name!');
        exit;
    } else {
        $query = "INSERT INTO `orders` (`customer_name`, `phoneNumber`, `customer_order`) VALUES ('$cust_name', '$cust_phone', '$cust_order')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            header('Location: index.php?insert_msg=Your data has been added successfully');
            exit;
        }
    }
}
?>