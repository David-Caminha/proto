{include file='common/header.tpl'}

            <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="http://www.google.com">HOME</a>
                 > 
                <a href="http://www.google.com">ACCOUNT</a>
            </section>
            <section id="line"></section>
        </div>

        <div id="fornecedores" class="table-responsive " >
            <table class="table table-striped">
                <tr>
                    <th class="col-sm-3 col-md-3">Fornecedor</th>
                    <th class="col-sm-3 col-md-3">email</th>
                    <th class="col-sm-3 col-md-3">Contacto</th>
                    <th class="col-sm-3 col-md-3"></th>
                </tr>
                
                {foreach $fornecedores as $fornecedor}
                <tr>
                    <td >{$fornecedor.nome}</td>
                    <td >{$fornecedor.email}</td>
                    <td >{$fornecedor.telemovel}</td>
					{if $fornecedor.aceite == FALSE}
					<td><a href="?aceitar={$fornecedor.id}">Aceitar</a></td>
					<td><a href="?recusar={$fornecedor.id}">Recusar</a></td>
					{else}
                    <td><a href="?remover={$fornecedor.id}">Remover</a></td>
					{/if}
                </tr>
                {/foreach}
                
            </table>
        </div>
        <br>
        <div id="administradores" class="table-responsive ">
            <table class="table table-striped">
                <tr>
                    <th class="col-sm-3 col-md-3">Administrador</th>
                    <th class="col-sm-3 col-md-3">email</th>
                    <th class="col-sm-3 col-md-3">Histórico acções</th>
                    <th class="col-sm-3 col-md-3"></th>
                </tr>
                
                {foreach $admins as $admin}
                <tr>
                    <td >{$admin.username}</td>
                    <td >{$admin.email}</td>
                    <td><a href="">ver histórico</a></td>
                    <td><a href="?despromover={$admin.id}">Despromover Administrador</a></td>
                </tr>
                {/foreach}
                
            </table>
        </div>
		<br />
		<div id="utilizadores" class="table-responsive " >
            <table class="table table-striped">
                <tr>
                    <th class="col-sm-3 col-md-3">Utilizador</th>
                    <th class="col-sm-3 col-md-3">Email</th>
                    <th class="col-sm-3 col-md-3">Contacto</th>
                    <th class="col-sm-3 col-md-3"></th>
                </tr>
                
                {foreach $utilizadores as $utilizador}
                <tr>
                    <td >{$utilizador.username}</td>
                    <td >{$utilizador.email}</td>
                    <td >{$utilizador.telemovel}</td>
                    <td><a href="?promover={$utilizador.id}">Promover a Administrador</a></td>
                </tr>
                {/foreach}
                
            </table>
        </div>

{include file='common/footer.tpl'}