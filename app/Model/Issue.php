<?php

namespace App\Model;


class Issue extends Model
{
    protected $table = 'issue';

    /**
     * @param array $condition
     * [
     *   'rows' => int,
     *   'page' => int,
     *   'sort' => 'field_name desc, field_name'
     * ]
     * @return array
     */
    public function pagination(array $condition)
    {
        $select = $this->select();
        $select->from($this->table);
        if (!empty($condition['rows'])) {
            $select->limit($condition['rows']);
            if (!empty($condition['page'])) {
                $select->offset($condition['rows'] * $condition['page']);
            }
        }
        if (!empty($condition['sort'])) {
            $select->order($condition['sort']);
        }
        return $select->execute()->fetchAll();
    }

    /**
     * @param int $id
     * @return array
     */
    public function findOn(int $id)
    {
        $select = $this->select();
        $select->from($this->table);
        $select->where(['id' => $id]);
        return $select->execute()->fetchAll();
    }
}