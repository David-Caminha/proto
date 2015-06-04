{include file='common/header.tpl'}

{if $FORNECEDOR}
	<div id="product_wrapper">
		<form action="{$BASE_URL}pages/users/insertProduct.php" method="post" enctype="multipart/form-data">
			Nome do Produto:<input type="text" name="name" /><br/>
			Preço:<input type="number" name="price" min="0.01" step="0.01"/><br/>
			Descrição:<textarea rows="6" cols="50" name="description" placeholder="Escreva aqui uma descrição do produto..."></textarea><br/>
			Stock Inicial:<input type="number" name="stock" /><br/>
			Imagem:
			<input type="file" name="fileToUpload" id="fileToUpload">
			Ficha Técnica:<textarea rows="6" cols="50" name="technic_details" placeholder="Escreva aqui os tópicos da ficha técnica..."></textarea><br/>
			Marca:<select name="brand">
				{foreach $brands as $b}
					<option value="{$b.nome}">{$b.nome}</option>
				{/foreach}
			</select><br/>
			Tipo de Produto:
			<select name="tipo">
				<option value="1" selected>Laptop</option>
				<option value="2">Desktop</option>
				<option value="3">Periférico</option>
				<option value="4">Cabo</option>
			</select><br/>
			<input type="submit" name="submit" value="Inserir Produto">
		</form>
	</div>
{else}
	{include file='common/no_permission.tpl'}
{/if}


{include file='common/footer.tpl'}