function showMenu() {
    let menuMobile = document.getElementById('menu');
    let displayValue = menuMobile.style.display;

    if (displayValue == '' || displayValue == 'none') {
        menuMobile.style.display = 'block';
    }else {
        menuMobile.style.display = 'none';
    }
}
$('#button').on('click', function() {
    window.location.href = 'agenda.php';
});