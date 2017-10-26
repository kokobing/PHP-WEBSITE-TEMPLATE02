<?php
//页脚
$strSQL = "select icp from siteset  where id_siteset='1'" ;
$objDB->Execute($strSQL);
$adv_fotter=$objDB->fields();

$strSQL = "select content from layout  where id_layout='1'" ;
$objDB->Execute($strSQL);
$footer_BQ=$objDB->fields();

$strSQL = "select content from layout  where id_layout='2'" ;
$objDB->Execute($strSQL);
$footer_LJ=$objDB->fields();
?>
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" align="center" background="/inc/pics/bg002.gif">
    <DIV id=bottommenu><?php echo $footer_LJ[content];?></DIV></td>
  </tr>
</table>
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0" class="txt">
  <tr>
    <td height="50" align="center"><?php echo $footer_BQ[content];?></br>
    <a href="http://www.miibeian.gov.cn/" class="txt"><?php echo $adv_fotter[icp];?></a></td>
  </tr>
</table>