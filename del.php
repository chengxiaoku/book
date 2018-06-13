<?php
/**
 * Created by PhpStorm.
 * User: 程龙飞
 * Date: 2018/4/22
 * Time: 15:28
 */
$id = $_GET['id'] ?? "";
if(!empty($id)){

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['_id' =>"ObjectId('5adc2f591879bb9421dc6e60')"], ['limit' => 1]);   // limit 为 1 时，删除第一条匹配数据
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result = $manager->executeBulkWrite('book.list', $bulk, $writeConcern);
    header("location:./index.php");
}