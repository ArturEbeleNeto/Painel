<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagem extends CI_Controller {

    
        public function ListarImagensProduto($CodProduto = null, $CodVariante = Null)
            {
                $this->load->model('imagem_model');
                $Imagens = $this->imagem_model->Listar_Imagens_Produto($CodProduto);
                
                if ($Imagens)
                {
                    echo json_encode($Imagens);
                }
                else
                {
                    echo json_encode('');
                }
            }

            
        public function Gravar($CodProduto, $CodVariante = Null)
	{
            $Nome = $_FILES['userfile']['name'];       
            
            $config['upload_path'] = './img/Uploads/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']	= '2048';
            $config['max_width'] = '1600';
            $config['max_height'] = '1073';
            $config['file_name'] = utf8_decode($Nome); //str_replace("[^a-zA-Z0-9_.]","", strtr($Nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ","aaaaeeiooouucAAAAEEIOOOUUC"));
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
            }
            else
            {
                    $data =  $this->upload->data();
                          echo $data['raw_name'];
                    $Nomes = array(
                        'CodProduto' => $CodProduto,
                        'CodVariante' => $CodVariante,
                        'DirImagem' => base_url('img/Uploads/'.utf8_encode($data['file_name'])),                        
                        'NomeImagem' => utf8_encode($data['raw_name']),
                        'TextoImagem' => '',
                        'TipoImagem' => $data['file_ext'],
                        'TamanhoImagem' => $data['file_size']
                    );
                    
                    $dados = elements(array(
                        'CodProduto', 'CodVariante', 'DirImagem', 
                        'NomeImagem', 'TextoImagem', 'TipoImagem', 
                        'TamanhoImagem'), $Nomes);
                    
                    $this->load->model('imagem_model');
                    $this->imagem_model->Inserir($dados);                                    
            }            
                                               
        }
        

        public function Excluir($CodImagem) {

            $this->load->model('imagem_model');
            $this->imagem_model->Excluir($CodImagem);           

        }
     
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */