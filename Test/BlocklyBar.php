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
    <style type="text/css">
      #blocklyDiv{
        float:left;
        height: 480px; 
        width: 600px;
      }
    </style>
    <script type="text/javascript">
      function myUpdateFunction() {
        var code = Blockly.JavaScript.workspaceToCode();
        document.getElementById('textarea').value = code;
      }
      Blockly.addChangeListener(myUpdateFunction);
    </script>
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div id="blocklyDiv" class="col-md-4"></div>
      <div id="Draw" class="col-md-5">
        <div class="two-container" style="height:300px"></div>
      </div>

    </div>

    <div id="textarea">TEXTAREA
    </div>
    
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