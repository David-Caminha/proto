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
		<span id="p_name">Nome do Produto</span>
		<br />
		de: <span id="fornecedor">Fornecedor</span>
		<p id="price">Preço: <span id="price_value">12,3€</span> </p>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Aenean lacinia sapien urna, vitae lobortis eros laoreet a. 
		Suspendisse ut neque leo. Cras ac lorem et quam mollis egestas eget ac dolor. 
		Vestibulum placerat ut sem et placerat. Etiam in pulvinar lorem. 
		In erat ipsum, ultrices placerat augue aliquet, imperdiet vestibulum lorem. 
		Vestibulum fringilla diam in laoreet rutrum. 
		Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; 
		Suspendisse condimentum, turpis sed facilisis pretium, turpis massa tempus metus, eu pharetra velit justo in ante. 
		Donec pharetra molestie quam mattis iaculis. 
		Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
		Fusce dapibus ultrices metus, finibus tristique orci elementum ac. 
		Aliquam vitae nisl vel odio iaculis pellentesque non sit amet neque. 
		Aliquam varius ornare leo id vulputate. 
		Morbi vel dui commodo, pharetra dui eu, fermentum tortor.
		</p>
	</div>
	<div class="separation-line">
	</div>
	<div id="comentarios">
		<p class="c_username">Nome do Utilizador</p>
		<p class="c_rate">4/5 (pode-se pôr estrelas)</p>
		<p class="c_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Aenean lacinia sapien urna, vitae lobortis eros laoreet a. 
		Suspendisse ut neque leo.Aliquam vitae nisl vel odio iaculis pellentesque non sit amet neque. 
		Aliquam varius ornare leo id vulputate. 
		Morbi vel dui commodo, pharetra dui eu, fermentum tortor.</p>
		<div class="separation-line">
		</div>
		<p class="c_username">Nome do Utilizador</p>
		<p class="c_rate">2/5 (pode-se pôr estrelas)</p>
		<p class="c_text">Vestibulum fringilla diam in laoreet rutrum. 
		Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; 
		Suspendisse condimentum, turpis sed facilisis pretium, turpis massa tempus metus, eu pharetra velit justo in ante. 
		Donec pharetra molestie quam mattis iaculis. 
		Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
		Fusce dapibus ultrices metus, finibus tristique orci elementum ac. </p>
		<div class="separation-line">
		</div>
	</div>
{include file='common/footer.tpl'}