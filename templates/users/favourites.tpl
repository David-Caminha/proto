{include file='common/header.tpl'}

{if $USERNAME  }
	
	<div id="fav_wrapper">
		<h3>Favoritos</h3>
		<table id="favoritos">
		
		{foreach $produto as $fav}
		<tr>
		<a href="?idProd={$fav.id}"><td>{$fav.nome}</td></a>
		<a href="?idP={$fav.id}"><button>Remover</button></a>
		</tr>
		{/foreach}
		<table>
	</div>
	
	
{else}
	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}