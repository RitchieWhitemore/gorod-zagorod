import {PolymerElement, html} from "../../../node_modules/@polymer/polymer/polymer-element.js";
import '../../../node_modules/@polymer/iron-ajax/iron-ajax.js';
import '../../../node_modules/@polymer/polymer/lib/elements/dom-repeat.js';

class SearchLocation extends PolymerElement {
    static get template() {
        return html`
      <style>
         .list-names {
         margin: 0;
         padding: 0;
         
            display: none;
            position: absolute;
            
            list-style: none;
            
            background: white;
            z-index: 99;
         }
         
         .list-names--active {
            display: block;
         }
         
         .list-names li {
            color: black;
            padding: 10px;
            cursor: pointer;
         }
         
         
      </style>
      <slot></slot>
      <ul id="listLocations" class="list-names">
      <template is="dom-repeat" items="{{locations}}">
        <li on-click="selectLocation">{{item.name}}</li>
      </template>
        </ul>
      
      <iron-ajax id="ajax"
                    auto
                   url="/api/locations"                                 
                   handle-as="json"
                   on-response="handleResponse"
                   last-response="{{response}}"
                   ></iron-ajax>
        `;
    }

    static get properties() {
        return {
            locations: {type: Array, value: []}
        }
    }

    constructor() {
        super();
    }

    handleResponse() {

        if (this.$.ajax.params.name) {
            this.$.listLocations.classList.add('list-names--active');
            this.locations = this.response;
            console.log(this.response);
        } else {
            this.$.listLocations.classList.remove('list-names--active');
        }
    }

    keypressInput(evt) {
        this.$.ajax.params = {'name': evt.currentTarget.value}
    }

    ready() {
        super.ready();

        const inputElement = this.querySelector('input');
        inputElement.addEventListener('keyup', this.keypressInput.bind(this));

        this.$.listLocations.style.width = inputElement.offsetWidth + 'px';

        const button = document.querySelector('#button-toggle-filter');

        if (button) {
            button.addEventListener('click', function () {
                this.$.listLocations.style.width = inputElement.offsetWidth + 'px';
            }.bind(this))
        }
    }

    selectLocation(evt) {

        const inputElement = this.querySelector('input');

        if (inputElement) {
            inputElement.value = evt.currentTarget.textContent;
            this.$.listLocations.classList.remove('list-names--active');
        }

    }

}

customElements.define('search-location', SearchLocation);