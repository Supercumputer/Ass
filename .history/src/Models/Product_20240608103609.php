<?php 
namespace Myasus\Assigment\Models;
use Myasus\Assigment\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function all()
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.img_thumbnail',
                'p.created_at',
                'p.updated_at',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->orderBy('p.id', 'desc')
            ->fetchAllAssociative();
    }

    public function paginate($page = 1, $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.img_thumbnail',
                'p.created_at',
                'p.updated_at',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('p.id', 'desc')
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function findByID($id)
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.img_thumbnail',
                'p.price_regular',
                'p.price_sale',
                'p.created_at',
                'p.updated_at',
                'p.overview',
                'p.content',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->where('p.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function top8ProductHighlight(){
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->orderBy('view', 'desc')  // Sắp xếp theo trường view giảm dần
        ->setMaxResults(8)          // Giới hạn 8 bản ghi
        ->fetchAllAssociative();

    }

    public function getNameProductByCategory($categoryName){
        $category = $this->queryBuilder
        ->select('id')
        ->from('categories')
        ->where('name = :categoryName')
        ->setParameter('categoryName', $categoryName)
        ->fetchAssociative();
    
    if (!$category) {
        throw new \Exception("Category not found");
    }

    $categoryId = $category['id'];

    // Thực hiện truy vấn lấy sản phẩm theo id danh mục
    return $this->queryBuilder
        ->select('*')
        ->from('products')
        ->where('category_id = :categoryId')
        ->setParameter('categoryId', $categoryId)
        ->orderBy('view', 'desc')  // Sắp xếp theo trường view giảm dần
        ->fetchAllAssociative();
    
    }
}
?>
