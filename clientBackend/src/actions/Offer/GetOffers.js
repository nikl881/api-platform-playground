import {baseURL} from "../../config";

export class GetOffers {

    constructor()
    {
        // Hydra member = object met de data via API.
        // eslint-disable-next-line no-undef
        axios.get(baseURL + '/api/offers')
            .then((response) => {
                // console.log(response.data['hydra:member']);
                response.data['hydra:member'].forEach(offer => {
                    this.addOptionElement(offer.url, offer['@id'])
                });
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    }

    addOptionElement(text, value)
    {
        let option = document.createElement("option");
        option.text = text;
        option.value = value;
        let select = document.getElementById("delete-offer");
        select.appendChild(option);
    }
}

