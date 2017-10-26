<?php 
$strSQL = "select content from layout  where id_layout='3'" ;
$objDB->Execute($strSQL);
$Quanju_Daohang=$objDB->fields();

$strSQL = "select content from layout  where id_layout='6'" ;
$objDB->Execute($strSQL);
$Quanju_LXWM=$objDB->fields();
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><img src="/inc/pics/icon001.jpg" width="226" height="45" /></td>
      </tr>
      <tr>
        <td height="140" align="center" background="/inc/pics/icon004.gif"><?php echo $Quanju_Daohang[content];?></td>
      </tr>
      <tr>
        <td align="center"><img src="/inc/pics/icon005.jpg" width="226" height="45" /></td>
      </tr>
      <tr>
        <td height="208" align="center" background="/inc/pics/icon006.gif"><?php echo $Quanju_LXWM[content];?></td>
      </tr>
      <tr>
        <td height="70">&nbsp;</td>
      </tr>
    </table>
