import {Products} from "./src/actions/Products.js";
import {AddOffer} from "./src/actions/Offer/AddOffer.js";
import {Test} from "./src/actions/Offer/AddTest.js";
import {GetOffers} from "./src/actions/Offer/GetOffers";
import {DeleteOffer} from "./src/actions/Offer/DeleteOffer";


// products
new Products
// offer
let addOffer = document.getElementById("add-offer")
addOffer.addEventListener("click", () => {
    let url = document.getElementById("url")
    let price = document.getElementById("price")
    let currency = document.getElementById("currency")
    let product = document.getElementById("product")
    let product_id = product.options[product.selectedIndex].value;
    let Offer = new AddOffer();
    Offer.AddOffer(url.value, parseFloat(price.value), currency.value, product_id);
});

// test
let newName = new Test('test');
console.log(newName)

new GetOffers()
let deleteOffer = document.getElementById("delete-offer-button")
deleteOffer.addEventListener("click", () => {
    let offer = document.getElementById("delete-offer")
    let offer_id = offer.options[offer.selectedIndex].value;
    let deleteOffer = new DeleteOffer();
    deleteOffer.DeleteOffer(offer_id)
})