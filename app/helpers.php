<?php

function printCurrentRow(object $finishedrow)
{
    if ($finishedrow->dent=='new') {
        ?>
<td style="color:#FFAEFF"> 
        <?php echo($finishedrow->firstname.'&nbsp;');?>


</td>
<td>

        <?php echo( $finishedrow->lastname);?>

</td>

<td style="color:#F0AE0F"><?php echo( 1 );?></td> <!-- $entry->quarter->q-->

<td style="color:#F0AE0F"><?php echo( 2 );?></td>   <!--$entry->quarterid -->

<td><?php echo( $finishedrow->teamname );?></td>


        <?php
    } else {
        //echo '<td></td>';
        echo indent(5);
    }



    ?>



<!-- @indent(5) -->

<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->funding ?? '&nbsp' ;

    ?></td>

<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->projectname ?? '&nbsp';


    ?></td>

<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->kt ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->desiredstate1 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->actualstate1 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>






<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->desiredstate2 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->actualstate2 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>





<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->desiredstate3 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->actualstate3 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>






<td style="color:#F0AC0F">
    <?php

    echo $finishedrow->desiredstate4 ?? '&nbsp';

//LOGIK ZUM ENTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>


<td style="color:#F0AC0F">
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
<td style='border:thin' colspan=".($int).">&nbsp;</td>";
   /* for ($i=0; $i<$int; $i++) {
        $x = $x.'<td>&nbsp;</td>';
    }*/
    return $x;
};
