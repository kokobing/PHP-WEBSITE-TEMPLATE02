<?php
require "../inc/config.php";
require "../inc/function.class.php";

//page_content
$strSQL = "select * from pageset where id_pageset='10' " ;
$objDB->Execute($strSQL);
$page_content=$objDB->fields();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php if($page_content[pagetitle]!=''){echo $page_content[pagetitle];}else{echo $setinfo[title];}?></title>
<meta name="keywords" content="<?php if($page_content[keywords]!=''){echo $page_content[keywords];}else{echo $setinfo[keywords];}?>" />
<meta name="description" content="<?php if($page_content[description]!=''){echo $page_content[description];}else{echo $setinfo[description];}?>" />
<link href="../inc/css/css1.css" rel="stylesheet" type="text/css">
<script src="../inc/js/jquery.js" type="text/javascript"></script>


<?php if($setinfo[iscopy]=='1'){?>
<script language="JavaScript">
document.oncontextmenu=new Function("event.returnValue=false;");
document.onselectstart=new Function("event.returnValue=false;");
</script>
<?php }?>
<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
</head>
<body>

<? require "../header.php"; ?>
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="245" rowspan="2" align="left" valign="top" style="BACKGROUND: url(../inc/pics/bg003.jpg) repeat-x #F1F1F1;"><? require "leftmenu.php"; ?></td>
    <td height="59" align="left" background="../inc/pics/bg004.jpg"><table width="100%" border="0" cellspacing="4" cellpadding="4" class="txt" >
      <tr>
        <td width="7%" align="right"><img src="../inc/pics/icon011.gif" width="14" height="14" /></td>
        <td width="93%">您现在的位置：<a href="/" class="link_navi">首页</a> &gt; 营销网络 </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="757" height="630" align="right" valign="top"><table width="750" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top" class='txt'><?php echo $page_content[content];?></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<? require "../footer.php"; ?>
</body>
</html>
