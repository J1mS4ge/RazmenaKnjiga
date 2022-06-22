<?php
include_once("model/Model.php");
class Controller {
    public $model;
    public function __construct(){
        $this->model= new Model();
    }
    public function invoke(){
        if(isset($_GET['book'])){
            $book=$this->model->getBook($_GET['book']);
            include 'view/Viewbook.php';
            
        }
        else if(isset($_GET['naziv'])&&isset($_GET['autor']) && isset($_GET['opis']))
        {
            $this->model->insertBook($_GET['naziv'], $_GET['autor'], $_GET['opis']);
            $books = $this->model->getBookList();
            include 'view/Booklist.php';
        }
        else if(isset($_GET['delete_book'])) {
            $this->model->deleteBook($_GET['delete_book']);
            $books = $this->model->getBookList();
            include 'view/Booklist.php';
            //echo "<script>alert('brisanje: " . $_GET['delete_book'] ."')</script>";
        }
        else if(isset($_GET['naziv'])&&isset($_GET['autor']) && isset($_GET['opis']))
        {
            $this->model->updateBook($_GET['naziv'], $_GET['autor'], $_GET['opis']);
            $books = $this->model->getBookList();
            include 'view/Booklist.php';
        }
        else{
            $books = $this->model->getBookList();
            include 'view/Booklist.php';
        }
    }


    //  function deleteBook($parameters) {
    //     $id = $parameters["fID"];

    //     if ($this->model->deleteItem( $id )) {
    //         $this->model->hasDeleteFailed = false;
    //         $this->model->setDeleteItemConfirmation();
    //         return (true);
    //     }
    //     else
    //         $this->model->deleteItemError ( DELETE_ITEM_ERROR_STR );
    // }
}
?>