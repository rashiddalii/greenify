<div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>


            <?php
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == "true")
                {
                    $profile = $_GET['profile'] - 10201211 ;
                    $user_id =  $profile;
                    $qry = "SELECT * FROM register_users WHERE id = '$user_id'";
                    $res = mysqli_query($con,$qry);

                    if(mysqli_num_rows($res) == 1)
                    {
                        $arr = mysqli_fetch_array($res);
                
            ?>
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"> <?php echo $arr['firstName']." ".$arr['lastName']?> </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?php $profile =  $arr['id'] + 10201211;
                                        // echo "<a href='../vendor/index.php?profile=$profile' class='dropdown-item'>Add Products</a>";
                                        echo "<a href='../../logout.php' class='dropdown-item'>Sign out</a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php 

                }}
                else {
                
            ?>    
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"> My Account </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="../../account-RL/sign-in/index.php" class="dropdown-item">Sign in</a>
                                    <a href="../../account-RL/sign-up/index.php" class="dropdown-item">Sign up</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php  
                    }      
            
            ?>                
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                        <span class="h1 text-uppercase text-light bg-dark px-2">GREEN</span>
                        <span class="h1 text-uppercase text-dark bg-success px-2 ml-n1">IFY</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <!-- <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-success">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form> -->
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>