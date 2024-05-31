const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

function displayCartItems() {
    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    const cartItemsContainer = document.getElementById('cart-items');

    if (cartItems.length === 0) {
        cartItemsContainer.innerHTML = '<p>Cart is empty</p>';
    } 
    
    else {
        const table = document.createElement('table');
        table.classList.add('table');
        const headerRow = table.insertRow(0);
        const headers = ['Delete', 'Product', 'Price'];
        headers.forEach(headerText => {
            const th = document.createElement('th');
            th.textContent = headerText;
            headerRow.appendChild(th);
        });

        const tbody = document.createElement('tbody');
        let totalPrice = 0;
        cartItems.forEach((item, index) => {
            const row = tbody.insertRow();
            const del_cell = row.insertCell(0);
            const name_cell = row.insertCell(1);
            const price_vals = row.insertCell(2);

            const del_button = document.createElement('button');
            del_button.type = 'button';
            del_button.classList.add('btn', 'btn-danger');
            del_button.textContent = 'Delete';
            del_button.addEventListener('click', () => {
                cartItems.splice(index, 1);
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                displayCartItems();
            });
            del_cell.appendChild(del_button);

            name_cell.textContent = item.name;
            price_vals.textContent = item.price;
            totalPrice += parseFloat(item.price);
        });

        table.appendChild(tbody);
        cartItemsContainer.innerHTML = '';
        cartItemsContainer.appendChild(table);

        const totalRow = table.insertRow();
        const totalLabelCell = totalRow.insertCell(0);
        const totalPriceCell = totalRow.insertCell(1);
        totalLabelCell.textContent = 'Total:';
        totalPriceCell.textContent = '$' + totalPrice.toFixed(2);
        totalLabelCell.colSpan = 2;
        totalPriceCell.colSpan = 1;
        totalPriceCell.style.fontWeight = 'bold';
    }
}

displayCartItems();
