{include file='common/header.tpl'}

{if $USERNAME  }
	
	<div id="fav_wrapper">
		<h3>Favoritos</h3>
		<table class="table table-striped">
		
		{foreach $produto as $fav}
		<tr>
			<td><a href="?idProd={$fav.id}">{$fav.nome}</a></td>
			<td><a href="?idP={$fav.id}"><button class="btn btn-default">Remover</button></a></td>
		</tr>
		{/foreach}
		<table>
	</div>
	
	
{else}
	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}