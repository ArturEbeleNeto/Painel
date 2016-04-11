    function AtualizaValores(){
        
        //Cálculo do valor dos itens do orçamento
        var VlrItens = 0;        
        Data = $('#tabItens').bootstrapTable('getData')
        for(x = 0; x < Data.length; x++){
            row  = Data[x]
            VlrItens += row.VlrItem * 1
        }                    
        
        QtdeItens = parseFloat(Data.length)

        VlrOutDespesas = parseFloat($('#txtVlrOutDespesas').val())
        VlrFrete       = parseFloat($('#txtVlrFrete').val())
        //PercComissao   = parseFloat($('#txtPercComissao').val())
        
        
        VlrDesconto    = parseFloat($('#txtVlrDesconto').val())
        
        VlrITensLiq    = (VlrItens - VlrDesconto)
        
        /*
        if(PercComissao){
            VlrComissao    =  VlrITensLiq * PercComissao/100
        }else{
            VlrComissao = 0
        }
        */
       
        VlrPedido      = VlrITensLiq + VlrFrete + VlrOutDespesas        
        
        VlrOutrosValores = VlrPedido - VlrITensLiq 

        $('#lblTotalItens').html(QtdeItens)//Label abaixo dos itens
        $('#txtQtdeItens').val(QtdeItens) //Campo oculto

        $('#lblVlrItens').html(VlrItens) //Label abaixo dos itens
        $('#txtVlrItensDis').val(VlrItens) //Campo aba Valores
        $('#txtVlrItens').val(VlrItens) //Campo aba Valores
        
        //$('#txtVlrComissaoDis').val(VlrComissao) //Campo aba Valores
       // $('#txtVlrComissao').val(VlrComissao) //Campo aba Valores
 
        //atualiza o label conforme os valores dos campos digitados na aba valores
        $('#lblOutrosValores').html(VlrOutrosValores) //Label abaixo dos itens

        $('#lblVlrDesconto').html(VlrDesconto)
        
        $('#lblVlrPedido').html(VlrPedido)
        $('#txtVlrPedidoDis').val(VlrPedido)
        $('#txtVlrPedido').val(VlrPedido)

        $('#tabItens').bootstrapTable('check', 0)
    }

    function BuscaVendedor(){
        var Vendedor = $('#txtCodVendedor').val()
        if(Vendedor > 0){
            $.ajax({
              url: BASEURL + 'Vendedor/BuscarVendedorJson/'+Vendedor,                  
              dataType : "json",
            }).done(function(e) {     
                if(e == null){
                    alert('Código de vendedor inexistente')
                    $('#txtCodVendedor').val('')                
                    $('#txtNomeVendedor').val('')
                    $('#txtCodVendedor').focus()
                }else{                
                    $('#txtNomeVendedor').val(e[0].NomeVendedor)
                    if($('#txtPercComissao').val() == ''){
                        $('#txtPercComissao').val(e[0].TaxaComissao)                
                    }

                }
            });        
        }
        else{
            $('#txtCodVendedor').val('')                
            $('#txtNomeVendedor').val('')            
        }
    }

    function BuscaCliente(){
        var Cliente = $('#txtCodCliente').val()
        
        if(Cliente > 0){

            $.ajax({
              url: BASEURL + 'Cliente/ListarClientesJson/'+Cliente,                  
              dataType : "json",
            }).done(function(e) {     
                if(e == null){
                    alert('Código de cliente inexistente')
                    $('#txtCodCliente').val('')
                    $('#txtNomeCliente').val('')
                    $('#txtCodEndereco').val('')
                    $('#txtEndereco').val('')                
                    $('#txtCodCliente').focus()
                }else{                
                    $('#txtNomeCliente').val(e[0].NomeCliente)
                    if($('#txtCodEndereco').val() == ''){
                        $('#txtCodEndereco').val('1')
                    }
                    BuscaEndereco()
                }
            });
        }else{
            $('#txtCodCliente').val('')
            $('#txtNomeCliente').val('')
            $('#txtCodEndereco').val('')
            $('#txtEndereco').val('')                            
        }
    }

    function BuscaEndereco(){
        var Endereco = $('#txtCodEndereco').val()
        var Cliente = $('#txtCodCliente').val()
        
        if(Endereco > 0  && Cliente > 0 ){
            $.ajax({
              url: BASEURL + 'Endereco/RetornaEnderecosJson/'+ Endereco +'/'+ Cliente,                  
              dataType : "json",
            }).done(function(e) {     
                if(e == ''){
                    alert('Código de endereço inexistente para o cliente')
                    $('#txtCodEndereco').val('')
                    $('#txtEndereco').val('')
                    $('#txtCodEndereco').focus()
                }else{                               
                    $('#txtEndereco').val(e[0].Rua+ ', '+ e[0].NumResidencia + ', '+ e[0].Bairro +', ' + e[0].NomeCidade + ' - ' + e[0].Estado)
                }
            });        
        }else{
            $('#txtCodEndereco').val('')
            $('#txtEndereco').val('')            
        }
    }


