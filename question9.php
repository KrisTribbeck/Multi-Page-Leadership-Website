<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!-- Optimize code for mobile devices first and then scale up components as necessary using CSS media queries. -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <!-- Linking HTML to CSS -->
  <link rel="stylesheet" href="assessment_two.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Assessment Two</title>
</head>

<body>
  <?php
  include_once('inc_nav.php');
  ?>
  <!--Comment out the nav bar later and change the extension to .php when using PHP.
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-item p-2 nav-link active" aria-current="page" href="index.html">Home</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Question 1-9
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="question1.html">Question 1</a></li>
              <li><a class="dropdown-item" href="question2.html">Question 2 </a></li>
              <li><a class="dropdown-item" href="question3.html">Question 3</a></li>
              <li><a class="dropdown-item" href="question4.html">Question 4</a></li>
              <li><a class="dropdown-item" href="question5.html">Question 5</a></li>
              <li><a class="dropdown-item" href="question6.html">Question 6</a></li>
              <li><a class="dropdown-item" href="question7.html">Question 7</a></li>
              <li><a class="dropdown-item" href="question8.html">Question 8</a></li>
              <li><a class="dropdown-item" href="question9.html">Question 9</a></li>
            </ul>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-item p-2 nav-link" href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  Finish here -->

  <?php
  session_start();
  if (isset($_SESSION['message'])) {
  ?>
    <div class="alert alert-info text-center" style="margin-top:20px;">
      <?php echo $_SESSION['message']; ?>
    </div>
  <?php

    unset($_SESSION['message']);
  }
  ?>
  <div class="table-responsive-md">
    <!-- div class="container-fluid" id="containerStyle" -->
    <table class="table table-bordered" style="margin-top:20px;">
      <thead class="table-primary">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Question</th>
          <th scope="col">Description</th>
          <th scope="col">Answer</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Include our connection.
        include_once('connection.php');

        $database = new Connection();
        $db = $database->open();
        try {
          $sql = 'SELECT * FROM Resource WHERE Id = 9';
          foreach ($db->query($sql) as $row) {
        ?>
            <tr>
              <th scope="row"><?php echo $row['Id']; ?></th>
              <td><?php echo $row['Question']; ?></td>
              <td><?php echo $row['Description']; ?></td>
              <td><?php echo $row['Answer']; ?></td>
            </tr>
        <?php
          }
        } catch (PDOException $e) {
          echo "There is some problem in connection: " . $e->getMessage();
        }
        // Close connection.
        $database->close();
        ?>
      </tbody>
    </table>
  </div>
  <footer>
    <div class="row">
      <div class="col-md-6 ms-2">
        <p>Copyright &copy; Kristiin Tribbeck </p>
      </div>
    </div>
  </footer>
</body>