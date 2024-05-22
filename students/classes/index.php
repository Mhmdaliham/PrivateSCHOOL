<?php
require_once "./view_classes/get_classes.php";
require_once "./add_class/get_registered_classes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
.view-btn { 
  background-color: #4caf50;
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
.add-payment {
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
         </br>Weclome doctor
      </a>  
      <a href="./index.php" class="nav-link">
        <i class="bx bxs-dashboard"></i>
        <span class="mx-2">Manage classes</span>
      </a>
      <a href="../payments/index.php" class="nav-link">
        <i class="bx bx-user-check"></i>
        <span class="mx-2">Manage payments</span>
      </a>
    </ul>
    <span href="#" class="nav-link h4 w-100 mb-5">
      <a href="./../logout/logout.php">logout</a>
    </span>
  </div>

  <!-- Main Wrapper -->
  <div class="p-1 my-container active-cont">
    <!-- Top Nav -->
    
    <div class="body-container">
    <div class="table-container">
    <div class="table-header">
              <button class="btn add-payment" onclick="openAddpaymentModal()">
                Add New class
              </button>
            </div>
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Course Name</th>
                  <th>Doctor Name</th>
                  <th>Room Name</th>
                  <th>Schedule</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <?php foreach ($studentsSchedual as $row): ?>
                <tr >
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['CourseName'];?></td>
                    <td><?php echo $row['DoctorName']; ?></td>
                    <td><?php echo $row['RoomName']; ?></td>
                    <td><?php echo $row['Schedule']; ?></td>
                     <td><button class="btn delete-btn" onclick="deleteClass(<?php echo $row['id']; ?>)">
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
    </div>
    <div id="addpaymentModal" class="modal">
          <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Add New class</h2>
            <form id="addpaymentForm">

            <label for="Class">Course:</label>
              <select id="Class" name="Class" required onchange="updateClassData()">
                <?php foreach ($allSchedual as $schedual): ?>
                  <?php $Course = $schedual['CourseName'] ?>
                  <option  value="<?php echo $schedual['ClassID']; ?>"><?php echo $Course; ?></option>
                <?php endforeach; ?>  
              </select>

              <!-- Other form fields here -->
              <label for="CourseName">Course Name</label>
              <input type="text" id="CourseName" name="CourseName" readOnly>

              <label for="RoomName">Room Name</label>
              <input type="text" id="RoomName" name="RoomName" readOnly>

              <label for="doctorName">doctor Name</label>
              <input type="text" id="doctorName" name="doctorName" readOnly>

              <label for="Schedule">Schedule</label>
              <input type="text" id="Schedule" name="Schedule" readOnly>

              <input type="number" id="ClassID" name="ClassID" hidden>

              <button type="submit">Submit</button>
            </form>
          </div>
        </div>
    <script>

function updateClassData() {
        let selectedOption = document.getElementById('Class').selectedOptions[0];
        document.getElementById('ClassID').value = selectedOption.value;

        let filteredSchedule = <?php echo json_encode($allSchedual); ?>.filter(schedule => schedule.ClassID == selectedOption.value);
        console.log(filteredSchedule)
            document.getElementById('CourseName').value = filteredSchedule[0].CourseName;
            document.getElementById('RoomName').value = filteredSchedule[0].RoomName;
            document.getElementById('doctorName').value = filteredSchedule[0].doctorName;
            document.getElementById('Schedule').value = filteredSchedule[0].Schedule;

      }

      updateClassData()
        function openAddpaymentModal() {
            var modal = document.getElementById("addpaymentModal");
            modal.style.display = "block";
          }

          function closeModal() {
            var modal = document.getElementById("addpaymentModal");
            modal.style.display = "none";
          }

          document.getElementById("addpaymentForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(this); 
            fetch("./add_class/add_class.php", {
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
   
      function deleteClass(id) {

        fetch("./remove_class/remove_class.php?id=" + id , {
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
  </body>

</html>
