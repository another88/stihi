<div id="poet_profile">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => $this->breadcrumbs,
    ));
    ?>
    <div class="papirus">
        <div class="stihi_data">
            <h3>Последние добавленные стихи</h3>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => 'views/_stihi',
                'summaryText' => 'Страница {page}  из ({pages})'
            ));
            ?>
        </div>
    </div>
</div>
