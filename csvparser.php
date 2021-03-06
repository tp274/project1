<?php

abstract class Parser{

abstract public function parse($filename);

} 

class CsvParser extends Parser{

	//Parse the input file and returns array 
	public function parse($filename){
	     $lines = file($filename);
	     $lines = array_map('trim',$lines);
	     $lines = array_filter($lines);
	     $data = array_map('str_getcsv', $lines);
	     return $data;
	}

}
