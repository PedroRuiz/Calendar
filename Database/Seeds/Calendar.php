<?php

namespace Calendar\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Calendar extends Seeder
{

  const TABLE = 'modulecalendar';

  public function run()
  {
    $data = [
      // [
      //   'user'       => 1, // foreing of users
      //   'title'      => '', // varchar(255)
      //   'start'      => '', // datetime not null
      //   'end'        => '', // datatime null
      //   'allday'     => '', // integer 1 
      //   'url'        => '', // varchar(255) 
      //   'editable'   =>  char(4)
              // editable[0] => Event is editable,
              // editable[1] => StartEditable,
              // editable[2] => durationEditable,
              // editable[3] => resourceEditable
      //   'hightlight' => '', // integer 1
      //   'recurring' => 0,// (0|1)
      //   'recurringDaysOfWeek' => char(7)
      //        recurringDaysOfWeek[0] => all sundays
      //        recurringDaysOfWeek[1] => all mondays
      //        recurringDaysOfWeek[2] => all tuesdays
      //        recurringDaysOfWeek[3] => all wednesdays
      //        recurringDaysOfWeek[4] => all thursday
      //        recurringDaysOfWeek[5] => all fridays
      //        recurringDaysOfWeek[6] => all saturdays
      //   'recurringStartRecur' => recurring event from this date (datetime)
      //   'recurringEndRecur' =>   recurring event to this date (datetime)
      //   'recurringGroupId' =>    identifier to this group of recurring events varchar(255)
      //
      //   'created_at' => 0, // unixtimestamp
      //   'updated_at' => 0, // unixtimestamp
      //   'deleted_at' => 0 // unixtimestamp
      // ],
      [
        'user'       => 1, 
        'title'      => 'Evento all day',
        'start'      => '2022-04-26',
        'end'        => '2022-04-26',
        'allday'     => '1',
        'url'        => '', 
        'editable'   => '1111',
        'hightlight' => '', 
        'created_at' => date('Y-m-d H:i:s'), 
        'updated_at' => date('Y-m-d H:i:s'),         
      ],
      [
        'user'       => 1, 
        'title'      => 'Evento no editable',
        'start'      => '2022-04-26 12:00:00',
        'end'        => '2022-04-26 14:00:00',
        'allday'     => '0',
        'url'        => '', 
        'editable'   => '0000',
        'hightlight' => '', 
        'created_at' => date('Y-m-d H:i:s'), 
        'updated_at' => date('Y-m-d H:i:s'),         
      ],
      [
        'user'       => 1, 
        'title'      => 'Evento remarcado all day 1011',
        'start'      => '2022-04-27 12:00:00',
        'end'        => '2022-04-27 14:00:00',
        'allday'     => '1',
        'url'        => '', 
        'editable'   => '1011',
        'hightlight' => '', 
        'created_at' => date('Y-m-d H:i:s'), 
        'updated_at' => date('Y-m-d H:i:s'),         
      ],
      [
        'user'       => 1, 
        'title'      => 'Evento remarcado all day no editable',
        'start'      => '2022-04-27 12:00:00',
        'end'        => '2022-04-27 14:00:00',
        'allday'     => '1',
        'url'        => '', 
        'editable'   => '0000',
        'hightlight' => '1', 
        'created_at' => date('Y-m-d H:i:s'), 
        'updated_at' => date('Y-m-d H:i:s'),         
      ],
      [
        'user'       => 1, 
        'title'      => 'Evento remarcado all day no editable',
        'start'      => '2022-04-25 12:00:00',
        'end'        => '2022-04-25 14:00:00',
        'allday'     => '1',
        'url'        => '', 
        'editable'   => '0000',
        'hightlight' => '', 
        'created_at' => date('Y-m-d H:i:s'), 
        'updated_at' => date('Y-m-d H:i:s'),         
      ],
      [
        'user'       => 1, 
        'title'      => 'Evento con Url',
        'start'      => '2022-04-29 12:00:00',
        'end'        => '2022-04-30 14:00:00',
        'allday'     => '0',
        'url'        => 'https://pedroruizhidalgo.es', 
        'editable'   => '1111',
        'hightlight' => '', 
        'created_at' => date('Y-m-d H:i:s'), 
        'updated_at' => date('Y-m-d H:i:s'),         
      ],
      [
          'user'       => 1, // foreing of users
          'title'      => 'evento recurrente cada miércoles y viernes', // varchar(255)
          'start'      => '2022-04-01', // datetime not null
          'end'        => '2022-01-30', // datatime null
          'allday'     => '', // integer 1 
          'url'        => '', // varchar(255) 
          'editable'   => '1111', //  char(4)
                // editable[0] => Event is editable,
                // editable[1] => StartEditable,
                // editable[2] => durationEditable,
                // editable[3] => resourceEditable
          'hightlight' => '', // integer 1          
          'recurring' => '1',
          'recurringDaysOfWeek' => '35',
              //  recurringdaysofweek[0] => all sundays
              //  recurringdaysofweek[1] => all mondays
              //  recurringdaysofweek[2] => all tuesdays
              //  recurringdaysofweek[3] => all wednesdays
              //  recurringdaysofweek[4] => all thursday
              //  recurringdaysofweek[5] => all fridays
              //  recurringdaysofweek[6] => all saturdays
          'recurringStartRecur' => '2022-04-01', //datetime recurring event from this date (datetime)
          'recurringEndRecur' =>   '2022-04-30', //datetime recurring event to this date (datetime)
          'recurringGroupId' =>    'recurrente miércoles y viernes', //varchar(255) identifier to this group of recurring events varchar(255)
          'created_at' => date('Y-m-d H:i:s'), // unixtimestamp
          'updated_at' => date('Y-m-d H:i:s'), // unixtimestamp
          'deleted_at' => 0, // unixtimestamp
        ],
    ];

    foreach ($data as $row) {
			$this->db->table(self::TABLE)->insert($row);			      
		}
  }
  
}
