{include file='common/header.tpl'}

{if $FORNECEDOR}
	<div id="edit_product_wrapper">
		<form action="{$BASE_URL}pages/users/editProduct.php" method="post" >
			Nome do Produto:<input type="text" name="name" value="{$p.nome}" /><br/>
			Preço:<input type="number" name="price" value="{$p.preco}" min="0.01" step="0.01"/><br/>
			Descrição:<textarea rows="6" cols="50" name="description" placeholder="Escreva aqui uma descrição do produto..." >{$p.descricao}</textarea><br/>
			<!-- 	Imagem:
			<input type="file" name="fileToUpload" id="fileToUpload"> -->	
			Ficha Técnica:<textarea rows="6" cols="50" name="technic_details" placeholder="Escreva aqui os tópicos da ficha técnica...">{$p.fichatecnica}</textarea><br/>
			Marca:<select name="brand">
				{foreach $brands as $b}
					{if $b.id==$p.idmarca}
						<option value="{$b.nome}" selected>{$b.nome}</option>
					{else}
						<option value="{$b.nome}" >{$b.nome}</option>
					{/if}
				{/foreach}
			</select><br/>
			Tipo de Produto:
			<select name="tipo">
				{if $p.tipo == 'laptop'}
					<option value="laptop" selected>Laptop</option>
					<option value="desktop">Desktop</option>
					<option value="periferico">Periférico</option>
					<option value="cabo">Cabo</option>
				{elseif $p.tipo =='desktop'}
					<option value="laptop">Laptop</option>
					<option value="desktop" selected>Desktop</option>
					<option value="periferico">Periférico</option>
					<option value="cabo">Cabo</option>
				{elseif $p.tipo =='periferico'}
					<option value="laptop">Laptop</option>
					<option value="desktop">Desktop</option>
					<option value="periferico" selected>Periférico</option>
					<option value="cabo">Cabo</option>
				{elseif $p.tipo =='cabo'}
					<option value="laptop">Laptop</option>
					<option value="desktop">Desktop</option>
					<option value="periferico">Periférico</option>
					<option value="cabo" selected>Cabo</option>
				{/if}
			</select><br/>
			<input type="submit" name="submit" value="Editar Produto">
		</form>
	</div>
{else}
	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}