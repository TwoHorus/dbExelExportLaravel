<?php
 
if (isset($uienabled)) {
    if ($uienabled=='true') {
        $url=url('/');
        echo'<a class="button" href="'.$url.'">Zurück</a>';
    }
}
?>


<table border=1 style="border-collapse: collapse;padding-left:10px;">
    <thead>
    <tr>
        <th>Name</th>
        <th>Vorname</th>
        <th>EG</th>
        <th>AZ</th>
        <th>Team</th>
        <th>Finanzierung</th>
        <th>Projekt</th>
        <th>Kostenträger</th>
        <th>Soll Q1</th>
        <th>Ist Q1</th>
        <th>Soll Q2</th>
        <th>Ist Q2</th>
        <th>Soll Q3</th>
        <th>Ist Q3</th>
        <th>Soll Q4</th>
        <th>Ist Q4</th>

    </tr>
    </thead>
    <tbody>
   
    <?php
           $debugview=0;
            //helper:  <td><?php echo($finishedrow->sender);? ></td>
    $userid = "A";
    $projectid = null;
    $printedProject = 0;

    // new stdClass();
    if (!isset($firstyear)) {
        $firstyear = 1500;
    }
    if (!isset($lastyear)) {
        $lastyear = 4000;
    }
    if (isset($entry)) {
        echo ("<tr><td>entry set</td></tr>"); 
        $entry = null;
        $valx = null;
        $qes = null;
        $filter = null;
//Suppressing warnings.
    }
    if (isset($qes)){
        echo ("<tr><td>qes set</td></tr>");
    }
    
    $first = 3;
    ?>
    @foreach($qes as $filter => $valx)
<?php // <!--THIS NEEEDS TO GO SOMEWHERE!!!!<tr> currently placed-->
?>

    @endforeach
<?php
$firstofall=1;
?>
    @foreach($qes as $entry)


        <?php
                //This is the main LOOP
        //THINK ABOUT PRINTEDPROJECT!!!!
        if (!isset($entry->workerid)) {
            echo "error";
        }
        
        if (!($entry->workerid == $userid)||($firstofall==1)) {// are we not on the same person?
            $userid = $entry->workerid;//set the id for the next foreach
            $notfirst=0;

            if ($debugview==1) {
                echo "|->";
            }
            if (isset($row)) {
                if ($firstofall==1) {
                    $firstofall=0;//NEED TO FIX ONLY ONE ENTRY FOR FIRST PROJECT AND WORKER
                } else {/*
                    $first = 1;
                    $row->sender = 1;
                    printCurrentRow($row);// THIS PRINTS our row NOT yet
                    echo("<tr style='border-right:1px solid black'>
<td style='border:1px solid black' colspan=16>&nbsp;</td></tr>");
                */
                }
            }



            echo($entry->project->type->name ?? null);
            echo( $entry->project->name ?? $entry->pname);
            echo( $entry->project->type->name ?? $entry->ptypename);
            echo( $entry->workerid .'WORKERID');
            echo( $entry->project->kostentraeger->name ?? $entry->ktypename ?? ' ');
            echo($entry->eg);
            echo( $entry->manhoursinamonth);
            echo( 'default');
            echo( $entry->worker->firstname ?? $entry->firstname);
            echo( $entry->worker->lastname ?? $entry->lastname);
            echo ($entry->worker->team->name ?? $entry->tname);


            $row = (object)[
                'dent' => 'new',// NEW LINE
                'desiredstate1' => ' ',
                'actualstate1' => ' ',
                'desiredstate2' => ' ',
                'actualstate2' => ' ',
                'desiredstate3' => ' ',
                'actualstate3' => ' ',
                'desiredstate4' => ' ',
                'actualstate4' => ' ',
                'projecttypename' => $entry->project->type->name ?? null,
                'projectname' => $entry->project->name ?? $entry->pname,
                'funding' => $entry->project->type->name ?? $entry->ptypename,
                'drittmittel' => 0,
                'kt' => $entry->project->kostentraeger->name ?? $entry->ktypename ?? ' ',
                'eg' => $entry->eg,
                'manhoursinamonth' => $entry->manhoursinamonth,
                'sender' => 'default',
                'firstname' => $entry->worker->firstname ?? $entry->firstname,
                'lastname' => $entry->worker->lastname ?? $entry->lastname,
                'teamname' => $entry->worker->team->name ?? $entry->tname,
            ];
        } else {// User is the same
            if ($first == 2) {
               // $row->dent = 'project';
                //$first = 1;
            }
           // echo $notfirst;
            if ($entry->projectid== $projectid) {
                $notfirst=0;
            }
            $debugview=1;
            if (($entry->projectid != $projectid )&& ($printedProject == 0) && ($first == 0)&& $notfirst==2) {//the first is false
                if ($debugview==1) {
                    echo 'x';
                }
                $projectid = $entry->projectid;// set the id for the next foreach

                if (isset($row)) {
                    $row->sender = 2;
                    printCurrentRow($row);
                    $printedProject = 1;
                
                    $row = (object)[
                    'dent' => 'project',// NEW LINE
                    'desiredstate1' => ' ',
                    'actualstate1' => ' ',
                    'desiredstate2' => ' ',
                    'actualstate2' => ' ',
                    'desiredstate3' => ' ',
                    'actualstate3' => ' ',
                    'desiredstate4' => ' ',
                    'actualstate4' => ' ',
                    'projecttypename' => $entry->project->type->name ?? null,
                    'projectname' => $entry->project->name ?? $entry->pname,
                    'funding' => $entry->project->type->name ?? $entry->ptypename,
                    'drittmittel' => 0,
                    'kt' => $entry->project->kostentraeger->name ?? $entry->ktypename ?? ' ',
                    'eg' => $entry->eg,
                    'manhoursinamonth' => $entry->manhoursinamonth,
                    'sender' => 'default',
                    'firstname' => $entry->worker->firstname ?? $entry->firstname,
                    'lastname' => $entry->worker->lastname ?? $entry->lastname,
                    'teamname' => $entry->worker->team->name ?? $entry->tname,

                    ];
                }//WE ARE NOT ARRIVING HERE
//if ((($row->dent)=='project')&&$entry->workerid==$userid) {

//}


                //$row->projectname = $entry->project->name;
               // $row->kt = $entry->project->kostentraeger->name ?? 'test';
            } else {// same person same project
                $notfirst++;

                if ($debugview==1) {
                    echo "_";
                }
                $printedProject = 0;
                if ($first == 1) {
                    $projectid = $entry->projectid;
                    $row->sender = 3;
                    //printCurrentRow($row);//WE ARE printing with empty sollist
                }
                $first = 0;

                switch ($entry->quarter->q ?? $entry->q) {
                    case '1':
                        $row->desiredstate1 = $entry->desiredstate;
                        $row->actualstate1 = $entry->actualstate;
                        break;
                    case '2':
                        $row->desiredstate2 = $entry->desiredstate;
                        $row->actualstate2 = $entry->actualstate;
                        break;
                    case '3':
                        $row->desiredstate3 = $entry->desiredstate;
                        $row->actualstate3 = $entry->actualstate;
                        break;
                    case '4':
                        $row->desiredstate4 = $entry->desiredstate;
                        $row->actualstate4 = $entry->actualstate;
                        break;
                    default:
                        break;
                }
            }
        }

        ?>

    @endforeach
    <?php

    ?>
    </tbody>
</table>

