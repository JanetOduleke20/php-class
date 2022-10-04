<?php

    class User {
        public function __construct() {
            echo "Hello word";
        }

        protected $first_name = '';
        public $last_name = '';

        public function createUser($first_name, $last_name)
        {
            $this->first_name = $first_name;
            print_r($first_name.' '.$last_name);
        }

        private function getUser()
        {
            $this->createUser("Bryan", "Williams");
        }

        public function __destruct()
        {
            echo "Page has loaded";
        }
    }

    $firstUser = new User;
    $firstUser->createUser("Janet", "Oduleke");
    // echo $firstUser->first_name;

    $secondUser = new User;
    $secondUser->createUser("Joy", "Adeleke");

?>