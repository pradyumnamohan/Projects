<?php

$con = mysqli_connect('localhost', 'root', '', 'job');


if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


if(isset($_POST['name'])) {
    $name = $_POST['name'];

    
    $query = "SELECT status FROM students WHERE name = '$name'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Application Status</title>
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
        <li><a href="./Application_Status.html" onclick='location.href="./Application_Status.html"'>Application Status</a></li>
      </ul>
    </nav>
            </header>
            <div id="statusResult" class="status">
                <h2>Status:</h2>
                <p>Application status for applicant <?php echo $name; ?>: <?php echo $status; ?></p>
            </div>
            <footer>
            <p>&copy; 2024 Job Application Portal</p>
            </footer>
        </body>
        </html>
        <?php
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>No Application Found</title>
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
        <li><a href="./Application_Status.html" onclick='location.href="./Application_Status.html"'>Application Status</a></li>
      </ul>
    </nav>
            </header>
            <div id="statusResult" class="status">
                <h2>Status:</h2>
                <p>No application found for applicant <?php echo $name; ?></p>
            </div>
            <footer>
            <p>&copy; 2024 Job Application Portal</p>
            </footer>
        </body>
        </html>
        <?php
    }
} else {
    echo "Error: Name parameter is missing.";
}
?>
