popupTypes = {
	"success" : "success",
	"fail" : "fail",
	"info" : "info",
	"default" : "default"
}



PopupManager = function () {
    var _this = this;

    _this.closeSpeedtestPopup = function(speed){
        $('#speedtest-wpm').val(speed);
        $('#calculate-speed-button').trigger('click')
        _this.closePopup(_this.closeFunction);
    }

    _this.showSpeedTestPopup = function(_closeFunction){
    	_this.closeFunction = _closeFunction;
    	
        _this.mainContainer = $('<div class="hizligo-popup-glass animated fadeIn">' +
                                    '<div data-wow-delay="0.3s" class="hizligo-popup-body animated fadeIn" type="speedtest">' +
                                        '<div class="hizligo-popup-header">' +
                                            '<span class="hizligo-popup-title">Hızımı Belirle</span>'+
                                            '<span class="hizligo-close-popup-button"><i class="lni-close"></i></span>'+
                                        '</div> '+

                                        '<div class="hizligo-popup-content"><iframe src="okumahizitesti/dataLevel.html" allowtransparency="true"></iframe></div>'+
                                    '</div>'+
                                '</div>');

        _this.mainContainer.appendTo("body");

        $('.hizligo-close-popup-button').off('click');
        $('.hizligo-close-popup-button').on('click',function(){
            _this.closePopup(_closeFunction);
        });
    }

    _this.showPopup = function (paramObject, content, title, type, isAggreementPopup) {

    	_this.mainContainer = $('<div aggreement="'+ isAggreementPopup +'" class="hizligo-popup-glass animated fadeIn">' +
									'<div data-wow-delay="0.3s" class="hizligo-popup-body animated fadeIn" type="'+ type +'">' +
										'<div class="hizligo-popup-header">' +
											'<span class="hizligo-popup-title">'+ title +'</span>'+
											'<span class="hizligo-close-popup-button"><i class="lni-close"></i></span>'+
										'</div> '+

										'<div class="hizligo-popup-content"></div>'+
										'<div class="hizligo-popup-footer"></div>'+
									'</div>'+
								'</div>');


        _this.mainContainer.appendTo("body");
        
    	
    	$('.hizligo-close-popup-button').off('click');
    	$('.hizligo-close-popup-button').on('click',function(){
    		_this.closePopup();
    	});
        
        $('.hizligo-popup-content').html(content);
        $('.hizligo-popup-footer').contents().remove();

        var delay = 0.3;

        for (var key in paramObject) {
            var _btnText = key;      
            var _button = $('<a  data-wow-delay="'+ delay +'s" href="javascript:void(0)" class="btn btn-common wow fadeInUp animated" keyVal="'+ key +'">'+ _btnText +'</a>');
            delay = delay + 0.3;
            $('.hizligo-popup-footer').append(_button);
            $(_button).off("click");
            $(_button).on("click", function (e) {
                _this.closePopup(paramObject[$(this).attr("keyVal")]);
            });
        }
    }
    

    _this.closePopup = function (_function) {    	
        if (typeof _function == "function") {
            _function();
        }

        $('.hizligo-popup-glass').removeClass('fadeIn').addClass('fadeOut');
        $('.hizligo-popup-body').removeClass('fadeIn').addClass('fadeOut');

        setTimeout(function () {
            $('.hizligo-popup-glass').remove();
        }, 250);

    }

}