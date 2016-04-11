

<h2>Cadastro de Pedidos</h2>


<div class="row row-CadastroPedido">
    
    <div class="col-md-12 column">

        <div id="divErros">

            <?php
                echo validation_errors();
            ?>  

        </div>
    
        <form id="frmCadastroPedido" name="frmCadastroPedido" method="post" action="<?php echo base_url('index.php/Pedido/Processar') ?>">         
                
        <div class="row">
            <div class="form-group col-lg-1 col-md-1 ">
                <label for="txtNrPedidoBanco">Pedido:</label>
                <input name="txtNrPedidoBanco" type="hidden" value="<?php echo $Pedido['NrPedidoBanco'] ?>" class="form-control" id="txtNrPedidoBanco">      
                <input name="txtNrPedido" type="text" disabled value="<?php echo $Pedido['NrPedido'] ?>" class="form-control" id="txtNrPedido">      
            </div>
            
            <div class="form-group col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 ">
                <label for="txtSitPedido">Situação:</label>
                <select name="txtSitPedido" class="form-control" id="txtSitPedido">                      
                    <option value="I" <?php if($Pedido['SitPedido'] == 'I'){echo 'selected';} ?> >Indeterminado</option>
                    <option value="D" <?php if($Pedido['SitPedido'] == 'D'){echo 'selected';} ?>>Digitado</option>
                    <option value="P" <?php if($Pedido['SitPedido'] == 'P'){echo 'selected';} ?>>Produção</option>
                    <option value="T" <?php if($Pedido['SitPedido'] == 'T'){echo 'selected';} ?>>Transporte</option>
                    <option value="E" <?php if($Pedido['SitPedido'] == 'E'){echo 'selected';} ?>>Encerado</option>
                </select>
            </div> 
            
            <div class="form-group col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 ">
                <label for="txtDataPedido">Data de emissão:</label>
                <input name="txtDataEmissao" type="date" value="<?php echo $Pedido['DataEmissao'] ?>" class="form-control" id="txtDataEmissao">                      
            </div>
            
            <div class="form-group col-lg-2  col-md-2 ">
                <label for="txtDataEntrega">Data de entrega:</label>
                <input name="txtDataEntrega" type="date" value="<?php echo $Pedido['DataEntrega'] ?>" class="form-control" id="txtDataEntrega">                      
            </div>            
        </div>
        
        <div class="row">
            <div class="form-group col-lg-1 col-md-1 ">
                <label for="txtCodVendedor">Vendedor:</label>
                <input name="txtCodVendedor"  type="text" value="<?php echo $Pedido['CodVendedor'] ?>" class="form-control" id="txtCodVendedor">                      
            </div>    
            <div class="form-group col-lg-5 col-md-5 ">
                <label for="txtNomeVendedor">Nome:</label>
                <input name="txtNomeVendedor" disabled type="text" value="" class="form-control" id="txtNomeVendedor">                      
            </div>     
            
            <div class="form-group col-lg-1 col-md-1 ">
                <label for="txtPercComissaoVendedor">Comissão:</label>
                <input name="txtPercComissao" type="text" value="<?php echo $Pedido['PercComissao'] ?>" class="form-control" id="txtPercComissao">                      
            </div>       
            
            <div class="form-group col-lg-4 col-md-4 ">
                <label for="txtFormaPagamento">Forma de Pagamento:</label>
                <select name="txtFormaPagamento" class="form-control" id="txtFormaPagamento">                      
                    <option value="1" <?php if($Pedido['FormaPagamento'] == '1'){echo 'selected';} ?> >Dinheiro</option>
                    <option value="2" <?php if($Pedido['FormaPagamento'] == '2'){echo 'selected';} ?>>Cheque</option>
                    <option value="3" <?php if($Pedido['FormaPagamento'] == '3'){echo 'selected';} ?>>Boleto</option>
                    <option value="4" <?php if($Pedido['FormaPagamento'] == '4'){echo 'selected';} ?>>Cartão de Crédito</option>
                    <option value="5" <?php if($Pedido['FormaPagamento'] == '5'){echo 'selected';} ?>>Cartão de Débito</option>
                </select>                      
            </div>            
               
        </div>
        
        <div class="row">
            <div class="form-group col-lg-1 col-md-1 ">
                <label for="txtCodCliente">Cliente:</label>
                <input name="txtCodCliente"  type="text" value="<?php echo $Pedido['CodCliente'] ?>" class="form-control" id="txtCodCliente">                      
            </div>    
            <div class="form-group col-lg-5 col-md-5 ">
                <label for="txtNomeCliente">Nome:</label>
                <input name="txtNomeCliente" disabled type="text" value="" class="form-control" id="txtNomeCliente">                      
            </div>     
            
            <div class="form-group col-lg-1 col-md-1 ">
                <label for="txtCodEndereco">Endereco:</label>
                <input name="txtCodEndereco"  type="text" value="<?php echo $Pedido['CodEndereco'] ?>" class="form-control" id="txtCodEndereco">                      
            </div> 
            <div class="form-group col-lg-5 col-md-5 ">
                <label for="txtEndereço">Descrição</label>
                <input name="txtEndereco" disabled type="text" value="" class="form-control" id="txtEndereco">                      
            </div>
        </div>        
                
        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#Itens" aria-controls="Itens" role="tab" data-toggle="tab">Itens</a></li>
              <li role="presentation"><a href="#tabValores" aria-controls="Valores" role="tab" data-toggle="tab">Valores</a></li>
              <li role="presentation"><a href="#Observacao" aria-controls="Observacao" role="tab" data-toggle="tab">Observação</a></li>
            </ul>

            <div class="tab-content">
                
                <!--Itens-->
                <div role="tabpanel" class="tab-pane active" id="Itens">
                    <div class="row">
                        <div class="col-md-10 column">
                            <table class="table table-striped table-hover" id="tabItens" data-click-to-select="true" data-height="250">
                                <thead>
                                    <tr>                                        
                                        <th data-field="IteSel" data-radio="true">
                                        </th>
                                        <th data-field="NrSeqIte">
                                                Nr Seq
                                        </th>
                                        <th data-field="CodProduto">
                                                Produto
                                        </th>
                                        <th data-field="CodVariante">
                                                Variante
                                        </th>
                                        <th data-field="QtdeItem">
                                                Quantidade
                                        </th>
                                        <th data-field="VlrUnitario">
                                                Vlr unit
                                        </th>
                                        <th data-field="VlrItem">
                                                Vlr Total
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>                                    

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="form-group col-lg-2 col-md-2 ">
                                    <label>Total de Itens:</label>
                                    <label id="lblTotalItens"></label>
                                    <input name="txtQtdeItens" type="hidden" value="<?php echo $Pedido['QtdeItens'] ?>" class="form-control" id="txtQtdeItens">                      
                                </div>
                                <div class="form-group col-lg-2 col-md-2 ">
                                    <label>Valor dos itens:</label>
                                    <label id="lblVlrItens"></label>
                                </div>                                
                                <div class="form-group col-lg-2 col-md-2 ">
                                    <label>Descontos:</label>
                                    <label id="lblVlrDesconto"></label>
                                </div>                                
                                <div class="form-group col-lg-2 col-md-2 ">
                                    <label>Outros valores:</label>
                                    <label id="lblOutrosValores"></label>
                                </div>                                                                                                
                                <div class="form-group col-lg-3 col-md-3 ">
                                    <label>Valor do pedido:</label>
                                    <label id="lblVlrPedido"></label>
                                </div>                                                                
                            </div>
                        </div>

                        <div class="col-md-2" id="divOpcoesItem">                            

                            <button class="btn btn-default btn-block" id="btnCadastroItem">
                                <span class="glyphicon glyphicon-plus" style=""></span> Adicionar 
                            </button>
                            <button class="btn btn-default btn-block" id="btnEdicaoItem">
                                <span class="glyphicon glyphicon-pencil" style=""></span> Editar
                            </button>        
                            <button class="btn btn-default btn-block" id="btnExcluirItem">
                                <span class="glyphicon glyphicon-minus" style=""></span> Excluir
                            </button>

                        </div>
                        
                    </div>            
                </div> 
                
                <!--Valores-->                
                <div role="tabpanel" class="tab-pane" id="tabValores">                                                                                                                                             
                    <div class="row">    

                        <div class="form-group col-lg-2 col-md-2 ">
                            <label for="txtVlrItensDis">Valor dos Itens:</label>
                            <input name="txtVlrItensDis"  disabled type="text" value="<?php echo $Pedido['VlrItens'] ?>" class="form-control" id="txtVlrItensDis">                      
                            <input name="txtVlrItens" type="hidden" value="<?php echo $Pedido['VlrItens'] ?>" class="form-control" id="txtVlrItens">                      
                        </div>    
                        <!--
                        <div class="form-group col-lg-2 col-md-2">
                            <label for="txtVlrComissaoDis">Valor Comissão:</label>
                            <input name="txtVlrComissaoDis" disabled type="text" value="<?php echo $Pedido['VlrComissao'] ?>" class="form-control" id="txtVlrComissaoDis">                      
                            <input name="txtVlrComissao" type="hidden" value="<?php echo $Pedido['VlrComissao'] ?>" class="form-control" id="txtVlrComissao">                      
                        </div> -->                         
                        <div class="form-group col-lg-2 col-md-2 ">
                            <label for="txtVlrFrete">Valor Frete:</label>
                            <input name="txtVlrFrete" type="text" value="<?php echo $Pedido['VlrFrete'] ?>" class="form-control" id="txtVlrFrete">                      
                        </div>     
                        <div class="form-group col-lg-2 col-md-2 ">
                            <label for="txtVlrOutDespesas">Valor outras desp.</label>
                            <input name="txtVlrOutDespesas" type="text" value="<?php echo $Pedido['VlrOutDespesas'] ?>" class="form-control" id="txtVlrOutDespesas">                      
                        </div>
                        <div class="form-group col-lg-2 col-md-2 ">
                            <label for="txtVlrDesconto">Valor desconto</label>
                            <input name="txtVlrDesconto" type="text" value="<?php echo $Pedido['VlrDesconto'] ?>" class="form-control" id="txtVlrDesconto">                      
                        </div>                        
                        <div class="form-group col-lg-2 col-md-2 ">
                            <label for="txtVlrPedido">Valor Pedido</label>
                            <input name="txtVlrPedidoDis" disabled type="text" value="<?php echo $Pedido['VlrPedido'] ?>" class="form-control" id="txtVlrPedidoDis">                      
                        </div>
                        <input name="txtVlrPedido" type="hidden" value="<?php echo $Pedido['VlrPedido'] ?>" class="form-control" id="txtVlrPedido">                      
                                                
                    </div>
                </div>    

                <!-- Observação -->
                <div role="tabpanel" class="tab-pane" id="Observacao">
                    <div class="row">

                        <div class="form-group col-lg-12 col-md-12 ">
                            <label for="txtObservacao">Observacao:</label>
                            <input name="txtObservacao" type="text" value="<?php echo $Pedido['Observacao'] ?>" class="form-control" id="txtObservacao">                      
                        </div>            
                               
                    </div>
                </div>                  
                                                                                                                                                    
            </div>         
                                                                               
        </div>

 <div class="row">
     
 </div>
        
        <div class="row">           
            <div class="col-mg-12 col-lg-12" id="divBotoesForm">
                <button type="submit" id="btnSubmitCadastroPedidos" class="btn btn-default">Salvar</button>
            </div>
        </div>
        </form>

    </div>
</div>     


<div id="divPopCadastroItem" class="modal fade" tabindex="-1" data-focus-on="#txtCodProduto" style="display: none;">
</div>