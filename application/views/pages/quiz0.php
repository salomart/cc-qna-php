<div class="container">

<div class="jumbotron" style="padding: 2rem;">
<h2 style="text-align: center;">
Salomon Martinez
<br>
1001582988
<br>
Quiz 0
</h2>
</div>

<?php

// ************************ Task 7 ************************
echo '<h3>Task 7: Copy File</h3>';
echo '<br>';

echo form_open('Quiz0/copyFile');
echo '<div class="form-group">';
echo form_label('Filename:', 'filename');
echo form_input(array('name' => 'filename', 'id' => 'filename', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'copyFile', 'value' => 'Copy File', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($fileCopied)) {
    if ($fileCopied == true) {
        echo '<br>';
        echo 'File copied!';
        echo '<br>';
        $files = array_diff(scandir('quiz0_orig'), array('.', '..'));
        echo 'Files in the orig directory: '. implode(', ', $files);
        $files = array_diff(scandir('quiz0_copies'), array('.', '..'));
        echo '<br>';
        echo 'Files in the copies directory: '. implode(', ', $files);
    } else {
        echo '<br>';
        echo 'File not found!';
    }
}

echo '<hr>';

// ************************ Task 8 ************************
echo '<h3>Task 8: Get Image By User Name</h3>';
echo '<br>';

echo form_open('Quiz0/getImageNameByName');
echo '<div class="form-group">';
echo form_label('Name:', 'name');
echo form_input(array('name' => 'name', 'id' => 'name', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'getImage', 'value' => 'Get Image', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($imageName)) {
    if ($imageName != null && strcmp($imageName, '') != 0 && file_exists('quiz0_orig/' . $imageName)) {
        echo '<br>';
        echo '<img src="' . base_url() . 'quiz0_orig/' . $imageName . '"/>';
    } else {
        echo '<br>';
        echo 'Image not found';
    }
}

echo '<hr>';

// ************************ Task 9 ************************
echo '<h3>Task 9: Get People By Grade Range</h3>';
echo '<br>';

echo form_open('Quiz0/getPeopleByGradeRange');
echo '<div class="form-group">';
echo form_label('Lowest Grade:', 'lowestGrade');
echo form_input(array('name' => 'lowestGrade', 'id' => 'lowestGrade', 'class' => 'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo form_label('Highest Grade:', 'highestGrade');
echo form_input(array('name' => 'highestGrade', 'id' => 'highestGrade', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'getPeople', 'value' => 'Get People', 'class' => 'btn btn-primary'));
echo form_close();

if (isset($people)) {
    if (sizeof($people) > 0) {
        foreach ($people as $person) {
            echo '<br>';
            echo $person['Name'];
            
            if ($person['Picture'] != null && strcmp($person['Picture'], '') != 0
                && file_exists('quiz0_orig/' . $person['Picture'])) {
                echo '<br>';
                echo '<img src="' . base_url() . 'quiz0_orig/' . $person['Picture'] . '"/>';
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
echo '<h3>Task 10: Update User Keywords</h3>';
echo '<br>';

echo form_open('Quiz0/updateUserKeywords');
echo '<div class="form-group">';
echo form_label('Name:', 'name2');
echo form_input(array('name' => 'name', 'id' => 'name2', 'class' => 'form-control'));
echo '</div>';
echo '<div class="form-group">';
echo form_label('Keywords:', 'keywords');
echo form_input(array('name' => 'keywords', 'id' => 'keywords', 'class' => 'form-control'));
echo '</div>';
echo form_submit(array('name' => 'updateKeywords', 'value' => 'Update Keywords', 'class' => 'btn btn-primary'));
echo form_close();

echo '<br>';

if (isset($keywordsUpdated)) {
    if ($keywordsUpdated == true) {
        echo 'Keywords updated for the user.';
        echo '<br>';
    } else {
        echo 'User not found!';
        echo '<br>';
    }
}

?>

</div>
