$('#fotoId').on('change', function(){
    // cria o objeto de FileReader
    var reader = new FileReader(); //responsável por manipular a imagem, convertendo para o que a gnt quer
    
    //pega o elemento(svg) do html
    var svgTag = document.getElementsByTagName('svg')[0];
    if(svgTag != null) { //ou seja, diferente de null ou undefined
         //cria a tag img
        var imgTag = document.createElement('img');
    
        // adiciona a tag img o atributo id com valor avatarId
        imgTag.setAttribute('id', 'avatarId');
        // substitui o elemento svg para o elemento img -> troca a svg para a tag img
        svgTag.parentNode.replaceChild(imgTag, svgTag); //a tag "pai" do svg onde ele está localizado é a div, sempre o que está na chave anterior
    }
   
    reader.onloadend = function() { //onloadend -> executar quando terminar de carregar 
        $('#avatarId').attr('src', reader.result);
    };
    reader.readAsDataURL(this.files[0]);
});


// adiciona valor ao atributo src
//    $('#avatarId').attr('src', './imagens/avatar.png'); //poderia substituir por imgTag.setAttribute('src', './imagens/avatar.png'); O que está sendo utilizado está em jQuery, esse da opção está em js

// include x require -> os dois incluem arquivo de php na página, a diferença entre eles é: require se tiver um erro ele para na linha onde está o erro, seja no inicio, meio ou fim.