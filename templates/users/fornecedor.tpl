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
					<td>{$p.pnome}</td>
					<td>{$p.vendas}</td>
					<td>{$p.stock}</td>
					<td>
						<a href="?addStock={$p.id}"><button>Adicionar Stock</button></a>
						<input type="text" name="qtd_stock" placeholder="0" value="0" />
					</td>
					<td><a href="?kill={$p.id}"><button>Descontinuar</button></a></td>
				</tr>
			{/foreach}
		</table>	
	</div>
{else}
	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}