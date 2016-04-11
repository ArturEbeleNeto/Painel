function ExibeCor(value) {       
    return '<div style="background-color: #'+value+'; width: 20px; height: 20px; Border: 1px solid Black; Margin: 0 auto;"></div> ';
}    

function ExibeOpcoes(value, row) {       
    return '<a><span class="glyphicon glyphicon-remove link-Excluir" aria-hidden="true" CodProduto="'+row.CodProduto+'" CodVariante="'+row.CodVariante+'"></span></a>'
    //href="'+BASEURL+'VarianteProduto/Excluir/'+row.CodProduto+'/'+row.CodVariante+'"></a>'
}    
function ExibeImagem(value, row) {       
    return '<img class="img-responsive ImagemProduto" alt="'+row.NomeImagem+'" src="'+ row.DirImagem +'"/>'
}    
function ExibeOpcoesImg(value, row) {       
    return '<a><span class="glyphicon glyphicon-remove link-Excluir-Img" aria-hidden="true" CodImagem ="'+row.CodImagem+'" Img="'+row.DirImagem+'"></span></a>'  
}


$(function(){   
    
    var CodProduto = $('#txtCodProduto').val()

    $('#btnCadastrarProduto').on('click', function(e){
        e.preventDefault()
        EfetuaCadastroProduto(function(){
            window.location.href = BASEURL+'Produto'
        })                
    })

    
    
    function VerificaCadastroProduto(fn){
      
        $.ajax({
          url: BASEURL + 'Produto/BuscaProduto/'+CodProduto,         
        }).done(function(e) { 
            if (e == '1'){                
                fn()                
            }
            else{                    
                EfetuaCadastroProduto(fn)
            }   
            
        }); 
        
    }
   
    
    function EfetuaCadastroProduto(fn){
        $('#frmCadastroProduto').ajaxForm({ 
            success: showResponse,  // post-submit callback            
            dataType: "json",
            error: function(request, status, error) {
                    console.log(error);
            }            
        }).submit()	

        function showResponse(responseText, statusText, xhr, $form)  {             
            
            if (responseText.status == '1') {            
                $('#divErros').html('')
                $('#txtCodProdutoBanco').val($('#txtCodProduto').val())                
                fn()
            }
            else {                           
                $('#divErros').html(responseText.erros)
            }
        }        
                
    } 
    
    
    //Busca Grade do produto 
    function BuscaGrade(){
        var Grade = $('#txtCodGrade').val()
        
        if(Grade > 0){
            $.ajax({
              url: BASEURL + 'Grade/ListarGrades/'+ Grade,                  
              dataType : "json",
            }).done(function(e) {     
                if(e == ''){
                    alert('Grade não cadastrada')
                    $('#txtCodGrade').val('')
                    $('#txtDescGrade').val('')
                    $('#txtCodGrade').focus()
                }else{                               
                    $('#txtDescGrade').val(e[0].DescGrade)
                }
            });        
        }else{
            $('#txtCodGrade').val('')
            $('#txtDescGrade').val('')            
        }
    }
    
    
    
    
    
    
    
    //Variantes do produto
    
    function CriaTabelaVariante(){
        $('#tabVariantesProduto').bootstrapTable({
            url: BASEURL + 'VarianteProduto/ListarVariantesProduto/'+ CodProduto,                  
            showColumns: true,
            showRefresh: true,
            search: true,
        })    
    }

    CriaTabelaVariante()
    
    $('#tabVariantesProduto').on('click','span', function(){
        var CodProduto = $(this).attr('CodProduto')
        var CodVariante = $(this).attr('CodVariante')
        
        $.ajax({
          url: BASEURL + 'VarianteProduto/Excluir/'+CodProduto+'/'+CodVariante,         
        }).done(function(e) {                
            $('#tabVariantesProduto').bootstrapTable('destroy')
            CriaTabelaVariante()
            //alert(e)
        });                                        
    })
        
    var $modalVar = $('#divPopPesqVariantes')
    
    function PesqVariantes(){              
        // create the backdrop and wait for next modal to be triggered
       $('body').modalmanager('loading');

        $modalVar.load(BASEURL + 'Variante/ExibirPopUp/', '', function(){

            $modalVar.modal();

            $('#tabVariantes').bootstrapTable({
                url: BASEURL + 'Variante/ListarVariantes/',                
                clickToSelect: true,
            })    
            //$('#tabVariantes').bootstrapTable('hideColumn', 'VarSel');            
        });
    }
	
    $('#btnPopPesqVariantes').on('click', function(e){
            e.preventDefault()                
            
            VerificaCadastroProduto(PesqVariantes)
            
    });    
        
        
    $('#divPopPesqVariantes').on('click','#btnSelVariante', function(){

        var variante = $('#tabVariantes').bootstrapTable('getSelections')
        var selects = variante
        CodVariante = $.map(selects, function (row) {
            return row.CodVariante
        })
                
        var CodProduto = $('#txtCodProduto').val()
        
        $.ajax({
          url: BASEURL + 'VarianteProduto/GravarProdVariante/'+CodProduto+'/'+CodVariante,         
        }).done(function(e) {                
            $('#tabVariantesProduto').bootstrapTable('destroy')
            CriaTabelaVariante()
        });       
    })

        
    
    
        







    
      
    //IMAGENS DO PRODUTO  
    
    
    function CriarTabelaImagens(){
        $('#tabImagensProduto').bootstrapTable({        
            url: BASEURL + 'Imagem/ListarImagensProduto/'+ CodProduto,          
            showColumns: true,
            showRefresh: true,
            search: true,
        })            
    }   
    
    CriarTabelaImagens()        
    
    function ClicaImagem(){
        $("#fleUserFile").click()        
    }
    
    $('#btnAdicionarImagem').on('click', function(e){
        e.preventDefault()
        VerificaCadastroProduto(ClicaImagem)
        if ($('#txtCodProdutoBanco').val()){
            ClicaImagem()
        }
    })
    
    $('#fleUserFile').change(function(){
        
        $('#frmUploadImagens').ajaxForm({ 
            //beforeSubmit:  showRequest,
            success: showResponse,  // post-submit callback       
        }).submit()	

        function showResponse(responseText, statusText, xhr, $form)  {             
            $('#tabImagensProduto').bootstrapTable('destroy')
            CriarTabelaImagens()            
        }    
    })                                                                    
    
    $('#tabImagensProduto').on('click','span', function(){
        var DirImagem = $(this).attr('Img')
        var CodImagem = $(this).attr('CodImagem') 
        
        $.ajax({
          url: BASEURL + 'Imagem/Excluir/'+CodImagem,         
        }).done(function(e) {                
            $('#tabImagensProduto').bootstrapTable('destroy')   
            CriarTabelaImagens()
        });                                        
    })
    
    
        
    $('#btnCancelarCadastroProduto').on('click', function(e){        
        e.preventDefault()
        window.location.href = BASEURL+'Produto';       
    })
    
    $('#txtCodGrade').change(function(){
        BuscaGrade()
    })
    
    $('#tabImagensProduto').bootstrapTable('refresh')
    BuscaGrade()
    
})