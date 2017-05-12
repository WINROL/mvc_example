<br>
<br>
<br>

<?php

echo \Framework\Lang\Lang::get('pages', 'Pages:') . '<br/>';

if (!empty($data['pages'])) {
    foreach ($data['pages'] as $page) {
        echo $page['title'] . ' <a href="http://localhost/winrol/page/view/' . $page['url'] . '/">'
            . $page['title'] . '</a><br/>'
        ;
    }
}
?>