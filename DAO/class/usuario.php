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

        // if (isset($result)) {
        //     $this->setData($result[0]);
        // }

        if (count($result) > 0) {

			$this->setData($result[0]);

		}
    }

    public function __toString()
    {

        return json_encode(
            array(
                "idUsuario" => $this->getIdusuario(),
                "desLogin" => $this->getDeslogin(),
                "desSenha" => $this->getDessenha(),
                "dtCadastro" => $this->getdtcadastro()->format("d/m/Y H:i:s")

            )
        );
    }


    public static function getList()
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuario ORDER BY desLogin");
    }


    public static function search($login)
    {
        $sql = new Sql();

        return $sql->select(
            "SELECT * FROM tb_usuario WHERE desLogin LIKE :SEARCH ORDER BY desLogin",
            array(
                ':SEARCH' => "%%" . $login . "%%"
            )
        );
    }



    public function login($login, $password)
    {
        $sql = new Sql();

        $result = $sql->select(
            "SELECT * FROM tb_usuario WHERE desLogin = :LOGIN AND desSenha = :PASSWORD",
            array(
                ":LOGIN" => $login,
                ":PASSWORD" => $password
            )
        );

        // if (isset($result)) {

        //     $this->setData($result[0]);
        // }
        if (count($result) > 0) {

			$this->setData($result[0]);

		}
        
        else {
            throw new Exception("Login e/ou senha invalidos");
        }
    }



    public function insert()
    {
        $sql = new Sql();

        $result = $sql->select("CALL sp_usuario_insert(:LoGIN, :PASSWORD)", array(
            ':LOGIN' => $this->desLogin,
            ':PASSWORD' => $this->desSenha
        )
        );

		if (count($result) > 0) {

			$this->setData($result[0]);

		}
    }


    // public function setData($data)
    // {

    //     $this->setIdusuario($data['idUsuario']);
    //     $this->setDeslogin($data['desLgin']);

    //     $this->setDessenha($data['desSenha']);
    //     $this->setDtcadastro(new DateTime($data['dtCadastro']));
    // }

    public function setData($data){

		$this->setIdusuario($data['idUsuario']);
		$this->setDeslogin($data['desLogin']);
		$this->setDessenha($data['desSenha']);
		$this->setDtcadastro(new DateTime($data['dtCadastro']));

	}



    public function update($login, $password)
    {
        $sql = new Sql();

        $this->setDeslogin($login);
        $this->setDessenha($password);

        $sql->run("UPDATE tb_usuario SET desLogin = :LOGIN , desSenha = :PASSWORD WHERE idUsuario = :ID", array(
            ':LOGIN' => $this->getDeslogin(),
            ':PASSWORD' => $this->getDessenha(),
            ':ID' => $this->getIdusuario()

        )
        );
    }


    public function delete()
    {
        $sql = new Sql();


        $sql->run("DELETE FROM tb_usuario WHERE idUsuario = :ID", array(
            ':ID' => $this->getIdusuario()
        ));

        $this->setIdusuario(0);
        $this->setDeslogin("");
        $this->setDessenha("");
        $this->setData(new DateTime());


    }
}


?>