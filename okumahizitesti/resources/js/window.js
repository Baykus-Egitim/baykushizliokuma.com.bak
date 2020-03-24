/**
 * Created with JetBrains WebStorm.
 * User: sezgin_teke
 * Date: 21.01.2014
 * Time: 05:30
 * To change this template use File | Settings | File Templates.
 */
WindowReport = function(readSpeed, levelOfComprehension){
    var _this = this,
                $domObject, $body = $('body'), $content, $closeBtn, $glassBackground, $okBtn, $continueBtn, $readTimer, $successRate;

    /*
    * */
    function windowCloseBtnClickHandler(){
        _this.destructor();

        $(_this).trigger(WindowReport.EVENT_WINDOW_CLOSE);
    }
     /*
    * */
    function init(){
        /*$body.append('<div class="window-glass"></div>' +
                     '<div class="windowbackground metadata">' +
                         '<div class="header">' +
                             '<span class="title">RAPOR</span>' +
                             '</span>' +
                         '</div>' +
                         '<div class="content">' +
                         '</div>' +
                        '<div class="continueButton"></div>' +
                     '</div>');

        $domObject = $('.windowbackground.metadata', $body);
        $content = $('.content', $domObject);
        $closeBtn = $('.close-btn', $domObject);
        $glassBackground = $('.window-glass', $body);
        $continueBtn = $('.continueButton', $body);

        $continueBtn.on('click', windowCloseBtnClickHandler);*/
        if(readSpeed){

            $body.append('<div class="window-glass"></div>' +
                '<div class="windowbackground metadata">' +
                '<div class="header">' +
                '<span class="title"></span>' +
                '</span>' +
                '</div>' +
                '<div class="content">' +
                '</div>' +
                '<div class="continueButton">DEVAM</div>' +
                '</div>');

            $domObject = $('.windowbackground.metadata', $body);
            $content = $('.content', $domObject);
            $closeBtn = $('.close-btn', $domObject);
            $glassBackground = $('.window-glass', $body);
            $continueBtn = $('.continueButton', $body);
            $continueBtn.on('click', windowCloseBtnClickHandler);

            $content.append('<div class="report-block">' +
                                '<span class="report-title">Okuma Hızınız</span>' +
                                '<span class="report-content">Dakikada ' + readSpeed + ' Kelime</span>' +
                                '<span class="report-text">Şimdi de Anlama Oranınızı Belirleyelim...</span>' +
                            '</div>');

            $domObject.addClass('speedread');
        }

        if(levelOfComprehension != undefined){

            $body.append('<div class="window-glass"></div>' +
                '<div class="windowbackground metadata">' +
                '<div class="header">' +
                '<span class="title"></span>' +
                '<span class="close-btn" action="close">' +
                '</span>' +
                '</div>' +
                '<div class="content">' +
                '</div>' +
                '</div>');

            $domObject = $('.windowbackground.metadata', $body);
            $content = $('.content', $domObject);
            $closeBtn = $('.close-btn', $domObject);
            $glassBackground = $('.window-glass', $body);
            $okBtn = $('.ok-btn', $body);
            $okBtn.on('click', windowCloseBtnClickHandler);

            $closeBtn.on('click', windowCloseBtnClickHandler);


            $content.append('<div class="report-block">' +
                                '<span class="report-title">Anlama Düzeyiniz;</span>' +
                                '<span class="report-content">% '+ levelOfComprehension +'</span>' +
                            '</div>');

            $content.append('<div class ="banner_container">' +
                                '<div class="speedtest-text">Peki Bu Hızda ve Anlama Oranında Yılda Kaç Kitap Okursun?</div>' +
                                '<div class="purchase_button">Hızını Gör!</div> ' +
                            '</div>');

            $readTimer = _main.wpm;
            $successRate = levelOfComprehension;

            var $readTimerLimit = 800;
            var $successRateLimit = 90;

            if ($readTimer<$readTimerLimit && $successRate<$successRateLimit){
                //$(".banner_container").css("background","url(resources/img/banner_04.png)");
            }
            else if ($readTimer<$readTimerLimit && $successRate>$successRateLimit){
                //$(".banner_container").css("background","url(resources/img/banner_02.png)");
            }
            else if ($readTimer>$readTimerLimit && $successRate<$successRateLimit){
                //$(".banner_container").css("background","url(resources/img/banner_03.png)");
            }
            else if ($readTimer>$readTimerLimit && $successRate>$successRateLimit){
                //$(".banner_container").css("background","url(resources/img/banner_01.png)");
            }

            $domObject.addClass('level-of-comprehension');

            $domObject.css("height","290px");
            //$domObject.css("margin-top","-115px");

            /*$(".main_page_button").on('click', function (){
                log("1");
            });*/
            $(".purchase_button").on('click', function (){
                // Tunç Baybars

                //$(_this).trigger("speedtestend", _main.wpm);
                window.top.popUpManager.closeSpeedtestPopup(_main.wpm);
            });
        }
    }
    /*
    * PUBLIC METHODS
    * */
    _this.destructor = function(){
        $domObject.remove();
        $glassBackground.remove();

        $glassBackground = $domObject = $body = $content = $closeBtn = null;

        delete $domObject;
        delete $body;
        delete $content;
        delete $closeBtn;
        delete $glassBackground;
    }
     init()
}

WindowReport.EVENT_WINDOW_CLOSE = "window.report.close";