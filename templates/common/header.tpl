<!DOCTYPE HTML>
<html >
    <head>
		
        <link rel="stylesheet" href="{$BASE_URL}css/Style.css"/>
        <link href="{$BASE_URL}css/bootstrap.min.css" rel="stylesheet">
        
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta charset="utf-8">
    </head>
    <body id="pagina">
	
        <div id="header" class="col-xs-12 col-md-12 ">
            <section >
               <img  src="{$BASE_URL}images/assets/Logo.png" alt="Logo" class="img-responsive" alt="Responsive image" >    
            </section>
            <div id="ferramentas" class=" col-xs-12 col-md-12">
                <section class="row col-xs-6 col-md-4">
                    <a  class=" btn btn-default" href="{$BASE_URL}">Home</a>
                          {if $USERNAME}
                    {else}
						{if $FORNECEDOR}
						{else}
                      <a href="{$BASE_URL}pages/users/register.php" class=" btn btn-default" >Register</a>
                    	{/if}
                    {/if}
                    <form action="{$BASE_URL}pages/products/search.php" method="get">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="pesquisa" placeholder="Pesquisa">
						<input type="hidden" name="method_receiver" />
					</form>
                   
                </section>
          
                    {if $USERNAME}
                        {include file='common/menu_logged_in.tpl'}
                    {else}
						{if $FORNECEDOR}
							{include file='common/menu_supplier.tpl'}
						{else}
							<section class="col-xs-6 col-md-4 col-md-offset-4" id="UserMenu">
								{include file='common/menu_logged_out.tpl'}
							</section>
						{/if}
                    {/if}
             
            </div>