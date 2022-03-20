"use strict";function darkMode(){const e=document.querySelector(".dark-mode-icon");function n(){"true"===sessionStorage.getItem("dark-mode")?document.body.classList.add("dark-mode"):document.body.classList.remove("dark-mode")}n(),e.onclick=()=>{"true"===sessionStorage.getItem("dark-mode")?sessionStorage.setItem("dark-mode","false"):sessionStorage.setItem("dark-mode","true"),n(),textareaValidation()}}function mobileMenu(){document.querySelector(".mobile-menu").onclick=()=>{document.querySelector(".nav-header").classList.toggle("show-menu")}}function aditionalFields_contactForm(){document.querySelectorAll('input[name="contacto"]').forEach(e=>{e.onclick=e=>{const n=document.querySelector("#contactType");"telefono"===e.target.value?n.innerHTML='\n                    <label for="telefono">Teléfono:</label>\n                    <input id="telefono" type="tel" placeholder="Tu Teléfono" name="telefono" required>\n                    \n                    <p>Elija la fecha y la hora para la llamada:</p>\n\n                    <label for="fecha">Fecha:</label>\n                    <input id="fecha" type="date" name="fecha">\n\n                    <label for="hora">Hora:</label>\n                    <input id="hora" type="time" min="09:00" max="18:00" name="hora">\n                ':n.innerHTML='\n                    <label for="email">E-mail:</label>\n                    <input id="email" type="email" placeholder="Tu Email" name="email" required>\n                '}})}function removeAlerts(){const e=document.querySelectorAll(".alert");e&&e.forEach(e=>{let n;n=e.classList.contains("user-logued")?6e3:5e3,setTimeout(()=>{e.remove()},n)})}function textareaValidation(){const e=document.querySelector("textarea.min50char");if(e){let t=document.querySelector(".textareaValid");t||(t=document.createElement("P"),t.classList.add("textareaValid"),t.style.marginTop="-20px",e.parentNode.insertBefore(t,e.nextSibling));const o=50;let a=e.value.trim().length;function n(){0===a?document.body.classList.contains("dark-mode")?t.style.color="white":t.style.color="black":a<50?t.style.color="red":a>=50&&(t.style.color="green")}n(),t.textContent=`${a} de ${o} caracteres necesarios.`,e.oninput=e=>{a=e.target.value.trim().length,t.textContent=`${a} de ${o} caracteres necesarios.`,n()}}}function xToCloseAlerts(){const e=document.querySelectorAll(".x-close");e&&e.forEach(e=>{e.onclick=()=>{e.parentNode.remove()}})}
/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-webp-setclasses !*/document.addEventListener("DOMContentLoaded",()=>{darkMode(),mobileMenu(),aditionalFields_contactForm(),removeAlerts(),textareaValidation(),xToCloseAlerts()}),function(e,n,t){function o(e,n){return typeof e===n}function a(e){var n=u.className,t=A._config.classPrefix||"";if(d&&(n=n.baseVal),A._config.enableJSClass){var o=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(o,"$1"+t+"js$2")}A._config.enableClasses&&(n+=" "+t+e.join(" "+t),d?u.className.baseVal=n:u.className=n)}function l(e,n){if("object"==typeof e)for(var t in e)c(e,t)&&l(t,e[t]);else{var o=(e=e.toLowerCase()).split("."),i=A[o[0]];if(2==o.length&&(i=i[o[1]]),void 0!==i)return A;n="function"==typeof n?n():n,1==o.length?A[o[0]]=n:(!A[o[0]]||A[o[0]]instanceof Boolean||(A[o[0]]=new Boolean(A[o[0]])),A[o[0]][o[1]]=n),a([(n&&0!=n?"":"no-")+o.join("-")]),A._trigger(e,n)}return A}var i=[],r=[],s={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout((function(){n(t[e])}),0)},addTest:function(e,n,t){r.push({name:e,fn:n,options:t})},addAsyncTest:function(e){r.push({name:null,fn:e})}},A=function(){};A.prototype=s,A=new A;var c,u=n.documentElement,d="svg"===u.nodeName.toLowerCase();!function(){var e={}.hasOwnProperty;c=o(e,"undefined")||o(e.call,"undefined")?function(e,n){return n in e&&o(e.constructor.prototype[n],"undefined")}:function(n,t){return e.call(n,t)}}(),s._l={},s.on=function(e,n){this._l[e]||(this._l[e]=[]),this._l[e].push(n),A.hasOwnProperty(e)&&setTimeout((function(){A._trigger(e,A[e])}),0)},s._trigger=function(e,n){if(this._l[e]){var t=this._l[e];setTimeout((function(){var e;for(e=0;e<t.length;e++)(0,t[e])(n)}),0),delete this._l[e]}},A._q.push((function(){s.addTest=l})),A.addAsyncTest((function(){function e(e,n,t){function o(n){var o=!(!n||"load"!==n.type)&&1==a.width;l(e,"webp"===e&&o?new Boolean(o):o),t&&t(n)}var a=new Image;a.onerror=o,a.onload=o,a.src=n}var n=[{uri:"data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",name:"webp"},{uri:"data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",name:"webp.alpha"},{uri:"data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",name:"webp.animation"},{uri:"data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",name:"webp.lossless"}],t=n.shift();e(t.name,t.uri,(function(t){if(t&&"load"===t.type)for(var o=0;o<n.length;o++)e(n[o].name,n[o].uri)}))})),function(){var e,n,t,a,l,s;for(var c in r)if(r.hasOwnProperty(c)){if(e=[],(n=r[c]).name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(a=o(n.fn,"function")?n.fn():n.fn,l=0;l<e.length;l++)1===(s=e[l].split(".")).length?A[s[0]]=a:(!A[s[0]]||A[s[0]]instanceof Boolean||(A[s[0]]=new Boolean(A[s[0]])),A[s[0]][s[1]]=a),i.push((a?"":"no-")+s.join("-"))}}(),a(i),delete s.addTest,delete s.addAsyncTest;for(var f=0;f<A._q.length;f++)A._q[f]();e.Modernizr=A}(window,document);
//# sourceMappingURL=scripts.js.map
