<?php

// ************************ Task 7 ************************
echo '<h3>Task 7: Get Magnitudes By Magnitude Range And Net</h3>';
echo '<br>';

echo form_open('Quiz2/getMagsByRangeAndNet');

echo '<div class="form-group">';
echo form_label('Lowest Magnitude:', 'lowestMagnitude');
echo form_input(array('name' => 'lowestMagnitude', 'id' => 'lowestMagnitude', 'class' => 'form-control'));
echo '</div>';

echo '<div class="form-group">';
echo form_label('Highest Magnitude:', 'highestMagnitude');
echo form_input(array('name' => 'highestMagnitude', 'id' => 'highestMagnitude', 'class' => 'form-control'));
echo '</div>';

echo '<div class="form-group">';
echo form_label('Net:', 'net');
echo form_input(array('name' => 'net', 'id' => 'net', 'class' => 'form-control'));
echo '</div>';

echo form_submit(array('name' => 'getMagsByRangeAndNet', 'value' => 'Get Locations', 'class' => 'btn btn-primary'));

echo form_close();

if (isset($mags)) {
    if (sizeof($mags) > 0) {
        echo '<br>';
        echo '<table class="table table-striped">';
        echo '<tr>';
        echo '<th>Magnitude Range</th>';
        echo '<th>Quake Count</th>';
        echo '</tr>';
        
        for ($i=0; $i<sizeof($mags); $i++) {
            echo '<tr>';
            echo '<td>' . ((float)$i)/2 . ' - ' . (((float)$i)/2 + 0.5) . '</td>';
            echo '<td>' . $mags[$i] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<br>';
        echo 'None found!';
    }
}

echo '<hr>';

// ************************ Task 8 ************************
echo '<h3>Task 8: Get Nearby Earthquakes From Coordinates, Distance, and Magnitude</h3>';
echo '<br>';

echo form_open('Quiz2/getQuakesByCoordDistMag');

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

echo '<div class="form-group">';
echo form_label('Magnitude:', 'mag');
echo form_input(array('name' => 'mag', 'id' => 'mag', 'class' => 'form-control'));
echo '</div>';

echo form_submit(array('name' => 'getQuakesByCoordDistMag', 'value' => 'Get Earthquakes', 'class' => 'btn btn-primary'));

echo form_close();

if (isset($quakes)) {
    if (sizeof($quakes) > 0) {
        echo '<br>';
        echo '<table class="table table-striped">';
        echo '<tr>';
        echo '<th>Place</th>';
        echo '<th>Coordinates</th>';
        echo '</tr>';
        
        foreach ($quakes as $quake) {
            echo '<tr>';
            echo '<td>' . $quake['place'] . '</td>';
            echo '<td>' . $quake['latitude'] . ', ' . $quake['longitude'] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<br>';
        echo 'No locations found!';
    }
}

echo '<hr>';

// ************************ Task 9 ************************
echo '<h3>Task 9: Get Earthquakes By Polarity Range</h3>';
echo '<br>';

echo form_open('Quiz2/getQuakesByPolarity');

echo '<div class="form-group">';
echo form_label('Min Polarity:', 'minPolarity');
echo form_input(array('name' => 'minPolarity', 'id' => 'minPolarity', 'class' => 'form-control'));
echo '</div>';

echo '<div class="form-group">';
echo form_label('Max Polarity:', 'maxPolarity');
echo form_input(array('name' => 'maxPolarity', 'id' => 'maxPolarity', 'class' => 'form-control'));
echo '</div>';

echo form_submit(array('name' => 'getQuakesByPolarity', 'value' => 'Get Earthquakes', 'class' => 'btn btn-primary'));

echo form_close();

if (isset($quakesCountAndMax)) {
    if (sizeof($quakesCountAndMax) > 0) {
        echo '<br>';
        echo '<table class="table table-striped">';
        echo '<tr>';
        echo '<th>Location</th>';
        echo '<th>Quake Count</th>';
        echo '<th>Largest Quake</th>';
        echo '</tr>';
        
        foreach ($quakesCountAndMax as $quake) {
            echo '<tr>';
            echo '<td>' . $quake['locationSource'] . '</td>';
            echo '<td>' . $quake['count'] . '</td>';
            echo '<td>' . $quake['max'] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<br>';
        echo 'No locations found!';
    }
}

?>
