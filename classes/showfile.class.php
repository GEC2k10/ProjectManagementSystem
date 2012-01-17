<?php
class ShowFile
{
  private $_handle,$_filename;
  
  public function __construct($filename)
  {
   $this->_filename=$filename;
   if(!file_exists($filename))
   {
     echo "<h1 align=center> Sorry the file not found ,or might have Issues !!!! </h1><br/>"; 
     exit; 
   } 
   $this->_handle=fopen($filename,"r");
      
  }
  public function show_file()
  {
    echo "<hr size=2>";
    highlight_file($this->_filename);
    echo "<hr size=2>";
  }
  public function __descruct()
  {
    fclose($this->_handle);
  }
};
?>

