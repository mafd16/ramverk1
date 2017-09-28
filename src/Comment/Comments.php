<?php

//namespace Anax\Comments;
namespace Mafd16\Comment;

use \Anax\Database\ActiveRecordModel;

/**
 * A database driven model.
 */
class Comments extends ActiveRecordModel
{
    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Comments";


    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $UserId;
    public $UserName;
    public $UserEmail;
    public $comment;
    public $created;
    public $updated;
    public $deleted;


    /**
     * Set the password.
     *
     * @param string $password the password to use.
     *
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


    /**
     * Verify the acronym and the password, if successful the object contains
     * all details from the database row.
     *
     * @param string $acronym  acronym to check.
     * @param string $password the password to use.
     *
     * @return boolean true if acronym and password matches, else false.
     */
    public function verifyPassword($acronym, $password)
    {
        $this->find("acronym", $acronym);
        return password_verify($password, $this->password);
    }
}
