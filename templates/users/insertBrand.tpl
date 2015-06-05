{include file='common/header.tpl'}

{if $FORNECEDOR}
	<div id="product_wrapper">
		<form action="{$BASE_URL}pages/users/insertBrand.php" method="post">
			Nome da marca:<input type="text" name="name" /><br/>
			
			<input type="submit" name="submit" value="Inserir Marca">
		</form>
	</div>
{else}
	{include file='common/no_permission.tpl'}
{/if}


{include file='common/footer.tpl'}