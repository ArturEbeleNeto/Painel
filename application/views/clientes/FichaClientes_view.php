

<h2>Ficha de Clientes</h2>


<div class="row row-CadastroCliente">
    
    <div class="col-md-12 column">     

        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#DadosPessoais" aria-controls="home" role="tab" data-toggle="tab">Dados Pessoais</a></li>
              <li role="presentation"><a href="#Endereco" aria-controls="Endereco" role="tab" data-toggle="tab">Endereço</a></li>
              <li role="presentation"><a href="#Acesso" aria-controls="Acesso" role="tab" data-toggle="tab">Acesso</a></li>
              <!--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                
                <!-- Dados Pessoais -->
                <div role="tabpanel" class="tab-pane active" id="DadosPessoais">

                    <input name="txtCodigoCliente" type="hidden" value="<?php echo $Cliente[0]['CodCliente'] ?>" class="form-control" id="txtCodCliente">      

                    <div class="form-group">
                        <label for="txtNomeCliente">Nome:</label>
                        <p name="txtNomeCliente" class="form-control-static" id="txtNomeCliente" ><?php echo $Cliente[0]['NomeCliente'] ?> </p>
                    </div>

                    <div class="form-group">
                        <label for="txtSobreNomeCliente">Sobre Nome:</label>
                        <!--<input name="txtSobreNomeCliente" type="text" value="<?php echo $Cliente[0]['SobreNomeCliente']; ?>" class="form-control" id="txtSobreNomeCliente" placeholder="Ex: da silva jr.">-->
                        <p name="txtSobreNomeCliente" class="form-control-static" id="txtSobreNomeCliente"> <?php echo $Cliente[0]['SobreNomeCliente']; ?> </P>
                    </div>

                    <div class="form-group">
                        <label for="txtEmailCliente">Email:</label>
                        <!--<input name="txtEmailCliente" type="email" value="<?php echo $Cliente[0]['EmailCliente']; ?>" class="form-control" id="txtEmailCliente" placeholder="Ex: Marcos@dasilva.com.br">-->
                        <p class="form-control-static" id="txtEmailCliente" name="txtEmailCliente" type="email"> <?php echo $Cliente[0]['EmailCliente'];?> </p>
                        
                    </div>

                    <div class="form-group">
                        <label for="txtTelefoneCliente">Telefone:</label>
                        <!--<input name="txtTelefoneCliente" type="tel" value="<?php echo $Cliente[0]['TelefoneCliente']; ?>" class="form-control" id="txtTelefoneCliente" placeholder="(00) 2323-2323">-->
                        <p name="txtTelefoneCliente" class="form-control-static" id="txtTelefoneCliente" > <?php echo $Cliente[0]['TelefoneCliente']; ?> </p>
                    </div>        

                    <div class="form-group">
                        <label for="txtCelularCliente">Celular:</label>
                        <!--<input name="txtCelularCliente" type="tel" value="<?php echo $Cliente[0]['CelularCliente']; ?>" class="form-control" id="txtCelularCliente" placeholder="(00) 2323-2323">-->
                        <p name="txtCelularCliente" class="form-control-static" id="txtCelularCliente"><?php echo $Cliente[0]['CelularCliente']; ?> </p> 
                    </div>        

                    
                    

                    <div class="form-group">
                        <label for="optionsRadios">Sexo:</label>                                                        
                        <p type="radio" name="rdoSexoCliente" id="optionsRadios" class="form-control-static" > <?php if ($Cliente[0]['SexoCliente'] == 'M'){echo 'Masculino';} else {echo 'Feminino';}?>  </p>                                               
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="txtCPFCliente">CPF:</label>
                        <!--<input name="txtCPFCliente" type="text" class="form-control" id="txtCPFCliente" value="<?php echo $Cliente[0]['CPFCliente']; ?>" placeholder="999.999-99">-->
                        <p name="txtCPFCliente" type="text" class="form-control-static" id="txtCPFCliente"><?php echo $Cliente[0]['CPFCliente']; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="txtRGCliente">RG:</label>
                        <!--<input name="txtRGCliente" type="text" class="form-control" id="txtRGCliente" value="<?php echo $Cliente[0]['RGCliente']; ?>" placeholder="Ex: 5.759.933">-->
                        <p name="txtRGCliente" type="text" class="form-control-static" id="txtRGCliente"><?php echo $Cliente[0]['RGCliente']; ?></p>
                    </div>

                    <div class="form-group">
                        <label for="txtDataNasCliente">Data de Nascimento:</label>
                        <!--<input name="txtDataNasCliente" type="date" class="form-control" id="txtDataNasCliente" value="<?php echo $Cliente[0]['DataNasCliente']; ?>"placeholder="Ex: 01/01/1995">-->
                        <p name="txtDataNasCliente" type="date" class="form-control-static" id="txtDataNasCliente"> <?php echo $Cliente[0]['DataNasCliente']; ?></p>
                    </div>
                    
                    
                    <?php echo anchor('Cliente/Editar/'.$Cliente[0]['CodCliente'],'
                      <button class="btn btn-default">
                        <span class="glyphicon glyphicon-pencil" style=""></span> Editar
                      </button>');
                    ?>     
                    
                    
 
                </div> <!-- Dados Pessoais -->
                
                
                <!-- Endereço-->
                <div role="tabpanel" class="tab-pane" id="Endereco">                                                                                                                                             

                    <input name="txtCodEndereco" type="hidden" value="" class="form-control" id="txtCodEndereco">                    

                    
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							Código
						</th>
						<th>
							CEP
						</th>
                                                <th>
							Estado
						</th>
						<th>
							Cidade
						</th>
						<th>
							Bairro
						</th>
                                                <th>
							Endereco
						</th>
                                                <th>
							Numero
						</th>
                                                <th>
							Complemento
						</th>
                                                <th>
							Ações
						</th>
					</tr>
				</thead>
                                
                                
    				<tbody>

                                <?php                                   

                                if ($Enderecos == NULL)
                                {
                                    echo '
                                    <tr>
                                        <td colspan="9">
                                                Nenhum endereço cadastrado
                                        </td>                                    
                                    </tr>';
                                }
                                else
                                {    
                                    foreach ($Enderecos as $End)
                                    {

                                        echo '
                                            <tr>
                                                    <td>
                                                            '.$End['CodEndereco'].'
                                                    </td>
                                                    <td>
                                                            '.$End['CEP'].'
                                                    </td>
                                                    <td>
                                                            '. $End['Estado'] .'
                                                    </td>
                                                    <td>
                                                            '.$End['Cidade'].'
                                                    </td>
                                                    <td>
                                                            '.$End['Bairro'].'
                                                    </td>
                                                    <td>
                                                            '.$End['Rua'].'
                                                    </td>
                                                    <td>
                                                            '.$End['NumResidencia'].'
                                                    </td>
                                                    <td>
                                                            '.$End['Complemento'].'
                                                    </td>
                                                    <td>
                                                            '. anchor('Endereco/Excluir/'.$Cliente[0]['CodCliente'].'/'.$End['CodEndereco'],'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>').'
                                                    </td>
                                            </tr>
                                            ';
                                    }
                                                                                                                                                                                   
                                }
                                ?>
                                    
                                    
				</tbody>
			</table>
                    
                    
                    <?php echo anchor('Endereco/Cadastro/'.$Cliente[0]['CodCliente'],'
                      <button class="btn btn-default">
                        <span class="glyphicon glyphicon-plus" style=""></span> Adicionar Novo
                      </button>');
                    ?>     
      
                    
                    
                    
<!--                    
                    <div class="form-group">
                      <label for="txtCEPCliente">CEP:</label>
                      <!--<input name="txtCEPCliente" type="text" value="" class="form-control" id="txtCEPCliente" placeholder="Ex: 88360-00">-->
    <!--                  <p name="txtCEPCliente" type="text" value="" class="form-control-static" id="txtCEPCliente"><?php echo $Enderecos[0]['CEP'] ?></p>
                    </div>

                    <div class="form-group">
                      <label for="txtRuaCliente">Rua:</label>
                      <!--<input name="txtRuaCliente" type="text" value="" class="form-control" id="txtRuaCliente" placeholder="Ex: Rua 7 de aio">-->
<!--                      <p name="txtRuaCliente" type="text" value="" class="form-control-static" id="txtRuaCliente"><?php echo $Enderecos[0]['Rua'] ?></p>
                    </div>

                    <div class="form-group">
                      <label for="txtNumResidenciaCliente">Número residencial:</label>
                      <!--<input name="txtNumResidenciaCliente" type="text" value="" class="form-control" id="txtNumResidenciaCliente" placeholder="Ex: 242">-->
<!--                      <p name="txtNumResidenciaCliente" type="text" value="" class="form-control-static" id="txtNumResidenciaCliente"> <?php echo $Enderecos[0]['NumResidencia'] ?> </p>
                    </div>

                    <div class="form-group">
                      <label for="txtComplementoCliente">Complemento:</label>
                      <!--<input name="txtComplementoCliente" type="text" value="" class="form-control" id="txtComplementoCliente" placeholder="Ex: Galpão 2">-->
<!--                      <p name="txtComplementoCliente" class="form-control-static" id="txtComplementoCliente"> <?php echo $Enderecos[0]['Complemento'] ?> </p>
                    </div>

                    <div class="form-group">
                        <label for="txtEstadoCliente">Estado:</label>
                        <p class="form-control-static" name="txtEstadoCliente" id="txtEstadoCliente"> <?php echo $Enderecos[0]['Estado'] ?> </p>
                    </div>

                    <div class="form-group">
                        <label for="txtCidadeCliente">Cidade:</label>
                        <p class="form-control-static" name="txtCidadeCliente" id="txtCidadeCliente"><?php echo $Enderecos[0]['Cidade'] ?> </p>
                    </div>

                    <div class="form-group">
                      <label for="txtBairroCliente">Bairro:</label>
                      <!--<input name="txtBairroCliente" type="text" value="" class="form-control" id="txtBairroCliente" placeholder="Ex: Baiiro alto">-->
<!--                      <p name="txtBairroCliente" class="form-control-static" id="txtBairroCliente"> <?php echo $Enderecos[0]['Bairro'] ?> </p>
                    </div>

                    <div class="form-group">
                      <label for="txtReferenciaCliente">Referência:</label>
                      <!--<input name="txtReferenciaCliente" type="text" value="" class="form-control" id="txtReferenciaCliente" placeholder="Ex: em frente a igreja">-->
<!--                      <p name="txtReferenciaCliente" class="form-control-static" id="txtReferenciaCliente"> <?php echo $Enderecos[0]['Referencia'] ?> </p>
                    </div>        

                    <div class="form-group">
                      <label for="txtNomeContato">Nome de contato:</label>
                      <!--<input name="txtNomeContato" type="text" value="" class="form-control" id="txtNomeContato" placeholder="Ex: Artur">-->
<!--                      <p name="txtNomeContato" class="form-control-static" id="txtNomeContato"> <?php echo $Enderecos[0]['NomeContato'] ?> </p>
                    </div> 

                    <div class="form-group">
                      <label for="txtTelefoneContato">Telefone de contato:</label>
                      <!--<input name="txtTelefoneContato" type="text" value="" class="form-control" id="txtTelefoneContato" placeholder="(00) 2323-2323">-->
<!--                      <p name="txtTelefoneContato" class="form-control-static" id="txtTelefoneContato"> <?php echo $Enderecos[0]['TelefoneContato'] ?> </p>
                    </div>        
              
                   
    -->                
                </div><!-- Endereço -->
                
                
                <!-- Acesso -->
                <div role="tabpanel" class="tab-pane" id="Acesso">
                    <div class="form-group">
                        <label for="txtSenhaCliente">Senha</label>
                        <input name="txtSenhaCliente" type="password" class="form-control" id="txtSenhaCliente" placeholder="Senha">
                    </div>

                    <div class="form-group">          
                        <input name="txtConfirmaSenha" type="password" class="form-control" id="txtConfirmaSenha" placeholder="Repita sua senha">
                    </div>             
                    
                </div><!-- Acesso -->
                <!--<div role="tabpanel" class="tab-pane" id="settings">..bbb.</div>-->
                                
            </div>

        </div>        


    </div>
</div>       