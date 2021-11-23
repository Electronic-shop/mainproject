<?php include 'include/header.php'; ?>
<?php
if(isset($_POST['addBtn'])){
 $name=$_POST['product_name'];
 $price=$_POST['price'];
 $desc=$_POST['description'];
 $ca_id=$_POST['category_id'];

 $path = 'uplodes/';

 $p_img =time().'1'.$_FILES['product_img']['name'];
 $img_tmp_name = $_FILES['product_img']['tmp_name'];

 $query="INSERT INTO `product`(`product_name` ,`product_price`, `product_picture`, `description`, `category_id` ) 
 VALUES ('$name' , '$price' , '$p_img' , '$desc' , '$ca_id')";
if(mysqli_query($connection,$query)){
    move_uploaded_file($img_tmp_name, $path.$p_img);
    
}
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
                                <label for="">Product Name :</label>
                                <input type="text" id="product_name" name="product_name" placeholder="Product Name" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Product Price :</label>
                                <input type="text" id="price" name="price" placeholder="Product Price" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Product Image</label>
                                <input type="file" id="product_img" name="product_img" placeholder="Product Image" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Product Description :</label>
                                <input type="text" id="description" name="description" placeholder="Product Description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">school</label>
                            <select name="category_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `categories`";
                                    $excute = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Product</button></div>
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
                                            <th>Prduct Name</th>
                                            <th>Prduct Price</th>
                                            <th>Prduct Picture</th>
                                            <th>Prduct Discription</th>
                                            <th>Category_id(Product)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $query = "SELECT * FROM `product` ";
                                        $excute = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($excute)){
                                        ?>
                                        <tr>
                                        <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['product_name'] ?></td>
                                            <td><?php echo $row['product_price'] ?></td>
                                            <td><?php echo $row['product_picture'] ?></td>
                                            <td><?php echo $row['description'] ?></td>
                                            <td><?php echo $row['category_id'] ?></td>
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
