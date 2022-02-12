<?php

class DBconfig
{
    private $dbHost;
    private $dbUser;
    private $dbPassword;
    private $dbName;

    protected function connect()
    {
        $this->dbHost = "localhost";
        $this->dbUser = "root";
        $this->dbPassword = "";
        $this->dbName = "eShop";
        $con = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        return $con;
    }

}

class Query extends DBconfig
{
    //dynamic get data
    public function getData($table, $field = '', $conditionArr = '', $like = '', $order_by_field = '', $order_by_type = '', $limit = '')
    {
        $sql = "select $field from $table";
        if ($conditionArr != '') {
            $sql .= " where ";
            $count = count($conditionArr);
            $i = 1;
            foreach ($conditionArr as $key => $val) {
                if ($i == $count) {
                    $sql .= "$key='$val' ";
                } else {
                    $sql .= "$key='$val' and ";
                }
                $i++;
            }

        }
        if ($order_by_field != '') {
            $sql .= " order by $order_by_field $order_by_type ";
        }
        if ($limit != '') {
            $sql .= " limit $limit ";
        }

        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else return 0;
    }

    //get data by id
    public function getDatabyId($table,$field='',$id){
        $sql="select $field from $table where id=$id";
        $result=$this->connect()->query($sql);
        if($result->num_rows>0){
          $row= $result->fetch_assoc();
        }
        return $row;
    }
    //get data by id
    public function getAllDatabyField($table,$field,$fieldvalue){
        $sql="select * from $table where $field=$fieldvalue";
        $result=$this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else return 0;
    }
    //select $field from $table where $condition like $like order by $order_by_field $order_by_type limit $limit
    public function insertData($table, $conditionArr = '')
    {

        if ($conditionArr != '') {
            foreach ($conditionArr as $key => $val) {
                $fieldArr[] = $key;
                $valueArr[] = $val;
            }
            $field = implode(",", $fieldArr);
            $value = implode("','", $valueArr);
            $value = "'" . $value . "'";

            $sql = "insert into $table($field) values($value)";
        }
        $result = $this->connect()->query($sql);
        return 1;
    }
    public function deleteData($table,$condtionArr){
        if ($condtionArr!=''){
            $sql="delete from $table";
            $sql.=" where ";
            $count=count($condtionArr);
            $i=1;
            foreach ($condtionArr as $key=>$val){
                if($i==$count){
                    $sql.=$key."="."'$val' ";

                }else{
                    $sql.=$key."="."'$val' and ";
                }
                $i++;
            }
            if ($this->connect()->query($sql)){
                return 1;
            }


        }
    }

    public function updateData($table,$condtionArr,$where_field,$where_value){
        if ($condtionArr!=''){
            $sql="update $table set ";
            $count=count($condtionArr);
            $i=1;
            foreach ($condtionArr as $key=>$val){
                if($i==$count){
                    $sql.=$key."="."'$val' ";

                }else{
                    $sql.=$key."="."'$val', ";
                }
                $i++;
            }
            $sql.=" where $where_field ='$where_value'";
            var_dump($sql);
            if($this->connect()->query($sql)){
                return 1;
            }

        }
    }

    //dynamic get data
    //select * from product inner join product_details on product.id=product_details.product_id
    public function getInnerData($first_table,$second_table,$field = '', $primary_key,$foreign_key,$conditionArr,$like = '', $order_by_field = '', $order_by_type = '', $limit = '')
    {
        $sql = "select $field from $first_table left join $second_table on $first_table.$primary_key=$second_table.$foreign_key";
        if ($conditionArr != '') {
            $sql .= " where ";
            $count = count($conditionArr);
            $i = 1;
            foreach ($conditionArr as $key => $val) {
                if ($i == $count) {
                    $sql .= "$key='$val' ";
                } else {
                    $sql .= "$key='$val' and ";
                }
                $i++;
            }

        }
        if ($order_by_field != '') {
            $sql .= " order by $order_by_field $order_by_type ";
        }
        if ($limit != '') {
            $sql .= " limit $limit ";
        }

        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else return 0;
    }

    //dynamic get data
    //select * from product inner join product_details on product.id=product_details.product_id
    public function getInnerDatabyId($first_table,$second_table, $primary_key_field,$foreign_key_field,$id)
    {
        $sql = "select * from $first_table inner join $second_table on $first_table.$primary_key_field=$second_table.$foreign_key_field where $first_table.id=$id";


        $result=$this->connect()->query($sql);
        if($result->num_rows>0){
            $row= $result->fetch_assoc();
            return $row;
        }

    }
    public function getLeftjoinDatabyId($first_table,$second_table, $primary_key_field,$foreign_key_field,$id)
    {
        $sql = "select * from $first_table left join $second_table on $first_table.$primary_key_field=$second_table.$foreign_key_field where $first_table.id=$id";


        $result=$this->connect()->query($sql);
        if($result->num_rows>0){
            $row= $result->fetch_assoc();
            return $row;
        }

    }
    public function getRightjoinDatabyId($first_table,$second_table, $primary_key_field,$foreign_key_field,$id)
    {
        $sql = "select * from $first_table right join $second_table on $first_table.$primary_key_field=$second_table.$foreign_key_field where $first_table.id=$id";


        $result=$this->connect()->query($sql);
        if($result->num_rows>0){
            $row= $result->fetch_assoc();
            return $row;
        }

    }
    //get data by unique key
    public function getDatabyUniqueId($table,$field='',$Unique_id_field,$Unique_id){
        $sql="select $field from $table where $Unique_id_field=$Unique_id";
        var_dump($sql);
        $result=$this->connect()->query($sql);
        if($result->num_rows>0){
            $row= $result->fetch_assoc();
            return $row;
        }
        else{
            return 0;
        }



    }

    //get data by unique key
    public function getUserbyEmail($email){
        $sql="select * from user where email='$email'";
        $result=$this->connect()->query($sql);
        if($result->num_rows>0){
            $row= $result->fetch_assoc();
            return $row;
        }
        else{
            return 0;
        }



    }

}