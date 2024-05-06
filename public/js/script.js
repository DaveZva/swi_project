document.addEventListener('DOMContentLoaded', function () {
    // Najdi tlačítko pro zobrazení modálního okna košíku
    var cartBtn = document.getElementById('cart-btn');
    // Najdi tlačítko pro zavření modálního okna košíku
    var closeCartBtn = document.getElementById('close-cart');
    // Najdi modální okno pro zobrazení obsahu košíku
    var cartModal = document.getElementById('cart-modal');

    // Funkce pro zobrazení modálního okna košíku
    function openCartModal() {
        cartModal.style.display = 'block';
    }

    // Funkce pro skrytí modálního okna košíku
    function closeCartModal() {
        cartModal.style.display = 'none';
    }

    // Přidej posluchač události pro kliknutí na ikonu košíku
    cartBtn.addEventListener('click', openCartModal);

    // Přidej posluchač události pro kliknutí na tlačítko pro zavření modálního okna košíku
    closeCartBtn.addEventListener('click', closeCartModal);

    // Přidej posluchač události pro kliknutí mimo modální okno košíku pro jeho zavření
    window.addEventListener('click', function(event) {
        if (event.target == cartModal) {
            closeCartModal();
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

    // Přidání posluchačů událostí pro změnu množství produktu
    var numberInputs = document.querySelectorAll('input[type="number"]');
    numberInputs.forEach(function(input) {
        input.addEventListener('change', updateTotalPrice); // Zavolej funkci updateTotalPrice při změně hodnoty
    });
});
