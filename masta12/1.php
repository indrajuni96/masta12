<?php
    $name       = 'Indra Juniyanto';
    $age        = 23;
    $address    = 'PD Ungu Permai Blok AB2 No12 Rt/Rw 02/09 Bekasi Utara';
    $hobbies    = array('Games', 'Bantu dagang orang tua','Ngoding');
    $is_married = false;
    $list_school = [
        'nameSchool'    => 'SMK Vinama 2',
        'year_in'       => 2011,
        'year_out'      => 2014,
        'major'         => null
    ];
    $skills = [
        'HTML'              => ['skill_name' => 'HTML', 'level' => 'advanced' ],
        'CSS'               => ['skill_name' => 'CSS', 'level' => 'advanced' ],
        'JAVASCRIPT'        => ['skill_name' => 'JAVASCRIPT', 'level' => 'advanced' ],
        'PHP'               => ['skill_name' => 'PHP', 'level' => 'advanced' ],
        'MYSQL'             => ['skill_name' => 'MYSQL', 'level' => 'advanced' ],
        'MONGODB'           => ['skill_name' => 'MONGODB', 'level' => 'advanced' ],
        'VB.NET'            => ['skill_name' => 'VB.NET', 'level' => 'advanced' ],
    ];
    $interest_in_coding = true;    

    function biodataIndra($name,$age, $address, $hobbies, $is_married, $list_school, $skills, $interest_in_coding){
        return json_encode(array(
            'name'               => $name,
            'age'                => $age,
            'address'            => $address,
            'hobbies'            => $hobbies,
            'is_married'         => $is_married,
            'school'             => $list_school,
            'skills'             => $skills,
            'interest_in_coding' => $interest_in_coding
        ), JSON_PRETTY_PRINT);
    }

    echo biodataIndra($name,$age, $address, $hobbies, $is_married, $list_school, $skills, $interest_in_coding);
?>