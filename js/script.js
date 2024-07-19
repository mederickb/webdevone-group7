document.querySelector('.list-task').addEventListener('click', function() {
    const items = document.querySelectorAll('.list-item');
    items.forEach(item => {
        item.style.display = item.style.display === 'none' ? 'block' : 'none';
    });
});
