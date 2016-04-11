/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var BASEURL = 'http://localhost/Painel/';

$(function(){
	
                
        //as cidades correspondentes ao estado selecionado
        $('#txtEstadoCliente').change(function(){
            var CodEstado = $('#txtEstadoCliente option:selected').attr('CodEst')            
            BuscaCidade(CodEstado)
        })            
            
            
        
        
        function BuscaCidade(CodEstado)
        {   $('#txtCidadeCliente option:selected').html('Carregando ...')
            var URL = BASEURL+'Endereco/BuscarCidades/'+CodEstado
            $.ajax({               
               //url: '../BuscarCidades/'+CodEstado ,                           
               url: URL,
            }).done(function(e){
               
               $('#txtCidadeCliente').html('');
               $('#txtCidadeCliente').append(e);                      
            })
        }
        
        $('#txtEstadoCliente').change()
        
        
        
        
})