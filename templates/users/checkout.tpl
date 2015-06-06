{include file='common/header.tpl'}

{if $USERNAME}
	<div id="checkout_wrapper">
		Ao fechar o seu Carrinho de Compras está a concordar com o nosso sistema de pagamento no momento de entrega. 
		A data de fecho do Carrinho de Compras será registada e procederemos ao envio e entrega dos produtos que escolheu.
		Confirma que quer fechar o seu carrinho?
		<a href="?confirm=TRUE"><button>Sim.</button></a> <a href="{$BASE_URL}pages/users/shop_cart.php"><button>Não, voltar atrás.</button></a>
	</div>
{else}
	{include file='common/no_permission.tpl'}
{/if}
{include file='common/footer.tpl'}