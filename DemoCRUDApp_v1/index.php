<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "db_clients";

  $connection = new mysqli($servername, $username, $password, $dbName);

  if ($connection -> connect_error) {
    die("Connection error: " . $connection->connect_error);
  } else {
    $sql = "SELECT Id, Name, Email, Phone, Address, DateCreated FROM clients";
    $result = $connection->query($sql);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Test CRUD App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="header p-5">
      <div class="text-center">
        <h1>All Clients</h1>
      </div>
    </div>

    <div class="main p-5">
      <div class="add_btn">
        <button class="btn btn-primary">
          <a href="/PHPs/demoPostMysql2/create.php" class="text-white">Add Client</a>
        </button>
      </div>

      <div class="render">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">DateCreated</th>
      <th scope="col">Handle Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if($result -> num_rows > 0){
        while ($row = $result->fetch_assoc()) {
          echo "
          <tr>
            <th scope='row'>$row[Id]</th>
            <td>$row[Name]</td>
            <td>$row[Email]</td>
            <td>$row[Phone]</td>
            <td>$row[Address]</td>
            <td>$row[DateCreated]</td>
            <td>
              <button class='btn btn-success'>
                <a href='/PHPs/demoPostMysql2/update.php?id=$row[Id]' class='text-white'>Update</a>
              </button>

              <button class='btn btn-danger'>
                <a href='/PHPs/demoPostMysql2/delete.php?id=$row[Id]' class='text-white'>Delete</a>
              </button>
            </td>
          </tr>
          ";
        }
      }else{
        echo "0 result returned";
      }
    ?>
    
  </tbody>
</table>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>