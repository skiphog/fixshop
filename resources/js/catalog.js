// noinspection DuplicatedCode
// Ну и говнищааааааааа

import NProgress from 'nprogress';
import { isInt } from './helpers';

const
  _c = $('#catalog'),
  cart = $('#cart'),
  total = $('#cart-total');

if (window.history && window.history.pushState) {
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
}

_c.on('keyup change', 'input[data-input]', function (e) {
  const i = $(this);
  const o = parseInt(i.data('input')) || 0;
  const v = i.val();
  const b = i.closest('.product').find('button[data-product]');

  console.log(o, v);

  b.attr('disabled', function () {
    //return !i.val().length || i.val() === '' || isNaN(v) || v < 0;
    return !isInt(v);
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

  if (!isInt(product_id) || !product_id) {
    return;
  }

  const _i = _b.closest('.product').find('input[data-input]');
  const quantity = +_i.val() || 0;
  const old = +_i.data('input');

  if (!isInt(quantity) || quantity < 0 || quantity === old) {
    return;
  }

  $.ajax({
    url: '/cart/update',
    type: 'post',
    dataType: 'json',
    data: { product_id: product_id, quantity: quantity },
    beforeSend: function () {
      _b.attr('disabled', 'disabled').addClass('busy');
    },
    success: function (json) {
      if ('status' in json && 'cart' in json && 'product' in json) {
        if ('update' === json['status']) {
          _b.removeClass('btn-primary').addClass('btn-success').removeAttr('disabled');
        } else {
          _b.removeClass('btn-success').addClass('btn-primary');
        }

        total.toggleClass('hidden', +json['cart']['quantity'] === 0).text(json['cart']['quantity']);

        for (let key in json['cart']) {
          if (json['cart'].hasOwnProperty(key)) {
            cart.find(`.${key}`).text(json['cart'][key]);
          }
        }

        _i.data('input', json['product']['quantity'] || 0);
      }
    },
    error: function () {
      alert('Forbidden!');
    },
    complete: function () {
      _b.removeClass('busy');
    }
  });

});
