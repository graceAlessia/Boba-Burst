<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
    <h2>ORDERS</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD ORDER</button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Phone Number</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM `orders`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['phoneNumber']; ?></td>
                    <td><?php echo $row['customer_order']; ?></td>
                    <td>
                        <a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Update</a>
                        <a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>

<?php if (isset($_GET['message'])): ?>
    <h6 style="color: red;"><?php echo htmlspecialchars($_GET['message']); ?></h6>
<?php endif; ?>

<?php if (isset($_GET['delete_msg'])): ?>
    <h6 style="color: green;"><?php echo htmlspecialchars($_GET['delete_msg']); ?></h6>
<?php endif; ?>



<form action="insert_data.php" method="post">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cust_name">Customer Name</label>
                        <input type="text" name="cust_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cust_phone">Phone Number</label>
                        <input type="text" name="cust_phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cust_order">Order</label>
                        <input type="text" name="cust_order" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_order" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('footer.php'); ?>

<script>
    // This script will run after the page loads and will remove the query parameters from the URL.
    window.onload = function() {
        if (window.location.search.indexOf('message=') > -1 || window.location.search.indexOf('insert_msg=') > -1 || window.location.search.indexOf('update_msg=') > -1) {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    };
</script>
