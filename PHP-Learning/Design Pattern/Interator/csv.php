<?php
/*
 * 利用Iterator，就可以把許多複雜的循序操作，包裝成可以透過foreach來迭代的物件。例如需要剖析一個很大的csv檔，
 * 如果一次把檔案讀入記憶體，會使用掉很大的資源，比較好的處理方式是用streaming的方式讀取，逐步處理讀取的內容。
 * 這個動作如果包裝成Iterator，就可以透過foreach來築行處理csv。例如
 */
class a implements Iterator {
	
	private $count = 0;
	private $fd;
	private $buffer='';
	
	function __construct($file) {
		$this->fd = fopen($file, 'r+');
	}
	
	function __destruct() {
		fclose($this->fd);
	}
	
	function current() {
		return explode(',', $this->buffer);
	}
	
	function key() {
		return $this->count;
	}
	
	function next() {
		$this->count++;
		$this->buffer = fgets($this->fd);
	}
	
	function rewind() {
		$this->count = 0;
		fseek($this->fd, 0);
		$this->buffer = fgets($this->fd);
	}
	
	function valid() {
		if($this->buffer) {
			return true;
		}
		else {
			return false;
		}
	}
	
}

$a = new a('csv');
foreach($a as $line) echo implode(' : ', $line);
echo "\n";