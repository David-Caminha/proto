<div id="nav_right_h_menu">
	<a class=" btn btn-default" href="{$BASE_URL}pages/users/perfil.php">
		<span class="first_tier_text">Hello {$USERNAME}!</span><br />
		<span class="second_tier_text">Your Account</span>
	</a>
	<a class="btn btn-default" href="{$BASE_URL}pages/users/shop_cart.php">
		<span class="first_tier_text">Check ({$_SESSION['nitems']}) Items</span><br />
		<span class="second_tier_text">Shop Cart</span>
	</a>
	<a class=" btn btn-default" href="{$BASE_URL}pages/users/favourites.php"><br /><span class="second_tier_text">Favourites</span></a>
	<a class=" btn btn-default" href="{$BASE_URL}actions/users/logout.php"><br />Logout</a>
</div>