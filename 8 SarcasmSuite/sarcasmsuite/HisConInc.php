<?php 
	$filename = __FILE__;
?>
<!DOCTYPE HTML>
<html>
	<head>
		
    	<!-- Title of Page -->
        <title>
       		Sarcasm Suite: Sarcasm Detection using Conversational Context
        </title>

        <script src="base/jquery.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">        
		<link href="bootstrap/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
   	    <link href="style.css" rel="stylesheet">        


		<script src="base/jquery.js"></script>
		<script src="bootstrap/js/plugins/sortable.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/plugins/purify.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/fileinput.min.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/themes/fa/theme.js"></script>
		<script>
			$(document).ready(function() {
				$(window).keydown(function(event){
					if(event.keyCode == 13) {
						event.preventDefault();
						//showResults();
						return false;
					}
				});
			});
        
        function showResults(){
				$('#res').html('Please wait . . . ');

				var xmlhttp;
				if (window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
				}
				else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
				}

				xmlhttp.onreadystatechange=function(){
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
						//setTimeout(document.getElementById("result").innerHTML=xmlhttp.responseText,2000);
						setTimeout(function () {
							var resultAJAX = xmlhttp.responseText;
							//alert(resultAJAX);
							if(resultAJAX == 1){
								//document.getElementById("result").innerHTML = "Sarcastic!";
								//alert(resultAJAX);
								document.getElementById("profilePic").src = "images/anupam_sarc2.png";
								document.getElementById("res").innerHTML = "&nbsp;";
								
							}
							else{
								//alert(resultAJAX);
								//document.getElementById("result").innerHTML = "Non-Sarcastic!";
								document.getElementById("profilePic").src = "images/anupam_nonsarc2.png";
								document.getElementById("res").innerHTML = "&nbsp;";

							}
							
						}, 4000);
					}
				}
				xmlhttp.open("GET","runHisConInc.php?sentence="+ document.forms["sentForm"]["sarcasmInput"].value+"&username="+document.forms["sentForm"]["username"].value,true);
				xmlhttp.send();
		}
        
        </script>
                
    </head>
    
    <body>
		<div id="wrapper" class="container-fluid" style="width:100%">
		<!--HEADER ABOVE NAVIGATION-->			
			<div onclick="javascript:void(0)" style="cursor:pointer;"><?php include('header.php'); include('navbar.php');?></div>
		</div>
		<div class="alert alert-warning" role="alert" style="font-size: 16px;">
			This demonstration is based on our paper: <strong>Anupam Khattri, Aditya Joshi, Pushpak Bhattacharyya, Mark J Carman</strong>, '<a href="#" class="alert-link"><i>Your sentiment precedes you: Using an author's historical tweets to predict sarcasm</i></a>', WASSA workshop at EMNLP 2015, Lisbon.
		</div>
     
            <div class="container">
           	<div class="row">
				<div class="col-xs-12">
					<div class="account-wall" style="min-height: 550px;">
						<div id="res" style="font-size: 16px; text-align: center;">&nbsp;</div><img class="profile-img" id="profilePic" src="images/anupam_nonsarc2.png" alt="">
						<form action="" class="form-signin" id="sentForm" name="sentForm" onsubmit="showResults();">
							<input type="text" class="form-control" id="sarcasmInput" name="sarcasmInput" placeholder="Please enter input sentence here!" required autofocus><br/>
							<div class="input-group">
								<div class="input-group-addon input-lg"><b>@</b></div>
								<input type="text" class="form-control" id="sarcasmInput" name="username" placeholder="Please enter twitter username here!" required autofocus><br/>
							</div>
						</form>
						<button style="width:905px; margin: 0 auto;" class="btn btn-lg btn-primary btn-block" type="submit" id="resultButton" name="resultButton" onclick="showResults();">Predict</button>
						<div id="result" style="width:905px; margin: 0 auto;"><br/>
							<div id="legendLeft" style="width:30%; float: left;">&nbsp;</div>
							<div id="legendLeft1" style="width:30%; float: left;"><img class="profile-img2" src="images/anupam_nonsarc2.png" alt=""><b>&nbsp;Non-Sarcastic</b></div>
							<div id="legendLeft2" style="width:30%; float: left;"><img class="profile-img2" src="images/anupam_sarc2.png" alt=""><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sarcastic</b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
       	<!--FOOTER-->
		<?php include('footer.php'); ?>
		<!--CONTENT ENDS-->
    </body>
</html>

