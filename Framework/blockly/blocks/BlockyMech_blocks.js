Blockly.Blocks['point'] = {
  init: function() {
    this.setHelpUrl('https://blockly-demo.appspot.com/static/demos/blockfactory/index.html#nbo2pg');
    this.setColour(210);
    this.appendDummyInput()
        .appendField("Point")
        .appendField(new Blockly.FieldVariable("PointName"), "Name");
    this.appendValueInput("X")
        .setCheck("Number")
        .setAlign(Blockly.ALIGN_RIGHT)
        .appendField("Coord X");
    this.appendValueInput("Y")
        .setCheck("Number")
        .setAlign(Blockly.ALIGN_RIGHT)
        .appendField("Coord Y");
    this.appendDummyInput()
        .setAlign(Blockly.ALIGN_RIGHT)
        .appendField("")
        .appendField(new Blockly.FieldDropdown([["Fixed", "Fixed"], ["Float", "Float"]]), "Type");
    this.setTooltip('Create a spatial point attached to the ground');
  }
};


