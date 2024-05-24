<?php

namespace Tests\Http\User;

use Tests\TestCase;

class UserHttpCsvTest extends TestCase
{
    public function testShouldCorrectlyReturnAnUserById(): void
    {
        $response = $this
        ->call(
            'GET',
            'http://localhost:8000/user/data/3'
        );

        $response->assertStatus(self::HTTP_SUCCESS_STATUS);
        $response->assertJson([
            [
                'id' => '3',
                'name' => 'Ronaldo Nazário',
                'cpf' => '13982313040',
                'email' => 'ronaldo.nazario@email.com',
                'admission_date' => '14/07/2020',
                'is_eligible' => true
            ]
        ]);
    }

    public function testShouldCorrectlyDeleteAnUserById(): void
    {
        $response = $this
        ->call(
            'GET',
            'http://localhost:8000/user/delete/3'
        );

        $response->assertStatus(self::HTTP_SUCCESS_STATUS);
        $response->assertJson(['success' => "User deted success"]);
    }
}
