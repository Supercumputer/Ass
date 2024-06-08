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


    public function getProductsByCategory($categoryId){
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('category_id = ?')  // Lọc theo danh mục với dấu ?
            ->setParameter(0, $categoryId)  // Đặt giá trị cho tham số với chỉ số 0
            ->fetchAllAssociative();
    }
    
    public function getRelatedProducts($productId, $categoryId) {
        // Subquery to count the number of products with the same category_id
        $countQuery = $this->queryBuilder
            ->select('COUNT(*)')
            ->from($this->tableName)
            ->where('category_id = ?')
            ->setParameter(0, $categoryId);
    
        // Main query to fetch related products with the maximum result based on the count of products
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('category_id = ?')
            ->andWhere('id != ?')
            ->setParameter(0, $categoryId)
            ->setParameter(1, $productId)
            ->setMaxResults($countQuery)  // Set max results to the count of products
            ->fetchAllAssociative();
    }
    
    
    
    
    
    
}
?>
