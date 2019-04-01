<?php

/* @var $this yii\web\View */

$this->title = 'Агенство недвижимости Город-Загород';
?>
<section class="main-heading">
    <div class="main-heading__wrapper">
        <div class="container">
            <h1 class="main-heading__title">Найдем ваш новый дом из тысячи и продадим старый</h1>
        </div>
    </div>
</section>
<section id="form-search" class="form-search">
    <button type="button" id="button-toggle-filter" class="btn form-search__button-toggle">Открыть фильтр</button>
    <form class="container">
        <div class="form-search__property-type-wrapper">
            <label class="form-search__property-type"><input type="radio" name="type" value="buy" checked><span></span>Купить</label>
            <label class="form-search__property-type"><input type="radio" name="type" value="sale"><span></span>Продать</label>
            <label class="form-search__property-type"><input type="radio" name="type"
                                                             value="rent"><span></span>Снять</label>
        </div>
        <div class="form-search__group form-search__city-wrapper">
            <label for="cityField">Место нахождения</label>
            <input id="cityField" type="text" name="city" placeholder="Наберите город..." class="form-search__input">
        </div>
        <div class="form-search__group form-search__property-wrapper">
            <label>Недвижимость</label>
            <select class="form-search__input">
                <option>Выберите тип недвижимости</option>
                <option>Квартира</option>
                <option>Дом</option>
                <option>Комната</option>
            </select>
        </div>
        <div class="form-search__group form-search__range">
            <label>Площадь</label>
            <paper-range-slider></paper-range-slider>
            <span class="form-search__range-result">100 м2</span> - <span
                    class="form-search__range-result">200 м2</span>
        </div>
        <div class="form-search__group form-search__range">
            <label>Стоимость</label>
            <paper-range-slider></paper-range-slider>
            <span class="form-search__range-result">1000 Р</span> - <span
                    class="form-search__range-result">10000000 Р</span>
        </div>
        <button type="submit" class="btn form-search__button-search">Найти</button>
    </form>
