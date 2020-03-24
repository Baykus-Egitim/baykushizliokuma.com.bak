Preloader = function () {
    var _this = this;

    _this.mainContainer = $('body');

    _this.showPreloader = function () {

        _this.mainContainer.append('<div id="preloader" class="animated fadeIn">'+
                                      '<div id="preloaderLogoHolder">' +
                                        ''+
                                        '<span id="preloader-o" class="preloaderImages"><img style="width: 130px; height: 60;" src="img/logo-baykus.png"></span>'+
                                      '</div>'+
                                  '</div>');



        setTimeout(function(){
            $('.fadeIn').removeClass('fadeIn');
        },250);
    };

    _this.hidePreloader = function () {
        $('#preloader').addClass('fadeOut');

        setTimeout(function(){
            $('#preloader').remove();
        },250);
    };
}
