<?php

namespace WriteDown\Auth;

use Doctrine\ORM\EntityManager;

class VerifyCredentials implements VerifyCredentialsInterface
{
    /**
     * The EntityManager object.
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $db;

    /**
     * Set-up.
     *
     * @param \Doctrine\ORM\EntityManager $database
     *
     * @return void
     */
    public function __construct(EntityManager $database)
    {
        $this->db = $database;
    }

    /**
     * Verify an email and password match.
     *
     * @param string $email
     * @param string $password
     *
     * @return bool
     */
    public function verify($email, $password)
    {
        // Get the user by the email address
        $user = $this->db->getRepository('WriteDown\Entities\User')
            ->findOneBy(['email' => $email]);

        if (!$user) {
            return false;
        }

        return password_verify($password, $user->password);
    }
}