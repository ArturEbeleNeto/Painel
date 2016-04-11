function ExibeOpcoes(value, row) {       
    Texto = ''
    Texto = '<a><span class="glyphicon glyphicon-pencil link-Editar" id="lnkEditarPedido" aria-hidden="true" NrPedido="'+row.NrPedido+'"></span></a>  ' 
    Texto += '<a><span class="glyphicon glyphicon-remove link-Excluir" id="lnkExcluirPedido" aria-hidden="true" NrPedido="'+row.NrPedido+'"></span></a>' 
    return Texto
}


$(function(){
  
    $('#tabConsultPedidos').bootstrapTable({ 
        url: BASEURL + 'Pedido/ListarPedidosDetalhado/', 
        showColumns: true,
        showRefresh: true,
        search: true,        
    })    

    $('#tabConsultPedidos').on('click','#lnkEditarPedido', function(){       
        var NrPedido = $(this).attr('NrPedido')
        window.location.href = BASEURL + "Pedido/Editar/" + NrPedido;
    })

    $('#tabConsultPedidos').on('click','#lnkExcluirPedido', function(){
        var NrPedido = $(this).attr('NrPedido')        
        if (confirm('Realmente deseja excluir o pedido '+ NrPedido+'?')){
            $.ajax({
              url: BASEURL + 'Pedido/Excluir/'+NrPedido,         
            }).done(function(e) {                
                $('#tabConsultPedidos').bootstrapTable('refresh')
            });                                        
        }
    })


})