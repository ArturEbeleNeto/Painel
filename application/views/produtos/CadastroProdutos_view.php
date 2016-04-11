

<h2>Cadastro de Produtos</h2>


<div class="row row-CadastroProduto">
    
    <div id="divErros">
        
    <?php
        echo validation_errors();
    ?>  
        
    </div>
    
    <form id="frmCadastroProduto" enctype="multipart/form-data" name="frmCadastroProduto" method="post" action="<?php echo base_url('index.php/Produto/ProcessarProduto'); ?>">
    
    <div class="col-lg-12 col-md-12">        
        
        <div class="row">

            <div class="form-group col-lg-1 col-md-1 ">
                <label for="txtCodProduto">Código:</label>
                <input disabled name="txtCodProduto" type="text" value="<?php echo $Produto['CodProduto'] ?>" class="form-control" id="txtCodProduto">                
                <input name="txtCodProdutoBanco" type="hidden" value="<?php echo $Produto['CodProdutoBanco'] ?>"  id="txtCodProdutoBanco">
            </div>        

   
            <div class="form-group col-lg-3 col-md-3 ">
                <label for="txtRefProduto">Referência:</label>
                <input name="txtRefProduto" type="text" value="<?php echo $Produto['RefProduto'] ?>" class="form-control" id="txtRefProduto">
            </div>

            <div class="form-group col-lg-10 col-md-10 ">
                <label for="txtDescProduto">Descrição:</label>
                <input name="txtDescProduto" id="txtDescProduto" value="<?php echo $Produto['DescProduto'] ?>" class="form-control" type="text">
            </div>
        </div>
        
    </div>
    
    
    <div class="col-md-12 column">     

        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#Cadastro" aria-controls="home" role="tab" data-toggle="tab">Cadastro</a></li>
              <li role="presentation"><a href="#Variantes" aria-controls="Variantes" role="tab" data-toggle="tab">Variantes</a></li>
              <li role="presentation"><a href="#Financeiro" aria-controls="Financeiro" role="tab" data-toggle="tab">Financeiro</a></li>
              <li role="presentation"><a href="#Imagens" aria-controls="Imagens" role="tab" data-toggle="tab">Imagens</a></li>
              <!--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                
                <!-- Dados Pessoais -->
                <div role="tabpanel" class="tab-pane active" id="Cadastro">

 
                    <div class="row">

                        <div class="form-group col-lg-6 col-md-6">
                            <label for="txtDescReduzida">Descrição Reduzida:</label>
                            <input name="txtDescReduzida" id="txtDescReduzida" value="<?php echo $Produto['DescReduzida'] ?>" class="form-control" type="text">
                        </div>

                        <div class="form-group  col-md-2 col-lg-2">
                            <label for="txtUniProduto">Unidade:</label>
                            <input name="txtUniProduto" id="txtUniProduto" value="<?php echo $Produto['UniProduto'] ?>" class="form-control" type="text">
                        </div>


                        <div class="form-group col-md-4 col-lg-4">
                            <label for="txtCompProduto">Composição:</label>
                            <input name="txtCompProduto" id="txtCompProduto" value="<?php echo $Produto['CompProduto'] ?>" class="form-control" type="text">
                        </div>
                        
                    </div>
                    
                    
                    <div class="row">

                        <div class="form-group col-md-4 col-lg-4">
                            <label for="txtCodLinha">Linha:</label>
                            <input name="txtCodLinha" id="txtCodLinha" value="<?php echo $Produto['CodLinha'] ?>" class="form-control" type="text">
                        </div>

                        <div class="form-group col-md-4 col-lg-4">
                            <label for="txtCodCategoria">Categoria:</label>
                            <input name="txtCodCategoria" id="txtCodCategoria" value="<?php echo $Produto['CodCategoria'] ?>" class="form-control" type="text">
                        </div>

                        <div class="form-group col-md-4 col-lg-4">
                            <label for="txtCodColecao">Coleção:</label>
                            <input name="txtCodColecao" id="txtCodColecao" value="<?php echo $Produto['CodColecao'] ?>" class="form-control" type="text">
                        </div>

                    </div>    
                    
                    <div class="row">                    
                        <div class="form-group col-md-1 col-lg-1">
                            <label for="txtCodGrade">Grade:</label>
                            <input name="txtCodGrade" id="txtCodGrade" value="<?php echo $Produto['CodGrade'] ?>" class="form-control" type="text">
                        </div>
                        <div class="form-group col-md-5 col-lg-5">
                            <label for="txtDescGrade">Descrição:</label>
                            <input name="txtDescGrade" id="txtDescGrade" class="form-control" disabled="" type="text">
                        </div>                        
                    </div>
                    
                    <div class="row">

                        
                        <div class="col-md-3 col-lg-3">
                            <label>Gênero:</label>        
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rdoGeneroProduto" id="optionsRadios1" value="M" <?php if ($Produto['GeneroProduto'] == 'M'):echo 'checked';endif;?>>
                                    Masculino
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rdoGeneroProduto" id="optionsRadios2" value="F" <?php if ($Produto['GeneroProduto'] == 'F'):echo 'checked';endif;?>>
                                    Feminino
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rdoGeneroProduto" id="optionsRadios3" value="U" <?php if ($Produto['GeneroProduto'] == 'U'):echo 'checked';endif;?>>
                                    Unisex
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">

                            <label>Situação:</label>        
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rdoSeAtivo" id="optionsRadios1" value="A" <?php if ($Produto['SeAtivo'] == 'A'):echo 'checked';endif;?>>
                                    Ativo
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rdoSeAtivo" id="optionsRadios2" value="I" <?php if ($Produto['SeAtivo'] == 'I'):echo 'checked';endif;?>>
                                    Inativo
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <label>Exibir no site:</label>        
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rdoSeProdutoSite" id="optionsRadios1" value="S" <?php if ($Produto['SeProdutoSite'] == 'S'):echo 'checked';endif;?>>
                                    Sim
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rdoSeProdutoSite" id="optionsRadios2" value="N" <?php if ($Produto['SeProdutoSite'] == 'N'):echo 'checked';endif;?>>
                                    Não
                                </label>
                            </div>
                        </div>

                    </div>                    
                    
 
                </div> 
                
                                
                <div role="tabpanel" class="tab-pane" id="Variantes">                                                                                                                                             

                    
                    <div class="row">    
                
                        <div class="col-lg-10 col-md-10">
                            <table class="table table-striped table-hover" id="tabVariantesProduto" data-height="200">
                                    <thead>
                                            <tr>
                                                    <th data-field="CodVariante">
                                                            Código
                                                    </th>
                                                    <th data-field="DescVariante">
                                                            Descrição
                                                    </th>
                                                    <th data-field="HexaDecimal" data-formatter="ExibeCor">
                                                            Cor
                                                    </th>
                                                    <th data-field="RefVariante">
                                                            Referência
                                                    </th>
                                                    <th data-field="opcoes" data-formatter="ExibeOpcoes">
                                                            Opções
                                                    </th>
                                            </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>

                            </table>     
                        </div>
                        <div class="col-md-2 col-lg-2" id="divOpcoesVariante">
                            <button class="btn btn-default" id="btnPopPesqVariantes">
                                <span class="glyphicon glyphicon-plus" style=""></span> Adicionar 
                            </button> 
                        </div>
                    </div>
                    

                    <div id="divPopPesqVariantes" class="modal fade col-lg-12 col-md-12 " tabindex="-1" data-focus-on="input:first" style="display: none;">
                    </div>
                     
                    
                </div>    
                   
                    
      
                    
                
                
                
                <!-- Financeiro -->
                <div role="tabpanel" class="tab-pane" id="Financeiro">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="txtVlrCustoProduto">Valor de custo:</label>
                                <input name="txtVlrCustoProduto" value="<?php echo $Produto['VlrCustoProduto'] ?>" type="text" class="form-control" id="txtVlrCustoProduto" placeholder="Ex: 20,50">
                            </div>    
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="txtPercLucroProduto">Percentual de lucro:</label>
                                <input name="txtPercLucroProduto" value="<?php echo $Produto['PercLucroProduto'] ?>" type="text" class="form-control" id="txtPercLucroProduto" placeholder="Ex: 15,00">
                            </div>    
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="txtVlrVendaProduto">Valor de venda:</label>
                                <input name="txtVlrVendaProduto" value="<?php echo $Produto['VlrVendaProduto'] ?>" type="text" class="form-control" id="txtVlrVendaProduto" placeholder="Ex: 30,45">
                            </div>    
                        </div>                    
                    </div>

                </div><!-- financeiro-->

                   
                <!-- Imagens -->
                <div role="tabpanel" class="tab-pane" id="Imagens">

                    
                    
                    <div class="row">    
                
                        <div class="col-lg-10 col-md-10">
                            <table class="table table-striped table-hover" id="tabImagensProduto" >
                                    <thead>
                                            <tr>
                                                    <th data-field="DirImagem" data-formatter="ExibeImagem">
                                                            Imagem       
                                                    </th>
                                                    <th data-field="NomeImagem">
                                                            Nome
                                                    </th>
                                                    <th data-field="TamanhoImagem">
                                                            Tamanho
                                                    </th>
                                                    <th data-field="TipoImagem">
                                                            Tipo
                                                    </th>
                                                    <th data-field="opcoes" data-formatter="ExibeOpcoesImg">
                                                            Opções
                                                    </th>
                                            </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>

                            </table>     
                        </div>
                        <div class="col-md-2 col-lg-2" id="divOpcoesImagem">
                            <button class="btn btn-default" id="btnAdicionarImagem">
                                <span class="glyphicon glyphicon-plus" style=""></span> Adicionar 
                            </button> 
                        </div>
                    </div>
                    
                    
                   
                </div>

                                                                                                                                                    
            </div>
            <!--<div role="tabpanel" class="tab-pane" id="settings">..bbb.</div>-->
                                                                               
            </div>

        </div>
        
        
    </div> 
    <div class="row">        
        <div class="col-md-12 col-lg-12" id="divBotoesForm">
            
                <button type="submit" id="btnCadastrarProduto" class="btn btn-default">Cadastrar</button>
                <button type="button" id="btnCancelarCadastroProduto" class="btn btn-default">Cancelar</button>
            
        </div>
    </div>
   
    </form>    
    
    <form name="frmUploadImagens" id="frmUploadImagens" method="POST" action=" <?php echo base_url('Imagem/Gravar/'.$Produto['CodProduto']) ?> ">       
        <input type="file" id="fleUserFile" name="userfile" />   
    </form>
    
   
    
    
    
    
    
          