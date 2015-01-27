<!DOCTYPE html>
<html>
<head>
	<title>Bar Proof</title>
	<script type="text/javascript" src="/BlockyMech/Framework/blockly/blockly_compressed.js"></script>
	<script type="text/javascript" src="/BlockyMech/Framework/blockly/blocks_compressed.js"></script>
	<script type="text/javascript" src="/BlockyMech/Framework/blockly/msg/js/es.js"></script>
	<script type="text/javascript" src="/BlockyMech/Framework/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/BlockyMech/Framework/Three_JS/js/Detector.js"></script> <!-- Detecta si el navegador soporta WebGL -->
	<script type="text/javascript">
	if ( ! Detector.webgl ) { 
			Detector.addGetWebGLMessage();
	}
	</script>
	<script type="text/javascript" src="Arm/q.min.js"></script>
	<script type="text/javascript" src="/BlockyMech/Framework/Three_JS/three.min.js"></script>
	<style>
		body {
			background-color: #fff;
			font-family: sans-serif;
		}
		h1 {
			font-weight: normal;
			font-size: 140%;
		}
		#blocklyDiv{
			float:left;
			height: 480px; 
			width: 600px;
		}
		#Panel{
			display: inline-block;
			width: 500px;
			height: 480px;
			margin: 1em;
			color: #ee1122;
		}
	</style>
	<script type="text/javascript">
		function init() {
			var canvasWidth = window.innerWidth;
			var canvasHeight = window.innerHeight;
			var canvasRatio = canvasWidth / canvasHeight;

		// RENDERER
			renderer = new THREE.WebGLRenderer( { antialias: true } );
			renderer.gammaInput = true;
			renderer.gammaOutput = true;
			renderer.setSize(canvasWidth, canvasHeight);
			renderer.setClearColorHex( 0xAAAAAA, 1.0 );

			var container = document.getElementById('container');
			container.appendChild( renderer.domElement );

		// CAMERA
			camera = new THREE.PerspectiveCamera( 30, canvasRatio, 1, 10000 );
			camera.position.set( -510, 240, 100 );
		// CONTROLS
			//cameraControls = new THREE.OrbitAndPanControls(camera, renderer.domElement);
			//cameraControls.target.set(0,100,0);
		
			fillScene();
		}

		function fillScene() {
			scene = new THREE.Scene();
			scene.fog = new THREE.Fog( 0x808080, 2000, 4000 );

			// LIGHTS
			var ambientLight = new THREE.AmbientLight( 0x222222 );

			var light = new THREE.DirectionalLight( 0xffffff, 1.0 );
			light.position.set( 200, 400, 500 );
			
			var light2 = new THREE.DirectionalLight( 0xffffff, 1.0 );
			light2.position.set( -500, 250, -200 );

			scene.add(ambientLight);
			scene.add(light);
			scene.add(light2);

			var robotBaseMaterial = new THREE.MeshPhongMaterial( { color: 0x6E23BB, specular: 0x6E23BB, shininess: 20 } );
			var torus = new THREE.Mesh( 
			new THREE.TorusGeometry( 22, 15, 32, 32 ), robotBaseMaterial );
			torus.rotation.x = 90 * Math.PI/180;
			scene.add( torus );
		}

	</script>
</head>
<body>
<p>This is a first proof of BlockyMech for use with 3D visualization.</p>

	<div id="blocklyDiv"></div>
	<div id="container" onclick="this.focus();"><canvas width="637" height="358" style="width: 637px; height: 358px;"></canvas></div>

	<xml id="toolbox" style="display: none">
		<block type="controls_if"></block>
		<block type="logic_compare"></block>
		<block type="controls_repeat_ext"></block>
		<block type="math_number"></block>
		<block type="math_arithmetic"></block>
		<block type="text"></block>
		<block type="text_print"></block>
	</xml>

	<script>
		Blockly.inject(document.getElementById('blocklyDiv'),
		{toolbox: document.getElementById('toolbox')});
	</script>

<script >init();</script>
</body>
</html>