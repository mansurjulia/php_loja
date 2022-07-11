<?php

    date_default_timezone_set(('America/Sao_Paulo'));

    function uploadImg($file) {
                
        # valida erros possíveis - é melhor colocar no inicio pois se algo estiver errado ele não vai tentar validar tudo
        switch($file['error']) {
            case UPLOAD_ERR_OK:
                //echo 'O arquivo foi upado com sucesso.';
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'O arquivo excedeu o tamanho limite.';
                exit;
            case UPLOAD_ERR_NO_FILE:
                echo 'O arquivo não foi enviado.';
                exit;
            default:
                echo 'Erro desconhecido.';
                exit;
        }

        # valida se o arquivo possui até 10mb, ele "lê" em bytes
        if($file['size'] > 10000000) {
            echo 'Tamanho superior a 10mb.';
        }
        
        #valida o tipo do arquivo
        $tiposValidos = array(
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png'
        );

        # essa função monta o novo nome do arquivo: .jpg .jpeg ...

        //$exploded = explode('.', $file['name']); //Onde o explode encontrar o que está entre as '' ele vai quebrar a criptografia, transformando em array
        //$ext = end($exploded); // o end pega a última posição do array    

        if(!$ext = array_search($file['type'], $tiposValidos, true)) {
            echo 'O arquivo enviado não é válido.';
        } 
        
        ##montar o novo nome do arquivo:
        $localSalvar = sprintf('.' . DIRECTORY_SEPARATOR . 'imagens' . DIRECTORY_SEPARATOR . '%s.%s', md5(date('Y.m.d-H.i.s.ms')), $ext); //%s.%s pq é uma string.string, poderia ser %d se fosse um digito, %c se fosse um caractere ou %f se fosse um float
 
        if(move_uploaded_file($file['tmp_name'], $localSalvar)) {
            return substr($localSalvar, 2); //o 2 é só para tirar o .\ antes do endereço da img
        }
            echo 'Ocorreu um erro ao tentar efetuar o upload.';
    }