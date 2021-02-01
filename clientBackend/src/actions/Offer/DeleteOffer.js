import {baseURL} from "../../config";


export class DeleteOffer {


    DeleteOffer(delete_url)
    {
        // eslint-disable-next-line no-undef
        axios.delete(baseURL + delete_url)
            .then((response) => {
                console.log(response);
            })
            .catch( (error) => {
                console.log(error);
            });
    }
}

