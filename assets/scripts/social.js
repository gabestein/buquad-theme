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
      $('.action .support').fadeIn('slow');
    });
  })(jQuery);
}
