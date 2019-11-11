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
    ?>
    @foreach($qes as $entry)


        <?php
        //dump($entry);
        //die();
                //This is the main LOOP
        //THINK ABOUT PRINTEDPROJECT!!!!
        
            if (isset($entry)) {
                
                    printCurrentRow($entry);
                 
                
            }

        ?>

    @endforeach

    <?php

    ?>
    </tbody>
</table>

