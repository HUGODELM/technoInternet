<h1> WELCOME TO YOUR NIGHTMARE  </h1>
	<div class="head">
		<?php
			if(strlen($_SESSION['username'])>0)
			{
				echo "Bonjour ".$_SESSION['username'];
			}
			else
			{

		?>
			<p> Vous n'ètes pas connecter</p>
		<?php
			}
		?>
	</div>
		<div class="ban">
			<img src="./admin/images/alicee.gif" alt="gif alice cooper" width="18%" />
			<img src="./admin/images/banniere2.png" alt="the master" width="45%" />
			<img src="./admin/images/alicee.gif" alt="gif alice cooper"  width="18%" />
		</div>
