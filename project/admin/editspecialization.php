<?php
include "adminheader.php";
?>
<?php
include_once 'connection.php';
$result = mysqli_query($conn,"SELECT * FROM tbl_specialization WHERE specialization_id='" . $_GET['specialization_id'] . "'");
if(mysqli_num_rows($result) > 0){
    $row= mysqli_fetch_array($result);
}else{
    echo "specialization not found";
}
?>
<?php
include_once 'connection.php';
if(isset($_POST['submit'])){
    $specialization_name=$_POST['specialization_name'];
    $specialization_description=$_POST['specialization_description'];
    $specialization_credits=$_POST['specialization_credits'];
    
    $sql = "UPDATE `tbl_specialization` SET  `specialization_name` = '$specialization_name', `specialization_description` = '$specialization_description', `specialization_credits` = '$specialization_credits' WHERE specialization_id='" . $_GET['specialization_id'] . "'";
    $result1=mysqli_query($conn, $sql);
    if($result){
        header("Location: viewspecialization.php");
        //echo "Specialization Details Update Succesfully";
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
                                <input type="hidden" name="specialization_id" class="txtField" value="<?php echo $row['specialization_id']; ?>">
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="name">Specialization Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="specialization_name" name="specialization_name" type="text" required="" placeholder="Program name" aria-label="Name" value="<?php echo $row['specialization_name']; ?>">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Specialization Description</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="specialization_description" name="specialization_description" type="text" required="" placeholder="Program Description" aria-label="Name" value="<?php echo $row['specialization_description']; ?>">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Specialization Credits</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="specialization_credits" name="specialization_credits" type="text" required="" placeholder="Specialization Credits" aria-label="Name" value="<?php echo $row['specialization_credits']; ?>">
                                </div>
                                <div class="mt-6">
                                    <input name="submit" type="submit" value="Edit Specialization" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
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