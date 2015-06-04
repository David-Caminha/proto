<div id="nav_right_h_menu">
	{if $OWNER}
	<a class=" btn btn-default" href="{$BASE_URL}pages/users/pagDono.php">
		<span class="first_tier_text">Olá {$USERNAME}!</span><br />
		<span class="second_tier_text">Gerir Contas</span>
	</a>
	<a class="btn btn-default" href="{$BASE_URL}pages/users/prodDono.php">
		<span class="first_tier_text">Gere {$NNPROD}</span><br />
		<span class="second_tier_text">Novos Produtos</span>
	</a>
	{else}
	<a class=" btn btn-default" href="{$BASE_URL}pages/users/perfil.php">
		<span class="first_tier_text">Olá {$USERNAME}!</span><br />
		<span class="second_tier_text">A tua Conta</span>
	</a>
	<a class="btn btn-default" href="{$BASE_URL}pages/users/shop_cart.php">
		<span class="first_tier_text">Vê {$NITEMS} Items</span><br />
		<span class="second_tier_text">Carrinho Compras</span>
	</a>
	<a class=" btn btn-default" href="{$BASE_URL}pages/users/favourites.php"><br /><span class="second_tier_text">Favoritos</span></a>
	{/if}
	<a class=" btn btn-default" href="{$BASE_URL}actions/users/logout.php"><br />Terminar Sessão</a>
</div>