<!doctype html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../Framework/jquery-1.11.2.min.js"></script>
    <link href="../Framework/bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../Framework/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <script src="../Framework/two.js-master/build/two.js"></script>
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div id="BlockDiv" class="col-md-4">Bloques de Edicion</div>
      <div id="Draw" class="col-md-8">
        <div class="two-container" style="height:300px"></div>
      </div>

    </div>

  </div>
    <script>
      var elem = document.getElementById('Draw').children[0];

      var two = new Two({
        fullscreen: false,
        autostart: true
      }).appendTo(elem);
      var rect = two.makeRectangle(two.width / 2, two.height / 2, 50 ,50);
      two.bind('update', function() {
        rect.rotation += 0.001;
      });
    </script>
  </body>
</html>