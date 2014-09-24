
<link href="../../admin/html/css/css.css"rel="stylesheet" type="text/css">
<link  href="../../admin/html/css/template_css.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <style type="text/css">
        html{
	        margin: 0 auto;
        }
        body {
	        font-family:arial,tahoma,verdana,helvetica,sans-serif;
	        font-size:11px;
	        text-align:center;
	        background:#e1e1e1  url(images/login/bg_main.jpg) repeat-x;
	        line-height:22px;
	        color:#000000;
	        font-weight:bold;
	        margin-left: 0px;
	        margin-top: 77px;
	        margin-right: 0px;
	        margin-bottom: 0px;
        }
        #clear{
	        clear: both;
	        height:5px;
        }
        #table_main{
	        margin: 0 auto;
	        width:565px;
	        height:297px;
	        text-align:left;
	        background:url(images/login/center.jpg) repeat-x;
        }
        #left{
	        width:15px;
	        height:297px;
	        float:left;
	        background:url(images/login/left.jpg) no-repeat;

        }
        #right{
	        width:15px;
	        height:297px;
	        float:right;
	        background:url(images/login/right.jpg) no-repeat;

        }
        #center{
	        height:298px;
	        margin-left:15px;
	        background:url(images/login/center.jpg) repeat-x;
	        vertical-align:top;

        }
        #img_left{
	        width:148px;
	        height:297px;
	        vertical-align:top;
	        background:url(images/login/img_left.jpg) no-repeat left;

        }
        #content{
	        width:375px;
	        float:right;

        }
        #logo{
	        width:203px;
	        height:85px;
	        background-image:url(images/login/name_top.jpg);

        }
        #text{
	        width:305px;
	        height:194px;
	        vertical-align:top;
        }       
        .fro{
	        width:180px;
        }       
       /*.msgerr
        {
	       background: url(images/error-icon-16.gif) no-repeat left top;
	        padding-left: 25px;
	        margin-left: 5px;
	        list-style: none;
	        vertical-align: middle;
	        text-align: left;
	        color: #df2267;
	        height:16px;
        }*/
        
        .errmsg
        {
            color:#ff0000;
        }
    .style1 {color: #FF0000}
 </style>
</head>
<body>
<table width="70%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td>
		<table width="100%" height="91%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><div id="table_main">
      <div id="left"> </div>
      <div id="right"> </div>
      <div id="center">
        <div id="content">
          <div id="logo"> </div>
          <div id="errmsg" class="errmsg" style="padding-right:70px;">
		  <form name="frmLang" action="login_action.php" method="post" id="frmLang">
</div>
          <div id="text">
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="305">
                <tbody>
                  <tr>
                    <td width="300"  colspan="5"  align="center" class="login-errormsg style1">Tài khoản hoặc mật khẩu không đúng!Mời nhập lại.</td>
                  </tr>
                  <tr>
                    <td><img src="images/h_user.jpg" width="27" height="29" /></td>
                    <td><span id="username">&nbsp;Tên sử dụng </span></td>
                    <td colspan="3" style="text-align: right;" height="35"><input class="fro"  id="user" name="user" type="text" /></td>
                  </tr>
                  <tr>
                    <td><img src="images/h_pass.jpg" width="27" height="29" /></td>
                    <td><span id="password">&nbsp;Mật khẩu </span></td>
                    <td colspan="3" style="text-align: right;"><input class="fro"  id="pass" name="pass" type="password" />                    </td>
                  </tr>

                  <tr>
                    <td colspan="5" style="padding-left: 112px; text-align: right;" height="35"><table cellpadding="0" cellspacing="0" border="0" align="center"><tr>
                      <td>&nbsp;&nbsp;
                        <label>
                        <input type="submit" name="Submit" value="Login">
                        </label></td>
                    </tr></table>                          </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>
        <div id="img_left"> </div>
      </div>
    </div></td>
  </tr>
  <tr>
    <td align="center">Copyright @ 2001, Allright Reserved. Designed by Xổ số Vĩnh Long </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
  </tr>
</table>
	</td>
</tr>
</table>
</body>