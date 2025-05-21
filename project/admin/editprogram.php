<?php
include "adminheader.php";
?>
<?php
include_once 'connection.php';
$result = mysqli_query($conn,"SELECT * FROM tbl_program WHERE program_id='" . $_GET['program_id'] . "'");
if(mysqli_num_rows($result) > 0){
    $row= mysqli_fetch_array($result);
}else{
    echo "program not found";
}
?>
<?php
include_once 'connection.php';
if(isset($_POST['submit'])){
    $program_name=$_POST['program_name'];
    $program_description=$_POST['program_description'];
    $year=$_POST['year'];
    $semester=$_POST['semester'];
    
    $sql = "UPDATE `tbl_program` SET  `program_name` = '$program_name', `program_description` = '$program_description', `year_id` = '$year', `semester_id` = '$semester' WHERE program_id='" . $_GET['program_id'] . "'";
    $result1=mysqli_query($conn, $sql);
    if($result1){
        echo "Program Details Update Succesfully";
       header("location: viewprogram.php");
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
                                <p class="text-xl text-gray-800 font-medium pb-4">Edit Program Details</p><?php if(isset($message)) { echo $message; } ?>
                                <input type="hidden" name="program_id" class="txtField" value="<?php echo $row['program_id']; ?>">
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="name">Program Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="program_name" name="program_name" type="text" required="" placeholder="Program name" aria-label="Name" value="<?php echo $row['program_name']; ?>">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Program Description</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="program_description" name="program_description" type="text" required="" placeholder="Program Description" aria-label="Name" value="<?php echo $row['program_description']; ?>">
                                </div>
                                <div class="mt-4">

                                        <label class="text-sm text-gray-600" for="email">Years</label>
                                        <select name="year" data-te-select-init class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md">
                                            <option selected>Select Years</option>
                                            <?php
                                                include ('connection.php');
                                                $year  = mysqli_query($conn, "SELECT `year_id`, `years` FROM `years`");
                                                if(mysqli_num_rows($year)> 0) {  
                                                foreach($year as $p){
                                                ?>
                                                <option value="<?php echo $p['year_id']?>" <?= $row['year_id']== $p['year_id']?'selected':''?>  ><?php echo $p['years']?></option>
                                                <?php
                                                }
                                                    
                                                }else{
                                                    echo "No Years are Selected While Adding Programs";
                                                }
                                                ?>
                
                                        </select>
                                    </div>
                                <div class="mt-4">

                                        <label class="text-sm text-gray-600" for="email">Semesters</label>
                                        <select name="semester" data-te-select-init class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md">
                                            <option selected>Select Program</option>
                                            <?php
                                                include ('connection.php');
                                                $semester  = mysqli_query($conn, "SELECT `semester_id`, `semesters` FROM `tbl_semester`");
                                                if(mysqli_num_rows($semester)> 0) {  
                                                foreach($semester as $s){
                                                ?>
                                                <option value="<?php echo $s['semester_id']?>" <?= $row['semester_id']== $s['semester_id']?'selected':''?>  ><?php echo $s['semesters']?></option>
                                                <?php
                                                }
                                                    
                                                }else{
                                                    echo "No Semesters are Selected While Adding Programs";
                                                }
                                                ?>
                                        </select>
                                    </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Edit Program" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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