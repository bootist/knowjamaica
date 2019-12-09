<?php
    include 'header.php'?>
<div class="container">
                   <a id="aLogo" class="logo navbar-brand" onclick="ShowWaiting();" href="javascript:__doPostBack(&#39;ctl00$aLogo&#39;,&#39;&#39;)"><img class="img-responsive" src="images/JNGI-logo-Online.png" alt="JN General Insurance logo"/></a>
                   <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="collapse">
                        <ul class ="nav navbar-nav navbar-right">
                            <li><a id="aHomeLink" onclick="ShowWaiting();" href="javascript:__doPostBack(&#39;ctl00$aHomeLink&#39;,&#39;&#39;)"></li>
                            <li class="visible-xs"><a id="aQuoteNBuy" data-toggle="modal" data-target="#modalGetQuote"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Quote & Buy</a></li>
                            <li class="visible-xs"><a id="aRenew" data-toggle="modal" data-target="#modalRenewPolicy"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Renew</a></li>
                            <li class="visible-xs"><a id="aClaimNotification" onclick="ShowWaiting();" href="javascript:__doPostBack(&#39;ctl00$aClaimNotification&#39;,&#39;&#39;)"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Claim Notification</a></li>
                            <li><a id="aHelpDesk" onclick="ShowWaiting();" href="javascript:__doPostBack(&#39;ctl00$aHelpDesk&#39;,&#39;&#39;)"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Help Desk</a></li>
                            <li></li>
                            <li></li>                            
                            <li></li>
                            <li></li>
                            <li><a id="forgotpassword" data-toggle="modal" data-target="#modalForgotPassword"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Forgot Password?</a></li>   
                            <li><a id="login" data-toggle="modal" data-target="#modalLogin"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log In</a></li>
                            <li></li>
                        </ul> <!-- ul -->
                    </div><!-- collapse -->
                </div> <!-- container -->
            </nav> <!-- nav -->
