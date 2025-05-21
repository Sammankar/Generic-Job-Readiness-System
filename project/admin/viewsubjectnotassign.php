<?php

include_once 'adminheader.php';

?>

   <div class="dash-content">

    <div class="activity">

        <div class="title">

            <i class="uil uil-create-dashboard"></i>

            <span class="text">Activity</span>

        </div>



<div class="cards">

            <div class="card card-1">

              <i class="uil uil-users-alt"></i>

                      <span class="text">Total Subject Mapped</span>

                      <span class="number">

               <?php

                        require 'connection.php';
                        $objarray = array();
                        $objarray1 = array();
                        
                        $username=   $_SESSION['username'];
                       
                       $tat = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
                         $tresult1= mysqli_query($conn, $tat);
                      
                        if($tresult1)
                        {
                                while($obj=mysqli_fetch_object($tresult1))
                                    {
                                        array_push($objarray,$obj);
                                         
                                    }
                                 $tusers_id= $objarray[0]->users_id;
                                 
                         }
                         else
                         {
                             echo "JHAND1";
                         }
                         
                            $sql1 = "SELECT * FROM `college_registration` WHERE `users_id`=$tusers_id";
                            $result1= mysqli_query($conn, $sql1);
                            
                                if($result1)
                                {
                                while($obj1=mysqli_fetch_object($result1))
                                    {
                                        array_push($objarray1,$obj1);
                                         
                                    }
                                 $tcollege_id= $objarray1[0]->college_id;
                                 
                                 }
                                 else
                                 {
                                     echo "JHAND";
                                 }
                                $college_id=$tcollege_id;
                        $query = "SELECT `sumap_id` FROM `subjects_mapping` WHERE `college_id`='$college_id' AND assign_status=0 ORDER BY `sumap_id`";  

                        $query_run = mysqli_query($conn, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h4>'.$row.'</h4>';

                    ?>
                    </span>

            </div>


          </div>

    </div>




    <div class="activity">

        <div class="title">

            <i class="uil uil-house-user"></i>

            <span class="text">Subject Assign To Faculty List</span>

        </div>


        <div class="table-container">

            <table class="stable" style="border:2px solid black">

                    <tbody class>

                            <tr class="table-row">

                                <?php

                                    include('cs_facultymap.php');

                                ?>

                            </tr>

                    </tbody>

            </table>

        </div>

    </div>

</div>

</section>

<link rel="stylesheet" href="viewsubjectmap.css" />

</body>

</html>