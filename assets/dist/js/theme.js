function linkSeoHandler(){var e=$(this).find("a").attr("href");window.location.href=e}$(function(){$('a[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);if((e=e.length?e:$("[name="+this.hash.slice(1)+"]")).length)return $("html, body").animate({scrollTop:e.offset().top-120},1e3),!1}})}),$(document).ready(function(){$("[data-carousel]").addClass("owl-carousel")}),$(document).ready(function(){function n(e){return 11===e.replace(/\D/g,"").length?"(00) 00000-0000":"(00) 0000-00009"}var e={onKeyPress:function(e,o,a,t){a.mask(n.apply({},arguments),t)}};$("input[type='tel'] , #phone").mask(n,e)});const allLinkSeo=document.querySelectorAll(".link-seo");for(const k of allLinkSeo)k.addEventListener("click",linkSeoHandler);function getParam(e){e=RegExp("[?&]"+e+"=([^&]*)").exec(window.location.search);return e&&decodeURIComponent(e[1].replace(/\+/g," "))}function getCookie(e){e=document.cookie.match(new RegExp(e+"=([^;]+)"));if(e)return e[1]}function setCookie(e,o,a){var t=new Date,a=(t.setTime(t.getTime()+24*a*60*60*1e3),";expires="+t.toGMTString()),t=new Date;document.cookie=e+"="+o+";time="+t+a+";path=/"}function setSepareteCookie(e,o,a){setCookie(e,o,a)}function removerAcentos(e){var o,a=e,t={a:/[\xE0-\xE6]/g,e:/[\xE8-\xEB]/g,i:/[\xEC-\xEF]/g,o:/[\xF2-\xF6]/g,u:/[\xF9-\xFC]/g,c:/\xE7/g,n:/\xF1/g};for(o in t)a=a.replace(t[o],o);return a}$(document).ready(function(){window.screen.width<=1023&&$(".menu-mobile").click(function(){$(this).toggleClass("open"),$(".menu-list").toggleClass("menu-list--active"),$("body").toggleClass("-locked"),$(".sub-menu").removeClass("-active")})}),$(document).ready(function(){for(var e=["utm_source","utm_medium","utm_campaign","utm_content","utm_term","utm_local","utm_device","ads_rede","ads_campanha","ads_palavra","ads_posicao","ads_canal","ads_localizacao","ads_dispositivo"],o=["origem","mídia","campanha","conteúdo","termo","local","dispositivo","rede_(ads)","campanha_(ads)","palavra_(ads)","posição_(ads)","canal_(ads)","localização_(ads)","dispositivo_(ads)"],a=[],t="",n=0;n<o.length;n++){var r=getParam(e[n]);a.push(r),campoAtual=removerAcentos(o[n]),r&&(console.log("Escrevendo mensagem..."),t+=campoAtual+": "+r+"<br>",setSepareteCookie("_ao5_track_"+campoAtual,r,1))}null==getCookie("_ao5_track_referencia")&&document.referrer&&(console.log("Armazenando origem..."),t+="Url de referência: "+document.referrer+"<br>",setCookie("_ao5_track_referencia",document.referrer,7)),t&&(console.log("Criando cookie..."),setCookie("_ao5_track_valores",a.join("|"),30),setCookie("_ao5_track_mensagem",t,30))});