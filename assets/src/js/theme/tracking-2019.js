function getParam(p) {

    var match = RegExp('[?&]' + p + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));

}

function getCookie(name) {

    var match = document.cookie.match(new RegExp(name + '=([^;]+)'));
    if (match) return match[1];

}

function setCookie(name, value, days) {

    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = ";expires=" + date.toGMTString();
    // var domain = ";domain =.ribeiromartins.adv.br"
    var domain = ""
    var path = ";path=/";
    var thisdate = new Date();
    document.cookie = name + "=" + value + ";time=" + thisdate + expires + domain + path;

};

function setSepareteCookie(cookieName, valor, tempo){
    setCookie(cookieName, valor, tempo);
};

function removerAcentos( newStringComAcento ) {
    var string = newStringComAcento;
      var mapaAcentosHex 	= {
          a : /[\xE0-\xE6]/g,
          e : /[\xE8-\xEB]/g,
          i : /[\xEC-\xEF]/g,
          o : /[\xF2-\xF6]/g,
          u : /[\xF9-\xFC]/g,
          c : /\xE7/g,
          n : /\xF1/g
      };
  
      for ( var letra in mapaAcentosHex ) {
          var expressaoRegular = mapaAcentosHex[letra];
          string = string.replace( expressaoRegular, letra );
      }
  
      return string;
  }

$(document).ready(function() {

    var params = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'utm_local', 'utm_device', 'ads_rede', 'ads_campanha', 'ads_palavra', 'ads_posicao', 'ads_canal', 'ads_localizacao', 'ads_dispositivo'];

    var campos = ['origem', 'mídia', 'campanha', 'conteúdo', 'termo', 'local', 'dispositivo', 'rede_(ads)', 'campanha_(ads)', 'palavra_(ads)', 'posição_(ads)', 'canal_(ads)', 'localização_(ads)', 'dispositivo_(ads)'];
    

    var valores = [];
    var mensagem = '';

    for (var i = 0; i < campos.length; i++) {
        // console.log('1');

        var valor = getParam(params[i]);

        valores.push(valor);

        campoAtual = removerAcentos(campos[i]);

        if (valor) {
            console.log('Escrevendo mensagem...');

            mensagem += campoAtual + ': ' + valor + '<br>';

            var cookieName = "_ao5_track_" + campoAtual;

            setSepareteCookie(cookieName, valor, 1);
        }

    }

    if (getCookie('_ao5_track_referencia') == undefined && document.referrer) {

        console.log('Armazenando origem...');

        mensagem += 'Url de referência: ' + document.referrer + '<br>';

        setCookie('_ao5_track_referencia', document.referrer, 7);
    }

    if (mensagem) {

        console.log('Criando cookie...');

        setCookie('_ao5_track_valores', valores.join('|'), 30);
        setCookie('_ao5_track_mensagem', mensagem, 30);

    }

});