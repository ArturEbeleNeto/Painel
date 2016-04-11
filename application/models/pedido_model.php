<?php

class Pedido_model extends CI_Model {
    
       
    public function Listar_Pedidos($NrPedido = NULL){   

        $this->db->select('Pedidos.*, Pedidos.NrPedido as NrPedidoBanco');
        $this->db->from('Pedidos');

        if ($NrPedido){
            $this->db->where('NrPedido', $NrPedido); 
        }                       

         $query = $this->db->get();   

         if ($query->num_rows() > 0){
            $row = $query->result_array();                
            return $row;                    
         } else {
            return array();
         }
    } 
        
    public function Listar_Pedidos_Detalhado($NrPedido = NULL){   

        $this->db->select('Pedidos.*, Pedidos.NrPedido as NrPedidoBanco, Clientes.NomeCliente, Vendedores.NomeVendedor, ClienteEnder.Estado, Cidades.NomeCidade');
        $this->db->from('Pedidos');
        $this->db->join('Clientes', 'Clientes.CodCliente = Pedidos.CodCliente','LEFT');                        
        $this->db->join('Vendedores', 'Vendedores.CodVendedor = Pedidos.CodVendedor','LEFT');                        
        $this->db->join('ClienteEnder', 'ClienteEnder.CodCliente = Pedidos.CodCliente AND ClienteEnder.CodEndereco = Pedidos.CodEndereco','LEFT');             
        $this->db->join('Cidades', 'ClienteEnder.Cidade = Cidades.CodCidade','LEFT');                        

        if ($NrPedido){
            $this->db->where('NrPedido', $NrPedido); 
        }                       

         $query = $this->db->get();   

         if ($query->num_rows() > 0){
            $row = $query->result_array();                
            return $row;                    
         } else {
            return array();
         }
    }     
    
	public function Inserir($dados = null)
	{   
            
            if($dados != null)
                {
                
                $this->db->insert('Pedidos',$dados);                
                }
	}
        
        
    public function Atualizar($dados = null)
	{      
            
           // return;
            if($dados != null)
                {
                
           
                $this->db->where('NrPedido', $dados['NrPedido']); 
                $this->db->update('Pedidos',$dados);                
                 
                }
	}        
        
    public function Excluir($NrPedido)
        {
            $this->db->where('NrPedido', $NrPedido);
                        
            $this->db->delete('Pedidos');
        }
        
        
        public function GetNrPedido()
        {
            $query = $this->db->query('SHOW TABLE STATUS LIKE "Pedidos"');
                           
            $row = $query->row_array();            
            $NrPedido = $row['Auto_increment'];            
            
            return $NrPedido;
        }
        
    
}