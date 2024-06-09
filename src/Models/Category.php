<?php 
namespace Myasus\Assigment\Models;
use Myasus\Assigment\Commons\Model;

class Category extends Model
{
    protected string $tableName = 'categories';

    public function findProductsInCategory($category)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('category = :category')
            ->setParameter('category', $category)
            ->fetchAssociative();// Assume this method fetches all matching records
    }

    
}