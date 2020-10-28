<?php
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;



/* @var $this \yii\web\View */
/* @var $content string */
?>
<style type="text/css">
    .navbar-brand {
    float: left;
    height: 50px;
    padding: 8px 15px;
    font-size: 18px;
    line-height: 27px;
}
</style>

<header class="main-header theme-color-main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <nav class="navbar navbar-static-top theme-color-main custom-navbar" role="navigation">
                <div class="navbar-custom-menu">
                    <?php
                        NavBar::begin([
                            'brandLabel' => Html::img('@web/images/LawHub_Logo.png', ['class' => 'logo-area',  'style' => "width: 100%;text-align: left;"]),
                            'brandUrl' => Yii::$app->homeUrl,
                            'renderInnerContainer' => false,
                            'options' => [
                                'class' => 'navbar-fixed-top nav-bar navbar-inverse theme-color-main custom-navbar',
                            ],
                            'containerOptions' => [
                                'class' =>'nav-container'
                            ]
                        ]);
                       $menuItems = [
                            [
                                'label' => 'Home',
                                'url' => ['site/index'],
                                'linkOptions' => [],
                            ],
                             [
                                'label' => 'Courses',
                                'url' => '',
                                'linkOptions' => [],
                                'items' => [
                                    [
                                        'label' => 'Diploma',
                                        'url' => ['/course-mast/view/?id=RDCLRA01'],
                                        
                                    ],
                                    [
                                        'label' => 'Workshop',
                                        'url' => ['/course-mast/view/?id=RCCLRW01'],
                                    ],
                                    [
                                        'label' => 'Certificate',
                                        'url' => ['/course-mast/view/?id=CLA0001'],
                                    ],
                                    
                                ]
                            ],

                            
                         ];
                         
                        if (Yii::$app->user->isGuest) {
                            $menuItems[] = ['label' => 'Login', 'url' => ['site/login']];
                            $menuItems[] = ['label' => 'Sign Up', 'url' => ['site/signup']];
                        } else {
                           $menuItems[] = ['label' => 'Logout', 'url' => ['site/logout'], 'data-method' => 'post'];
                           $menuItems[] = 
                            [
                                'label' => 'User',
                                'url' => '',
                                'linkOptions' => [],
                                'items' => [
                                    [
                                        'label' => 'Dashboard',
                                        'url' => ['site/dashboard']
                                    ],
                                    [
                                        'label' => 'Judgment List',
                                        'url' => ['judgment-mast/index']
                                    ],
                                ]
                            ];
                  
                        }
                      
                        echo Nav::widget([
                            'options' => ['class' => 'navbar-nav navbar-right theme-color-main nav-alt custom-navbar pdl-50 toggle-menu'],
                            'items' => $menuItems,
                        ]);
                        NavBar::end();
                        ?>

                </div>
            </nav>
        </div>
    </div>
</header>
