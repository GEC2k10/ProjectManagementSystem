<?php
class ShowFile
{
  private $_handle;
  
  public function __construct($filename)
  {
   if(!file_exists($filename))
   {
     echo "<h1 align=center> Sorry the file not found ,or might have Issues !!!! </h1><br/>"; 
     exit; 
   } 
   $this->_handle=fopen($filename,"r");
      
  }
  public function show_file()
  {
    while(!feof($this->_handle))
    {
      echo fgets($this->_handle)."<br/>";
    }
  }
  public function __descruct()
  {
    fclose($this->_handle);
  }
};
?>

