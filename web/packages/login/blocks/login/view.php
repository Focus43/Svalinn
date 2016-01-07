<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

$c = Page::getCurrentPage();
$u = new User();
$loginURL= $this->url('/login', 'do_login' );

if ($u->isRegistered() && $hideFormUponLogin) { ?>
	<?php   
	if (Config::get("ENABLE_USER_PROFILES")) {
		$userName = '<a href="' . $this->url('/profile') . '">' . $u->getUserName() . '</a>';
	} else {
		$userName = $u->getUserName();
	}
	?>
	<div class="row">
		<div class="small-12 columns text-center">
			<h3><?php  echo t('Currently logged in as <b>%s</b>.', $userName)?></h3>
			<a class="large secondary button" href="<?php echo $this->url('/index.php?cID=258')?>"><?php  echo t('Private Home')?></a>
			<a class="large button" href="<?php  echo $this->url('/login', 'logout')?>"><?php  echo t('Sign Out')?></a>
		</div>
	</div>
<?php   } else { ?>	
	<!-- <p class="text-center">A short description for private/restriced accesss.</p> -->
	<form method="post" id="login_form" action="<?php echo $loginURL?>">
		<div class="row">
			<div class="small-10 small-centered columns">
				<?php    
					if($returnToSamePage ){ 
						// hardcoded to restriced acess cID
						echo $form->hidden('rcID', 258);
						//echo $form->hidden('rcID',$c->getCollectionID());
					} ?>
				<!--<div class="loginTxt"><?php echo t('Login')?></div>-->
				<label for="uName"><?php    if (USER_REGISTRATION_WITH_EMAIL_ADDRESS == true) { ?>
					<?php   echo t('Email Address')?>
					<?php    } else { ?>
					<?php   echo t('Username')?>
					<?php    } ?>
					<?php  echo $form->text('uName',$uName); ?>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="small-10 small-centered columns">
				<label for="uPassword"><?php   echo t('Password')?>
					<?php  echo $form->password('uPassword'); ?>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="small-10 small-centered columns">
				<p><a id="submit" name="submit" type="submit" class="large button expand">Log In</a></p>
			</div>
		</div>
		<script>
		//quick fix to allow for anchor button to work as submit button
    	$("a#submit").click(function()
    	{
    		$("#login_form").submit();
    		return false;
    	});
		</script>
	
	
		<?php    if($showRegisterLink && ENABLE_REGISTRATION){ ?>
			<div class="login_block_register_link"><a href="<?php   echo View::url('/register')?>"><?php   echo $registerText?></a></div>
		<?php    } ?>
	
	</form>
<?php  } // end if not logged in  ?>