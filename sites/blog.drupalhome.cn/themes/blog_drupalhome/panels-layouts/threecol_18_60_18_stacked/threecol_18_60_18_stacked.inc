<?php

// Plugin definition
$plugin = array(
  'title' => t('Three column 18/60/18 stacked'),
  'category' => t('Columns: 3'),
  'icon' => 'threecol_18_60_18_stacked.png',
  'theme' => 'panels_threecol_18_60_18_stacked',
  'css' => 'threecol_18_60_18_stacked.css',
  'regions' => array(
    'top' => t('Top'),
    'left' => t('Left side'),
    'middle' => t('Middle column'),
    'right' => t('Right side'),
    'bottom' => t('Bottom'),
  ),
);
