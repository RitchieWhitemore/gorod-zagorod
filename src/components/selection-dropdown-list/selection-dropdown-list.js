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
        return {}
    }

    constructor() {
        super();
    }

    ready() {
        super.ready();

        const selectElement = this.querySelector('select');

        selectElement.addEventListener('change', this.quantitySelected.bind(this));
    }

    parseQueryString(queryString) {
        const params = {};

        let queries, temp;

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
        console.log(window.location.search);

        let search = location.search.substring(1);
        const params = this.parseQueryString(search);

        params['size-page'] = value;

        window.location.href = '/adverts?' + this.paramsToString(params);
    };
}

customElements.define('selection-dropdown-list', SelectionDropdownList);