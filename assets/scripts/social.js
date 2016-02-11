jQuery(document).ready(function($) {
  window.is_email = $.cookie('email_subscriber') || false;
  window.is_facebook = $.cookie('facebook_subscriber') || false;
  window.is_twitter = $.cookie('twitter_subscriber') || false;
  window.is_donator = $.cookie('donator') || false;
  window.visits = $.cookie('visits') || 1;
  window.max_visits = 10;

  if(parseInt(window.visits) <= window.max_visits) {
    window.visits = parseInt(window.visits) + 1;
    $.cookie('visits', window.visits, { expires: 7300, path: '/' });
  }

  if(window.is_email) {
    $('.action .book').fadeIn('slow');
    $('.plea .subscribe').fadeOut('fast');
  } else if(window.visits <= window.max_visits) {
    $('.action .book').fadeIn('slow');
    $('.plea .subscribe').fadeIn('fast');
  } else {
    $('.action .subscribe').fadeIn('slow');
    $('.plea .subscribe').fadeIn('fast');
  }

  //social floating stuff
  if($(window).width() > 1020) {
    var stickyTop = $('.share-fixed').offset().top;

    $(window).scroll(function(){
      var windowTop = $(window).scrollTop();

      if(stickyTop < windowTop) {
        $('.share-fixed').css({ 'position' : 'fixed' });
      } else {
        $('.share-fixed').css({ 'position' : 'absolute' });
      }
    });

  } else {

    var stickyTop = $('article .body').offset().top;

    var footerHeight = $('.footer-menu').height() + $('.recommender.bottom').height();

    $(window).scroll(function(){
      var windowHeight = $(window).height();
      var windowTop = $(window).scrollTop();
      var windowBottom = windowTop + windowHeight;
      var stickyBottom = $(document).height() - footerHeight;

      console.log(windowBottom, stickyBottom);

      if(stickyTop < windowTop && stickyBottom > windowBottom) {
        $('.share-fixed').css({ 'position' : 'fixed', 'display': 'block' });
      } else {
        $('.share-fixed').css({ 'position' : 'absolute', 'display' : 'none' });
      }

    });

  }

});

function fb_share(url) {
  FB.ui({
    method: 'share',
    href: url,
  }, function(response){});
  return false;
}


function twitter_share(url, text) {
  console.log(url);
  (function($) {
    var intent = 'https://twitter.com/intent/tweet?url='+ url + '&text=' + text + '&via=sleeperave';
    var width  = 575,
        height = 400,
        left   = ($(window).width()  - width)  / 2,
        top    = ($(window).height() - height) / 2,
        opts   = 'status=1' +
        ',width='  + width  +
        ',height=' + height +
        ',top='    + top    +
        ',left='   + left;

    window.open(intent, 'twitter', opts);
  })(jQuery);

  return false;
}

function fb_action_logger() {
  FB.Event.subscribe('edge.create', function(url, element){
    (function($) {
      $.cookie('facebook_subscriber', 'true', { expires: 7300, path: '/' });
    })(jQuery);
  });
}

twttr.ready(
  function (twttr) {
    twttr.events.bind(
      'follow',
      function (event) {
        (function($) {
          $.cookie('twitter_subscriber', 'true', { expires: 7300, path: '/' });
        })(jQuery);
      }
    );
  }
);

function donate_action_logger() {
  (function($) {
    $.cookie('donator', 'true', { expires: 7300, path: '/' });
  })(jQuery);
}

function mailchimp_subscribe() {
  (function($) {
    $('.modal .email').fadeOut();
    $('.modal .social').fadeIn();
    $('.plea .subscribe').fadeOut();
    $.cookie('email_subscriber', 'true', { expires: 7300, path: '/' });
  })(jQuery);
}

function modal_exit() {
  (function($) {
    $('.action .subscribe').fadeOut('fast', function(){
      $('.action .book').fadeIn('slow');
    });
  })(jQuery);
}
