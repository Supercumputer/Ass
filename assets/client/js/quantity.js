document.addEventListener('DOMContentLoaded', function () {
    const decreaseButtons = document.querySelectorAll('.decrease');
    const increaseButtons = document.querySelectorAll('.increase');
    const quantityInput = document.querySelectorAll('.quantity-input');

    decreaseButtons.forEach(function(button) {
        button.addEventListener('click', function () {
            let input = button.parentElement.querySelector('.quantity-input');
            let currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        });
    });

    increaseButtons.forEach(function(button) {
        button.addEventListener('click', function () {
            let input = button.parentElement.querySelector('.quantity-input');
            let currentValue = parseInt(input.value);
            if (currentValue < 99) {
                input.value = currentValue + 1;
            }
        });
    });
});