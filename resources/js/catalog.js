// noinspection DuplicatedCode

import NProgress from 'nprogress';

if (window.history && window.history.pushState) {
  const _c = $('#catalog');

  function getCatalog (link) {
    NProgress.start();
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
        NProgress.done();
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

  _c.on('keyup change', 'input[data-input]', function (e) {
    const i = $(this);
    const b = i.closest('.product').find('button[data-product]');
    const v = parseInt(i.val());

    b.attr('disabled', function () {
      return !i.val().length || i.val() === '' || isNaN(v) || v < 0;
    });

    if (e.keyCode === 13) {
      b.trigger('click')
        .closest('.product-wrapper')
        .next()
        .find('input[data-input]')
        .focus();
    }
  });

  _c.on('click', 'button[data-product]', function () {
    const _b = $(this);
    const product_id = +_b.data('product') || 0;
    if (isNaN(product_id) || !product_id) {
      return;
    }

    let quantity = +_b.closest('.product').find('input[data-input]').val() || 0;
    if (quantity < 0) {
      return;
    }

    $.ajax({
      url: '/cart',
      type: 'post',
      dataType: 'json',
      data: { product_id: product_id, quantity: quantity },
      beforeSend: function () {
        _b.attr('disabled', 'disabled').addClass('busy');
      },
      success: function (json) {

      },
      error: function () {

      },
      complete: function () {
        _b.removeAttr('disabled').removeClass('busy');
      }
    });

  });
}
