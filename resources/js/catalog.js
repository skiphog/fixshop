//import NProgress from 'nprogress';

if (window.history && window.history.pushState) {
  const _c = $('#catalog');

  function getCatalog (link) {
    //NProgress.start();
    $.getJSON(link)
      .done(function (json) {
        if ('title' in json && 'content' in json) {
          document.title = json['title'];
          _c.html(json['content']);
          $('html:not(:animated),body:not(:animated)').animate({ scrollTop: 0 }, 0);
        }
      })
      .fail(() => alert('Forbidden!'))
      .always(() => {
        //NProgress.done();
      });
  }

  _c.on('click', 'a.catalog-link', function (e) {
    e.preventDefault();
    if (this.href !== window.location.href) {
      window.history.pushState(null, '', this.href);
      //window.history.replaceState(null, '', this.href);
    }

    getCatalog(this.href);
  });

  window.addEventListener('popstate', function () {
    if ('/catalog' === window.location.pathname) {
      return window.location.replace('/catalog');
    }
    getCatalog(window.location.href);
  });
}
