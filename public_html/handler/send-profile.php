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

if (!$name) {
    $errors[] = 'Имя: не должны быть пустыми';
} elseif (mb_strlen($name, 'utf-8') < 3) {
    $errors[] = 'Имя: не менее 3 символов';
} elseif (mb_strlen($name, 'utf-8') > 20) {
    $errors[] = 'Имя: не более 20 символов';
}

if (!$familyName) {
    $errors[] = 'Фамилия: не должны быть пустыми';
} elseif (mb_strlen($familyName, 'utf-8') < 3) {
    $errors[] = 'Фамилия: не менее 3 символов';
} elseif (mb_strlen($familyName, 'utf-8') > 20) {
    $errors[] = 'Фамилия: не более 20 символов';
}

if (!$nation) {
    $errors[] = 'Национальность: не должны быть пустыми';
} elseif (mb_strlen($nation, 'utf-8') < 3) {
    $errors[] = 'Национальность: не менее 3 символов';
} elseif (mb_strlen($nation, 'utf-8') > 30) {
    $errors[] = 'Национальность: не более 30 символов';
}

if (!$birthDate) {
    $errors[] = 'Дата рождения: не должны быть пустыми';
} elseif (mb_strlen($birthDate, 'utf-8') < 3) {
    $errors[] = 'Дата рождения: не менее 3 символов';
} elseif (mb_strlen($birthDate, 'utf-8') > 12) {
    $errors[] = 'Дата рождения: не более 12 символов';
}

if (!$fullYears) {
    $errors[] = 'Полных лет: не должны быть пустыми';
} elseif (mb_strlen($fullYears, 'utf-8') < 1) {
    $errors[] = 'Полных лет: не менее 1 символов';
} elseif (mb_strlen($fullYears, 'utf-8') > 3) {
    $errors[] = 'Полных лет: не более 3 символов';
}

if (!$adress) {
    $errors[] = 'Адрес: не должны быть пустыми';
} elseif (mb_strlen($adress, 'utf-8') < 10) {
    $errors[] = 'Адрес: не менее 10 символов';
} elseif (mb_strlen($adress, 'utf-8') > 100) {
    $errors[] = 'Адрес: не более 100 символов';
}

if (!$telephone) {
    $errors[] = 'Номер телефона: не должен быть пустым';
} elseif (mb_strlen($telephone, 'utf-8') < 10) {
    $errors[] = 'Номер телефона: не менее 10 символов';
} elseif (mb_strlen($telephone, 'utf-8') > 20) {
    $errors[] = 'Номер телефона: не более 20 символов';
}

if (!$email || $email > 150 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Адрес электронной почты: некорректный адрес';
}

if (!$institute) {
    $errors[] = 'Образование: не должны быть пустыми';
} elseif (mb_strlen($institute, 'utf-8') < 5) {
    $errors[] = 'Образование: не менее 5 символов';
} elseif (mb_strlen($institute, 'utf-8') > 80) {
    $errors[] = 'Образование: не более 80 символов';
}

if (!$specialization) {
    $errors[] = 'Специальность: не должны быть пустыми';
} elseif (mb_strlen($specialization, 'utf-8') < 5) {
    $errors[] = 'Специальность: не менее 5 символов';
} elseif (mb_strlen($specialization, 'utf-8') > 80) {
    $errors[] = 'Специальность: не более 80 символов';
}

if (!$expirience) {
    $errors[] = 'Опыт работы: не должны быть пустыми';
} elseif (mb_strlen($expirience, 'utf-8') < 3) {
    $errors[] = 'Опыт работы: не менее 3 символов';
} elseif (mb_strlen($expirience, 'utf-8') > 200) {
    $errors[] = 'Опыт работы: не более 200 символов';
}

if (!$termOfStay) {
    $errors[] = 'Срок прибывания: не должны быть пустыми';
} elseif (mb_strlen($termOfStay, 'utf-8') < 3) {
    $errors[] = 'Срок прибывания: не менее 3 символов';
} elseif (mb_strlen($termOfStay, 'utf-8') > 80) {
    $errors[] = 'Срок прибывания: не более 80 символов';
}

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
