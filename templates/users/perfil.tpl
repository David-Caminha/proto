{include file='common/header.tpl'}

{if $USERNAME}

	<form id="perfil_form" method="post">
		<input type="text" value="luizfvpereira" name="username" /><br />
		<input type="text" value="Luís Pereira" name="nome" /><br />
		<input type="date" value="" name="data_nascimento" /><br />
		<input type="password" value="" name="password" /><br />
		<input type="password" value="" name="confirm_password" /><br />
		<input type="text" value="" name="email" /><br />
		<input type="text" value="" name="telemovel" /><br />
		<input type="text" value="" name="rua" /><br />
		<input type="text" value="" name="CP1" /><input type="text" value="" name="CP2" /><br />
		<button>Confirmar alterações</button>
	</form>

{else}

	{include file='common/nopermission.tpl'}

{/if}

{include file='common/footer.tpl'}