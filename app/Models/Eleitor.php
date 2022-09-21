<?php

class Eleitor
{

    private $id_eleitor;
    private $nome_eleitor;
    private $cpf;
    private $idade;
    private $id_candidato;
    public $erro = [];


    public function __construct($nome_eleitor, $cpf, $idade, $id_candidato)
    {
        $this->nome_eleitor = $nome_eleitor;
        $this->cpf = $cpf;
        $this->idade = $idade;
        $this->id_candidato = $id_candidato;
    }


    public function getId_eleitor()
    {

        return $this->id_eleitor;
    }


    public function setId_eleitor($id_eleitor)

    {

        $this->id_eleitor = $id_eleitor;
    }




    public function getNome_eleitor()
    {

        return $this->nome_eleitor;
    }


    public function setNome_eleitor($nome_eleitor)

    {

        $this->nome_eleitor = $nome_eleitor;
    }





    public function getCpf()
    {

        return $this->cpf;
    }


    public function setCpf($cpf)

    {

        $this->cpf = $cpf;
    }




    public function getIdade()
    {

        return $this->idade;
    }


    public function setIdade($idade)

    {

        $this->idade = $idade;
    }





    public function getId_candidato()
    {

        return $this->id_candidato;
    }


    public function setId_candidato($id_candidato)

    {

        $this->id_candidato = $id_candidato;
    }




    public function validarDados()
    {

        if (empty($this->nome_eleitor)) {
            $this->erro["erro_nome_eleitor"] = "O campo nome está vazio!";
        }



        if ($this->idade < 16 || !is_numeric($this->idade)) {
            $this->erro["erro_idade"] = "Idade muito baixa para votar!";
        } elseif ($this->idade > 110 || !is_numeric($this->idade)) {

            $this->erro["erro_idade"] = "Idade avançada para votar!";
        }



        $this->cpf = str_replace(".", "-", $this->cpf);

        if ($this->cpf && !is_numeric($this->cpf)) {
            $this->erro["erro_cpf"] = "O cpf deve ser número!";

        } elseif($this->cpf < 10000000000 || !is_numeric($this->cpf)){

            $this->erro["erro_cpf"] = "O cpf deve possuir 11 digitos!";
        } elseif($this->cpf >= 100000000000 || !is_numeric($this->cpf)){

            $this->erro["erro_cpf"] = "O cpf deve possuir 11 digitos!";
        }

    }
}
