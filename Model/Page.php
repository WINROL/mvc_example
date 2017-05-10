<?php
/**
 * Created by PhpStorm.
 * User: 23
 * Date: 10.05.17
 * Time: 20:55
 */

namespace Model;


use Framework\Model\Model;

class Page extends Model
{
    public function getPageByAlias($alias)
    {
        $stmt = $this->db->prepare(
            "SELECT title, content FROM page WHERE alias = :alias"
        );
        $stmt->execute([
            'alias' => $alias
        ]);

        $result = $stmt->fetch();

        return !empty($result) ? $result : false;
    }
} 