 <?php
echo '
{% load static %}
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact Us</title>
	{% include \'importcss.html\' %}
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{% static \'css/enquiry.css\' %}">
	<link rel="stylesheet" type="text/css" href="{% static \'fonts/ionicons.min.css\' %}">
	<link rel="stylesheet" href="{% static \'bootstrap/css/bootstrap2.min.css\' %}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
	<link rel="stylesheet" href="{% static \'fonts/ionicons.min.css\' %}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
	<style>
		.right {
			float: right;
			margin-left: 20px;
			margin-right: 0;
		}

		.round {
			float: left;
			max-width: 60px;
			width: 100%;
			margin-right: 20px;
			border-radius: 50%;
		}
	</style>
</head>

<body>
	{% include \'navbar.html\' %}
	<div class="container-contact100"
		style="background-color: black; background-image: url(https://cdn.hipwallpaper.com/i/85/56/TamSoR.jpg); background-size:auto;  background-repeat: no-repeat; background-color: black; background-position: right bottom;">
		<div class="wrap-contact100" style="margin-right: 770px;">
			<form method="POST" class="contact100-form validate-form"> {% csrf_token %}
				<span class="contact100-form-title"
					style="font-weight: bold;font-family: Montserrat, sans-serif; color: white;padding-bottom: 40px;">
					Send Us A Message
				</span>
				<div style="padding: 10px;">
					<small style="font-weight: bold;">Product:</small>
					<select name="product_name" style="padding:10px; width: 530px">
						<option>---</option>
						{% for product in products %}
						<option>{{product.name}}</option>
						{% endfor %}
					</select>
				</div>
				<!-- <div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input style="font-family: Montserrat, sans-serif;" class="input100" type="text" name="name" placeholder="Full Name">
					<span class="focus-input100"></span>
				</div> -->

				<!-- <div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input style="font-family: Montserrat, sans-serif;" class="input100" type="text" name="email" placeholder="E-mail">
					<span class="focus-input100"></span>
				</div> -->

				<!-- <div class="wrap-input100 validate-input" data-validate = "Please enter your phone">
					<input style="font-family: Montserrat, sans-serif;" class="input100" type="text" name="" placeholder="Phone">
					<span class="focus-input100"></span>
				</div> -->

				<div class="row" style="padding:10px;padding-bottom:0px">
					<div class="col-md-12">
						<small style="font-weight: bold;">Admin\'s Reply:</small>
						<div class="card card-body">
							<p name="admin">{{message.reply}}</p>
						</div>
					</div>
				</div>
				<br>
				<div class="row" style="padding:10px; padding-top:0px">
					<div class="col-md-12">
						<small style="font-weight: bold;">Your Message:</small>
						<div class="card card-body">
							<p>{{message.query}}</p>
						</div>
					</div>
				</div>
				<br>
				{% if message.reply != \' \' %}
				<div class="wrap-input100 validate-input" data-validate="Please enter your message">
					<textarea style="font-family: Montserrat, sans-serif; color: black;" class="input100"
						name="customer_message" placeholder="Your Message"></textarea>
					<span class="focus-input100"></span>
				</div>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span style="font-family: Montserrat, sans-serif;">
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Send
						</span>
					</button>
				</div>
				{% else %}
				<p style="color: red;">Wait for admin\'s reply!</p>
				{% endif %}
			</form>
		</div>
	</div>
	{%include \'footer.html\' %}
</body>

</html>
';
?>