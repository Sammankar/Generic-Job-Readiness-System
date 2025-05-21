<?php
include  'studentheader.php';
?>
<?php
include 'connection.php';
$sql= "SELECT `studymaterial_id`, tbl_studymaterial.college_id, tbl_user.users_id, tbl_program.program_name, tbl_specialization.specialization_name, tbl_studymaterial.semester_id, tbl_subject.subject_name,tbl_subject.subject_code ,tbl_subject.subject_credits,tbl_document.type, `topic_name`, `file`, `upload_time` FROM tbl_studymaterial,tbl_program,tbl_document,tbl_specialization,tbl_subject,tbl_user WHERE tbl_studymaterial.program_id=tbl_program.program_id AND tbl_studymaterial.document_id=tbl_document.document_id AND tbl_studymaterial.specialization_id=tbl_specialization.specialization_id AND tbl_studymaterial.subject_id=tbl_subject.subject_id AND tbl_studymaterial.users_id=tbl_user.users_id AND studymaterial_id='" . $_GET['studymaterial_id'] . "'";
$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_array($result);
?>
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-20">
            <div class="bg-white mt-4 mr-2 ml-2 lg:ml-0">
                <form class="p-10 bg-white rounded-md shadow-md" method="" enctype="multipart/form-data">
                    <p class="text-xl text-gray-800 font-medium pb-4">Details</p>
                                  <div class="mt-4">
                               
                                    <span class="text-x text-gray-600 w-24">Program Name: </span>
                                    <span class="text-gray-700"><?php echo $row['program_name']; ?></span>
                            
                            
                                </div>
                                <div class="mt-4">
                               
                               
                                    <span class="text-x text-gray-600 w-24">Specialization Name: </span>
                                    <span class="text-gray-700"><?php echo $row['specialization_name']; ?></span>
                            
                            
                                </div>
                                <div class="mt-4">
                               
                               
                                    <span class="text-x text-gray-600 w-24">Semester: </span>
                                    <span class="text-gray-700"><?php echo $row['semester_id']; ?></span>
                            
                            
                                </div>
                                <div class="mt-4">
                               
                               
                                    <span class="text-x text-gray-600 w-24">Subject Name:</span>
                                    <span class="text-gray-700"><?php echo $row['subject_name']; ?></span>
                            
                            
                                </div>
            </form>
            </div>
            
            
            <div class="bg-white mt-4 mr-2 ml-2 lg:ml-0">
                <form class="p-10 bg-white rounded-md shadow-md" method="" enctype="multipart/form-data">
                    <p class="text-xl text-gray-800 font-medium pb-4">Video Details</p>
                <div class="mt-4">
                               
                            <span class="text-x text-gray-900 w-24">Topic Name: </span>
                            <span class="text-gray-700"><?php echo $row['topic_name']; ?></span>
                            
                            
                </div>
                <div class="video ml-8 mt-5">
                    <video id="video"><source src="../images/studymaterialv/<?php echo $row[file]?>" type="video/mp4"/>
                </div>
            </form>
            </div>
            
            
            
            </main>
        </div>
    </div>
   <style>
       
       .video {
  align-items: center;
  width: 980px;
  height: 600px;
}

#fluid_video_wrapper_video {
  width: 100% !important;
  height: 100% !important;
}
   </style>
   <script src="https://cdn.fluidplayer.com/v3/current/fluidplayer.min.js"></script>
   
    <script>
        
        
var myFP = fluidPlayer("video", {
  layoutControls: {
    controlBar: {
      autoHideTimeout: 3,
      animated: true,
      autoHide: true,
    },
    htmlOnPauseBlock: {
      html: null,
      height: null,
      width: null,
    },
    autoPlay: false,
    mute: true,
    allowTheatre: true,
    playPauseAnimation: true,
    playbackRateEnabled: true,
    allowDownload: true,
    playButtonShowing: true,
    fillToContainer: false,
    posterImage: "poster.jpg",
  },
  vastOptions: {
    adList: [],
    adCTAText: false,
    adCTATextPosition: "",
  },
});
    </script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>