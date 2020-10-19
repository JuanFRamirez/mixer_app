<?php

function addDrink(){
    return ("INSERT INTO drinks (NAME,BASE,INGREDIENTS,PREPARATION,GLASS,SERVE,TAG)VALUES(:name,:base,:ingredients,:preparation,:glass,:serve,:tag)");
}

function deleteDrink(){
    return("DELETE FROM drinks WHERE ID = :id");
}

function updateDrink(){
    return ("UPDATE drinks SET NAME=:name,BASE=:base,INGREDIENTS=:ingredients,PREPARATION=:preparation,GLASS=:glass,SERVE=:serve,TAG=:tag WHERE ID=:id");
}

?>