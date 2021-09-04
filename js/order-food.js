var getPrices = document.getElementsByName("list[]");
var getItemsLabel = document.getElementsByClassName("item-label");

var totalInvoice = 0.0;
for (i = 0; i < getPrices.length; i++) {
    getPrices[i].addEventListener("change", function(event) {
        if(event.currentTarget.checked) {
            totalInvoice += parseFloat(event.currentTarget.value);
        } else {
            totalInvoice -= parseFloat(event.currentTarget.value);
        }
        document.getElementById("total-invoice").innerText = "Rp" + totalInvoice;
    });
}
