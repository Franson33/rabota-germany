<?php
if (!file_exists(__DIR__ . '/../../config.php')) {
    die('Error: Config file not found! :(');
}
require_once __DIR__ . '/../../config.php';

$check_submit = isset($_POST) && !empty($_POST);
$back_url = PROJECT_URL . 'profile.php';

if (!$check_submit) {
    setFlashCookie('Ошибка. Форма не отправлена!');
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

/////////////////////////////
/////////////////////////////
// ЗДЕСЬ НАДО ПРОВЕРИТЬ ВСЕ ДАННЫЕ. ТЕ, КОТОРЫЕ
// С ОШИБКОЙ, НУЖНО ПОМЕСТИТЬ В МАССИВ errors
/////////////////////////////
/////////////////////////////

if (!empty($errors)) {
    $errorMsg = implode('<br />', $errors);
    setFlashCookie($errorMsg);
    redirectTo($back_url);
    die;
}

$emailContent = '<p>Анкета соискателя. Данные заявки:</p>';
$emailContent .= '';

$emailContent .= '<hr>';
$emailContent .= '<p>IP адрес: <strong>' . $user_ip . '</strong></p>';

$sendMail = mgmSendMail([ADMIN_EMAIL], 'Анкета соискателя', $emailContent);

if (!$sendMail) {
    setFlashCookie('Ошибка. Нам не удалось принять вашу заявку. Пожалуйста, проверьте подключение к интернету или повторите попытку позже!');
    redirectTo($back_url);
    die;
}

setFlashCookie('Ваша заявка принята! Наш сотрудник свяжется с вами в кратчайшие сроки. Спасибо.', 'success_toast');
redirectTo($back_url);
die;
