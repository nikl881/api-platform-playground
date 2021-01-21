// getData file
import {baseURL} from './config.js';
import {show} from './view.js';
import {pagination} from "./pagination.js";
import {router} from "./router.js";

export const getData = (event) => {

    // eslint-disable-next-line no-undef
    axios.get(baseURL + router(event)).then(function (response) {
        console.log(response)

        const orderByName = document.getElementById("order-by-name");
        orderByName.addEventListener("click", getData);
        orderByName.style.display = 'block';
        if ( typeof  orderByName.order === 'undefined')
            orderByName.order = 'asc';
            else if ( orderByName == 'asc') orderByName.order = "desc";
            else orderByName.order = 'asc';

        pagination(response.data);
        show(response.data['hydra:member']);
    })
        .catch(function (error) {
            console.log(error)
        })
}