<style type="text/css">
/* support anchor */
.anchor-support { position:fixed; top:20%; right:-222px; width:250px; overflow:hidden; z-index:9999; }
.anchor-support .control { height:128px; width:28px; background:url('images/support.png') no-repeat left top; display:inline-block; }
.anchor-support .content { border:1px solid #d56f07; padding:10px; background-color:#f0ffff; position:relative; }
.anchor-support .split-bottom { border-bottom:1px solid #ccd9d9; }
.fcOrange {
    color: #D76D00;
}
</style>
<div class="anchor-support" style="right: -222px;">
    <a id="lnkOpen" class="control" href="javascript:{}" style=""></a>
    <div id="divSupportContent" class="content" style="display: none;">
        
          <div class="split-bottom pb10 ">
			<strong class="fcOrange fs12">Hỗ trợ online</strong>
			<div class="pl7">
                
				<table class="tvalignm" border="0" cellpadding="3" cellspacing="0" width="100%">
					<tbody><tr id="_2aaf5493554e_rptTitle_ctl00_rptSupport_ctl01_pnlYahoo">
						<td>
							Hổ trợ kỹ thuật
						</td>
						<td align="right">
							<a href="ymsgr:sendim?hoangvinh4686">
                                <img alt="Yahoo Chat" style="border-width:0px;" src="http://opi.yahoo.com/online?u=hoangvinh4686&amp;m=g&amp;t=1&amp;l=us">
							</a>
						</td>
					</tr>
					<tr id="_2aaf5493554e_rptTitle_ctl00_rptSupport_ctl02_pnlHotline">
						<td colspan="2">
							<img class="fl mr5" alt="" src="images/phone_small.png">
							<strong class="fs13">Hotline: 0945697869</strong>
						</td>
					</tr>
				</tbody></table>
                
				<table class="tvalignm" border="0" cellpadding="3" cellspacing="0" width="100%">
					<tbody><tr id="_2aaf5493554e_rptTitle_ctl00_rptSupport_ctl01_pnlYahoo">
						<td>
							Hổ trợ đăng nội dung
						</td>
						<td align="right">
							<a href="ymsgr:sendim?ngoi_sao296">
                                <img alt="Yahoo Chat" style="border-width:0px;" src="http://opi.yahoo.com/online?u=ngoi_sao296&amp;m=g&amp;t=1&amp;l=us">
							</a>
						</td>
					</tr>
					<tr id="_2aaf5493554e_rptTitle_ctl00_rptSupport_ctl02_pnlHotline">
						<td colspan="2">
							<img class="fl mr5" alt="" src="images/phone_small.png">
							<strong class="fs13">Hotline: 0945697869</strong>
						</td>
					</tr>
				</tbody></table>
                
			</div>
		</div>  
        
    </div>
</div>
<script type="text/javascript" language="javascript">
    $(document).ready(function () {
        // support anchor
        $("#lnkOpen").click(function () {
            // show hide control
            if ($("#divSupportContent").css("display") == "none") {
                $(this).css("background-image", 'url(images/minimize.gif)');
                $(this).css("width", "30px");
                $(this).css("height", "16px");

                // animation support open
                $("#divSupportContent").parent().animate({ right: "-1px" }, "normal");
            }
            else {
                $(this).attr("style", "");
                // animation support close
                $("#divSupportContent").parent().animate({ right: "-222px" }, "normal");
            }

            // show content
            $("#divSupportContent").toggle();
        });
    });
</script>	