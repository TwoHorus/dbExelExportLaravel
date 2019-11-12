<?php

function printCurrentRow(stdClass $finishedrow)
{
    //
    echo '<tr>';
    if ($finishedrow->dent=='new') {
        ?>
<td style="color:#000000"> 
        <?php echo($finishedrow->firstname.'&nbsp;');?>


</td>
<td>

        <?php echo( $finishedrow->lastname);?>

</td>

<td style="color:#000000"><?php echo( $finishedrow->eg );?></td> <!-- $entry->quarter->q-->

<td style="color:#000000"><?php if($finishedrow->manhoursinamonth!='X')echo( round($finishedrow->manhoursinamonth, 2) );?></td>   <!--$entry->quarterid -->

<td><?php echo( $finishedrow->teamname );?></td>


        <?php
    } else {
        //echo '<td></td>';
        echo indent(5);
    }



    ?>



<!-- @indent(5) -->

<td style="color:#000000">
    <?php

    echo $finishedrow->funding ?? '&nbsp' ;

    ?></td>

<td style="color:#000000">
    <?php

    echo $finishedrow->projectname ?? '&nbsp';


    ?></td>

<td style="color:#000000">
    <?php

    echo $finishedrow->kt ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td <?php if($finishedrow->drittmittel==1){ echo ('bgcolor="#C2C5CC"');
} ?>
<?php if(is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)){
    if(abs(($finishedrow->desiredstate1 - $finishedrow->actualstate1))>19){ echo ('style="color:#CD0000"');
}else{echo('style="color:#000000"');}} ?>>
    <?php

    echo $finishedrow->desiredstate1 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td <?php if($finishedrow->drittmittel==1){ echo ('bgcolor="#C2C5CC"');
} ?>
<?php if(is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)){
    if(abs(($finishedrow->desiredstate1 - $finishedrow->actualstate1))>19){ echo ('style="color:#CD0000"');
}else{echo('style="color:#000000"');}} ?>>
    <?php

    echo $finishedrow->actualstate1 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>



<td <?php if($finishedrow->drittmittel==1){ echo ('bgcolor="#C2C5CC"');
} ?>
<?php if(is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)){
    if(abs(($finishedrow->desiredstate2 - $finishedrow->actualstate2))>19){ echo ('style="color:#CD0000"');
}else{echo('style="color:#000000"');}} ?>>
    <?php

    echo $finishedrow->desiredstate2 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td <?php if($finishedrow->drittmittel==1){ echo ('bgcolor="#C2C5CC"');
} ?>
<?php if(is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)){
    if(abs(($finishedrow->desiredstate2 - $finishedrow->actualstate2))>19){ echo ('style="color:#CD0000"');
}else{echo('style="color:#000000"');}} ?>>
    <?php

    echo $finishedrow->actualstate2 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>





<td <?php if($finishedrow->drittmittel==1){ echo ('bgcolor="#C2C5CC"');
} ?>
<?php if(is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)){
    if(abs(($finishedrow->desiredstate3 - $finishedrow->actualstate3))>19){ echo ('style="color:#CD0000"');
}else{echo('style="color:#000000"');}} ?>>
    <?php

    echo $finishedrow->desiredstate3 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td <?php if($finishedrow->drittmittel==1){ echo ('bgcolor="#C2C5CC"');
} ?>
<?php if(is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)){
    if(abs(($finishedrow->desiredstate3 - $finishedrow->actualstate3))>19){ echo ('style="color:#CD0000"');
}else{echo('style="color:#000000"');}} ?>>
    <?php

    echo $finishedrow->actualstate3 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>






<td <?php if($finishedrow->drittmittel==1){ echo ('bgcolor="#C2C5CC"');
} ?>
<?php if(is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)){
    if(abs(($finishedrow->desiredstate4 - $finishedrow->actualstate4))>19){ echo ('style="color:#CD0000"');
}else{echo('style="color:#000000"');}} ?>>
    <?php

    echo $finishedrow->desiredstate4 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td <?php if($finishedrow->drittmittel==1){ echo ('bgcolor="#C2C5CC"');
} ?>
<?php if(is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)){
    if(abs(($finishedrow->desiredstate4 - $finishedrow->actualstate4))>19){ echo ('style="color:#CD0000"');
}else{echo('style="color:#000000"');}} ?>>
    <?php

    echo $finishedrow->actualstate4 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


</tr>


    <?php
}



function indent($int)
{
    $x="
<td  colspan=".($int).">&nbsp;</td>";
   /* for ($i=0; $i<$int; $i++) {
        $x = $x.'<td>&nbsp;</td>';
    }*/
    return $x;
};
