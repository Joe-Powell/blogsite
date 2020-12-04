<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/hostYourReactProject.css">


<!-- <div class="image" alt='ReactHostinng'></div> -->
<h1 class='intro'>Host your<i class="fab fa-react"></i> React project on a shared hosting in five steps</h1><br>

<div class="containBlog">

<!-- <video width="320" height="240" controls>
  <source src="../images/renamed.mp4" type="video/mp4">
</video> -->


    
      <img src='../images/hostreact.PNG'   height="100px" alt='Some Text' /><br>
      <h4>First go to pckage.json </h4><br>
      <p> 
         In package.json add a homepage property with value.
         The value needs to be the websites domain name and as you can see the slash
         indicates which folder if it's a subdomin.
      </p>
      <img src='../images/runBuild.PNG'   width='200px' alt='Some Text' /><br> 
      <h4>Second go to the command line </h4><br>
      <p>
         In the command line make sure you ctrl c out of the app if it is running and go to the root folder.
         then simply type in npm run build then hit enter. this may take a few moments to run 
         then your build folder will be complete. go to next step.<br><br>
      </p>  
      <img src='../images/findBuild.PNG'  width="100px" alt='Some Text' /> 
      <img src='../images/selectBuild.PNG'  width="200px" alt='Some Text' /><br>
      <h4>Go to file explorer </h4><br>
      <p>     
         In file explorer, find that <b>build</b> folder which is inside the root folder of 
         your react project and go inside the build folder. Select all the files and folders 
         inside it by holding in the right click and hover over them. release the right click and select send to.
      </p>
      <img src='../images/sendToZip.PNG'  width="300px" alt='Some Text' /><br>
      <h4>Put the contents of you build folder into a zip file </h4><br>
      <p>
         Your going to need to export those files and folders you just highlighted with a zip folder
         so select send to compressed zip folder like the picture above shows. and then your ready to
         extract them into your shared hosting
      </p>
      <img src='../images/extractZip.PNG'  width="200px" alt='Some Text' /><br>
      <h4>Upload and extract the zip file into your hosting</h4><br>
      <p>
         Go to your hosting and find the folder you want to upload it to, choose upload,
         then pick that zip folder and upload it, right click
         on the zip thats been uploaded inside the host and select extract. 
      </p>

      
      
      


     
     
</div>









<?php include 'footerForBlogs.php'; ?>