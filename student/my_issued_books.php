<?php
session_start();
if(!isset($_SESSION["username"])){
?>
<script>
    window.location="login.php"
</script>
<?php
}
include "connection.php";
include "header.php";
?>




        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>My Issued Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <table class="table table-bordered">
                                <th>
                                    Student matric number
                                </th>
                                <th>
                                    Issued books 
                                </th>
                                <th>
                                    Book issue date
                                </th>

                                <?php 
                                $res=mysqli_query($link, "select * from issue_books where student_username='$_SESSION[username]'");
                                while($row=mysqli_fetch_array($res)) {
                                    echo "<tr>"; 
                                    echo "<td>";  
                                    echo $row["student_matric"]; 
                                    echo "</td>"; 

                                    echo "<td>";  
                                    echo $row["books_name"]; 
                                    echo "</td>"; 

                                    echo "<td>";  
                                    echo $row["books_issue_date"]; 
                                    echo "</td>"; 
                                    echo "</tr>"; 
                                }
                                ?>
                              </table>
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
