<div class="navbar navbar-inverse">
	<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	</div>

<div class="navbar-collapse collapse" id="main-nav">
	<ul class="list-unstyled">
		<li class="text-center <?php echo $_SERVER["REQUEST_URI"] == "/agents/$user"? "active" : ""?>">
			<a href="/agents/<?php echo $user?>">
				<span class="glyphicon glyphicon-dashboard"></span>
				<br />
				<span class="item">Dashboard</span>
			</a>
		</li>
		<li class="text-center  <?php echo $_SERVER["REQUEST_URI"] == "/agents/$user/courses"? "active" : ""?>">
	 		<a href="/agents/<?php echo $user?>/courses">
				<span class="glyphicon glyphicon-book"></span>
				<br />
				<span class="item">Courses Sold</span>
			</a>
		</li>
		<li class="text-center <?php echo $_SERVER["REQUEST_URI"] == "/agents/$user/invoices"? "active" : ""?>">
			<a href="/agents/<?php echo $user?>/invoices">
				<span class="glyphicon glyphicon-time"></span>
				<br />
				<span class="item">Payment History</span>
			</a>
		</li>
		<li class="text-center">
			<a href="/agents/<?php echo $user?>/settings">
				<span class="glyphicon glyphicon-wrench"></span>
				<br />
				<span class="item">Settings</span>
			</a>
		</li>
	</ul>
</div>

<div class="hidden-sm hidden-xs" id="side-nav-margin">
</div>


</div>