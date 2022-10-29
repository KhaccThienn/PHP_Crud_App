<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbName = "db_clients";

  $conn = new mysqli($servername, $username, $password, $dbName);

  $name = "";
  $email = "";
  $phone = "";
  $address = "";

  $errMessage = "";
  $succMessage = "";

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];

    do{
      if(empty($name) || empty($email) || empty($phone) || empty($address)){
        $errMessage = "All Fields are required";
        break;
      };
      
      $stmt = $conn->prepare("INSERT INTO clients(Name, Email, Phone, Address) VALUES (?,?,?,?)");

      $stmt -> bind_param('ssss', $name, $email, $phone, $address);
      $stmt -> execute();
      echo "<script type='text/javascript'>alert('Submit Successfully');</script>";
      $stmt -> close();
      $conn -> close();

      $name = "";
      $email = "";
      $phone = "";
      $address = "";

      header("location: /PHPs/demoPostMysql2/index.php");
      exit;
      $succMessage = "Succesfully";
    } while (false);
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container p-5">
      <div class="text-center">
        <h1>
          ADD NEW CLIENT
        </h1>
      </div>
      <?php 
        if(!empty($errMessage)){
          echo "
          <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>
              $errMessage
            </strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
            </button>
          </div>
        ";
        };

        if(!empty($succMessage)){
          echo "
          <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>
              $succMessage
            </strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
            </button>
          </div>
        ";
        };
        
      ?>
      <form method="POST" >
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="Name" class="form-control" autocomplete="off" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
          <label for="mail">Email</label>
          <input type="text" id="mail" name="Email" class="form-control" autocomplete="off" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" id="phone" name="Phone" class="form-control" autocomplete="off" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group">
          <label for="add">Address</label>
          <input type="text" id="add" name="Address" class="form-control" autocomplete="off" value="<?php echo $address; ?>">
        </div>

        <button class="btn btn-primary btn-block" type="submit">
          Submit
        </button>
        <a href="/PHPs/demoPostMysql2/index.php" class="btn btn-outline-dark">Cancel</a>

      </form>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>