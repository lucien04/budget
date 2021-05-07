<?php

function user_infos($pdo,$user_id)
{
    $sql = "SELECT
    users.`user_id`,
    `first_name`,
    `last_name`,
    `birth_date`,
    `inc_amount`,
    `exp_amount`
FROM
    `users`
LEFT JOIN `incomes` ON `users`.`user_id` = `incomes`.`user_id`
LEFT JOIN `expenses` ON `users`.`user_id`=`expenses`.`user_id` 
WHERE `users`.`user_id`= ?";

$req = $pdo->prepare($sql);

$req->execute(array($user_id));

$user_infos = $req->fetchAll(PDO::FETCH_ASSOC);

return $user_infos;
}


function adduser($pdo, $first_name, $last_name,$bday) {
    $sql = "INSERT INTO `users`(`first_name`, `last_name` , `birth_date`) VALUES (:first_name , :last_name , :birth_date)";

    $req = $pdo->prepare($sql);
    // lier la variable sql avec une valeur php
    $req->bindValue(':first_name' ,$first_name, PDO::PARAM_STR);
    $req->bindValue(':last_name' ,$last_name, PDO::PARAM_STR);
    $req->bindValue(':birth_date' ,$bday, PDO::PARAM_STR);

    try {
        // exécuter la requête
        $req->execute();
        // renvoie le nombre d'enregistrement créé.
        return $req->rowCount();
    }catch(PDOException $e){
        var_dump($e->getMessage());
        return false;
    }
}
//infos des utilisateurs

function users_list($pdo) {
    $sql = "SELECT `user_id`, `first_name`, `last_name`, `birth_date` FROM `users`";

    $req = $pdo->query($sql);
    try {
        // renvoie le nombre d'enregistrement créé.
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        return false;
    }
}




function updateuser($pdo, $inc_amount, $exp_amount, $inc_cat_id, $user_id){
    $sql = "UPDATE `users` SET `inc_amount` = :inc_amount, , `exp_idamount` = :exp_idamount WHERE `user_id` = :user_id";

    $req = $pdo->prepare($sql);
    // lier la variable sql avec une valeur php
    $req->bindValue(':inc_amount', $inc_amount, PDO::PARAM_INT);
    $req->bindValue(':exp_amount', $exp_amount, PDO::PARAM_INT);
    $req->bindValue(':inc_cat_id', $inc_cat_id, PDO::PARAM_INT);
    $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);

    try {
        // exécuter la requête
        $req->execute();
        // renvoie le nombre d'enregistrement créé.
        return $req->rowCount();
    }catch(PDOException $e){
        return false;
    }
}
function updateIncomes($pdo, $inc_amount, $inc_receipt_date,$inc_cat_id, $user_id){
    $sql = "UPDATE `incomes` SET `inc_amount` = :inc_amount,  `inc_receipt_date` = :inc_receipt_date , `inc_cat_id` = :inc_cat_id  WHERE `user_id` = :user_id";

    $req = $pdo->prepare($sql);
    // lier la variable sql avec une valeur php
    $req->bindValue(':inc_amount', $inc_amount, PDO::PARAM_STR);
    $req->bindValue(':inc_receipt_date',$inc_receipt_date, PDO::PARAM_STR);
    $req->bindValue(':inc_cat_id', $inc_cat_id, PDO::PARAM_INT);
    $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);

    try {
        // exécuter la requête
        $req->execute();
        // renvoie le nombre d'enregistrement créé.
        return $req->rowCount();
    }catch(PDOException $e){
        var_dump($e->getMessage());
        return false;
    }
}
function updateExpenses($pdo, $exp_amount, $exp_date,$exp_id,$exp_label, $user_id){
    $sql = "UPDATE `expenses` SET `exp_amount` = :exp_amount,  `exp_date` = :exp_date , `exp_id` = :exp_id , `exp_label` = :exp_label WHERE `user_id` = :user_id";

    $req = $pdo->prepare($sql);
    // lier la variable sql avec une valeur php
    $req->bindValue(':exp_amount', $exp_amount, PDO::PARAM_STR);
    $req->bindValue(':exp_label', $exp_label, PDO::PARAM_STR);
    $req->bindValue(':exp_date',$exp_date, PDO::PARAM_STR);
    $req->bindValue(':exp_id', $exp_id, PDO::PARAM_INT);
    $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);

    try {
        // exécuter la requête
        $req->execute();
        // renvoie le nombre d'enregistrement créé.
        return $req->rowCount();
    }catch(PDOException $e){
        var_dump($e->getMessage());
        return false;
    }
}


function incomes_categories_list($pdo) {
    $sql = "SELECT `inc_cat_id`, `inc_cat_name` 
    FROM `incomes_categories` ";

    $req = $pdo->query($sql);
    try {
        // renvoie le nombre d'enregistrement créé.
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        return false;
    }
}
function expenses_list($pdo) {
    $sql = "SELECT `exp_id`, `exp_date`, `exp_amount`, `exp_label`,
    FROM `expenses` ";

    $req = $pdo->prepare($sql);
    try {
        // renvoie le nombre d'enregistrement créé.
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        return false;
    }
}
// suppression d'un utilisateur

function delete_user($pdo, $user_id){
    $sql = "DELETE FROM `users` WHERE `user_id` = :user_id";

    $req = $pdo->prepare($sql);

    $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);

    try {
        // exécuter la requête
        $req->execute();
        // renvoie le nombre d'enregistrement créé.
        return $req->rowCount();
        
    }catch(PDOException $e){
        return false;
    }
}