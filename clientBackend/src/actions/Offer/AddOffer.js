import {baseURL} from "../../config";

export class AddOffer {


    AddOffer(url, price, priceCurrency, product_id) {
        let params = {
            "url": url,
            "price": price,
            "priceCurrency": priceCurrency,
            "product": "api/products/" + product_id
        }

        let config = {
            headers: {
                'accept': 'application/ld+json',
                "Content-Type": "application/ld+json"
            }
        }

        // eslint-disable-next-line no-undef
        axios.post(baseURL + '/api/offers', params, config)
            .then((response) => {
                console.log(response);
            }).catch((error) => {
            console.log(error)
        })
    }

}

