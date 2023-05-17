<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Foo;
use App\Data\Person; // tambahkan namespace untuk kelas Person

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDepedencyInjection()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }

    public function testSingleton()
    {
        // $person = $this->app->make(person::class);
        // sel::assertNotNull($person);

        $this->app->singleton(Person::class, function ($app) {
            return new Person('Ega', 'Pramudya');
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Ega', $person1->firstname);
        self::assertEquals('Ega', $person2->firstname);
        self::assertSame($person1, $person2);
    }
}
