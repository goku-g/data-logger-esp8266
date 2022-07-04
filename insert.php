<?php
    include('config.php');

    $var = "";
    if(isset($_POST['submit']))
    {
        $data=$_POST['data'];
        $remark=$_POST['remarks'];

        if($data && $remark)
        {
            
            $con->query("INSERT INTO distance_data (id, distance, timestamp, remarks) VALUES (NULL, '".$data."', current_timestamp(), '".$remark."');");
            header("location: index.php");

        }
        else
        {
            $var = "Invalid Input!";
        }
        
    }
?>  

<?php include("header.php"); ?>
        
<!-- download button -->
<!-- <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
    <i class="fas fa-download me-2"></i>
    Free Download!
</a> -->
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container table-responsive">
                <!-- Contact Section Heading-->
                <h2 class="text-center text-uppercase text-secondary mb-0">Insert Data</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" method="POST" action="insert.php">
                            <!-- data input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="distance" name="distance" type="number" min="0" step="0.01" placeholder="Enter your data..." data-sb-validations="required" />
                                <label for="data">Distance Data</label>
                            </div>
                            <!-- remarks address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="remarks" name="remarks" type="text" placeholder="short/medium/long" data-sb-validations="required" />
                                <label for="remarks">Remarks</label>
                            </div>
                            <!-- Error message -->
                            <?php
                                if($var)
                                {
                                    echo '<p class="text-danger">'.$var.'</p>';
                                }
                            ?>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl" id="submitButton" name="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php include("footer.php"); ?>