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

echo '<hr>';

// ************************ Task 3 ************************
echo '<h3>Task 3: Get Nearby Earthquakes From Latitude, Longitude, and Distance</h3>';
echo '<br>';

echo form_open('Assignment2/getQuakesByLocRange');
echo '<div class="form-group">';
echo form_label('Latitude:', 'latitude');
echo form_input(array('name' => 'latitude', 'id' => 'latitude', 'class' => 'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo form_label('Longitude:', 'longitude');
echo form_input(array('name' => 'longitude', 'id' => 'longitude', 'class' => 'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo form_label('Distance (in km):', 'distance');
echo form_input(array('name' => 'distance', 'id' => 'distance', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'getQuakesByLocRange', 'value' => 'Get Earthquakes', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($quakes)) {
    if (sizeof($quakes) > 0) {
        foreach ($quakes as $quake) {
            echo '<br>';
            echo 'Coordinates = ' . $quake['latitude'] . ', ' . $quake['longitude'];
        }
    } else {
        echo '<br>';
        echo 'No locations found!';
    }
}

?>
