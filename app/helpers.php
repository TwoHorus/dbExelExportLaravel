<?php
function printCurrentRow(stdClass $finishedrow)
{
    //
    $space='&nbsp;';
    $grey='bgcolor="#C2C5CC"';
    $red='style="color:#CD0000"';
    $black='style="color:#000000"';
    echo '<tr>';
    if ($finishedrow->dent=='new') {
        ?>
<td style="color:#000000"> 
        <?php echo $finishedrow->firstname.$space;?>


</td>
<td>

        <?php echo  $finishedrow->lastname;?>

</td>

<td style="color:#000000"><?php echo  $finishedrow->eg ;?></td>

<td style="color:#000000"><?php if ($finishedrow->manhoursinamonth!='X') {
    echo  round($finishedrow->manhoursinamonth, 2) ;
                          }?></td>   <!--$entry->quarterid -->

<td><?php echo  $finishedrow->teamname;?></td>

        <?php
    } else {
        echo indent(5);
    } ?>

<td style="color:#000000">
    <?php
    echo $finishedrow->funding ?? $space ;
    ?></td>

<td style="color:#000000">
    <?php
    echo $finishedrow->projectname ?? $space;
    ?></td>

<td style="color:#000000">
    <?php
    echo $finishedrow->kt ?? $space;
    ?></td>


<td <?php if ($finishedrow->drittmittel==1) {
    echo $grey;
    } ?>
    <?php if (is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)) {
        if (abs(($finishedrow->desiredstate1 - $finishedrow->actualstate1))>19) {
            echo $red;
        } else {
            echo $black;
        }
    } ?>>
    <?php
    echo $finishedrow->desiredstate1 ?? $space;

    ?></td>


<td <?php if ($finishedrow->drittmittel==1) {
    echo $grey;
    } ?>
    <?php if (is_numeric($finishedrow->desiredstate1)&&is_numeric($finishedrow->actualstate1)) {
        if (abs(($finishedrow->desiredstate1 - $finishedrow->actualstate1))>19) {
            echo $red;
        } else {
            echo$black;
        }
    } ?>>
    <?php
    echo $finishedrow->actualstate1 ?? $space;

    ?></td>



<td <?php if ($finishedrow->drittmittel==1) {
    echo $grey;
    } ?>
    <?php if (is_numeric($finishedrow->desiredstate2)&&is_numeric($finishedrow->actualstate2)) {
        if (abs(($finishedrow->desiredstate2 - $finishedrow->actualstate2))>19) {
            echo $red;
        } else {
            echo $black;
        }
    } ?>>
    <?php
    echo $finishedrow->desiredstate2 ?? $space;

    ?></td>


<td <?php if ($finishedrow->drittmittel==1) {
    echo $grey;
    } ?>
    <?php if (is_numeric($finishedrow->desiredstate2)&&is_numeric($finishedrow->actualstate2)) {
        if (abs(($finishedrow->desiredstate2 - $finishedrow->actualstate2))>19) {
            echo $red;
        } else {
            echo $black;
        }
    } ?>>
    <?php
    echo $finishedrow->actualstate2 ?? $space;

//LOGIK ZUM NTSCHEIDEN OB Q1, Q2 oder Q3 ???
    ?></td>





<td <?php if ($finishedrow->drittmittel==1) {
    echo $grey;
    } ?>
    <?php if (is_numeric($finishedrow->desiredstate3)&&is_numeric($finishedrow->actualstate3)) {
        if (abs(($finishedrow->desiredstate3 - $finishedrow->actualstate3))>19) {
            echo $red;
        } else {
            echo $black;
        }
    } ?>>
    <?php
    echo $finishedrow->desiredstate3 ?? $space;

    ?></td>


<td <?php if ($finishedrow->drittmittel==1) {
    echo $grey;
    } ?>
    <?php if (is_numeric($finishedrow->desiredstate3)&&is_numeric($finishedrow->actualstate3)) {
        if (abs(($finishedrow->desiredstate3 - $finishedrow->actualstate3))>19) {
            echo $red;
        } else {
            echo $black;
        }
    } ?>>
    <?php
    echo $finishedrow->actualstate3 ?? $space;

    ?></td>






<td <?php if ($finishedrow->drittmittel==1) {
    echo $grey;
    } ?>
    <?php if (is_numeric($finishedrow->desiredstate4)&&is_numeric($finishedrow->actualstate4)) {
        if (abs(($finishedrow->desiredstate4 - $finishedrow->actualstate4))>19) {
            echo $red;
        } else {
            echo $black;
        }
    } ?>>
    <?php
    echo $finishedrow->desiredstate4 ?? $space;

    ?></td>


<td <?php if ($finishedrow->drittmittel==1) {
    echo $grey;
    } ?>
    <?php if (is_numeric($finishedrow->desiredstate4)&&is_numeric($finishedrow->actualstate4)) {
        if (abs(($finishedrow->desiredstate4 - $finishedrow->actualstate4))>19) {
            echo $red;
        } else {
            echo $black;
        }
    } ?>>
    <?php
    echo $finishedrow->actualstate4 ?? $space;

    ?></td>


</tr>


    <?php
}// END FUNCTION



function indent($int)
{
    return "<td  colspan=".($int).">&nbsp;</td>";
}
