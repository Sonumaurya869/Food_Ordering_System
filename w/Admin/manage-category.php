<?php include('partials/menu.php')  ?>

    <!--Main section start-->
    <div class="main-content">
        <div class="wrapper">
            <h1> Manage Category </h1>

            <br><br>
            <?php
              if(isset($_SESSION['add']))
              {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
              }
              if(isset($_SESSION['fail_remove']))
              {
                echo $_SESSION['fail_remove'];
                unset($_SESSION['fail_remove']);
              }
              if(isset($_SESSION['update']))
              {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
              }
              if(isset($_SESSION['upload']))
              {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
              }

             
           


            if(isset($_SESSION['remove']))
             {
 
                 echo $_SESSION['remove'];
                 unset($_SESSION['remove']);
              }
              if(isset($_SESSION['delete']))
             {
 
                 echo $_SESSION['delete'];
                 unset($_SESSION['delete']);
              }
              if(isset($_SESSION['no-category-found']))
              {
  
                  echo $_SESSION['no-category-found'];
                  unset($_SESSION['no-category-found']);
               }
              ?>
           <br>
            <!--Button-->
            <a href="add_category.php" class="btn-primary">Add Category</a>
              <br><br><br>
            <table class="tbl-full">
                <tr>
                  <th>S.N.</th>  
                  <th>Title</th>  
                  <th>Image</th>  
                  <th>featured</th>  
                  <th>Active</th>
                  <th>Action</th>  
                </tr>
         <?php
        $sql="SELECT * FROM tbl_category";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count>0)
        {                   $sn=1;

             while($row=mysqli_fetch_assoc($res))
            {
                $id=$row['id'];
                $title=$row['title'];
               $image_name=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];
             ?>


                <tr>
                    <td><?php echo $sn++;  ?></td>
                    <td><?php echo $title  ?></td>
                    <td>
                   <?php  
                   if($image_name!="")
                   {  ?>

                     <img src="../images/category/<?php echo $image_name ?>" alt="image" width="100px">
                     
                     <?php
                   }
                   else{
                    echo "<div class='error'>image not available</div>";
                   }    ?>
                     </td>

                    <td><?php echo $featured  ?></td>
                    <td><?php echo $active  ?></td>
                    <td>
                    <a href="update-category.php?id=<?php echo $id ?>" class="btn-secundry">Update Category</a>

                    <a href="delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-denger">Delete Category</a>

                    </td>

                </tr>

        <?php } } 


        else{
              ?>

       <tr calspan="6">
        <div class="error">No Category Added!</div>
       </tr>

       <?php
        }

       ?>
               
               
            </table>
            
        </div>
    </div>


    <?php  include('partials/footer.php') ?>


   