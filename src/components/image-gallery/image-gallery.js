import {PolymerElement, html} from "../../../node_modules/@polymer/polymer/polymer-element.js";
import '../../../node_modules/@polymer/polymer/lib/elements/dom-repeat.js';
import '../../../node_modules/@polymer/iron-ajax/iron-ajax.js';

class ImageGallery extends PolymerElement {
    static get template() {
        return html`
            <link rel="stylesheet" href="/css/style.min.css">
           <style>
          
           </style>
           <slot>
           
               

           </slot>
                <div class="page-property__image-gallery image-gallery">
                    <div class="image-gallery__main-image">
                        <img id="currentImage" src="{{thumbnailsUrl}}">
                        <span class="image-gallery__label image-gallery__label--buy">{{typeAdvert}}</span>
                        <div class="image-gallery__control">
                            <button type="button" class="image-gallery__button image-gallery__button--prev" on-click="prevImage"></button>
                            <button type="button" class="image-gallery__button image-gallery__button--next" on-click="nextImage"></button>
                        </div>
                    </div>
                   
                    <ul class="image-gallery__list" slot="images-preview">
                        <template id="domRepeat" is="dom-repeat" items="{{images}}">
                            <li id="preview" class$="image-gallery__item [[setStyleActive(index)]]" on-click="selectImage" data-index$="[[index]]"><img src="/images/adverts/{{ownerId}}/{{item.file_name}}"></li>
                        </template>
                    </ul>
                </div>
           <iron-ajax id="ajax"
                       auto
                       url="/api/advert/{{ownerId}}?expand=images"
                       handle-as="json"
                       on-response="handleResponse"
                       last-response="{{response}}"
                       debounce-duration="300"></iron-ajax>
        `;
    }

    static get properties() {
        return {
            currentIndexImage: {type: Number, value: 0, observer: '_changeCurrentImage'},
            ownerId: Number,
            thumbnailsUrl: String,
            typeAdvert: String,
            images: {type: Array, value: []}
        }
    }

    _changeCurrentImage() {
        this.$.currentImage.src = '/images/adverts/' + this.ownerId + '/' + this.images[this.currentIndexImage].file_name;
    }

    constructor() {
        super();
    }

    handleResponse() {
        this.images = this.response[0].images;
    }

    nextImage() {
        if (this.currentIndexImage < this.images.length-1) {
            this.currentIndexImage++;
        } else {
            this.currentIndexImage = 0;
        }

        this.unActivePreview();
        this.setActivePreview();
    }

    prevImage() {
        if (this.currentIndexImage > 0) {
            this.currentIndexImage--;
        } else {
            this.currentIndexImage = this.images.length-1;
        }

        this.unActivePreview();
        this.setActivePreview();

    }

    setStyleActive(index) {
        if (index == 0) {
            return 'image-gallery__item--active';
        }
    }

    selectImage(evt) {
        const currentTarget = evt.currentTarget;
        this.currentIndexImage = currentTarget.dataset.index;

        this.unActivePreview();
        this.setActivePreview();
    }

    unActivePreview() {
        const currentActivePreview = this.shadowRoot.querySelector('.image-gallery__item--active');
        currentActivePreview.classList.remove('image-gallery__item--active');
    }

    setActivePreview() {
        const currentActivePreview = this.shadowRoot.querySelector('.image-gallery__item[data-index="' + this.currentIndexImage + '"]');
        currentActivePreview.classList.add('image-gallery__item--active');
    }
}

customElements.define('image-gallery', ImageGallery);