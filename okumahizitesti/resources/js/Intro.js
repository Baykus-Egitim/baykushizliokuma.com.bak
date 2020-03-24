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


    Sbt_1.BaseIntroSpeedRead = (function () {
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
                EVENT_CLOSE: "EVENT_CLOSE"
            }
        }

        return Class;
    })()

    Sbt_1.IntroSpeedRead = (function (_super) {

        __extends(Class, _super);

        function Class(container, config) {

            //#region Private Variables
            var _this = this;
            var base = {};
            //#endregion


            function Constructor(container, config) {

                _super.apply(this, arguments);
                _super.apply(base, arguments);

                //#region Properties
                Object.defineProperties(this, {


                });
                //#endregion

                //#region Private Method

                this.on = function (eventName, func) {
                    // Event i kontrol et kayıtlı değilsa hata dön, kayıtlıysa Event i oluştur.

                    if (!(eventName in Sbt_1.IntroSpeedRead.Static.Event)) {
                        throw new Sbt_1.Error.NotFound("Intro.Event." + eventName);
                    }
                    else {
                        $(this).on(eventName, func);
                    }
                }

                this.off = function (eventName, func) {
                    // Event i kontrol et kayıtlı değilsa hata dön, kayıtlıysa Event i oluştur.
                    if (!(eventName in Sbt_1.IntroSpeedRead.Static.Event)) {
                        throw new Sbt_1.Error.NotFound("Intro.Event." + eventName);
                    }
                    else {
                        $(this).off(eventName, func);
                    }
                }

                this.render = function (){
                    var _container =  addDOM("div", $("#sbt_bodyContainer"), "intro_container", "speed_read_intro_container");
                    var _tapArea =  addDOM("div",$(_container),"tap_container","speed_read_tap_container");
                    var _tapAreaBackground =  addDOM("div",$(_tapArea),"tap_container_background","speed_read_tap_container_background");
                    var _tapAreaText =  addDOM("div",$(_tapArea),"tap_container_text","speed_read_tap_container_text");
                    var _tapAreaHighlight =  addDOM("div",$(_tapArea),"tap_container_highlight","speed_read_tap_container_highlight");

                    $.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
                    if($.browser.device){
                        $(_tapAreaText).html("Başlamak için dokun.");
                    }
                    else {
                        $(_tapAreaText).html("Başlamak için tıkla.");
                    }

                    //$(_tapAreaText).html("Başlamak için dokun.");

                    $(".speed_read_tap_container_highlight").css("display","none");

                    $(".speed_read_tap_container").on("mousedown", introDown);
                }

                var introDown = function (){
                    $(".speed_read_tap_container").off("mousedown");
                    var initialTime = 3;
                    $(".speed_read_tap_container_highlight").css("display","block");
                    $(".speed_read_tap_container_text").css("font-size","45px");
                    $(".speed_read_tap_container_text").css("font-size","60px");
                    $(".speed_read_tap_container_text").html(initialTime);
                    var timerInterval = setInterval(function (){
                        initialTime--;
                        if(initialTime == 0){
                            clearInterval(timerInterval);
                            $("#intro_container").remove();
                            $(_this).trigger(Sbt_1.IntroSpeedRead.Static.Event.EVENT_CLOSE);
                        }
                        else
                            $(".speed_read_tap_container_text").html(initialTime);
                    },1000);

                    var angle = 0;
                    var rotateInterval = setInterval(function (){
                        angle+=5;
                        $(".speed_read_tap_container_highlight").css("transform","rotate("+angle+"deg)");
                        $(".speed_read_tap_container_highlight").css("-ms-transform","rotate("+angle+"deg)");
                        $(".speed_read_tap_container_highlight").css("-webkit-transform","rotate("+angle+"deg)");
                        $(".speed_read_tap_container_highlight").css("-moz-transform","rotate("+angle+"deg)");
                    },28);
                }


            }
            return Constructor.apply(this, arguments);
        }


        return Class;
    })(Sbt_1.BaseIntroSpeedRead)

})(Sbt_1);