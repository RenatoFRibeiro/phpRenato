<?php

require_once(__DIR__ . '/vendor/autoload.php');
/*
$apiInstance = new Swagger\Client\Api\EmployeesApiControllerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body_limit = 56; // int | The amount of employees returned
$page_limit = 56; // int | The pages to  return employees info

try {
    $result = $apiInstance->employeesGet($body_limit, $page_limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeesApiControllerApi->employeesGet: ', $e->getMessage(), PHP_EOL;
}
*/
// define variables and set to empty values
$nameErr = $idErr = $titleErr = "";
$name = $id = $title = "";
$apiInstance = new Swagger\Client\Api\EmployeesApiControllerApi(new GuzzleHttp\Client());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name =$_POST["name"];
  }
  if (empty($_POST["title"])) {
    $titleErr = "Title is required";
  } else {
    $title = $_POST["title"];
  }
  if (empty($_POST["id"])) {
    $idErr = "ID is required";
  } else {
    $id = $_POST["id"];
  }



  $body = new \Swagger\Client\Model\Employee(); // \Swagger\Client\Model\Employee | body

  $body->setEmployeeName($name);
  $body->setEmployeeTitle($title);
  $body->setId($id);


 
try {
  $emps = $apiInstance->employeesGet();
  $apiInstance->employeesPost($body);

  $emp = $apiInstance->employeesIdGet($id);
  echo "ID: " . $emp->getID();
  echo "<br> Name: " . $emp->getEmployeeName();
  echo "<br> Title: " . $emp->getEmployeeTitle();

} catch (Exception $e) {
    echo 'Exception when calling EmployeesApiControllerApi->employeesPost: ', $e->getMessage(), PHP_EOL;
}


/*
$e = array('employee_name' => $name, 'employee_title' => $title, 'id' => $id);
$emp = new \Swagger\Client\Model\Employee();
$api = new Swagger\Client\Api\EmployeesApiControllerApi(new GuzzleHttp\Client());
$api->employeesPost($emp);
*/
}

/*function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}*/

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Renato Ribeiro">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Employees API</title>
</head>

<body>
  <h1>Employees API</h1>
  <div id="buttondiv">
    <button class="button topbtn">Add Employee</button>
    <button class="button topbtn">Delete Employee</button>
    <button class="button topbtn">Get Employee</button>
    <button class="button topbtn">Edit Employee</button>
    <button class="button topbtn">List Employees</button>
  </div>
  <div id="boarddiv">
    <p style="text-align: center;">Board:</p>
    <div id="addoption">
      <p>Add Option</p>
      <form method="post" action="index.php">
        Employee ID:
        <input type="number" name="id" placeholder="ID">
        <br>
        Employee Name:
        <input type="text" name="name" placeholder="NAME">
        <br>
        Employee Title:
        <input type="text" name="title" placeholder="TITLE">
        <br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
    <br><br><br>
    <div id="deleteoption">
      <p>Delete Option</p>
      <form action="">
        Employee ID:
        <input type="text" name="" value="">
        <br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
    <br><br><br>
    <div id="getoption">
      <p>Get Option</p>
      <form action="">
        Employee ID:
        <input type="number" name="id" value="ID">
        <span class="error"><?php echo $idErr; ?></span>
        <br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
    <br><br><br>
    <div id="listoption">
      <p>List Option</p>
      <?php
      require_once(__DIR__ . '/vendor/autoload.php');
      $body_limit = 56; // int | The amount of employees returned
      $page_limit = 56; // int | The pages to  return employees info
      
      try {
          $result = $apiInstance->employeesGet($body_limit, $page_limit);
          print_r($result);
      } catch (Exception $e) {
          echo 'Exception when calling EmployeesApiControllerApi->employeesGet: ', $e->getMessage(), PHP_EOL;
      }
      ?>
    </div>
    <br><br><br>
    <div id="editoption">
      <p>Edit Option</p>
      <form method="post" action="index.php">
        Employee ID:
        <input type="number" name="id" placeholder="ID">
        <br>
        Employee Name:
        <input type="text" name="employee name" placeholder=" NAME">
        <br>
        Employee Title:
        <input type="text" name="employee title" placeholder="TITLE">
        <br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
  </script>

</body>

</html>