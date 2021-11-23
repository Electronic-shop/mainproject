<?php
ob_start();
include 'include/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from categories where id=$id";
$excute = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($excute);

if(isset($_POST['addBtn'])){
  

    $name = $_POST['name'];
    
    
  


    $query = "UPDATE `categories` SET `category_name`='$name' WHERE id=$id";
      

           mysqli_query($connection,$query);
             header("location:manage_category.php");
            }
    

    

?>
<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card" style="padding-left: 257px;">
                <div class="card-header bg-secondary text-light">Manage category</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for=""> Name :</label>
                                <input type="text" id="name" name="name" placeholder="name" value="<?php echo $row['category_name'] ?>" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update category</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>