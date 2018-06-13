<?php
/**
 * Created by PhpStorm.
 * User: 程龙飞
 * Date: 2018/4/22
 * Time: 14:02
 */
namespace MongoDB\Driver;
class db_help{
    private $manager;
    function __construct(){
        $this->manager = new Manager("mongodb://localhost:27017");
    }
    function get_db_obj(){
        return $this->manager;
    }
    function is_admin($name,$pass){
        $query = new Query(['$and'=>[["name"=>$name],["pass"=>(int)$pass]]],[]);
        $cursor = $this->manager->executeQuery("book.admin", $query);

        foreach ($cursor as $document) {
            return $document->_id;
        }
    }
    

}



