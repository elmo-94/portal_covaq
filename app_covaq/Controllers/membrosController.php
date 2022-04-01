<?php

include_once 'Model/admin/membrosModel.php';

class membrosController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new membrosModel();   
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/membros', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/cad_membros', $instModel, $dados); 

        }             
    }
    public function infor(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel[3] = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/membros', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('admin/membros',array(), $instModel);
           
    }
    public function cad_membros(){
        $dados = $this->Model->carregarCampos();
        $this->carregarTemplate('admin/cad_membros', $dados);
    }
    

    public function cadastrar(){  
        //CALCULO DA IDADE
        
        $novo_actual = date("Y");
        $ano_nasc = $_POST['data_nasc'];
        $idade=($novo_actual-date('Y',strtotime($ano_nasc)));

        //CALCULO DE TEMPO DE MEMBRASIA
        $data_bat = $_POST['data_bap'];
        $tempo = date("Y")-date('Y', strtotime($data_bat));

        $this->Model->id_mem = $_POST['id_mem'];
        $this->Model->nome = $_POST['nome'];
        $this->Model->ident = $this->gerarCodigo();
        $this->Model->identidade = $_POST['identidade'];
        $this->Model->data_val = $_POST['data_val'];
        $this->Model->genero = $_POST['genero'];
        $this->Model->esta_civil = $_POST['esta_civil'];
        $this->Model->ponto_ref = $_POST['ponto_ref'];
        $this->Model->provincia = $_POST['provincia'];
        $this->Model->naturalidade = $_POST['naturalidade'];
        $this->Model->data_nasc = $_POST['data_nasc'];
        $this->Model->idade = $idade;

        $this->Model->telefone = $_POST['telefone'];
        $this->Model->tel_emerg = $_POST['tel_emerg'];
        $this->Model->email = $_POST['email'];
        $this->Model->pai = $_POST['pai'];
        $this->Model->mae = $_POST['mae'];
        $this->Model->grupo_sang = $_POST['grupo_sang'];
        $this->Model->estado = $_POST['estado'];
        
        if(!empty($_POST['foto_visualizada']) || isset($_FILES['arquivo']['name'])){
            if(!empty($_FILES['arquivo']['name'])){
                $this->Model->status_foto = "true";
                $this->Model->foto = $this->upload_arquivo();  
            }else{
                $this->Model->status_foto = "false"; 
            }             
         } 
         else if(empty($_POST['foto_visualizada'])){
            $this->Model->foto = $this->upload_arquivo();  
         }
                
        //DADOS DE MEMBRASIA
        $this->Model->tipo_memb = $_POST['tipo_memb']; 
        $this->Model->data_bap = $_POST['data_bap'];
        $this->Model->data_bap = $_POST['data_recep'];
        $this->Model->ministro = $_POST['ministro'];
        $this->Model->local_bap = $_POST['local_bap'];
        if(isset($_POST['proven'])){
            $this->Model->proven = $_POST['proven'];
        }
        $this->Model->tempo = $tempo;

        //DADOS DE FINANÇAS
        $this->Model->profissao = $_POST['profissao'];
        $this->Model->sector = $_POST['sector'];
        $this->Model->dizimo = $_POST['dizimo']; 
        $this->Model->ramo_activ= $_POST['ramo_activ'];
        $this->Model->local_servico= $_POST['local_servico'];

        //DADOS DE FORMAÇÃO
        $this->Model->nivel = $_POST['nivel']; 
        $this->Model->instituicao = $_POST['instituicao']; 
        $this->Model->especialidade = $_POST['especialidade'];

        $this->Model->nivel_teo = $_POST['nivel_teo']; 
        $this->Model->instituicao_teo = $_POST['instituicao_teo']; 
        $this->Model->curso_teo = $_POST['curso_teo'];
        $this->Model->outra_instituicao = $_POST['outra_instituicao'];
        

        //DADOS DE ENDEREÇO
        $this->Model->bairro= $_POST['bairro'];
        $this->Model->rua= $_POST['rua'];
        $this->Model->zona= $_POST['zona'];
        $this->Model->quarteirao= $_POST['quarteirao'];
        $this->Model->casa= $_POST['casa'];

        //DADOS DE MINISTÉRIO
        $this->Model->id_min= $_POST['id_min'];
        $this->Model->funcao= $_POST['funcao']; 
        $this->Model->outra_funcao= $_POST['outra_funcao']; 

        $this->Model->id_min2= $_POST['id_min2'];
        $this->Model->funcao2= $_POST['funcao2']; 
        $this->Model->outra_funcao2= $_POST['outra_funcao2']; 

        $this->Model->id_min3= $_POST['id_min3'];
        $this->Model->funcao3= $_POST['funcao3']; 
        $this->Model->outra_funcao3= $_POST['outra_funcao3'];

        //DADOS DE MEMBROS_DETALHES
        $this->Model->agregado= $_POST['agregado']; 
        $this->Model->num_filhos= $_POST['num_filhos']; 
        $this->Model->estatus= $_POST['estatus']; 

        if(isset($_POST['esta_civil'])!='Solteiro'){
            $this->Model->conjuge= $_POST['conjuge'];
            $this->Model->tipo_cas= $_POST['tipo_cas']; 
            $this->Model->data_cas= $_POST['data_cas'];
        }
        //DADOS DE DISCIPULADO 
        $this->Model->classe_disc = $_POST['classe_disc'];
        $this->Model->estado_disc= $_POST['estado_disc'];
        $this->Model->localidade_disc= $_POST['localidade_disc']; 
        //$this->Model->data_reg_disc= $_POST['data_reg_disc'];
        

        //DADOS DE MISSIONARIOS
        //$this->Model->data_consag= $_POST['data_consag'];
        if(isset($_POST['id_campo_miss'])){
        $this->Model->id_campo_miss= $_POST['id_campo_miss'];}

        $this->Model->fase= $_POST['fase']; 
        $this->Model->estado_disc= $_POST['estado_disc'];
        
        if(isset($_POST['id_prof'])){
            $this->Model->id_prof= $_POST['id_prof'];
            $this->Model->consagracao= $_POST['consagracao']; 
        } 
        
        //DADOS DE MEMBROS_CAMPO
        $this->Model->id_camp= $_POST['id_camp']; 
        
        $estado = $this->Model->id_mem > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso = array();
        $dados = $this->Model->listar(); 
        if($estado == true){
            if($this->Model->id_mem > 0 ){

                $aviso[2] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/membros', $aviso, $dados);
            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/membros', $aviso, $dados);
            }
        }
        else{
            $aviso[0] = 'O nº do Bilhete já foi cadastrado';
            $this->carregarTemplate('admin/cad_membros', $aviso, $dados);
        }
        
    }

    public function eliminar(){
        $aviso[] =array();
        $estado = $this->Model->delete($_REQUEST['cod']);
        //var_dump($estado);exit;
        if($estado==true){
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Um registo foi eliminado com sucesso !';
            $this->carregarTemplate('admin/membros', $aviso, $dados);
        }
        else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não foi possível eliminar este registo ';
            $this->carregarTemplate('admin/membros', $aviso, $dados);
        }    
    }
    public function impirmir(){

        $dados = $this->Model->listar();

      $this->carregarTemplate('admin/print_mem', array(), $dados);
           
    }

    public function upload_arquivo(){
        //UPLOAD DE ARQUIVO
        if(isset($_FILES['arquivo'])){
            
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pegar a extensão do arquivo
            $nome_arquivo = md5($_FILES['arquivo']['name']) . $extensao; //define o nome do arquivo
            $diretorio = "img/fotos/"; //define o directorio para onde sera guardado o arquivo
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome_arquivo); //fectuar i upload
            return $nome_arquivo;
        }       
        
    }

    public function gerarCodigo(){
    
        $nreg = $this->Model->novoRegisto(); 
        $ano_bap =date("Y", strtotime($_POST['data_bap']));
        $ger = "";


        if($ano_bap <= 1998 && $ano_bap <= 2002){
            $ger = "01";
        }
        else if($ano_bap > 2002 && $ano_bap <= 2007){
            $ger = "02";
        }
        else if($ano_bap >= 2008 && $ano_bap <= 2012){
            $ger = "03";
        }
        else if($ano_bap >= 2013 && $ano_bap <= 2017){
            $ger = "04";
        }
        else if($ano_bap >= 2018 && $ano_bap <= 2022){
            $ger = "05";
        }
        else if($ano_bap >= 2023 && $ano_bap <= 2027){
            $ger = "06";
        }

        else if($ano_bap >= 2028 && $ano_bap <= 2032){
            $ger = "07";
        }
        else if($ano_bap >= 2033 && $ano_bap <= 2037){
            $ger = "08";
        }
        else if($ano_bap >= 2038 && $ano_bap <= 2042){
            $ger = "09";
        }
        else if($ano_bap >= 2043 && $ano_bap <= 2047){
            $ger = "10";
        }

        $codigo = '00' . $nreg[0]->novo . "ICBVQ" . $ger;

        return $codigo;
    }
   
}