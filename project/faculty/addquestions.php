<?php
include "facultyheader.php";
?>
<?php
include "connection.php";
$n=$_GET['n'];
$title=$_GET['title'];
$subject_id=$_GET['subject_id'];

$sql = "SELECT tbl_subject.subject_id,tbl_subject.subject_name FROM tbl_subject WHERE subject_id=$subject_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);



if(isset($_SESSION['submit'])){
$ch=4;

for($i=1;$i<=$n;$i++)
{
$qid=uniqid();
$qns=$_POST['qns'.$i];
$q3=mysqli_query($conn,"INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
$oaid=uniqid();
$obid=uniqid();
$ocid=uniqid();
$odid=uniqid();
$a=$_POST[$i.'1'];
$b=$_POST[$i.'2'];
$c=$_POST[$i.'3'];
$d=$_POST[$i.'4'];
$qa=mysqli_query($conn,"INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
$qb=mysqli_query($conn,"INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
$qc=mysqli_query($conn,"INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
$qd=mysqli_query($conn,"INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
$e=$_POST['ans'.$i];
switch($e)
{
case 'a':
$ansid=$oaid;
break;
case 'b':
$ansid=$obid;
break;
case 'c':
$ansid=$ocid;
break;
case 'd':
$ansid=$odid;
break;
default:
$ansid=$oaid;
}


$qans=mysqli_query($con,"INSERT INTO answer VALUES  ('$qid','$ansid')");

 }
header("location:facultydashboard.php?");
}



?>
<div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <main class="w-full h-full flex items-center justify-center">
            <div class="w-4/6 mt-6 pl-0 lg:pl-2">
                        <div class="leading-loose">
                                                          <div class="">

                                    <span class="text-sm text-gray-600 w-24 ml-25">Subject Name:</span>
                                    <span class="text-gray-700 ml-25"><?php echo $row['subject_name']; ?></span>
                                </div>                                                              
                                  <div class="">
                               
                                    <span class="text-sm text-gray-600 w-24">Topic Name: </span>
                                    <span class="text-gray-700"><?php echo $title; ?></span>
                                </div>
                                
                                <form class="p-10 bg-white rounded-md shadow-md" method="post">
                        <?php
                        for($i=1;$i<=$n;$i++){
                            echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br/>
                            
                                <p class="text-xl text-gray-800 font-medium pb-4">Add Quiz</p>
   

                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Question'.$i.'</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md"  id="qns'.$i.'" name="qns'.$i.'" type="text" required="" placeholder="Enter question '.$i.' here..." aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Option 1'.$i.'</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="1'.$i.'" name="1'.$i.'" type="text" required="" placeholder="Enter option a" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Option 2'.$i.'</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="2'.$i.'" name="2'.$i.'" type="text" required="" placeholder="Enter option b" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Option 3'.$i.'</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="3'.$i.'" name="3'.$i.'" type="text" required="" placeholder="Enter option c" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Option 4'.$i.'</label>
                                    <input class="w-full px-2 py-1 mt-1 text-gray-700 bg-gray-200 rounded-md" id="4'.$i.'" name="4'.$i.'" type="text" required="" placeholder="Enter option d" aria-label="Name">
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm text-gray-600" for="emial">Tag To search</label>
                                    <select id="ans'.$i.'" name="ans'.$i.'" data-te-select-init class="px-2 py-2 rounded-md w-full mt-1 text-gray-500 text-md w-full px-2 py-1 mt-1 text-gray-700 rounded-md">
                                             <option value="a">Select answer for question '.$i.'</option>
                                                  <option value="a">option a</option>
                                                  <option value="b">option b</option>
                                                  <option value="c">option c</option>
                                                  <option value="d">option d</option> </select><br /><br />
                                        </select>
                                </div>';
                    }
                    echo' <div class="mt-6">
                                    <input name="submit" type="submit" value="submit" class="relative justify-center rounded-md bg-indigo-600 py-1 px-3 text-md font-semibold text-white hover:bg-indigo-500 transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> 
                                </div>';
                                 ?>
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