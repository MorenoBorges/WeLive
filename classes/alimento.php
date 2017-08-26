<?php
    require_once 'crud.php';

    class alimento extends crud{

        protected $table = "alimentos";
        public $nome;
        public $categoria;
        public $calorias;
        public $qntd;

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
        public function getCategoria()
        {
            return $this->categoria;
        }

        /**
         * @param mixed $categoria
         */
        public function setCategoria($categoria)
        {
            $this->categoria = $categoria;
        }

        /**
         * @return mixed
         */
        public function getCalorias()
        {
            return $this->calorias;
        }

        /**
         * @param mixed $calorias
         */
        public function setCalorias($calorias)
        {
            $this->calorias = $calorias;
        }

        /**
         * @return mixed
         */
        public function getQntd()
        {
            return $this->qntd;
        }

        /**
         * @param mixed $qntd
         */
        public function setQntd($qntd)
        {
            $this->qntd = $qntd;
        }

        public function cadastrarAlimento(){
            $sql = "INSERT INTO $this->table nome, categoria, calorias, qntd VALUES (:nome, :categoria, :calorias, :qntd)";
            $stmt = DB::prepare($sql);
            $stmt ->bindParam(':nome', $this->nome);
            $stmt ->bindParam(':categoria', $this->categoria);
            $stmt ->bindParam(':calorias', $this->calorias);
            $stmt ->bindParam(':qntd', $this->qntd);
            return $stmt->execute();

        }
    }

?>