   <?php include('partials/menu.php')  ?>
   

    <!--Main section start-->
    <div class="main-content">
        <div class="wrapper">
            <h1> DASHBOARD </h1>
            <br>
            <?php
              if(isset($_SESSION['login']))
              {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
              } 
              ?>

              <br>
            <div class="col-4 text-center">
            <?php
             $sql="SELECT *FROM tbl_category";
             $res= mysqli_query($conn,$sql);
             $count=mysqli_num_rows($res);
            ?>
             <h1><?php echo $count; ?></h1>
            <br>
             Categorys
            </div>


            <div class="col-4 text-center">
            <?php
             $sql2="SELECT *FROM tbl_food";
             $res2= mysqli_query($conn,$sql2);
             $count2=mysqli_num_rows($res2);
            ?>
             <h1><?php echo $count2; ?></h1>
            <br>
               Foods
                </div>


                <div class="col-4 text-center">
                <?php
             $sql="SELECT *FROM tbl_order";
             $res= mysqli_query($conn,$sql);
             $count=mysqli_num_rows($res);
            ?>
             <h1><?php echo $count; ?></h1>
            <br>                    
                   Orders
                    </div>



                    <div class="col-4 text-center">
                    <?php
                    $sql4="SELECT SUM(total) AS TOTAL FROM tbl_order WHERE status='Deliverd'";
                   $res4= mysqli_query($conn,$sql4);
                    $count4=mysqli_fetch_assoc($res4);
                    $total=$count4['TOTAL'];
                       ?>
                      <h1><?php echo $total.'.'; ?>00</h1>
                        <br>
                       Revenue Generated
                        </div>
                        

                 <div class="clearfix"></div>           

        </div>
    </div>
   <?php  include('partials/footer.php') ?>



   