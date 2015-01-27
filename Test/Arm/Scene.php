<!DOCTYPE html>
<html>
<head>
	<title>GUI BlockyMech</title>
</head>
<body>
<div class="row">
	<div id="container" class="col-xs-6 col-md-4" onclick="this.focus();"><canvas ></canvas></div>
</div>
	<script type="text/javascript" src="/BlockyMech/Framework/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/BlockyMech/Framework/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Detector.js"></script> <!-- Detecta si el navegador soporta WebGL -->
	<script type="text/javascript">
	if ( ! Detector.webgl ) { 
			Detector.addGetWebGLMessage();
	}
	</script>
	<script type="text/javascript" src="/BlockyMech/Framework/Three_JS/three.min.js"></script>
    <script type="text/javascript" src="Coordinates.js"></script> <!-- Dibuja el suelo y las mallas de x,y,z -->
	<script type="text/javascript" src="OrbitAndPanControls.js"></script>

	<script type="text/javascript" src="RobotLinks.js"></script>
</body>
</html>