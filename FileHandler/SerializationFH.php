<?php

    class SerializationFH {

        public function SaveFile ( $directory, $fileName, $value ) {

            $this->CreateDirectory ( $directory );
            $path = $directory . "/" . $fileName . ".txt";
            $serializeData = serialize ( $value );
            $file = fopen ( $path, "w+");
            fwrite ( $file, $serializeData );
            fclose ( $file );

        }

        public function ReadFile ( $directory, $fileName ) {

            $this->CreateDirectory ( $directory );
            $path = $directory . "/" . $fileName . ".txt";

            if ( file_exists ( $path ) ) {

                $file = fopen ( $path, "r" );
                $contents = fread ( $file, filesize ( $path ) );
                fclose ( $file );
                return unserialize ( $contents );

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