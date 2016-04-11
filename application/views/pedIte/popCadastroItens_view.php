  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo $Modo ?> de Item</h4>
  </div>

<div class="row">
    <div class="modal-body">

        <div id="divErros">

            <?php
                echo validation_errors();
            ?>  

        </div>
                
        <form method="get" action="<?php echo base_url('PedIte/Processar') ?>" name="frmCadastroItens" id="frmCadastroItens">
        
        <div class="col-md-12 column">
            

            <div class="row">
            <div class="form-group col-md-1 col-lg-1">
                <label for="txtNrSeqIte">Seq.</label>
                <input type="text" value=" <?php echo $Item['NrSeqIte']; ?>" disabled class="form-control" name="txtNrSeqIte">
                <input type="hidden" value= "<?php echo $Item['NrSeqIteBanco'] ?>" class="form-control" id="txtNrSeqIteBanco" name="txtNrSeqIteBanco">
                <input type="hidden" value= "<?php echo $Item['NrPedido'] ?>" class="form-control" id="txtNrPedido" name="txtNrPedido">
            </div>        
            </div>

            <div class="row">
                <div class="form-group col-md-2 col-lg-2">
                    <label for="txtCodProduto">Produto</label>
                    <input type="text" id="txtCodProduto" name="txtCodProduto" value="<?php echo $Item['CodProduto']; ?>" class="form-control" >
                    <input type="hidden" id="txtCodGrade" name="txtCodGrade" class="form-control" >
                </div>
                <div class="form-group col-md-9 col-lg-9">
                    <label for="txtDescProduto">Descrição</label>
                    <input type="text" disabled id="txtDescProduto" name="txtDescProduto" class="form-control" >
                </div>                
            </div>

            <div class="row">
                <div class="form-group col-md-2 col-lg-2">
                    <label for="txtCodVariante">Variante</label>
                    <input type="text" id="txtCodVariante" name="txtCodVariante" value=" <?php echo $Item['CodVariante']; ?>" class="form-control" >
                </div>        
                <div class="form-group col-md-9 col-lg-9">
                    <label for="txtDescVariante">Variante</label>
                    <input type="text" disabled name="txtDescVariante" id="txtDescVariante" class="form-control" >
                </div>                        
            </div>

            <div class="row">
                <div class="form-group col-md-2 col-lg-2">
                    <label for="txtQtdeItem">Quantidade</label>
                    <input type="text" name="txtQtdeItem" id="txtQtdeItem" value=" <?php echo $Item['QtdeItem']; ?>" class="form-control" >
                </div>        



                <div class="form-group col-md-2 col-lg-2">
                    <label for="txtVlrUnitario">Vlr Unitário</label>
                    <input type="text" name="txtVlrUnitario" id="txtVlrUnitario" value=" <?php echo $Item['VlrUnitario']; ?>" class="form-control" >
                </div>        
            </div>
            
            <div id="rowQtdeGrade">
                <div class="row">
                    <div class="form-group col-md-2 col-lg-2">
                        <label>Grade</label>                                           
                    </div>
                </div>                        
                <div class="row" id="rowQtdeTamanhos">
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade1">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem1" name="txtQtdeItem1" value=" <?php echo $Item['QtdeItem1']; ?>" class="form-control" >
                    </div>
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade2">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem2" name="txtQtdeItem2" value=" <?php echo $Item['QtdeItem2']; ?>" class="form-control" >
                    </div>                    
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade3">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem3" name="txtQtdeItem3" value=" <?php echo $Item['QtdeItem3']; ?>" class="form-control" >
                    </div>                    
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade4">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem4" name="txtQtdeItem4" value=" <?php echo $Item['QtdeItem4']; ?>" class="form-control" >
                    </div>                    
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade5">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem5" name="txtQtdeItem5" value=" <?php echo $Item['QtdeItem5']; ?>" class="form-control" >
                    </div>                    
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade6">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem6" name="txtQtdeItem6" value=" <?php echo $Item['QtdeItem6']; ?>" class="form-control" >
                    </div>                    
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade7">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem7" name="txtQtdeItem7" value=" <?php echo $Item['QtdeItem7']; ?>" class="form-control" >
                    </div>                    
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade8">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem8" name="txtQtdeItem8" value=" <?php echo $Item['QtdeItem8']; ?>" class="form-control" >
                    </div>                    
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade9">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem9" name="txtQtdeItem9" value=" <?php echo $Item['QtdeItem9']; ?>" class="form-control" >
                    </div>                                        
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade10">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem10" name="txtQtdeItem10" value=" <?php echo $Item['QtdeItem10']; ?>" class="form-control" >
                    </div>                                        
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade11">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem11" name="txtQtdeItem11" value=" <?php echo $Item['QtdeItem11']; ?>" class="form-control" >
                    </div>                                        
                    <div class="form-group col-md-1 col-lg-1 divTamanhoGrade" id="divGrade12">
                        <label></label>                                           
                        <input type="text" id="txtQtdeItem12" name="txtQtdeItem12" value=" <?php echo $Item['QtdeItem12']; ?>" class="form-control" >
                    </div>                                                            
                </div>          
            </div>
            
        </div>
    </div>
</div>
  <div class="modal-footer">
      <button type="submit" id="btnSubmitCadastroItens" class="btn btn-primary">Salvar</button>
      <button type="reset" id="btnResetCadastroItens" data-dismiss="modal" class="btn btn-default">Cancelar</button>    
  </div>
      
    </form>