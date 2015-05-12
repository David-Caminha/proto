{include file='common/header.tpl'}

            </div>
            <section id="line"></section>
        </div>
        <section id="forms">
        <div class="col-xs-10 col-sm-4 col-md-4 col-md-offset-1">
            <form class="form-goup" action="{$BASE_URL}actions/users/login.php" method="post">
                <input class="form-control" type="text" name="username" placeholder="Username"> <br>
                <input class="form-control" type="password" name="Password" placeholder="password"> <br>
                <input type="checkbox"> <h7>Remember me</h7> <br>
                 <button type="button" class=" btn btn-primary ">Login</button>      
            </form>
        </div>
        <div class="col-xs-10 col-sm-4 col-md-4 col-md-offset-2">
            <form class="form-goup" action="{$BASE_URL}actions/users/register.php" method="post">
                <input class="form-control" type="text" name="username" placeholder="Username" value="{$FORM_VALUES.username}"> <br>
                <input class="form-control" type="text" name="email" placeholder="Email" value="{$FORM_VALUES.email}"><br>
                    <input class="form-control" type="text" name="nome" placeholder="Nome" value="{$FORM_VALUES.realname}"> <br>
                <input class="form-control" type="text" name="contacto" placeholder="Contacto" value="{$FORM_VALUES.contacto}"> <br>
                <input class="form-control" type="text" name="morada" placeholder="Morada" value="{$FORM_VALUES.morada}"> <br>
                 <input class="form-control" type="date" name="dataNascimento" placeholder="Data de Nascimento"> <br>
                  <input class="form-control" type="password" name="password" placeholder="Password"> <br>
              
                <input type="checkbox"> <h7>Desejo ser Fornecedor</h7> <br>
                <input type="submit" class=" btn btn-primary " value="Registar">           
            </form>
        </div>
        </section>

{include file='common/footer.tpl'}