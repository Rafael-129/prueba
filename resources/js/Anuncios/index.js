console.log('Script index.js cargado correctamente');

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM completamente cargado');
    setTimeout(() => {
        const alerta = document.getElementById('alerta');
        if (alerta !== null) {
            console.log('Mensaje de alerta encontrado, eliminando...');
            alerta.remove();
        } else {
            console.log('No se encontró el mensaje de alerta');
        }
    }, 3000);
});
