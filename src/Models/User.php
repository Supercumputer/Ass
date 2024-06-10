<?php

namespace Myasus\Assigment\Models;

use Myasus\Assigment\Commons\Model;

class User extends Model
{
    protected string $tableName = 'users';

    public function findByEmail($email)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();
    }

    public function getTop5MemberNew(){
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('type = ?')
            ->setParameter(0, 'member')
            ->orderBy('id', 'desc')
            ->setMaxResults(5)
            ->fetchAllAssociative();
    }

    

}
