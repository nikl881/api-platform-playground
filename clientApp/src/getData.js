// getData file
import {baseURL} from './config.js';
import {show} from './view.js';
import {pagination} from "./pagination.js";
import {router} from "./router.js";

export const getData = (event) => {

    axios.get(baseURL + router(event)).then(function (response) {
        console.log(response)
        pagination(response.data);
        show(response.data['hydra:member']);
    })
        .catch(function (error) {
            console.log(error)
        })
}