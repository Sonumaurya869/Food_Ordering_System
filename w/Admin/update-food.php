<?php include('partials/menu.php')  ?>
  <div class="main-content">
          <div class="wrapper">
              <h1> Update Food </h1>
            <br> <br>
          <?php
                if(isset($_GET['id']))
                {   
                    $id=$_GET['id'];
                    $sql="SELECT *FROM tbl_food where id= $id";
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);
                    if($count==1)
                    {
                         $row=mysqli_fetch_assoc($res);
                         $title=$row['title'];
                         $price=$row['price'];
                         $current_image=$row['image_name'];
                         $featured=$row['featured'];
                         $active=$row['active'];
                         $c_category=$row['category_id'];
                         $description=$row['description'];
                       }
                    else{
                         $_SESSION['no-food-found']="<div class='error'>Food Not Found </div>";
                         header("location:http://localhost/restorent/w/Admin/manage-food.php");
                        }
                }
            else{

                    header("location:http://localhost/restorent/w/Admin/manage-food.php");


                }
          ?>
  <br>
  
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                  <tr>
                    <td>Title</td>  
                    <td> <input type="text" name="title" value="<?php echo $title; ?>"></td>  
                  </tr>
                  <tr>
                    <td>Price</td>  
                    <td> <input type="number" name="price" value="<?php echo $price; ?>"></td>  
                  </tr>

                  <tr>
                      <td> Current Image</td>
                      <td>
                          <?php
                             //echo "Hello".$current_image;
                            if($current_image=="")
                            {

                              echo "<div class='error'>Image Not Added </div>";
                            }
                            else{
                              ?>
                              <img src="../images/food/<?php echo $current_image ?>" alt="image" width="100px">
                           <?php
                            }
                          ?>
                      </td>
                  </tr>
                  <tr>
                      <td> New Image</td>
                      <td>
                          <input type="file" name="image">
                      </td>
                  </tr>

                  <tr>
                  <td>Category</td>
                 <td>
                  <select name="category">

                  <?php
                      $sql3="SELECT *FROM tbl_category WHERE active='Yes'";
                      $res3=mysqli_query($conn,$sql3);
                      $count3=mysqli_num_rows($res3);
                      if($count3>0)
                      {
                         while($row3=mysqli_fetch_assoc($res3))
                         {
                            $c_id=$row3['id'];
                            $c_title=$row3['title'];
                            ?>
                             <option <?php if($c_category == $c_id){echo "selected";} ?> value="<?php echo $c_id; ?>"><?php echo $c_title ;?></option>

                          <?php
                         }        
                      }
                      else{
                        ?>
                         <option value="0">No Category Found</option>
                       <?php
                      }
                    ?>
                  
               </select>
                    </td>
                </tr>


  
                  <tr>
                    <td>Featured</td>  
                    <td>
                     <input <?php if($featured=="Yes"){echo "checked";}   ?>  type="radio" name="featured" value="yes"> yes
                     <input <?php if($featured=="No"){echo "checked";}   ?> type="radio" name="featured" value="No"> No
  
                  </td>  
                  </tr>
                  <tr>
                    <td>Active:</td>  
                    <td> 
                      <input <?php if($active=="Yes"){echo "checked";}   ?> type="radio" name="active" value="Yes"> Yes
                      <input <?php if($active=="No"){echo "checked";}   ?> type="radio" name="active" value="No"> No
                  </td>  
                  <tr>
                  <tr>
                  <td>Description</td>  
                  <td> <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea> </td>  
                    </tr>
                    <tr>
                      <td calspan="2">
                        
                          <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">

                          <input type="submit" name="submit" value="Update Food" class="btn-secundry">
                      </td>
                  </tr>
  
              
              </table>
  
            </form>
  
  

  <?php
   ob_start();
    if(isset($_POST['submit']))
    { 
       $title=$_POST['title'];
       $id=$_POST['id'];
       $price=$_POST['price'];
       $current_image=$_POST['current_image'];
       $featured=$_POST['featured'];
       $active=$_POST['active'];
       $description=$_POST['description'];
       $category=$_POST['category'];

       if(isset($_FILES['image']['name']))
      {
            $image_name= $_FILES['image']['name'];
           if($image_name !="")
          {   
              $fr=explode('.',$image_name);
              $ext = end($fr);
              $image_name="Food_Name_".rand(0000,9999).'.'.$ext;
              $path=$_FILES['image']['tmp_name'];

              $destination="../images/food/".$image_name;

              $upload = move_uploaded_file($path,$destination);

              if($upload==false)
              {
                 $_SESSION['upload']="<div class='error'>Img Upload Failed!</div>";
                 header("location:http://localhost/restorent/w/Admin/manage-food.php");
                 die();
              }
              if($current_image!="")
              { 
                $current_image;
                $remove_path= "../images/food/".$current_image;
                $remove= unlink($remove_path);

                if($remove==false)
                {
                 $_SESSION['fail_remove']="<div class='error'>Fail to remove current image </div>";
                 header("location:http://localhost/restorent/w/Admin/manage-food.php");
                 die();
                }
              }
          }
          else{

            $image_name=$current_image;

          }
         
      }   
      else
     {
        $image_name=$current_image;
     }

       //echo "current-> ".$current_image;
       //echo "image name =".$image_name;

      $sql2="UPDATE tbl_food SET title='$title',`description`='$description',price='$price',image_name='$image_name',category_id='$category',featured='$featured',active='$active' WHERE id=$id "; 
      
      $res2=mysqli_query($conn,$sql2);
       if($res2)
       {
       $_SESSION['update']="<div class='success'>Food Update Successfully</div>";
        header("location:http://localhost/restorent/w/Admin/manage-food.php");
       }
       else{
           $_SESSION['update']="<div class='error'>food Not Update Successfully</div>";
           header("location:http://localhost/restorent/w/Admin/manage-food.php");
           ob_end_flush();
       }       

      
  }
?>




</div>
  </div>


   <?php  include('partials/footer.php') ?>
  
