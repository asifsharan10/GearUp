 <?php
echo '
{% load static %}
<!DOCTYPE html>
<html>

<head>
	{% include \'navbar.html\' %}
	<link rel="stylesheet" href="{% static \'css/single-product.css\' %}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
</head>

<body class="body">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="{{product.image_url1}}" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="{{product.image_url2}}" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="{{product.image_url4}}" alt="Third slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="{{product.image_url3}}" alt="Fourth slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="{{product.image_url5}}" alt="Fifth slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="col-md-7">
				{% if year == current_Year %}<p class="newarrival text-center">NEW</p>
				{% elif year > current_Year %} <p class="newarrival text-center" style="display: inline; padding: 5px">UPCOMING</p>
				{% endif %}
				<h2>
					{{product.name}}
				</h2>
				<div class="details">
					<p class="price">
						Price: {{product.to_int}} BDT
					</p>
					<p><span style="font-weight: bold;">Status: </span>
						{% if product.quantity == 0 %}<span style="color: #dc3545;">Out of Stock</span></p>
					{% else %}<span style="color:#849397;">Available</span></p>
					{% endif %}
					<p><span style="font-weight: bold;">Description:</span><br>{{product.description}}</p>
					<p><span style="font-weight: bold;">Brand:</span> {{product.manufacturers}}</p>
					<form action="{% url \'booking\' pk=product.id%}">
						{% if product.quantity != 0 %}
						<div class="row">
							<div class="col-md-3">
								<!-- <div class="form-group">
                              <input style="color: white;" name="qty" type="range" class="form-control" min="0" max="{{product.quantity}}" placeholder="Quantity" style="width: 160px;">
                            </div> -->

								<div class="range-wrap">
									<input type="range" class="range" name="qty" min="1" max="{{product.quantity}}"
										style="width: 160px;">
									<output class="bubble"></output>
								</div>
							</div>
							&nbsp;&nbsp;
							<div class="col-md-3" style="color: black;">
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
									{% if year > current_Year %} Preorder
									{% else %} Buy Now
									{% endif %}
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
									aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content" style="background-color: rgb(255,255,255,0.8);">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLongTitle">
													<b>{{product.name}}</b>
												</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												Confirm booking?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary"
													data-dismiss="modal">Close</button>
												<a name="product_id" href=""><button
														class="btn btn-primary">Confirm</button></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							{% else %}
							<span style="color: #dc3545;">Sorry! You cannot buy this.</span>
							{% endif %}
						</div>
					</form>
				</div>
			</div>
		</div>
		{%include \'footer.html\'%}
	</div>
</body>
<script>
	const allRanges = document.querySelectorAll(".range-wrap");
	allRanges.forEach(wrap => {
		const range = wrap.querySelector(".range");
		const bubble = wrap.querySelector(".bubble");

		range.addEventListener("input", () => {
			setBubble(range, bubble);
		});
		setBubble(range, bubble);
	});

	function setBubble(range, bubble) {
		const val = range.value;
		const min = range.min ? range.min : 0;
		const max = range.max ? range.max : 100;
		const newVal = Number(((val - min) * 100) / (max - min));
		bubble.innerHTML = val;

		// Sorta magic numbers based on size of the native UI thumb
		bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
	}
</script>

</html>
';
?>