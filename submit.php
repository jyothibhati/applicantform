<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $qualification = $_POST["qualification"];
  $age = $_POST["age"];
  $dob = $_POST["dob"];
  $mobile = $_POST["mobile"];
  $city = $_POST["city"];
  $address = $_POST["address"];
  $email = $_POST["email"];

  if (empty($name) || empty($gender) || empty($qualification) || empty($age) || empty($dob) || empty($mobile) || empty($city) || empty($address) || empty($email)) {
    echo "Please fill in all fields.";
    exit;
  }

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "test";

  $conn = new mysqli($hostname, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "CREATE TABLE IF NOT EXISTS applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(255) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    qualification VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    dob DATE NOT NULL,
    mobile VARCHAR(20) NOT NULL,
    city VARCHAR(50) NOT NULL,
    address TEXT NOT NULL,
    email VARCHAR(255) NOT NULL
  )";

  if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
    $conn->close();
    exit;
  }

  $checkColumnsExists = "SHOW COLUMNS FROM applicants";
  $result = $conn->query($checkColumnsExists);
  $existingColumns = array();
  while ($row = $result->fetch_assoc()) {
    $existingColumns[] = $row['Field'];
  }


  $missingColumns = array_diff(['mobile', 'city','address','name','email','age','dob','gender','qualification'], $existingColumns);
  foreach ($missingColumns as $column) {
    $alterTableSql = "ALTER TABLE applicants ADD COLUMN $column VARCHAR(255) NOT NULL";
    if ($conn->query($alterTableSql) === FALSE) {
      echo "Error adding $column column: " . $conn->error;
      $conn->close();
      exit;
    }
  }

  $stmt = $conn->prepare("INSERT INTO applicants (name, gender, qualification, age, dob, mobile, city, address, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssisssss", $name, $gender, $qualification, $age, $dob, $mobile, $city, $address, $email);

  if ($stmt->execute() === TRUE) {
    echo "Applicant information stored successfully.";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
