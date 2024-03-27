<?php
session_start();
if(!isset($_SESSION["librarian"])){
?>
<script>
    window.location="login.php"
</script>
<?php
}
include "header.php";
include "connection.php";
?>




        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                 
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>STUDENTS INFO</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <?php 
                               $res =mysqli_query($link, "select * from 
                               student_registration");
                               echo "<table class='table table-border'>";
                               echo "<tr>";
                               echo "<th>"; echo "firstname"; echo "</th>";
                               echo "<th>"; echo "Lastnamne"; echo "</th>";
                               echo "<th>"; echo "Username"; echo "</th>";
                               echo "<th>"; echo "Email"; echo "</th>";
                               echo "<th>"; echo "Contact"; echo "</th>";
                               echo "<th>"; echo "matric No."; echo "</th>";
                               echo "<th>"; echo "Status"; echo "</th>";
                               echo "<th>"; echo "Approve"; echo "</th>";
                               echo "<th>"; echo "Not Approve"; echo "</th>";
                               echo "</tr>";
                               while($row=mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>"; echo $row["firstname"]; echo "</td>";
                                echo "<td>"; echo $row["lastname"]; echo "</td>";
                                echo "<td>"; echo $row["username"]; echo "</td>";
                                echo "<td>"; echo $row["email"]; echo "</td>";
                                echo "<td>"; echo  $row["contact"]; echo "</td>";
                                echo "<td>"; echo  $row["matric"]; echo "</td>";
                                echo "<td>"; echo  $row["status"]; echo "</td>";
                                echo "<td>"; ?> <a href="approve.php?id=<?php echo $row["id"]; ?>">Approve</a> <?php  echo "</td>";
                                echo "<td>"; ?> <a href="notapprove.php?id=<?php echo $row["id"]; ?>">Not Approve</a> <?php  echo "</td>";
                                echo "</tr>";
                               }
                               echo "</table>"
                               ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php"
?>
