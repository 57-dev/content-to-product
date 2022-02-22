window.addEventListener('load', function () {
    let floatButton = document.querySelector('#mobile-widget')
    let floatCurrencyContainer = document.querySelector('.float-currency')
    let floatCurrencyButtons = document.querySelectorAll('.btn-currency')
    let inputCurrencySearch = document.querySelector('#currency_search')
    let sub_menu_currency = document.querySelector('#menu-item-scd-curr-menu .sub-menu')

    sub_menu_currency.style.height="300px"
    sub_menu_currency.style.overflow="auto"
    inputCurrencySearch.addEventListener('click', function (e) {
        floatCurrencyContainer.classList.remove("d-block");
        floatCurrencyContainer.classList.add("d-none");
    })

    inputCurrencySearch.addEventListener('keyup', function (e) {
        var value = this.value.toLowerCase();
        jQuery("#currency_div_mobile_widget span").filter(function () {
            jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1)
        });
    })


    floatButton.addEventListener('click', function () {
        if (floatCurrencyContainer.classList.contains('d-none')) {
            floatCurrencyContainer.classList.add("d-block");
            floatCurrencyContainer.classList.remove("d-none");
            fadeIn(floatCurrencyContainer, 500);
        } else {
            floatCurrencyContainer.classList.add("d-none");
            floatCurrencyContainer.classList.remove("d-block");
        }

    });

    for (const i of floatCurrencyButtons) {
        i.addEventListener('click', function () {
            location.href = this.dataset.href;
        });
    }

    function fadeIn(el, time) {
        el.style.opacity = 0;

        var last = +new Date();
        var tick = function () {
            el.style.opacity = +el.style.opacity + (new Date() - last) / time;
            last = +new Date();

            if (+el.style.opacity < 1) {
                (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
            }
        };

        tick();
    }

    console.log(sessionStorage)

    sessionStorage.clear(); 

    console.log(sessionStorage)


    for (const key in sessionStorage) {
        if (Object.hasOwnProperty.call(sessionStorage, key)) {
            if (sessionStorage[key] !== undefined && ((sessionStorage[key].indexOf("div.widget_shopping_cart_content") !== -1) || (sessionStorage[key].indexOf("a.cart-contents") !== -1))) {
                sessionStorage.setItem(key, '')
                break
            }
        }
    }
});

sessionStorage.clear(); 

