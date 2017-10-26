<?php
require "../inc/config.php";
require "../inc/function.class.php";


//news content
$strSQL = "select * from newsinfo where id_newsinfo='".$_GET[newsid]."'  " ;
$objDB->Execute($strSQL);
$onenews=$objDB->fields();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<link href="../inc/css/css1.css" rel="stylesheet" type="text/css">
<script src="../inc/js/jquery.js" type="text/javascript"></script>
<script src="../inc/js/jquery.ui.draggable.js" type="text/javascript"></script>

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
        <td width="93%">您现在的位置：<a href="/" class="link_navi">首页</a> &gt; 新闻动态 </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="757" align="right" valign="top"><table width="750" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
    </table>
      <table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" class="txt">
        <tr>
          <td height="20" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td height="20" align="center"><strong><?php echo $onenews[title];?></strong></td>
        </tr>
        <tr>
          <td height="20" align="left"><?php echo $onenews[content];?></td>
        </tr>
        <tr>
          <td height="20" align="right"><strong><?php echo substr($onenews[indate],0,10);?></strong></td>
        </tr>
        <tr>
          <td height="50">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<? require "../footer.php"; ?>
</body>
</html>
