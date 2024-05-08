document.addEventListener('DOMContentLoaded', function () {
    // Funkce pro zobrazení modálního okna košíku
    function openCartModal() {
        document.getElementById('cart-modal').style.display = 'block';
    }

    // Funkce pro skrytí modálního okna košíku
    function closeCartModal() {
        document.getElementById('cart-modal').style.display = 'none';
    }

    // Přidej posluchač události pro kliknutí na ikonu košíku
    document.getElementById('cart-btn').addEventListener('click', openCartModal);

    // Přidej posluchač události pro kliknutí na tlačítko pro zavření modálního okna košíku
    document.getElementById('close-cart').addEventListener('click', closeCartModal);

    // Přidej posluchač události pro kliknutí mimo modální okno košíku pro jeho zavření
    window.addEventListener('click', function(event) {
        if (event.target === document.getElementById('cart-modal')) {
            closeCartModal();
        }
    });

    // Funkce pro aktualizaci celkové ceny
    function updateTotalPrice() {
        var totalPrice = 0;
        var quantityInputs = document.querySelectorAll('input[name="quantity[]"]');
        quantityInputs.forEach(function(input) {
            var price = parseFloat(input.getAttribute('data-price'));
            var quantity = parseInt(input.value);
            totalPrice += price * quantity;
        });
        document.getElementById('total-price-value').innerText = totalPrice.toFixed(2);
    }

    // Přidání posluchačů událostí pro změnu množství produktu
    var numberInputs = document.querySelectorAll('input[name="quantity[]"]');
    numberInputs.forEach(function(input) {
        input.addEventListener('change', updateTotalPrice); // Zavolej funkci updateTotalPrice při změně hodnoty
    });

    // Funkce pro zobrazení modálního okna přihlášení
    function openLoginModal() {
        document.getElementById('login-modal').style.display = 'block';
    }

    // Funkce pro skrytí modálního okna přihlášení
    function closeLoginModal() {
        document.getElementById('login-modal').style.display = 'none';
    }

    // Přidej posluchače událostí pro kliknutí na ikonu přihlášení
    document.getElementById('login-btn').addEventListener('click', openLoginModal);

    // Přidej posluchače událostí pro kliknutí na tlačítko pro zavření modálního okna přihlášení
    document.getElementById('close-login').addEventListener('click', closeLoginModal);

    // Přidej posluchače událostí pro kliknutí mimo modální okno přihlášení pro jeho zavření
    window.addEventListener('click', function(event) {
        if (event.target === document.getElementById('login-modal')) {
            closeLoginModal();
        }
    });
    
});

