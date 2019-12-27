<?php require_once __DIR__ . '/_header.php'; ?>

<div class="main-container__main-title">
    <div class="main-title__title-container">
        <h2 class="title-container__text">АНКЕТА СОИСКАТЕЛЯ</h2>
    </div>
</div>
<div class="main-container__form-container">
    <form class="form-container__profile-form" action="<?php echo PROJECT_URL; ?>handler/send-profile.php" method="post" enctype="multipart/form-data">
        <div class="profile-form__form-item item--half">
            <label class="form-item__profile-label" for="name-input">ИМЯ</label>
            <input class="form-item__profile-input" type="text" name="name" id="name-input" required>
        </div>
        <div class="profile-form__form-item item--half">
            <label class="form-item__profile-label" for="family-name-input">ФАМИЛИЯ</label>
            <input class="form-item__profile-input" type="text" name="family-name" id="family-name-input" required>
        </div>
        <div class="profile-form__form-item item--radio">
            <label class="form-item__profile-label title--radio">СЕМЕЙНОЕ ПОЛОЖЕНИЕ:</label>
            <label class="form-item__profile-label label--radio" for="maried-input">ЖЕНАТ</label>
            <input class="form-item__profile-input input--radio" type="radio" name="maried" id="maried-input" value="ЖЕНАТ" checked>
            <label class="form-item__profile-label label--radio" for="not-maried-input">НЕ ЖЕНАТ</label>
            <input class="form-item__profile-input input--radio" type="radio" name="maried" id="not-maried-input" value="НЕ ЖЕНАТ">
        </div>
        <div class="profile-form__form-item">
            <label class="form-item__profile-label" for="nation-name-input">НАЦИОНАЛЬНОСТЬ</label>
            <input class="form-item__profile-input" type="text" name="nationality" id="nation-name-input" required>
        </div>
        <div class="profile-form__form-item">
            <label class="form-item__profile-label" for="birth-name-input">ДАТА РОЖДЕНИЯ</label>
            <input class="form-item__profile-input" type="text" name="birth-date" id="birth-name-input" placeholder=" день/месяц/год" required>
        </div>
        <div class="profile-form__form-item">
            <label class="form-item__profile-label" for="full-years-input">ПОЛНЫХ ЛЕТ</label>
            <input class="form-item__profile-input" type="number" name="full-years" id="full-years-input" required>
        </div>
        <div class="profile-form__form-item item--radio">
            <label class="form-item__profile-label title--radio">ПОЛ:</label>
            <label class="form-item__profile-label label--radio" for="male-input">МУЖСКОЙ</label>
            <input class="form-item__profile-input input--radio" type="radio" name="gender" id="male-input" value="МУЖСКОЙ" checked>
            <label class="form-item__profile-label label--radio" for="female-input">ЖЕНСКИЙ</label>
            <input class="form-item__profile-input input--radio" type="radio" name="gender" id="female-input" value="ЖЕНСКИЙ">
        </div>
        <div class="profile-form__form-item input-textarea">
            <label class="form-item__profile-label" for="adress-input">АДРЕС ПРОЖИВАНИЯ</label>
            <textarea class="form-item__profile-input input-textarea" rows="4" name="adress" id="adress-input" required></textarea>
        </div>
        <div class="profile-form__form-item">
            <label class="form-item__profile-label" for="telephone-input">КОНТАКТНЫЙ ТЕЛЕФОН</label>
            <input class="form-item__profile-input" type="tel" name="telephone" id="telephone-input" placeholder=" +38(0__)___-__-__" required>
        </div>
        <div class="profile-form__form-item">
            <label class="form-item__profile-label" for="email-input">ЭЛЕКТРОННАЯ ПОЧТА</label>
            <input class="form-item__profile-input" type="email" name="email" id="email-input" required>
        </div>
        <fieldset class="profile-form__form-item item--education">
            <legend class="form-item__education-title">ОБРАЗОВАНИЕ</legend>
            <div class="form-item__education-item">
                <label class="education-item__education-label" for="institute-input">УЧЕБНОЕ ЗАВЕДЕНИЕ</label>
                <textarea class="education-item__education-input" rows="3" name="institute" id="institute-input" required></textarea>
            </div>
            <div class="form-item__education-item">
                <label class="education-item__education-label" for="spec-input">СПЕЦИАЛЬНОСТЬ</label>
                <textarea class="education-item__education-input" rows="3" name="specialization" id="spec-input" required></textarea>
            </div>
            <div class="form-item__education-item">
                <label class="education-item__education-label label--upload" for="diploma-input">СКАНКОПИЯ ДИПЛОМА</label>
                <input class="education-item__education-input input--upload" type="file" name="diploma" id="diploma-input">
            </div>
        </fieldset>
        <div class="profile-form__form-item input-textarea">
            <label class="form-item__profile-label" for="expirience-input">ОПЫТ РАБОТЫ</label>
            <textarea class="form-item__profile-input input-textarea" rows="4" name="expirience" id="expirience-input" required></textarea>
        </div>
        <div class="profile-form__form-item">
            <label class="form-item__profile-label label-term-stay" for="term-stay-input">ПЛАНИРУЮ ВЫЕХАТЬ НА СРОК</label>
            <input class="form-item__profile-input item-term-stay" type="text" name="term-stay" id="term-stay-input" required>
        </div>
        <div class="profile-form__form-item item--radio">
            <label class="form-item__profile-label title--radio">РАЗРЕШЕНИЕ НА РАБОТУ В ГЕРМАНИИ:</label>
            <label class="form-item__profile-label label--radio" for="permit-have-input">ЕСТЬ</label>
            <input class="form-item__profile-input input--radio" type="radio" name="permit" id="permit-have-input" value="ЕСТЬ РАЗРЕШЕНИЕ">
            <label class="form-item__profile-label label--radio" for="permit-nothave-input">НЕТ</label>
            <input class="form-item__profile-input input--radio" type="radio" name="permit" id="permit-nothave-input" value="НЕТ РАЗРЕШЕНИЯ" checked>
        </div>
        <div class="profile-form__form-item item--button">
            <button class="contuctus-form__form-button orange--button button--clear drop-shadow-filter" type="submit" name="submit-button">
                <input class="form-button__input drop-shadow-filter orange-button--text button--clear" type="submit" name="submit-button" value="Отправить">
            </button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/_footer.php'; ?>
