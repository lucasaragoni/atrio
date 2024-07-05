// O JavaScript pode ser usado para ocultar a tela de loading após algum evento, como o carregamento completo da página.
window.addEventListener('load', function() {
    const loader = document.querySelector('.loading-screen');
    loader.className += ' hidden'; // adiciona a classe 'hidden' para esconder a tela de loading
  });
  