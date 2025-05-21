<?php
session_start();
include 'connection.php'
?>
<?php
include  'facultyheader.php';
?>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                
                
                <div class="bg-white overflow-auto mt-4 mr-2 ml-2 lg:ml-0">

                 <h1 class="mt-4 text-indigo-500 ml-2 text-2xl"><i class="fa fa-list text-indigo-500 mr-2"></i>Subjects List</h1>
                        <table class="w-full leading-normal">
                            <tbody class>
                            <tr class="table-row">
                                <?php
                                    include('subjectsdash.php');
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
