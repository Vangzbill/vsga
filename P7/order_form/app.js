var menuItems = [
    {
        name: 'Burger',
        price: 25000,
        quantity: 0
    },
    {
        name: 'Pizza',
        price: 50000,
        quantity: 0
    },
    {
        name: 'Lava Chicken',
        price: 40000,
        quantity: 0
    }
    
];

function increaseQuantity(index) {
    menuItems[index].quantity++;
    updateQuantityUI(index);
    calculateTotalCost();
}

function decreaseQuantity(index) {
    if (menuItems[index].quantity > 0) {
        menuItems[index].quantity--;
        updateQuantityUI(index);
        calculateTotalCost();
    }
}

function updateQuantityUI(index) {
    var quantityElement = document.getElementById('quantity-' + index);
    quantityElement.textContent = menuItems[index].quantity;
}

function calculateTotalCost() {
    var total = 0;
    for (var i = 0; i < menuItems.length; i++) {
        total += menuItems[i].price * menuItems[i].quantity;
    }
    var totalAmountElement = document.getElementById('total-amount');
    totalAmountElement.textContent = 'Rp ' + total.toLocaleString();
}
