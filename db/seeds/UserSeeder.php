<?php

class UserSeeder extends BaseSeeder
{
    /**
     * @throws \Exception
     */
    public function run()
    {
        if (!getenv('SEED_USER_EMAIL')) {
            throw new Exception('Seed email not set.');
        }

        if (!getenv('SEED_USER_PASSWORD')) {
            throw new Exception('Seed password not set.');
        }

        $now  = new DateTime('now');
        $data = [
            'email'      => getenv('SEED_USER_EMAIL'),
            'password'   => password_hash(getenv('SEED_USER_PASSWORD'), PASSWORD_DEFAULT),
            'token'      => null,
            'created_at' => $now->format('Y-m-d H:i:s'),
            'updated_at' => $now->format('Y-m-d H:i:s'),
        ];

        $posts = $this->table('users');
        $posts->insert($data)->save();
    }
}
