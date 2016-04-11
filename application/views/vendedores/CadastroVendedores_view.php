

<h2>Cadastro de Vendedores</h2>


<div class="row row-CadastroVendedor">
    
    <div id="divErros">
        
    <?php
        echo validation_errors();
    ?>  
        
    </div>
    
    <form id="frmCadastroVendedor" enctype="multipart/form-data" name="frmCadastroVendedor" method="post" action="<?php echo base_url('index.php/Vendedor/ProcessarVendedor'); ?>">
    
        <div class="col-lg-12 col-md-12">        

            
            <div class="row">
                <div class="form-group col-lg-1 col-md-1 ">
                    <label for="txtCodVendedor">Código:</label>
                    <input disabled name="txtCodVendedor" type="text" value="<?php echo $Vendedor['CodVendedor'] ?>" class="form-control" id="txtCodVendedor">                
                    <input name="txtCodVendedorBanco" type="hidden" value="<?php echo $Vendedor['CodVendedorBanco'] ?>"  id="txtCodVendedorBanco">
                </div>                      
            </div>
            <div class="row">
                <div class="form-group col-lg-10 col-md-10 ">
                    <label for="txtNomeVendedor">Nome Vendedor:</label>
                    <input name="txtNomeVendedor" type="text" value="<?php echo $Vendedor['NomeVendedor'] ?>" class="form-control" id="txtNomeVendedor">
                </div>
            </div>
            
            <div class="row">
                
                <div class="form-group col-lg-2 col-md-2 ">
                    <label for="txtCodCliente">Código Cliente:</label>
                    <input name="txtCodCliente" id="txtCodCliente" value="<?php echo $Vendedor['CodCliente'] ?>" class="form-control" type="text">
                </div>

                <div class="form-group col-lg-2 col-md-2 ">
                    <label for="txtTaxaComissao">Taxa Comissão:</label>
                    <input name="txtTaxaComissao" id="txtTaxaComissao" value="<?php echo $Vendedor['TaxaComissao'] ?>" class="form-control" type="text">
                </div>
                
            </div>

        </div>
    
    
        <div class="col-md-12 col-lg-12" id="divBotoesForm">
            
                <button type="submit" id="btnCadastrarVendedor"class="btn btn-default">Cadastrar</button>
                <button type="button" id="btnCancelarCadastroVendedor" class="btn btn-default">Cancelar</button>
            
        </div>
        
    </form>    

</div>
   
   
    
    
    
    
    
          