

<h2>Cadastro de Usuarios</h2>


<div class="row row-CadastroUsuario">
    
    <div id="divErros">
        
    <?php
        echo validation_errors();
    ?>  
        
    </div>
    
    <form id="frmCadastroUsuario" enctype="multipart/form-data" name="frmCadastroUsuario" method="post" action="<?php echo base_url('index.php/Usuario/ProcessarUsuario'); ?>">
    
        <div class="col-lg-12 col-md-12">        

            
            <div class="row">
                <div class="form-group col-lg-1 col-md-1 ">
                    <label for="txtCodUsuario">Código:</label>
                    <input disabled name="txtCodUsuario" type="text" value="<?php echo $Usuario['CodUsuario'] ?>" class="form-control" id="txtCodUsuario">                
                    <input name="txtCodUsuarioBanco" type="hidden" value="<?php echo $Usuario['CodUsuarioBanco'] ?>"  id="txtCodUsuarioBanco">
                </div>                      
            </div>
            
            <div class="row">
                <div class="form-group col-lg-10 col-md-10 ">
                    <label for="txtDescUsuario">Descrição Usuario:</label>
                    <input name="txtDescUsuario" type="text" value="<?php echo $Usuario['DescUsuario'] ?>" class="form-control" id="txtDescUsuario">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-lg-2 col-md-2 ">
                    <label for="txtNomeUsuario">Nome Usuario:</label>
                    <input name="txtNomeUsuario" maxlength="20" type="text" value="<?php echo $Usuario['NomeUsuario'] ?>" class="form-control" id="txtNomeUsuario">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-2 col-md-2 ">
                    <label for="txtSenhaUsuario">Senha Usuario:</label>
                    <input name="txtSenhaUsuario" maxlength="20" type="password" value="<?php echo $Usuario['SenhaUsuario'] ?>" class="form-control" id="txtSenhaUsuario">
                </div>
            </div>

            
            <div class="row">
                
                <div class="form-group col-lg-2 col-md-2 ">
                    <label for="txtCodCliente">Código Cliente:</label>
                    <input maxlength="5" name="txtCodCliente" id="txtCodCliente" value="<?php echo $Usuario['CodCliente'] ?>" class="form-control" type="text">
                </div>
                
            </div>

        </div>
    
    
        <div class="col-md-12 col-lg-12" id="divBotoesForm">
            
                <button type="submit" id="btnCadastrarUsuario"class="btn btn-default">Cadastrar</button>
                <button type="button" id="btnCancelarCadastroUsuario" class="btn btn-default">Cancelar</button>
            
        </div>
        
    </form>    

</div>
   
   
    
    
    
    
    
          