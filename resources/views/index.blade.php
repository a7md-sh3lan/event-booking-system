<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Cantata+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Imprima" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ url('/css/style.css') }}" />

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<!-- custom js -->
	<script type="text/javascript" src="{{ url('/js/subscribe.js') }}"></script>
	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-cta">
						<h1>Greek Campus Festival</h1>
						@foreach($categories as $category)
						<h2>There are <span class="{{$category->id}}-span">{{$category->avilable_tickets}}</span> {{$category->type}}s</h2>
						@endforeach
					</div>
					<div class="booking-form">
						<form id="book-ticket">
						<div class="alert" id="msg_div" style="display:none">
							<span id="res_message"></span>
						</div>
							<div class="col-md-4">
								<div class="form-group">
									<span class="form-label">Name</span>
									<input class="form-control" type="text" name="name" placeholder="Your Name (Alphabetic only)">
								</div>
								<div class="alert alert-danger name-error  custom-errors"></div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
									<span class="form-label">Email</span>
									<input class="form-control" type="text" name="email" placeholder="Enter Your Email">
								</div>
								<div class="alert alert-danger email-error  custom-errors"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span class="form-label">Mobile Number</span>
									<input class="form-control" type="text" name="phone_number" placeholder="Egyptian mobile number only">
								</div>
								<div class="alert alert-danger phone_number-error  custom-errors"></div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span class="form-label">Ticket Type</span>
									<select class="form-control" name="ticket_type">
									@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->type}} {{$category->price}} LE</option>
									@endforeach
									</select>
									<span class="select-arrow"></span>
								</div>
								<div class="alert alert-danger ticket_type-error  custom-errors"></div>
							</div>

							<div class="col-md-4">
								<div class="form-btn">
									<button class="submit-btn">Book Now!</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>