{include file='common/header.tpl'}

{if $USERNAME}
	<h3>Editar Perfil</h3>
	{foreach $info as $u}
	<form id="perfil_form" method="post">
	
		Username: <input type="text" value="{$u.username}" name="username" /><br />
		Nome Completo: <input type="text" value="{$u.nome}" name="nome" /><br />
		Data de Nascimento: <input type="date" value="{$u.dataNascimento}" name="data_nascimento" /><br />
		Email: <input type="text" value="{$u.email}" name="email" /><br />
		Telemóvel: <input type="text" value="{$u.telemovel}" name="telemovel" /><br />
		País: <input type="text" value="{$u.nomePais}" name="pais" /><br /> <!-- MUDAR PARA COMBOBOX -->
		Cidade: <input type="text" value="{$u.nome_cidade}" name="cidade" /><br />
		Rua: <input type="text" value="{$u.rua}" name="rua" /><br />
		Código Postal: <input type="text" value="{$u.CP1}" name="CP1" /><input type="text" value="{$u.CP2}" name="CP2" /><br />
		<button>Confirmar alterações</button>
	</form>
	<form id="password_perfil_form" method="post">
		Old Password: <input type="password" value="{$u.password}" name="old.password" /><br />
		New Password: <input type="password" name="password" /><br />
		Confirm New Password: <input type="password" name="confirm_password" /><br />
		<button>Confirmar alterações</button>
	</form>
	{/foreach}
{else}

	{include file='common/nopermission.tpl'}

{/if}

{include file='common/footer.tpl'}