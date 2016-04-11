$(function(){
    
    $('#tabGrades').bootstrapTable({
        url: 'Grade/ListarGrades',                
    }).on('click-row.bs.table', function(e, row, $element){
            $('.success').removeClass('success')
            $($element).addClass('success')
            var index = $($element).attr('data-index')
            $('#tabGrades').bootstrapTable('uncheckAll')
            $('#tabGrades').bootstrapTable('check', index)
            AtualizaTamanhos()
    }).on('load-error.bs.table', function(e,row, $element){
        $('#tabGrades').bootstrapTable('hideLoading')
    })     
    

    $('#tabTamanhos').bootstrapTable({
        checkboxHeader: false
    }).on('click-row.bs.table', function(e, row, $element){
        $('.success').removeClass('success')
        $($element).addClass('success')
        var index = $($element).attr('data-index')
        $('#tabTamanhos').bootstrapTable('uncheckAll')
        $('#tabTamanhos').bootstrapTable('check', index)

    })     
        
    
    function BuscaCodGrade(){ 
        var linha = $('#tabGrades').bootstrapTable('getSelections')
        var selects = linha
        CodGrade = $.map(selects, function (row) {
            return row.CodGrade
        })        
        return CodGrade        
    }
    
    function BuscaCodTamanho(){   
        var linha = $('#tabTamanhos').bootstrapTable('getSelections')
        var selects = linha
        CodTamanho = $.map(selects, function (row) {
            return row.CodTamanho
        })        
        return CodTamanho        
    }
    
    
    function AtualizaTamanhos(){
        $('#tabTamanhos').bootstrapTable('destroy')
        $('#tabTamanhos').bootstrapTable({ url: 'Tamanho/BuscarTamanhos/'+BuscaCodGrade(), checkboxHeader: false  })
        $('#tabTamanhos').bootstrapTable('check', 0)
    }
    
    function AtualizaGrades(){
        $('#tabGrades').bootstrapTable('destroy')
        $('#tabGrades').bootstrapTable({ url: 'Grade/ListarGrades', checkboxHeader: false  })
        $('#tabGrades').bootstrapTable('check', 0)
    }
    
    var $modalGra = $('#divPopCadastroGrades');
    $('#btnPopCadastroGrades').on('click', function(){
    
        $('body').modalmanager('loading');      
        $modalGra.load('Grade/ExibirPopUp/', '', function(){
            $modalGra.modal();
        });
        
    });
    
    
    $('#btnPopEdicaoGrades').on('click', function(){
        
        if (BuscaCodGrade() == 0){
            alert('Nenhuma grade selecionada!')
            return
        }        
        $('body').modalmanager('loading');
      
        $modalGra.load('Grade/ExibirPopUp/'+BuscaCodGrade(), '', function(){
            $modalGra.modal();
        });
        
    });        
    
    $('#btnExcluirGrade').on('click', function(){
        ExcluiGrade()        
    })
    
    function ExcluiGrade(){
        if (BuscaCodGrade() == 0){
            alert('Nenhuma grade selecionada!')
            return
        }
        
        if (confirm('Deseja excluir esta Grade?')){
            $.ajax({
              url: 'Grade/Excluir/'+BuscaCodGrade(),                  
            }).done(function(e) {                
                AtualizaGrades();
                AtualizaTamanhos()
            });
        }
    }


    
    
    
    
    
    $('#divPopCadastroGrades').on('click','#btnSubmitCadastroGrades', function(e){
        GravaGrade()
        e.preventDefault()
    })
        
    function GravaGrade(){                
        $('#frmCadastroGrades').ajaxForm({ 
                success: showResponse,
        }).submit()	

        function showResponse(responseText, statusText, xhr, $form)  { 
            $('#btnResetCadastroGrades').click()
            AtualizaGrades()
        }
    
    }    

    
    
    
    
    
    

    
    
    
    var $modalTam = $('#divPopCadastroTamanhos');
    $('#btnPopCadastroTamanhos').on('click', function(){
        if (BuscaCodGrade() == 0){
            alert('Selecione uma grade para inserir um tamanho!')
            return
        }

        $('body').modalmanager('loading');
        $modalTam.load('Tamanho/ExibirPopUp/'+BuscaCodGrade(), '', function(){
            $modalTam.modal();            
        });        
    });


    $('#btnPopEditarTamanhos').on('click', function(){
        if (BuscaCodTamanho() == 0){
            alert('Selecione um tamanho para editar!')
            return
        }
        
        $('body').modalmanager('loading');
            $modalTam.load('Tamanho/ExibirPopUp/'+BuscaCodGrade()+'/'+BuscaCodTamanho(), '', function(){
            $modalTam.modal();
        });        
        
    });


    
    $('#divPopCadastroTamanhos').on('click','#btnSubmitCadastroTamanhos', function(e){        
        e.preventDefault()
        GravaTamanhos()        
    })   

    function GravaTamanhos(){     
        $('#frmCadastroTamanhos').ajaxForm({                
                success: showResponse,  // post-submit callback 
                dataType: "json"
        }).submit()
        
        function showResponse(responseText, statusText, xhr, $form)  { 
            if(responseText.status == 0){
                alert(responseText.erros)
            }else{
                $('#btnResetCadastroTamanhos').click()
                $('#tabTamanhos').bootstrapTable('refresh');
            }            
        }
    }       
       
    $('#btnPopExcluirTamanho').on('click', function(){
        ExcluiTamanho()        
    })
    
    
    function ExcluiTamanho()
    {
        if (BuscaCodTamanho() == 0)
        {
            alert('Nenhum Tamanho selecionado!')
            return
        }
        
        if (confirm('Deseja excluir este tamanho?'))
            {
                $.ajax({
                  url: 'Tamanho/Excluir/'+BuscaCodGrade()+'/'+BuscaCodTamanho(),                  
                }).done(function(e) {                                    
                    AtualizaTamanhos()
                });
            }
    }
   
    
})


