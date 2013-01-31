<?php

class db
{
  private $_user = 'root';

  private $_password = '';

  private $_connection;

  public function __construct()
  {
    $this->_connection = mysql_connect('localhost',$this->_user, $this->_password);
    if (!$this->_connection) {
      throw new Exception('Could not connect to db. Error : '. mysql_error());
    }
  }

  public function getConnection()
  {
    return $this->_connection;
  }

  public function escape($strVal)
  {

    return mysql_real_escape_string($strVal,$this->_connection);

  }


  public function executeSelect($strQuery)
  {
    $result = mysql_query($strQuery,$this->_connection);
    if ($result === false) {
      throw new Exception("Query failed. query : $strQuery\nError : ".mysql_error($this->_connection));
    }

    $arrReturn = $this->toArray($result);
    return $arrReturn;

  }

  public function executeInsert($strQuery)
  {

    $result = mysql_query($strQuery,$this->_connection);
    if ($result === false) {
      throw new Exception("Query failed. query : $strQuery\nError : ".mysql_error($this->_connection));
    }

    $result = mysql_query('SELECT LAST_INSERT_ID() lastInsertID', $this->_connection);
    if ($result === false) {
      throw new Exception("Query failed why trying to fetch last insert id for query : $strQuery\nError : ".mysql_error($this->_connection));
    }
    
    $arrReturn = $this->toArray($result);
    return $arrReturn[0]['lastInsertID'];
  }

  private function toArray($result)
  {
    $arrReturn = array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      $arrReturn[] = $row;
    }
    return $arrReturn;
  }
  
  public function executeUnbufferedSelect($strQuery)
  {
    $result = mysql_query($strQuery,$this->_connection);
    if ($result === false) {
      throw new Exception("Query failed. query : $strQuery\nError : ".mysql_error($this->_connection));
    }

    $return = UnbufferedAssociativeResultSet::factory($result);
    return $return;

  }


}