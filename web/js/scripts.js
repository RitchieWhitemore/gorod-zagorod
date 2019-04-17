'use strict'

/* Меню */
const mainMenu = document.querySelector('#main-menu');
const mainMenuButton = document.querySelector('#main-menu-button');

mainMenuButton.addEventListener('click', function (e) {
    mainMenu.classList.toggle('main-menu--active')
});

/* Фильтр */

const buttonFilterToggle = document.querySelector('#button-toggle-filter');
const formSearchElement = document.querySelector('#form-search');

buttonFilterToggle.addEventListener('click', function () {
    formSearchElement.classList.toggle('form-search--open');

    if (formSearchElement.classList.contains('form-search--open')) {
        buttonFilterToggle.innerHTML = 'Закрыть фильтр';
    } else {
        buttonFilterToggle.innerHTML = 'Открыть фильтр';
    }
});



/* переключение вида списка объявлений */
const viewListButton = document.querySelector('#view-list');
const viewTableButton = document.querySelector('#view-table');
const propertyListElement = document.querySelector('#property-list');

if (viewListButton) {
    viewListButton.addEventListener('click', function () {
        viewListButton.classList.add('properties__view-button--list-active');
        viewTableButton.classList.remove('properties__view-button--table-active');

        propertyListElement.classList.add('properties__list--list');
    });

    viewTableButton.addEventListener('click', function () {
        viewTableButton.classList.add('properties__view-button--table-active');
        viewListButton.classList.remove('properties__view-button--list-active');

        propertyListElement.classList.remove('properties__list--list');
    });
}

/* слайдер */

document.querySelector("#paperRangeSliderArea").addEventListener('updateValues', function (customEvent) {
    const minAreaInput = document.querySelector('#minAreaInput');
    const maxAreaInput = document.querySelector('#maxAreaInput');
    const minAreaLabel = document.querySelector('#minAreaLabel');
    const maxAreaLabel = document.querySelector('#maxAreaLabel');

    maxAreaInput.value = this.valueMax;
    minAreaInput.value = this.valueMin;
    maxAreaLabel.innerHTML = this.valueMax + ' м2';
    minAreaLabel.innerHTML = this.valueMin + ' м2';
});

document.querySelector("#paperRangeSliderPrice").addEventListener('updateValues', function (customEvent) {
    const minPriceInput = document.querySelector('#minPriceInput');
    const maxPriceInput = document.querySelector('#maxPriceInput');
    const minPriceLabel = document.querySelector('#minPriceLabel');
    const maxPriceLabel = document.querySelector('#maxPriceLabel');

    maxPriceInput.value = this.valueMax;
    minPriceInput.value = this.valueMin;
    maxPriceLabel.innerHTML = this.valueMax + ' Р';
    minPriceLabel.innerHTML = this.valueMin + ' Р';
});