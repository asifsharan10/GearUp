 <?php
echo '
{% load static %}
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
		integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous" />

	<style>
		.custom-margin {
			margin-top: 20vh;
		}

		/* If you add background image it will look like transparent form*/
		body {
			background-image: url("{{product.image_url1}}");
			background-repeat: no-repeat;
			width: 100%;
			height: 100%;
			background-position: center center;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>
	<title>Booking form</title>
</head>

<body>
	<div style="padding-left: 10px; padding-top: 10px">
		<a href="{% url \'index\' %}" style="
          border-radius: 10px;
          background-color: rgb(0, 0, 0, 0.6);
          padding: 10px;
          color: white;
          font-size: 26px;
          font-style: normal;
          font-weight: bold;
          font-family: Montserrat, sans-serif;
          text-align: center;
          text-decoration: none;
        ">GEAR UP</a>
	</div>
	<div class="container-fluid">
		<div class="row justify-content-center" style="margin-top: 5vh">
			<div class="col-sm-6 col-md-4" style="background-color: rgb(0, 0, 0, 0.9); border-radius: 10px">
				<!-- Add bg-primary in form tag if want form background color-->
				<!--text-white if want text color white-->
				<form action="{% url \'createbooking\' %}" method="POST" class="shadow-lg p-4 text-white">
					{% csrf_token %}
					<div class="form-group">
						<i class="fas fa-credit-card"></i>
						<label for="email" class="pl-2 font-weight-bold">Credit Card</label>
						{% if customer.credit_info != None %}
						<input name="credit" type="text" class="form-control" value="{{customer.credit_info}}" />
						{% else %}
						<input name="credit" type="text" class="form-control" placeholder="Credit card info" />
						{% endif %}
						<!--Add text-white below if want text color white-->
						<small class="form-text">We\'ll never share your credit card info with anyone
							else.</small>
					</div>

					<div class="form-group">
						<i class="fas fa-map"></i>
						<label class="pl-2 font-weight-bold">Location</label>
						{% if customer.location != None %}
						<input name="location" value="{{customer.location}}" type="txt" s class="form-control" />
						{% else %}
						<input name="location" placeholder="Location" type="txt" s class="form-control" />
						{% endif %}
					</div>
					<button type="submit" class="btn btn-info mt-3 btn-block shadow-sm font-weight-bold">
						Submit
					</button>
				</form>
			</div>
		</div>
		<div class="row justify-content-center" style="text-align: center; padding: 20px">
			<div class="card-body col-md-12" style="
            background-color: rgb(0, 0, 0, 0.9);
            border-radius: 10px;
            color: white;
          ">
				<p><b>Product Name: </b>{{product.name}}</p>
				<p><b>User Demanded Quantity: </b>{{qty}}</p>
			</div>
		</div>
	</div>

	<!-- JQuery Popper Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
		crossorigin="anonymous"></script>
</body>

</html>
';
?>