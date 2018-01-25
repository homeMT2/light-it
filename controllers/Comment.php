<?php


class Comment
{
    private $id;
    private $text;
    private $date;
    private $level;
    private $parent;
    private $sub;

    public function __construct( $id = 0, $text = '', $date = 0, $level = 0, $parent = 0 )
    {
        $this->id       = $id;
        $this->text     = $text;
        $this->date     = $date;
        $this->level    = ( $level <= 3 ) ? $level : 3;
        $this->parent   = $parent;
        $this->sub = FALSE;
    }

    public function get_sub_comments($query)
    {
        $this->sub = $query->select_comments_by_ID( $this->id, 'comment', 'Comment' );
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_text()
    {
        return $this->text;
    }

    public function get_date()
    {
        return $this->date;
    }

    public function get_level()
    {
        return $this->level;
    }

    public function get_parent()
    {
        return $this->parent;
    }

    public function get_sub()
    {
        return $this->sub;
    }

}