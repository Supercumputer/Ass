<?php

namespace Myasus\Assigment\Controllers\Admin;

use Myasus\Assigment\Commons\Controller;
use Myasus\Assigment\Commons\Helper;
use Myasus\Assigment\Models\Category;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{

    private Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    //  public function index()
    // {

    //     helper::debug($this->category);
    //     echo __CLASS__ . '@' . __FUNCTION__;

    // }
    public function index()
    {

        [$category, $totalPage] = $this->category->paginate($_GET['page'] ?? 1);


        $this->renderViewAdmin('category.index', [
            'category' => $category,
            'total' => $totalPage,
        ]);
    }

    public function delete($id)
    {
        $category = $this->category->findByID($id);

        $this->category->delete($id);

        if (
            $category['image']
            && file_exists(PATH_ROOT . $category['image'])
        ) {
            unlink(PATH_ROOT . $category['image']);
        }

        header('Location: ' . url('admin/categories'));
        exit();

    }

    public function create()
    {
        $this->renderViewAdmin('category.create');

    }

    public function store()
    {
        //   helper::debug($_POST +  $_FILES);
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name' => 'required|max:50',
            'image' => 'uploaded_file:0,2M,jpg,jpeg,webp',

        ]);

        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['$errors'] = $validation->errors()->firstOfAll();

            header('location: ' . url('admin/categories/create'));
            exit;
            // helper::debug($errors);
            // echo 'nghẹo';
        } else {
            $data = [
                'name' => $_POST['name'],
               
            ];
            //    helper::debug($_FILES);
            if (!empty($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $from = $_FILES['image']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['image']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {

                    $data['image'] = $to;
                } else {

                    $_SESSION['errors']['image'] = 'không thành công ';
                    header('location: ' . url('admin/categories/create'));
                    exit;
                }

            }
            $this->category->insert($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'thao tác thành công';
            header('location: ' . url('admin/categories'));
            exit;
        }

    } 
    public function edit($id)
    {
        $category = $this->category->findByID($id);

        $this->renderViewAdmin('category.edit', [
            'category' => $category,
        ]);
    }
    public function update($id)
    {
        $category = $this->category->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
           
            'image'                => 'uploaded_file:0,2M,png,jpg,jpeg,webp',
           
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/{$category ['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'      => $_POST['name'],
                
            ];

            $flagUpload = false;
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

                $flagUpload = true;

                $from = $_FILES['image']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['image']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['image'] = $to;
                } else {
                    $_SESSION['errors']['image'] = 'Upload Không thành công';

                    header('Location: ' . url("admin/categories/{$category['id']}/edit"));
                    exit;
                }
            }

            $this->category->update($id, $data);

            if (
                $flagUpload
                && $category['image']
                && file_exists(PATH_ROOT . $category['image'])
            ) {
                unlink(PATH_ROOT . $category['image']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url("admin/categories/{$category['id']}/edit"));
            exit;
        }
    }




}

