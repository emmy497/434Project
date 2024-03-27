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
include "connection.php"
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
                                <h2>ISSUE BOOKS TO STUDENTS</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <form name="form1" action="" method="post">
                                <table>
                                    <tr>
                                    <td>
                                        <select name="matno" class="form-control selectpicker">
                                            <?php 
                                            $res=mysqli_query($link, "select matric from student_registration");
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row["matric"];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                        <td>
                                            <input type="submit" name="submit1" value="search" class="form-control btn btn-default" 
                                            style="margin-top: 5px">
                                        </td>
                                       
                                    </tr>
                                </table>
                               <?php 
                                if(isset($_POST["submit1"])){

                                   $res5=mysqli_query($link, "select * from student_registration where matric='$_POST[matno]'");
                                   while($row5=mysqli_fetch_array($res5)) {
                                    $firstname = $row5["firstname"];
                                    $lastname = $row5["lastname"];
                                    $username = $row5["username"];
                                    $email = $row5["email"];
                                    $contact = $row5["contact"];
                                    $matric = $row5["matric"];
                                    $_SESSION["matric"]=$matric;
                                    $_SESSION["username"]=$username;
                                   }
                                    ?>
                                     <table class="table table-bordered">
                                <tr>
                                    <td><input type="text" class="form-control" value="<?php echo $matric ?>"  placeholder="matric number"
                                    name="matric" required="" disabled></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control"  value="<?php echo $firstname ?>" placeholder="student name"
                                    name="studentname" required=""></td>
                                </tr>                       
                                <tr>
                                    <td><input type="text" class="form-control"  value="<?php echo $contact ?>"  placeholder="student contact"
                                    name="studentcontact" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" value="<?php echo $email ?>"  placeholder="student email"
                                    name="studentemail" required=""></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="booksname" class="form-control" selectpicker>
                                            <?php 
                                            $res=mysqli_query($link, "select books_name from add_books");
                                            while($row=mysqli_fetch_array($res)){
                                               echo "<option >";
                                               echo $row["books_name"];
                                                echo  " </option>";
                                            }   
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" value="<?php echo date('d-M-Y') ?>"  placeholder="book issuedate"
                                    name="bookissuedate" required=""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" value="<?php echo $username ?>"  placeholder="student username"
                                    name="studentusername" disabled></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="form-control btn btn-default" value="issue books"   
                                    name="submit2" required=""></td>
                                </tr>                        
                                </table>
                                    <?php
                                }
                               
                               ?>
</form>

<?php 
    if(isset($_POST["submit2"])){

        $qty=0;
        $res=mysqli_query($link, "select * from add_books where books_name='$_POST[booksname]'");
        while($row=mysqli_fetch_array($res)){
            $qty=$row["available_qty"];  
        }

        if($qty==0){
            ?>
            <div class="alert alert-danger col-lg-6 col-lg-push-3">
                <strong style="color:white">This book is not available in stock </strong>
            </div>
         <?php
        }else{
            mysqli_query($link, "insert into issue_books values('','$_SESSION[matric]','$_POST[studentname]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]','$_POST[bookissuedate]','','$_SESSION[username]')");
            mysqli_query($link, "update add_books set available_qty=available_qty-1 where books_name='$_POST[booksname]'");
        ?> 
            <script type="text/javascript">
                alert("Books issued successfully");
                window.location.href=window.location.href;
            </script>
        
        <?php
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
