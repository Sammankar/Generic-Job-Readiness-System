<?php
include  'facultyheader.php';
?>
<?php
include 'connection.php';
     
?>
  <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-20">
                
                
    
                <div class="flex flex-wrap lg:flex-row overflow-auto">
                    <div class="w-full lg:w-1/4 pr-0 lg:pr-2 rounded-md m-2 lg:m-0 lg:mt-2">
                        <a href="uploadstudymaterial.php" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>
                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">Video-File <br> Only these file types are allowed</p>
                                </div>
                            </div>

                            <div class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-10 lg:mt-14">
                                <p class="font-medium sm:text-lg">Click to upload Video File Here</p>

                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 transition group-hover:translate-x-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                                />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="w-full lg:w-1/4 pr-0 lg:pr-2 rounded-md m-5 lg:m-0 lg:mt-2">
                        <a href="uploadstudymaterial1.php" class="group flex flex-col justify-between rounded-sm bg-white p-4 shadow-md transition-shadow hover:shadow-lg sm:p-6 lg:p-8">
                            <div>
 
                                <div class="mt-4 border-t-2 border-gray-100 pt-4">
                                <p class="text-sm font-medium uppercase text-gray-700">Document File  <br> Only These file types are allowed</p>
                                </div>
                            </div>

                            <div class="mt-8 inline-flex items-center gap-2 text-indigo-600 sm:mt-10 lg:mt-14">
                                <p class="font-medium sm:text-lg">Click to upload Video File Here</p>

                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 transition group-hover:translate-x-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                                />
                                </svg>
                            </div>
                        </a>
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