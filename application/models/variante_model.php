<?php

class Variante_model extends CI_Model {
          
    
	public function Inserir($dados = null)
	{   
            
            if($dados != null)
                {
                
                $this->db->insert('Variantes',$dados);                
                }
	}        
        
	public function InserirProdVariante($dados = null)
	{   
            
            if($dados != null)
                {
                
                $this->db->insert('ProdVariantes',$dados);                
                }
	}        

        
        public function Excluir($CodVariante)
        {
            $this->db->where('CodVariante', $CodVariante);
                        
            $this->db->delete('Variantes');
        }
           
        public function ExcluirVarianteProduto($CodProduto, $CodVariante)
        {
            $this->db->where('CodVariante', $CodVariante);
            $this->db->where('CodProduto', $CodProduto);
                        
            $this->db->delete('ProdVariantes');
        }

        
    	public function Listar_Variantes($CodVariante = NULL)
	{   
            
        $this->db->select('Variantes.*');
        $this->db->from('Variantes');
        
        if ($CodVariante)   
            {$this->db->where('CodVariante', $CodVariante); 
            }                        
                                      
         $query = $this->db->get();   
         
         
         
         if ($query->num_rows() > 0)
            {
               $row = $query->result();                
               return $row;                    
            }
	} 
        
        
        public function Listar_Variantes_Produto($CodProduto,$CodVariante = NULL){   
            
            $this->db->select('ProdVariantes.*');
            $this->db->select('Variantes.*');
            $this->db->from('ProdVariantes');

            $this->db->join('Variantes', 'ProdVariantes.CodVariante = Variantes.CodVariante','LEFT');            

            $this->db->where('CodProduto', $CodProduto); 

            if ($CodVariante){
                $this->db->where('Variantes.CodVariante', $CodVariante); 
            }                        

            $query = $this->db->get();   


            if ($query->num_rows() > 0){
                $row = $query->result_array();                
                return $row;                    
            }
            else{
                return array();
            }
	} 
        
        
    	public function Buscar_Variante($CodVariante = NULL)
	{   
            
        $this->db->select('Variantes.*,Variantes.CodVariante as CodVariante');
        $this->db->from('Variantes');
        
        if ($CodVariante)   
            {$this->db->where('CodVariante', $CodVariante); 
            }        
                                                  
         $query = $this->db->get();   
         
         
         
         if ($query->num_rows() > 0)
            {
               $row = $query->result_array();                
               return $row;                    
            }
	} 
        
    public function Atualizar($dados = null)
	{   
            
            if($dados != null)
                {
                $this->db->where('CodVariante', $dados['CodVariante']); 
                $this->db->update('Variantes',$dados);                
                }
	}        
        
        
        
        
}