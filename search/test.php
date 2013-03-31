<?php
if(isset($_POST['checkcondition'])){	
  $cond = $_POST['checkcondition'];
  if(empty($cond))
  {
  }
  else
  {
    $N = count($cond);
 
    for($i=0; $i < $N; $i++)
    {
      echo 	'$("form #check'.$cond[$i].'").attr(\'checked\', true);';
    }
  }
  }
	
if(isset($_POST['checkssr'])){	
  $ssr = $_POST['checkssr'];
  if(empty($ssr))
  {
  }
  else
  {
    $N = count($ssr);
 
    for($i=0; $i < $N; $i++)
    {
      echo 	'$("form #check'.$ssr[$i].'").attr(\'checked\', true);';
    }
  }
  }
  

?>
