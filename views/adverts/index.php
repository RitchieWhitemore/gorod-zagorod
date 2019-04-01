<?php
/* @var $this yii\web\View */

$this->params['h1'] = 'Поиск недвижимости';
?>

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
<section class="properties container">
    <header class="properties__header">
        <h2 class="properties__title">Найдено 156789 предложений по запросу:<br> <span class="properties__request">"Купить квартиру в Александрове"</span></h2>
        <div class="properties__view-wrapper">
            <button id="view-list" class="properties__view-button properties__view-button--list">Список</button>
            <button id="view-table" class="properties__view-button properties__view-button--table properties__view-button--table-active">Таблица</button>
        </div>
    </header>
    <div class="properties__control-wrapper">
        <div class="properties__select-wrapper">Упорядочены
            <select class="properties__select">
                <option>от новых к старым</option>
                <option>от старых к новым</option>
            </select>
        </div>
        <div class="properties__select-wrapper">Отображать по
            <select class="properties__select">
                <option>15</option>
                <option>30</option>
                <option>60</option>
                <option>100</option>
            </select>
        </div>
    </div>

    <div id="property-list" class="properties__list">
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
    <div class="properties__pagination pagination">
        <ul class="pagination__list">
            <li class="pagination__item pagination__item--disabled"><span>Назад</span></li>
            <li class="pagination__item pagination__item--active"><a href="#" class="link pagination__link">1</a></li>
            <li class="pagination__item"><a href="#" class="link pagination__link">2</a></li>
            <li class="pagination__item"><a href="#" class="link pagination__link">3</a></li>
            <li class="pagination__item"><a href="#" class="link pagination__link">4</a></li>
            <li class="pagination__item"><a href="#" class="link pagination__link">Вперед</a></li>
        </ul>
    </div>
</section>