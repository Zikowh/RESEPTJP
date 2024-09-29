document.querySelectorAll('.input-group input').forEach(input => {
    input.addEventListener('focus', () => {
        input.previousElementSibling.classList.add('active');
    });

    input.addEventListener('blur', () => {
        if (input.value === '') {
            input.previousElementSibling.classList.remove('active');
        }
    });
});