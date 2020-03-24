/**
 * Created with JetBrains WebStorm.
 * User: sezgin_teke
 * Date: 20.01.2014
 * Time: 07:10
 * To change this template use File | Settings | File Templates.
 */
ReadText = function(_container, data){
    var _this = this, intervalId, totalSecond,
                $domObject, $okBtn, $readTextContainer;

    /*
    * */
    function startTime(){
        totalSecond = 0;
        intervalId = setInterval(function() {
            totalSecond++;
        }, 100);
    }
    /*
     * */
    function stopTime(){
        clearInterval(intervalId);

        var text = $(".read-text").text();
        var textLength = text.split(" ").length;

        var time = Math.floor(totalSecond/10);

        if (time == 0) time = 1;

        var wpm = Math.floor((60*textLength)/time);


        var windowReport = new WindowReport(wpm);
        $(windowReport).on(WindowReport.EVENT_WINDOW_CLOSE, windowReportClose);
        $(_this).trigger("readend", wpm);
    }
    /*
    * */
    function windowReportClose(){
        _this.destructor();

        var question = new QuestionTest(data.question, $('#content'));

        $(question).on("checkclicked",function (e,val){
            $(_this).trigger("finishassesment",[val]);
        });

    }
     /*
    * */
    function init(){
        _container.append('<div class="read-text-container col-xs-12">' +
                            '<div class="read-text">' +
                                data.text +
                            '</div>' +
                            '<div class="navigation-bar">' +
                                '<span class="ok-btn"></span>'+
                            '</div>' +
							'</div>' +
                          '</div>');

        $domObject = _container.children().last();

        $okBtn = $('.ok-btn', $domObject);

        $readTextContainer = $('.read-text');

        startTime();

        if($readTextContainer.hasScrollBar()){
            $okBtn.addClass('passive');
            $readTextContainer.scroll(function(){

                if ($(this).scrollTop() > 1) {
                    $okBtn.removeClass('passive');
                    $okBtn.off('click');
                    $okBtn.on('click', stopTime);
                }// else {
                //    $okBtn.addClass('passive');
                //    $okBtn.off('click', stopTime);
                //}
            });
        }
        else{
            $okBtn.removeClass('passive');
            $okBtn.off('click');
            $okBtn.on('click', stopTime);
        }
    }
    /*
    *
    * */
    _this.destructor = function(){
        $domObject.remove();

        $domObject = $okBtn = null;

        delete $domObject;
        delete $okBtn;
    }

    init();
 }