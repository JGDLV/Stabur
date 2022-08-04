<?php
    
$from = 'admin@stibur.ru';
// $to = 'gspsnab@mail.ru';
$to = 'jgdlv87@gmail.com';

if (isset($_POST['act'])) {

	$hdr="From: noreply\nMIME-Version: 1.0\nContent-Type:text/plain;charset=\"utf-8\"";

	if ($_POST['act']=='callback') {
		$name = isset($_POST['name']) ? strip_tags($_POST['name']) : '';
		$phone = isset($_POST['phone']) ? strip_tags($_POST['phone']) : '';
		$comment = isset($_POST['comment']) ? strip_tags($_POST['comment']) : '';
		$message = "Имя: $name\n";
		$message .= "Телефон: $phone\n";
		$message .= "Комментарий: $comment\n";
		$subject = "Заказ обратного звонка";

	} else if ($_POST['act']=='equipment') {
		$equipment = isset($_POST['equipment']) ? strip_tags($_POST['equipment']) : '';
		$name = isset($_POST['name']) ? strip_tags($_POST['name']) : '';
		$phone = isset($_POST['phone']) ? strip_tags($_POST['phone']) : '';
		$address = isset($_POST['address']) ? strip_tags($_POST['address']) : '';
		$date = isset($_POST['date']) ? strip_tags($_POST['date']) : '';
		$time = isset($_POST['time']) ? strip_tags($_POST['time']) : '';
		$comment = isset($_POST['comment']) ? strip_tags($_POST['comment']) : '';
		$message = "Техника: $equipment\n";
		$message .= "Имя: $name\n";
		$message .= "Телефон: $phone\n";
		$message .= "Адрес: $address\n";
		$message .= "Дата: $date\n";
		$message .= "Время: $time\n";
		$message .= "Комментарий: $comment\n";
		$subject = "Заказ техники";

	} else if ($_POST['act']=='question') {
		$name = isset($_POST['name']) ? strip_tags($_POST['name']) : '';
		$phone = isset($_POST['phone']) ? strip_tags($_POST['phone']) : '';
		$comment = isset($_POST['comment']) ? strip_tags($_POST['comment']) : '';
		$message = "Имя: $name\n";
		$message .= "Телефон: $phone\n";
		$message .= "Комментарий: $comment\n";
		$subject = "Вопрос";

	}
	

	if (mail($from, $to, "=?utf-8?B?".base64_encode($subject)."?=", $message, $hdr)) {
		print_r('<h2 class="modal__header">Спасибо!</h2><p class="modal__text">Наш менеджер свяжется с Вами в ближайшее время</p><div class="modal__close btn btn_yellow"><span>Хорошо</span></div>');
	}
	else {
		print_r('<h2 class="modal__header">Ошибка, ваше сообщение не отправлено.</h2><p class="modal__text">Попробуйте отправить данные еще раз.</p><div class="modal__close btn btn_yellow"><span>Хорошо</span></div>');
	}

}




(mail($from, $to, "=?utf-8?B?".base64_encode($subject)."?=", $message, $hdr)) {
		print_r('<h2 class="modal__header">Спасибо!</h2><p class="modal__text">Наш менеджер свяжется с Вами в ближайшее время</p><div class="modal__close btn btn_yellow"><span>Хорошо</span></div>');
	}

?>
