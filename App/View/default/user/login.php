<div id="login-form-container">
	<div id="login-form" class="form">
		<p class="header">Login to PPI</p>
		<hr>
		<?php if(isset($loginError) && $loginError != ''): ?>
		<div class="error"><?= $loginError; ?></div>
		<?php endif; ?>
		<form action="<?= $baseUrl; ?>user/login" method="post" id="form-login">
			<dl>
				<dt><label for="el-login-email">Email</label></dt>
				<dd>
					<div class="username">
						<?= $form->text('email', array('id' => 'el-login-email')); ?>
					</div>
				</dd>

				<dt><label for="el-login-password">Password</label></dt>
				<dd>
					<div class="password">
						<?= $form->password('password', array('id' => 'el-login-password')); ?>
					</div>
				</dd>
				<dt>&nbsp;</dt>
				<dd>
					<div class="submit">
						<?= $form->submit('Login', array('class' => 'button orange-button')); ?>
					</div>
				</dd>
			</dl>
		</form>
	</div>
</div>