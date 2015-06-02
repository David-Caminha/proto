{include file='common/header.tpl'}

{if $USERNAME}

	<form id="perfil_form" method="post">
		Username: <input type="text" value="luizfvpereira" name="username" /><br />
		Nome Completo: <input type="text" value="Luís Pereira" name="nome" /><br />
		Data de Nascimento: <input type="date" value="" name="data_nascimento" /><br />
		Email: <input type="text" value="" name="email" /><br />
		Telemóvel: <input type="text" value="" name="telemovel" /><br />
		Rua: <input type="text" value="" name="rua" /><br />
		Código Postal: <input type="text" value="" name="CP1" /><input type="text" value="" name="CP2" /><br />
		<button>Confirmar alterações</button>
	</form>
	<form id="password_perfil_form" method="post">
		Old Password: <input type="password" name="old_password" /><br />
		New Password: <input type="password" value="" name="password" /><br />
		Confirm New Password: <input type="password" value="" name="confirm_password" /><br />
		<button>Confirmar alterações</button>
	</form>
{else}

	{include file='common/nopermission.tpl'}

{/if}

{include file='common/footer.tpl'}