<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PostController extends BaseController
{
    /**
     * Display the post index.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        return $this->respond('admin/post/index.twig', [
            'csrf' => $this->writedown->getService('csrf')->get(),
        ]);
    }

    /**
     * Show the new post page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create()
    {
        $csrf = $this->writedown->getService('csrf')->get();
        return $this->respond('admin/post/create.twig', [
            'csrf' => $csrf,
        ]);
    }

    /**
     * Show the new post page.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request  Not used here. Just placeholder so we can get to $args.
     * @param \Psr\Http\Message\ResponseInterface      $response As above.
     * @param array                                    $args     Will contain the Post ID.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function edit(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        $csrf = $this->writedown->getService('csrf')->get();
        return $this->respond('admin/post/edit.twig', [
            'csrf'   => $csrf,
            'postID' => $args['postID'],
        ]);
    }
}
