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


        public function cadastrar()
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
			//
			  echo $emailT = $this->getEmail();
			 echo $senhaT = $this->getSenha();
			try{
				$sql = "SELECT * FROM $this->table WHERE email = ? AND senha = ?";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(1, $emailT);
				$stmt->bindParam(2, $senhaT);
				$stmt->execute();
				if ($stmt->rowCount() <= 0){
					echo "Email ou senha incorretos!!!1 ";
					echo "Teste". $emailT ."-". $senhaT;
					exit;
				}ELSE {
					echo $emailT;
					echo $senhaT;
					// pega o primeiro usuário
					$users = $stmt->fetchRow(PDO::FETCHMODE_ASSOC);
					//$user = $users[0];
					session_start();
					$_SESSION['logado'] = true;
					$_SESSION['user_id'] = $users['id_usuario'];
					$_SESSION['user_name'] = $users['nome'];
					 $this->setNome($_SESSION['user_name']);

					$name = $this->getNome();

					header('Location: WeLive/');
				}
			}catch (PDOException $e){
				echo "Error".$e->getMessage();
			}
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