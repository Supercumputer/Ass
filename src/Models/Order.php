<?php

namespace Myasus\Assigment\Models;

use Myasus\Assigment\Commons\Model;

class Order extends Model
{
    protected string $tableName = 'orders';

    public function updateStatus($orderid, $status_delivery)
    {
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

    public function paginate($page = 1,  $sort_by = 'default_sort', $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->setFirstResult($offset)
            ->setMaxResults($perPage);

        switch ($sort_by) {
            case 'created_desc':
                $data->orderBy('created_at', 'desc');
                break;
            case 'created_asc':
                $data->orderBy('created_at', 'asc');
                break;
            default:
                $data->orderBy('id', 'desc');
                break;
        };

        $result = $data->fetchAllAssociative();

        return [$result, $totalPage];
    }
}
