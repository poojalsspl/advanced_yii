<?php

use yii\helpers\Html;
//use yii\grid\GridView;

?>
    <section class="our_project">
        <div class="container">
             <?= Html::a('Upload Documents', ['create'], ['class' => 'btn btn_1 btn-success']) ?>
        </div>
        <br>
        

    </section>
    <hr>
<h2>Documents uploaded </h2>
<section class="blog_area ">
        <div class="container">
            <table border="2">
                <tr>
                    <th>User id</th>
                    <th>10 th</th>
                    <th>12 th</th>
                    <th>Id Proof</th>
                    <th>operation</th>
                </tr>
                <?php foreach ($documents as $docs): ?>
                <tr>
                    <td><h3><?= Html::encode("{$docs->user_id}") ?></h3></td>
                    
                    <td>
                        <?= Html::a($docs->x_th, [
                                'documents/pdf_xth',
                                'id' => $docs->id,
                            ], [
                                //'class' => 'btn btn-primary',
                                'target' => '_blank',
                            ]); 
                        ?>
                       
                    </td>
                    <td>
                        <?= Html::a($docs->xii_th, [
                                'documents/pdf_xiith',
                                'id' => $docs->id,
                            ], [
                                //'class' => 'btn btn-primary',
                                'target' => '_blank',
                            ]); 
                        ?>
                       
                    </td>
                    <td>
                        <?= Html::a($docs->id_proof, [
                                'documents/pdf_idproof',
                                'id' => $docs->id,
                            ], [
                               // 'class' => 'btn btn-primary',
                                'target' => '_blank',
                            ]); 
                        ?>
                       
                    </td>
                    <td>
                        <?php // Html::a('Update', ['/documents/update', 'id' => $docs->id], ['class'=>'genric-btn success circle']) ?>
                        <?= Html::a('Delete', ['/documents/delete', 'id' => $docs->id], ['class'=>'genric-btn danger circle'])  ?>
                    </td>
                </tr>
            <?php endforeach ?>
            </table>
        </div>
    </div>
</section>