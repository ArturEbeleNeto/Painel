  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo $Modo ?> de Grades</h4>
  </div>

  <?php
    if ($Grade['CodGrade'] <> ''){     
        echo '<form method="post" action="'.base_url('Grade/Editar').'" name="frmCadastroGrades" id="frmCadastroGrades">';
    }       
    else
    {
        echo '<form method="post" action="'.base_url('Grade/Gravar').'" name="frmCadastroGrades" id="frmCadastroGrades">';
    }        
  ?>
    <div class="modal-body">
    
    
    <?php
        if ($Grade['CodGrade'] <> ''){            
            echo '
        <div class="form-group">
            <label for="txtCodGrade">Cógigo</label>
            <input type="text" value="'.$Grade['CodGrade'].'" disabled class="form-control" >
        </div>';
        }
    ?>
        <input type="hidden" value= <?php echo  '"'.$Grade['CodGrade'].'"' ?> class="form-control" id="txtCodGrade" name="txtCodGrade">
        
        <div class="form-group">
            <label for="txtDescGrade">Descrição</label>
            <input type="text" value= <?php echo  '"'.$Grade['DescGrade'].'"' ?> class="form-control" id="txtDescGrade" name="txtDescGrade" placeholder="Ex. Padrão">
        </div>
        
        <label>Situação</label>
        <div class="radio">
            <label>
                <input type="radio" name="txtSitGrade" id="txtSitGrade1" value="A" <?php if ($Grade['SitGrade'] <> 'I'){echo 'checked';} ?> >
                Ativo
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="txtSitGrade" id="optionsRadios2" value="I" <?php if ($Grade['SitGrade'] == 'I'){echo 'checked';} ?> >
                Inativo
            </label>
        </div>
        
  </div>
  <div class="modal-footer">
      <button type="submit" id="btnSubmitCadastroGrades" class="btn btn-primary">Salvar</button>
      <button type="reset" id="btnResetCadastroGrades" data-dismiss="modal" class="btn btn-default">Cancelar</button>    
  </div>
      
    </form>