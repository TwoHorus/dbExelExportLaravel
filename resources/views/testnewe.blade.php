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
       // dd($qes);
    }
    $firstofall=0;
    $first = 3;
    ?>
   
<?php

?>
    @foreach($qes as $entry)


        <?php
        //dump($entry);
        //die();
                //This is the main LOOP
        //THINK ABOUT PRINTEDPROJECT!!!!
        if (!isset($entry->workerid)) {
            echo "error";
        }
        
        if (isset($entry->workerid)&&!($entry->workerid == $userid)) {// are we not on the same person?
        
            $userid = $entry->workerid;//set the id for the next foreach
            

            if ($debugview==1) {
                echo ("<tr><td>2 set</td></tr>");
                echo "|->";
            }
            if (isset($row)) {
                echo ("<tr><td>3 set</td></tr>");
                if ($firstofall==1) {
                    echo ("<tr><td>4 set</td></tr>");
                    $firstofall=0;//NEED TO FIX ONLY ONE ENTRY FOR FIRST PROJECT AND WORKER
                } else {
                    echo ("<tr><td>5 set</td></tr>");/*
                    
                    $first = 1;
                    $row->sender = 1;
                    printCurrentRow($row);// THIS PRINTS our row NOT yet
                    echo("<tr style='border-right:1px solid black'>
<td style='border:1px solid black' colspan=16>&nbsp;</td></tr>");
                */
                }
            }



            echo ("<tr><td>rowobj set</td></tr>");
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
                'projecttypename' => $entry->projecttypename ?? null,
                'projectname' => $entry->project->name ?? $entry->projectname,
                'funding' => $entry->project->type->name ?? $entry->funding,
                'drittmittel' => 0,
                'kt' => $entry->project->kostentraeger->name ?? $entry->kt ?? ' ',
                'eg' => $entry->eg,
                'manhoursinamonth' => $entry->manhoursinamonth,
                'sender' => 'default',
                'firstname' => $entry->worker->firstname ?? $entry->firstname,
                'lastname' => $entry->worker->lastname ?? $entry->lastname,
                'teamname' => $entry->worker->team->name ?? $entry->teamname,
            ];
        } else {
            echo ("<tr><td>6 set</td></tr>");// User is the same
            if ($first == 2) {
                echo ("<tr><td>7 set</td></tr>");
               // $row->dent = 'project';
                //$first = 1;
            }
           
            
            $debugview=1;
            if (($entry->projectid != $projectid )&& ($printedProject == 0)) {
                echo ("<tr><td>8 set</td></tr>");
                //the first is false
                if ($debugview==1) {
                    echo 'x';
                }
                $projectid = $entry->projectid;// set the id for the next foreach

                if (isset($row)) {
                    echo ("<tr><td>9 set</td></tr>");
                    $row->sender = 2;

                    if("x".$row->desiredstate1.$row->desiredstate2.$row->desiredstate3.
                    $row->desiredstate4.$row->actualstate1.$row->actualstate2.$row->actualstate3.
                    $row->actualstate4=='x        '&&$printedProject == 1){
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
        
                        $row->desiredstate1 = $datapoint->desiredstate1 ?? ' ';
                        $row->actualstate1 = $datapoint->actualstate1 ?? ' ';
                       
                        $row->desiredstate2 = $datapoint->desiredstate2 ?? ' ';
                        $row->actualstate2 = $datapoint->actualstate2 ?? ' ';
                        
                        $row->desiredstate3 = $datapoint->desiredstate3 ?? ' ';
                        $row->actualstate3 = $datapoint->actualstate3 ?? ' ';
                       
                        $row->desiredstate4 = $datapoint->desiredstate4 ?? ' ';
                        $row->actualstate4 = $datapoint->actualstate4 ?? ' ';
                        
                    }else{
                      
                    printCurrentRow($row);
                    $printedProject = 1;
                
                    }

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
                    'projectname' => $entry->project->name ?? $entry->projectname,
                    'funding' => $entry->project->type->name ?? $entry->funding,
                    'drittmittel' => 0,
                    'kt' => $entry->project->kostentraeger->name ?? $entry->kt ?? ' ',
                    'eg' => $entry->eg,
                    'manhoursinamonth' => $entry->manhoursinamonth,
                    'sender' => 'default',
                    'firstname' => $entry->worker->firstname ?? $entry->firstname,
                    'lastname' => $entry->worker->lastname ?? $entry->lastname,
                    'teamname' => $entry->worker->team->name ?? $entry->teamname,

                    ];
                }//WE ARE NOT ARRIVING HERE
//if ((($row->dent)=='project')&&$entry->workerid==$userid) {

//}


                //$row->projectname = $entry->project->name;
               // $row->kt = $entry->project->kostentraeger->name ?? 'test';
            } else {// same person same project
          

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

                $row->desiredstate1 = $datapoint->desiredstate1 ?? ' ';
                $row->actualstate1 = $datapoint->actualstate1 ?? ' ';
               
                $row->desiredstate2 = $datapoint->desiredstate2 ?? ' ';
                $row->actualstate2 = $datapoint->actualstate2 ?? ' ';
                
                $row->desiredstate3 = $datapoint->desiredstate3 ?? ' ';
                $row->actualstate3 = $datapoint->actualstate3 ?? ' ';
               
                $row->desiredstate4 = $datapoint->desiredstate4 ?? ' ';
                $row->actualstate4 = $datapoint->actualstate4 ?? ' ';
                
            }
        }

        ?>

    @endforeach

    <?php

    ?>
    </tbody>
</table>

