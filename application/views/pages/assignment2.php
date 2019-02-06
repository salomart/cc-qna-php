<?php

// ************************ Task 1 ************************
echo '<h3>Task 1: Get Number Of Larger Magnitudes</h3>';
echo '<br>';

echo form_open('Assignment2/getLargerMagnitudes');
echo '<div class="form-group">';
echo form_label('Magnitude:', 'magnitude');
echo form_input(array('name' => 'magnitude', 'id' => 'magnitude', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'getLargerMagnitudes', 'value' => 'Get Larger Magnitudes', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($numOfMagnitudes)) {
    if ($numOfMagnitudes != null && strcmp($numOfMagnitudes, '') != 0) {
        echo '<br>';
        echo 'Number of magnitudes: ' . $numOfMagnitudes;
    } else {
        echo '<br>';
        echo 'An error occured!';
    }
}

echo '<hr>';

// ************************ Task 2 ************************
echo '<h3>Task 2: Get Earthquake Locations And Count By Magnitude Range</h3>';
echo '<br>';

echo form_open('Assignment2/getLocsByMagRange');
echo '<div class="form-group">';
echo form_label('Lowest Magnitude:', 'lowestMagnitude');
echo form_input(array('name' => 'lowestMagnitude', 'id' => 'lowestMagnitude', 'class' => 'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo form_label('Highest Magnitude:', 'highestMagnitude');
echo form_input(array('name' => 'highestMagnitude', 'id' => 'highestMagnitude', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'getLocsByMagRange', 'value' => 'Get Locations', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($locations)) {
    if (sizeof($locations) > 0) {
        foreach ($locations as $location => $count) {
            echo '<br>';
            echo $location . ': ';
            echo $count;
        }
    } else {
        echo '<br>';
        echo 'No locations found!';
    }
}

?>
