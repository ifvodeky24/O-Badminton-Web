<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

    <!-- Latest compiled and minified CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->

<div class="container">
    <br>    
    <br>    
    <br>    
    <br>    
    <br>    
    <br>
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>
                    <div class="card-body">
                        <form>
                        <div class="form-group">
                        
                        <?= $form->field($model, 'username', [
                            'inputTemplate' => '<div class="form-stack has-icon pull-left">{input}<i class="ico-user2 form-control-icon"></i></div>'
                        ])->textInput(['autofocus' => true,'class'=>'form-control text-input','placeholder'=>'Username', 'style'=>'width:550%'])->label(false) ?>
                        
                        <?= $form->field($model, 'password', [
                            'inputTemplate' => '<div class="form-stack has-icon pull-left">{input}<i class="ico-lock2 form-control-icon"></i></div>'
                        ])->passwordInput(['class'=>'form-control text-input','placeholder'=>'Password', 'style'=>'width:550%'])->label(false) ?>
                    </div>
                    <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn float-right login_btn', 'name' => 'login-button', 'style'=>'margin-right: 4%']) ?>
                    </div>
                </form>
            </div>
            <?php ActiveForm::end(); ?>
           <!--  <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="#">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">Forgot your password?</a>
                </div>
            </div> -->
        </div>
    </div>
</div>

    

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
