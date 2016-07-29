<html>
<head>
<meta charset="utf-8"/>
<title>我的留言板</title>
</head>
<body>
<?php
 $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';   //姓名
 $sex = isset($_REQUEST['sex']) ? intval($_REQUEST['sex']) : 1;                   //性别
 $msg = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';                  //留言
 
 
 mysql_connect("localhost","root","root");       //链接
 mysql_select_db("test");                       //选择数据库
 
 if(!empty($username) && !empty($msg))
 {
  mysql_query("INSERT INTO msgboard(username,sex,msg) VALUES('$username','$sex','$msg')");
 }
 else 
 {
  echo "输入不正确<br/>";
 }
 
 $source = mysql_query("SELECT * FROM msgboard ORDER BY id DESC");
 $result = array();
 while ($row = mysql_fetch_array($source))
  {
?>

	<p>
	<span>
	<b>姓名:&nbsp;</b><?php echo $row['username'];?>
	<br/>
	<b>性别：&nbsp;</b><?php echo ($row['sex'] == 1 ? '男' : '女');?>
	<br/>
	<b>留言内容：&nbsp;</b><?php echo $row['msg'];?>
	</span>
	</P>
	<?php
  }
  ?>

 <form action="msglist.php" method="POST">
 <table width="1000" align="left">
  <tr>
   <td width="100%">
    姓名：<input type="text" name="username" value=""/>
   </td>
  </tr>
  <tr>
   <td width="100%">
    性别：男<input type="radio" name="sex" value="1" checked="checked" /> &nbsp;&nbsp;
          女<input type="radio" name="sex" value="0" />
   </td>
  </tr>
  <tr>
   <td width="100%">
    请留言：<br/><textarea name="msg" rows="5" cols="100"></textarea>
   </td>
  </tr> 
  <tr>
   <td width="100%">
     <input type="submit" value="提 交" />
   </td>
  </tr> 
 </table>
 </form>
 
</body>
</html>