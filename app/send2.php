<?php
$to = "gspsnab@mail.ru";

if (isset($_POST['phone'])) {
	$service = $_POST['service'];
	$address = $_POST['address'];

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$comment = $_POST['comment'];

	$file_name=$_FILES['file']['name'];
	$file_tmpname=$_FILES['file']['tmp_name'];

	$message = "Услуга: $service\nАдрес: $address\nИмя: $name\nТелефон: $phone\nКомментарий: $comment\n";

	$bound=md5(uniqid(time()));
	$body="\n--$bound\n";
	$body.="Content-type: text/plain; charset=utf-8\n";
	$body.="Content-Transfer-Encoding: 8bit\n\n";
	$body.=$message;
	if ($file_name!="") {
		$body.="\n--$bound\n";
		$body.="Content-Disposition: attachment\n";
		$body.="Content-Transfer-Encoding: base64\n";
		$body.="Content-Type: application/octet-stream;";
		$body.=" name=\"".basename($file_name)."\"\n";
		$fp = fopen($file_tmpname,"r");
		$file = fread($fp, filesize($file_tmpname));
		fclose($fp);
		$body.=chunk_split("\n".base64_encode($file))."\n";
	}
	$body.="\n--$bound--\n";

	$subject = "=?UTF-8?B?" . base64_encode("Заказ услуги") . "?=";

	$headers = "From: noreply \r\n";
	$headers.= "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: multipart/mixed; boundary=\"$bound\"\r\n";

	if (mail($to, $subject, $body, $headers)) {
		print_r('<h2 class="modal__header">Спасибо!</h2><p class="modal__text">Наш менеджер свяжется с Вами в ближайшее время</p><div class="modal__close btn btn_yellow"><span>Хорошо</span></div>');
	}
	else {
		print_r('<h2 class="modal__header">Ошибка, ваше сообщение не отправлено.</h2><p class="modal__text">Попробуйте отправить данные еще раз.</p><div class="modal__close btn btn_yellow"><span>Хорошо</span></div>');
	}
}
