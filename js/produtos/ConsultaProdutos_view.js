function ExibeOpcoes(value, row) {       
    Texto = ''
    Texto = '<a><span class="glyphicon glyphicon-pencil link-Editar" id="lnkEditarProduto" aria-hidden="true" CodProduto="'+row.CodProduto+'"></span></a>  ' 
    Texto += '<a><span class="glyphicon glyphicon-remove link-Excluir" id="lnkExcluirProduto" aria-hidden="true" CodProduto="'+row.CodProduto+'"></span></a>' 
    return Texto
}


$(function(){
  
    $('#tabConsultaProdutos').bootstrapTable({ 
        url: BASEURL + 'Produto/ListarProdutos/', 
        showColumns: true,
        showRefresh: true,
        search: true,        
    })    

    $('#tabConsultaProdutos').on('click','#lnkEditarProduto', function(){       
        var CodProduto = $(this).attr('CodProduto')
        window.location.href = BASEURL + "Produto/Editar/" + CodProduto;
    })

    $('#tabConsultaProdutos').on('click','#lnkExcluirProduto', function(){
        var CodProduto = $(this).attr('CodProduto')
        if (confirm('Realmente deseja excluir o produto '+ CodProduto+'?')){
            $.ajax({
              url: BASEURL + 'Produto/Excluir/'+CodProduto,         
            }).done(function(e) {                
                $('#tabConsultaProdutos').bootstrapTable('refresh')
            });                                        
        }
    })


})