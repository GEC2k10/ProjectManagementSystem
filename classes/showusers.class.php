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
    $this->_query=sprintf("SELECT DISTINCT Contribution,Date FROM Contributions WHERE username=%s",$this->_memberName);
    $this->_reply = mysql_query($this->_query,$this->_con);
    
   while($this->_rows = mysql_fetch_array($this->_reply))
    {
	$this->_files[] = substr($this->_rows['Contribution'],15);  /* File name field of user table */  
	$this->_dates[] = $this->_rows['Date'];       /* Date field */
     }  
    $this->_temp ="<a href='../views/showfile.php?filename=%s'><font color='white'>%s</font></a>";
  }  
 public function show_files()
  {
    $i=0;
    echo "<table border=\"1\">";
    echo "<tr><th>File </th><th>Date of Contribution</th></tr>";
    while(list($index,$file) = each($this->_files))
    {
        echo"<tr>";
	$this->_link=sprintf($this->_temp,$file,$file);
	echo "<td>".$this->_link."</td><td>".$this->_dates[$i]."</td>";
        echo "</tr>";
    }
   echo "</table>";
  }	
public function __destruct()
{
    mysql_close($this->_con);
}
};
?>
