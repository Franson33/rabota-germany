<?php
if (!file_exists(__DIR__ . '/../config.php')) {
    die('Error: Config file not found! :(');
}
require_once __DIR__ . '/../config.php';

$isHome = $_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/index.php';
$pageTitle = defined('PAGE_TITLES') && isset(PAGE_TITLES[$_SERVER['REQUEST_URI']]) ? PAGE_TITLES[$_SERVER['REQUEST_URI']] : 'Работа в Германии на мясокомбинате';
$flashMsg = '';
$flashType = '';

if (isset($_COOKIE['flash-messages'])) {
    $flashMsg = $_COOKIE[ 'flash-messages' ];
    $flashType = $_COOKIE[ 'flash-type' ];
    clearFlashCookie();
}
?>
<!DOCTYPE html>
<html class="html" lang="ru" dir="ltr">
<head>
    <meta charset="utf-8" name="keywords" content="работа в европе, работа в западной европе, работа в странах европы, работа в германии, работа в германии для русских, работа в германии вакансии, работа на мясокомбинате, работа мясокомбинат вакансии">
    <meta name="description" content="Работа в Германии на мясокомбинате">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <?php if (defined('YANDEX_VERIFICATION_CONTENT') && !empty(YANDEX_VERIFICATION_CONTENT)) : ?>
    <meta name="google-site-verification" content="<?php echo GOOLE_VERIFICATION_CONTENT; ?>" />
    <?php endif; ?>
    <?php if (defined('YANDEX_VERIFICATION_CONTENT') && !empty(YANDEX_VERIFICATION_CONTENT)) : ?>
    <meta name="yandex-verification" content="<?php echo YANDEX_VERIFICATION_CONTENT; ?>" />
    <?php endif; ?>
    <?php if (defined('GOOLE_ANALYTICS_TRACKING_ID') && !empty(GOOLE_ANALYTICS_TRACKING_ID)) : ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GOOLE_ANALYTICS_TRACKING_ID ?>"></script><script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?php echo GOOLE_ANALYTICS_TRACKING_ID; ?>');</script>
    <?php endif; ?>
    <?php if (defined('YANDEX_COUNTER_NUMBER') && intval(YANDEX_COUNTER_NUMBER)) : ?>
    <script>var yaMetrikaId='<?php echo intval(YANDEX_COUNTER_NUMBER); ?>';</script>
    <script async>(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");ym(yaMetrikaId,"init",{id:yaMetrikaId,clickmap:true,trackLinks:true,accurateTrackBounce:true,webvisor:true});</script><noscript><div><img src="https://mc.yandex.ru/watch/<?php echo intval(YANDEX_COUNTER_NUMBER); ?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <?php endif; ?>
    <link href="<?php echo PROJECT_URL; ?>favicon.ico?v=<?php echo CACHE_VERSION; ?>" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo ASSETS_URL; ?>css/styles.min.css?v=<?php echo CACHE_VERSION; ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo ASSETS_URL; ?>js/scripts.min.js?v=<?php echo CACHE_VERSION; ?>"></script>
</head>
<body class="body<?php echo $isHome ? ' home-header' : ''; ?>">
<header class="header">
    <div class="wrapper">
        <div class="header-container">
            <div class="logo-container">
                <div class="logo-container__mgm-logo"></div>
                <div class="logo-container__telephone-box">
                    <div class="telephone-box__telephone-number">
                        <a class="telephone-number__text link" href="tel:+380631234567">+380666708930</a>
                    </div>
                    <div class="telephone-box__social-bar">
                        <a class="social-bar__social-icon link" title="Whatsapp" href="https://wa.me/380666708930?" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a class="social-bar__social-icon link" title="Telegram" href="https://msng.link/o/?https://msng.link/o/?380666708930=vi=tg" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                        <a class="social-bar__social-icon link" title="viber" href="https://msng.link/o/?380666708930=vi" target="_blank"><i class="fab fa-viber"></i></a>
                    </div>
                </div>
            </div>
            <div class="navigation-container">
                <button class="navigation-container__menu-icon button--clear JS-menu-open-button" type="button" name="burger-button">
                    <svg class="menu-icon__burger-menu" viewbox="0 0 48 40" preserveAspectRatio="none">
                        <line x1="5" y1="4" x2="43" y2="4" stroke="#51d000" stroke-width="8" stroke-linecap="round"></line>
                        <line x1="5" y1="20" x2="43" y2="20" stroke="#51d000" stroke-width="8" stroke-linecap="round"></line>
                        <line x1="5" y1="36" x2="43" y2="36" stroke="#51d000" stroke-width="8" stroke-linecap="round"></line>
                    </svg>
                    <span class="menu-icon__menu-text">Меню</span>
                </button>
                <nav class="navigation-container__navigation-menu JS-nav-container">
                    <div class="navigation-menu__close-button-container JS-menu-close-button">
                        <button class="close-button-container__close-button button--clear close--button" type="button" aria-label="menu-close-button"></button>
                    </div>
                    <button class="navigation-menu__menu-button button--clear drop-shadow-filter" type="button" name="menu-button">
                        <a class="menu-button__menu-link drop-shadow-filter link" href="<?php echo PROJECT_URL; ?>"><p class="menu-link__text">Главная</p></a>
                    </button>
                    <button class="navigation-menu__menu-button button--clear drop-shadow-filter" type="button" name="menu-button">
                        <a class="menu-button__menu-link drop-shadow-filter link" href="<?php echo PROJECT_URL; ?>conditions.php"><p class="menu-link__text">Условия работы</p></a>
                    </button>
                    <button class="navigation-menu__menu-button button--clear drop-shadow-filter" type="button" name="menu-button">
                        <a class="menu-button__menu-link drop-shadow-filter link" href="<?php echo PROJECT_URL; ?>aboutus.php"><p class="menu-link__text">О компании</p></a>
                    </button>
                    <button class="navigation-menu__menu-button button--clear drop-shadow-filter" type="button" name="menu-button">
                        <a class="menu-button__menu-link drop-shadow-filter link" href="<?php echo PROJECT_URL; ?>contacts.php"><p class="menu-link__text">Контакты</p></a>
                    </button>
                </nav>
            </div>
            <?php
            if ($isHome) {
                require_once './_header_top_home.php';
            }
            ?>
        </div>
    </div>
</header>
<main class="main">
    <div class="wrapper">
        <div class="main-container">
