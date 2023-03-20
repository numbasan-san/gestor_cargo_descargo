<?php

    class ServiceLog {

        private $fileHandler;
        private $utilities;
        private $directory;
        private $fileName;

        public function __construct ( $isRoot = false ) {
            
            $subDirection = ( $isRoot ) ? "Funciones/" : "";
            $this->directory = "{$subDirection}Log";
            $this->fileName = "logs";
            $this->fileHandler = new SerializationFH ();
            $this->utilities = new utilities ();

        }

        public function Add ( $item ) {

            $logs = $this->GetList ();
            array_push ( $logs, $item );
            $this->fileHandler->SaveFile ( $this->directory, $this->fileName, $logs );

        }

        public function GetList () {

            $logs = $this->fileHandler->ReadFile ( $this->directory, $this->fileName );

            if ( $logs === null ) {
                
                return array ();

            }

            return ( array ) $logs;

        }


    }

?>
