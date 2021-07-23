<?php

namespace App\Model;


class User extends Model
{
    protected $table = 'UserSeeder';

    public function __construct()
    {
        parent::init($this->table);
    }

}