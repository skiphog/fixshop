import { isInt } from './helpers';

const
  cart = $('#cart'),
  total = $('#cart-total'),
  basket = $('#basket');
let timer = null;

function cartChange (product_id, value, input) {
  $.ajax({
    url: '/cart/update',
    type: 'post',
    dataType: 'json',
    data: { product_id: product_id, quantity: value },
    success: function (json) {
      if ('status' in json && 'cart' in json && 'product' in json) {
        if ('update' === json['status']) {
          input.parent().next().text(`${json['product']['weight']} кг`).next().next().text(`${json['product']['amount']} р.`);
        } else {
          input.parent().next().text('0 кг').next().next().text('0 р.');
        }

        total.toggleClass('hidden', +json['cart']['quantity'] === 0).text(json['cart']['quantity']);

        for (let key in json['cart']) {
          if (json['cart'].hasOwnProperty(key)) {
            [cart, basket].forEach(function (item) {
              item.find(`.${key}`).text(json['cart'][key]);
            });
          }
        }
      }
    },
    error: function () {
      alert('Forbidden!');
    }
  });
}

basket.on('input propertyChange', '.fix-input-cart', function () {
  const input = $(this);
  clearTimeout(timer);

  timer = setTimeout(function () {
    const product_id = +input.data('id');
    const value = +input.val();

    if (!isInt(product_id) || product_id === 0 || !isInt(value) || value < 0) {
      return;
    }

    cartChange(product_id, value, input);
  }, 500);
});

basket.on('click', '.btn-destroy', function () {
  const button = $(this);
  const product_id = +button.data('id');

  if (!isInt(product_id) || product_id === 0) {
    return;
  }

  cartChange(product_id, 0, button);
  button.closest('tr').fadeOut();
});

basket.on('click', '#cart-destroy', function () {
  $(this).prev().toggleClass('hidden');
});

$('#phone').mask('+7 (999) 999-99-99');
