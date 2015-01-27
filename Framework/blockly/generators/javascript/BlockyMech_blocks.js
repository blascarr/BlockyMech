Blockly.JavaScript['point'] = function(block) {
  var value_x = Blockly.JavaScript.valueToCode(block, 'X', Blockly.JavaScript.ORDER_ATOMIC);
  var value_y = Blockly.JavaScript.valueToCode(block, 'Y', Blockly.JavaScript.ORDER_ATOMIC);
  var dropdown_type = block.getFieldValue('Type');
  var variable_name = Blockly.JavaScript.variableDB_.getName(block.getFieldValue('Name'), Blockly.Variables.NAME_TYPE);
  // TODO: Assemble JavaScript into code variable.
  var code = variable_name;
  return code;
};