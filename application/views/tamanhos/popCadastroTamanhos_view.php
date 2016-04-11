  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo $Modo ?> de Tamanhos</h4>
  </div>

    <form method="get" action="<?php echo base_url('Tamanho/Processar')?>" name="frmCadastroTamanhos" id="frmCadastroTamanhos">
    
    <div class="modal-body">
        
        <div class="form-group">
            <label for="txtCodGrade">Cógigo grade</label>
            <input type="text"  value="<?php echo $Tamanho['CodGrade'] ?>" class="form-control" id="CodGrade" name="CodGrade" disabled>
            <input type="hidden"  value="<?php echo $Tamanho['CodGrade'] ?>" class="form-control" id="txtCodGrade" name="txtCodGrade">
            <input type="hidden"  value="<?php echo  $CadastroTam ?>" class="form-control" id="txtCadastroTam" name="txtCadastroTam">
            <input type="hidden"  value="<?php echo  $Tamanho['NrSeqTam'] ?>" class="form-control" id="txtNrSeqTam" name="txtNrSeqTam">
        </div>

        <div class="form-group">
            <label for="txtCodTamanho">Tamanho</label>
            <input type="text" class="form-control" id="txtCodTamanho" name="txtCodTamanho" value="<?php echo $Tamanho['CodTamanho']?>" placeholder="Ex. 4">            
        </div>
        
        <div class="form-group">
            <label for="txtDescTamanho">Descrição</label>
            <input type="text" class="form-control" id="txtDescTamanho" name="txtDescTamanho" value="<?php echo $Tamanho['DescTamanho'] ?>" placeholder="Ex. Padrão">
        </div>    
        <div class="form-group">
            <label for="txtProporcao">Proporção:</label>
            <input type="text" class="form-control" id="txtProporcao" name="txtProporcao" value="<?php echo $Tamanho['Proporcao'] ?>" placeholder="1">
        </div>    
        
  </div>
  <div class="modal-footer">
      <button type="submit" id="btnSubmitCadastroTamanhos" class="btn btn-primary">Salvar</button>
      <button type="reset" id="btnResetCadastroTamanhos" data-dismiss="modal" class="btn btn-default">Cancelar</button>    
  </div>
      
    </form>
