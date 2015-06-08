{include file='common/header.tpl'}

      <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="{$BASE_URL}">HOME</a>
                 > 
                <a href="#">PROFILE</a>
            </section>

{if $FORNECEDOR}
	{foreach $info as $f}
	<form class="perfil_form" method="post" action="{$BASE_URL}pages/users/perfil.php">
		Responsável: <input type="text" value="{$f.responsavel}" name="responsavel" class="form-control"/><br />
		Email: <input type="text" value="{$f.email}" name="email" class="form-control"/><br />
		Telemóvel: <input type="text" value="{$f.telemovel}" name="telemovel" class="form-control"/><br />
		<button class=" btn btn-default">Accept</button>
	</form>
	<form class="password_perfil_form" method="post" action="{$BASE_URL}pages/users/perfil.php">
		Old Password: <input type="password" name="old.password" class="form-control"/><br />
		New Password: <input type="password" name="password" class="form-control"/><br />
		Confirm New Password: <input type="password" name="confirm_password" class="form-control"/><br />
		<button class=" btn btn-default">Accept</button>
	</form>
	{/foreach}
{else}

	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}