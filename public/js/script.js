function toggleCardFields() {
    var selectBox = document.getElementById("typ");
    var cardFields = document.getElementById("platebni_karta_fields");

    // Pokud je vybrána možnost "Platební karta", zobrazit pole pro zadání údajů o kartě, jinak je skrýt
    if (selectBox.value === "platebni_karta") {
        cardFields.style.display = "block";
    } else {
        cardFields.style.display = "none";
    }
}
document.addEventListener('DOMContentLoaded', function () {
    // Najdi tlačítko s ID "login-btn"
    var loginBtn = document.getElementById('login-btn');

    // Najdi modální okno
    var modal = document.getElementById('modal');

    // Při kliknutí na tlačítko "login-btn" zobraz modální okno
    loginBtn.onclick = function () {
        modal.style.display = 'block';
    };

    // Při kliknutí na tlačítko pro zavření odstraň modální okno
    var closeBtn = document.querySelector('.close');
    closeBtn.onclick = function () {
        modal.style.display = 'none';
    };

    // Při kliknutí mimo modální okno odstraň ho také
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
    // Kosik
    var cartBtn = document.getElementById('cart-btn');
    var closeCartBtn = document.getElementById('close-cart');
    // Najdi modální okno pro zobrazení obsahu košíku
    var cartModal = document.getElementById('cart-modal');

    // Přidej posluchač události pro kliknutí na ikonu košíku
    cartBtn.addEventListener('click', function() {
        cartModal.style.display = 'block';
    });

// Přidání posluchače událostí pro kliknutí na křížek
    closeCartBtn.addEventListener('click', function() {
        cartModal.style.display = 'none'; // Skrytí modálního okna po kliknutí na křížek
    });

    // Přidej posluchač události pro zavření modálního okna
    window.addEventListener('click', function(event) {
        if (event.target == cartBtn) {
            modal.style.display = 'none';
        }
    });

    // Funkce pro aktualizaci celkové ceny
    function updateTotalPrice() {
        var totalPrice = 0;
        // Najdi všechna políčka s množstvím
        var quantityInputs = document.querySelectorAll('input[name="quantity[]"]');
        // Projdi všechna políčka a přidej k celkové ceně součin ceny produktu a množství
        quantityInputs.forEach(function(input) {
            var price = parseFloat(input.getAttribute('data-price')); // Získání ceny produktu
            var quantity = parseInt(input.value); // Získání množství
            totalPrice += price * quantity; // Aktualizace celkové ceny
        });
        // Zobraz novou celkovou cenu
        document.getElementById('total-price').innerText = "Celková cena: " + totalPrice.toFixed(2) + " Kč";
    }

    // Přidání posluchače události pro odeslání formuláře
    document.querySelector('form').addEventListener('submit', updateTotalPrice);

    // Při načtení stránky spusťte aktualizaci ceny
    window.addEventListener('load', updateTotalPrice);

    // Najdi všechna políčka pro množství a přidej posluchač události změny hodnoty
    var numberInputs = document.querySelectorAll('input[type="number"]');
    numberInputs.forEach(function(input) {
        input.addEventListener('change', updateTotalPrice); // Zavolej funkci updateCart při změně hodnoty
    });

    function updateQuantity(productId, newQuantity) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Aktualizace obsahu košíku po úspěšné aktualizaci množství
                updateCartContent();
            }
        };
        xhr.send("product_id=" + productId + "&quantity=" + newQuantity);
    }

    function addToCart(productId, quantity) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "add_to_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Aktualizace obsahu košíku po úspěšném přidání produktu
                updateCartContent();
            }
        };
        xhr.send("product_id=" + productId + "&quantity=" + quantity);
    }

    //var removeButtons = document.querySelectorAll('.remove-from-cart-btn');
    // Funkce pro odeslání požadavku na odebrání produktu z košíku
    function removeFromCart(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'removeFromCart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Zde můžete aktualizovat obsah košíku nebo provést další akce
                console.log('Položka byla úspěšně odebrána z košíku.');
            }
        };
        xhr.send('remove_product_id=' + productId);
    }

    // Najdi všechna tlačítka pro odebrání z košíku a přidej na ně posluchače událostí
    var removeButtons = document.querySelectorAll('.remove-from-cart-btn');
    removeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = button.getAttribute('data-product-id');
            removeFromCart(productId);
        });
    });




});function toggleCardFields() {
    var selectBox = document.getElementById("typ");
    var cardFields = document.getElementById("platebni_karta_fields");

    // Pokud je vybrána možnost "Platební karta", zobrazit pole pro zadání údajů o kartě, jinak je skrýt
    if (selectBox.value === "platebni_karta") {
        cardFields.style.display = "block";
    } else {
        cardFields.style.display = "none";
    }
}
document.addEventListener('DOMContentLoaded', function () {
    // Najdi tlačítko s ID "login-btn"
    var loginBtn = document.getElementById('login-btn');

    // Najdi modální okno
    var modal = document.getElementById('modal');

    // Při kliknutí na tlačítko "login-btn" zobraz modální okno
    loginBtn.onclick = function () {
        modal.style.display = 'block';
    };

    // Při kliknutí na tlačítko pro zavření odstraň modální okno
    var closeBtn = document.querySelector('.close');
    closeBtn.onclick = function () {
        modal.style.display = 'none';
    };

    // Při kliknutí mimo modální okno odstraň ho také
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
    // Kosik
    var cartBtn = document.getElementById('cart-btn');
    var closeCartBtn = document.getElementById('close-cart');
    // Najdi modální okno pro zobrazení obsahu košíku
    var cartModal = document.getElementById('cart-modal');

    // Přidej posluchač události pro kliknutí na ikonu košíku
    cartBtn.addEventListener('click', function() {
        cartModal.style.display = 'block';
    });

// Přidání posluchače událostí pro kliknutí na křížek
    closeCartBtn.addEventListener('click', function() {
        cartModal.style.display = 'none'; // Skrytí modálního okna po kliknutí na křížek
    });

    // Přidej posluchač události pro zavření modálního okna
    window.addEventListener('click', function(event) {
        if (event.target == cartBtn) {
            modal.style.display = 'none';
        }
    });

    // Funkce pro aktualizaci celkové ceny
    function updateTotalPrice() {
        var totalPrice = 0;
        // Najdi všechna políčka s množstvím
        var quantityInputs = document.querySelectorAll('input[name="quantity[]"]');
        // Projdi všechna políčka a přidej k celkové ceně součin ceny produktu a množství
        quantityInputs.forEach(function(input) {
            var price = parseFloat(input.getAttribute('data-price')); // Získání ceny produktu
            var quantity = parseInt(input.value); // Získání množství
            totalPrice += price * quantity; // Aktualizace celkové ceny
        });
        // Zobraz novou celkovou cenu
        document.getElementById('total-price').innerText = "Celková cena: " + totalPrice.toFixed(2) + " Kč";
    }

    // Přidání posluchače události pro odeslání formuláře
    document.querySelector('form').addEventListener('submit', updateTotalPrice);

    // Při načtení stránky spusťte aktualizaci ceny
    window.addEventListener('load', updateTotalPrice);

    // Najdi všechna políčka pro množství a přidej posluchač události změny hodnoty
    var numberInputs = document.querySelectorAll('input[type="number"]');
    numberInputs.forEach(function(input) {
        input.addEventListener('change', updateTotalPrice); // Zavolej funkci updateCart při změně hodnoty
    });

    function updateQuantity(productId, newQuantity) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Aktualizace obsahu košíku po úspěšné aktualizaci množství
                updateCartContent();
            }
        };
        xhr.send("product_id=" + productId + "&quantity=" + newQuantity);
    }

    function addToCart(productId, quantity) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "add_to_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Aktualizace obsahu košíku po úspěšném přidání produktu
                updateCartContent();
            }
        };
        xhr.send("product_id=" + productId + "&quantity=" + quantity);
    }

    //var removeButtons = document.querySelectorAll('.remove-from-cart-btn');
    // Funkce pro odeslání požadavku na odebrání produktu z košíku
    function removeFromCart(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'removeFromCart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Zde můžete aktualizovat obsah košíku nebo provést další akce
                console.log('Položka byla úspěšně odebrána z košíku.');
            }
        };
        xhr.send('remove_product_id=' + productId);
    }

    // Najdi všechna tlačítka pro odebrání z košíku a přidej na ně posluchače událostí
    var removeButtons = document.querySelectorAll('.remove-from-cart-btn');
    removeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = button.getAttribute('data-product-id');
            removeFromCart(productId);
        });
    });




});