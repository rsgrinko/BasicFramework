<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/core/bootstrap.php';

// DataBase class

// Query
$result = $DataBase->query('SELECT * FROM iot_sensors WHERE ID=3924538');
echo '<pre>'.print_r($result, true).'</pre>';

// Update
$result = $DataBase->update('iot_sensors',
                                        array(
                                            'ID' => '3924538'
                                        ),
                                        array(
                                            'VALUE' => '601',
                                            'SENSOR' => 'test_sensor2'
                                        )
                            );
echo '<pre>'.print_r($result, true).'</pre>';


// Get items (sort ORDER BY VALUE DESC)
$result = $DataBase->getItems('iot_sensors', array('VALUE'=>'>32'), array('VALUE'=>'DESC'));
echo '<pre>'.print_r($result, true).'</pre>';


// users class

$User->Authorize(1);

$result = $User->getFields(1);
echo '<pre>'.print_r($result, true).'</pre>';

$User->Logout();