/*
 * 
var ScrollLista




function PosicionaRolagem(Sentido)
    {
        var Limite
        var Atual
        
        switch(Sentido)        
        {
            case 'D':    
                Limite = $('div.bootstrap-table.table-ativa div.fixed-table-container').offset().top + $('div.bootstrap-table.table-ativa > div.fixed-table-container').outerHeight()
                Atual = $('.linhaSel').offset().top + $('.linhaSel').outerHeight() 
               
                var Excedente = Atual - Limite
                
                if(Excedente < 0)
                    return false
                break;
                                
            case 'S':

                Limite = $('div.bootstrap-table.table-ativa div.fixed-table-body').offset().top - $('div.bootstrap-table.table-ativa > div.fixed-table-header').outerHeight()
                Atual = $('.linhaSel').offset().top 
                
                var Excedente = Atual - Limite
                
                if(Excedente > 0)
                    return false
                break;
                 
            case 'C' :
                PosicionaRolagem('S')
                PosicionaRolagem('D')
                break
        }      
                        
       $('div.bootstrap-table.table-ativa div.fixed-table-body').scrollTop($('div.bootstrap-table.table-ativa div.fixed-table-body').scrollTop()+Excedente)

    }

    
 * 
 */




    //Controle das teclas cima e baixo
    //esquerda 37  direita 39     up 38      down 40	
   /* $(document).on('keydown', function(e){/* * verifica se o evento é Keycode (para IE e outros browsers) * se não for pega o evento Which (Firefox) */ 	  
     /*       var tecla = (e.keyCode?e.keyCode:e.which); /* verifica se a tecla pressionada foi o ENTER */ 
      /*      if(tecla == 38 && ScrollLista == true) // CIMA
                    {var atual = $('.linhaSel')                                       
                     if (atual.is( 'div.bootstrap-table.table-ativa > div.fixed-table-container > div.fixed-table-body > table > tbody > tr:first'))
                            {return true
                            }
                     $('div.bootstrap-table.table-ativa div.fixed-table-container div.fixed-table-body table tbody tr').removeClass('linhaSel')
                     $('div.bootstrap-table.table-ativa div.fixed-table-container div.fixed-table-body table tbody tr').eq(atual.index()-1).addClass('linhaSel')			 
                     AtualizaTamanhos()
                     PosicionaRolagem('S')
                     return false
                    }
            if(tecla == 40 && ScrollLista == true) // BAIXO
                    {var atual = $('.linhaSel')
                     if (atual.is('div.bootstrap-table.table-ativa > div.fixed-table-container > div.fixed-table-body > table > tbody > tr:last'))
                            {return true
                            }
                      
                     $('div.bootstrap-table.table-ativa div.fixed-table-container div.fixed-table-body table tbody tr').removeClass('linhaSel')
                     $('div.bootstrap-table.table-ativa div.fixed-table-container div.fixed-table-body table tbody tr').eq(atual.index()+1).addClass('linhaSel')			 
                     AtualizaTamanhos()
                     PosicionaRolagem('D')
                     return false
                    }
    })
    */
    