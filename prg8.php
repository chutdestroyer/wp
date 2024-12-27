<!DOCTYPE html>
<html>
    <head>
        <title>Color change by day</title>
        <?php
        $daysofweek=array(
            'Sunday'=>'#FF573',
            'Monday'=>'#33FF57',
            'Tuesday'=>'#3357FF',
            'Wednesday'=>'#FFFF33',
            'Thursday'=>'#FF33FF',
            'Friday'=>'#33FFFF',
            'Saturday'=>'#FF3333');
            $currentDay=date('l');
            $backgroundcolor='#FFFFFF';
            if(array_key_exists($currentDay,$daysofweek)){
                $backgroundcolor=$daysofweek[$currentDay];
            }
            ?>
            <style>
                body{
                    background-color:<?php echo $backgroundcolor;?>;
                }
            </style>
    </head>
    <body>
        <h1>Welcome today is <?php echo $currentDay;?></h1>
    </body>
</html>