<?php
include "$_SERVER[DOCUMENT_ROOT]/sistema-bd-ufsj/model/usuario_DAO.php";

class UsuarioController {
    private $usuarioDao = null;

    public function __construct() {
        $this->usuarioDao = new UsuarioDAO();
    }

    public function adicionarUsuario($nome, $email, $cpf, $idade, $senha, $sexo, $data_nasc, $id_area, $tipo_ingresso, $tipo_usuario) {
        $data = [
            "nome" => $nome,
            "email" => $email,
            "cpf" => $cpf,
            "idade" => $idade,
            "senha" => $senha,
            "sexo" => $sexo,
            "data_nasc" => $data_nasc,
            "id_area" => $id_area,
            "tipo_ingresso" => $tipo_ingresso,
            "tipo_usuario" => $tipo_usuario,
        ];
        
        $ret = $this->usuarioDao->adicionarUsuario($data);
        return $ret;
    }

    public function removerUsuario($cpf) { 
        $ret = $this->usuarioDao->removerUsuario($cpf);
        return $ret;
    }

    public function alterarUsuario($nome, $email, $cpf, $idade, $senha, $sexo, $data_nasc, $id_area, $tipo_ingresso) { 
        $data = [
            "nome" => $nome,
            "email" => $email,
            "cpf" => $cpf,
            "idade" => $idade,
            "senha" => $senha,
            "sexo" => $sexo,
            "data_nasc" => $data_nasc,
            "id_area" => $id_area,
            "tipo_ingresso" => $tipo_ingresso,
            "tipo_usuario" => $tipo_usuario,
        ];
        $ret = $this->usuarioDao->alterarUsuario($data);
        return $ret;
    }

    public function buscarUsuario($cpf) {
        $data = [ "cpf" => $cpf, ];

        $ret = $this->usuarioDao->buscarUsuario($data);
        return $ret;
    }
}