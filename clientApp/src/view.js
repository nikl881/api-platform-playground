import {baseURL} from './config.js';

export function show(data) {

    var item = document.getElementById('products-list');
    var data_item = '';
    item.innerHTML = '';

    for (var i = 0; i <= data.length - 1; i++) {
        if (typeof data[i].thumbnail_image !== 'undefined')
            var imageUrl = baseURL + '/images/thumbnails/' + data[i].thumbnail_image;

        // eslint-disable-next-line no-redeclare
        else var imageUrl = '';

        console.log(data[i].thumbnail_image);

        data_item += '<ul><li><b>' + data[i].name + '</b> ' + data[i].description + '</li><li><img width="100" height="50" src="' + imageUrl + '" alt="img"></li><li>Offers</li>';

        for (var j = 0; j <= data[i].offers.length - 1; j++) {
            data_item += '<ul style="list-style-type: none>';
            data_item += '<li><b> Offer ' + (j + 1) + '</b></li>';
            data_item += '<ul style="list-style-type: none">';

            data_item += '<li><a href="' + data[i].offers[j].url + '">url</a></li>';
            data_item += '<li>' + data[i].offers[j].price + ' ' + data[i].offers[j].priceCurrency + '</li>';

            data_item += '</ul>';
            data_item += '</ul>';
        }
        data_item += '</ul>';
        data_item += '<hr>';

    }
    data_item += '<div class="card-footer">';
    item.innerHTML = data_item;
}