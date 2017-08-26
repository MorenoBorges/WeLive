<?php
    require_once 'crud.php';

    class usuario extends crud{

        protected $table = "usuarios";
        private $nome;
        private $idade;
        private $sexo;
        private $email;
        private $senha;
        private $peso;
        private $altura;
        private $imc;
        private $vet;
        private $exercicios_semanais;

        /**
         * @return mixed
         */
        public function getNome()
        {
            return $this->nome;
        }

        /**
         * @param mixed $nome
         */
        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        /**
         * @return mixed
         */
        public function getIdade()
        {
            return $this->idade;
        }

        /**
         * @param mixed $idade
         */
        public function setIdade($idade)
        {
            $this->idade = $idade;
        }

        /**
         * @return mixed
         */
        public function getSexo()
        {
            return $this->sexo;
        }

        /**
         * @param mixed $sexo
         */
        public function setSexo($sexo)
        {
            $this->sexo = $sexo;
        }


        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getSenha()
        {
            return $this->senha;
        }

        /**
         * @param mixed $senha
         */
        public function setSenha($senha)
        {
            $this->senha = $senha;
        }

        /**
         * @return mixed
         */
        public function getPeso()
        {
            return $this->peso;
        }

        /**
         * @param mixed $peso
         */
        public function setPeso($peso)
        {
            $this->peso = $peso;
        }

        /**
         * @return mixed
         */
        public function getAltura()
        {
            return $this->altura;
        }

        /**
         * @param mixed $altura
         */
        public function setAltura($altura)
        {
            $this->altura = $altura;
        }

        /**
         * @return mixed
         */
        public function getImc()
        {
            return $this->imc;
        }

        /**
         * @param mixed $imc
         */
        public function setImc($imc)
        {
            $this->imc = $imc;
        }

        /**
         * @return mixed
         */
        public function getVet()
        {
            return $this->vet;
        }

        /**
         * @param mixed $vet
         */
        public function setVet($vet)
        {
            $this->vet = $vet;
        }

        /**
         * @return mixed
         */
        public function getExerciciosSemanais()
        {
            return $this->exercicios_semanais;
        }

        /**
         * @param mixed $exercicios_semanais
         */
        public function setExerciciosSemanais($exercicios_semanais)
        {
            $this->exercicios_semanais = $exercicios_semanais;
        }


        public function cadastrarUsuario()
        {
            try {
                $sql = "INSERT INTO $this->table (nome, idade, sexo, email, senha, peso, altura, imc, vet, qntd_exercicios) VALUES (:nome, :idade, :sexo, :email, :senha, :peso, :altura, :imc, :vet, :exercicios_semanais)";
                $stmt = DB::prepare($sql);
                $stmt -> bindParam(':nome', $this->nome);
                $stmt -> bindParam(':idade', $this->idade);
                $stmt -> bindParam(':sexo', $this->sexo);
                $stmt -> bindParam(':email', $this->email);
                $stmt -> bindParam(':senha', $this->senha);
                $stmt -> bindParam(':peso', $this->peso);
                $stmt -> bindParam(':altura', $this->altura);
                $stmt -> bindParam(':imc', $this->imc);
                $stmt -> bindParam(':vet', $this->vet);
                $stmt -> bindParam(':exercicios_semanais', $this->exercicios_semanais);
                return $stmt->execute();
            }catch(PDOException $e){
                echo "Error:". $e->getMessage();
            }

        }

        public function logarUsuario(){

            session_start();
            $emailT = $this->getEmail();
            $senhaT = $this->getSenha();

            $sql = ("SELECT * FROM $this->table WHERE email = :emailT");
            $stmt = DB::prepare($sql);
            $stmt-> bindParam(':emailT', $emailT);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $message = '';
            $_SESSION['user_id'] = $results['id_usuario'];
            $_SESSION['user_nome'] = $results['nome'];
            $_SESSION['user_idade'] = $results['idade'];
            $_SESSION['user_sexo'] = $results['sexo'];
            $_SESSION['user_peso'] = $results['peso'];
            $_SESSION['user_altura'] = $results['altura'];
            $_SESSION['user_email'] = $results['email'];
            $_SESSION['user_senha'] = $results['senha'];
            $_SESSION['user_imc'] = $results['imc'];
            $_SESSION['user_vet'] = $results['vet'];
            $_SESSION['user_exe_sem'] = $results['qntd_exercicios'];
            $_SESSION['logado'] = true;


            if(count($results) > 0 && ($senhaT == $results['senha']) ){

             $this->setNome($_SESSION['user_nome']);
             $this->setIdade($_SESSION['user_idade']);
             $this->setSexo($_SESSION['user_sexo']);
             $this->setPeso($_SESSION['user_peso']);
             $this->setAltura($_SESSION['user_altura']);
             $this->setEmail($_SESSION['user_email']);
             $this->setImc($_SESSION['user_imc']);
             $this->setVet($_SESSION['user_vet']);
             $this->setExerciciosSemanais($_SESSION['user_exe_sem']);


                //header("location: http://localhost/phpmyadmin/db_structure.php?server=1&db=tcc");
                return true;
            } else {
                $message = 'Sorry, those credentials do not match';
            }
        }

        public function inserirImagem(){


        }

        /**
         * @param $id
         * @return bool
         */
        public function update($id){
            try {
                $sql = "UPDATE $this->table SET nome = :nome, idade = :idade,sexo = :sexo, email = :email, senha = :senha, peso = :peso, altura = :altura, imc = :imc, vet = :vet, exercicios_semanais = :exercicios_semanais WHERE id = :id";
                $stmt = DB::prepare($sql);
                $stmt->bindParam(':nome', $this->nome);
                $stmt->bindParam('nome', $this->idade);
                $stmt->bindParam('sexo', $this->sexo);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':senha', $this->senha);
                $stmt->bindParam(':peso', $this->peso);
                $stmt->bindParam(':altura', $this->altura);
                $stmt->bindParam(':imc', $this->imc);
                $stmt->bindParam(':vet', $this->vet);
                $stmt->bindParam(':exercicios_semanais', $this->exercicios_semanais);
                return $stmt->execute();
            }catch (PDOException $e){
                echo "Error:".$e->getMessage();
            }
        }


    }
?>