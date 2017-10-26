<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/pagenav.class.php";


//抽出单个产品
$strSQL = "SELECT * from productinfo where id_prodinfo=$_GET[pid] and dele='1'";   
$objDB->Execute($strSQL);
$oneproduct=$objDB->fields();

//去单个产品的所有图片
$strSQL = "SELECT * from productpic where id_prodinfo=$_GET[pid] and type='JPG' and dele='1'";   
$objDB->Execute($strSQL);
$oneproductpic=$objDB->GetRows();

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
    <td width="757" height="630" align="right" valign="top">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="79%" height="140" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
        <tr>
          <td height="30" class="txt_title">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle" class="txt_title"><?php echo $oneproduct[title];?></td>
        </tr>
        <tr>
          <td ><?php echo $oneproduct[content];?></td>
        </tr>
        <tr>
        <td><table width="140"  border="0" cellspacing="2" cellpadding="2" class="txt">
            <tr>
              <? for($i=0;$i<sizeof($oneproductpic);$i++){
	              if($i%4==0){echo "</tr><tr>";}
	           ?>
              <td align="left" valign="bottom">
                <table width="140" border="0" cellpadding="0" cellspacing="0" class="txt">
                  <tr>
                    <td align="center">
                    <a href="javascript:void(0)"  onclick="$.wholepop.dialogClass ='style_1';poppic('../upload/product/<?php echo $oneproductpic[$i][opicname];?>','Product Overview');"> <img src="../upload/product/<?php echo $oneproductpic[$i][opicname];?>" width="120" border="0" ></a>                    </td>
                  </tr>
                  <tr>
                    <td height="10" align="left"></td>
                  </tr>
              </table></td>
              <? }?>
            </tr>
        </table></td>
        </tr>
      </table></td>
    </tr>
    <?php if($arronepdf[pdf]!=''){?>
        <tr>
      <td height="30" align="right" valign="middle"><a href="../upload/product/<?php echo $arronepdf[pdf]?>" target="_blank"><img src="../inc/pics/adobe.gif" width="21" height="15" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
     <?php }?> 
    <tr>
      <td style="padding:0; height:1px;" bgcolor="#F5F5F5"></td>
      </tr>
  </table>

    </td>
  </tr>
</table>
<? require "../footer.php"; ?>
</body>
</html>
