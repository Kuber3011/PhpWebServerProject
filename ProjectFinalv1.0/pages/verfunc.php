<?php
function check_result($sorted_random_array, $input_array) {
     // Check if all numbers are different
    if (count(array_diff($sorted_random_array, $input_array)) === 6) {
        return [0,"Incorrect. All your elements are different than ours. "];
    }
    
    // Check if some numbers are different
    if (count(array_diff($sorted_random_array, $input_array)) > 0) {
        return [0,"Incorrect. Some of your elements are different than ours. "];
    }
    
    // Check if numbers are in the correct order
    $sorted_numbers = $input_array;
    // sort($sorted_numbers);
    
    if ($sorted_numbers !== $sorted_random_array) {
        return [0,"Incorrect. Your elements have not been correctly ordered. "];
    }
    
    // All numbers are the same and in the correct order
    return [1,"Correct. Your elements have been correctly ordered. "];
}
