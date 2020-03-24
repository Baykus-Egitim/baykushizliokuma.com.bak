/**
 * User: dogus_atasoy
 * Date: 27.11.2013
 * Time: 10:58
 */

/***
 * Gives all the innermost objects id's as a comma seperated string
 * @param _schilds (childNode container object name)
 * @param _sid (id attribute name)
 */
var getInnerMostNodeIDs = function (__array, _schilds, _sid) {
    var schilds = (_schilds!=undefined)? _schilds : "childNodes";
    var sid = (_sid!=undefined)?_sid:"id";
    var _returnString = "";
    function recurseInside(_arr){
        var _rtrn = "";
        for(var i=0;i<_arr.length;i++){
            if(_arr[i][schilds] == undefined || _arr[i][schilds].length == 0){
                _rtrn += "," + _arr[i][sid];
            }
            else{
                _rtrn += recurseInside(_arr[i][schilds]);
            }
        }
        return _rtrn;
    }
    _returnString = (recurseInside(__array)).replace(",","");
    return _returnString;
}

