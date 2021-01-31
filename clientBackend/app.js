import {Products} from "./src/actions/Products.js";
import {AddOffer} from "./src/actions/Offer/AddOffer.js";
import {Test} from "./src/actions/Offer/Test";

new Test()

let test = document.getElementById("testing");

// offer
new Products
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