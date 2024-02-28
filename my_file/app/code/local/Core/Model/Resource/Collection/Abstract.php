<?php
class Core_Model_Resource_Collection_Abstract
{
  protected $_resource=null;
  protected $_modelClass=null;
  protected $_select=[];
  
  protected $_data=[];

  protected $_isLoaded=false;

  public function setResource(Core_Model_Resource_Abstract $resource)
  {
    $this->_resource=$resource;
    return $this;
  }
  public function setModelClass($modelClass)
  {
    $this->_modelClass=$modelClass;
  }
  public function select()
  {
    $this->_select['from']=$this->_resource->getTableName();
    return $this;
  }
  public function getData()
  {
    if(!$this->_isLoaded)
    {
        $this->load();
    }
    return $this->_data;
  } 
  public function addFieldToFilter($column, $filter)
  {
    $this->_select['where'][$column][]= $filter;
    //print_r($this->_select);
    return $this;
  }
  public function load()
  {
    $sql="SELECT * FROM {$this->_select['from']}";

    if(isset($this->_select['where']) && count( $this->_select['where']))
    {
      
      $wherecond=$this->whereCondition();
      $sql.= " WHERE {$wherecond}";
      //echo $sql;
    }
    $result=$this->_resource->getAdapter()->fetchAll($sql);
    foreach($result as $row)
    {
        $this->_data[]=Mage::getModel($this->_modelClass)->setData($row);
    }
    $this->_isLoaded=true;
    return $this; 
   
  }
  public function whereCondition()
  {
    $wherecond=[];
      foreach($this->_select['where'] as $_field=>$_filters)
      {
        foreach($_filters as $_value)
        {
          if(!is_array($_value))
          {
            $_value=['eq'=>$_value];
          }
          foreach($_value as $_k=>$_v)
          {
            switch($_k)
            {
              case 'gt':
                      $wherecond[]=" `$_field` > '{$_v}' ";
                      break;
              case 'lt':
                      $wherecond[]=" `$_field` < '{$_v}' ";
                      break;
              case 'gte':
                      $wherecond[]=" `$_field` >= '{$_v}' ";
                      break; 
              case 'lte':
                      $wherecond[]=" `$_field` <= '{$_v}' ";
                      break; 
              case 'eq':  
                      $wherecond[]=" `$_field` = '{$_v}' ";
                      break;
              case 'neq':  
                      $wherecond[]=" `$_field` != '{$_v}' ";
                      break;
              case 'between':
                      $wherecond[] = "`$_field` BETWEEN '{$_v[0]}' AND '{$_v[1]}'";
                      break;                                              
              case 'in':
                      $v=[];
                      foreach($_v as $val)
                      {
                        $v[]="'".addslashes($val)."'";
                      }
                      $_v=implode(',', $v);
                      $wherecond[]= "`$_field` IN ({$_v})";
                      break;
              case 'notIn':
                      $v=[];
                      foreach($_v as $val)
                      {
                        $v[]="'".addslashes($val)."'";
                      }
                      $_v=implode(',', $v);
                      $wherecond[]= "`$_field`  NOT IN ({$_v})";
                      break;        
              case 'like':  
                      $wherecond[]=" `$_field` LIKE '{$_v}' ";
                      break;
              case 'notLike':
                      $wherecond[] = "`$_field` NOT LIKE '{$_v}'"; 
                      break;
              case 'isNull':
                      $wherecond[] = "`$_field` IS NULL";
                      break;
              case 'isNotNull':
                      $wherecond[] = "`$_field` IS NOT NULL";
                      break;
              default:
                      break;                                                  
                         
            }
            
          }
        }
      }
      $wherecond=implode(" AND ",$wherecond);
      return $wherecond;
  }
}
?>