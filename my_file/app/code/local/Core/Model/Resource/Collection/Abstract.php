<?php
class Core_Model_Resource_Collection_Abstract
{
  protected $_resource = null;
  protected $_data = [];
  protected $_select = [];
  protected $_isLoaded = false;
  protected $_modelClass = null;
  public function setResource(Core_Model_Resource_Abstract $resource)
  {
    $this->_resource = $resource;
    return $this;
  }
  public function setModelClass($modelClass)
  {
    $this->_modelClass = $modelClass;
    return $this;
  }
  public function getData()
  {
    if (!$this->_isLoaded) {
      $this->load();
    }

    return $this->_data;
  }

  public function select()
  {
    $this->_select['from'] = $this->_resource->getTableName();
    return $this;
  }

  public function addFieldToFilter($column, $filter)
  {

    $this->_select['where'][$column][] = $filter;
    return $this;

  }
  public function getGroupByToFilter($column, $filter)
  {
    $this->_select['column'] = $column;
    $this->_select['groupby'] = $filter;
    return $this;

  }
  public function getOrderByToFilter($column, $filter = null)
  {

    $this->_select['orderby'] = $column . " " . $filter;
    return $this;

  }
  public function getLimitToFilter($filter)
  {

    $this->_select['limit'] = $filter;
    return $this;

  }
  public function load()
  {
    $this->_select['column'] = isset($this->_select['column']) ? $this->_select['column'] : "*";
    $sql = "SELECT {$this->_select['column']} FROM {$this->_select['from']} ";
    if (isset($this->_select['where']) && count($this->_select['where'])) {
      $whereCond = [];
      foreach ($this->_select['where'] as $_field => $_filters) {
        foreach ($_filters as $_value) {

          if (!is_array($_value)) {

            $_value = ['eq' => $_value];
          }
          foreach ($_value as $_k => $_v) {
            switch ($_k) {
              case 'gt':
                $whereCond[] = "`$_field` > '{$_v}' ";
                break;
              case 'in':
                $whereCond[] = "`$_field` IN ( '{$_v}') ";
                break;
              case 'eq':
                $whereCond[] = "`$_field` = '{$_v}' ";
                break;
              case 'like':
                $whereCond[] = "`$_field` LIKE '{$_v}' ";
                break;
              case 'between':
                $whereCond[] = "`$_field` BETWEEN {$_v} ";
                break;


            }
          }
        }
      }
      $whereCond = implode(" AND ", $whereCond);
      $sql .= "WHERE $whereCond";
    }
    if (isset($this->_select['groupby'])) {
      $sql .= "GROUP BY {$this->_select['groupby']} ";
    }
    if (isset($this->_select['orderby'])) {
      $sql .= "ORDER BY {$this->_select['orderby']}";
    }
    if (isset($this->_select['limit'])) {
      $sql .= "LIMIT {$this->_select['limit']} ";
    }


    $result = $this->_resource->getAdapter()->fetchAll($sql);

    foreach ($result as $row) {
      $this->_data[] = Mage::getModel($this->_modelClass)->setData($row);
    }


    $this->_isLoaded = true;
    return $this;
  }
  public function getFirstItem(){
    if (!$this->_isLoaded) {
        $this->load();
    }
    return $this->_data[0];
}

}
