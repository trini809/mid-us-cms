<?php
$items = array
(
  new SpawTbDropdown("core", "style", "isStyleEnabled", "styleStatusCheck", "styleChange"),
  new SpawTbDropdown("core", "formatBlock", "isStandardFunctionEnabled", "standardFunctionStatusCheck", "standardFunctionChange"),
  new SpawTbImage("core", "separator"),
  new SpawTbButton("core", "insertorderedlist", "isStandardFunctionEnabled", "isStandardFunctionPushed", "standardFunctionClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "insertunorderedlist", "isStandardFunctionEnabled", "isStandardFunctionPushed", "standardFunctionClick", SPAW_AGENT_ALL, true),
  new SpawTbImage("core", "separator"),
  new SpawTbButton("core", "hyperlink", "isInDesignMode", "", "hyperlinkClick", SPAW_AGENT_ALL, true),
  new SpawTbButton("core", "unlink", "isStandardFunctionEnabled", "", "standardFunctionClick", SPAW_AGENT_ALL, true),
  new SpawTbImage("core", "separator"),
   new SpawTbButton("core", "cleanup", "isInDesignMode", "", "codeCleanupClick"),
  new SpawTbImage("core", "separator"),
);
?>
