<?php include('partials/menu.php')  ?>

    <!--Main section start-->
    <div class="main-content">
        <div class="wrapper">
            <h1> Manage Food </h1>
            
            <br>
            <?php
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
             }
             if(isset($_SESSION['no-food-found']))
            {
                echo $_SESSION['no-food-found'];
                unset($_SESSION['no-food-found']);
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


            ?>
            <br><br>
            <!--Button-->
            <a href="add-food.php" class="btn-primary">Add Food</a>
              <br><br><br>
            <table class="tbl-full">
                <tr>
                  <th>S.N.</th>  
                  <th>Title</th>  
                  <th>Price</th>  
                  <th>Image</th>  
                  <th>Fetured</th>  
                  <th>Active</th> 
                  <th>Descriptio</th>  
                  <th>Action</th>  

                </tr>

             <?php
                    $sql1="SELECT * FROM tbl_food";
                    $res1=mysqli_query($conn,$sql1);
                    $count=mysqli_num_rows($res1);
                    If($count>0)
                    { 
                        while($row=mysqli_fetch_assoc($res1))
                        {  
                              
                            $id=$row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $image_name=$row['image_name'];
                            $fetured=$row['featured'];
                            $active=$row['active'];
                            $description=$row['description'];
                           ?>




                            <tr>
                            <td>1</td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $price; ?></td>
                            <td>
                            <?php  
                            if($image_name!="")
                            {  ?>
         
                              <img src="../images/food/<?php echo $image_name ?>" alt="image" width="100px">
                              
                              <?php
                            }
                            else{
                             echo "<div class='error'>image not available</div>";
                            }    ?>
                            </td>  
                            <td><?php echo $fetured; ?></td>  
                            <td><?php echo $active; ?></td>
                            <td><?php echo $description; ?></td>  
          
        
                            <td>
                            <a href="update-food.php?id=<?php echo $id ?>" class="btn-secundry">update food</a>
        
                            <a href="delete-food.php?id=<?php echo $id ?>&image_name=<?php echo $image_name; ?>" class="btn-denger">Delete Food</a>
        
                            </td>
        
                        </tr>
                <?php } } 
             else{
                        echo "<tr><td colspan='8' class='error'> Food Not Added Yet.</td>  </tr>";
                    }

                  ?>



              
                
            </table>
        </div>
    </div>


    <?php  include('partials/footer.php') ?>


   