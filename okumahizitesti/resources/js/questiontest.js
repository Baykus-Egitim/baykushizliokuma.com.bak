/**
 * Created with JetBrains WebStorm.
 * User: sezgin_teke
 * Date: 20.01.2014
 * Time: 04:52
 * To change this template use File | Settings | File Templates.
 */
QuestionTest = function(_list, _container){
    var _this = this,
        $domObject,
        questionList = [], questionCount,
        $checkButton, $questionContainer,totalSecond,intervalId,correctCount,wrongCount,answerArray = [];

    /*
     *
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
        var windowReport = new WindowReport(0, Math.floor(correctCount*100/(correctCount+wrongCount)));
        $(windowReport).on(WindowReport.EVENT_WINDOW_CLOSE, windowReportClose);
    }


     function checkBtnClickHandler(){
        correctCount = 0; wrongCount = 0;
         answerArray = [];
        for(var i = 0; i < questionCount; i++){
            var question = questionList[i];
            var decision = question.checkDecision();
            switch(decision){
                case Constants.QUESTION_CORRECT:
                    correctCount++;
                    answerArray.push(1);
                    break;
                case Constants.QUESTION_WRONG:
                    wrongCount++;
                    answerArray.push(0);
                    break;
            }
        }
        $(_this).trigger("checkclicked", [{trueCount:correctCount, falseCount:wrongCount, answerArray:answerArray}]);

        checkBtnPassive();

        stopTime();
    }
    /*
     * */
    function windowReportClose(){

    }
    /*
     *
     * */
    function changeQuestionSelection(){
        var checkButtonActive = true;
        for(var i = 0; i < questionCount; i++){
            var question = questionList[i];
            if(question.getUserSelectionValue() == ""){
                checkButtonActive = false;
                break;
            }
        }

        if(!checkButtonActive){
            checkBtnPassive();
        }else{
            checkBtnActive();
        }
    }
    /*
    *
    * */
    function checkBtnActive(){
        $checkButton.on('click', checkBtnClickHandler);
        $checkButton.removeClass('passive')
    }
    /*
     *
     * */
    function checkBtnPassive(){
        $checkButton.off('click', checkBtnClickHandler);
        $checkButton.addClass('passive')
    }
    /*
    *
    * */
    function createQuestions(){
        for(var i = 0; i < questionCount; i++){
            var questionData = _list[i];
            var question = new ToolMultipleChoiceQuestion($questionContainer, questionData, false, 'test has-number', i + 1);
            $(question).on(ToolMultipleChoiceQuestion.CHANGE_CHOICE, changeQuestionSelection);

            questionList.push(question);
        }
    }
    /*
     *
     * */
    function init(){
        _container.append('<div class="question-test">' +
                            '<div class="question-test-header">Test</div>' +
                            '<div class="test-question-container"></div>' +
                            '<div class="navigation-bar">' +
                                '<span class="check-btn passive">KONTROL ET</span>'+
                            '</div>' +
                          '</div>');

        $domObject = _container.children().last();

        $checkButton = $('.check-btn', $domObject);
        $questionContainer = $('.test-question-container', $domObject);



        questionCount = _list.length;

        startTime();

        createQuestions()
    }
    /*
     * PUBLIC METHODS
     * */
    _this.destructor = function(){
        $domObject.remove();

        questionList = questionCount = $checkButton = $questionContainer = null;

        delete questionList;
        delete questionCount;
        delete $checkButton;
        delete $questionContainer;
    }

    init();
}