<?php

namespace Mafd16\Comment;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * A controller for the Comment System.
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class CommentController implements AppInjectableInterface
{
    use AppInjectableTrait;


    /**
     * Get ALL comments from an article.
     *
     * @return void
     */
    //public function getComments($key)
    public function getComments()
    {
        $key = "comPage";
        // Get comments from model
        $comments = $this->app->com->getComments($key);
        // Add views to a specific region, add comments
        $this->app->view->add("comment/index", ["comments"=>$comments], "main");
        // Render a standard page using layout
        $this->app->renderPage([
            "title" => "Kommentarssystem",
        ]);
    }


    /**
     * Get ONE comment from an article.
     *
     * @param string $key for the article
     * @param int    $id for the comment id
     *
     * @return void
     */
    public function getComment($key, $id)
    {
        $comment = $this->app->com->getComment($key, $id);
        return $comment;
    }


    /**
     * Get ONE comment for editing.
     *
     * @return void
     */
    public function getCommentToEdit()
    {
        $key = "comPage";
        // Get id-variable from request.
        $id = $this->app->request->getGet("id");
        // Get the comment from Model.
        $comment = $this->app->com->getComment($key, $id);
        // Add views to a specific region
        $this->app->view->add("comment/edit", ["comment"=>$comment], "main");
        // Render a standard page using layout
        $this->app->renderPage([
            "title" => "Redigera kommentar",
        ]);
    }


    /**
     * Edit a comment.
     *
     * @return void
     */
    public function editComment()
    {
        // Get post-variables
        $post = $this->app->request->getPost();
        // Instruct Model to edit comment:
        $comKey = "comPage";
        // Edited comment:
        $comment = [
            "name" => $post["name"],
            "email" => $post["email"],
            "comment" => $post["comment"],
            "id" => $post["id"]
        ];
        $this->app->com->updateComment($comKey, $post["id"], $comment);
        // Send user back to comment page.
        $url = $this->app->url->create("comment");
        $this->app->response->redirect($url);
    }



    /**
     * Post a comment, with name and email.
     *
     * @return void
     */
    public function postComment()
    {
        // Catch post variables
        $post = $this->app->request->getPost();
        // Instruct Model to add comment:
        $this->app->com->addComment($post);
        // Send user back to comment page.
        $url = $this->app->url->create("comment");
        $this->app->response->redirect($url);
    }


    /**
     * Update old comment with new comment
     *
     * @param string    $key        for the dataset
     * @param int       $id         id for comment
     * @param array     $comment    the comment-array (name, email, comment, id)
     *
     * @return void
     */
    public function updateComment($key, $id, $comment)
    {
        $this->app->com->updateComment($key, $id, $comment);
    }


    /**
     * Delete comment with id
     *
     * @return void
     */
    public function deleteComment()
    {
        $key = "comPage";
        // Get id-variable from request.
        $id = $this->app->request->getGet("id");
        // Instruct Model to delete comment:
        $this->app->com->deleteComment($key, $id);
        // Send user back to comment page.
        $url = $this->app->url->create("comment");
        $this->app->response->redirect($url);
    }
}
