<?php

use Illuminate\Database\Seeder;

class RequestTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('request')->delete();
        
      /*   \DB::table('request')->insert(array (
            0 =>
            array (
                'id' => '1',
                'workerid' => '38',
                'teamid' => '10',
                'time' => '2019-01-23 15:28:22.0',
            ),
            1 =>
            array (
                'id' => '2',
                'workerid' => '39',
                'teamid' => '7',
                'time' => '2019-01-23 16:27:53.0',
            ),
            2 =>
            array (
                'id' => '3',
                'workerid' => '40',
                'teamid' => '11',
                'time' => '2019-01-23 16:29:39.0',
            ),
            3 =>
            array (
                'id' => '4',
                'workerid' => '41',
                'teamid' => '7',
                'time' => '2019-01-23 16:30:22.0',
            ),
            4 =>
            array (
                'id' => '5',
                'workerid' => '42',
                'teamid' => '6',
                'time' => '2019-01-23 16:30:46.0',
            ),
            5 =>
            array (
                'id' => '6',
                'workerid' => '43',
                'teamid' => '7',
                'time' => '2019-01-23 16:31:36.0',
            ),
            6 =>
            array (
                'id' => '7',
                'workerid' => '44',
                'teamid' => '4',
                'time' => '2019-01-23 16:32:13.0',
            ),
            7 =>
            array (
                'id' => '8',
                'workerid' => '45',
                'teamid' => '5',
                'time' => '2019-01-23 16:32:32.0',
            ),
            8 =>
            array (
                'id' => '9',
                'workerid' => '46',
                'teamid' => '7',
                'time' => '2019-01-23 16:33:07.0',
            ),
            9 =>
            array (
                'id' => '10',
                'workerid' => '47',
                'teamid' => '7',
                'time' => '2019-01-23 16:34:04.0',
            ),
            10 =>
            array (
                'id' => '11',
                'workerid' => '48',
                'teamid' => '4',
                'time' => '2019-01-23 16:34:29.0',
            ),
            11 =>
            array (
                'id' => '12',
                'workerid' => '49',
                'teamid' => '5',
                'time' => '2019-01-24 22:43:56.0',
            ),
            12 =>
            array (
                'id' => '13',
                'workerid' => '50',
                'teamid' => '4',
                'time' => '2019-01-25 09:10:34.0',
            ),
            13 =>
            array (
                'id' => '14',
                'workerid' => '51',
                'teamid' => '7',
                'time' => '2019-01-25 09:10:52.0',
            ),
            14 =>
            array (
                'id' => '15',
                'workerid' => '52',
                'teamid' => '9',
                'time' => '2019-01-25 09:11:07.0',
            ),
            15 =>
            array (
                'id' => '16',
                'workerid' => '53',
                'teamid' => '4',
                'time' => '2019-01-25 09:11:27.0',
            ),
            16 =>
            array (
                'id' => '17',
                'workerid' => '54',
                'teamid' => '6',
                'time' => '2019-01-25 09:25:56.0',
            ),
            17 =>
            array (
                'id' => '18',
                'workerid' => '55',
                'teamid' => '4',
                'time' => '2019-01-25 09:26:08.0',
            ),
            18 =>
            array (
                'id' => '19',
                'workerid' => '56',
                'teamid' => '7',
                'time' => '2019-01-25 09:26:21.0',
            ),
            19 =>
            array (
                'id' => '20',
                'workerid' => '57',
                'teamid' => '4',
                'time' => '2019-01-25 09:26:43.0',
            ),
            20 =>
            array (
                'id' => '21',
                'workerid' => '58',
                'teamid' => '5',
                'time' => '2019-01-25 09:27:01.0',
            ),
            21 =>
            array (
                'id' => '22',
                'workerid' => '59',
                'teamid' => '7',
                'time' => '2019-01-25 09:27:14.0',
            ),
            22 =>
            array (
                'id' => '23',
                'workerid' => '60',
                'teamid' => '4',
                'time' => '2019-01-25 09:27:29.0',
            ),
            23 =>
            array (
                'id' => '24',
                'workerid' => '61',
                'teamid' => '5',
                'time' => '2019-01-25 09:27:43.0',
            ),
            24 =>
            array (
                'id' => '25',
                'workerid' => '62',
                'teamid' => '4',
                'time' => '2019-01-25 09:27:53.0',
            ),
            25 =>
            array (
                'id' => '26',
                'workerid' => '63',
                'teamid' => '4',
                'time' => '2019-01-25 09:28:11.0',
            ),
            26 =>
            array (
                'id' => '27',
                'workerid' => '64',
                'teamid' => '7',
                'time' => '2019-01-25 09:31:42.0',
            ),
            27 =>
            array (
                'id' => '28',
                'workerid' => '65',
                'teamid' => '4',
                'time' => '2019-01-25 09:31:54.0',
            ),
            28 =>
            array (
                'id' => '29',
                'workerid' => '66',
                'teamid' => '6',
                'time' => '2019-01-25 09:32:42.0',
            ),
            29 =>
            array (
                'id' => '30',
                'workerid' => '67',
                'teamid' => '7',
                'time' => '2019-01-25 09:32:57.0',
            ),
            30 =>
            array (
                'id' => '31',
                'workerid' => '68',
                'teamid' => '4',
                'time' => '2019-01-25 09:33:25.0',
            ),
            31 =>
            array (
                'id' => '32',
                'workerid' => '69',
                'teamid' => '4',
                'time' => '2019-01-25 09:34:10.0',
            ),
            32 =>
            array (
                'id' => '33',
                'workerid' => '70',
                'teamid' => '7',
                'time' => '2019-01-25 09:34:29.0',
            ),
            33 =>
            array (
                'id' => '34',
                'workerid' => '71',
                'teamid' => '6',
                'time' => '2019-01-25 09:35:13.0',
            ),
        )); */
    }
}