</section>
<section class="module container">
    <h2 class="module__title">Новые объявления</h2>
    <div class="module__list">
        <div class="module__item properties__item property-item">
            <a class="link" href="property.html">
                <div class="property-item__image-wrapper">
                    <img src="../images/property1.jpg">
                    <span class="property-item__label property-item__label--buy">Продается</span>
                </div>
                <div class="property-item__content">
                    <h3 class="property-item__title">Ул. Ленина, д. 1, кв. 20</h3>
                    <p class="property-item__category">3-х комнатная квартира</p>
                    <p class="property-item__description">Продается 3-комнатная квартира в центре города. Состояние
                        нормальное, жилое. + комнаты изолированные + большая кухня + санузел раздельный ...</p>
                    <footer class="property-item__footer">
                        <span class="property-item__area">95 м2</span>
                        <span class="property-item__price">1 200 000 P</span>
                    </footer>
                </div>
            </a>
        </div>
        <div class="module__item properties__item property-item">
            <a class="link" href="property.html">
                <div class="property-item__image-wrapper">
                    <img src="../images/property1.jpg">
                    <span class="property-item__label property-item__label--buy">Продается</span>
                </div>
                <div class="property-item__content">
                    <h3 class="property-item__title">Ул. Ленина, д. 1, кв. 20</h3>
                    <p class="property-item__category">3-х комнатная квартира</p>
                    <p class="property-item__description">Продается 3-комнатная квартира в центре города. Состояние
                        нормальное, жилое. + комнаты изолированные + большая кухня + санузел раздельный ...</p>
                    <footer class="property-item__footer">
                        <span class="property-item__area">95 м2</span>
                        <span class="property-item__price">1 200 000 P</span>
                    </footer>
                </div>
            </a>
        </div>
        <div class="module__item properties__item property-item">
            <a class="link" href="property.html">
                <div class="property-item__image-wrapper">
                    <img src="../images/property1.jpg">
                    <span class="property-item__label property-item__label--buy">Продается</span>
                </div>
                <div class="property-item__content">
                    <h3 class="property-item__title">Ул. Ленина, д. 1, кв. 20</h3>
                    <p class="property-item__category">3-х комнатная квартира</p>
                    <p class="property-item__description">Продается 3-комнатная квартира в центре города. Состояние
                        нормальное, жилое. + комнаты изолированные + большая кухня + санузел раздельный ...</p>
                    <footer class="property-item__footer">
                        <span class="property-item__area">95 м2</span>
                        <span class="property-item__price">1 200 000 P</span>
                    </footer>
                </div>
            </a>
        </div>
        <div class="module__item properties__item property-item">
            <a class="link" href="property.html">
                <div class="property-item__image-wrapper">
                    <img src="../images/property1.jpg">
                    <span class="property-item__label property-item__label--buy">Продается</span>
                </div>
                <div class="property-item__content">
                    <h3 class="property-item__title">Ул. Ленина, д. 1, кв. 20</h3>
                    <p class="property-item__category">3-х комнатная квартира</p>
                    <p class="property-item__description">Продается 3-комнатная квартира в центре города. Состояние
                        нормальное, жилое. + комнаты изолированные + большая кухня + санузел раздельный ...</p>
                    <footer class="property-item__footer">
                        <span class="property-item__area">95 м2</span>
                        <span class="property-item__price">1 200 000 P</span>
                    </footer>
                </div>
            </a>
        </div>
        <div class="module__item properties__item property-item">
            <a class="link" href="property.html">
                <div class="property-item__image-wrapper">
                    <img src="../images/property1.jpg">
                    <span class="property-item__label property-item__label--buy">Продается</span>
                </div>
                <div class="property-item__content">
                    <h3 class="property-item__title">Ул. Ленина, д. 1, кв. 20</h3>
                    <p class="property-item__category">3-х комнатная квартира</p>
                    <p class="property-item__description">Продается 3-комнатная квартира в центре города. Состояние
                        нормальное, жилое. + комнаты изолированные + большая кухня + санузел раздельный ...</p>
                    <footer class="property-item__footer">
                        <span class="property-item__area">95 м2</span>
                        <span class="property-item__price">1 200 000 P</span>
                    </footer>
                </div>
            </a>
        </div>
        <div class="module__item properties__item property-item">
            <a class="link" href="property.html">
                <div class="property-item__image-wrapper">
                    <img src="../images/property1.jpg">
                    <span class="property-item__label property-item__label--buy">Продается</span>
                </div>
                <div class="property-item__content">
                    <h3 class="property-item__title">Ул. Ленина, д. 1, кв. 20</h3>
                    <p class="property-item__category">3-х комнатная квартира</p>
                    <p class="property-item__description">Продается 3-комнатная квартира в центре города. Состояние
                        нормальное, жилое. + комнаты изолированные + большая кухня + санузел раздельный ...</p>
                    <footer class="property-item__footer">
                        <span class="property-item__area">95 м2</span>
                        <span class="property-item__price">1 200 000 P</span>
                    </footer>
                </div>
            </a>
        </div>
        <div class="module__item properties__item property-item">
            <a class="link" href="property.html">
                <div class="property-item__image-wrapper">
                    <img src="../images/property1.jpg">
                    <span class="property-item__label property-item__label--buy">Продается</span>
                </div>
                <div class="property-item__content">
                    <h3 class="property-item__title">Ул. Ленина, д. 1, кв. 20</h3>
                    <p class="property-item__category">3-х комнатная квартира</p>
                    <p class="property-item__description">Продается 3-комнатная квартира в центре города. Состояние
                        нормальное, жилое. + комнаты изолированные + большая кухня + санузел раздельный ...</p>
                    <footer class="property-item__footer">
                        <span class="property-item__area">95 м2</span>
                        <span class="property-item__price">1 200 000 P</span>
                    </footer>
                </div>
            </a>
        </div>
        <div class="module__item properties__item property-item">
            <a class="link" href="property.html">
                <div class="property-item__image-wrapper">
                    <img src="../images/property1.jpg">
                    <span class="property-item__label property-item__label--buy">Продается</span>
                </div>
                <div class="property-item__content">
                    <h3 class="property-item__title">Ул. Ленина, д. 1, кв. 20</h3>
                    <p class="property-item__category">3-х комнатная квартира</p>
                    <p class="property-item__description">Продается 3-комнатная квартира в центре города. Состояние
                        нормальное, жилое. + комнаты изолированные + большая кухня + санузел раздельный ...</p>
                    <footer class="property-item__footer">
                        <span class="property-item__area">95 м2</span>
                        <span class="property-item__price">1 200 000 P</span>
                    </footer>
                </div>
            </a>
        </div>
    </div>
</section>
<section class="module contact">
    <h2 class="module__title">Контакты</h2>
    <div class="contact__map">
        <iframe src="https://yandex.ru/map-widget/v1/-/CCUTF8ZY" class="contact__iframe" frameborder="0"
                allowfullscreen="true"></iframe>
        <div class="contact__info-wrapper">
            <div class="contact__info">
                <p class="contact__address">Владимирская область, г. Александров, ул. Красный переулок, д. 10А</p>
                <p class="contact__email">info@gorod-zagorod.ru</p>
                <a href="tel:+77891234578" class="link contact__phone">+7 (789) 123-45-78</a>
            </div>
        </div>
    </div>

</section>