$('#play-video').on('click', function(e){
  e.preventDefault();
  $('#video-overlay').addClass('open');
  $("#video-overlay").append('<iframe width="560" height="315" src="https://www.youtube.com/embed/ngElkyQ6Rhs" frameborder="0" allowfullscreen></iframe>');
});

$('.video-overlay, .video-overlay-close').on('click', function(e){
  e.preventDefault();
  close_video();
});

$(document).keyup(function(e){
  if(e.keyCode === 27) { close_video(); }
});

function close_video() {
  $('.video-overlay.open').removeClass('open').find('iframe').remove();
};

(function($) {

  "use strict";


  $(window).on('load', function() {

	  var calculateBookCount = function(){
		  var speedTestWpm = parseInt($('#speedtest-wpm').val());
		  var speedTestDuration = parseInt($('#speedtest-duration').val());
		  
		  var readBookCount = (speedTestWpm * speedTestDuration * 360) / 60000;
		  
		  $('#calculate-speed').text(Math.round(readBookCount));
	  }
	  
	  calculateBookCount();
	  
	  $('#calculate-speed-button').off('click');
	  $('#calculate-speed-button').on('click',function(){
		  calculateBookCount();
	  });
	  
	  $('#speedtest-wpm, #speedtest-duration').off('change');
	  $('#speedtest-wpm, #speedtest-duration').on('change',function(){
		  calculateBookCount();
	  });
	  
	  
	  if(localStorage.getItem("kvkkBannerSeen") != "true"){
		  $('#kvkk-banner-header').removeClass("hidden");
	  }
	  
	$('#kvkk-banner-close-button').off('click');
	$('#kvkk-banner-close-button').on('click',function(){
		$('#kvkk-banner-header').remove();
		localStorage.setItem("kvkkBannerSeen", true);
	});
	  
      var popUpManager = new PopupManager();
      $('#start-test-button').off('click');
      $('#start-test-button').on('click', function () {
          popUpManager.showSpeedTestPopup(calculateBookCount);
      });

      if( jQuery(".toggle .toggle-title").hasClass('active') ){
          jQuery(".toggle .toggle-title.active").closest('.toggle').find('.toggle-inner').show();
      }
      jQuery(".toggle .toggle-title").click(function(){
          if( jQuery(this).hasClass('active') ){
              jQuery(this).removeClass("active").closest('.toggle').find('.toggle-inner').slideUp(200);
          }
          else{	jQuery(this).addClass("active").closest('.toggle').find('.toggle-inner').slideDown(200);
          }
      });

      var fastSpeed = 10;
      var slowSpeed = 20;
      
      var fastStrings = ["Siz Hızlı Okuyacaksınız!"];
      var slowerStrings = ["",
          					"Siz Hızlı Okuyacaksınız!"];
      
      var initializeSlowTypeIt = function () {
    	  $('.head-title').after('<center><p id="alternating-text" class="wow fadeIn" data-wow-delay="0.6s"></p></center>');
    	  
          var typeit = new TypeIt('#alternating-text', {
              strings: slowerStrings,
              breakLines: false,
              speed: slowSpeed,
              waitUntilVisible: true,
              afterString: function () {

              }
          })
          .go();
      }
      
      var initializeFastTypeIt = function () {
          var typeit = new TypeIt('#alternating-text', {
              strings: fastStrings,
              breakLines: false,
              speed: fastSpeed,
              waitUntilVisible: true,
              afterString: function () {
            	  setTimeout(function(){
            		  $('#alternating-text').remove();
                	  initializeSlowTypeIt();
            	  },200);            	  
              }
          })
          .delete(30)
          .go();
      }     
      
      initializeFastTypeIt();
      
      try{
    	  preloader.hidePreloader();
      }
      catch(e){
    	  
      }


      var roleMap = {
          '1' : '<p>Kaç yaşında olursanız olun, eğitim yaşamınızda sizi yüksek performans gerektiren çok sayıda sınav bekliyor. Peki, çoğu öğrencinin bu çok önemli sınavlarda dikkatsizlikten ve/veya okuduğunu anlayamamaktan dolayı performansının altında başarı gösterdiğini biliyor musunuz?</p>'+
                '<p>Adı üstünde, “öğrenci”siniz! Gelin bir de Hızlıgo ile hızlı okumayı öğrenin! Hani, klasik öğrenci söylemidir; “Hayatta ne işime yarayacak?” Hızlı okumanın eğitim hayatınızı nasıl değiştireceğini, en iyisi yaşayarak öğrenin.</p>',


          '2' : '<p >Öğrenme eylemini yaşamı boyunca sürdürülebilir hale getirmeyenler, profesyonel yaşamdan diskalifiye olma riskiyle karşı karşıya. Kişisel ve mesleki gelişiminiz için, Hızlıgo ile “anlayarak hızlı okuma”yı öğrenin. Kısa bir zamanınızı ayırarak öğrendiklerinizin, ölçülemeyecek kadar değerli olduğunu göreceksiniz.</p>'+
                '<p >İş adamı, ofis personeli, uzman, yönetici, CEO... Hangi düzeyde olursanız olun, sektörünüzle ilgili yayınlar, günlük gazeteler, raporlar, dokümanlar, projeler ve e-postalar derken uzayan okunacaklar listesinin zamanınızı gasp etmesine izin vermeyin!</p>',


          '3' : '<p>Akademik kariyeri tercih ederken yaşamınızın ne kadarının okumakla geçeceğini de biliyordunuz, değil mi? Sizin araştırmayı, ortaya koymayı planladığınız alanda kim daha önce ne yapmış, disiplinler arası yansımaları neler olmuş, dünya literatüründe neler yayımlanmış, gerçekten hakim olmanız gereken ve bunu yalnızca okuyarak yapabileceğiniz sayısız metin sizi bekliyor. Gerek bilim gerekse sanat yapabilmeniz için, okuyarak kendinizi geliştirmeniz ilk ve en geçerli koşul. Bilim ve sanatın da sizlerin okuyup, yorumlayıp, anlamlandırdıklarınızla gelişeceğini düşünürsek, gerçekten okuyacak çok şey var!</p>'+
                '<p>Ortalama bir okuyucu, dakikada 150 ila 180 kelime arasında okur. Oysa bilgi çağı aydınları, bu ortalamanın, dakikada 600 ila 800 kelime olması gerektiğini belirtiyorlar. Üstelik akademisyenler için alan okumaları, belirli yayınları sürekli izlemeleri de yeterli olmuyor. Her zaman gündeme hakim olmaları, hızlı okuyarak hızlı yorumlamaları bekleniyor.</p>',


          '4' : '<p>“Bir gün senin başına da geleceğini nereden bilebilirdin? Sen de şimdi, bir sabah tedirgin düşlerden uyanan ve kendini dev bir böceğe dönüşmüş bulan Gregor Samsa gibi hissediyorsun. Gregor gibi senin de gözün pencereye kayıyor. Havanın kapalı olduğunu anlayınca ve çinko damın üzerine düşen yağmur tanelerinin tıpırtısını işitince, enikonu bir hüzün çöküyor içine. ‘İyisi mi biraz daha uyuyup bu tuhaflıktan kurtulmayı beklemek” diye geçiriyorsun aklından</p>'+
                '<p>Ancak hiç de olacak gibi değil. Sen sağına yatmaya alışıksın; oysa şimdi bir türlü sağ tarafına dönemiyorsun. Bedenine şimdiye kadar hiç tanımadığın bir ağrının saplanmasıyla, bu anlamsız çabandan da vazgeçiyorsun.”</p>'+
                '<p>Yoksa sen de yukarıda “Dönüşüm”ünden alıntılayıp dönüştürdüğümüz Kafka kahramanı gibi bir sabah uyandın ve kendini böcek yerine, bir kitap kurduna dönüşmüş mü buldun!<br>“İşte, edebiyatın güzelliği!” de, geç.</p>',
      }

      $('.role-selectors').on('click',function () {
          var $this = $(this);
          var role = $this.attr('role');

          $('.role-selectors').removeClass('active-selector');
          $this.addClass('active-selector');

          var container = $('#for-whom-dynamic-text');

          container.html(roleMap[role]);
      })

  var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      autoplay: {
          delay: 5000,
      },
      disableOnInteraction: true,
      pagination: {
          el: '.swiper-pagination',
          clickable: true,
          dynamicBullets: true,
      },
      breakpoints: {
          1024: {
              slidesPerView: 2,
              spaceBetween: 40,
          },
          768: {
              slidesPerView: 1,
              spaceBetween: 30,
          }
      }

  });

  $('.navbar-toggler').off('click');
  $('.navbar-toggler').on('click',function () {
     var menu = $('nav');
     if(menu.hasClass('opacity')){
         menu.removeClass('opacity');
     }
     else{
         menu.addClass('opacity');
     }
  });


  /*Page Loader active
  ========================================================*/

  // Sticky Nav
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 50) {
            $('.scrolling-navbar').addClass('top-nav-collapse');
        } else {
            $('.scrolling-navbar').removeClass('top-nav-collapse');
        }
    });

    // one page navigation 
    $('.navbar-nav').onePageNav({
      currentClass: 'active',
    	  filter: ':not(.external)'
    });

    /* Auto Close Responsive Navbar on Click
    ========================================================*/
    function close_toggle() {
        if ($(window).width() <= 768) {
            $('.navbar-collapse a').on('click', function () {
                $('.navbar-collapse').collapse('hide');
            });
        }
        else {
            $('.navbar .navbar-inverse a').off('click');
        }
    }
    close_toggle();
    $(window).resize(close_toggle);


      /* WOW Scroll Spy
      ========================================================*/
      var wow = new WOW({
          //disabled for mobile
          mobile: false
      });

      wow.init();

      /* Back Top Link active
      ========================================================*/
      var offset = 200;
      var duration = 500;
      $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
          $('.back-to-top').fadeIn(400);
        } else {
          $('.back-to-top').fadeOut(400);
        }
      });

      $('.back-to-top').on('click',function(event) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, 600);
        return false;
      });

  });      

}(jQuery));

$(function() {
  $('#WAButton').floatingWhatsApp({
    phone: '+905058321913', //WhatsApp Business phone number International format-
    //Get it with Toky at https://toky.co/en/features/whatsapp.
    headerTitle: 'WhatsApp ile İletişime Geçin!', //Popup Title
    popupMessage: 'Merhaba, size nasıl yardımcı olabilirim?', //Popup Message
    showPopup: false, //Enables popup display
    buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', //Button Image
    //headerColor: 'crimson', //Custom header color
    //backgroundColor: 'crimson', //Custom background button color
    position: "right"    
  });
});

// Yeah, no javascript :) 

  function testAnim(x) {
    $('.modal-content').removeClass().addClass(x + ' modal-content animated');
  };

  $(document).ready(function(){
    $('.js--triggerAnimation').click(function(e){
      e.preventDefault();
      var anim = $('.js--animations').val();
      testAnim(anim);
    });

    $('.js--animations').change(function(){
      var anim = $(this).val();
      testAnim(anim);
    });
  });