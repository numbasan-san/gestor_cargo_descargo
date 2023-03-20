<?php

    class JsonFH {

        public function SaveFile ( $directory, $fileName, $value ) {

            $this->CreateDirectory ( $directory );
            $path = $directory . "/" . $fileName . ".json";
            $serializeData = json_encode ( $value );
            $file = fopen ( $path, "w+" );
            fwrite ( $file, $serializeData );
            fclose ( $file );

        }

        public function ReadFile ( $directory, $fileName ) {

            $this->CreateDirectory ( $directory );
            $path = $directory . "/" . $fileName . ".json";

            if ( file_exists ( $path ) ) {

                $file = fopen ( $path, "r" );
                $contents = fread ( $file, filesize ( $path ) );
                fclose ( $file );
                return json_decode ( $contents );

            } else {

                return null;

            }

        }

        function CreateDirectory ( $path ) {

            if ( !file_exists ( $path ) ) {

                mkdir ( $path, 0777, true );

            }

        }

    }

?>