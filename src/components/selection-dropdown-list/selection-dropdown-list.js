import {PolymerElement, html} from "../../../node_modules/@polymer/polymer/polymer-element.js";


class SelectionDropdownList extends PolymerElement {
    static get template() {
        return html`
      <style>
      
      </style>
      <slot></slot>
        `;
    }

    static get properties() {
        return {
            type: String,
        }
    }

    constructor() {
        super();
    }

    ready() {
        super.ready();

        const selectElement = this.querySelector('select');

        if (this.type == 'sort') {
            selectElement.addEventListener('change', this.sortedSelected.bind(this));
        } else {
            selectElement.addEventListener('change', this.quantitySelected.bind(this));
        }


    }

    parseQueryString(queryString) {
        const params = {};

        let queries, temp;

        queryString = queryString.substring(1);
        if (queryString) {
            queries = queryString.split("&");

            for (let i = 0; i < queries.length; i++ ) {
                temp = queries[i].split('=');
                params[temp[0]] = temp[1];
            }
        }

        return params
    };

    paramsToString(params) {
        let paramsString = '';
        let counter = 0;
        for (let key in params) {
            counter++;
            paramsString += key + '=' + params[key];

            if (Object.keys(params).length > counter) {
                paramsString += '&';
            }
        }

        return paramsString;
    }

    quantitySelected(evt) {
        const value = evt.currentTarget.selectedOptions[0].value;

        const params = this.parseQueryString(location.search);

        params['page-size'] = value;

        window.location.href = '/adverts?' + this.paramsToString(params);
    };

    sortedSelected(evt) {
        const value = evt.currentTarget.selectedOptions[0].dataset.sort;

        const params = this.parseQueryString(location.search);

        params['sort'] = value;

        window.location.href = '/adverts?' + this.paramsToString(params);
    }
}

customElements.define('selection-dropdown-list', SelectionDropdownList);