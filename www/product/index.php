<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/pagenav.class.php";


//page_content 内容
$intRows = 5;
//产品
if(isset($_GET[id2])){//存在二级目录 则抽二级目录产品

$arrParam[0][name]="id1";
$arrParam[0][value]=$_GET[id1];
$arrParam[1][name]="id2";
$arrParam[1][value]=$_GET[id2];

$strSQLNum = "SELECT COUNT(*) as num from productinfo   where id_proddir='$_GET[id2]' and dele=1 ";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select * from productinfo   where id_proddir='$_GET[id2]' and dele=1 order by id_prodinfo desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$arrprods=$objDB->GetRows();


}elseif(isset($_GET[id1])){//不存在二级 抽一级目录产品

$arrParam[0][name]="id1";
$arrParam[0][value]=$_GET[id1];

$strSQLNum = "SELECT COUNT(*) as num from productinfo as a
left join productdir as c on a.id_proddir=c.id_proddir
where c.fatherid='$_GET[id1]' and a.dele=1 ";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select a.* from productinfo as a
left join productdir as c on a.id_proddir=c.id_proddir
where c.fatherid='$_GET[id1]' and a.dele=1  order by a.id_prodinfo desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$arrprods=$objDB->GetRows();



}else{// 目录不存在 所有产品


$strSQLNum = "SELECT COUNT(*) as num from productinfo  where dele=1";   
$rs = $objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();
$intTotalNum=$arrNum["num"];

$objPage = new PageNav($intCurPage,$intTotalNum,$intRows);

$objPage->setvar($arrParam);
$objPage->init_page($intRows ,$intTotalNum);
$strNavigate = $objPage->output(1);
$intStartNum=$objPage->StartNum(); 

$strSQL = "select * from productinfo  where dele=1 order by id_prodinfo desc" ;
$objDB->SelectLimit($strSQL,$intRows,$intStartNum);
$arrprods=$objDB->GetRows();

}


//产品目录对应目录简介
if(isset($_GET[id2])){//存在二级目录 则抽二级目录
$strSQL = "select intro from productdir   where id_proddir='$_GET[id2]' " ;
$objDB->Execute($strSQL);
$page_dirintro=$objDB->fields();
}else{//不存在二级 抽一级目录
$strSQL = "select intro from productdir   where id_proddir='$_GET[id1]' " ;
$objDB->Execute($strSQL);
$page_dirintro=$objDB->fields();
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
        <td width="93%">您现在的位置：<a href="/" class="link_navi">首页</a> &gt; 产品中心 </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="757" height="630" align="right" valign="top"><table width="750" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <?php for($i=0;$i<sizeof($arrprods);$i++){
  $strSQL = "select opicname as pic from productpic  where id_prodinfo ='".$arrprods[$i][id_prodinfo]."' order by id_prodpic asc limit 1" ;
  $objDB->Execute($strSQL);
  $arronepic=$objDB->fields();
  ?>
    <tr>
      <td width="21%" height="140" align="center" valign="top"><a href="productsinfo.php?pid=<?php echo $arrprods[$i][id_prodinfo]?>" class="txt"><img src="../upload/product/<?php echo $arronepic[pic]?>" width="136" border="0" /></a></td>
      <td width="79%" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
        <tr>
          <td><a href="productsinfo.php?pid=<?php echo $arrprods[$i][id_prodinfo]?>" class="txt"><?php echo $arrprods[$i][title]?></a></td>
        </tr>
        <tr>
          <td class="link_03"><?php echo $arrprods[$i][intro]?></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td style="padding:0; height:1px;" colspan="2" bgcolor="#F5F5F5"></td>
      </tr>
    <? }?>  
        <tr>
      <td height="50"  colspan="2" align="center" valign="middle"><?php echo $strNavigate;?></td>
      </tr>
  </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<? require "../footer.php"; ?>
</body>
</html>
