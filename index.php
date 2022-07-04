<?php 
    include("config.php");

    if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
        
        $result = $con->query("SELECT * FROM distance_data WHERE id = '$id'");

        if(($result->num_rows) != 0){
            $depart = $result->fetch_object();
            $con->query("DELETE FROM distance_data WHERE distance_data.id = $id");
        }
        //header("location: index.php");
    }

    include("header.php");
?>
        
<!-- download button -->
<!-- <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
    <i class="fas fa-download me-2"></i>
    Free Download!
</a> -->
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Time</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //for getting department id
                            $result = $con->query("SELECT * FROM distance_data;");
                            $count = 1;
                            while($distance = mysqli_fetch_array($result))
                            {
                                echo '<tr>';
                                echo '<th scope="row">'.$count++.'</th>';
                                echo '<td>'.$distance['distance'].'</td>';
                                echo '<td>'.$distance['timestamp'].'</td>';
                                echo '<td>'.$distance['remarks'].'</td>';
                                echo '<td>';
                                echo "<a class='btn btn-danger btn-sm' href=\"index.php?delete=".$distance['id']."\" OnClick=\"return confirm('Are You Sure?');\"><i class='fa fa-trash'></i></a>";
                                echo '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- Footer-->
        <?php include("footer.php"); ?>
