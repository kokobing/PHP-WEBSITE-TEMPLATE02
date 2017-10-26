<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/pagenav.class.php";


$arrParam[0][name]="id";
$arrParam[0][value]=$_GET[id];

if(!isset($_GET[id]) || $_GET[id]==''){
$intRows = 10;
$strSQLNum = "SELECT COUNT(*) as num from newsinfo  where id_newsdir='3' or id_newsdir='4' or id_newsdir='5' or id_newsdir='7' and dele=1";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select * from newsinfo  where id_newsdir='3' or id_newsdir='4' or id_newsdir='5' or id_newsdir='7' and dele=1  order by id_newsinfo desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$arrnews=$objDB->GetRows();

}elseif(isset($_GET[id])){

$intRows = 10;
$strSQLNum = "SELECT COUNT(*) as num from newsinfo  where id_newsdir='".$_GET[id]."'  and dele=1";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select * from newsinfo  where id_newsdir='".$_GET[id]."' and dele=1  order by id_newsinfo desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$arrnews=$objDB->GetRows();
}




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
    <td width="757" height="500" align="right" valign="top"><table width="750" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" align="center" valign="top">&nbsp;</td>
      </tr>
    </table>
      <table width="700" border="0" align="center" cellpadding="2" cellspacing="2" class="txt">
       <?php for($i=0;$i<sizeof($arrnews);$i++){?> 
        <tr>
          <td width="17" height="26" align="right" valign="middle" ><img src="../inc/pics/icon012.gif" width="13" height="12" /></td>
          <td width="557" align="left" valign="middle" ><a href="/news/newspage.php?id=<?php echo $arrnews[$i][id_newsdir];?>&newsid=<?php echo $arrnews[$i][id_newsinfo];?>" class="link_navi"><?php echo cutstr($arrnews[$i][title],150,1);?></a></td>
          <td width="98"  align="center" valign="middle"><?php echo substr($arrnews[$i][indate],0,10);?></td>
        </tr>
                <tr>
          <td colspan="3" background="../inc/pics/icon013.gif" style="padding:0; height:1px;"></td>
      </tr>
         <?php }?>

      </table>
      <table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td height="50" align="center"><?php echo $strNavigate;?></td>
        </tr>
      </table></td>
  </tr>
</table>
<? require "../footer.php"; ?>
</body>
</html>
