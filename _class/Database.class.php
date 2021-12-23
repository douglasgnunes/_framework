<?php
    class Database{
        private $Host = "localhost";
        private $User = "root";
        private $Pass = "";
        private $Dbsa = "frameworkphp";

        private $Conn = false;
        private $MyConn = "";
        private $Result = array();
        private $MyQuery = "";
        private $NumResult = "";

        public function Connect(){
            if(!$this->Conn){
                $this->MyConn = new mysqli($this->Host,$this->User,$this->Pass,$this->Dbsa);
                if($this->MyConn->connect_errno > '0'){
                    array_push($this->Result, $this->MyConn->connect_error);
                    return false;
                }else{
                    $this->Conn = true;
                    return true;
                }
            }else{
                return true;
            }
        }

        public function Disconnect(){
            if($this->Conn){
                if($this->MyConn->close()){
                    $this->Conn = false;
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function Create($Table, $Params = array()){
            $Campos = implode(',',array_keys($Params));
            $Valores = "'".implode("','",array_values($Params))."'";
            $SQL = "INSERT INTO {$Table}({$Campos}) VALUES ({$Valores});";
            $this->MyQuery = $SQL;
            if($this->MyConn->query($SQL)){
                array_push($this->Result, $this->MyConn->insert_id);
                return true;
            }else{
                array_push($this->Result, $this->MyConn->error);
                return false;
            }
        }

        public function GetResult(){
            $Val = $this->Result;
            $this->Result = array();
            return $Val;
        }

        public function GetSql(){
            $Val = $this->MyQuery;
            $this->MyQuery = array();
            return $Val;
        }

        public function NumRows(){
            $Val = $this->NumResult;
            $this->NumResult = array();
            return $Val;
        }

        public function EscapeString($Data){
            return $this->MyConn->real_escape_string($Data);
        }


    }