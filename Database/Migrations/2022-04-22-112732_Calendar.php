<?php

namespace Calendar\Database\Migrations;

use CodeIgniter\Database\Migration;

class Calendar extends Migration
{

  const TABLE = 'modulecalendar';
  const ID = 'id';
  const USERFIELD = 'user';
  const USERSTABLE = 'users';

  public function up()
  {
    $this->forge->dropTable(self::TABLE, true); // delete if table exists

    $this->forge->addField([
      self::ID           => [
        'type'           => 'INT',
        'constraint'     => 5,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      self::USERFIELD => [        
        'type'           => 'MEDIUMINT',
        'constraint'     => '8',
        'unsigned'       => true,
      ],
      'title' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
        'null'           => false,
      ],
      'start' => [
        'type'           => 'DATETIME',
        'null'           => false
      ],
      'end' => [
        'type'           => 'DATETIME',
        'null'           => false
      ],
      'allday' => [
        'type'           => 'TINYINT',
        'constraint'     => 1,
        'null'           => false,
        'default'        => '0'
      ],
      'url' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
        'null'           => true,
      ],
      'editable' => [ 
        /**
         * editable[0] => Event is editable,
         * editable[1] => StartEditable,
         * editable[2] => durationEditable,
         * editable[3] => resourceEditable
         */
        'type'           => 'CHAR',
        'constraint'     => 4,
        'null'           => false,
        'default'        => 1111


        
      ],
      'hightlight' => [
        'type'           => 'TINYINT',
        'constraint'     => 1,
        'null'           => false,
        'default'        => '0'
      ],
      'recurring' => [
        'type'           => 'TINYINT',
        'constraint'     => 1,
        'null'           => false,
        'default'        => '0'
      ],
      'recurringDaysOfWeek' => [ 
        /**
         * recurring events in days of week
         * 
         * dayofweek[0] => sunday,
         * dayofweek[1] => monday,
         * ...,
         * dayofweek[6] => saturday
         */
        'type'           => 'CHAR',
        'constraint'     => 7,
        'null'           => true,        
      ],
      'recurringStartRecur' => [
        'type'           => 'DATETIME',
        'null'           => true
      ],
      'recurringEndRecur' => [
        'type'           => 'DATETIME',
        'null'           => true
      ],
      'recurringGroupId' => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
        'null'           => false,
      ],
      // 
      'created_at' => [
        'type'       => 'DATE',                
        'null'       => false,
        'default' => null,
      ],
      'updated_at' => [
        'type'       => 'DATE',                
        'null'       => false,
        'default' => null,
      ],
      'deleted_at' => [
        'type'       => 'DATE',                
        'null'       => true,
        'default' => null,
      ],
    ]);

    $this->forge->addForeignKey(self::USERFIELD, self::USERSTABLE, 'id', 'RESTRICT', 'RESTRICT');
    $this->forge->addKey(self::ID, true);

    $this->forge->createTable(self::TABLE);
  }

  public function down()
  {
    $this->forge->dropTable(self::TABLE);
  }
}
