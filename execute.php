<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
header("Content-type:application/json");


require_once 'connection.php';
require_once 'querys.php';

class executeConnection extends DBconnection
{
    public function __construct()
    {
    }
    /**
     * @param string $name
     * @param string $tag
     * @return string
     */
    public function searchDrinkByParams($name, $tag)
    {
        try {
            $connection = $this->connect()->prepare("SELECT *  FROM drinks WHERE NAME=? OR TAGS=? ORDER BY NAME");
            $connection->execute([$name, $tag]);

            if ($connection->rowCount() === 0) {
                print_r([]);
            } else {
                $drink = $connection->fetchAll(PDO::FETCH_ASSOC);
                header("content-type:application/json");
                print_r(json_encode($drink));
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param integer $limit
     * @return string
     */
    public function searchDrinks($limit)
    {
        try {
            $connection = $this->connect()->prepare("SELECT *  FROM drinks ORDER BY NAME LIMIT $limit");
            $connection->execute();

            if ($connection->rowCount() === 0) {
                print_r([]);
            } else {
                $drinks = $connection->fetchAll(PDO::FETCH_ASSOC);
                header("content-type:application/json");
                print_r(json_encode($drinks));
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$getData =  new executeConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_SERVER['QUERY_STRING'])) {
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $drink = in_array('drink', $queries) ? $queries['drink'] : '';
        $tag = in_array('tag', $queries) ? $queries['tag'] : '';
        $limit = in_array('limit', $queries) ? $queries['limit'] : 30;
        if (isset($drink) || isset($tag)) {
            $getData->searchDrinkByParams($queries['drink'], $queries['tag']);
        } else if (!isset($drink) && !isset($tag)) {
            echo 'this';
            $getData->searchDrinks($limit);
        }
    }
}
