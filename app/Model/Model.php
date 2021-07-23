<?php

namespace App\Model;

use App\Lib\Orm\Delete;
use App\Lib\Orm\Insert;
use App\Lib\Orm\Select;
use App\Lib\Orm\Update;

/**
 * Base model
 */
class Model
{
    /**
     * @return Select
     */
    protected function select(): Select
    {
        return new Select();
    }

    /**
     * @return Insert
     */
    protected function insert():Insert
    {
        return new Insert();
    }

    /**
     * @return Update
     */
    protected function update():Update
    {
        return new Update();
    }

    /**
     * @return Delete
     */
    protected function delete():Delete
    {
        return new Delete();
    }
}