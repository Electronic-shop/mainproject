<?php include 'include/header.php'; ?>
<?php
if(isset($_POST['addBtn'])){
 $name=$_POST['category'];
 $query="INSERT INTO `categories`(`category_name`) VALUES ('$name')";
 mysqli_query($connection,$query);
}
?>


<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card" style="padding-left: 257px;">
                <div class="card-header bg-secondary text-light">Manage Category</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="">Category Name :</label>
                                <input type="text" id="category" name="category" placeholder="Category Name" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Category</button></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Table Show Data -->

    <div class="row mb-5">
    <div class="col-md-12">
                        <div class="card" style="padding-left:257px ;">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $query = "SELECT * FROM `categories` ";
                                        $excute = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($excute)){
                                        ?>
                                        <tr>
                                        <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['category_name'] ?></td>
                                            <td>
                                                <a href="delete_category.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                                <a href="edit_category.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
</div>
</div>

