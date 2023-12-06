<?php 
    //require'connect.php';  
    $severname="localhost";
    $username="root";
    $password="";
    $database="notes";
    $conn=mysqli_connect($severname,$username,$password,$database);
    if(!$conn){
        die("connection fail due to this err". mysqli_error());
    }
    else{
        echo"connection successful";
    }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crud App</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PHP CRUD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <div class="container my-4">
        <h1>Add a Note</h1>
        <form action="/crud/index.php" method="post" >
            <div class="mb-3">
              <label for="title" class="form-label">Note Title</label>
              <input type="text" class="form-control" name="title" id="title" >
            </div>
            <div class="mb-3">
              <label for="desc" class="form-label">Note Description</label>
              <textarea class="form-control" rows="10" cols="30" name="desc" id="desc" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
          </form>
      </div>
     
      <div class="container">
        <?php 
        echo $_SERVER['REQUEST_METHOD'];
         if($_SERVER['REQUEST_METHOD']=='POST'){
           $title=$_POST['title'];
           $description=$_POST['desc'];
           echo $title;
           $sql="INSERT INTO `notes` ( `title`, `description`, `tstamp`) VALUES ( '$title', 'i want to traditional clothes', current_timestamp())";
           $res=mysqli_query($conn,$sql);
           iF($res){
            echo"record inserted successfully";
           }
           else{
            echo"record not inserted";
           }
          }
         //
       
        //  $sql="SELECT * FROM `notes`";
        //  $res=mysqli_query($conn,$sql);
        //  while($row=mysqli_fetch_assoc($res)){
        //   echo $row['sno']."title".$row['title'];
        //  }
        //   ?>
          <table class="table">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql="SELECT * FROM `notes`";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res)){
     echo" <tr>
      <th scope='row'>".$row['sno']."</th>
      <td>".$row['title']."</td>
      <td>".$row['description']."</td>
      <td>Actions</td>
    </tr>";
    }
    ?>
    </tbody>
</table>
      </div>
    
      
      <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>