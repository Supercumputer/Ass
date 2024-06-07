<?php

namespace Myasus\Assigment\Models;

use Myasus\Assigment\Commons\Model;

class Order extends Model 
{
    protected string $tableName = 'orders';

    public function updateStatus($id){
        $this->queryBuilder
        ->update($this->tableName)
        ->set('status_delivery', '?')
        ->setParameter(0, $id)
        ->executeQuery();
    }
}