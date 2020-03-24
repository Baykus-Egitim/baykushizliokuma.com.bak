/**
 * User: dogus_atasoy
 * Date: 07.08.2013
 * Time: 10:36
 */

/***
 * Replaces {0}{1}...{n} substitude items according to arguments in order
 * Uses regex for change all substitude items with same value.
 * For ex: replaces all {1} occurences in the string with arguments[1]
 * @return {String: Given string with replaced substitudes}
 */
String.prototype.substitute = function(){
    var _this = this;
    for(var i=0;i<arguments.length;i++){
        _this = _this.replace(new RegExp("\\{" + i + "\\}","g"),arguments[i].toString());
    }
    return _this;
}

/***
 * Crops the given string object by given length and returns a new string
 * by adding three dots to end or clear end according to given credentials
 * @param maxLength (Last characters position or string length)
 * @param dontUseSuffix (Do not use three dots at the end of the string, Default is false, and drops these 3 dot characters from given length... Length keeps its total value)
 * @return {String: Cropped string}
 */
String.prototype.truncate = function (maxLength, dontUseSuffix) {
    var _this = this;
    dontUseSuffix = dontUseSuffix || false;
    if (_this.length > maxLength) {
        if(dontUseSuffix){
            return _this.substring(0, maxLength);
        }

        return (_this.substring(0, maxLength - 3) + "...");
    }
    else if(maxLength<=0){
        return "";
    }
    else {
        return _this.toString();
    }
}


function getLocaleString(_o){
    if(localeStrings[_o.toString()]!=null && localeStrings[_o.toString()]!=undefined){
        return localeStrings[_o.toString()];
    }
    else{
        return _o.toString();
    }
}