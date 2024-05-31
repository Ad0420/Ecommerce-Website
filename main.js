window.cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

const addToCartButtons = document.querySelectorAll(".add-to-cart");

addToCartButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        const product = button.closest(".product");
        const productName = product.querySelector("h3").textContent;
        const productPrice = product.querySelector("p:last-of-type").textContent;

        const item = {
            name: productName,
            price: productPrice
        };

        cartItems.push(item);
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        console.log("Cart items stored in local storage:", JSON.parse(localStorage.getItem('cartItems')));
    });
});