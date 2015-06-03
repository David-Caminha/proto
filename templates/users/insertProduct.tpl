{include file='common/header.tpl'}

{if $FORNECEDOR}
	<div id="product_wrapper">
		<form action="{$BASE_URL}pages/users/insertProduct.php" method="post" enctype="multipart/form-data">
			Nome do Produto:<input type="text" name="name" /><br/>
			Preço:<input type="number" name="price" /><br/>
			Descrição:<textarea rows="10" cols="50" name="description" placeholder="Escreva aqui uma descrição do produto..."></textarea><br/>
			Stock Inicial:<input type="number" name="stock" /><br/>
			Imagem:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="submit"><br/>
			Ficha Técnica:<textarea rows="10" cols="50" name="technic_details" placeholder="Escreva aqui os tópicos da ficha técnica..."></textarea><br/>
			Marca:<input type="text" name="" /><br/>
			Tipo de Produto:
			<select>
				<option value="1" selected>Laptop</option>
				<option value="2">Desktop</option>
				<option value="3">Periférico</option>
				<option value="4">Cabo</option>
			</select><br/>
			<button>Inserir</button>
		</form>
	</div>
{else}
	{include file='common/no_permission.tpl'}
{/if}


{include file='common/footer.tpl'}
