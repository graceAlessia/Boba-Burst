<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM `orders` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_array($result);
    }
}

if(isset($_POST["update_order"])){
    $cust_name = $_POST['cust_name'];
    $cust_phone = $_POST['cust_phone'];
    $cust_order = $_POST['cust_order'];

    $query = "UPDATE `orders` SET `customer_name`= '$cust_name', `phoneNumber` = '$cust_phone', `customer_order` = '$cust_order' WHERE `id`= '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header("Location: index.php?update_msg=You have successfully updated the data.");
        exit;
    }
}
?>

<form action="update_page_1.php?id=<?php echo $id;?>" method="post">
    <div class="form-group">
        <label for="cust_name">Customer Name</label>
        <input type="text" name="cust_name" class="form-control" value="<?php echo $row['customer_name']?>">
    </div>
    <div class="form-group">
        <label for="cust_phone">Phone Number</label>
        <input type="text" name="cust_phone" class="form-control" value="<?php echo $row['phoneNumber']?>">
    </div>
    <div class="form-group">
        <label for="cust_order">Order</label>
        <input type="text" name="cust_order" class="form-control" value="<?php echo $row['customer_order']?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_order" value="UPDATE">
</form>

<?php include('footer.php'); ?>
