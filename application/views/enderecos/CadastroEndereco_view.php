
<h2>Cadastro de endereço</h2>

<div class="row row-CadastroEndereco">
    
    <div class="col-lg-12 col-md-12">
    
        <?php
             echo validation_errors();

             if($Endereco['CodEndereco'])
             {
               echo '<form id="frmCadastroEndereco" name="frmCadastroEndereco" method="post" action="'. base_url('index.php/Endereco/Atualizar/'.$Endereco['CodEndereco'].'/Salvar').'">';
             }
             else
             { echo '<form id="frmCadastroEndereco" name="frmCadastroEndereco" method="post" action="'. base_url('index.php/Endereco/Gravar').'">';

             }
        ?>
            <input name="txtCodEndereco" type="hidden" value="<?php echo $Endereco['CodEndereco'] ?>" class="form-control" id="txtCodEndereco">
            <input name="txtCodCliente" type="hidden" value="<?php echo $Endereco['CodCliente'] ?>" class="form-control" id="txtCodCliente">                               

            <div class="form-group">
              <label for="txtCEPCliente">CEP:</label>
              <input name="txtCEPCliente" type="text" value="<?php echo $Endereco['CEP'] ?>" class="form-control" id="txtCEPCliente" placeholder="Ex: 88360-00">
            </div>

            <div class="form-group">
              <label for="txtRuaCliente">Rua:</label>
              <input name="txtRuaCliente" type="text" value="<?php echo $Endereco['Rua'] ?>" class="form-control" id="txtRuaCliente" placeholder="Ex: Rua 7 de aio">
            </div>

            <div class="form-group">
              <label for="txtNumResidenciaCliente">Número residencial:</label>
              <input name="txtNumResidenciaCliente" type="text" value="<?php echo $Endereco['NumResidencia'] ?>" class="form-control" id="txtNumResidenciaCliente" placeholder="Ex: 242">
            </div>

            <div class="form-group">
              <label for="txtComplementoCliente">Complemento:</label>
              <input name="txtComplementoCliente" type="text" value="<?php echo $Endereco['Complemento'] ?>" class="form-control" id="txtComplementoCliente" placeholder="Ex: Galpão 2">
            </div>

            <div class="form-group">
                <label for="txtEstadoCliente">Estado:</label>
                <select class="form-control" name="txtEstadoCliente" id="txtEstadoCliente">
                    <?php
                    
                    foreach ($Estados as $Est)
                    {//<?php if($Endereco['Estado'] == 'SC'):echo 'selected="selected"';endif; ?
                        echo '                   
                            <option CodEst="'.$Est['CodEstado'].'" value="'.$Est['SiglaEstado'].'">'.$Est['DescEstado'].'</option>"
                           ';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txtCidadeCliente">Cidade:</label>
                <select class="form-control" name="txtCidadeCliente" id="txtCidadeCliente">                    
                    <option>Selecione um Estado</option>                    
                </select>
            </div>

            <div class="form-group">
              <label for="txtBairroCliente">Bairro:</label>
              <input name="txtBairroCliente" type="text" value="<?php echo $Endereco['Bairro'] ?>" class="form-control" id="txtBairroCliente" placeholder="Ex: Baiiro alto">
            </div>

            <div class="form-group">
              <label for="txtReferenciaCliente">Referência:</label>
              <input name="txtReferenciaCliente" type="text" value="<?php echo $Endereco['Referencia'] ?>" class="form-control" id="txtReferenciaCliente" placeholder="Ex: em frente a igreja">
            </div>        

            <div class="form-group">
              <label for="txtNomeContato">Nome de contato:</label>
              <input name="txtNomeContato" type="text" value="<?php echo $Endereco['NomeContato'] ?>" class="form-control" id="txtNomeContato" placeholder="Ex: Artur">
            </div> 

            <div class="form-group">
              <label for="txtTelefoneContato">Telefone de contato:</label>
              <input name="txtTelefoneContato" type="text" value="<?php echo $Endereco['TelefoneContato'] ?>" class="form-control" id="txtTelefoneContato" placeholder="(00) 2323-2323">
            </div>        

            <button type="submit" class="btn btn-default">Cadastrar</button>
            
        </form>

    </div>
</div>



