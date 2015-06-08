{include file='common/header.tpl'}

         <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="{$BASE_URL}">HOME</a>
                 > 
                <a href="#">MANAGE USERS</a>
            </section>
<section id="">

		<div id="utilizadores" class="table-responsive " >
            <table class="table table-striped">
                <tr>
                    <th class="col-sm-3 col-md-3">Utilizador</th>
                    <th class="col-sm-3 col-md-3">Email</th>
                    <th class="col-sm-3 col-md-3">Contacto</th>
                    <th class="col-sm-3 col-md-3"></th>
                </tr>
                
                {foreach $users as $utilizador}
                <tr>
                    <td >{$utilizador.username}</td>
                    <td >{$utilizador.email}</td>
                    <td >{$utilizador.telemovel}</td>
                    <td><a href="{$BASE_URL}actions/users/banirUser.php?banir={$utilizador.id}">Banir Utilizador</a></td>
                </tr>
                {/foreach}
                
            </table>
        </div>

		<div id="utilizadoresBanidos" class="table-responsive " >
            <table class="table table-striped">
                <tr>
                    <th class="col-sm-3 col-md-3">Utilizador Banido</th>
                    <th class="col-sm-3 col-md-3">Email</th>
                    <th class="col-sm-3 col-md-3">Contacto</th>
                    <th class="col-sm-3 col-md-3"></th>
                </tr>
                
                {foreach $banned as $utilizador}
                <tr>
                    <td >{$utilizador.username}</td>
                    <td >{$utilizador.email}</td>
                    <td >{$utilizador.telemovel}</td>
                    <td><a href="{$BASE_URL}actions/users/reporUser.php?repor={$utilizador.id}">Repor Utilizador</a></td>
                </tr>
                {/foreach}
                
            </table>
        </div>

{include file='common/footer.tpl'}