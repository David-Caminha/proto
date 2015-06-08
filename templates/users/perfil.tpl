{include file='common/header.tpl'}

{if $USERNAME}
	<h3>Editar Perfil</h3>

{foreach $info as $i}
    {if $i.tipo == 1}
    <a href="{$BASE_URL}pages/users/gerirUsers.php">Gerir Users</a>
    {/if}
	<form id="perfil_form" method="post" action="{$BASE_URL}pages/users/perfil.php">
		Nome Completo: <input type="text" value="{$i.nome}" name="nome" /><br />
		Data de Nascimento: <input type="date" value="{$i.datanascimento}" name="data_nascimento" /><br />
		Email: <input type="text" value="{$i.email}" name="email" /><br />
		Telemóvel: <input type="text" value="{$i.telemovel}" name="telemovel" /><br />
		País: <input type="text" value="{$i.nomepais}" name="pais" /><br /> <!-- MUDAR PARA COMBOBOX -->
		Cidade: <input type="text" value="{$i.nome_cidade}" name="cidade" /><br />
		Rua: <input type="text" value="{$i.rua}" name="rua" /><br />
		Código Postal: <input type="text" value="{$i.cp1}" name="CP1" readonly /><input type="text" value="{$i.cp2}" name="CP2" /><br />
		<button>Confirmar alterações</button>
	</form>
	<form id="password_perfil_form" method="post" action="{$BASE_URL}pages/users/perfil.php">
		Old Password: <input type="password" name="old_password" /><br />
		New Password: <input type="password" name="password" /><br />
		Confirm New Password: <input type="password" name="confirm_password" /><br />
		<button>Confirmar alterações</button>
	</form>
{/foreach}
{else}
	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}