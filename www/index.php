<?php
require "./inc/config.php";
require "./inc/function.class.php";

//公司新闻
$strSQL = "select * from newsinfo  where id_newsdir='3' and dele=1  order by id_newsinfo desc" ;
$objDB->Execute($strSQL);
$arrnews_company=$objDB->GetRows();

//行业新闻
$strSQL = "select * from newsinfo  where id_newsdir='4' and dele=1  order by id_newsinfo desc" ;
$objDB->Execute($strSQL);
$arrnews_hangye=$objDB->GetRows();

//全局导航设定
$strSQL = "select content from layout  where id_layout='3'" ;
$objDB->Execute($strSQL);
$Quanju_Daohang=$objDB->fields();

//友情链接设定
$strSQL = "select content from layout  where id_layout='5'" ;
$objDB->Execute($strSQL);
$Quanju_YQLJ=$objDB->fields();

//左侧产品目录
$strSQL = "select name,id_proddir from productdir where level ='1' and dele='1' order by ordernum desc" ;
$objDB->Execute($strSQL);
$Product_dir=$objDB->GetRows();

//首页 公司简介 区块
$strSQL = "select content from layout  where id_layout='4'" ;
$objDB->Execute($strSQL);
$Qk_gsjj=$objDB->fields();

//首页 招聘 图片 区块
$strSQL = "select content from layout  where id_layout='8'" ;
$objDB->Execute($strSQL);
$Qk_zhaopin=$objDB->fields();

//首页  在线留言 图片 区块
$strSQL = "select content from layout  where id_layout='9'" ;
$objDB->Execute($strSQL);
$Qk_liuyan=$objDB->fields();


//首页最新产品图片
$strSQL = "select id_prodinfo,title from productinfo  where dele=1 order by id_prodinfo desc limit 5" ;
$objDB->Execute($strSQL);
$arrprods=$objDB->GetRows();

for($i=0;$i<5;$i++){
  $strSQL = "select opicname as pic from productpic  where id_prodinfo ='".$arrprods[$i][id_prodinfo]."' order by id_prodpic asc limit 1" ;
  $objDB->Execute($strSQL);
  $arronepic=$objDB->fields();
  $arrallpic[]=$arronepic[pic];
}  


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<link href="inc/css/css1.css" rel="stylesheet" type="text/css">
<script src="inc/js/jquery.js" type="text/javascript"></script>
<script src="inc/js/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="inc/js/jcarousellite_1.0.1.pack.js" type="text/javascript"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $(".jCarouselLite").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
   auto: 3000,
   scroll: 1,
   speed: 1000,
   visible: 5
    }); 
   });
</script>

<?php if($setinfo[iscopy]=='1'){?>
<script language="JavaScript">
document.oncontextmenu=new Function("event.returnValue=false;");
document.onselectstart=new Function("event.returnValue=false;");
</script>
<?php }?>
<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
</head>
<body>

