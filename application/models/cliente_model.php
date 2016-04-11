.<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cliente_model extends CI_Model {
    
    
    public function GetCodCliente()
        {
            $query = $this->db->query('SHOW TABLE STATUS LIKE "Clientes"');
                           
            $row = $query->row_array();            
            $CodCliente = $row['Auto_increment'];            

            return $CodCliente;
        }
    
    
    	public function Listar_Clientes_Endereco($CodCliente = NULL)
	{   
            
        $this->db->select('Clientes.*');
        $this->db->from('Clientes');
        
        if ($CodCliente)   
            {$this->db->where('CodCliente', $CodCliente); 
            }        
                                      
         $query = $this->db->get();   
         
         if ($query->num_rows() > 0)
            {
               $row = $query->result();                
               return $row;                    
            }
	} 
        
        
        
        public function Excluir($CodCliente)
        {
            $this->db->where('CodCliente', $CodCliente);
                        
            $this->db->delete('Clientes');
        }
        

    	public function Buscar_Cliente($CodCliente = NULL)
	{   
            
        $this->db->select('Clientes.*,Clientes.CodCliente as CodCliente,Clientes.CodCliente as CodClienteBanco');
        $this->db->from('Clientes');
        
        if ($CodCliente)   
            {$this->db->where('CodCliente', $CodCliente); 
            }        
                                                  
         $query = $this->db->get();   
         
         
         
         if ($query->num_rows() > 0)
            {
               $row = $query->result_array();                
               return $row;                    
            }
        else{
            return null;
        }
	} 
        
        
        
	public function Inserir($dados = null)
	{   
            
            if($dados != null)
                {
                
                $this->db->insert('Clientes',$dados);  
                $last_id = $this->db->insert_id();
                return $last_id;
                }
	}                
        
        
    public function Atualizar($dados = null)
	{   
            if($dados != null)
                {
                $this->db->where('CodCliente', $dados['CodCliente']); 
                $this->db->update('Clientes',$dados);                
                }
	}        
        
        
        
    
}