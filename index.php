<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the expression from the form
    $expression = $_POST['expression'];

    // Validate the expression
    if (preg_match('/[^\d\s()+\-*\/.^%]/', $expression)) {
        die('Invalid characters in the expression.');
    }

    // Evaluate the expression
    try {
        $result = eval("return $expression;");
        echo '<h2>Result</h2>';
        echo '<p>' . $expression . ' = ' . $result . '</p>';
    } catch (ParseError $e) {
        echo 'Invalid expression.';
    }
}
?>
