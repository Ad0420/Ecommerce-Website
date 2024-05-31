document.addEventListener("DOMContentLoaded", function () {
    const s_button = document.querySelector(".search-button");
    const input_searcs = document.querySelector(".search-input");
    const products = document.querySelectorAll(".product");
    const pagination = document.querySelector(".pagination ul");
    const itemsperpage = 6; 
    let currentPage = 1;

    function page_func(page) {
        const startIndex = (page - 1) * itemsperpage;
        const endIndex = startIndex + itemsperpage;

        products.forEach(function (product, index) {
            if (index >= startIndex && index < endIndex) {
                product.style.display = "block";
            } else {
                product.style.display = "none";
            }
        });
    }

    function pagination_vals() {
        const totalPages = Math.ceil(products.length / itemsperpage);

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement("li");
            const a = document.createElement("a");
            a.href = "#";
            a.textContent = i;
            a.classList.add("page-link");
            li.classList.add("page-item");
            li.appendChild(a);
            pagination.appendChild(li);

            a.addEventListener("click", function (event) {
                event.preventDefault();
                currentPage = i;
                page_func(currentPage);
            });
        }
    }

    page_func(currentPage);
    pagination_vals();

    s_button.addEventListener("click", function (event) {
        event.preventDefault();
        const searchTerm = input_searcs.value.trim().toLowerCase();
        products.forEach(function (product) {
            const productName = product.querySelector("h3").textContent.toLowerCase();
            if (productName.includes(searchTerm)) {
                product.style.display = "block";
            } else {
                product.style.display = "none";
            }
        });
    });

    const checkoutButton = document.querySelector(".btn-outline-success");
    checkoutButton.addEventListener("click", function (event) {
        event.preventDefault();
        window.location.href = "checkout.html";
    });
});
