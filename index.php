<?php

    require 'class.php';
    $multi = new MultiThread();
    
    $task1 = new Task(call_user_func(function() {
        for ($i = 0; $i < 3; $i++) {
            print "task 1: " . $i . "\n";
            yield;
        }
        // start by executing this
    }));
    
    $task2 = new Task(call_user_func(function() {
        for ($i = 0; $i < 6; $i++) {
            print "task 2: " . $i . "\n";
            yield;
        }
        // then start this one
    }));
    
    $multi->enqueue($task1);
    $multi->enqueue($task2);
    
    $multi->run();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Multi Thread Classes</h1>
</body>
</html>