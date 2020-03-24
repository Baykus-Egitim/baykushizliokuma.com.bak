(function (Sbt_1) {

    var __extends = this.__extends || function (d, b) {
        d["Static"] = b["Static"];
    };


    Sbt_1.BaseInfoSpeedRead = (function () {
        function Class() {

            //#region Private Variables
            //#endregion


            function Constructor() {

                //#region Properties
                Object.defineProperties(this, {

                });
                //#endregion

                //#region Public Method
                this.on = function (eventName, func) {

                }
                this.off = function (eventName, func) {

                }
                this.render = function () {

                }


                //#endregion
            }

            return Constructor.apply(this, arguments);
        }


        Class.Static = {
            Event: {
                EVENT_CLICK: "EVENT_CLICK"
            },
            Location: {
                TOP: "TOP",
                LEFT: "LEFT",
                RIGHT: "RIGHT",
                MIDDLE: "MIDDLE",
                BOTTOM: "BOTTOM",
                RIGHT_TOP: "RIGHT_TOP"
            },
            Type: {
                BUTTON: "BUTTON",
                LIBRARY:"LIBRARY"
            }
        }



        return Class;
    })()

    Sbt_1.InfoSpeedRead = (function (_super) {

        __extends(Class, _super);

        function Class(config) {

            //#region Private Variables
            var _config = config;
            var _mainContainer;
            var _infoButton;
            var _background;
            var _isOpen = false;
            var _removebleImage;

            var _this = this;
            var base = {};
            //#endregion


            function Constructor(config) {

                _super.apply(this, arguments);
                _super.apply(base, arguments);

                //#region Properties
                Object.defineProperties(this, {
                    
                });
                //#endregion

                //#region Private Method
                var InfoButtonClick = function () {
                    if (!_isOpen) {
                        _this.show();
                    } else {
                        _this.close();
                    }

                    _isOpen = !_isOpen;

                    $(_this).trigger(Sbt_1.InfoSpeedRead.Static.Event.EVENT_CLICK, _isOpen);
                }

                var CreateButton = function () {

                    _infoButton =  addDOM("div", $("#sbt_bodyContainer"), "", "speed_read_Info_infoButton");
                    _infoButton.on("mousedown", InfoButtonClick);

                }

                var CreateElements = function () {

                    _mainContainer =  addDOM("div", $("#sbt_bodyContainer"), "", "speed_read_Info_container");

                    _background =  addDOM("div", _mainContainer, "", "speed_read_Info_background");

                    for (var i = 0; i < _config.images.length; i++) {
                        var _imagePath = _config.images[i].imagePath + _config.images[i].imageName;

                        var _image =  addDOM("img", _background, "", "speed_read_Info_image");
                        _image.attr("src", _imagePath);
                        if (_config.images[i].imageLocation != undefined) {
                            if (_config.images[i].imageLocation in Sbt_1.InfoSpeedRead.Static.Location) {
                                if (_config.images[i].imageLocation == "BOTTOM") {
                                    _image.css("bottom", "30px");
                                    _image.css("left", "70px");
                                } else if (_config.images[i].imageLocation == "TOP") {
                                    _image.css("top", "10px");
                                    _image.css("left", "50%");
                                    _image.css("margin-left", "-377.5px");
                                } else if (_config.images[i].imageLocation == "MIDDLE") {
                                    _image.css("top", "25%");
                                    _image.css("left", "50%");
                                    _image.css("margin-left", "-377.5px");
                                } else if (_config.images[i].imageLocation == "RIGHT_TOP") {
                                    _image.css("top", "8%");
                                    _image.css("right", "50px");
                                }
                            } else {
                                throw new Sbt_1.Error.NotFound("Info.Location." + _config.images[i].imageLocation);
                            }
                        }
                        
                        if (_config.images[i].imageType) {
                            if (_config.images[i].imageType in Sbt_1.InfoSpeedRead.Static.Type) {
                                if (_config.images[i].imageType == "BUTTON") {
                                    _image.css("bottom", "0px");
                                    _image.css("left", "0px");
                                    _image.css("opacity", "0.3");
                                } else if (_config.images[i].imageType == "LIBRARY") {
                                    _image.css("top", "10%");
                                    _image.css("right", "0px");
                                    _image.css("opacity", "0.3");
                                }

                                
                            }
                        }
                    }
                }
                //#endregion

                //#region Public Method

                this.on = function (eventName, func) {
                    // Event i kontrol et kayıtlı değilsa hata dön, kayıtlıysa Event i oluştur.

                    if (!(eventName in Sbt_1.InfoSpeedRead.Static.Event)) {
                        throw new Sbt_1.Error.NotFound("Info.Event." + eventName);
                    }
                    else {
                        $(this).on(eventName, func);
                    }
                }

                this.off = function (eventName, func) {
                    // Event i kontrol et kayıtlı değilsa hata dön, kayıtlıysa Event i oluştur.
                    if (!(eventName in Sbt_1.InfoSpeedRead.Static.Event)) {
                        throw new Sbt_1.Error.NotFound("Info.Event." + eventName);
                    }
                    else {
                        $(this).off(eventName, func);
                    }
                }

                this.show = function () {
                    CreateElements();
                    _mainContainer.on("mousedown", function () {
                        _isOpen = false;
                        $(_this).trigger(Sbt_1.InfoSpeedRead.Static.Event.EVENT_CLICK, _isOpen);
                        _this.close();
                    });
                    setTimeout(function () {
                        _background.addClass("speed_read_Info_show");
                    }, 10);

                    if (localStorage.getItem(config.objectItem + "_helpViewed") == "true") {
                        //_removebleImage.remove();
                    }

                }

                this.close = function () {
                    _mainContainer.remove();
                }

                this.render = function () {
                    CreateButton();

                    if (localStorage.getItem(config.objectItem + "_helpViewed") != "true") {
                        _isOpen = true;
                        this.show();
                        localStorage.setItem(config.objectItem + "_helpViewed", "true");
                    }
                }

            }
            return Constructor.apply(this, arguments);
        }


        return Class;
    })(Sbt_1.BaseInfoSpeedRead)

})(Sbt_1);