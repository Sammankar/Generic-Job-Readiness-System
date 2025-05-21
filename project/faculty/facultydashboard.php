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
               }?>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                
                <div class="bg-white overflow-auto mt-4 mr-2 ml-2 lg:ml-0">

                
                        <table class="w-full leading-normal">
                            <tbody class>
                            <tr class="table-row">
                                <?php
                                    //include('quizdash.php');
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
</body>
</html>
