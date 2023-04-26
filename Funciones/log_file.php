<?php

    class LogFile {

        private $fileHandler;
        private $utilities;
        private $directory;
        private $fileName;

        public function __construct ($isRoot = false) {
            $subDirection = ($isRoot) ? "Funciones/" : "";
            $this->directory = "{$subDirection}data";
            $this->fileName = "record";
            $this->fileHandler = new JsonFH();
            $this->utilities = new utilities();
        }

        public function Add($item) {
            $registros = $this->GetList();
            $idGenerated = 0;
            if (count($registros) == 0){
                $idGenerated = 1;
            } else {
                $lastElement = $this->utilities->GetLastElement($registros);
                $idGenerated = $lastElement->id + 1;
            }
            $item->id = strval($idGenerated);
            array_push($registros, $item);
            $this->fileHandler->SaveFile($this->directory, $this->fileName, $registros);

        }

        public function Edit($item) {
            $registros = $this->GetList();
            $index = $this->utilities->GetIndexElement($registros, "id", $item->id);
            if ($index !== null) {
                $registros[$index] = $item;
                $this->fileHandler->SaveFile($this->directory, $this->fileName, $registros);
            }
        }

        public function Delete($item) {
            $registros = $this->GetList ();
            $index = $this->utilities->GetIndexElement($registros, "id", $item->id);
            if ($index !== null) {
                $registros[$index] = $item;
                unset ( $registros[$index]);
                $this->fileHandler->SaveFile($this->directory, $this->fileName, $registros);
            }
        }

        public function GetById($id) {
            $registros = $this->GetList();
            $registro = $this->utilities->SearchProperty($registros, "id", $id);
            if (count($registro) == 0) {
                return null;
            } else {
                return $registro[0];
            }
        }

        public function GetList() {
            $registros = $this->fileHandler->ReadFile($this->directory, $this->fileName);
            if ($registros === null) {
                return array();
            }
            return (array)$registros;
        }
    }

?>
