<?php

class ShowUsers
{
  private $_con ,$_reply,$_rows;
  private $_memberName,$_query,$_files,$_link,$_temp,$_dates;
  public function __construct($member)
  {
    $this->_memberName = $member;
    $this->_con = mysql_connect("localhost","root","password");
    mysql_select_db("GitRepo",$this->_con);
    $this->_query = sprintf("select * from %s ",$this->_memberName);  /* The table with  members name */
    $this->_reply = mysql_query($this->_query,$this->_con);
    
   while($this->_rows = mysql_fetch_array($this->_reply))
    {
     $this->_files[] = $this->_rows['filename'] ;  /* File name field of user table */  
     $this->_dates[] = $this->_rows['date'];       /* Date field */
     }  
    $this->_temp ="<a href='../views/showfile.php?filename=%s'><font color='yellow'>%s</font></a>";
  }  
 public function show_files()
  {
    $i=0;
    while(list($index,$file) = each($this->_files))
    {
      $this->_link=sprintf($this->_temp,$file,$file);
      echo $this->_link."      ".$this->_dates[$i]."<br/>";
    }
  }
  public function show_contributions()
 {
    $this->_con = mysql_connect("localhost","root","password");
    mysql_select_db("GitRepo",$this->_con);
    $this->_query=sprintf("SELECT * FROM Contributions WHERE username=%s",$this->_memberName;
    $this->_reply=mysql_query($this->_query,$this->_con);
 }
	
  public function __destruct()
  {
    mysql_close($this->_con);
  }
};
?>
