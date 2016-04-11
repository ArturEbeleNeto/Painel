function ExibeOpcoesEndereco(value, row) {       
    Texto = ''
    Texto = '<a><span class="glyphicon glyphicon-pencil link-Editar" id="lnkEditarEndereco" aria-hidden="true" CodCliente="'+row.CodCliente+'" CodEndereco="'+row.CodEndereco+'"></span></a>  ' 
    Texto += '<a><span class="glyphicon glyphicon-remove link-Excluir" id="lnkExcluirEndereco" aria-hidden="true" CodCliente="'+row.CodCliente+'" CodEndereco="'+row.CodEndereco+'"></span></a>' 
    
    return Texto
}

$(function(){   
  
    function CriaTabelaEnderecos(){
        $('#tabEnderecosCliente').bootstrapTable({
            url: BASEURL + 'endereco/RetornaEnderecosJson/0/'+ $('#txtCodCliente').val(),                  
            showColumns: true,
            showRefresh: true,
            search: true,
        })    
    }

    CriaTabelaEnderecos()
  
     
    var $modalEnder = $('#divPopCadastroEndereco')
    
    function popCadastroEndereco(CodEndereco){              
        
        url = ''
        
        var CodCliente = $('#txtCodClienteBanco').val()
        
        if(CodEndereco){
            url = BASEURL + 'endereco/ExibirPopUp/'+CodCliente+'/'+CodEndereco;    
        }else{
            url = BASEURL + 'endereco/ExibirPopUp/'+CodCliente;    
        }
        
        // create the backdrop and wait for next modal to be triggered
       $('body').modalmanager('loading');

       $modalEnder.load(url, '', function(){
            $modalEnder.modal();
            BuscaEstados(CodCliente, CodEndereco)
        });
        
        
    }
    
    $('#btnPopCadastroEndereco').on('click', function(e){
            e.preventDefault()       
            
            if($('#txtCodClienteBanco').val() != ''){
                popCadastroEndereco()
            }
            else{
                EfetuaCadastroCliente(popCadastroEndereco)   
            }
                       
    });    
    
    function EfetuaCadastroCliente(fn){
        $('#frmCadastroCliente').ajaxForm({ 
                dataType: "json",
                success: showResponse,
                //dataType: "json",
                error: function(request, status, error) {
                    alert('erro: '+ error);
                }            
        }).submit()	

        function showResponse(responseText, statusText, xhr, $form)  {             
            //alert(responseText)
            if (responseText.status == '1') {            
                $('#divErros').html('')
                $('#txtCodClienteBanco').val($('#txtCodCliente').val())                
                fn()
            }
            else {
                $('#divErros').html(responseText.erros)
            }
        }        
                
    } 

    $('#tabEnderecosCliente').on('click','#lnkEditarEndereco', function(){       
        var CodEndereco = $(this).attr('CodEndereco')
        popCadastroEndereco(CodEndereco)
    })

    $('#tabEnderecosCliente').on('click','#lnkExcluirEndereco', function(){
        var CodCliente = $(this).attr('CodCliente')
        var CodEndereco = $(this).attr('CodEndereco')
        
        $.ajax({
          url: BASEURL + 'Endereco/Excluir/'+CodCliente+'/'+CodEndereco,         
        }).done(function(e) {                
            $('#tabEnderecosCliente').bootstrapTable('refresh')
        });                                        
    })
    
    $('#divPopCadastroEndereco').on('click','#btnSubmitCadastroEndereco', function(e){
        
        $('#divPopCadastroEndereco > #frmCadastroEndereco').ajaxForm({ 
                //beforeSubmit:  function(){alert('before')},
                success: showResponse,
                dataType: "json",
                error: function(request, status, error) {
                    alert('erro: '+ error);
                }            
        })	

        function showResponse(responseText, statusText, xhr, $form)  {                         
            //alert(responseText)
            if(responseText.status == 0){
                alert('O formulário contém erros: \n' + responseText.erros)                
            }
            else{
                $('#btnResetCadastroEndereco').click()
                $('#tabEnderecosCliente').bootstrapTable('refresh')
            }
            
        }
        
    })
    
    
    function BuscaEstados(CodCliente, CodEndereco){      
        
        URL
        
        if(CodEndereco){
            URL = BASEURL+'Endereco/BuscarEstados/'+ CodCliente +'/'+ CodEndereco
        }else{
            URL = BASEURL+'Endereco/BuscarEstados/'
        }            
        $.ajax({                          
           url: URL,
        }).done(function(e){
            
           $('#txtEstadoCliente').html('');
           $('#txtEstadoCliente').append(e);                      
           $('#txtEstadoCliente').change()
        })        
    }
    

    //as cidades correspondentes ao estado selecionado
    $('#divPopCadastroEndereco').on('change','#txtEstadoCliente', function(){
        var CodEstado   = $('#txtEstadoCliente option:selected').attr('CodEst')            
        var CodCliente  = $('#txtCodCliente').val()
        var CodEndereco = $('#txtCodEnderecoBanco').val()
        
        if(CodEndereco){        
            BuscaCidade(CodEstado, CodCliente, CodEndereco)
        }else{
            BuscaCidade(CodEstado)
        }
        
    })            




    function BuscaCidade(CodEstado, CodCliente, CodEndereco){
        
        $('#txtCidadeCliente option:selected').html('Carregando ...')
        
        var URL
        
        if(CodEndereco){
            URL = BASEURL+'Endereco/BuscarCidades/'+CodEstado + '/' + CodCliente + '/' + CodEndereco
        }else{
            URL = BASEURL+'Endereco/BuscarCidades/'+CodEstado
        }
        
        $.ajax({               
           //url: '../BuscarCidades/'+CodEstado ,                           
           url: URL,
        }).done(function(e){

           $('#txtCidadeCliente').html('');
           $('#txtCidadeCliente').append(e);                      
        })
    }
    

    $('#btnCadastrarCliente').on('click', function(e){
        e.preventDefault()
        EfetuaCadastroCliente(function(){
            window.location.href = BASEURL+'Cliente'
        })                
    })



})