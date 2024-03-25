<?php
include "connection.php";
include "header.php";
?>




        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <form name="form1" action="" method="post">
                                <table class="table table-bordered">
                                    <tr>
                                        <td> <select name="mat" class="form-control">
                                            <?php 
                                            $res=mysqli_query($link, "select student_matric from issue_books where books_return_date=''");
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row["student_matric"];
                                                echo "</option>";
                                            }
                                            ?>
                                           
                                        </select></td>
                                        <td>
                                            <input type="submit" name="submit1" value="search" class="form=-contol">
                                        </td>
                                    </tr>
                                </table>
                               </form>

                               <?php
                               if(isset($_POST["submit1"])){
                                $res=mysqli_query($link, "select * from issue_books where student_matric='$_POST[mat]'");
                                echo "<table class='table table-boredered'>";
                                echo "<tr>";
                                echo "<th>"; echo "student matric"; echo "</th>";
                                echo "<th>"; echo "student name "; echo "</th>";
                                echo "<th>"; echo "student contact"; echo "</th>";
                                echo "<th>"; echo "student email"; echo "</th>";
                                echo "<th>"; echo "books name"; echo "</th>";
                                echo "<th>"; echo "books issue date"; echo "</th>";
                                echo "<th>"; echo "return book"; echo "</th>";
                                echo "</tr>";
                                while($row=mysqli_fetch_array($res)){
                                  echo "<tr>";
                                  echo "<td>"; echo $row["student_matric"]; echo "</td>";
                                  echo "<td>"; echo $row["student_name"]; echo "</td>";
                                  echo "<td>"; echo $row["student_contact"]; echo "</td>";
                                  echo "<td>"; echo $row["student_email"]; echo "</td>";
                                  echo "<td>"; echo $row["books_name"]; echo "</td>";
                                  echo "<td>"; echo $row["books_issue_date"]; echo "</td>";
                                  echo "<td>"; ?> <a href="return.php?id=<?php echo $row["id"]; ?>">Return Book</a><?php  echo "</td>";
                                }
                               }


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
