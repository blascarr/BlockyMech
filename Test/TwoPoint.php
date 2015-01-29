<!doctype html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/BlockyMech/Framework/jquery-1.11.2.min.js"></script>
    <link href="/BlockyMech/Framework/bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="/BlockyMech/Framework/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    <script src="/BlockyMech/Framework/two.js-master/build/two.js"></script>
    <script type="text/javascript" src="/BlockyMech/Framework/blockly/blockly_compressed.js"></script>
    <script type="text/javascript" src="/BlockyMech/Framework/blockly/blocks_compressed.js"></script>
    <script type="text/javascript" src="/BlockyMech/Framework/blockly/msg/js/es.js"></script>
    <script type="text/javascript" src="/BlockyMech/Framework/blockly/javascript_compressed.js"></script>
    <script type="text/javascript" src="/BlockyMech/Framework/blockly/blocks/BlockyMech_blocks.js"></script>
    
    <style type="text/css">
      #blocklyDiv{
        float:left;
        height: 480px; 
        width: 600px;
      }
    </style>

  </head>
  <body>
  <button onclick="showCode()">Show JavaScript</button>
  <div class="container">
    <div class="row">
      <div id="blocklyDiv" class="col-md-4"></div>
      <div id="Draw" class="col-md-5">
        <div class="two-container" style="height:300px"></div>
      </div>

    </div>

    <div id="textarea">TEXTAREA</div>
    
    <xml id="toolbox" style="display: none">
      <block type="point"></block>
      <block type="logic_compare"></block>
      <block type="controls_repeat_ext"></block>
      <block type="math_number"></block>
      <block type="math_arithmetic"></block>
      <block type="text"></block>
      <block type="text_print"></block>
    </xml>

    <script type="text/javascript" src="/BlockyMech/Framework/blockly/generators/javascript/BlockyMech_blocks.js"></script>

    <script type="text/javascript">
      function showCode() {
      // Generate JavaScript code and display it.
      Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
      var code = Blockly.JavaScript.workspaceToCode();
      alert(code);
    }
    </script>

    <script type="text/javascript">
      function myUpdateFunction() {
        var code = Blockly.JavaScript.workspaceToCode();
        document.getElementById('textarea').html = code;
      }

      window.addEventListener('load', BlocklyInit);

      function BlocklyInit(){
        Blockly.inject(document.getElementById('blocklyDiv'),
          {toolbox: document.getElementById('toolbox')});
        //Blockly.addChangeListener(myUpdateFunction);
      }
    </script>
  </div>
    <script>
      var elem = document.getElementById('Draw').children[0];

      var two = new Two({
        fullscreen: false,
        autostart: true
      }).appendTo(elem);
      //x=0 , y=0 situa el cuadrado en la esquina superior izquierda
      rect = GroundJoint(two.width / 2,two.height / 2);
      rect = floatJoint(two.width / 2,two.height / 2);
      //anch=rect.center();
      //alert(anch.x);
      //rect.center (-50,20);
      //var anchor = new Two.Anchor(x, y, x+10, y+10, x-5, y+5,'');
      //two.add(anchor)
      two.add(rect);
      two.bind('update', function() {
        //rect.rotation += 0.01;
      });

      function GroundJoint(x,y){
        var joint =  two.makeCircle(x ,y , 5);
        side=15; //Triangle side length
        var triangle = two.makePolygon(x, y, x+side/2, y+side, x-side/2, y+side, false);
        line_l=5;
        hol=3; // Holgura
        sep = side +hol; // separacion
        l=line_l/Math.sqrt(2);
        var line = two.makeLine(x+l, y+sep, x-l, y+sep+2*l);
        var line2 = line.clone();
        val_x=5;
        var vector = new Two.Vector(val_x, 0);
        line2.translation.add(line2.translation,vector);
        vector = new Two.Vector(-val_x, 0);
        var line3 = line.clone();
        line3.translation.add(line3.translation,vector);
        var group = new Two.Group();
        var centroid = new Two.Vector(x, y);

        group.add(joint,triangle,line,line2,line3);
        return group;
      }

      function floatJoint(x,y){
        var joint =  two.makeCircle(x ,y , 5);
        side=15; //Triangle side length
        var rectangle = two.makeRectangle(x, y, 2*side,side);
        line_l=5;
        hol=3; // Holgura
        sep = side/2 +hol; // separacion
        l=line_l/Math.sqrt(2);
        var line = two.makeLine(x+l, y+sep, x-l, y+sep+2*l);
        var line2 = line.clone();
        val_x=7;
        var vector = new Two.Vector(val_x, 0);
        line2.translation.add(line2.translation,vector);
        vector = new Two.Vector(-val_x, 0);
        var line3 = line.clone();
        line3.translation.add(line3.translation,vector);
        var group = new Two.Group();
        var centroid = new Two.Vector(x, y);

        group.add(rectangle,joint,line,line2,line3);
        return group;
      }
    </script>
  </body>
</html>