{include file='common/header.tpl'}

{if $USERNAME}
	<h3>Editar Perfil</h3>
{$info|@print_r}
	<form id="perfil_form" method="post" action="{$BASE_URL}pages/users/perfil.php">
	
		Nome Completo: <input type="text" value="{$info.nome}" name="nome" /><br />
		Data de Nascimento: <input type="date" value="{$info.datanascimento}" name="data_nascimento" /><br />
		Email: <input type="text" value="{$info.email}" name="email" /><br />
		Telemóvel: <input type="text" value="{$info.telemovel}" name="telemovel" /><br />
		País: <input type="text" value="{$info.nomepais}" name="pais" /><br /> <!-- MUDAR PARA COMBOBOX -->
		Cidade: <input type="text" value="{$info.nome_cidade}" name="cidade" /><br />
		Rua: <input type="text" value="{$info.rua}" name="rua" /><br />
		Código Postal: <input type="text" value="{$info.cp1}" name="CP1" readonly /><input type="text" value="{$info.cp2}" name="CP2" /><br />
		<button>Confirmar alterações</button>
	</form>
	<form id="password_perfil_form" method="post" action="{$BASE_URL}pages/users/perfil.php">
		Old Password: <input type="password" name="old_password" /><br />
		New Password: <input type="password" name="password" /><br />
		Confirm New Password: <input type="password" name="confirm_password" /><br />
		<button>Confirmar alterações</button>
	</form>
{else}
	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}