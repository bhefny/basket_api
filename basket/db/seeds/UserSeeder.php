<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        for ($i = 1; $i <= 4; $i++) {
            $data[] = [
                'full_name'    => "user_$i",
                'email'    => "user_$i@gmail.de",
                'token'    => md5(uniqid("user_$i@gmail.de", true)),
                'created' => date('Y-m-d H:i:s'),
            ];
        }

        $products = $this->table('users');
        $products->truncate();
        $products->insert($data)->save();
    }
}
