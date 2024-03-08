<?php
// database connection code
$con = mysqli_connect('localhost', 'root', '', 'job');

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

if(isset($_POST['name'])) {
    // get the post records
    $name = $_POST['name'];
    $qualification = $_POST['qualifications'];
    $Address = $_POST['address'];
    $semester = $_POST['semester']; // Make sure this matches the name attribute in the HTML
    $cgpa = $_POST['cgpa'];
    $college = $_POST['college'];
    $experience = $_POST['experience'];
   
    $Hobbies = $_POST['hobbies'];
    $company1 = $_POST['company1'];

    // Check if the keys are set before accessing them to avoid undefined index warnings
    $company2 = isset($_POST['company2']) ? $_POST['company2'] : null;
    $company3 = isset($_POST['company3']) ? $_POST['company3'] : null;
    $company4 = isset($_POST['company4']) ? $_POST['company4'] : null;
    $status = "Pending";
    
    // database insert SQL code
    $sql = "INSERT INTO job.students(name, qualifications, Address, semester, cgpa, college, experience,  Hobbies, company1, company2, company3, company4, status) VALUES ('$name', '$qualification', '$Address', '$semester', '$cgpa', '$college', '$experience',  '$Hobbies', '$company1', '$company2', '$company3', '$company4', '$status')";

    // insert in database
    $rs = mysqli_query($con, $sql);
    if($rs) {
?>
        <html>
        <head>
            <title>Form Data</title>
            <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    form {
      text-align: center;
    }
    label {
      display: block;
      margin-bottom: 10px;
      color: #555;
    }
    input[type="text"] {
      width: 50%;
      align: center;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 15px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }.btn-4 {
  background-color: #4dccc6;
background-image: linear-gradient(315deg, #4dccc6 0%, #96e4df 74%);
  line-height: 42px;
  width: 20%;
  padding: 0;
  border: none;
}
.btn-4:hover{
  background-color: #89d8d3;
background-image: linear-gradient(315deg, #89d8d3 0%, #03c8a8 74%);
}
.btn-4 span {
  position: relative;
  display: block;
  width: 100%;
  height: 100%;
}
.btn-4:before,
.btn-4:after {
  position: absolute;
  content: "";
  right: 0;
  top: 0;
   box-shadow:  4px 4px 6px 0 rgba(255,255,255,.9),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.9),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
  transition: all 0.3s ease;
}
.btn-4:before {
  height: 0%;
  width: .1px;
}
.btn-4:after {
  width: 0%;
  height: .1px;
}
.btn-4:hover:before {
  height: 100%;
}
.btn-4:hover:after {
  width: 100%;
}
.btn-4 span:before,
.btn-4 span:after {
  position: absolute;
  content: "";
  left: 0;
  bottom: 0;
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.9),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.9),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
  transition: all 0.3s ease;
}
.btn-4 span:before {
  width: .1px;
  height: 20%;
}
.btn-4 span:after {
  width: 20%;
  height: .1px;
}
.btn-4 span:hover:before {
  height: 100%;
}
.btn-4 span:hover:after {
  width: 100%;
}

    input[type="submit"]:hover {
      background-color: #45a049;
    }
    .status {
      margin-top: 20px;
      text-align: center;
    }
    .status h2 {
      color: #333;
      margin-bottom: 10px;
    }
    .status p {
      color: #555;
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 10px 0;
    }

    nav ul {
      list-style: none;
      text-align: center;
    }

    nav ul li {
      display: inline;
      margin: 0 10px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      text-align: center;
    }

    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px 0;
    }    body {
      font-family: Arial, sans-serif;
    }
  </style>
        </head>
        <body>
        <header>
      <nav>
        <ul>
          <li><a href="./proj.html" onclick='location.href="./proj.html"'>Home</a></li>
          <li><a href="./New_Vacancies.html" onclick='location.href="./New_Vacancies.html"'>New Vacancies</a></li>
          <li><a href="#" onclick="showTab('Application_Status')">Application Status</a></li>
        </ul>
      </nav>
  </header>
            <h1> Record Stored Successfully </h1>
            <footer>
  <p>&copy; 2024 Job Application Portal</p>
</footer>
<script>
        </body>
        
        </html>
<?php
    } else {
        die("Error: " . mysqli_error($con));
    }
} else {
    echo "Are you a genuine visitor?";
}

// Close connection
mysqli_close($con);
?>
