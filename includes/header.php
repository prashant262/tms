<?php
// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);
$query = $mysqli->query("select * from tblcategories where parent_id = 0");
$result_categories = fetchResult($query);
$query->close();

 if(ISSET($_SESSION['login']))
{?>

<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li class="hm"><a href="index.html"><i class="fa fa-home"></i></a></li>
			<li class="prnt"><a href="profile.php">My Profile</a></li>
				<li class="prnt"><a href="change-password.php">Change Password</a></li>
			<li class="prnt"><a href="tour-history.php">My Tour History</a></li>
			<li class="prnt"><a href="issuetickets.php">Issue Tickets</a></li>
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
			<li class="tol">Welcome :</li>				
			<li class="sig"><?php echo htmlentities($_SESSION['login']);?></li> 
			<li class="sigi"><a href="logout.php" >/ Logout</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div><?php } else {?>
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li class="hm"><a href="admin/index.php">Admin Login</a></li>
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
			<li class="tol">Toll Number : 123-4568790</li>				
			<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal" >Sign Up</a></li> 
			<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >/ Sign In</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div>
<?php }?>
<div id="google_translate_element" style="float:right;"></div>
<!--- /top-header ---->
<!--- header ---->
<div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<!-- <a href="index.php">JG <span>Camps &amp Resorts</span></a>	 -->
		</div>
	
		<div class="lock fadeInDown animated" data-wow-delay=".5s"> 
			<li><i class="fa fa-lock"></i></li>
            <li><div class="securetxt">SAFE &amp; SECURE </div></li>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--- /header ---->
<!--- footer-btm ---->
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container nav-container" style="width:100%;">
	<div class="navigation">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="page.php?type=aboutus">About</a></li>
								<?php foreach($result_categories as $result){ ?>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $result["name"] ?>
							        <span class="caret"></span></a>
							        <ul class="dropdown-menu">
							          <?php 
							          	$query = $mysqli->query("select * from tblcategories where parent_id = ".$result["id"]);
										$result_subcategories = fetchResult($query);
										$query->close();
										if(count($result_subcategories) > 0){ foreach($result_subcategories as $sub) { ?>
											<li class="dropdown-submenu inner-li">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $sub["name"] ?>
									        <ul class="dropdown-menu">
									        	<li><a href="page.php?type=privacy"></a></li>
									        	<?php 
									        		$query = $mysqli->query("select * from tbltourpackages where categoryId = ".$sub["id"]);
													$result_listing_subcategory = fetchResult($query);
													$query->close();
													foreach($result_listing_subcategory as $list_subcat){ ?>
														<li class="inner-li"><a href="package-details.php?pkgid=<?= $list_subcat["PackageId"] ?>"><?= $list_subcat["PackageName"] ?></a></li>
													<?php }
									        	?>
									        </ul>
									    </li>

										<?php } 
										}
										$query = $mysqli->query("select * from tbltourpackages where categoryId = ".$result["id"]);
										$result_listing_category = fetchResult($query);
										$query->close();
										foreach($result_listing_category as $list_cat){ ?>
											<li class="inner-li"><a href="package-details.php?pkgid=<?= $list_cat["PackageId"] ?>"><?= $list_cat["PackageName"] ?></a></li>
										<?php }
							          ?>
							        </ul>
								</li>
								<?php } ?>
								<li><a href="page.php?type=privacy">Privacy Policy</a></li>
								<li><a href="page.php?type=terms">Terms of Use</a></li>
								<li><a href="page.php?type=contact">Contact Us</a></li>
								<?php if(ISSET($_SESSION['login']))
{?>
								<li><a href="#" data-toggle="modal" data-target="#myModal3">Write Us</a>  </li>
								<?php } else { ?>
								<li><a href="enquiry.php"> Enquiry </a>  </li>
								<?php } ?>
								<div class="clearfix"></div>

						</ul>
					</nav>
				</div><!-- /.navbar-collapse -->	
			</nav>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

