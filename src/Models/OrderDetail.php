<?php

namespace Myasus\Assigment\Models;

use Myasus\Assigment\Commons\Model;

class OrderDetail extends Model
{
    protected string $tableName = 'order_details';

    public function findByOrderId($id)
    {
        return $this->queryBuilder
            ->select(
                'o.id',
                'o.price_regular',
                'o.price_sale',
                'o.quantity',
                'p.name',
                'p.img_thumbnail',
            )
            ->from($this->tableName, 'o')
            ->innerJoin('o', 'products', 'p', 'p.id = o.product_id')
            ->where('order_id = ?')
            ->setParameter(0, $id)
            ->fetchAllAssociative();
    }
}
