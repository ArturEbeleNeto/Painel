<?php

class PedIte_model extends CI_Model {
    
       
    	public function Listar_Itens($NrPedido, $NrSeqIte = NULL)
	{   
            
        $this->db->select('PedIte.*, PedIte.NrSeqIte as NrSeqIteBanco');
        $this->db->from('PedIte');
        
        if ($NrPedido)   
            {$this->db->where('NrPedido', $NrPedido); 
            }                       
        if ($NrSeqIte)   
            {$this->db->where('NrSeqIte', $NrSeqIte); 
            }   
            
         $query = $this->db->get();   
         
         
         
         if ($query->num_rows() > 0)
            {
               $row = $query->result_array();                
               return $row;                    
            }
         else
            {
             return array();
            }
	} 
        
       
        
    public function Inserir($dados = null)
	{   
            
            if($dados != null)
                {
                
                $this->db->insert('PedIte',$dados);                
                }
	}
        
        
    public function Atualizar($dados = null)
	{                               
            if($dados != null)
                {
                $this->db->where('NrPedido', $dados['NrPedido']); 
                $this->db->where('NrSeqIte', $dados['NrSeqIte']);
                $this->db->update('PedIte',$dados);                
                }
	}        
        
    public function Excluir($NrPedido, $NrSeqIte)
        {
            $this->db->where('NrPedido', $NrPedido);
            if($NrSeqIte){
                $this->db->where('NrSeqIte', $NrSeqIte);                        
            }
            $this->db->delete('PedIte');
        }
        
        
        public function GetNrSeqIte($NrPedido){
            
            $this->db->select('max(NrSeqIte) as NrSeqIte');
            $this->db->from('PedIte');

            if ($NrPedido)   
                {$this->db->where('NrPedido', $NrPedido); 
                }  
                
            $query = $this->db->get();                        
                
            $row = $query->row_array();            
            $NrSeqIte = $row['NrSeqIte'];            
            //print_r( $query);
            if($NrSeqIte){
                return $NrSeqIte + 1;
            }
            else{
              return 1;  
            }
                
        }
        
    
}