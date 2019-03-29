import {PolymerElement, html} from "../../../node_modules/@polymer/polymer/polymer-element.js";
import '../../../node_modules/@polymer/polymer/lib/elements/dom-repeat.js';
import '../../../node_modules/@polymer/iron-ajax/iron-ajax.js';
import '../upload-button/upload-button.js';
import './image-item.js';

class ImageList extends PolymerElement {
    static get template() {
        return html`
      <style>
      :host .hidden {
        display: none;
      }
      .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: normal;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
      }
      </style>
      <iron-ajax id="ajax"
                
                   url="/api/advert/{{ownerId}}?expand=images"
                   handle-as="json"
                   on-response="handleResponse"
                   last-response="{{response}}"
                   debounce-duration="300"></iron-ajax>
        <h2>Уже загруженые фотографии</h2>
        <upload-button parent="[[getThis()]]"></upload-button>
        <div id="old-images" class="list">

            <template is="dom-repeat" items="{{resp}}">
                <image-item owner-id="{{item.advert_id}}" index="{{index}}"
                            file-name="{{item.file_name}}" image-id="{{item.id}}" main="{{item.main}}">

                </image-item>
            </template>

        </div>
        <hr>
      
      <div id="new-list" class="list">
            <template id="domRepeat" is="dom-repeat" items="{{images}}">
                <image-item owner-id="{{item.advert_id}}" src="{{item.src}}" index="{{index}}"
                            file-name="{{item.name}}">

                </image-item>
            </template>
        </div>
        <button id="buttonSave" type="submit" on-click="upload" class="btn btn-success hidden">Загрузить фото</button>
        `;
    }

    static get properties() {
        return {
            ownerId: Number,
            images: {value: [], type: Array},
            resp: Array,
        }
    }

    constructor() {
        super();

  /*      const buttonSave = document.querySelector('#buttonSave');
        buttonSave.addEventListener('click', this.save.bind(this));*/
    }

     handleResponse() {
         this.resp = [];
         this.$.domRepeat.render();
         this.resp = this.response[0].images;

     }

     getThis() {
        return this;
     }

    addItems(files) {

        const postLoad = function(item, event) {
            item.ownerId = this.ownerId;
            item.src = event.currentTarget.result;

            this.push('images', item);

            if (this.images.length > 0) {
                this.$.buttonSave.classList.remove('hidden');
            }

        };

        Array.from(files).forEach(function(item) {
            if (!this.searchInArray(this.images, item)) {
                const reader = new FileReader();
                reader.addEventListener('load', postLoad.bind(this, item));
                reader.readAsDataURL(item);
            }
        }.bind(this));

    }

    ready() {
        super.ready();

        if (this.ownerId) {
            this.$.ajax.generateRequest();
        }
    }

    removeNewItem(index) {
        this.splice('images', index, 1);
        if (this.images.length == 0) {
            this.$.buttonSave.classList.add('hidden');
        }
    }

    save(evt) {
        evt.preventDefault();
        if (!this.ownerId) {

            const formData = new FormData(document.querySelector('#w0'));
           // formData.delete('_csrf');
            formData.append('location_id')

            const xhr = new XMLHttpRequest();

            xhr.onloadend = function() {
                //this.upload();
            }.bind(this);

            xhr.open("POST", "/api/adverts");
            xhr.send(formData);

        } else {
            this.upload();
        }


    }


    searchInArray(arr, item) {
        for (let j = 0; j < arr.length; j++) {
            if (arr[j].name == item.name) {
                return true;
            }
        }
        return false;
    }

    upload(e) {
        e.preventDefault();

        if (this.images.length > 0) {
            this.images.forEach(function(item) {
                const formData = new FormData();
                formData.append("advert_id", this.ownerId);
                formData.append("Image[imageFile]", item);

                const xhr = new XMLHttpRequest();

                xhr.onloadend = function() {
                    this.images = [];
                    this.$.buttonSave.classList.add('hidden');

                    setTimeout(function() {
                        this.$.ajax.generateRequest();
                    }.bind(this), 1000);
                }.bind(this);

                xhr.open("POST", "/api/images");
                xhr.send(formData);

            }.bind(this))
        }
    }
}

customElements.define('image-list', ImageList);