<?php

//全局-BANNER图
$strSQL = "select opicname as pic from  layoutpic  where id_layout='7' order by id_layoutpic desc limit 5" ;
$objDB->Execute($strSQL);
$qj_banner=$objDB->GetRows();

// LOGO
$strSQL = "select content from layout  where id_layout='10'" ;
$objDB->Execute($strSQL);
$Qk_LOGO=$objDB->fields();
?>
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="95" background="/inc/pics/bg001.jpg"><table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="766" height="95" align="left" valign="top"><?=$Qk_LOGO[content];?></td>
        <td width="236" align="center"><table width="221" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="11"><img src="/inc/pics/icon001.gif" width="11" height="10" /></td>
            <td width="61"><a href="/" class="link_04">返回首页</a></td>
            <td width="11"><img src="/inc/pics/icon002.gif" width="11" height="10" /></td>
            <td width="61"> <a href="javascript:void(0)" class="link_04" onclick="window.external.addFavorite('http://<?=$_SERVER['PHP_SELF'];?>','<?=$setinfo[title]?>'); return(false);" >加入收藏</a></td>
            <td width="11"><img src="/inc/pics/icon003.gif" width="11" height="10" /></td>
            <td width="66"> <a href="/contactus.php" class="link_04">联系我们</a></td>
          </tr>
          <tr>
            <td height="40" colspan="6" align="right" valign="middle"><table width="140" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div id="search">
<div id="searchtxt" style="width:120px; height:19px; float:left">
<form action="/product/productsearch.php" method="post" name="searchform" onsubmit="">
<label>
<input name="searchcontent" type="text" class="txt" id="searchcontent" value="产品搜索"  style="color:#ccc" />
</label>
</form>
</div>
<div id="btn"><a href="javascript:document.searchform.submit();"><span><img src="/inc/pics/search02.gif" style="border:0" alt="搜索一下"/></span></a></div>
</div></td>
  </tr>
</table>
</td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>

<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" align="center" valign="middle" background="/inc/pics/bg002.gif">
<DIV id=menumain>
<DIV class=mainmenuiner>
<A class=menumain href="/" target=_self>网站首页</A>
<A class=menumain href="/about/aboutus.php" target=_self>公司简介</A>
<A class=menumain href="/about/honor.php" target=_self>公司荣誉</A> 
<A class=menumain href="/product/" target=_self>产品中心</A>
<A class=menumain href="/about/equipment.php" target=_self>设备展示</A>
<A class=menumain href="/news/" target=_self>新闻动态</A>
<A class=menumain href="/news/joinus.php" target=_self>人才招聘</A>
<A class=menumain href="/about/contactus.php" target=_self>联系我们</A>
</DIV></DIV></td>
  </tr>
</table>

<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="239">
<SCRIPT type=text/javascript src="/inc/js/advsheadlb.js"></SCRIPT>
<DIV id=advsheadlb>
<?php for($i=0;$i<sizeof($qj_banner);$i++){?>
<IMG id=advsheadlbpic_<?php echo $i;?> class=advsheadlbpic border=0 src="/upload/layout/<?php echo $qj_banner[$i][pic];?>">
<?php }?>
</DIV></td>
  </tr>
</table>
