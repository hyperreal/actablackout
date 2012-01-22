/**
 * Zachary Johnson
 * http://www.zachstronaut.com
 * I place the following code in the public domain.
 */

var actablackout_text = null;
var actablackout_spot = null;
var actablackout_box = null;
var actablackout_boxProperty = '';

$(document).ready(function() {
  init();
})

function init() {
    actablackout_text = document.getElementById('actablackout-tsb-text');
    actablackout_spot = document.getElementById('actablackout-tsb-spot');
    actablackout_box = document.getElementById('actablackout-tsb-box');

    if (typeof actablackout_box.style.webkitBoxShadow == 'string') {
        actablackout_boxProperty = 'webkitBoxShadow';
    } else if (typeof actablackout_box.style.MozBoxShadow == 'string') {
        actablackout_boxProperty = 'MozBoxShadow';
    } else if (typeof actablackout_box.style.boxShadow == 'string') {
        actablackout_boxProperty = 'boxShadow';
    }

    if (actablackout_text && actablackout_spot && actablackout_box) {
        document.getElementById('actablackout-text-shadow-box').onmousemove = onMouseMove;
        document.getElementById('actablackout-text-shadow-box').ontouchmove = function (e) {
          e.preventDefault();
          e.stopPropagation();
          onMouseMove({clientX: e.touches[0].clientX, clientY: e.touches[0].clientY});
        };
    }

    onMouseMove({clientX: Math.floor(window.innerWidth / 2), clientY: Math.floor(window.innerHeight / 2.75)});
}

function onMouseMove(e) {
    var xm = (e.clientX - Math.floor(window.innerWidth / 2)) * 0.4;
    var ym = (e.clientY - Math.floor(window.innerHeight / 3)) * 0.4;
    var d = Math.round(Math.sqrt(xm*xm + ym*ym) / 5);
    actablackout_text.style.textShadow = -xm + 'px ' + -ym + 'px ' + (d + 10) + 'px black';

    if (actablackout_boxProperty) {
        actablackout_box.style[actablackout_boxProperty] = '0 ' + -ym + 'px ' + (d + 30) + 'px black';
    }

    xm = e.clientX - window.innerWidth;
    ym = e.clientY - window.innerHeight;
    actablackout_spot.style.backgroundPosition = xm + 'px ' + ym + 'px';
}