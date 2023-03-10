<?php include('partials/menu.php')  ?>


 <div class="main-content">
 <div class="wrapper">
     <h1> Add Food </h1>
     <br>
    <?php
           if(isset($_SESSION['upload']))
           {
             echo $_SESSION['upload'];
             unset($_SESSION['upload']);
           }
    ?>


     <form action="" method="POST" enctype="multipart/form-data">
          <table class="tbl-30">
                <tr>
                  <td>Title:</td>  
                  <td> <input type="text" name="title" placeholder="enter food title"></td>  
                </tr>
                <tr>
                  <td>Description</td>  
                  <td> <textarea name="description" cols="30" rows="5" placeholder="Description of the food."></textarea>
                </td>  
                </tr>
                <tr>
                  <td>Price</td>  
                  <td> <input type="number" name="price"></td>  
                </tr>
           
                <tr>
                    <td> Select Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                  <td>Category</td>
                 <td>
                  <select name="category">
                  <option value="0">SELECT</option>

                  <?php
                      $sql="SELECT *FROM tbl_category WHERE active='Yes'";
                      $res=mysqli_query($conn,$sql);
                      $count=mysqli_num_rows($res);
                      if($count>0)
                      {
                         while($row=mysqli_fetch_assoc($res))
                         {
                            $id=$row['id'];
                            $title=$row['title'];
                            ?>
                             <option value="<?php echo $id; ?>"><?php echo $title ;?></option>

                          <?php
                         }        
                      }
                      else{
                        ?>
                         <option value="0">No Category Found</option>
                       <?php
                      }
                    ?>
                  <td> 
               </select>
                   
                </tr>



                <tr>
                  <td>Feature:</td>  
                  <td>
                   <input type="radio" name="featured" value="Yes"> yes
                   <input type="radio" name="featured" value="No"> No

                </td>  
                
             </tr>
                <tr>
                  <td>Active:</td>  
                  <td> 
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="Yes"> No
                </td>  
                <tr>
                    <td calspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secundry">
                    </td>
                </tr>

                </tr>
            </table>

          </form>

   <?php
          if(isset($_POST['submit']))
          {
            $title= $_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $cotegory=$_POST['category'];
            
            if(isset($_POST['featured']))
            {
              $featured=$_POST['featured'];
            }
            else{
              $featured="No";
            }

            if(isset($_POST['active']))
            {
              $active=$_POST['active'];
            }
            else{
              $active="No";
            }

            if(isset($_FILES['image']['name']))
            {
             $image_name=$_FILES['image']['name'];
             
             if($image_name != "")
            {


             $ext = end(explode('.',$image_name));
             $image_name="Food_Name_".rand(0000,9999).'.'.$ext;
             $src=$_FILES['image']['tmp_name'];

             $dst="../images/food/".$image_name;

             $upload=move_uploaded_file($src,$dst);

             if($upload==false)
             {
                 $_SESSION['upload']="<div class='error'>Img Upload Failed!</div>";
                 header("location:http://localhost/restorent/w/Admin/add-food.php");
                 die();
                 
                       
             }
           }
           

            }
            else{
             $image_name="";
            }
            
            


         
            $sql2="INSERT INTO `tbl_food` (`title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES ('$title', '$description', '$price', '$image_name', '$cotegory', '$featured', '$active');";
              $res2=mysqli_query($conn,$sql2) or die(mysqli_error());   
             if($res2==TRUE)
             {
               $_SESSION['add']="<div class='success'>Food Added Successfully</div>";
               header("location:http://localhost/restorent/w/Admin/manage-food.php");
               }
             else{
         
                 $_SESSION['add']="<div class='error'>Food Added Faild !</div>";
                 header("location:http://localhost/restorent/w/Admin/manage_food.php");
             }
             
         



          }     
   ?>

 </div>
</div>

<?php  include('partials/footer.php') ?>
