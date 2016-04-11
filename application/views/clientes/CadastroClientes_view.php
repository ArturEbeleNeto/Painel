

<h2>Cadastro de Clientes</h2>


<div class="row row-CadastroCliente">   

    <div id="divErros">
        
    <?php
        echo validation_errors();
    ?>  
        
    </div>
    
    
<form id="frmCadastroCliente" name="frmCadastroCliente" method="post" action=" <?php echo base_url('index.php/Cliente/ProcessarCliente/') ?>">             

    <div class="col-md-12 column">     
        
        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#DadosPessoais" aria-controls="home" role="tab" data-toggle="tab">Dados Pessoais</a></li>
              <li role="presentation"><a href="#Endereco" aria-controls="Endereco" role="tab" data-toggle="tab">Endereço</a></li>
              <!--<li role="presentation"><a href="#Acesso" aria-controls="Acesso" role="tab" data-toggle="tab">Acesso</a></li>
              <!--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                
                
                
                <!-- Dados Pessoais -->
                <div role="tabpanel" class="tab-pane active" id="DadosPessoais">                    
                    
                        <div class="row">
                            <div class="form-group col-lg-1 col-md-1">
                                <label for="txtNomeCliente">Código:</label>
                                <input name="txtCodCliente" disabled type="text" value="<?php echo $Cliente['CodCliente'] ?>" class="form-control" id="txtCodCliente">      
                                <input name="txtCodClienteBanco" type="hidden" value="<?php echo $Cliente['CodClienteBanco'] ?>" class="form-control" id="txtCodClienteBanco">      
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="txtNomeCliente">Nome:</label>
                                <input name="txtNomeCliente" type="text" value="<?php echo $Cliente['NomeCliente'] ?>" class="form-control" id="txtNomeCliente" placeholder="Ex: Marcos">
                            </div>

                            <div class="form-group col-lg-6 col-md-6">
                                <label for="txtSobreNomeCliente">Sobre Nome:</label>
                                <input name="txtSobreNomeCliente" type="text" value="<?php echo $Cliente['SobreNomeCliente']; ?>" class="form-control" id="txtSobreNomeCliente" placeholder="Ex: da silva jr.">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="txtEmailCliente">Email:</label>
                                <input name="txtEmailCliente" type="email" value="<?php echo $Cliente['EmailCliente']; ?>" class="form-control" id="txtEmailCliente" placeholder="Ex: Marcos@dasilva.com.br">
                            </div>

                            <div class="form-group col-lg-2 col-md-2">
                                <label for="txtDataNasCliente">Data de Nascimento:</label>
                                <input name="txtDataNasCliente" type="date" class="form-control" id="txtDataNasCliente" value="<?php echo $Cliente['DataNasCliente']; ?>"placeholder="Ex: 01/01/1995">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-lg-2 col-md-2">
                                <label for="txtTelefoneCliente">Telefone:</label>
                                <input name="txtTelefoneCliente" type="tel" value="<?php echo $Cliente['TelefoneCliente']; ?>" class="form-control" id="txtTelefoneCliente" placeholder="(00) 2323-2323">
                            </div>        

                            <div class="form-group col-lg-2 col-md-2">
                                <label for="txtCelularCliente">Celular:</label>
                                <input name="txtCelularCliente" type="tel" value="<?php echo $Cliente['CelularCliente']; ?>" class="form-control" id="txtCelularCliente" placeholder="(00) 2323-2323">
                            </div>        

                            <div class="form-group col-lg-2 col-md-2">
                                <label for="txtCPFCliente">CPF:</label>
                                <input name="txtCPFCliente" type="text" class="form-control" id="txtCPFCliente" value="<?php echo $Cliente['CPFCliente']; ?>" placeholder="999.999-99">
                            </div>

                            <div class="form-group col-lg-2 col-md-2">
                                <label for="txtRGCliente">RG:</label>
                                <input name="txtRGCliente" type="text" class="form-control" id="txtRGCliente" value="<?php echo $Cliente['RGCliente']; ?>" placeholder="Ex: 5.759.933">
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <label>Sexo:</label>        
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="rdoSexoCliente" id="optionsRadios1" value="M" <?php if ($Cliente['SexoCliente'] == 'M'):echo 'checked';endif;?>>
                                        Masculino
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="rdoSexoCliente" id="optionsRadios2" value="F" <?php if ($Cliente['SexoCliente'] == 'F'):echo 'checked';endif;?>>
                                        Feminino
                                    </label>
                                </div>                       
                            </div>
                        </div>                    
 
                    
                                     
                </div> <!-- Dados Pessoais -->
                
                
                <!-- Endereço-->
                <div role="tabpanel" class="tab-pane" id="Endereco">                                                                                                                                             
                
                        
                
                        <div class="col-lg-10 col-md-10">                    
                    
                        <table class="table table-striped table-hover" id="tabEnderecosCliente">
                                    <thead>
                                            <tr>
                                                    <th data-field="CodEndereco">
                                                            Código
                                                    </th>
                                                    <th data-field="CEP">
                                                            CEP
                                                    </th>
                                                    <th data-field="Estado">
                                                            Estado
                                                    </th>
                                                    <th data-field="NomeCidade">
                                                            Cidade
                                                    </th>
                                                    <th data-field="Bairro">
                                                            Bairro
                                                    </th>
                                                    <th data-field="Rua">
                                                            Endereco
                                                    </th>
                                                    <th data-field="NumResidencia">
                                                            Numero
                                                    </th>
                                                    <th data-field="Complemento">
                                                            Complemento
                                                    </th>
                                                    <th data-formatter="ExibeOpcoesEndereco">
                                                            Ações
                                                    </th>
                                            </tr>
                                    </thead>


                                    <tbody>                                    

                                    </tbody>
                            </table>
                        </div>
                    
                        <div class="col-md-2 col-lg-2" id="divOpcoesEndereco">                            
                              <button class="btn btn-default" id="btnPopCadastroEndereco">
                                <span class="glyphicon glyphicon-plus" style=""></span> Adicionar Novo
                              </button>
                            
                        </div>

                </div>

            </div>        

            <div class="row">        
                <div class="col-md-12 col-lg-12" id="divBotoesForm">            
                    <button id="btnCadastrarCliente" type="submit" class="btn btn-default">Cadastrar</button>
                </div>
            </div>

        </div>
    
    </div>
        
</form>
    
</div>
    
<div id="divPopCadastroEndereco" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
</div>
    