<?php
/* @var $this yii\web\View */

$this->params['h1'] = 'Объявление';
?>

<?= \app\widgets\Filter::widget()?>
<section class="page-property container">
    <div class="page-property__content-wrapper">
        <div class="page-property__content">
            <div class="page-property__image-gallery image-gallery">
                <div class="image-gallery__main-image">
                    <img src="images/property1.jpg">
                    <span class="image-gallery__label image-gallery__label--buy">Продается</span>
                    <div class="image-gallery__control">
                        <button type="button" class="image-gallery__button image-gallery__button--prev"></button>
                        <button type="button" class="image-gallery__button image-gallery__button--next"></button>
                    </div>
                </div>
                <ul class="image-gallery__list">
                    <li class="image-gallery__item image-gallery__item--active"><img src="images/property1.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property2.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property3.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property1.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property2.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property3.jpg"></li>
                </ul>
            </div>
            <h2 class="page-property__title">3-комнатная квартира, 99 м2</h2>
            <div class="page-property__row">
                <p class="page-property__address">г. Александров, ул. Ленина, д. 20, кв. 50</p>
                <span class="page-property__price">1 200 000 Р</span>
            </div>

            <table class="page-property__table">
                <thead>
                <tr>
                    <th>
                        Общая
                    </th>
                    <th>
                        Жилая
                    </th>
                    <th>
                        Кухня
                    </th>
                    <th>
                        Этаж
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        99 м2
                    </td>
                    <td>
                        52 м2
                    </td>
                    <td>
                        15 м2
                    </td>
                    <td>
                        5 из 6
                    </td>
                </tr>
                </tbody>
            </table>
            <p class="page-property__description">
                Арт. 5474116. Улица Варваринский проезд, 3-х комнатная квартира в двух уровнях. Все комнаты изолированы,
                хороший ремонт. Индивидуальная планировка, теплые полы, встроенная мебель, два санузла, кондиционеры,
                южная сторона, вид на центр города. Очень удобное месторасположение, вторая линия от дороги, закрытый
                двор. Рядом гимназия, городской парк, рынок, до центра 2 остановки.
            </p>
        </div>

        <div class="page-property__map">
            <iframe src="https://yandex.ru/map-widget/v1/-/CCUTF8ZY" frameborder="0"
                    allowfullscreen="true"></iframe>
        </div>
        <div class="page-property__content">
            <p>Позвонить нам <a href="" class="link page-property__link">+7 (456) 456-78-89</a></p>
        </div>

    </div>
    <section class="page-property__module module container">
        <h2 class="module__title">Похожие объявления</h2>
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
    <aside class="page-property__aside">
        <section class="category-nav">
            <h3 class="category-nav__title">Категории</h3>
            <ul class="category-nav__list">
                <li class="category-nav__item">
                    <a href="properties.html" class="link category-nav__link">
                        <span class="category-nav__name">Комната</span>
                        <span class="category-nav__qty">(20)</span>
                    </a>
                </li>
                <li class="category-nav__item">
                    <a href="properties.html" class="link category-nav__link">
                        <span class="category-nav__name">1-комнатная квартира</span>
                        <span class="category-nav__qty">(120)</span>
                    </a>
                </li>
                <li class="category-nav__item">
                    <a href="properties.html" class="link category-nav__link">
                        <span class="category-nav__name">2-комнатная квартира</span>
                        <span class="category-nav__qty">(200)</span>
                    </a>
                </li>
                <li class="category-nav__item">
                    <a href="properties.html" class="link category-nav__link">
                        <span class="category-nav__name">3-комнатная квартира</span>
                        <span class="category-nav__qty">(55)</span>
                    </a>
                </li>
                <li class="category-nav__item">
                    <a href="properties.html" class="link category-nav__link">
                        <span class="category-nav__name">Дом</span>
                        <span class="category-nav__qty">(60)</span>
                    </a>
                </li>
            </ul>
        </section>
    </aside>
</section>