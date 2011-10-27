<div id="signup-form" class="form signup-form">

	<p class="header">Sign Up to PPI</p>
	<p class="desc">All fields here are mandatory.</p>
	<hr>
	<?php if(isset($signupError) && $signupError != ''): ?>
	<div class="error"><?= $signupError; ?></div>
	<?php endif; ?>
	<form action="<?= $baseUrl; ?>user/register" method="post" id="form-signup">

		<dl>
			<dt><label for="el-first-name">First Name</label></dt>
			<dd>
				<div class="fname">
					<?= $form->text('fname', array(
							'id'     => 'el-first-name',
							'value'  => isset($prepops['fname']) ? $prepops['fname'] : ''
					)); ?>
				</div>
			</dd>

			<dt><label for="el-last-name">Last Name</label></dt>
			<dd>
				<div class="lname">
					<?= $form->text('lname', array('id' => 'el-last-name')); ?>
				</div>
			</dd>

			<dt><label for="el-email">Email Address</label></dt>
			<dd>
				<div class="email fl">
					<?= $form->text('email', array(
							'id'    => 'el-email',
							'value'  => isset($prepops['email']) ? $prepops['email'] : ''
						));
					?>
				</div>
				<div class="register-error-email-already-exists">
					<a href="#" title="That email address already exists" onclick="return false;">
						<img src="<?= $baseUrl; ?>images/register_error.png" alt="Email Address Already Exists">
					</a>
				</div>
				<div class="clear"></div>
			</dd>

			<dt><label for="el-password">Password</label></dt>
			<dd>
				<div class="password">
					<?= $form->password('password', array('id' => 'el-password')); ?>
				</div>
			</dd>

			<dt>&nbsp;</dt>
			<dd>
				<div class="submit">
					<?= $form->submit('Register', array('class' => 'button orange-button')); ?>
				</div>
			</dd>

		</dl>
	</form>
</div>
<div class="clear"></div>
