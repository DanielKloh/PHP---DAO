<?php

class Usuario
{

    private $idUsuario;
    private $desLogin;
    private $desSenha;
    private $dtCadastro;

    public function getIdusuario()
    {
        return $this->idUsuario;
    }

    public function setIdusuario($value)
    {
        $this->idUsuario = $value;
    }


    public function getDeslogin()
    {
        return $this->desLogin;
    }

    public function setDeslogin($value)
    {
        $this->desLogin = $value;
    }


    public function getDessenha()
    {
        return $this->desSenha;
    }

    public function setDessenha($value)
    {
        $this->desSenha = $value;
    }



    public function getdtcadastro()
    {
        return $this->dtCadastro;
    }

    public function setDtcadastro($value)
    {
        $this->dtCadastro = $value;
    }


    public function LoadById($id)
    {

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuario WHERE idUsuario = :ID", array(":ID" => $id));

        if (isset($result)) {
            $row = $result[0];

            $this->setIdusuario($row['idUsuario']);
            $this->setDeslogin($row['desLgin']);

            $this->setDessenha($row['desSenha']);
            $this->setDtcadastro(new DateTime($row['dtCadastro']));

        }
    }

    public function __toString()
    {

        return json_encode(
            array(
                "idUsuario" => $this->getIdusuario(),
                "desLgin" => $this->getDeslogin(),
                "desSenha" => $this->getDessenha(),
                "dtCadastro" => $this->getdtcadastro()->format("d/m/Y H:i:s")

            )
        );
    }

}


?>