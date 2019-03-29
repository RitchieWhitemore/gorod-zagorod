import {PolymerElement, html} from '../../../node_modules/@polymer/polymer/polymer-element.js';


class UploadButton extends PolymerElement {
    static get template() {
        return html`
            
          <style>
            :host {
                    margin-bottom: 40px;
                    display: inline-block;
                    position: relative;
                    box-sizing: border-box;
            }
    
            :host input {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    z-index: 1;
                    opacity: 0;
                    cursor: pointer;
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
          <button type="button" id="add-image" class="btn">Добавить фото</button>
          <input type="file" name="Image[imageFile]" on-change="addImage" accept=".jpg, .jpeg, .png" multiple>
        `;
    }

    constructor() {
        super();
    }

    addImage(e) {
        if (this.parent) {
            const fileList = e.target.files;

            this.parent.addItems(fileList);
        }
    }

    searchInArray(arr, item) {
        for (let j = 0; j < arr.length; j++) {
            if (arr[j].name === item.name) {
                return false;
            }
        }
        return true;
    }
}

customElements.define('upload-button', UploadButton);