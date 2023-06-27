<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Applicant Form</h2>
    <form action="submit.php" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required autocomplete="off">
      </div>

      <div class="form-group">
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label>
      </div>

      <div class="form-group">
        <label for="qualification">Qualification:</label>
        <select id="qualification" name="qualification" required>
          <option value="">Select</option>
          <option value="High School">High School</option>
          <option value="Bachelor's Degree">Bachelor's Degree</option>
          <option value="Master's Degree">Master's Degree</option>
        </select>
      </div>

      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required autocomplete="off">
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required autocomplete="off">
      </div>

      <div class="form-group">
        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" required autocomplete="off">
      </div>

      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required autocomplete="off">
      </div>

      <div class="form-group">
        <label for="address">Address:</label>
        <textarea id="address" name="address" required autocomplete="off"></textarea>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required autocomplete="off">
      </div>

      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div> 
</body>
</html>