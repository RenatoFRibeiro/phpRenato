<?php
require_once(__DIR__ . '/vendor/autoload.php');
 
include("lib/Api/EmployeesApiControllerApi.php");
include("lib/Model/Employee.php");
// define variables and set to empty values
$nameErr = $idErr = $titleErr = "";
$name = $id = $title = "";
$apiInstance = new Swagger\Client\Api\EmployeesApiControllerApi(new GuzzleHttp\Client());
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $action = $_POST['action'];

  if($action == "get"){
    //get
    if (empty($_POST["id"])) {
      $idErr = "ID is required";
    } else {
      $id = $_POST["id"];
    }
    try {
        $result = $apiInstance->employeesIdGet($id);
          ?><b>Name:</b> <?php print_r($result->getEmployeeName());?>&nbsp;&nbsp;&nbsp;<?php
          ?><b>Title:</b> <?php print_r($result->getEmployeeTitle());?>&nbsp;&nbsp;&nbsp;<?php
          ?><b>Id:</b> <?php print_r($id);?><?php

    } catch (Exception $e) {
        echo 'Exception when calling EmployeesApiControllerApi->employeesIdGet: ', $e->getMessage(), PHP_EOL;
    }

  }else  if ($action == "add"){
    // adiciona
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
      $body = new \Swagger\Client\Model\Employee();
      $body->setEmployeeName($name);
      $body->setEmployeeTitle($title);
      $body->setId($id);
    try {
      $apiInstance->employeesPost($body);
      $emp = $apiInstance->employeesIdGet($id);
      echo "ID: " . $emp->getID();
    } catch (Exception $e) {
      echo 'Exception when calling EmployeesApiControllerApi->employeesPost: ', $e->getMessage(), PHP_EOL;
    }
  } else if ($action == "del")
  {
    if (empty($_POST["id"])) {
      $idErr = "ID is required";
    } else {
      $id = $_POST["id"];
    }
      echo "ID to delete: " . $id;
    try {
      $result = $apiInstance->employeesIdDelete($id);
      print_r($result);
    } catch (Exception $e) {
      echo 'Exception when calling EmployeesApiControllerApi->employeesIdDelete: ', $e->getMessage(), PHP_EOL;
    }
  }else if ($action == "edit"){
    //edit
    if (empty($_POST["id"])) {
      $idErr = "ID is required";
    } else {
      $id = $_POST["id"];
    }
    try {
    $result = $apiInstance->employeesIdDelete($id);
      print_r($result);
    } catch (Exception $e) {
      echo 'Exception when calling EmployeesApiControllerApi->employeesIdDelete: ', $e->getMessage(), PHP_EOL;
    }
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
    $body1 = new \Swagger\Client\Model\Employee();
    $body1->setEmployeeName($name);
    $body1->setEmployeeTitle($title);
    $body1->setId($id);
    try {
      $apiInstance->employeesPost($body1);
      $emp1 = $apiInstance->employeesIdGet($id);
      echo "ID: " . $emp1->getID();
    } catch (Exception $e) {
      echo 'Exception when calling EmployeesApiControllerApi->employeesPost: ', $e->getMessage(), PHP_EOL;
  }
}
 
}
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
  <div style="width: 100%; overflow: hidden;">
    <div id="left">
      <div id="buttondiv">
        <button class="button topbtn" onclick="addoptionFunc()">Add Employee</button>
        <button class="button topbtn" onclick="deleteoptionFunc()">Delete Employee</button>
        <button class="button topbtn" onclick="getoptionFunc()">Get Employee</button>
        <button class="button topbtn" onclick="editoptionFunc()">Edit Employee</button>
      </div>
      <div id="boarddiv">
        <div id="addoption" class="hidenDiv">
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
            <input type="hidden" name="action" value="add"  />
            <input type="submit" value="Submit">
          </form>
        </div>
        <br><br><br>
        <div id="deleteoption" class="hidenDiv">
          <p>Delete Option</p>
          <form method="post" action="index.php">
            <label> ID: </label>
            <input type="number" name="id" placeholder="ID">
            <span class="error"><?php echo $idErr; ?></span>
            <br><br>
            <input type="hidden" name="action" value="del"  />
            <input type="submit" name="submit" value="Submit">
          </form>
        </div>
        <br><br><br>
        <div id="getoption" class="hidenDiv">
          <p>Get Option</p>
          <form method="post" action="index.php">
            Employee ID:
            <input type="number" name="id" placeholder="ID">
            <span class="error"><?php echo $idErr; ?></span>
            <br><br>
            <input type="hidden" name="action" value="get"  />
            <input type="submit" name="submit" value="Submit">
          </form>
        </div>
        <br><br><br>
        <div id="editoption" class="hidenDiv">
          <p>Edit Option</p>
          <form method="post" action="index.php">
            Employee ID:
            <input type="number" name="id" placeholder="ID">
            <br>
            Employee Name:
            <input type="text" name="name" placeholder=" NAME">
            <br>
            Employee Title:
            <input type="text" name="title" placeholder="TITLE">
            <br><br>
            <input type="hidden" name="action" value="edit"  />
            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
    <div id="right">
      <div>
          <h2>Emplyee List</h2>
          <?php
          $body_limit = 56; // int | The amount of employees returned
          $page_limit = 2; // int | The pages to  return employees info

              $result = $apiInstance->employeesGet($body_limit, $page_limit);

              foreach ($result as list("id" => $idLis, "employee_name" => $nameLis, "employee_title" => $titleLis)) {
                echo "<li>Employee ID = $idLis ; Employee Name = $nameLis ; Employee Title = $titleLis\n\n</li>";
              }
          ?>
        </div>
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

  <script>
    var xpost = document.getElementById("addoption");
    var xdelete = document.getElementById("deleteoption");
    var xget = document.getElementById("getoption");
    var xedit = document.getElementById("editoption");

  function addoptionFunc() {
    if (xpost.style.display === "block") {
      xpost.style.display = "none";
    } else {
      xpost.style.display = "block";
      xdelete.style.display = "none";
      xget.style.display = "none";
      xedit.style.display = "none";

    }
  }
  function deleteoptionFunc() {
    if (xdelete.style.display === "block") {
      xdelete.style.display = "none";
    } else {
      xdelete.style.display = "block";
      xpost.style.display = "none";
      xget.style.display = "none";
      xedit.style.display = "none";
    }
  }
  function getoptionFunc() {
    if (xget.style.display === "block") {
      xget.style.display = "none";
    } else {
      xget.style.display = "block";
      xpost.style.display = "none";
      xdelete.style.display = "none";
      xedit.style.display = "none";
    }
  }
  function editoptionFunc() {
    if (xedit.style.display === "block") {
      xedit.style.display = "none";
    } else {
      xedit.style.display = "block";
      xpost.style.display = "none";
      xdelete.style.display = "none";
      xget.style.display = "none";
    }
  }
  </script>
</body>

</html>