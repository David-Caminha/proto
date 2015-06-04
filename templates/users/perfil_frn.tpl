{include file='common/header.tpl'}

{if $FORNECEDOR}
	{foreach $info as $f}
	<form class="perfil_form" method="post" action="{$BASE_URL}pages/users/perfil.php">
		Responsável: <input type="text" value="{$f.responsavel}" name="responsavel" /><br />
		Email: <input type="text" value="{$f.email}" name="email" /><br />
		Telemóvel: <input type="text" value="{$f.telemovel}" name="telemovel" /><br />
	</form>
	<form class="password_perfil_form" method="post" action="{$BASE_URL}pages/users/perfil.php">
		Old Password: <input type="password" name="old.password" /><br />
		New Password: <input type="password" name="password" /><br />
		Confirm New Password: <input type="password" name="confirm_password" /><br />
		<button>Confirmar alterações</button>
	</form>
	{/foreach}
{else}

	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}