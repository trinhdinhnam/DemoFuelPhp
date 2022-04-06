<?php

namespace Fuel\Migrations;

class Student
{

    function up()
    {
        \DBUtil::create_table('students', array(
            'id' => array('type' => 'int', 'constraint' => 5),
            'name' => array('type' => 'varchar', 'constraint' => 100),
            'age' => array('type' => 'int', 'constrant' => 5),
        ), array('id'));
    }

    function down()
    {
       \DBUtil::drop_table('students');
    }
}