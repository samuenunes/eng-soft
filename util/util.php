<?php    
    function traduz_data_para_banco($data) {
        if ($data == "") 
        { 
            return "0000-00-00"; //modifiquei o código do livro
                            //o mySql não aceitava INSERT com string vazia.
                            //deve usar ou NULL ou "0000-00-00", por causa do tipo date
        }
        $dados = explode("/", $data);
        $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
        return $data_mysql; 
    }
    
    function traduz_data_para_exibir($data) {
        if ($data == "" OR $data == "0000-00-00") 
        { 
            return "";
        }
        $dados = explode("-", $data);
        $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
        return $data_exibir; 
    }
?>