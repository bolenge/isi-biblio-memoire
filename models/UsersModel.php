<?php
    namespace Models;

    use Ekolo\Builder\Bin\Model;

    class UsersModel extends Model {

        public function __construct()
        {
            $this->setTable('users');
        }

    }