<?php
session_start();
if(!isset($_SESSION["librarian"])){
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
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                    <div class="x_content">
                        <form action="" method="post" class="col-lg-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="books name" name="booksname" required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="books author name" name="bauthorname" required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="publication name" name="pname" required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="books purchase date" name="bpurchasedt" required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="books price" name="bprice" required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="books quantity" name="bqty" required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="available quantity" name="aqty" required></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="btn btn-default submit" value="insert book details" name="submit1" required></td>
                                </tr>
                                
                            </table>
                        </form>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <?php 
        if(isset($_POST['submit1'])){
            mysqli_query($link, "insert into add_books values('', '$_POST[booksname]', '$_POST[bauthorname]', '$_POST[pname]', '$_POST[bpurchasedt]', '$_POST[bprice]', '$_POST[bqty]', '$_POST[aqty]', '$_SESSION[librarian]')");

            ?>
            <script type="text/javascript">
                alert("books inserted successfully"); 
            </script>
            <?php
        }
        
        
        ?>


<?php
include "footer.php"
?>
