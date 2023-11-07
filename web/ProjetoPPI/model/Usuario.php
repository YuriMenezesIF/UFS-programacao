<?php

//require_once "Conexao.php";

class Usuario {

    private $nome, $email, $senha;

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function salvarUser() {
        $salvar = true;

        if ($this->nome == null) {
            $salvar = false;
        }

        if ($this->email == null) {
            $salvar = false;
        }

        if ($this->senha == null) {
            $salvar = false;
        }

        if ($salvar) {
            $banco = fopen("bd/usuario.bd", "a");
            fwrite($banco, $_POST["nome"] . "|" .
                    $_POST["email"] . "|" .
                    $_POST["senha"] . "\n");
            fclose($banco);
        }
        header("Location: ../index.php");
    }

    public function editarUsuario() {
        //Conexao::editarUser();
    }

}
