<?php

use vendor\bower\dmstr;
use app\models\Conveniencies;
use app\modules\institutions\models\Campuses;
use common\models\User;

$details = User::userDetails();
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $details['name'] ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i><?= $details['dscptn'] ?></a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <?php
        $baseUrl = Yii::$app->urlManager->baseUrl;
        $user_is_stdt = !Yii::$app->user->isGuest && Yii::$app->user->identity->profile == Conveniencies::student;
        $user_is_inst = !Yii::$app->user->isGuest && Yii::$app->user->identity->profile == Conveniencies::institution;
        $user_is_trnr = !Yii::$app->user->isGuest && Yii::$app->user->identity->profile == Conveniencies::trainer;
        $campuses[0] = ['label' => 'New Campus', 'icon' => 'fa fa-circle-o', 'url' => "$baseUrl/institutions/campuses/create"];
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->profile == Conveniencies::institution)
            foreach (Campuses::campusesForInstitution(Yii::$app->user->identity->id) as $campus)
                $campuses[$campus->id] = ['label' => "$campus->name", 'icon' => 'fa fa-circle-o', 'url' => "$baseUrl/institutions/campuses/update?id=$campus->id"]
                ?>


        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Main Menu', 'options' => ['class' => 'header']],
                        //['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                        ['label' => 'Persons', 'icon' => 'fa fa-file-code-o', 'url' => ['constpersons/create']],
                        ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                        ['label' => 'My Grades', 'url' => ['/person/studentSubjectScores/create'], 'visible' => $user_is_stdt],
                        ['label' => 'Campuses', 'url' => '#', 'items' => $campuses, 'visible' => $user_is_inst],
                        ['label' => 'Courses', 'url' => "$baseUrl/institutions/courses/create", 'visible' => $user_is_inst],
                        ['label' => 'Branch Centers', 'url' => ['/trainers/centers/create'], 'visible' => $user_is_trnr],
                        ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                        [
                            'label' => 'Same tools',
                            'icon' => 'fa fa-share',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                                ['label' => 'Debug', 'icon' => 'fa fa-dashboard:before', 'url' => ['/debug'],],
                                [
                                    'label' => 'Level One',
                                    'icon' => 'fa fa-circle-o',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        [
                                            'label' => 'Level Two',
                                            'icon' => 'fa fa-circle-o',
                                            'url' => '#',
                                            'items' => [
                                                ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                                ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
        )
        ?>

    </section>

</aside>
