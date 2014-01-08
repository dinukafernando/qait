<?php

foreach ($data as $record) {
    $tags = explode(',', $record['tags']);
    echo '<div style="border-bottom: 1px solid #eff2f7;padding-bottom:10px;" class="classic-search">';
    echo '<h4><a href=' . base_url() . 'questions/title/' . urlencode($record['title']) . '>' . $record['title'] . '?</a></h4>';
    echo '<a href=' . base_url() . 'questions/title/' . urlencode($record['title']) . '>' . base_url() . 'questions/title/' . urlencode($record['title']) . '</a>';
    echo '<p style="text-align:justify;">' . (strlen($record['content']) >= 350 ? (substr($record['content'], 0, 350) . '...') : $record['content']) . '</p>';
    //echo '</div>';
    foreach ($tags as $tag) {
        //echo "&nbsp;&nbsp;&nbsp;<a class='tags' href=''>".$tag."</a>";
        echo '<a href="#" class="btn btn-xs btn-success">'.$tag.'</a>&nbsp;';
    }
    echo '</div>';
    
//    <a href="#" class="btn btn-xs btn-success">html5</a>
//    <a href="#" class="btn btn-xs btn-success">drag-and-drop</a>
}
?>
