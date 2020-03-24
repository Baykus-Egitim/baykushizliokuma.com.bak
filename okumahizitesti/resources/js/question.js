ToolMultipleChoiceQuestion = function(container, data, showSolution, className, number){
    var _this = this, $selectedChoice, $choicesBtn, $domObject, $choicesBlock;

    /*
     * */
    function choiceSelected(){
        var choice = $(this);
        var choiceIndex = parseInt(choice.attr('itemindex'));

        if(choiceIndex == parseInt(data.selectedChoiceIndex)){
            choice.removeClass('selected');

            $selectedChoice = null;
            data.selectedChoiceIndex = "";
        }else{
            if($selectedChoice){
                $selectedChoice.removeClass('selected');
            }
            $selectedChoice = choice;

            $selectedChoice.addClass('selected');
            data.selectedChoiceIndex = choiceIndex;
        }

        $(_this).trigger(ToolMultipleChoiceQuestion.CHANGE_CHOICE);
    }

    /*
    * */
    function render(){
        container.append('<div type="'+ Constants.QUESTION_MULTIPLE_CHOICE +'" class="question verbal '+ className +'" id="'+ data.id +'">' +
                             (number ? '<div class="question-number">'+ number +'.</div>' : "") +
                             '<div class="question-text">' +
                                data.questionText +
                             '</div>' +
                             '<div class="choices-block"></div>' +
                         '</div>');

        $domObject = container.children().last();

        $choicesBlock = $('.choices-block', $domObject);

        var n = parseInt(data.metadatas.getAttrItem(Constants.METADATATYPE, Constants.METADATATYPE_QUESTION_SCHOOL_TYPE).value), choicesRow,
                numberOfColumns = data.metadatas.getAttrItem(Constants.METADATATYPE, Constants.METADATATYPE_NUMBER_OF_COLUMNS);

        numberOfColumns = parseInt(numberOfColumns.value);
        for(var i = 0; i < n; i++){
            if(choicesRow == null || choicesRow.children().length == numberOfColumns){
                $choicesBlock.append('<div class="choices-row"></div>');

                choicesRow = $choicesBlock.children().last();
            }
            var cohioceWidth = choicesRow.width() / numberOfColumns;
            choicesRow.append('<div class="choice-block" choice="'+ data.choices[i].type +'" style="width:'+ cohioceWidth +'px">' +
                                  '<div class="decision"></div>' +
                                  '<div class="choice" type="button" value="'+ data.choices[i].type +'" itemindex="'+ i +'">'+
                                      '<span>' +
                                          data.choices[i].type +
                                      '</span>' +
                                  '</div>' +
                                  '<div class="content-block">' + data.choices[i].text + '</div>' +
                              '</div>');

            if(typeof data.selectedChoiceIndex == "number" && data.selectedChoiceIndex == i){
                var row = choicesRow.children().last();

                $selectedChoice = $('.choice', row);
                $selectedChoice.addClass('selected');
            }
        }

        $choicesBtn = $('.choice-block .choice', $choicesBlock);

        if(showSolution != true){
            $choicesBtn.on('click', choiceSelected);
            $choicesBtn.addClass('active');
        }else{
            $domObject.append('<div class="solution-text">' +
                                data.solutionText +
                                '<br></a><span class="answer">Doğru seçenek '+ data.answer +'.</span>' +
                             '</div>');
        }


    }
    /*
     * PUBLIC METHODS
     * */
    _this.checkDecision = function(){
        var currectChoice = $('[choice="'+ data.answer +'"]', $choicesBlock);
        $choicesBtn.off('click');
        $choicesBtn.css('cursor', 'default');
        $choicesBtn.removeClass('active');

        if($selectedChoice){
            var parentChoice = $selectedChoice.parent();

            if($selectedChoice.attr('value') == data.answer){
                $('.decision', parentChoice).addClass('right');
                return Constants.QUESTION_CORRECT;
            }else{
                $('.decision', parentChoice).addClass('wrong');
                $('.decision', currectChoice).addClass('right');
                return Constants.QUESTION_WRONG;
            }
        }
        $('.decision', currectChoice).addClass('right');

        return Constants.QUESTION_EMPTY;
    }
    _this.domObject = function(){
        return $domObject;
    }
    _this.answer = function(){
        return data.answer;
    }
    _this.getUserSelectionValue = function(){
        if($selectedChoice){
            return data.choices[data.selectedChoiceIndex].type;
        }
        return "";
    }
    _this.getUserSelectionIndex = function(){
        return data.selectedChoiceIndex;
    }
    _this.getData = function(){
        return data;
    }
    _this.destructor = function(){
        $domObject.remove();

        $selectedChoice = $choicesBtn = $domObject = $choicesBlock = null;

        delete $choicesBtn;
        delete $domObject;
        delete $choicesBlock;
        delete $selectedChoice;
    }
    render();
}

ToolMultipleChoiceQuestion.CHANGE_CHOICE = "table.question.change.choice";