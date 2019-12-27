<?php
if (!file_exists(__DIR__ . '/../../config.php')) {
    die('Error: Config file not found! :(');
}
require_once __DIR__ . '/../../config.php';

$check_submit = isset($_POST) && !empty($_POST);
$back_url = PROJECT_URL;

if (!$check_submit) {
    redirectTo($back_url);
    die;
}

$data = checkPostData($_POST);
$user_ip = GetRealIp();
$errors = [];

if (empty($data)) {
    setFlashCookie('Ошибка. Не все данные были приняты. Пожалуйста, проверьте подключение к интернету или повторите попытку позже!');
    redirectTo($back_url);
    die;
}

$nameSurname = isset($data['name-surname']) ? $data['name-surname'] : '';
$phone = isset($data['telephone-number']) ? $data['telephone-number'] : '';
$email = isset($data['email-adress']) ? $data['email-adress'] : '';

if (!$nameSurname) {
    $errors[] = 'Имя и фамилия: не должны быть пустыми';
} elseif (mb_strlen($nameSurname, 'utf-8') < 3) {
    $errors[] = 'Имя и фамилия: не менее 3 символов';
} elseif (mb_strlen($nameSurname, 'utf-8') > 80) {
    $errors[] = 'Имя и фамилия: не более 80 символов';
}

if (!$phone) {
    $errors[] = 'Номер телефона: не должен быть пустым';
} elseif (mb_strlen($phone, 'utf-8') < 10) {
    $errors[] = 'Номер телефона: не менее 10 символов';
} elseif (mb_strlen($phone, 'utf-8') > 20) {
    $errors[] = 'Номер телефона: не более 20 символов';
}

if (!$email || $email > 150 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Адрес электронной почты: некорректный адрес';
}

if (!empty($errors)) {
    $errorMsg = implode('<br />', $errors);
    setFlashCookie($errorMsg);
    redirectTo($back_url);
    die;
}

$emailContent = '<p>Заявка на трудоустройство. Данные заявки:</p>';
$emailContent .= '<p>Имя и фамилия: <strong>' . $nameSurname . '</strong></p>';
$emailContent .= '<p>Номер телефона: <strong>' . $phone . '</strong></p>';
$emailContent .= '<p>Адрес электронной почты: <strong>' . $email . '</strong></p>';

$sendMail = mgmSendMail([ADMIN_EMAIL], 'Заявка на трудоустройство', $emailContent);

if (!$sendMail) {
    setFlashCookie('Ошибка. Нам не удалось принять вашу заявку. Пожалуйста, проверьте подключение к интернету или повторите попытку позже!');
    redirectTo($back_url);
    die;
}

setFlashCookie('Ваша заявка принята! Наш сотрудник свяжется с вами в кратчайшие сроки. Спасибо.', 'success_toast');
redirectTo($back_url);
die;
