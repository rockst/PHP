<?php

class a implements Iterator {
	
  var $keys = array("k1", "k2", "k3");
  var $vals = array("v1", "v2", "v3");
  var $pos = 0;
  
  function current() {
    return $this->vals[$this->pos];
  }
  
  function key() {
    return $this->keys[$this->pos];
  }
  
  function next() {
    $this->pos++;
  }
  
  function rewind() {
    $this->pos = 0;
  }
  
  function valid() {
    if($this->pos >= count($this->keys)) {
      return false;
    }
    else {
      return true;
    }
  }
  
}

$a = new a;
foreach($a as $k=>$v) echo "$k:::$v\n";