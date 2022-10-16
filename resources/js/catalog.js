import NProgress from 'nprogress';

if (window.history && history.pushState) {
  window.addEventListener('popstate', function () {
    console.log(window.location.href);
  });

  const _c = $('#catalog');
  let send = true;

  _c.on('click', 'a.catalog-link', function (e) {
    e.preventDefault();
    if (send) {
      send = false;
      const link = this.href;
      NProgress.start();

      $.getJSON(this.href)
        .done(function (json) {
          if ('title' in json && 'content' in json) {
            document.title = json['title'];
            _c.html(json['content']);
            window.history.pushState({}, '', link);
            $('html:not(:animated),body:not(:animated)').animate({ scrollTop: 0 }, 0);
          }
        })
        .fail(() => alert('Forbidden!'))
        .always(() => {
          NProgress.done();
          send = true;
        });
    }
  });
}
