<?php
include_once 'adminheader.php';
?>

<?php
include_once 'connection.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE tbl_subject set subject_id='" . $_POST['subject_id'] . "', subject_name='" . $_POST['subject_name'] . "', subject_code='" . $_POST['subject_code'] . "', subject_description='" . $_POST['subject_description'] . "' ,subject_credits='" . $_POST['subject_credits'] . "'WHERE subject_id='" . $_POST['subject_id'] . "'");
$message = "Record Modified Successfully";
header("location:viewsubject.php");
}
?>

<?php
include_once 'connection.php';
$result = mysqli_query($conn,"SELECT * FROM tbl_subject WHERE subject_id='" . $_GET['subject_id'] . "'");
$row= mysqli_fetch_array($result);
?>
        <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded-md shadow-md" method="post">
                                <p class="text-xl text-gray-800 font-medium pb-4">Add Subjects</p>
                                <div><?php if(isset($message)) { echo $message; } ?>
            </div>
                                <input type="hidden" name="subject_id" class="txtField" value="<?php echo
                        $row['subject_id']; ?>">
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Subject Name</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="subject_name" name="subject_name" type="text" required="" placeholder="Subject Name" aria-label="Name" value="<?php echo $row['subject_name'];?>">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Subject Code</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="subject_code" name="subject_code" type="text" required="" placeholder="Subject Descriptions" aria-label="Name" value="<?php echo $row['subject_code'];?>">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Subject Descriptions</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="subject_description" name="subject_description" type="text" required="" placeholder="Subject Descriptions" aria-label="Name" value="<?php echo $row['subject_description'];?>">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Subject Credits</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="subject_credits" name="subject_credits" type="text" required="" placeholder="Subject Credits" aria-label="Name" value="<?php echo $row['subject_credits'];?>">
                                </div>
                                <div class="mt-6">
                                    <button class="button button1 relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                                     
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