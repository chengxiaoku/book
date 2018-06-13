
<?php
/**
 * Created by PhpStorm.
 * User: 程龙飞
 * Date: 2018/4/22
 * Time: 13:52
 */
include_once "./head.php";
include_once "./db.php";
$db = new \MongoDB\Driver\db_help();
$page_num = 2;
//$query = new \MongoDB\Driver\Query([],["limit"=>$page_num]);
$query = new \MongoDB\Driver\Query([]);
$cursor = $db->get_db_obj()->executeQuery("book.list", $query);

echo "<table><tr><td>书名</td><td>个数</td></tr>";
$page = $_GET['page'] ?? "";
if(empty($page)){
    $page = 1;
}
$data_num = $page*$page_num;
$i = 0;

foreach ($cursor as $document) {
    if(($data_num - $page_num)<=$i && $i<$data_num){
        echo "<tr>";
        echo "<td>".$document->name."</td>";
        echo "<td>".$document->num."</td>";
        echo "<td><a href='./del.php?id={$document->_id}'>删除</a></td>";
        echo "</tr>";
    }
    $i++;
}
echo "</table>";
echo "<div>";
for($j = 1;$j<=ceil($i/$page_num);$j++){
    echo "<a href='index.php?page=$j'>$j</a>";
}
echo "</div>";
?>
</body>
</html>