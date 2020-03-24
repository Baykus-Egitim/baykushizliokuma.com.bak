//@melda-coskun-05.01.2014

(function (Sbt_1) {

    var __extends = this.__extends || function (d, b) {
        d["Static"] = b["Static"];
    };

    var addDOM = function (_type, _container, _id, _class) {
        var dom = this.createDOM(_type, _id, _class);
        _container.append(dom);
        return dom;
    };

    var createDOM = function (_type, _id, _class) {
        var dom = $(document.createElement(_type))
        if (typeof _id != "undefined" && _id.trim() != "") dom.attr("id", _id.trim());
        if (typeof _class != "undefined" && _class.trim() != "") dom.attr("class", _class.trim());

        return dom;

    };


    Sbt_1.BaseSpeedReadingTextPanel = (function () {
        function Class() {

            function Constructor() {

                //#region Properties
                Object.defineProperties(this, {
                  
                });
                //#endregion

                //#region Pulic Method
                this.on = function (eventName, func) { };
                this.off = function (eventName, func) { };
                this.render = function () { };
                //#endregion
            }

            return Constructor.apply(this, arguments)
        }

        Class.Static = {
            Event: {
                PANEL_CLOSED: "PANEL_CLOSED",
                PANEL_OPENED: "PANEL_OPENED",
                TEXT_SELECTED: "TEXT_SELECTED",
            }

        }
        return Class;
    })()

    Sbt_1.SpeedReadingTextPanel = (function (_super) {

        __extends(Class, _super);

        function Class(config) {

            //#region Private Variables
            var _config = config || {};
            var _mainContainer;
            var _contentContainer;
            var _textPanelButton;
            var _textPanelScreen;
            var _sliderContainer;
            var _slidedArea;
            var base = {};
            //#endregion

            function Constructor(config) {

                _super.apply(this, arguments);
                _super.apply(base, arguments);

                var _this = this;

                //#region Properties
                Object.defineProperties(this, {
                   
                });
                //#endregion

                var Create = function () {

                    _mainContainer = $(_this.drawMainContainer());
                    _mainContainer.hide();
                    _textPanelButton = $(_this.drawTextPanelButton());
                    _textPanelScreen = $(_this.drawTextPanelScreen());
                    _textPanelScreen.hide();

                    _textPanelButton.on("click", function () { 
                       _this.togglePanel();
                        
                    });

                    _textPanelScreen.on("click", function () { _this.togglePanel(); });

                    _contentContainer =  addDOM("div", _mainContainer, "", "SpeedReadingTextPanel_contentContainer");

                   /* var contentTitle =  addDOM("div", _contentContainer, "", "SpeedReadingTextPanel_contentTitle");
                    $(contentTitle).append("<i class='fa fa-bookmark fa-5'></i><span>Kitaplarım</span>");

                    _sliderContainer = $(_this.drawSliderContainer());
                    _slidedArea = $(_this.drawSlidedArea());
                    _sliderContainer.append(_slidedArea);

                    $(_contentContainer).append(_sliderContainer);
                    if (config !== undefined) {
                        _this.multisort(config, ['category', 'title'], ['ASC', 'ASC'])
                        createButtons(config);
                    }*/
                    $("#sbt_bodyContainer").append(_textPanelScreen);
                    $("#sbt_bodyContainer").append(_mainContainer);
                }

                //#endregion

                //#region Public Method 
                var createButtons = function (config) {
                   
                    var container;

                    for (var i = 0; i < config.length; i++) {
                        if (i != 0 && config[i - 1].category == config[i].category) {
                            
                            container = button.container;
                        }
                        else
                        {
                            container =  addDOM("div", _slidedArea, "com_sebit_category_Element" + i);
                            $(container).addClass("speedReadingContainer");
                            var categoryTitle =  addDOM("div", container, "com_sebit_category_Element" + i);
                            $(categoryTitle).addClass("speedReadingContainerTitle");
                            categoryTitle.html(config[i].category);
                        }
                       
                        var button =  addDOM("div", container, "com_sebit_speedReadTextPanelButton" + i);
                        $(button).addClass("speedReadingTextPanelButton");

                        button.container = container;
                        button.html(config[i].title);
                        button.index = i;
                        button.text = config[i].text;
                        
                        $(button).attr("data-index", i);
                        $(button).attr("data-context", config[i].text);
                        button.on("click", function () {
                            
                            $(_this).trigger(Sbt_1.SpeedReadingTextPanel.Static.Event.TEXT_SELECTED, [$(this).data("index"), $(this).data("context")]);
                            $(".speedReadingTextPanelButton").removeClass("selected");
                            $(this).addClass("selected");
                        });
                        
                    }
                    
                }

                this.togglePanel = function () {
                    if (_mainContainer.css("display") == "none") {
                        _mainContainer.show();
                        _textPanelScreen.show();
                        $(_this).trigger(Sbt_1.SpeedReadingTextPanel.Static.Event.PANEL_OPENED);
                    } else {
                        _mainContainer.hide();
                        _textPanelScreen.hide();
                        $(_this).trigger(Sbt_1.SpeedReadingTextPanel.Static.Event.PANEL_CLOSED);

                    }
                }

                this.drawContainer = function (id) {

                    return '<div class="SpeedReadingTextPanel_container" id=' + id + '><div class="scSlidersliderBarIlk"></div></div>';
                }
                this.on = function (eventName, func) {
                    // Event i kontrol et kayıtlı değilsa hata dön, kayıtlıysa Event i oluştur.

                    if (!(eventName in Sbt_1.SpeedReadingTextPanel.Static.Event)) {
                        throw new Sbt_1.Error.NotFound("SpeedReadingTextPanel.Event." + eventName);
                    }
                    else {
                        $(this).on(eventName, func);
                    }
                }

                this.off = function (eventName, func) {
                    // Event i kontrol et kayıtlı değilsa hata dön, kayıtlıysa Event i oluştur.
                    if (!(eventName in Sbt_1.SpeedReadingTextPanel.Static.Event)) {
                        throw new Sbt_1.Error.NotFound("SpeedReadingTextPanel.Event." + eventName);
                    }
                    else {
                        $(this).off(eventName, func);
                    }
                }

                this.drawMainContainer = function () {
                    return '<div class="com_sebit_components_SpeedReadingTextPanel"></div>';
                }

                this.drawTextPanelButton = function () {
                    return '<div class="com_sebit_components_SpeedReadingTextPanelButton"><i class="fa fa-book fa-4"></i></div>';
                }

                this.drawTextPanelScreen = function () {
                    return '<div class="com_sebit_components_SpeedReadingTextPanelScreen"></div>';
                }
                this.render = function () {
                   /* $(".nano").nanoScroller();
                    $(".nano").nanoScroller({ alwaysVisible: true });*/
                    $("#sbt_bodyContainer").append(_textPanelButton);
                    
                }

                this.drawSliderContainer = function () {

                    return '<div id="about" class="nano"></div>';
                }

                this.drawSlidedArea = function () {
                    return '<div class="content"></div>';
                }

                this.multisort = function (arr, columns, order_by) {
                    
                    if(typeof columns == 'undefined') {
                        columns = []
                        for(x=0;x<arr[0].length;x++) {
                            columns.push(x);
                        }
                    }

                    if(typeof order_by == 'undefined') {
                        order_by = []
                        for(x=0;x<arr[0].length;x++) {
                            order_by.push('ASC');
                        }
                    }

                    function multisort_recursive(a,b,columns,order_by,index) {  
                        var direction = order_by[index] == 'DESC' ? 1 : 0;

                        var is_numeric = !isNaN(a[columns[index]]-b[columns[index]]);

                        var x = is_numeric ? a[columns[index]] : a[columns[index]].toLowerCase();
                        var y = is_numeric ? b[columns[index]] : b[columns[index]].toLowerCase();

                        if(!is_numeric) {
                            x = to_ascii(a[columns[index]], -1),
                            y = to_ascii(b[columns[index]], -1);
                        }

                        if(x < y) {
                            return direction == 0 ? -1 : 1;
                        }

                        if(x == y)  {
                            return columns.length-1 > index ? multisort_recursive(a,b,columns,order_by,index+1) : 0;
                        }

                        return direction == 0 ? 1 : -1;
                    }
                    
                    return arr.sort(function (a, b) {
                        return multisort_recursive(a,b,columns,order_by,0);
                    });

                    function to_ascii(str)
                    { 
                        var ascii;
                        for (i=0;i < str.length; i++) {
                            ascii += str.charCodeAt(i) + ',';
                        }

                        return ascii;
                    }
                }


                //#endregion

                Create();

            }

            return Constructor.apply(this, arguments);
        }

        return Class;
    })(Sbt_1.BaseSpeedReadingTextPanel)

})(Sbt_1);