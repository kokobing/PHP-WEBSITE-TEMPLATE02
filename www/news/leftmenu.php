<?php 
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
        <td height="140" align="center" background="/inc/pics/icon004.gif"><table width="160" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td align="left"><img src="/inc/pics/icon005.gif" width="4" height="7" /> <a href="/news/index.php?id=3" class="link_navi">公司新闻</a></td>
          </tr>
          <tr>
            <td align="left"><img src="/inc/pics/icon005.gif" width="4" height="7" /> <a href="/news/index.php?id=4" class="link_navi">产品新闻</a></td>
          </tr>
          <tr>
            <td align="left"><img src="/inc/pics/icon005.gif" width="4" height="7" /> <a href="/news/index.php?id=5" class="link_navi">行业动态</a></td>
          </tr>
          <tr>
            <td align="left"><img src="/inc/pics/icon005.gif" alt="" width="4" height="7" /> <a href="/news/index.php?id=7" class="link_navi">加入我们</a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center"><img src="/inc/pics/icon005.jpg" width="226" height="45" /></td>
      </tr>
      <tr>
        <td height="208" align="center" background="/inc/pics/icon006.gif"><?php echo $Quanju_LXWM[content];?></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
  </tr>
    </table>
