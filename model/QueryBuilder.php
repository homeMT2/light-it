<?php


class QueryBuilder
{

    protected $pdo;

    public function __construct( $pdo )
    {
        $this->pdo = $pdo;
    }

    private function help_save_to_class( $select, $class ) {
        if( $class != FALSE ) {
            return $select->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class );
        }
        else {
            return $select->fetchAll( PDO::FETCH_CLASS );
        }
    }

    public function select_comments_by_ID( $id, $table, $class = FALSE ) {
        $select = $this->pdo->prepare( "select * from {$table} where parent = {$id} order by date ASC;" );
        $select->execute();

        if( $select->execute() != FALSE ) {
            return $this->help_save_to_class( $select, $class );
        }
        else {
            return FALSE;
        }

    }

    public function select_first_level( $table, $class = FALSE )
    {
        $select = $this->pdo->prepare( "select * from {$table} where level = 1 order by date DESC;" );
        $select->execute();

        return $this->help_save_to_class( $select, $class );
    }

    public function insert_comment( $table, $comment ) {

        $insert = $this->pdo->prepare("INSERT INTO {$table} (text, date, level, parent) VALUES ( :text, :date, :level, :parent)");

        $insert->bindParam( ':text',    $comment->get_text()   );
        $insert->bindParam( ':date',    $comment->get_date()   );
        $insert->bindParam( ':level',   $comment->get_level()  );
        $insert->bindParam( ':parent',  $comment->get_parent() );

        $insert->execute();

        return TRUE;
    }

}