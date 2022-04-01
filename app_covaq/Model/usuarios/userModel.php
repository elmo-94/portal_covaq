<?php
//include("conexao.php");


class userModel{

    public $con;

    public function __construct(){

        $this->con = Conexao::conectar();
    }
    
    public function getAll(){
           
        $dados = array();
        $sql = 'SELECT * from usuarios order by id_user desc';  
        $cmd = $this->con->query($sql);
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function insert(UsuarioModel $usuarioModel){
        try {
            $stmt = $this->conn->prepare(
                'INSERT into usuarios (usuario,email,senha,nivel)'
                . ' VAUES (:nome,:email,:senha,:nivel)'
            );

            $stmt->binsValue(':nome',$usuarioModel->getNome());
            $stmt->binsValue(':email',$usuarioModel->getEmail());
            $stmt->binsValue(':senha',$usuarioModel->getSenha());
            $stmt->binsValue(':nivel',$usuarioModel->getNivel());
            $stmt->execute();
            

        } catch (Exception $e) {
            echo 'Erro: '.$e->getMessage();
            return false;
        }

        return true;

    }


    public function delete($id){
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'UPDATE from usuarios where id_user = :id'
            );

            $stmt->binsValue(':id',$id);
            $stmt->execute();

            $this->conn->commit();
        } catch (Exception $e) {
            $this->conn->rollback();
        }
        return true;
    }

    public function update(UsuarioModel $usuarioModel){
        try {
            $stmt = $this->conn->prepare(
                'UPDATE usuarios SET usuario=:usuario, email=:email, senha=:senha, nivel=nivel:'
                .' where id_user = :id'
            );

            $stmt->binsValue(':nome',$usuarioModel->getNome());
            $stmt->binsValue(':email',$usuarioModel->getEmail());
            $stmt->binsValue(':senha',$usuarioModel->getSenha());
            $stmt->binsValue(':nivel',$usuarioModel->getNivel());
            $stmt->execute();
            
        } catch (Exception $e) {
            echo 'Erro: '.$e->getMessage();
            return false;
        }

        return true;
    }

    public function getAllByID($id){
        
        $stmt = $this->conn->prepare(
            'SELECT * from usuarios Where id_user = :id'
        );

        $stmt->binsValue(':id', $id);

        if($stmt->execute()) {

                $row = $stmt->fechObject();

                $usuarioModel = new UsuarioModel();
                $usuarioModel->setId($row->ID);
                $usuarioModel->setNome($row->NOME);
                $usuarioModel->setEmail($row->EMAIL);
                $usuarioModel->setSenha($row->SENHA);
                $usuarioModel->setNivel($row->NIVEL);

                return $usuarioModel;
        }
        
    }
}