<?php
require_once 'connection.php';
require_once 'querys.php';

$_POST = json_decode(file_get_contents('php://input'), true);
$id = isset($_POST['id']) ? (int)filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT):0;
$name =  isset($_POST['drink']) ? filter_var($_POST['drink'],FILTER_SANITIZE_STRING) : 'Sin Nombre';
$base =  isset($_POST['base']) ? filter_var($_POST['base'],FILTER_SANITIZE_STRING) : '';
$ingredients =  isset($_POST['ingredients']) ? filter_var($_POST['ingredients'],FILTER_SANITIZE_STRING) : '';
$prep =  isset($_POST['preparation']) ? filter_var($_POST['preparation'],FILTER_SANITIZE_STRING) : '';
$glass =  isset($_POST['glass']) ? filter_var($_POST['glass'],FILTER_SANITIZE_STRING) : '';
$serve =  isset($_POST['serve']) ? filter_var($_POST['serve'],FILTER_SANITIZE_STRING) : '';
$tag =  isset($_POST['tag']) ? filter_var($_POST['tag'],FILTER_SANITIZE_STRING) : '';
$opc =  isset($_POST['opc']) ? filter_var($_POST['opc'],FILTER_SANITIZE_STRING) : '';


class executeConnection extends DBconnection{
    public function searchDrink($name,$tag){
        try{
            $stm = $this->connect()->prepare("SELECT *  FROM drinks WHERE NAME=? OR TAG=?");
            $stm->execute([$name,$tag]);

            if($stm->rowCount()===0){
                echo "
                <div class='no-luck'>
                    Could not find anything, try again with other terms.
                </div>
                ";
                return;
            }

            echo "<div class='results'>
            <span class='delete-result'></span><br>";

            while($drink = $stm->fetch()){
                echo "<div class='result-drink' data-id={$drink['ID']}>
                <strong>Drink:</strong> <span class='result-text' data-name={$drink["NAME"]}>{$drink['NAME']}</span><br>
                <strong>Base:</strong> <span class='result-text' data-base={$drink["BASE"]}>{$drink['BASE']}</span><br>
                <strong>Ingredients:</strong> <span class='result-text' data-ingredients={$drink["INGREDIENTS"]}>{$drink['INGREDIENTS']}</span><br>
                <strong>Preparation:</strong> <span class='result-text' data-preparation={$drink["PREPARATION"]}>{$drink['PREPARATION']}</span><br>
                <strong>Glass:</strong> <span class='result-text' data-glass={$drink["GLASS"]}>{$drink['GLASS']}</span><br>
                <strong>Serving:</strong> <span class='result-text' data-serve={$drink["SERVE"]}>{$drink['SERVE']}</span><br>
                <strong>Tag:</strong> <span class='result-text' data-tag={$drink["TAG"]}>{$drink['TAG']}</span><br>
                        <button class='modify-button' onClick='modifyDrink(event)' data-id='{$drink["ID"]}'>Modify <span><i class='fas fa-flask'></i></span></button> <button onClick ='deleteFunction(event)' class='delete-button'data-id='{$drink["ID"]}'>Delete <span><i class='fas fa-times'></i></span></button>
                        <hr>
                ";
            }

            echo "</div>";
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function addDrink($name,$base,$ingredients,$prep,$glass,$serve,$tag){
        $stm = $this->connect()->prepare(addDrink());
        $stm->bindParam(':name',$name,PDO::PARAM_STR);
        $stm->bindParam(':base',$base,PDO::PARAM_STR);
        $stm->bindParam(':ingredients',$ingredients,PDO::PARAM_STR);
        $stm->bindParam(':preparation',$prep,PDO::PARAM_STR);
        $stm->bindParam(':glass',$glass,PDO::PARAM_STR);
        $stm->bindParam(':serve',$serve,PDO::PARAM_STR);
        $stm->bindParam(':tag',$tag,PDO::PARAM_STR);
        $stm->execute();


    }

    public function deleteDrink($id){
        $stm=$this->connect()->prepare(deleteDrink());
        $stm->bindParam(':id',$id,PDO::PARAM_INT);
        $stm->execute();
    }

    public function updateDrink($name,$base,$ingredients,$prep,$glass,$serve,$tag,$id){
        $stm=$this->connect()->prepare(updateDrink());
        $stm->bindParam(':name',$name,PDO::PARAM_STR);
        $stm->bindParam(':base',$base,PDO::PARAM_STR);
        $stm->bindParam(':ingredients',$ingredients,PDO::PARAM_STR);
        $stm->bindParam(':preparation',$prep,PDO::PARAM_STR);
        $stm->bindParam(':glass',$glass,PDO::PARAM_STR);
        $stm->bindParam(':serve',$serve,PDO::PARAM_STR);
        $stm->bindParam(':tag',$tag,PDO::PARAM_STR);
        $stm->bindParam(':id',$id,PDO::PARAM_INT);
        $stm->execute();
    }
}

$start =  new executeConnection();

if($opc === 'get_drink'){
$start->searchDrink($name,$tag);
}

if($opc ==='add_this_drink'){
    $start->addDrink($name,$base,$ingredients,$prep,$glass,$serve,$tag);
    echo "<div><h2>Drink Added</h2>
    <img src='./img/drinks/raw/toast.jpeg' style='margin-top:5rem;margin-bottom:5rem;width:100%;height:100%;object-fit:cover'></img>
    </div>";
}

if($opc === 'delete_drink' && $id > 0){
    $start->deleteDrink($id);
    echo "<h2 class='delete-success'>Drink Deleted Sucessfully</h2>";
}

if($opc === 'modify_this_drink' && $id > 0){
    $start->updateDrink($name,$base,$ingredients,$prep,$glass,$serve,$tag,$id);
    echo "<h2 class='update-sucess'>Drink Updated Sucessfully</h2>";
}


?>