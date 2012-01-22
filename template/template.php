<html>
  <head>
    <title>No to ACTA!</title>
    <style type="text/css">

#actablackout-text-shadow-box {
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background: #444;
  font-family: Helvetica, Arial, sans-serif;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  -webkit-user-select: none;
  z-index: 100;
}

#actablackout-text-shadow-box #actablackout-tsb-text,
#actablackout-text-shadow-box #actablackout-tsb-link {
  position: absolute;
  top: 40%;
  left: 0;
  width: 100%;
  height: 1em;
  margin: -0.77em 0 0 0;
  font-size: 90px;
  line-height: 1em;
  font-weight: bold;
  text-align: center;
}

#actablackout-text-shadow-box #actablackout-tsb-text {
  font-size: 100px;
  color: transparent;
}

#actablackout-text-shadow-box #actablackout-tsb-link a {
  color: #999;
  text-decoration: none;
}

#actablackout-text-shadow-box #actablackout-tsb-box,
#actablackout-text-shadow-box #actablackout-tsb-wall {
  position: absolute;
  top: 40%;
  left: 0;
  width: 100%;
  height: 60%;
}

#actablackout-text-shadow-box #actablackout-tsb-wall {
  background: #999;
}

#actablackout-text-shadow-box #actablackout-tsb-wall p {
  font-size: 18px;
  line-height: 1.5em;
  text-align: justify;
  color: #222;
  width: 550px;
  margin: 1.5em auto;
}

#actablackout-text-shadow-box #actablackout-tsb-wall p a {
  color: #fff;
}

#actablackout-text-shadow-box #actablackout-tsb-wall p a:hover {
  text-decoration: none;
  color: #000;
  background: #fff;
}

#actablackout-tsb-spot {
  position: absolute;
  top: 0;
  left: 0;
  width: 200%;
  height: 200%;
  pointer-events: none;
  background: -webkit-gradient(radial, center center, 0, center center, 350, from(rgba(0,0,0,0)), to(rgba(0,0,0,1)));
  background: -moz-radial-gradient(center 45deg, circle closest-side, transparent 0, black 350px);
}
    </style>
  </head>
  <body>
    <div id="actablackout-text-shadow-box">
      <div id="actablackout-tsb-box"></div>
      <p id="actablackout-tsb-text"><?php echo variable_get('actablackout_title', 'No to ACTA!'); ?></p>
      <p id="actablackout-tsb-link">
        <a href="<?php echo variable_get('actablackout_link', ''); ?>"><?php echo variable_get('actablackout_title', 'No to ACTA!'); ?></a>
      </p>
      <div id="actablackout-tsb-wall">
        <p><?php echo variable_get('actablackout_explain', ''); ?></p>
      </div>
      <div id="actablackout-tsb-spot"></div>
    </div>
    <noscript>
        <style type="text/css">
          #actablackout-tsb-spot {background: -moz-radial-gradient(25% 25%, circle closest-side, transparent 0, black 350px);-webkit-gradient(radial, 25% 25%, 0, center center, 350, from(rgba(0,0,0,0)), to(rgba(0,0,0,1)))}
        </style>
    </noscript>
    <script type="text/javascript">
      /**
 * Zachary Johnson
 * http://www.zachstronaut.com
 * I place the following code in the public domain.
 */

var actablackout_text = null;
var actablackout_spot = null;
var actablackout_box = null;
var actablackout_boxProperty = '';

init();

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
    </script>
  </body>
</html>