$(function(){
  
    var Pedido = $('#txtNrPedido').val()          
    $('#tabItens').bootstrapTable({ 
        url: BASEURL + 'PedIte/BuscarItens/'+Pedido, 
        checkboxHeader: false,  
        clicktoselect: true,
        onLoadSuccess: AtualizaValores,
    })    

    $('#tabValores input').change(function(){
        AtualizaValores()
    })

    $('#txtCodVendedor').change(function(){        
        BuscaVendedor()
    })
    $('#txtCodCliente').change(function(){        
        BuscaCliente()
    })
    $('#txtCodEndereco').change(function(){        
        BuscaEndereco()()
    })
    function BuscaSeqIte(){ 
        var linha = $('#tabItens').bootstrapTable('getSelections')
        var selects = linha
        NrSeqIte = $.map(selects, function (row) {
            return row.NrSeqIte
        })        
        return NrSeqIte        
    }
    
    function AtualizaItens(){                
        $('#tabItens').bootstrapTable('refresh')        
    }

    
    $('#btnEdicaoItem').on('click', function(e){
        
        Pedido = $('#txtNrPedido').val()
        Item = BuscaSeqIte()
        
        if (Item == 0){
            alert('Nenhum Item Selecionado!')
            e.preventDefault()
            return
        }            
      
        var $modalItem = $('#divPopCadastroItem');
            $('body').modalmanager('loading');
            $modalItem.load(BASEURL + 'PedIte/ExibirPopUp/'+Pedido+'/'+Item, '', function(){
            $modalItem.modal();            
            BuscaProduto()
            BuscaVariante()
        });
        
        return false
    });      

    function ChamaModalItem(){
        Pedido = $('#txtNrPedido').val()   
        var $modalItem = $('#divPopCadastroItem');        
        $('body').modalmanager('loading');      
        $modalItem.load(BASEURL + 'PedIte/ExibirPopUp/'+Pedido, '', function(){            
            $modalItem.modal();                
            BuscaProduto()                           
        });               
    }
    
    $('#btnCadastroItem').on('click', function(){
        if($('#txtNrPedidoBanco').val() == ''){
            ProcessaPedido(function(){
                ChamaModalItem()
            })
           
        }else{          
            
            ChamaModalItem()                                   
        }
         return false
    });  
    
    
      
    $('#btnExcluirItem').on('click', function(e){
        ExcluiItem()
        e.preventDefault()
    })
    
    function ExcluiItem(){
        
        if (BuscaSeqIte() == 0){
            alert('Nenhum Item selecionado!')
            return
        }
        
        if (confirm('Deseja excluir este item?')){
                Pedido = $('#txtNrPedido').val()
                Item = BuscaSeqIte()                
                
                $.ajax({
                  url: BASEURL + 'PedIte/Excluir/'+Pedido+'/'+Item,                  
                }).done(function(e) {                
                    AtualizaItens();                    
                });
            }
    }
    
    $('#btnSubmitCadastroPedidos').on('click', function(e){
        e.preventDefault()       
        ProcessaPedido(function(){
            window.location.href = BASEURL + 'Pedido/';
        })
    })
    
    function ProcessaPedido(fn){
        $('#frmCadastroPedido').ajaxForm({ 
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
                $('#txtNrPedidoBanco').val($('#txtNrPedido').val())                
                fn()
            }
            else {
                $('#divErros').html(responseText.erros)
            }
        }        
                
    }
    
    $('#txtSitPedido').focus()    
    BuscaVendedor()
    BuscaCliente()
    BuscaEndereco()
    
    
    
    
    
    
    //Tele de itens do pedido

    
    $('#divPopCadastroItem').on('click','#btnSubmitCadastroItens', function(e){          
        GravaItens()
        $('#tabItens').bootstrapTable('refresh')       
        AtualizaValores()
        e.preventDefault()
    })   
    
    function GravaItens(){      
        
        $('#frmCadastroItens').ajaxForm({  
                dataType: "json",
                success: showResponse,            
                error: function(request, status, error) {
                    alert('erro: '+ error);
                }            
        }).submit()	

        function showResponse(responseText, statusText, xhr, $form)  {                         
            if (responseText.status == '1') {            
                $('#btnResetCadastroItens').click()
                $('#tabItens').bootstrapTable('refresh')        
            }
            else {
                alert(responseText.erros)
            }

        }
    }
    
    
    $('#divPopCadastroItem').on('change','#txtCodProduto', function(e){
        BuscaProduto()
    })

    $('#divPopCadastroItem').on('change','#txtCodVariante', function(e){        
        BuscaVariante()
    })    

    $('#divPopCadastroItem').on('change','#txtQtdeItem', function(e){        
        CalculaQtdeGrade()
    })        
    
})



    function BuscaProduto(){        
        
        var Produto = $('#txtCodProduto').val()
        if(Produto > 0){
            $.ajax({
              url: BASEURL + 'Produto/BuscarProdutoJson/'+Produto,                  
              dataType : "json",
            }).done(function(e) {     
                if(e.length == 0){
                    alert('Código de produto inexistente')
                    $('#txtCodProduto').val('')                
                    $('#txtDescProduto').val('')
                    //$('#txtVlrUnitario').val('')
                    $('#txtCodProduto').focus()
                }else{                
                    $('#txtDescProduto').val(e[0].DescProduto)
                    $('#txtVlrUnitario').val(e[0].VlrVendaProduto)
                    $('#txtCodGrade').val(e[0].CodGrade)
                    BuscaVariante()
                    BuscaGrade()
                }
            });        
        }
        else{
            $('#txtCodProduto').val('')                
            $('#txtDescProduto').val('')                        
        }
    }

    function CalculaQtdeGrade(){
        
        return false
        
        var SomaQtdeGade = 0
        var QtdeTamanhos = 0
        var QtdeAtribuida = 0
        var TotalProp = 0
        var QtdeProp = 0;
        var QtdeItem = $('#txtQtdeItem').val()*1
        
        if (!QtdeItem > 0){
            return false
        }
        
        for(x=1; x<=12; x++){            
            SomaQtdeGade += $('#txtQtdeItem'+x).val()*1
            if(!$('#divGrade'+x).hasClass('hidden')){
                QtdeTamanhos ++
                TotalProp += $('#divGrade'+x).attr('Prop')*1
            }
        }

        if (SomaQtdeGade != QtdeItem){            
            QtdeProp = Math.floor(QtdeItem/TotalProp)
            for(x=1; x<=12; x++){
                if($('#divGrade'+x).attr('Prop') > 0){
                    $('#txtQtdeItem'+x).val(QtdeProp * $('#divGrade'+x).attr('Prop'))
                    QtdeAtribuida += QtdeProp * $('#divGrade'+x).attr('Prop') 
                } 
            }
            if (QtdeAtribuida < QtdeItem){
                QtdeFaltante = QtdeItem - QtdeAtribuida
                alert(QtdeFaltante)
                for(x=1; x<= QtdeFaltante; x++){
                    
                }
            }            
        }
        


    }

    function BuscaGrade(){
        var CodGrade = $('#txtCodGrade').val()
        if (CodGrade){            
            url = BASEURL + 'Tamanho/BuscarTamanhos/'+CodGrade
            $.ajax({
              dataType : "json",
              url: url,                                
            }).done(function(e) {                   
                if(e.length == 0){
                    alert('Grade do produto não cadastrada!')
                }else{                                
                    for(x=0; x < e.length; x++){                                                
                        $('#divGrade'+(x+1)+' label').html(e[x].CodTamanho)
                        $('#divGrade'+(x+1)).removeClass('hidden')
                        $('#divGrade'+(x+1)).attr('Prop',e[x].Proporcao)
                    }                    
                    for(x=e.length; x<12; x++){                        
                        $('#divGrade'+(x+1)+' label').html('')
                        $('#txtQtdeItem'+(x+1)).val('')
                        $('#divGrade'+(x+1)).removeAttr('Prop')
                        $('#divGrade'+(x+1)).addClass('hidden')                        
                    }
                    CalculaQtdeGrade()
                }
            })            
        }else{
            $('#rowQtdeTamanhos label').html('')
            $('#rowQtdeTamanhos div').addClass('hidden')            
        }
    }

    function BuscaVariante(){        
        var Produto = parseInt($('#txtCodProduto').val())
        var Variante = parseInt($('#txtCodVariante').val())
        if(Variante > 0 && Produto >0){
            url = BASEURL + 'VarianteProduto/ListarVariantesProduto/'+Produto+'/'+Variante

            $.ajax({
              dataType : "json",
              url: url,                                
            }).done(function(e) {                   
                if(e.length == 0){
                    alert('Variante não cadastrada para o produto '+ Produto)
                    $('#txtCodVariante').val('')                
                    $('#txtDescVariante').val('')
                    $('#txtCodVariante').focus()
                }else{                
                    $('#txtDescVariante').val(e[0].DescVariante)
                }
            });        
        }
        else{
            $('#txtCodVariante').val('')                
            $('#txtDescVariante').val('')            
        }
    }
