<?php
require_once "model/products.php";
class ProductsController
{
    protected $products;

    public function __construct()
    {
        $this->products = new products();
    }
    
    public function listproducts()
    {
    echo "Đây là danh sách khách hàng";
    $products = $this->products->getproducts();
    include_once "View/Products/listproducts.php";
    }   

    public function addproducts()
    {
    echo "Đây là trang thêm khách hàng";
    include_once "View/Products/addproducts.php";
    if (isset($_POST['them']) && ($_POST['them'])) 
        {
            $id=$_POST["id"];
            $ten_sp=$_POST["ten_sp"];
            $mo_ta=$_POST["mo_ta"];
            $gia=$_POST["gia"];
            $this->products->addproducts($id, $ten_sp, $mo_ta, $gia);
        }
    }
    
    public function editproducts()
    {
    if (isset($_POST['id']) && ($_POST['id'])) {
        $id = $_GET['id'];
        $ten_sp = $_POST['ten_sp'];
        $mo_ta = $_POST['mo_ta'];
        $gia = $_POST['gia'];
        $this->products->updateproducts($id, $ten_sp, $mo_ta, $gia);
        header("Location: index.php");
    } else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $this->products->getproductsByID($id);
    }

    include_once "View/Products/editproducts.php";
    }
    
    public function deleteproducts()
    {
    include_once "View/Products/deleteproducts.php";
    }
}
