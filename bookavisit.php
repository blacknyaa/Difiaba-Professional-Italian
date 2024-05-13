<?php

  require_once "backend/session.php";


  if (!$login || $_SESSION['level'] != 'user') {

    header('Location: login.php');
    exit();
  
  } else {
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMR Beauty Salon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets2/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <!-- header -->
    <section class="header">
        <a href="#" class="logo"> MMR Beauty Salon </a>
     
        <nav class="navbar">
           <div id="close-navbar" class="fas fa-times"></div>
           <a href="index.php">home</a>
           <a href="bookavisit.php" class="action-btn">Book a Visit</a>
           <a href="backend/logout.php" class="action-btn">Logout</a>
     
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
     
     </section>
   <!--header end-->
<section class="form-booking">
   <form action="form" class="form" method="get">
  <h1 class="text-center">Booking Form</h1>
    <!-- Progress bar -->
    <div class="progressbar">
      <div class="progress" id="progress"></div>
      <div
        class="progress-step progress-step-active"
        data-title="Personal Details"></div>
      <div class="progress-step" data-title="Appointment Details"></div>
      <div class="progress-step" data-title="Review Booking"></div>

    </div>

    <!-- Steps -->
    <!--Personal Details-->
    <div class="form-step form-step-active">
      <div class="input-group">
        <label for="firstname">First Name</label>
        <input type="text" name="username" id="fname" value='<?php echo $_SESSION['firstname']  ?>' readonly required/>
      </div>
      <div class="input-group">
          <label for="lastname">Last Name</label>
          <input type="text" name="username" id="lname" value='<?php echo $_SESSION['lastname']  ?>' readonly required/>
        </div>
      <div class="input-group">
        <label for="phonenumber">Phone number</label>
        <input type="text" name="position" id="number" value='<?php echo $_SESSION['phone']  ?>' readonly required/>
      </div>
      <div class="input-group">
          <label for="email">Email Address</label>
          <input type="text" name="position" id="email" value='<?php echo $_SESSION['email']  ?>' readonly required />
        </div>
        
      <div class="">
        <a href="#" class="btn btn-next width-50 ml-auto"onclick="updatePaymentDetails()">Next</a>
      </div>
    </div>
<!--Appointment Details-->
    <div class="form-step">
      <div class="input-group">
        <label for="date">Appointment Date</label>
        <input type="date" name="phone" id="adate" required/>
      </div>
      <div class="input-group">
        <label for="time">Appointment Time</label>
        <input type="time" name="email" id="atime" required />
      </div>

      <div class="input-group">
        <div class="selectservice">
          <label for="service">Select Service</label>
          <select id="service" onchange="updatePrice()">
            </select>


        <div class="input-group"></div>
              <label for="price">Price</label>
              <input type="text" id="price" readonly> <!-- Make the input field readonly -->
            </div>

        </div>
      <div class="btns-group">
        <a href="#" class="btn btn-prev">Previous</a>
        <a href="#" class="btn btn-next" onclick="updatePaymentDetails()">Next</a>
      </div>
    </div>
    </div>
<!--Review Booking-->
    <div class="form-step">
      <div class="input-group">
          <form >
          <div class="input-group" style="display: flex; justify-content: center; ">
              <h2 class="danger" id="appt-error"></h2>
            </div>
            <div class="input-group">
                <label for="selected-service">Selected Service:</label>
                <span id="selected-service"></span>
          
            </div>
            <div class="input-group">
                <label for="selected-price">Price:</label>
                <span id="selected-price"></span>
            </div>
            <div class="input-group">
                <label for="selected-firstname">First Name:</label>
                <span id="selected-firstname"></span>
            </div>
            <div class="input-group">
                <label for="selected-lastname">Last Name:</label>
                <span id="selected-lastname"></span>
            </div>
            <div class="input-group">
                <label for="selected-phone">Phone number:</label>
                <span id="selected-phone"></span>
            </div>
            <div class="input-group">
                <label for="selected-email">Email Address:</label>
                <span id="selected-email"></span>
            </div>
            <div class="input-group">
                <label for="selected-appointment-date">Appointment Date:</label>
                <span id="selected-appointment-date"></span>
            </div>
            <div class="input-group">
                <label for="selected-appointment-time">Appointment Time:</label>
                <span id="selected-appointment-time"></span>
            </div>
            <button type="button" class="btn" style="width: 100%;" onclick="submitAppointment()" value="Submit">Submit Appointment</button>

          </form>
        </div>
      <div class="">
        <a href="#" class="btn btn-prev" style="width: 100%;">Previous</a>
      </div>
    </div>
    </div>
    
  </form>
   </section>
<script>
   function updatePaymentDetails() {
    // Personal Details
    var firstName = document.getElementById("fname").value;
    var lastName = document.getElementById("lname").value;
    var phoneNumber = document.getElementById("number").value;
    var email = document.getElementById("email").value;

    // Appointment Details
    var appointmentDate = document.getElementById("adate").value;
    var appointmentTime = document.getElementById("atime").value;
    var selectedService = document.getElementById("service").value;
    var selectedServicePrice = document.getElementById("service").selectedOptions[0].dataset.price;

    // Update payment details
    document.getElementById("selected-firstname").textContent = firstName;
    document.getElementById("selected-lastname").textContent = lastName;
    document.getElementById("selected-phone").textContent = phoneNumber;
    document.getElementById("selected-email").textContent = email;

    const date = new Date(appointmentDate);

    const months = [
      "January", "February", "March", "April", "May", "June", 
      "July", "August", "September", "October", "November", "December"
    ];

    const monthName = months[date.getMonth()];

    const day = date.getDate();

    const year = date.getFullYear();

    const formattedDate = `${monthName} ${day}, ${year}`;

    const timeInput = document.getElementById("atime").value;

    const [hours, minutes] = timeInput.split(':').map(Number);

    const period = hours < 12 ? 'AM' : 'PM';

    const hours12 = hours % 12 || 12;

    const formattedTime = `${hours12}:${minutes.toString().padStart(2, '0')} ${period}`;


    // document.getElementById("selected-appointment-date").textContent = appointmentDate;
    document.getElementById("selected-appointment-date").textContent = formattedDate;
    // document.getElementById("selected-appointment-time").textContent = appointmentTime;
    document.getElementById("selected-appointment-time").textContent = formattedTime;
    document.getElementById("selected-service").textContent = selectedService;
    document.getElementById("selected-price").textContent = selectedServicePrice ? "₱" + selectedServicePrice : "₱0.00";

}


</script>
<script>
  function updatePrice() {
    console.log('updatePrice() called');
    var serviceSelect = document.getElementById("service");
    var selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
    var price = selectedOption.dataset.price;
    document.getElementById("price").value = "₱" + price;
  }

  
function submitAppointment() {

var formData = {
    firstname: document.getElementById("selected-firstname").textContent,
    lastname: document.getElementById("selected-lastname").textContent,
    phone: document.getElementById("selected-phone").textContent,
    email: document.getElementById("selected-email").textContent,
    date: document.getElementById("selected-appointment-date").textContent,
    time: document.getElementById("selected-appointment-time").textContent,
    service: document.getElementById("selected-service").textContent,
    price: document.getElementById("selected-price").textContent,
};
console.log(formData);
var xhr = new XMLHttpRequest();
xhr.open("POST", "backend/appointment-api.php", true);
xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8;multipart/form-data");
xhr.onreadystatechange = function () {
  
    if (xhr.readyState === 4 && xhr.status === 200) {

        var response = JSON.parse(xhr.responseText);

        document.getElementById('appt-error').innerHTML = response.appt;
        if(response.validate == "exists") {
          alert(response.appt)
        }
        if(response.success == "success") {
          alert(response.count);
          window.location.href ="index.php";
        }

        console.log(response.count);console.log(xhr.responseText);
    }
    console.log(xhr.responseText);
};
xhr.send(JSON.stringify(formData));


}
getServices();

function getServices() {
    $.ajax({
        type: 'POST',
        url: 'backend/services-api.php',
        dataType: 'json',
        success: function(response) {
            var groupedServices = {};

            $.each(response, function(index, service) {
                if (!groupedServices[service.optgroup]) {
                    groupedServices[service.optgroup] = [];
                }
                groupedServices[service.optgroup].push(service);
            });

            $('#service').empty();

            $.each(groupedServices, function(optgroup, services) {
                var optgroupElement = $('<optgroup>', { label: optgroup });
                $.each(services, function(index, service) {
                    var optionText = service.service;
                    var optionValue = service.service_id;
                    var optionPrice = service.price;
                    var optionElement = $('<option>', {
                        value: optionValue,
                        text: optionText,
                        'data-price': optionPrice
                    });
                    optgroupElement.append(optionElement);
                });
                $('#service').append(optgroupElement);
                $('#service').on('change', function() {
                    var selectedOption = $(this).find('option:selected');
                    var selectedService = selectedOption.val(); 
                    var selectedServicePrice = selectedOption.data('price'); 

                    $('#selected-service').text(selectedService);
                    $('#selected-price').text(selectedServicePrice ? "₱" + selectedServicePrice : "₱0.00");

                });
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching services:', error);
        }
    });
}
</script>



<script src="js/script.js"></script>
<script src="js/script1.js"></script>
</body>
</html>

<style>

  .danger {
      color: red;
  }

</style>
<?php 

}

?>