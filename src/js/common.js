document.addEventListener('DOMContentLoaded', function () {

    //Открытие меню
    var menuOpen = document.querySelector('.JS-menu-open-button');
    var menuClose = document.querySelector('.JS-menu-close-button');
    var menuContainer = document.querySelector('.JS-nav-container');

    menuOpen.addEventListener('click', function () {
        menuContainer.classList.add('navigation-menu-active')
    });

    menuClose.addEventListener('click', function () {
        menuContainer.classList.remove('navigation-menu-active')
    });

    // Проверка существования toast и автоматическое скрытие его через 10 секунд
    var msgToast = document.querySelector('.toast_wrapper');

    if (msgToast) {
        var toastCloseTrigger = msgToast.querySelector('.close_toast'),
            toastTimeout = false;

        if (toastCloseTrigger) {
            // По нажатию на кнопку удалить toast
            toastCloseTrigger.addEventListener('click', function (e) {
                e.preventDefault();
                if (toastTimeout) {
                    clearTimeout(toastTimeout);
                    toastTimeout = false;
                }
                msgToast.parentNode.removeChild(msgToast);
            });
        }

        toastTimeout = setTimeout(function () {
            msgToast.parentNode.removeChild(msgToast);
        }, 10000);
    }

    //При прокрутке блоки выезжают из за краев экрана
    var elementContainer = document.querySelector('.JS-block-container');

    var blockSlider = function () {
        var element1 = elementContainer.querySelector('.JS-block-1');
        var element2 = elementContainer.querySelector('.JS-block-2');
        var element3 = elementContainer.querySelector('.JS-block-3');
        var element4 = elementContainer.querySelector('.JS-block-4');
        var element5 = elementContainer.querySelector('.JS-block-5');
        var element6 = elementContainer.querySelector('.JS-block-6');

        var visible = function (target) {
            var targetPosition = {
                top: window.pageYOffset + target.getBoundingClientRect().top,
                bottom: window.pageYOffset + target.getBoundingClientRect().bottom
            };
            var windowPosition = {
                top: window.pageYOffset,
                bottom: window.pageYOffset + document.documentElement.clientHeight
            };

            if (targetPosition.top < windowPosition.bottom) {
                target.classList.add('come--back')
            } else {
                target.classList.remove('come--back')
            }
        };

        visible(element1);
        visible(element2);
        visible(element3);
        visible(element4);
        visible(element5);
        visible(element6);

        window.addEventListener('scroll', function () {
            visible(element1);
            visible(element2);
            visible(element3);
            visible(element4);
            visible(element5);
            visible(element6);
        });
    };

    if (elementContainer) {
        blockSlider()
    }

    //Переключение фотографий в галерее
    var photoList = [
        './assets/images/factory/factory-1.jpg',
        './assets/images/factory/factory-2.jpg',
        './assets/images/factory/factory-3.jpg',
        './assets/images/factory/factory-4.jpg'
    ];
    var galleryContainer = document.querySelector('.JS-gallery-container');

    var gallerySwitch = function () {
        var buttonLeft = galleryContainer.querySelector('.JS-gallery-button-left');
        var buttonRight = galleryContainer.querySelector('.JS-gallery-button-right');
        var photo = galleryContainer.querySelector('.JS-image');
        var number = 0;

        buttonLeft.addEventListener('click', function () {
            number--;
            if (number < 0) {
                number = photoList.length - 1
            }
            photo.src = photoList[number]
        });
        buttonRight.addEventListener('click', function () {
            number++;
            if (number > photoList.length - 1) {
                number = 0
            }
            photo.src = photoList[number]
        });
    };

    if (galleryContainer) {
        gallerySwitch();
    }
});
