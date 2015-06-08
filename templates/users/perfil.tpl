{include file='common/header.tpl'}
<script>
    $( document ).ready(function ()
{    
    var country = document.getElementById('country');
    country.value = {$i.pais};
    var city = document.getElementById('cid');
    city.value = {$i.cidade};
    var cp1 = document.getElementById('cp');
    cp1.value = {$i.cp1};
});
</script>
<script>
function getCity(country) {
    var strURL="{$BASE_URL}actions/users/findCity.php?cidade="+country;
    var req = new XMLHttpRequest();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('citydiv').innerHTML=req.responseText;
                } else {
                    alert("Problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
        req.open("GET", strURL, true);
        req.send(null);
    }
}
</script>
<script>
function getCps(city) {
    var strURL="{$BASE_URL}actions/users/findCp.php?city="+city;
    var req = new XMLHttpRequest();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('cpdiv').innerHTML=req.responseText;
                } else {
                    alert("Problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
        req.open("GET", strURL, true);
        req.send(null);
    }
}
</script>

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
        
		<select id="country" class="form-control" name="pais" onChange="getCity(this.value)">
 <option value="">Selecione o país</option>
 {foreach $paises as $pais}
 <option value="{$pais.nome}">{$pais.nome}</option>
 {/foreach}
     </select>
        <br>
        <div id="citydiv">
            <select id="cid" class="form-control" name="cidade">
                <option>Selecione a cidade</option>
            </select>
        </div>
        <br>
        <h7 class=" col-xs-12  col-sm-2 col-md-3 ">Codigo Postal</h7>
        <div id="cpdiv" class=" col-xs-3  col-sm-2 col-md-3 ">
            <select id="cp" class="form-control" name="cp1">
                <option>Codigo postal</option>
            </select>
        </div>
        <input type="text" value="{$i.cp2}" name="CP2" /><br />
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