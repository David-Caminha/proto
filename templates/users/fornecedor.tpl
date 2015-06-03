{include file='common/header.tpl'}

{if $FORNECEDOR}
	<div id="fornecedor_wrapper">
		<table class="table table-striped">
			<tr>
				<td>Produto</td>
				<td>Vendas</td>
				<td>Stock</td>
			</tr>
			{foreach $produto as $p}
				<tr>
					<td>{$p.nome}</td>
					<td>{$p.vendas}</td>
					<td>{$p.stock}</td>
					<td><button>Adicionar Stock</button></td>
					<td><button>Descontinuar</button></td>
				</tr>
			{/foreach}
		</table>	
	</div>
{else}
	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}