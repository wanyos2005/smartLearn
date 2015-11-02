<?php

/*
 * Contains modules
 */

return [
    'person' => [
        'class' => 'app\modules\person\PersonModule',
        'controllerMap' => [
            'person' => 'app\modules\person\controllers\PersonController',
            'studentSubjectScores' => 'app\modules\person\controllers\StudentSubjectScoresController'
        ]
    ],
    'institutions' => [
        'class' => 'app\modules\institutions\InstitutionsModule',
        'controllerMap' => [
            'institutions' => 'app\modules\institutions\controllers\InstitutionsController',
            'campuses' => 'app\modules\institutions\controllers\CampusesController',
            'courses' => 'app\modules\institutions\controllers\CoursesController'
        ]
    ],
    'trainers' => [
        'class' => 'app\modules\trainers\TrainersModule',
        'controllerMap' => [
            'trainers' => 'app\modules\trainers\controllers\TrainersController',
            'centers' => 'app\modules\trainers\controllers\CentersController'
        ],
    ]
];
