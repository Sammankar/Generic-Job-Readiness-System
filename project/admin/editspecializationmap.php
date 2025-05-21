<?php
include "adminheader.php";
?>
<?php
include_once 'connection.php';
include_once 'fetchusersid.php';
$result = mysqli_query($conn,"SELECT * FROM `specializations_mapping` WHERE smap_id='" . $_GET['smap_id'] . "'");
if(mysqli_num_rows($result) > 0){
    $row= mysqli_fetch_array($result);
}else{
    echo "specialization map not found";
}
?>
<?php
include_once 'connection.php';
if(isset($_POST['submit'])){
    $program=$_POST['program'];
    $specialization=$_POST['specialization'];

    
    $sql = "UPDATE `specializations_mapping` SET  `program_id` = '$program', `specialization_id` = '$specialization' WHERE smap_id='" . $_GET['smap_id'] . "'";
    $result1=mysqli_query($conn, $sql);
    if($result){
        echo "Spcialization Map Details Update Succesfully";
    }else{
        echo "Failed";
    }
    
}
?>
<div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post">
                                <p class="text-xl text-gray-800 font-medium pb-4">Edit Specialization Details</p><?php if(isset($message)) { echo $message; } ?>
                                <input type="hidden" name="smap_id" class="txtField" value="<?php echo $row['smap_id']; ?>">
                                <div class="mt-4">

                                        <label class="text-sm text-gray-600" for="email">Select Program</label>
                                        <select name="program" data-te-select-init class="px-2 py-2 rounded-md w-full mt-1 form-select text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md">
                                            <option selected>Select Program</option>
                                            <?php
                                                include ('connection.php');
                                                $program  = mysqli_query($conn, "SELECT `program_id`, `program_name` FROM `tbl_program` WHERE college_id= $college_id");
                                                if(mysqli_num_rows($program)> 0) {  
                                                foreach($program as $p){
                                                ?>
                                                <option value="<?php echo $p['program_id']?>" <?= $row['program_id']== $p['program_id']?'selected':''?>  ><?php echo $p['program_name']?></option>
                                                <?php
                                                }
                                                    
                                                }else{
                                                    echo "No Programs are Selected While Mapping Specialization";
                                                }
                                                ?>
                
                                        </select>
                                    </div>
                                <div class="mt-4">

                                        <label class="text-sm text-gray-600" for="email">Select Specialization</label>
                                        <select name="semester" data-te-select-init class="px-2 py-2 rounded-md w-full mt-1 form-select text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md">
                                            <option selected>Select Specialization</option>
                                            <?php
                                                    include ('connection.php');
                                                    $specialization = mysqli_query($conn, "SELECT specialization_id, specialization_name FROM tbl_specialization WHERE college_id='$college_id'");
                                                    if(mysqli_num_rows($specialization)> 0) {  
                                                    foreach($specialization as $p){
                                                    ?>
                                                    <option value="<?php echo $p['specialization_id']?>" <?= $row['specialization_id']== $p['specialization_id']?'selected':''?>  ><?php echo $p['specialization_name']?></option>
                                                    <?php
                                                    }
                                                        
                                                    }else{
                                                        echo "No Specilization are Selected While Mapping Specialization";
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Edit Specialization Map" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
                                </div>
                            </form>
                        </div>
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