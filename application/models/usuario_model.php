<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario_model extends CI_Model {
    
  
    
    public function GetCodUsuario()
        {
            $query = $this->db->query('SHOW TABLE STATUS LIKE "Usuarios"');
                           
            $row = $query->row_array();            
            $CodUsuario= $row['Auto_increment'];            
            //$this->StartTransaction();
            return $CodUsuario;
        }
    
    public function VerificaCodClienteUnico($CodCliente, $CodUsuario){
        $this->db->select('Usuarios.*');
        $this->db->from('Usuarios');
        
           
        $this->db->where('CodUsuario <> '. $CodUsuario); 
        $this->db->where('CodCliente', $CodCliente); 
                        
                                      
         $query = $this->db->get();   
         
         
         
         if ($query->num_rows() > 0)
            {
               return false;                 
            }
         else{
             return true;
         }
    }   
    
        public function VerificaNomeUsuarioUnico($NomeUsuario, $CodUsuario){
        $this->db->select('Usuarios.*');
        $this->db->from('Usuarios');
        
           
        $this->db->where('CodUsuario <> '. $CodUsuario); 
        $this->db->where('NomeUsuario', $NomeUsuario); 
                        
                                      
         $query = $this->db->get();   
         
         
         
         if ($query->num_rows() > 0)
            {
               return false;                 
            }
         else{
             return true;
         }
    }  
    
           
    public function Listar_Usuarios($CodUsuario = NULL)
	{   
            
        $this->db->select('Usuarios.*');
        $this->db->from('Usuarios');
        
        if ($CodUsuario)   
            {$this->db->where('CodUsuario', $CodUsuario); 
            }                        
                                      
         $query = $this->db->get();   
         
         
         
         if ($query->num_rows() > 0)
            {
               $row = $query->result();                
               return $row;                    
            }
	} 
        
        
        
    public function Excluir($CodUsuario)
        {
            $this->db->where('CodUsuario', $CodUsuario);
                        
            $this->db->delete('Usuarios');
        }
        

    	public function Buscar_Usuario($CodUsuario = NULL)
	{   
            
        $this->db->select('Usuarios.*,Usuarios.CodUsuario as CodUsuario , Usuarios.CodUsuario as CodUsuarioBanco');
        $this->db->from('Usuarios');
        
        if ($CodUsuario)   
            {$this->db->where('CodUsuario', $CodUsuario); 
            }        
                                                  
         $query = $this->db->get();   
         
         
         
         if ($query->num_rows() > 0)
            {
               $row = $query->result_array();                
               return $row;                    
            }
         else{
             return NULL;
         }
         
	} 
        
        public function RealizaLogin ($NomeUsuario, $SenhaUsuario)
	{   
            
        $this->db->select('Usuarios.*, Vendedores.CodVendedor');
        $this->db->from('Usuarios');
        
        $this->db->where('NomeUsuario', $NomeUsuario); 
        $this->db->where('SenhaUsuario', $SenhaUsuario); 

        $this->db->join('Vendedores', 'Usuarios.CodCliente = Vendedores.CodCliente', 'left');
            
         $query = $this->db->get();   

         if ($query->num_rows() > 0)
            {
               $row = $query->result_array();                
               return $row;                    
            }
         else{
             return NULL;
         }
         
	} 
        
        
        
	public function Inserir($dados = null)
	{  
            
            if($dados != null)
                {
                
                $this->db->insert('Usuarios',$dados);                
                }            
            
            
	}

        
        
    public function Atualizar($dados = null)
	{   
            
            if($dados != null)
                {
                $this->db->where('CodUsuario', $dados['CodUsuario']); 
                $this->db->update('Usuarios',$dados);                
                }
           // $this->Commit($dados['CodProduto']);
	}        
        
        /*
    public function CancelarCadastro()
    {
        $this->load->helper('directory');
        $this->db->Query('ROLLBACK;');         
        $map = directory_map('./img/Temp/', FALSE);
        foreach ($map as $Img)
        {
           echo $Img; 
           unlink('./img/Temp/'.$Img);    
        }        
        
        $map = directory_map('./img/Bkp/', FALSE);
        foreach ($map as $Img)
        {
           echo $Img; 
           rename('./img/Bkp/'.$Img, './img/Uploads/'.$Img);    
        }        
        
        
    }
         * 
    public function StartTransaction ()
        {
            $this->db->Query('START TRANSACTION;');                
        }         
        
    public function Commit($CodProduto)
    {
        $this->load->helper('directory');
        $this->db->Query('COMMIT;'); 
        $map = directory_map('./img/Temp/', FALSE);
        foreach ($map as $Img)
        {
           echo $Img; 
           RENAME('./img/Temp/'.$Img, './img/Uploads/'.$Img);    
        }
        
        $map = directory_map('./img/Bkp/', FALSE);
        foreach ($map as $Img)
        {
           echo $Img; 
           unlink('./img/Bkp/'.$Img);    
        }

        
        $this->load->model('imagem_model');
        $this->imagem_model->Atualizar_Diretorio_Imagens($CodProduto);             
    }
         * 
         */
        
        
        
        
    
}