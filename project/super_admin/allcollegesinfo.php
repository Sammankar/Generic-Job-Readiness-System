<?php
session_start();
include 'connection.php'
?>
<?php
include 'header.php'
?>
        <div class="dash-content">
            <div class="activity">
                <div class="title">
                    <i class="uil uil-create-dashboard"></i>
                    <span class="text">Activity</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">Total Colleges</span>
                        <?php
                            require 'connection.php';
                        $query = "SELECT college_id FROM college_registration  ORDER BY college_id";  
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<h4>'.$row.'</h4>';
                    ?>
                    </div>
                </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-house-user"></i>
                    <span class="text">College List</span>
                </div>
                <div class="table-container">
                    <table class="stable" style="border:2px solid black">
                        <tbody class>
                            <tr class="table-row">
                                <?php
                                    include('collegeinfodash.php');
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
                	    const body = document.querySelector("body"),
                      modeToggle = body.querySelector(".mode-toggle");
                      sidebar = body.querySelector("nav");
                      sidebarToggle = body.querySelector(".sidebar-toggle");
                
                let getMode = localStorage.getItem("mode");
                if(getMode && getMode ==="dark"){
                    body.classList.toggle("dark");
                }
                
                let getStatus = localStorage.getItem("status");
                if(getStatus && getStatus ==="close"){
                    sidebar.classList.toggle("close");
                }
                
                modeToggle.addEventListener("click", () =>{
                    body.classList.toggle("dark");
                    if(body.classList.contains("dark")){
                        localStorage.setItem("mode", "dark");
                    }else{
                        localStorage.setItem("mode", "light");
                    }
                });
                
                sidebarToggle.addEventListener("click", () => {
                    sidebar.classList.toggle("close");
                    if(sidebar.classList.contains("close")){
                        localStorage.setItem("status", "close");
                    }else{
                        localStorage.setItem("status", "open");
                    }
                })
	</script>
    <link rel="stylesheet" href="dashboard.css">

</body>
</html>