<?php
include  'facultyheader.php';
include 'connection.php';
$username=$_SESSION['username'];
  if(!(isset($_SESSION['username']))){
                header("location:facultydashboard.php");
                
                }
                else
                {
                $fullname = $_SESSION['fullname'];
                
                include_once 'connection.php';
                echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="myprofile.php" class="log log1">'.$fullname.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
                   //$tat ="SELECT * FROM `tbl_user` WHERE `username`=$username";
   $tat = "SELECT * FROM `tbl_user` WHERE `username`='$username'";
     $tresult1= mysqli_query($conn, $tat);
     //$tcheck= mysqli_num_rows($tresult1);
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
         echo "JHAND";
     }
               }?>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                        <div class="mt-4">

                    <label class="text-sm text-gray-600" for="email">Subjects</label>
                                        <select name="subject" id="subject" data-te-select-init class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md">
                                            <option selected>Select Subjects</option>
                                            <?php
                                                include ('connection.php');
                                                $subjects  = mysqli_query($conn, "SELECT `sumap_id`,tbl_program.program_name,tbl_program.year_id,tbl_specialization.specialization_name,subjects_mapping.semester_id,tbl_subject.subject_id,tbl_subject.subject_name,tbl_subject.subject_code,tbl_subject.subject_credits FROM subjects_mapping,tbl_program,tbl_specialization,tbl_subject WHERE subjects_mapping.program_id=tbl_program.program_id AND subjects_mapping.specialization_id=tbl_specialization.specialization_id AND subjects_mapping.subject_id=tbl_subject.subject_id AND users_id=$tusers_id");
                                                while($p = mysqli_fetch_array($subjects)) {  
                                                ?>
                                                <option value="<?php echo $p['subject_id']?>" ><?php echo $p['subject_name']?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                
                <div class="bg-white overflow-auto mt-4 mr-2 ml-2 lg:ml-0">

                
                        <table class="w-full leading-normal">
                            <tbody class>
                            <tr class="table-row">
                                <?php
                                    include('rankdash.php');
                                ?>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                
                
                
                

                
            </main>
        </div>
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script>
  $(document).ready( function () {
    $('#subject').on('change',function(){
        var value= $(this).val();
        //alert(value);
        
        $.ajax({
            
            url: "rankdash.php",
            type: "POST",
            data: 'request=' +value;
            beforeSend:function(){
                $('.container').html("<span>Working....</span>");
            },
            success:function(){
                $('.container').html(data);
            }
        })
    });
  });
  </script>
</body>
</html>
