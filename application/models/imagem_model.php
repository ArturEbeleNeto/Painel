<?php

class Imagem_model extends CI_Model {
          
    
	public function Inserir($dados = null)
	{   
            
            if($dados != null)
                {             
               
                $this->db->insert('ProdImagens',$dados);                
                
                }
	}        

        
        public function Excluir($CodImagem)
        {
   
        $this->db->select('ProdImagens.*');
        
        $this->db->from('ProdImagens');             
        
        $this->db->where('CodImagem', $CodImagem); 
                                      
        $query = $this->db->get();   
         
        $row = $query->row_Array(); 
               
        
            $this->db->where('CodImagem', $CodImagem);
                        
            $this->db->delete('ProdImagens');
            

            unlink('./img/Uploads/'.$row['NomeImagem'].$row['TipoImagem']);

        }
        
        
        
        public function Atualizar_Diretorio_Imagens($CodProduto)
        {
            echo 'aqui '.$CodProduto;
            $result = $this->db->query('UPDATE ProdImagens SET DirImagem = CONCAT("'.base_url('img/Uploads').'","/",ProdImagens.NomeImagem,ProdImagens.TipoImagem), SeSalva = 1 WHERE CodProduto = "'.$CodProduto.'";');
            if ($result)
             {echo 'OK';             
             }
        }
        
        
        
        public function Listar_Imagens_Produto($CodProduto, $CodVariante = NULL)
	{   
            
        $this->db->select('ProdImagens.*');
        
        $this->db->from('ProdImagens');             
        
        $this->db->where('CodProduto', $CodProduto); 
        
        if ($CodVariante)   
            {$this->db->where('CodVariante', $CodVariante); 
            }                        
                                      
         $query = $this->db->get();   
                  
         
         if ($query->num_rows() > 0)
            {
               $row = $query->result();                
               return $row;                    
            }
         else
            {
         
            }
	} 
        
                
        
}