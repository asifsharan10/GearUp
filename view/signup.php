 <?php
echo '
{% load static %}
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
      crossorigin="anonymous">

   <style>
      .custom-margin {
         margin-top: 20vh;
      }

      /* If you add background image it will look like transparent form*/
       body {
         background-image: url("{% static \'img/login-bg.jpg\' %}");
         background-repeat: no-repeat;
         width: 100%;
         height: 100%;
         background-position: center center;
         background-attachment: fixed;
         background-size: cover;
      }
   </style>
   <title>Sign-Up Form</title>
</head>
<body>
   <div class="row justify-content-center"style="padding-top:10px">
      <a href="{% url \'index\' %}" style="color: rgb(255, 255, 255);font-size: 26px;font-style: normal;font-weight: bold;font-family: Montserrat, sans-serif;text-align: center; text-decoration: none;">GEAR UP</a>
   </div>
   <div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-sm-6 col-md-4">
            <!-- Add bg-primary in form tag if want form background color-->
            <!--text-white if want text color white-->
            <form action="signup" method="POST" class="shadow-lg p-4 text-white">
               {% csrf_token %}
               <div class="form-group">
                  <i class="fas fa-user"></i>
                  <label for="name" class="pl-2 font-weight-bold">Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Name">
               </div>
               <div class="form-group">
                <i class="fas fa-at"></i>
                <label for="email" class="pl-2 font-weight-bold">Email</label>
                <input name="email" type="email"  class="form-control" placeholder="Email">
             </div>
             <div class="form-group">
                <i class="fas fa-phone"></i><label for="email" class="pl-2 font-weight-bold">Contact Number</label>
                <input name="phone" type="number"class="form-control" placeholder="Phone Number">
             </div>
               <div class="form-group">
                  <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label>
                  <input type="password" name="password1" class="form-control" placeholder="Password">
               </div>
               <div class="form-group">
                <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Confirm Password</label>
                <input type="password" name="password2" class="form-control" placeholder="Re-enter Password">
                   <small class="form-text">We\'ll never share your personal details with anyone.</small>
                   {% for message in messages %}
                  <small class="form-text" style="color: #dc3545;text-transform: capitalize;">{{message}}</small>
                  {% endfor %}
             </div>
               <button type="submit" class="btn btn-info mt-3 btn-block shadow-sm font-weight-bold">Submit</button>
            </form>
            <div>
               <div class="d-flex justify-content-center links" style="color: white;">
                   Already have an account? <a href="{% url \'login\' %}" style="color:#5bc0de;" class="ml-2">Login</a>
               </div>
           </div>
         </div>
      </div>
   </div>


   <!-- JQuery Popper Bootstrap -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>
</body>

</html>
';
?>