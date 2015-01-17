jQuery(document).ready(function($) {
  window.is_email = $.cookie('email_subscriber') || false;
  window.is_facebook = $.cookie('facebook_subscriber') || false;
  window.is_twitter = $.cookie('twitter_subscriber') || false;
  window.is_donator = $.cookie('donator') || false;
  window.visits = $.cookie('visits') || 1;

  if(window.is_email) {
    $('.action .support').fadeIn('slow');
    $('.plea .subscribe').fadeOut('fast');
  } else {
    $('.action .subscribe').fadeIn('slow');
  }
});

function fb_share(url) {
  FB.ui({
    method: 'share',
    href: url,
  }, function(response){});
}


function twitter_share(url, text) {
  
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
      $('.action .support').fadeIn('slow');
    });
  })(jQuery);
}
