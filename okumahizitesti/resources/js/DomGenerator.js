/***
 * Creates and Returns a Dom object with sended parameters
 * @param domDescription XHRDom Node Properties
 * @return {HTMLElement}
 * @constructor
 */
GenerateDomElement = function (domDescription) {

    /*
     * domDescription DEMO OBJECT*/
    /*domDescription = {
     nodeType:"div",
     classNames:["class1","class2"],
     attributes:{attr1:"val1",
     attr2:"val2"},
     htmlContent:"",
     id:"sampleID"
     };*/

    /**
     * Created dom element
     * @type {HTMLElement}
     * @private
     */
    var _dom = document.createElement(domDescription.nodeType);

    /***
     * Add ClassNames to dom seperately
     */
    if (typeof domDescription.classNames != "undefined") {
        if(typeof domDescription.classNames == "string"){
            _dom.className = domDescription.classNames;
        }
        else{
            for (var i = 0; i < domDescription.classNames.length; i++) {
                _dom.className += domDescription.classNames[i];
                if (i + 1 != domDescription.classNames.length) {
                    _dom.className += ' ';
                }
            }
        }
    }

    /***
     * Set id of dom item
     */
    if (typeof domDescription.id != "undefined") {
        _dom.id = domDescription.id;
    }

    /***
     * Add attributes to dom if there is any
     */
    if (typeof domDescription.attributes != "undefined") {
        for (var key in domDescription.attributes) {
            _dom.setAttribute(key, domDescription.attributes[key]);
        }
    }

    /***
     * Set html content of item
     */
    if (domDescription.htmlContent != null || domDescription.htmlContent != undefined) {
        _dom.innerHTML = domDescription.htmlContent.toString();
    }/*
    else{
        _dom.innerHTML = "";
    }*/

    /*
     * return dom element*/
    return _dom;
}