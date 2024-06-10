<?php

namespace Myasus\Assigment\Models;

use Myasus\Assigment\Commons\Model;

class Order extends Model 
{
    protected string $tableName = 'orders';

    public function updateStatus($orderid, $status_delivery) {
        $this->queryBuilder
        ->update($this->tableName)
        ->set('status_delivery', '?')
        ->where('id = ?')
        ->setParameter(0, $status_delivery)
        ->setParameter(1, $orderid)
        ->executeQuery();
    }

    public function findByUserID($id)
    {
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('user_id = ?')
        ->setParameter(0, $id)
        ->fetchAllAssociative();
    }
}