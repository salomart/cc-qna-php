<div class="container">

<div class="jumbotron" style="padding: 2rem;">
<h2 style="text-align: center;">
Salomon Martinez
<br>
1001582988
<br>
Quiz 1
</h2>
</div>

<?php

// ************************ Task 6 ************************
echo '<h3>Task 6: Show Image and Size</h3>';
echo '<br>';

echo form_open('Quiz1/showImageAndSize');
echo '<div class="form-group">';
echo form_label('Filename:', 'filename');
echo form_input(array('name' => 'filename', 'id' => 'filename', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'showFileAndSize', 'value' => 'Show File And Size', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($imageLoc) && isset($imageSize)) {
    if ($imageLoc != null && strcmp($imageLoc, '') != 0 && file_exists('quiz1_orig/' . $imageLoc)) {
        echo '<br>';
        echo '<img src="' . base_url() . 'quiz1_orig/' . $imageLoc . '"/>';
        echo '<br>';
        echo 'Size: ' . $imageSize . ' bytes';
    } else {
        echo '<br>';
        echo 'Image not found';
    }
}

echo '<hr>';

// ************************ Task 7 ************************
echo '<h3>Task 7: Get Image By Room Number</h3>';
echo '<br>';

echo form_open('Quiz1/getImageNameByRoomNum');
echo '<div class="form-group">';
echo form_label('Room Number:', 'room');
echo form_input(array('name' => 'room', 'id' => 'room', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'getImage', 'value' => 'Get Image', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($imageName)) {
    if ($imageName != null && strcmp($imageName, '') != 0 && file_exists('quiz1_orig/' . $imageName)) {
        echo '<br>';
        echo '<img src="' . base_url() . 'quiz1_orig/' . $imageName . '"/>';
    } else {
        echo '<br>';
        echo 'Image not found';
    }
}

echo '<hr>';

// ************************ Task 8 ************************
echo '<h3>Task 8: Get People By Room Range And City</h3>';
echo '<br>';

echo form_open('Quiz1/getPeopleByRoomCity');
echo '<div class="form-group">';
echo form_label('Minimum Room Number:', 'minRoomNumber');
echo form_input(array('name' => 'minRoomNumber', 'id' => 'minRoomNumber', 'class' => 'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo form_label('Maximum Room Number:', 'maxRoomNumber');
echo form_input(array('name' => 'maxRoomNumber', 'id' => 'maxRoomNumber', 'class' => 'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo form_label('City:', 'city');
echo form_input(array('name' => 'city', 'id' => 'city', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'getPeople', 'value' => 'Get People', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($people)) {
    if (sizeof($people) > 0) {
        foreach ($people as $person) {
            echo '<br>';
            echo 'Name = ' . $person['Name'] . ', Room = ' . $person['Room'];
            
            if ($person['Picture'] != null && strcmp($person['Picture'], '') != 0
                && file_exists('quiz1_orig/' . $person['Picture'])) {
                echo '<br>';
                echo '<img src="' . base_url() . 'quiz1_orig/' . $person['Picture'] . '"/>';
            } else {
                echo '<br>';
                echo 'Image not found!';
            }
        }
    } else {
        echo '<br>';
        echo 'No one was found!';
    }
}

echo '<hr>';

// ************************ Task 10 ************************
echo '<h3>Task 10: Move File(s)</h3>';
echo '<br>';

echo form_open('Quiz1/moveFiles');
echo '<div class="form-group">';
echo form_label('Minimum Height:', 'minHeight');
echo form_input(array('name' => 'minHeight', 'id' => 'minHeight', 'class' => 'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo form_label('Maximum Height:', 'maxHeight');
echo form_input(array('name' => 'maxHeight', 'id' => 'maxHeight', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'moveFiles', 'value' => 'Move Files', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($filesMoved)) {
    if ($filesMoved == true) {
        echo '<br>';
        echo 'File(s) moved!';
        echo '<br>';
        $files = array_diff(scandir('quiz1_orig'), array('.', '..'));
        echo 'Files in the orig directory: '. implode(', ', $files);
        $files = array_diff(scandir('quiz1_newLoc'), array('.', '..'));
        echo '<br>';
        echo 'Files in the newLoc directory: '. implode(', ', $files);
    } else {
        echo '<br>';
        echo 'File(s) not found!';
    }
}

?>

<br>
</div>
