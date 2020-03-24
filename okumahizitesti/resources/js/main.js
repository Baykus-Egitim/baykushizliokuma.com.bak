/**
 * Created with JetBrains WebStorm.
 * User: sezgin_teke
 * Date: 20.01.2014
 * Time: 02:57
 * To change this template use File | Settings | File Templates.
 * Updated and redesigned: Baybars Bayraktaroglu | 21.05.2019
 */
var Sbt_1 = {};

(function($) {
    $.fn.hasScrollBar = function() {
        return this.get(0).scrollHeight > this.height();
    }
})(jQuery);

$(document).ready(function () {
    _main = new Main();
});

function Main() {
    
    _main = this;
    _main.clickedText;
    _main.selectedclass;
    _main.freeMode = SpeedReadingSettings.myDefault.isFreeMode;
    var questionData = jQuery.extend(true, {}, Constants.JSON.multiplechoicequestion);

    $("div.popup_content_details").remove();
    $('<div class="popup_content_details"></div>').appendTo('.popup_content');

    var newcontent = GenerateDomElement({
        nodeType: "div",
        classNames: ["popup-text-content col-xs-12"],
        attributes: {
            style: "font-size: 22px; color: #000;font-family: Montserrat-Thin;"
        },
        htmlContent: "Baykuş Hızlı Okuma'daki metinler sınıf seviyenize ve yaşınıza uygun olarak hazırlanmaktadır. Okuma hızınızı doğru belirleyebilmek için seviyenizi seçiniz."
    });

    $(newcontent).appendTo('.popup_content_details');


    $('#class-selector-id').off('change');
    $('#class-selector-id').on('change', function () {

        _main.selectedclass = $(this).find("option:selected").attr('value');
        if (_main.selectedclass != "") {
            $("#beginningProtector").hide();
        }

    });

    $('#content').append('<div id = "startButtonContainer"><div class="col-md-12 col-xs-12" id = "startButton">Başlat</div></div>');
    $("#startButton").on("mousedown", _main.startClicked);


    _main.wpm = "1200";
    _main.score = "75";

    $("#startButton").off("mousedown");
    $("#startButton").on("mousedown", _main.startClicked);
}

Main.prototype.startClicked = function () {
    
    var val = _main.selectedclass;

    if(DATA[val]){
        $("#content").empty();
        var readBlock = new ReadText($('#content'), DATA[val]);
        $(readBlock).on("readend", function (e,val){
            _main.wpm=val;
        });
        $(readBlock).on("finishassesment", function (e, val){
            //_main.score = Math.floor(val.trueCount*100/(val.trueCount+val.falseCount));
            for (var i = 0;i<val.answerArray.length;i++){
                if(val.answerArray[i] == 1){
                    _main.score = "100";
                }
                else {
                    _main.score = "0";
                }

                var rapidReadObjectModel = {
                    score: String(_main.score),
                    wpm: String(_main.wpm)
                };
            }
        });
    }

    $("#startButton").off("mousedown");
}
Main.prototype.textPanelOpened = function (e) {
    $('.slideTreeNode').click();
}
Main.prototype.textPanelClosed = function (e) {

}
Main.prototype.textSelected = function (val) {
    _main.clickedText = val;
    SpeedReadingSettings.myDefault.textTitle = val;
    $("#content").empty();

    $("#startButton").off("mousedown");

    $('#content').html('<div id = "startButton">Başlat</div>');
    $("#startButton").on("mousedown", _main.startClicked);
}
Array.prototype.getAttrItem = function(property, val) {
    var i = 0, returnValue;
    for (i = 0; i < this.length; i++) {
        if (this[i][property] === val) {
            returnValue = this[i];
            break;
        }
    }
    return returnValue;
}
