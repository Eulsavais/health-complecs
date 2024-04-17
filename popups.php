<div id="popup" class="popup">
			<div class="popup_body">
				<div class="popup_content">
					<a href="#header" class="popup_close close-popup">
						<ion-icon name="close-circle-outline"></ion-icon>
					</a>
					<div class="form">
						<form action="login.php" method=post class="form_body">
							<h1 class="form_title">Вход</h1>
							<div class="form_item">
								<label for="login" class="form_label">Логин</label>
								<input type="login" id="login" name="login" class="form_input" required>
							</div>
							<div class="form_item">
								<label for="password" class="form_label">Пароль:</label>
								<input type="password" id="password" name="password" class="form_input" required>
							</div>

							<input type="submit" value=ok class="form_button"> </input>

						</form>

						<a href="#popupReg" class="popup-link mini__auto">Зарегистрироваться</a>


					</div>
				</div>
			</div>
		</div>
	</div>
<!-- onsubmit="return validateForm()" -->
	<div id="popupReg" class="popup">
		<div class="popup_body">
			<div class="popup_content">
				<a href="#header" class="popup_close close-popup">
					<ion-icon name="close-circle-outline"></ion-icon>
				</a>
				<div class="form">
					<form action="register.php" method=post id="form" class="form_body">


						<h1 class="form_title">Регистрация</h1>
						<div class="form_item">
							<label for="email" class="form_label">E-mail:</label>
							<input type=email name="email" id="email" value="" class="form_input" required>
						</div>
						<div class="form_item">
							<label for="login" class="form_label">Логин:</label>
							<input type=login name="login" id="login" value="" class="form_input" required>
						</div>
						<div class="form_item">
							<label for="password" class="form_label">Пароль:</label>
							<input type=password name="password" id="password" class="form_input" required>
						</div>
						
						<div class="form_item">
							<label for="confirm_password" class="form_label">Повтор пароля:</label>
							<input type=password name="confirm_password" id="confirm_password" class="form_input" required>
						</div>
						<input type="submit" value=ok class="form_button"> </input>

					</form>


					<a href="#popup" class="popup-link mini__auto">Войти</a>

				</div>
			</div>
		</div>
	</div>


	<div id="success" class="popup suc">
		<div class="popup_body suc">
			<div class="popup_content suc">				
				<div class="success_body">
					<div class="upper_text"></div>
				</div>
			</div>
		</div>
	</div>
	<script src="scripts/form.js"></script>
	<script src="scripts/successMsg.js"></script>
	