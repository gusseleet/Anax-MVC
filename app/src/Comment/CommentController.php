<?php

namespace gel\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;



    /**
     * View all comments.
     *
     * @return void
     */
    public function viewAction($which = null)
    {
        $comments = new \gel\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $all = $comments->findAll($which);

        $this->views->add('comment/comments', [
            'comments' => $all,
        ]);
    }



    /**
     * Add a comment.
     *
     * @return void
     */
    public function addAction()
    {
        $isPosted = $this->request->getPost('doCreate');

        if (!$isPosted) {
            $this->response->redirect($this->request->getPost('redirect'));
        }

        $formID    = $this->request->getPost('formID');

        $comment = [
            'content'   => $this->request->getPost('content'),
            'name'      => $this->request->getPost('name'),
            'web'       => $this->request->getPost('web'),
            'mail'      => $this->request->getPost('mail'),
            'timestamp' => time(),
            'ip'        => $this->request->getServer('REMOTE_ADDR'),

        ];

        $comments = new \gel\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $comments->add($comment, $formID);

       //$url = $this->di->url->create($formID);
       //$this->response->redirect($url);
       $this->response->redirect($this->request->getPost('redirect'));
    }



    /**
     * Remove all comments.
     *
     * @return void
     */
    public function removeAllAction()
    {
        $isPosted = $this->request->getPost('doRemoveAll');

        if (!$isPosted) {
            $this->response->redirect($this->request->getPost('redirect'));
        }

        $comments = new \gel\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $comments->deleteAll();

        $this->response->redirect($this->request->getPost('redirect'));
    }





    public function editAction($id, $formID = null) {


        $comments = new \gel\Comment\CommentsInSession();
        $comments->setDI($this->di);


        $singleComment = $comments->find($id, $formID);


        $this->views->add('comment/edit', [
            'mail'      => $singleComment['mail'],
            'web'       => $singleComment['web'],
            'name'      => $singleComment['name'],
            'content'   => $singleComment['content'],
            'id'        => $id,
            'output'    => null,
        ]);

        $isPosted = $this->request->getPost('doUpdate');
        if($isPosted) {


            $comment = [
                'content'   => $this->request->getPost('content'),
                'name'      => $this->request->getPost('name'),
                'web'       => $this->request->getPost('web'),
                'mail'      => $this->request->getPost('mail'),
                'timestamp' => time(),
                'ip'        => $this->request->getServer('REMOTE_ADDR'),
                'formID'    => $this->request->getPost('formID')
            ];

            $comments->update($id, $comment, $formID);

            $url = $this->di->url->create($formID);
            $this->response->redirect($url);

        }

    }


    public function removeSingleAction($id, $formID) {

        echo "HEJ";
        $comments = new \gel\Comment\CommentsInSession();
        $comments->setDI($this->di);

        $comments->delete($id, $formID);

        $url = $this->di->url->create($formID);
        $this->response->redirect($url);

    }
}
