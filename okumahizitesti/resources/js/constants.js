Constants = function(){}

Constants.QUESTION_EMPTY    = "empty";
Constants.QUESTION_WRONG    = "wrong";
Constants.QUESTION_CORRECT  = "right";

Constants.QUESTION_MULTIPLE_CHOICE = "multiplechoice"

Constants.METADATATYPE = "metadataType";
Constants.METADATATYPE_CODE = "code";
Constants.METADATATYPE_EVENT_TYPE = "eventtype";
Constants.METADATATYPE_CLASSROOM = "classroom";
Constants.METADATATYPE_COURSE = "course";
Constants.METADATATYPE_DESCRIPTION = "description";
Constants.METADATATYPE_DISPLAYNAME = "displayname";
Constants.METADATATYPE_EVENT_TITLE = "eventtitle";
Constants.METADATATYPE_TOP_TITLE = "toptitle";
Constants.METADATATYPE_KINDER_GARDEN = "kindergarden";
Constants.METADATATYPE_TITLE_TYPE = "titletype";
Constants.METADATATYPE_MATERYAL = "materyal";
Constants.METADATATYPE_SEARCH_KEYWORDS = "searchkeywords";
Constants.METADATATYPE_NUMBER_OF_COLUMNS = "numberofcolumns";
Constants.METADATATYPE_SIZE = "size";
Constants.METADATATYPE_FULL_SCREEN_SIZE = "fullScreenSize";
Constants.METADATATYPE_FULL_SCREEN = "fullScreen";
Constants.METADATATYPE_SHOW_THUMB_ICON = "showThumbIcon";
Constants.METADATATYPE_SHOW_THUMB = "showThumb";
Constants.METADATATYPE_EXAM_TITLE = "examTitle";
Constants.METADATATYPE_EXAM_COVER_LETTER = "examCoverLetter";
Constants.METADATATYPE_EXAM_TYPE = "examType";
Constants.METADATATYPE_EXAM_STATE = "examState";
Constants.METADATATYPE_EXAM_TEACHER_SPECIAL = "examTeacherSpecial";
Constants.METADATATYPE_QUESTION_SCHOOL_TYPE = "questionSchoolType";
Constants.METADATATYPE_QUESTION_TYPE = "questionType";
Constants.METADATATYPE_QUESTION_DIFFUCULTY = "questionDifficulty";
Constants.METADATATYPE_QUESTION_RECOMMENDED_TIME = "questionRecommendedTime";
Constants.METADATATYPE_LANGUAGE = "language";
Constants.METADATATYPE_ACTIVE = "active";
Constants.METADATATYPE_QUESTION_LEVEL = "questionLevel";

Constants.SELECTION_TYPE_COMBOBOX       = "combobox";
Constants.SELECTION_TYPE_INPUT          = "input";
Constants.SELECTION_TYPE_DATE_RANGE     = "daterange";

Constants.JSON = {
                    schooltype : [
                                    {"value":"4", "text" : "İlköğretim"},
                                    {"value":"5", "text" : "Lise"}
                                 ],
                    multiplechoicequestion : {
                        "type": Constants.QUESTION_MULTIPLE_CHOICE,
                        "id":"",
                        "questionText" : "Question Text",
                        "solutionText": "Solution Text",
                        "htmlString" : "",
                        "choices" : [
                            { "type" : "A", "text" : "choice A" },
                            { "type" : "B", "text" : "choice B" },
                            { "type" : "C", "text" : "choice C" },
                            { "type" : "D", "text" : "choice D" },
                            { "type" : "E", "text" : "choice E" }
                        ],
                        "answer" : "",
                        "columnType" : "",
                        "widgets" : [],
                        "images" : [],
                        "objectives" : [],
                        "qtiXML" : "",
                        "data" : "",
                        "metadatas" : [
                            { "metadataType" : Constants.METADATATYPE_CODE, "title": "Code","value" :"", "selectiontype" :Constants.SELECTION_TYPE_INPUT},
                            { "metadataType" : Constants.METADATATYPE_NUMBER_OF_COLUMNS, "title": "Number of Columns", "value" :"1", "selectiontype" : Constants.SELECTION_TYPE_COMBOBOX, "sourcetype" : "columns"},
                            { "metadataType" : Constants.METADATATYPE_QUESTION_SCHOOL_TYPE, "title": "School Type", "value" :"5", "selectiontype" : Constants.SELECTION_TYPE_COMBOBOX, "sourcetype" : "schooltype"},
                            { "metadataType" : Constants.METADATATYPE_QUESTION_TYPE, "title": "Type", "value" :"1", "selectiontype" : Constants.SELECTION_TYPE_COMBOBOX, "sourcetype" : "questiontype"},
                            { "metadataType" : Constants.METADATATYPE_QUESTION_DIFFUCULTY, "title": "Diffuculty", "value" :"0.2", "selectiontype" : Constants.SELECTION_TYPE_COMBOBOX, "sourcetype" : "questiondiffuculty"},
                            { "metadataType" : Constants.METADATATYPE_QUESTION_RECOMMENDED_TIME, "title": "Recommended Time", "value" :"0", "selectiontype" : Constants.SELECTION_TYPE_COMBOBOX, "sourcetype" : "recommendedtime"},
                            { "metadataType" : Constants.METADATATYPE_LANGUAGE, "title": "Language", "value" :"tr", "selectiontype" : Constants.SELECTION_TYPE_COMBOBOX, "sourcetype" : "language"},
                            { "metadataType" : Constants.METADATATYPE_ACTIVE, "title": "Active", "value" :"true", "selectiontype" : Constants.SELECTION_TYPE_COMBOBOX, "sourcetype" : "truefalse"},
                            { "metadataType" : Constants.METADATATYPE_QUESTION_LEVEL, "title": "Question Level", "value" :"1", "selectiontype" : Constants.SELECTION_TYPE_COMBOBOX, "sourcetype" : "questionlevel"}
                        ]
                    }
                }