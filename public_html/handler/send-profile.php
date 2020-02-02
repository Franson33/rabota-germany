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

$name = isset($data['name']) ? $data['name'] : '';
$familyName = isset($data['family-name']) ? $data['family-name'] : '';
$maried = isset($data['maried']) ? $data['maried'] : '';
$nation = isset($data['nationality']) ? $data['nationality'] : '';
$birthDate = isset($data['birth-date']) ? $data['birth-date'] : '';
$fullYears = isset($data['full-years']) ? $data['full-years'] : '';
$gender = isset($data['gender']) ? $data[''] : 'gender';
$adress = isset($data['adress']) ? $data['adress'] : '';
$telephone = isset($data['telephone']) ? $data['telephone'] : '';
$email = isset($data['email']) ? $data['email'] : '';
$institute = isset($data['institute']) ? $data['institute'] : '';
$specialization = isset($data['specialization']) ? $data['specialization'] : '';
$diploma = isset($data['diploma']) ? $data['diploma'] : '';
$expirience = isset($data['expirience']) ? $data['expirience'] : '';
$termOfStay = isset($data['term-stay']) ? $data['term-stay'] : '';
$permit = isset($data['permit']) ? $data['permit'] : '';


if (!empty($errors)) {
    $errorMsg = implode('<br />', $errors);
    setFlashCookie($errorMsg);
    redirectTo($back_url);
    die;
}

$emailContent = '<p>Анкета соискателя. Данные заявки:</p>';
$emailContent .= '<p>Имя: <strong>' . $name . '</strong></p>';
$emailContent .= '<p>Фамилия: <strong>' . $familyName . '</strong></p>';
$emailContent .= '<p>Женат: <strong>' . $maried . '</strong></p>';
$emailContent .= '<p>Национальность: <strong>' . $nation . '</strong></p>';
$emailContent .= '<p>Дата рождения: <strong>' . $birthDate . '</strong></p>';
$emailContent .= '<p>Полных лет: <strong>' . $fullYears . '</strong></p>';
$emailContent .= '<p>Пол: <strong>' . $gender . '</strong></p>';
$emailContent .= '<p>Адрес: <strong>' . $adress . '</strong></p>';
$emailContent .= '<p>Телефон: <strong>' . $telephone . '</strong></p>';
$emailContent .= '<p>Имейл: <strong>' . $email . '</strong></p>';
$emailContent .= '<p>Образование: <strong>' . $institute . '</strong></p>';
$emailContent .= '<p>Специальность: <strong>' . $specialization . '</strong></p>';
$emailContent .= '<p>Диплом: <strong>' . $diploma . '</strong></p>';
$emailContent .= '<p>Опыт работы: <strong>' . $expirience . '</strong></p>';
$emailContent .= '<p>Срок прибывания: <strong>' . $termOfStay . '</strong></p>';
$emailContent .= '<p>Разришение на работу: <strong>' . $permit . '</strong></p>';

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
