{include file='common/header.tpl'}
	<div id="right_column" class="column" >
		Quantidade: <select>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
		</select>
		<br />
		{if $USERNAME}<a href="#"><button>Adicionar ao Carrinho</button></a>{/if}
		
	</div>
	<div id="left_column" class="column" >
		<img src="http://gnomo.fe.up.pt/~lbaw1463/proto/images/produtos/default.png" alt="Imagem do Artigo" width="100" height="100" />
	</div>
	<div id="center_column" class="column" >
	{foreach $p as $product}
		<span id="p_name">{$product.nome}</span>
		<br />
		de: <span id="fornecedor">{$product.f_nome}</span>
		<p id="price">Preço: <span id="price_value">{$product.preco}€</span> </p>
		<p>
		{$product.descricao}
		</p>
	{/foreach}
	</div>
	<div class="separation-line-big">
	</div>
	<table id="also_bought_container">
		<h3>Quem comprou este produto, também comprou:</h3>
		<tr>
		{foreach $a_bought as $ab}
			<td>		
				<span class="a_b_name">{$ab.nome}</span><br />
				<img src="http://gnomo.fe.up.pt/~lbaw1463/proto/images/produtos/default.png" alt="Imagem do Artigo" width="100" height="100" /><br />
				<span class="a_b_price">{$ab.preco}€</span>
			</td>
		{/foreach}
		</tr>
	</table>
	<div class="separation-line-big">
	</div>
	<div id="comments">
		<h3>Comentários</h3>
		{foreach $Result as $comment}
		<p class="c_username">{$comment.username}</p>
		<p class="c_text">{$comment.texto}</p>
		<div class="separation-line">
		</div>
		{/foreach}
		<p class="c_username">Nome do Utilizador</p>
		<p class="c_rate">4/5 (pode-se pôr estrelas)</p>
		<p class="c_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Aenean lacinia sapien urna, vitae lobortis eros laoreet a. 
		Suspendisse ut neque leo.Aliquam vitae nisl vel odio iaculis pellentesque non sit amet neque. 
		Aliquam varius ornare leo id vulputate. 
		Morbi vel dui commodo, pharetra dui eu, fermentum tortor.</p>
		<div class="separation-line">
		</div>
	</div>
{include file='common/footer.tpl'}