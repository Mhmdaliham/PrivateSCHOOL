<?php
require_once "./view course/view_course_action.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bootstrap 5 Side Bar Navigation</title>
  <!-- bootstrap 5 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
  <!-- BOX ICONS CSS-->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <!-- custom css -->
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  min-height: 100vh;
  background-color: #fff;
}

.side-navbar {
  width: 250px;
  height: 100%;
  position: fixed;
  margin-left: -300px;
  background-color: #100901;
  transition: 0.5s;
}

.nav-link:active,
.nav-link:focus,
.nav-link:hover {
  background-color: #ffffff26;
}

.my-container {
  transition: 0.4s;
}

.active-nav {
  margin-left: 0;
}

/* for main section */
.active-cont {
  margin-left: 250px;
}

#menu-btn {
  background-color: #100901;
  color: #fff;
  margin-left: -62px;
}

.my-container input {
  border-radius: 2rem;
  padding: 2px 20px;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent background */
  z-index: 9999; /* Ensure modal appears above everything */
}

.modal-content {
  background-color: #fefefe; /* White background */
  margin: 10% auto; /* Center modal vertically and horizontally */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Adjust width as needed */
  max-width: 500px; /* Maximum width for responsiveness */
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.modal h2 {
  margin-bottom: 20px;
}

.modal form label {
  display: block;
  margin-bottom: 10px;
}

.modal form input[type="text"],
.modal form input[type="datetime-local"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.modal form button {
  background-color: #4caf50; /* Green */
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Style for table */
table {
    width: 100%;
    border-collapse: collapse;
    /* margin-bottom: 20px; */
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
}

.modal form button:hover {
  background-color: #45a049;
}
.edit-btn {
    background-color: #f4e951;
}
.delete-btn {
    background-color: #ee3131;
}

/* Style for buttons */
.btn {
    padding: 5px 10px;
    margin-right: 5px;
    cursor: pointer;
    color: white;
    /* padding: 14px 20px; */
    /* margin: 8px 0; */
    border: none;
    cursor: pointer;
}
.view-btn { 
  background-color: #4caf50;
}
.add-course {
  background-color: #3497e5;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
}
 .body-container {
    margin-top: 5%;
    padding-left : 5%;
    padding-right: 5%;
 }
  </style>
</head>

<body>
  <!-- Side-Nav -->
  <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
    <ul class="nav flex-column text-white w-100">
      <a href="#" class="nav-link h3 text-white my-2">
         </br>Weclome admin
      </a>  
      <a href="./index.php" class="nav-link">
        <i class="bx bxs-dashboard"></i>
        <span class="mx-2">Manage Courses</span>
      </a>
      <a href="../manage students/index.php" class="nav-link">
        <i class="bx bx-user-check"></i>
        <span class="mx-2">Manage Students</span>
      </a>
      <a href="../manage teachers/index.php" class="nav-link">
        <i class="bx bx-conversation"></i>
        <span class="mx-2">Manage Teachers </span>
      </a>
      <a href="./../manage rooms/index.php" class="nav-link">
        <i class="bx bx-conversation"></i>
        <span class="mx-2">Manage Rooms </span>
      </a>
    </ul>
    <span href="#" class="nav-link h4 w-100 mb-5">
      <a href="./../logout/logout.php">logout</a>
    </span>
  </div>

  <!-- Main Wrapper -->
  <div class="p-1 my-container active-cont">
    <!-- Top Nav -->
    
    <!--End Top Nav -->
    <div class="body-container">

<div class="table-container">

        <div class="table-header">
          <button class="btn add-course" onclick="openAddcourseModal()">
            Add New course
          </button>
        </div>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Course Name</th>
              <th>Course Description</th>
              <th>Credit Hours</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php foreach ($coursesList as $row): ?>
            <tr>
                <td><?php echo $row['CourseID']; ?></td>
                <td><?php echo $row['CourseName']; ?></td>
                <td><?php echo $row['CourseDescription']; ?></td>
                <td><?php echo $row['CreditHours']; ?></td>
                <td>
                <button class="btn delete-btn" onclick="deletecourse(<?php echo $row['CourseID']; ?>)">
                  Delete
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
              
            </tr>
          </tbody>
        </table>
    </div>
</div>


    <!-- Modal for adding course -->
    <div id="addcourseModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Add New course</h2>
        <form id="addcourseForm">

          <label for="CourseName">course Name</label>
          <input type="text" id="CourseName" name="CourseName" required>

          <label for="CourseDescription">course description</label>
          <input type="text" id="CourseDescription" name="CourseDescription" required>

          <label for="CreditHours">Credit Hours</label>
          <input type="text" id="CreditHours" name="CreditHours" required>

          <label for="RateAmountPerHour">Credit price per hour</label>
          <input type="text" id="RateAmountPerHour" name="RateAmountPerHour" required>
          
          <button type="submit">Submit</button>
        </form>
      </div>
    <script>

      // functions for course
      function openAddcourseModal() {
        var modal = document.getElementById("addcourseModal");
        modal.style.display = "block";
      }

      function closeModal() {
        var modal = document.getElementById("addcourseModal");
        modal.style.display = "none";
      }

      document.getElementById("addcourseForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(this); 
        fetch("./add courses/add_course_action.php", {
          method: "POST",
          body: formData
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            alert(data.error);
          } else if (data.success) {
            alert(data.success);
            closeModal();
            location.reload();
          }
        })
        .catch((error) => {
          alert("Error: " + error.message);
        });
      });

      function deletecourse(courseID) {

        fetch("./delete course/delet_course_action.php?CourseID=" + courseID , {
          method: "GET"
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            alert(data.error);
          } else if (data.success) {
            alert(data.success);
            location.reload();
          }
        })
        .catch((error) => {
          alert("Error: " + error.message);
        });
      }
    </script>
  </div>

  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