<? require "header.php"; ?>
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="245" rowspan="2" align="left" valign="top" style="BACKGROUND: url(inc/pics/bg003.jpg) repeat-x #F1F1F1;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><img src="inc/pics/icon001.jpg" width="226" height="45" /></td>
      </tr>
      <tr>
        <td height="140" align="center" background="inc/pics/icon004.gif"><?php echo $Quanju_Daohang[content];?></td>
      </tr>
      <tr>
        <td align="center"><img src="inc/pics/icon004.jpg" width="226" height="45" /></td>
      </tr>
      <tr>
        <td height="208" align="center" background="inc/pics/icon006.gif"><table width="180" border="0" cellspacing="4" cellpadding="2">
        <?php for($i=0;$i<sizeof($Product_dir);$i++){?>
          <tr>
          <td align="left"><img src="inc/pics/icon007.gif" width="14" height="13" /><a href="#" class="link_navi"> <?php echo $Product_dir[$i][name];?></a></td>
          </tr>
         <?php }?>
        </table></td>
      </tr>
      <tr>
        <td align="center"><img src="inc/pics/icon008.gif" width="158" height="34" /></td>
      </tr>
      <tr>
        <td height="71" align="center"><table width="224" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="71" align="center" valign="middle" background="inc/pics/icon009.gif">
              <?php echo $Quanju_YQLJ[content];?>
           </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="70">&nbsp;</td>
      </tr>
    </table></td>
    <td height="28" background="inc/pics/bg002.jpg">&nbsp;</td>
  </tr>
  <tr>
    <td width="757" height="630" align="right" valign="top"><table width="750" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="522" align="center" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="86%" align="left"><img src="inc/pics/title.jpg" width="175" height="34" /></td>
            <td width="14%" align="center"><img src="inc/pics/more.jpg" width="44" height="13" /></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#A12450" style="padding:0; height:1px;"></td>
            </tr>
        </table>
          <?php echo $Qk_gsjj[content];?></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center"><?php echo $Qk_zhaopin[content];?></td>
          </tr>
          <tr>
            <td align="center"><a href="javascript:void(0)"  onclick="needsendmail();"  style="cursor:pointer"><?php echo $Qk_liuyan[content];?></a></td>
          </tr>
        </table></td>
      </tr>
    </table>
      <table width="740" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="627" align="left"><img src="inc/pics/title2.jpg" width="190" height="39" /></td>
          <td width="113" align="center"><img src="inc/pics/more.jpg" width="44" height="13" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#A12450" style="padding:0; height:1px;"></td>
        </tr>
      </table>
      <table width="740" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div class="jCarouselLite">
     <ul>
      <li><a href="/product/productsinfo.php?pid=<?php echo $arrprods[0][id_prodinfo]?>"><img src="/upload/product/<?=$arrallpic[0];?>" alt="" width="135" height="105" border="0"></a><br />
        <br /><?=$arrprods[0][title]?></li>
      <li><a href="/product/productsinfo.php?pid=<?php echo $arrprods[1][id_prodinfo]?>"><img src="/upload/product/<?=$arrallpic[1];?>" alt="" width="135" height="105" border="0"></a><br />
        <br /><?=$arrprods[1][title]?></li>
      <li><a href="/product/productsinfo.php?pid=<?php echo $arrprods[2][id_prodinfo]?>"><img src="/upload/product/<?=$arrallpic[2];?>" alt="" width="135" height="105" border="0"></a><br />
        <br /><?=$arrprods[2][title]?></li>
      <li><a href="/product/productsinfo.php?pid=<?php echo $arrprods[3][id_prodinfo]?>"><img src="/upload/product/<?=$arrallpic[3];?>" alt="" width="135" height="105" border="0"></a><br />
        <br /><?=$arrprods[3][title]?></li>
      <li><a href="/product/productsinfo.php?pid=<?php echo $arrprods[4][id_prodinfo]?>"><img src="/upload/product/<?=$arrallpic[4];?>" alt="" width="135" height="105" border="0"></a><br />
        <br /><?=$arrprods[4][title]?></li>
      </ul>
    </div></td>
        </tr>
      </table>
      <table width="740" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="740" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="67%" align="left"><img src="inc/pics/title3.jpg" width="203" height="38" /></td>
              <td width="33%" align="center"><img src="inc/pics/more.jpg" width="44" height="13" /></td>
            </tr>
            <tr>
              <td colspan="2" bgcolor="#A12450" style="padding:0; height:1px;"></td>
              </tr>
            <tr>
              <td colspan="2" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="left"><table width="100%" border="0" cellspacing="2" cellpadding="2" class="txt">
              <?php for($i=0;$i<4;$i++){?>
                <tr>
                  <td width="5%" align="center"><img src="inc/pics/icon010.gif" width="4" height="7" /></td>
                  <td width="71%"><a href="/news/newspage.php?id=<?php echo $arrnews_company[$i][id_newsdir];?>&newsid=<?php echo $arrnews_company[$i][id_newsinfo];?>" class="link_navi"><?php echo cutstr($arrnews_company[$i][title],50,1);?></a></td>
                  <td width="24%" align="center"><?php echo substr($arrnews_company[$i][indate],0,10);?></td>
                </tr>
                <tr>
                  <td colspan="3"  bgcolor="#E6E6E6" style="padding:0; height:1px;"></td>
                </tr>
              <?php }?>  
              </table></td>
            </tr>
          </table></td>
          <td align="center"><table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="87%" align="left"><img src="inc/pics/title4.jpg" width="203" height="38" /></td>
              <td width="13%" align="center"><img src="inc/pics/more.jpg" width="44" height="13" /></td>
            </tr>
            <tr>
              <td colspan="2" bgcolor="#A12450" style="padding:0; height:1px;"></td>
              </tr>
            <tr>
              <td colspan="2" align="left">&nbsp;</td>
              </tr>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="2" cellpadding="2" class="txt">
              <?php for($j=0;$j<4;$j++){?>
                <tr>
                  <td width="5%" align="center"><img src="inc/pics/icon010.gif" width="4" height="7" /></td>
                  <td width="71%"><a href="/news/newspage.php?id=<?php echo $arrnews_hangye[$j][id_newsdir];?>&newsid=<?php echo $arrnews_hangye[$j][id_newsinfo];?>" class="link_navi"><?php echo cutstr($arrnews_hangye[$j][title],35,1);?></a></td>
                  <td width="24%" align="center"><?php echo substr($arrnews_hangye[$j][indate],0,10);?></td>
                </tr>
                <tr>
                  <td colspan="3"  bgcolor="#E6E6E6" style="padding:0; height:1px;"></td>
                </tr>
               <?php }?> 
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<? require "footer.php"; ?>
</body>
</html>
