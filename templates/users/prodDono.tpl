{include file='common/header.tpl'}

<div id="new_products" class="table-responsive " >
	<table class="table table-striped">
		<tr>
			<th class="col-sm-3 col-md-3">Produto</th>
			<th class="col-sm-3 col-md-3">Preço</th>
			<th class="col-sm-3 col-md-3">Fornecedor</th>
			<th class="col-sm-3 col-md-3">Marca</th>
			<th class="col-sm-3 col-md-3">Tipo</th>
			<th class="col-sm-3 col-md-3"></th>
			<th class="col-sm-3 col-md-3"></th>
		</tr>
		
		{foreach $products as $p}
		<tr>
			<td >{$p.nome}</td>
			<td >{$p.preco}</td>
			<td >{$p.fornecedor}</td>
			<td >{$p.marca}</td>
			<td >{$p.tipo}</td>
			
			<td><a href="?aprovar={$p.id}">Aprovar</a></td>
			<td><a href="?rejeitar={$p.id}">Rejeitar</a></td>

		</tr>
		{/foreach}
		
	</table>
</div>
{include file='common/footer.tpl'}