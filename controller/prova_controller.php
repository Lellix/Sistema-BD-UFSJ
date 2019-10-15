<?php
include "$_SERVER[DOCUMENT_ROOT]/sistema-bd-ufsj/model/prova_DAO.php";
include "$_SERVER[DOCUMENT_ROOT]/sistema-bd-ufsj/model/questao_DAO.php";

class ProvaController {

    private $provaDao = null;
    private $questaoDao = null;

    public function __construct() {
        $this->provaDao = new ProvaDao();
        $this->questaoDao = new QuestaoDao();
    }

    public function adicionarProva($id_usuario, $num_questoes, $id_area) { 
        $data_entrada = date("Y-m-d");
        $finalizada = false;
        $data = ["id_area" => $id_area, ];
        $questoesArea = $this->questaoDao->buscarQuestaoArea($data);
        $questoes = [];
        $num_acertos = 0;
        if (count($questoesArea) < $num_questoes) {
            $num_questoes = count($questoesArea);
            for ($i=0; i<count($questoesArea); $i++) {
                $array_push($questoes, $questoesArea[$i]['id']);
            }
        } else {
            for ($i = 0; $i < $num_questoes; $i++) {
                $id = rand(0, count($questoesArea) - 1);
                array_push($questoes, $questoesArea[$id]['id']);
                unset($questoesArea[$id]);
                $questoesArea = array_values($questoesArea);
            }

            $data = ["data" => $data_entrada, 
            "id_usuario" => $id_usuario,    
            "finalizada" => $finalizada,
            "questoes" => $questoes,
            "num_acertos" => $num_acertos,
        ];

            $res = $this->provaDao->adicionarProva($data);
            return $res;
        }
    }

    public function removerProva($id_prova) { 
        $data = [
            "id" => $id_prova,
        ];
        $ret = $this->provaDao->removerProva($data);
        return $ret;
    }

    public function buscarProva($id_prova) { 
        $data = [
            "id" => $id_prova,
        ];
        $ret = $this->provaDao->buscarProva($data);
        return $ret;
    }

    public function buscarProvaAluno($id_usuario) {
        $data =[ "id_usuario" => $id_usuario, ];
        $ret = $this->provaDao->buscarProvaAluno($data);
        return $ret;
    }

    public function buscarQuestaoProva($id_prova) {
        $data = ["id_prova" => $id_prova, ];
        $ret = $this->provaDao->buscarQuestaoProva($data);
        return $ret;
    }

    public function buscarRespostaQuestao($id_prova, $id_questao) {
        $data = [ "id_prova" => $id_prova, "id_questao" => $id_questao,];
        $ret = $this->provaDao->buscarRespostaQuestao($data);
        return $ret;
    }

    public function alterarRespostaQuestao($id_prova, $id_questao, $resposta) {
        $data = [ "id_prova" => $id_prova, "id_questao" => $id_questao, "resposta" => $resposta,];
        $ret = $this->provaDao->alterarRespostaQuestao($data);
        return $ret;
    }
    public function calculaResultadoProva($id_prova) {
        $questoes = $this->buscarQuestaoProva($id_prova);
        for ($questoes as $questao) {
            $resposta = $this->buscarRespostaQuestao($questao['id']);
            //if ($resposta[0]['resposta_usuario'] == )
        }
    }
}


?>