<?php

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

    public function getAllPages()
    {
        $allPages = $this->db->query(
            "SELECT alias AS url, title FROM page;"
        )->fetchAll();

        return $allPages;
    }
} 