<?php
    
    // onderstaand bestand wordt ingeladen
    include('../../core/header.php');
    include('../core/checklogin_admin.php');
    include('users-menu.php');
?>

<h1>Gebruikersoverzicht</h1>

<?php
        $liqry = $con->prepare("SELECT admin_user_id,email FROM admin_user");
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_result($adminId,$email);
            if($liqry->execute()){
                $liqry->store_result();
                // while($liqry->fetch()) {
                //     echo 'admin id :' . $adminId . " - ";
                //     echo 'email :' . $email . " - ";
                //     echo '<a href="edit_user.php?uid='.$adminId.'">edit</a><br>';
                // }

                // table>tr*1>td*4
                //echo '<<h2>admin uid</h2>>
                        
                  //          <h2>admin uid</h2>
                    //        <h2>email</h2>
                      //      <h2>edit</h2>
                        //    <h2>delete</h2>
                        //</div>';
                while ($liqry->fetch() ) { ?>
                        <div>
                        <div><?php echo "ID= " . $adminId; ?>    <a href="edit_user.php?uid=<?php echo $adminId; ?>">Edit</a></div>
                        <div><?php echo "E-mail= " . $email; ?>    <a href="delete_user.php?uid=<?php echo $adminId; ?>">Delete</a></div>
                        <br>
                    </div>
                    <?php 
                }
                echo '</table>';
            }

            $liqry->close();
        }

?>

<?php
    include('../core/footer.php');
?>
