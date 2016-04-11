<form id="frmCadastroEndereco" name="frmCadastroEndereco" method="get" action=" <?php echo base_url('Endereco/ProcessarEndereco/') ?> ">      
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title"><?php echo $Modo ?> de Endereço</h4>
    </div>


    <div class="modal-body row">
        
        
     
    <div class="row">        
        <div class="col-md-12 col-lg-12">                        
            
            <div class="form-group col-md-2 col-lg-2">
              <label for="txtCEPCliente">CEP:</label>
              <input name="txtCEPCliente" type="text" value="<?php echo $Endereco['CEP'] ?>" class="form-control" id="txtCEPCliente" placeholder="Ex: 88360-00">
            </div>
    
    <input name="txtCodEnderecoBanco" type="hidden" value="<?php echo $Endereco['CodEndereco'] ?>" class="form-control" id="txtCodEnderecoBanco">
    <input name="txtCodCliente" type="hidden" value="<?php echo $Endereco['CodCliente'] ?>" class="form-control" id="txtCodCliente">                               

            <div class="form-group col-md-5 col-lg-5">
                <label for="txtEstadoCliente">Estado:</label>
                <select class="form-control" name="txtEstadoCliente" id="txtEstadoCliente">

                </select>
            </div>

            <div class="form-group col-md-5 col-lg-5">
                <label for="txtCidadeCliente">Cidade:</label>
                <select class="form-control" name="txtCidadeCliente" id="txtCidadeCliente">                    
                    <option>Selecione um Estado</option>                    
                </select>
            </div>           
            
            
        </div>
    </div>

    <div class="row">        
        <div class="col-md-12 col-lg-12">       
            <div class="form-group col-md-12 col-lg-12">
              <label for="txtBairroCliente">Bairro:</label>
              <input name="txtBairroCliente" type="text" value="<?php echo $Endereco['Bairro'] ?>" class="form-control" id="txtBairroCliente" placeholder="Ex: Baiiro alto">
            </div>
            
        </div>
    </div>    
    
    
    <div class="row">        
        <div class="col-md-12 col-lg-12">       

            <div class="form-group col-md-10 col-lg-10">
              <label for="txtRuaCliente">Rua:</label>
              <input name="txtRuaCliente" type="text" value="<?php echo $Endereco['Rua'] ?>" class="form-control" id="txtRuaCliente" placeholder="Ex: Rua 7 de aio">
            </div>

            <div class="form-group col-md-2 col-lg-2">
              <label for="txtNumResidenciaCliente">Número residencial:</label>
              <input name="txtNumResidenciaCliente" type="text" value="<?php echo $Endereco['NumResidencia'] ?>" class="form-control" id="txtNumResidenciaCliente" placeholder="Ex: 242">
            </div>
            
            
        </div>
    </div>
    
    <div class="row">        
        <div class="col-md-12 col-lg-12">       
            <div class="form-group col-md-12 col-lg-12">
              <label for="txtComplementoCliente">Complemento:</label>
              <input name="txtComplementoCliente" type="text" value="<?php echo $Endereco['Complemento'] ?>" class="form-control" id="txtComplementoCliente" placeholder="Ex: Galpão 2">
            </div>
            
        </div>
    </div>    

    <div class="row">        
        <div class="col-md-12 col-lg-12">       
            
            <div class="form-group col-md-12 col-lg-12">
              <label for="txtReferenciaCliente">Referência:</label>
              <input name="txtReferenciaCliente" type="text" value="<?php echo $Endereco['Referencia'] ?>" class="form-control" id="txtReferenciaCliente" placeholder="Ex: em frente a igreja">
            </div>                    
            
        </div>
    </div>    
    

    <div class="row">        
        <div class="col-md-12 col-lg-12">       
            
            <div class="form-group col-md-9 col-lg-9">
              <label for="txtNomeContato">Nome de contato:</label>
              <input name="txtNomeContato" type="text" value="<?php echo $Endereco['NomeContato'] ?>" class="form-control" id="txtNomeContato" placeholder="Ex: Artur">
            </div> 

            <div class="form-group col-md-3 col-lg-3">
              <label for="txtTelefoneContato">Telefone de contato:</label>
              <input name="txtTelefoneContato" type="text" value="<?php echo $Endereco['TelefoneContato'] ?>" class="form-control" id="txtTelefoneContato" placeholder="(00) 2323-2323">
            </div>                              
            
        </div>
    </div>    
    

    </div>

    <div class="modal-footer">
        <button type="submit" id="btnSubmitCadastroEndereco" class="btn btn-primary">Salvar</button>
        <button type="reset" id="btnResetCadastroEndereco" data-dismiss="modal" class="btn btn-default">Cancelar</button>                            
    </div>

</form>    



    

