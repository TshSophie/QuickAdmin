<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('zh-CN');

        //生成测试数据
        $data = [];
        for ($i = 0; $i < 5; $i++)
        {
            $data[] = [
              'username' => $faker->userName,
              'password' => bcrypt('123456'),
              'created_at'=>date('Y-m:d H:s:i',time()),
              'status' => rand(1,2)
            ];
        }

        DB::table('manager')->insert($data);
    }
}
