<?php

require_once  'Conexao.php';

class Usuario {
    private static $nome;
    private static $email;
    private static $senha;

    public static function getNome() {
        return self::$nome;
    }

    public static function getEmail() {
        return self::$email;
    }

    public static function getSenha() {
        return self::$senha;
    }

    public static function setNome($nome) {
        self::$nome = $nome;
    }

    public static function setEmail($email) {
        self::$email = $email;
    }

    public static function setSenha($senha) {
        self::$senha = $senha;
    }
        
    public function salvar() {
        $campos = self::$nome . Conexao::separator . self::$email . Conexao::separator . self::$senha;

        Conexao::salvar($campos);
    }
    
}