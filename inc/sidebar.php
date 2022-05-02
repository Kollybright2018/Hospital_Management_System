<?php  ?>


			<?php if (isset($_SESSION ['username'])): ?>
				<div class="list-group  "  style="height: 100vh;  " >
					<a href="index.php" class="list-group-item list-group-item-action text-center text-white bg-info  ">Dashboard</a>
					<a href="profile.php" class="list-group-item list-group-item-action text-center text-white bg-info  ">Profile</a>
					<a href="#" class="list-group-item list-group-item-action text-center text-white bg-info  ">Administrator</a>
					<a href="doctor.php" class="list-group-item list-group-item-action text-center text-white bg-info  ">Doctor</a>
					<a href="patient.php" class="list-group-item list-group-item-action text-center text-white bg-info  ">Patient</a>
				</div>
				<?php endif ?>


				<?php if (isset($_SESSION ['doctor'])): ?>
							<div class="list-group  "  style="height: 100vh;  " >
					<a href="doctor.php" class="list-group-item list-group-item-action text-center text-white bg-info  ">Dashboard</a>
					<a href="profile.php" class="list-group-item list-group-item-action text-center text-white bg-info  ">Profile</a>
					<a href="patient.php" class="list-group-item list-group-item-action text-center text-white bg-info  ">Patient</a>
					<a href="#" class="list-group-item list-group-item-action text-center text-white bg-info  ">Appointment</a>
					<a href="#" class="list-group-item list-group-item-action text-center text-white bg-info  ">Report</a>
					
				</div>	
				<?php endif ?>


				<?php if (isset($_SESSION ['patient'])): ?>
							<div class="list-group  "  style="height: 100vh;  " >
					<a href="patient.php" class="list-group-item list-group-item-action text-center text-white bg-info  ">Dashboard</a>
					<a href="profile.php" class="list-group-item list-group-item-action text-center text-white bg-info  ">Profile</a>
					<a href="#" class="list-group-item list-group-item-action text-center text-white bg-info  ">Book Appointment</a>
					<a href="#" class="list-group-item list-group-item-action text-center text-white bg-info  ">Report</a>
					<a href="#" class="list-group-item list-group-item-action text-center text-white bg-info  ">Invoice</a>
					
				</div>	
				<?php endif ?>