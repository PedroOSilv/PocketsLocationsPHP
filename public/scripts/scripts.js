// pega o elemnto btn-change


var btnChange = document.getElementById('btn-change');

var statusMap = true;

btnChange.addEventListener('click', function() {

    if(statusMap){
        document.getElementById('map').classList.add('hidden');
        document.getElementById('map').classList.remove('show');
        document.getElementById("lateral-esquerda").classList.add('show');
        document.getElementById("lateral-esquerda").classList.remove('hidden');
        statusMap = false;
        console.log('acendeu');

        // muda a imagem de background do botão
         btnChange.style.backgroundImage = "url('public/images/pin-de-localizacao.png')";

    }else{
        document.getElementById('map').classList.add('show');
        document.getElementById('map').classList.remove('hidden');

        document.getElementById("lateral-esquerda").classList.add('hidden');
        document.getElementById("lateral-esquerda").classList.remove('show');
        statusMap = true;
        console.log('apagou');

        btnChange.style.backgroundImage = "url('public/images/menu-aberto.png')";
    }

});