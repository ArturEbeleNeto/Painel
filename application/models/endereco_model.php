<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Endereco_model extends CI_Model {
    
    
    
    
    	public function Listar_Enderecos()
	{   
            
        $this->db->select('ClienteEnder.Cidade, ClienteEnder.Estado ');
        $this->db->from('Clientes');                     
                                      
         $query = $this->db->get();   
                           
         if ($query->num_rows() > 0)
            {
               $row = $query->result();                
               return $row;                    
            }
	} 
        
        
        public function Excluir($CodCliente, $CodEndereco = NULL)
        {
            $this->db->where('CodCliente', $CodCliente);
            
            if ($CodEndereco <> NULL)
            {
                $this->db->where('CodEndereco', $CodEndereco);
            }
            
            $this->db->delete('ClienteEnder');
        }


        
        public function Listar_Estados()
	{   
            
        $this->db->select('estados.*');
        $this->db->from('estados');                     
                                      
         $query = $this->db->get();   
                           
         if ($query->num_rows() > 0)
            {
               $row = $query->Result_array();                
               return $row;                    
            }
	} 
        
        public function Listar_Estados_JSON()
	{   
            
        $this->db->select('estados.*');
        $this->db->from('estados');                     
                                      
         $query = $this->db->get();   
                           
         if ($query->num_rows() > 0)
            {
               $row = $query->Result_array();                
               echo json_encode($row);
            }
	} 
        
        public function Buscar_Enderecos_Json($CodEndereco, $CodCliente){
            $this->db->select('ClienteEnder.*, Cidades.NomeCidade');
            $this->db->from('ClienteEnder');                           
     
            $this->db->join('Cidades', 'Cidades.CodCidade = ClienteEnder.Cidade','LEFT');                        
            
            if($CodEndereco){
                $this->db->where('CodEndereco',$CodEndereco);                     
            }
            
            if ($CodCliente){
                $this->db->where('CodCliente',$CodCliente);                     
            }

            $query = $this->db->get();   

            if ($query->num_rows() > 0){
                  $row = $query->Result_array();                
                  return $row;                    
               }

        }
        
        public function Buscar_Cidades_json($CodEstado)
	{   
            
        $this->db->select('cidades.*');
        $this->db->from('cidades');                     
        
     //$final = $CodCidade+100;
     
            $this->db->where('CodEstado',$CodEstado);                     
            //$this->db->where('CodCidade <= '.$final);
        
        
        $query = $this->db->get();   
                           
        if ($query->num_rows() > 0)
           {
              $row = $query->Result_array();                
              return $row;                    
           }
	} 
        
    	public function Buscar_Cidades($CodEstado = null)
	{   
            
        $this->db->select('cidades.*');
        $this->db->from('cidades');                     
        
        if ($CodEstado){
            $this->db->where('CodEstado', $CodEstado);                     
        }
        
        $query = $this->db->get();   
                           
        if ($query->num_rows() > 0)
           {
              $row = $query->Result_array();                
              return $row;                    
           }
	} 

    	public function Buscar_Estados()
	{   
            
        $this->db->select('estados.*');
        $this->db->from('estados');                     
                
        $query = $this->db->get();   
                           
        if ($query->num_rows() > 0)
           {
              $row = $query->Result_array();                
              return $row;                    
           }
	} 

        
        public function Atualizar($dados = null)
	{   
            
            if($dados != null)
                {
                $this->db->where('CodEndereco', $dados['CodEndereco']); 
                $this->db->where('CodCliente', $dados['CodCliente']);
                $this->db->update('ClienteEnder',$dados);                
                }
           // $this->Commit($dados['CodProduto']);
	}  

    	public function Buscar_Endereco_Cliente($CodCliente, $CodEndereco = NULL)
	{   
            
        $this->db->select('Clienteender.*');
        $this->db->from('ClienteEnder');
        
        $this->db->where('CodCliente',$CodCliente);                      
        
        if($CodEndereco != NULL){
            $this->db->where('CodEndereco',$CodEndereco);                      
        }
             
         $query = $this->db->get();   
                          
         if ($query->num_rows() > 0)
            {
               $row = $query->result_array();                
               return $row;                    
            }
	} 
        
        
        
	public function Inserir($dados = null)
	{ 
            
            $this->db->select('MAX(Clienteender.CodEndereco) as CodEndereco');
            $this->db->from('ClienteEnder');
        
            $this->db->where('CodCliente',$dados['CodCliente']);                           
             
            $query = $this->db->get();   
            
            $row = $query->row_array();                                                 
            
            $dados['CodEndereco'] = $row['CodEndereco'] + 1;
            
            if($dados != null)
                {
                
                $this->db->insert('ClienteEnder',$dados);                
                }
	}
            
        
        
        
    
}