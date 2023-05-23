<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Project</title>
    <meta property="og:title" content="Project" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }

      .hover_username:hover{
        background:#eaeaea
      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font"
    />
    <!--This is the head section-->
    <!-- <style> ... </style> -->
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <div>
      <link href="./admin.css" rel="stylesheet" />

      <div class="page11112-container">
        <div class="page11112-container01">
          <span class="page11112-text">
            Student Achievement Management System
          </span>
        </div>
        <div class="page11112-container02">
          <div class="page11112-container03">
            <span onclick="location.href='./login.html'" class="page11112-text01">Logout</span>
          </div>
        </div>
        <div class="page11112-container04">
          <div class="page11112-container05">
            <div class="page11112-container06">
              <span class="page11112-text02">Students</span>
            </div>
            <div class="page11112-container07">
              <span class="page11112-text03">List of all students</span>
            </div>
            <button onclick="location.href='./create.html'" class="page11112-button button">Add New Students</button>
            
            
            
           
            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakshi";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE types='Student'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<div onclick=location.href="./admin.php?id='.$row['id'].'&name='.$row['username'].'" class="page11112-container08 hover_username">
          <div class="page11112-container09"></div>
          <span class="page11112-text04">'.$row['username'].'</span>
        </div>';
  }
} else {
  echo "Not Student Added Yet";
}

mysqli_close($conn);
?>

            
          </div>
          <div class="page11112-container14">
                          
   


              
   <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakshi";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])){
  $sql = "SELECT * FROM uploads WHERE student_id=".$_GET['id']."";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
 
  echo '  <div class="page11112-container15">
  <span class="page11112-text07">
    <span>Student name :</span>
    <span class="page11112-text09">&nbsp;</span>
    <span class="page11112-text10">'.$_GET["name"].'</span>
  </span>
</div>';
 
  while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="page11112-container16">
    <span class="page11112-text11">
      <span>Achievement name :</span>
      <span class="page11112-text13">&nbsp;</span>
      <span class="page11112-text14">'.$row['name'].'</span>
      <span>Category Achievement:</span>
      <span class="page11112-text13">&nbsp;</span>
      <span class="page11112-text14">'.$row['category'].'</span>
      <span>Date of Achievement :</span>
      <span class="page11112-text13">&nbsp;</span>
      <span class="page11112-text14">'.$row['date'].'</span>
    </span>
    <button onclick="location.href='."'view.php?file=".$row['path']."'".'" class="page11112-button1 button">View file</button>
  </div>';
  }
} else {
  echo "Student not Added anything";
}
}else{
  echo "Select any student to view";
}

mysqli_close($conn);
?>
   
            
        
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
