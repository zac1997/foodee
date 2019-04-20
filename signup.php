<div id="fh5co-contact" data-section="registration" style="display: none">
	<div class="container">
		<form action="dbcontroller.php" method="POST">
			<div class="row text-center fh5co-heading row-padded">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="heading to-animate">Register</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 to-animate-2">   <!--contact info-->
					<h3>Contact Info</h3>
					<ul class="fh5co-contact-info">
						<li class="fh5co-contact-address ">
							<i class="icon-home"></i>
							AIKTC , <br> Mumbai
						</li>
						<li><i class="icon-phone"></i> (123) 465-6789</li>
						<li><i class="icon-envelope"></i>info@fabc.co</li>
					</ul>
				</div>
				<div class="col-md-6 to-animate-2">
					<h3>Registration Form</h3>
					<div class="form-group ">
						<label for="name" class="sr-only">Name</label>
						<input id="name" name="fname" class="form-control" placeholder="Name" type="text" required/>
					</div>
					<div class="form-group ">
						<label for="uname" class="sr-only">Username</label>
						<input id="uname" name="uname" class="form-control" placeholder="Username" type="text" required/>
					</div>
					<div class="form-group ">
						<label for="pwd" class="sr-only">Password</label>
						<input id="pwd" name="pwd" class="form-control" placeholder="Password" type="password" required/>
					</div>
					<div class="form-group ">
						<label for="email" class="sr-only">Email</label>
						<input id="email" name="email" class="form-control" placeholder="Email" type="email" required/>
					</div>
					<div class="form-group ">
						<label for="mobileno" class="sr-only">Mobile No</label>
						<input id="name" name="contact" class="form-control" placeholder="Mobile No" type="text" required/>
					</div>
	            	<div class="form-group ">
						<label for="message" class="sr-only">Address</label>
						<textarea name="address" id="add" cols="30" rows="5" class="form-control" placeholder="Address" required></textarea>
					</div>
					<div class="form-group ">
						<input class="btn btn-primary" name="register" value="Register" type="submit">
						<input class="btn btn-primary" value="Login!!!" type="button" onclick="makeVisible(0)">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>