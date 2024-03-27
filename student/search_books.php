<?php
session_start();
if(!isset($_SESSION["username"])){
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
      

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>SEARCH BOOKS</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <form name="form1" action="" method="post">
                                <table class="table">
                                    <tr>
                                        <td><input type="text" name="t1" placeholder="Enter books name" class="form-control"></td>
                                        <td><input type="submit" name="submit1"  value="search books" class="form-control btn btn-default"></td>
                                    </tr>
                                </table>
                            </form>
                                <?php 
                                if(isset($_POST["submit1"])){
                                    $i=0;
                                    $res=mysqli_query($link, "select * from add_books where books_name like('%$_POST[t1]%')");
                                    echo "<table class='table table-boredered'>";
                                    echo "<tr>";
    
                                    while($row=mysqli_fetch_array($res)){
                                        $i=$i+1;
                                        echo "<td>";
                                        echo "<br>";
                                        echo "<b>".$row["books_name"]."</b>";
                                        echo "<br>";
                                        echo "<b> Available quantity: ".$row["available_qty"]."</b>";
                                        echo "</td>";     
    
                                        if($i==2){
                                            echo "</tr>";
                                            echo "<tr>";
                                            $i=0;
                                        }
                                    }
                                    echo "</tr>";
                                    echo  "</table>";
                                }else {
                                    $i=0;
                                    $res=mysqli_query($link, "select * from add_books where available_qty>0");
                                    echo "<table class='table table-boredered'>";
                                    echo "<tr>";
    
                                    while($row=mysqli_fetch_array($res)){
                                        $i=$i+1;
                                        echo "<td>";
                                        echo "<br>";
                                        echo "<b>".$row["books_name"]."</b>";
                                        echo "<br>";
                                        echo "<b> Available quantity: ".$row["available_qty"]."</b>";
                                        echo "</td>";     
    
                                        if($i==2){
                                            echo "</tr>";
                                            echo "<tr>";
                                            $i=0;
                                        }
                                    }
                                    echo "</tr>";
                                    echo  "</table>";
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
