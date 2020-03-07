<?php
namespace model;
use DateTime;
class Data{
    public function __construct(){
        $this->db = new MySqlDB();
        $this->db->connect();
    }

    public function getOperationsForUser($userId){
        $operations = array();
        $sql = "select id, title, description, amount, date 
                from operations
                where id_user = '".$userId."'";
        if ($operationsRes = $this->db->getArrFromQuery($sql)){
            foreach ($operationsRes as $operationsRow) {
                $Operation = new Operation();
                $Operation->setId($operationsRow['id']);
                $Operation->setTitle($operationsRow['title']);
                $Operation->setDescription($operationsRow['description']);
                $Operation->setAmount($operationsRow['amount']);
                $Operation->setDate($operationsRow['date']);
                $operations[] = $Operation;
            }
        }
        return $operations;
    }

    public function getOperationById($id){
        $operations = array();
        $sql = "select id, title, description, amount, date, id_user
                from operations
                where id = '".$id."'";
        if ($operationRes = $this->db->getArrFromQuery($sql)){
            foreach ($operationRes as $operationRow) {
                $dateTime = new DateTime($operationRow['date']);

                $operation = new Operation();
                $operation->setId($id);
                $operation->setTitle($operationRow['title']);
                $operation->setDescription($operationRow['description']);
                $operation->setAmount($operationRow['amount']);
                $operation->setDate($dateTime);
                $operation->setUserId($operationRow['id_user']);

            }
        }
        return $operation;
    }

    public function insertOperation(Operation $operation){
        //die($operation->getUserId());
        $sql = "insert into operations(title, description, amount, date, id_user)
                values ('".$operation->getTitle()."','".$operation->getDescription()."','".$operation->getAmount()."','".$operation->getDate()->format('Y-m-d H:i:s')."','".$operation->getUserId()."')";
        //die($sql);
        $this->db->runQuery($sql);
    }

    public function updateOperation(Operation $operation){
        $dateTime = $operation->getDate()->format('Y-m-d H:i:s');
        $sql = "update operations set
                title = '".$operation->getTitle()."',
                description = '".$operation->getDescription()."',
                amount = '".$operation->getAmount()."',
                date = '".$dateTime."'
                where
                id =".$operation->getId();
        //die($sql);
        $this->db->runQuery($sql);
    }

    public function deleteOperation($id){
        $sql = "delete from operations where id = ".$id;
        $this->db->runQuery($sql);
    }

    public function getUser($logindData){
        $sql = "select id, name, email, passwd
            from users
            where name = '".$logindData."' or email = '".$logindData."'";
        if ($userRes = $this->db->getArrFromQuery($sql)){
            foreach ($userRes as $userRow){
                $User = new User();
                $User->setId($userRow['id']);
                $User->setName($userRow['name']);
                $User->setEmail($userRow['email']);
                $User->setPasswd($userRow['passwd']);
            }
        }
        return $User;
    }

    public function insertUser($user){
        $sql = "insert into users(name, email, passwd)
                values('".$user->getName()."','".$user->getEmail()."', '".$user->getPasswd()."')";
        $this->db->runQuery($sql);
    }

}