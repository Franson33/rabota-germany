<div class="content-container">
    <div class="content-container__description-box">
        <div class="description-box__description-title">
            <h1 class="description-title__title-text drop-shadow-filter">Работа на&nbsp;мясокомбинатах Германии</h1>
            <p class="description-title__text drop-shadow-filter">Трудоустройство напрямую от работодателя, без посредников и без оплаты</p>
        </div>
        <button class="description-box__profile-button orange--button button--clear drop-shadow-filter" type="button" name="profile-button">
            <a class="profile-button__profile-link link" href="<?php echo PROJECT_URL; ?>profile.php">
                <p class="profile-link__text drop-shadow-filter orange-button--text">Заполнить анкету</p>
            </a>
        </button>
    </div>
    <div class="content-container__form-box">
        <form class="form-box__contactus-form" action="<?php echo PROJECT_URL; ?>handler/send-mail.php" method="post">
            <div class="contuctus-form__form-item">
                <p class="form-item__title drop-shadow-filter">Заявка на&nbsp;трудоустройство</p>
                <p class="form-item__text drop-shadow-filter">Мы&nbsp;свяжемся с&nbsp;Вами на&nbsp;протяжении 24&nbsp;часов</p>
            </div>
            <div class="contuctus-form__form-item">
                <label class="form-item__form-label drop-shadow-filter" for="name-surname">Имя и&nbsp;фамилия</label>
                <input class="form-item__form-input" id="name-surname" type="text" name="name-surname" required>
            </div>
            <div class="contuctus-form__form-item">
                <label class="form-item__form-label drop-shadow-filter" for="telephone-number">Номер телефона</label>
                <input class="form-item__form-input" id="telephone-number" type="tel" name="telephone-number" placeholder=" +38(0__)___-__-__" required>
            </div>
            <div class="contuctus-form__form-item">
                <label class="form-item__form-label drop-shadow-filter" for="email-adress">Адрес электронной почты</label>
                <input class="form-item__form-input" id="email-adress" type="email" name="email-adress" value="" required>
            </div>
            <div class="contuctus-form__form-item">
                <div class="contuctus-form__form-button orange--button button--clear drop-shadow-filter">
                    <input class="form-button__input drop-shadow-filter orange-button--text button--clear" type="submit" name="submit-button" value="Отправить">
                </div>
            </div>
        </form>
    </div>
</div>
