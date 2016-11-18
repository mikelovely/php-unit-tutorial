<?php

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected $user;

    public function setUp()
    {
        $this->user = new \App\Models\User;
    }

    public function test_we_can_get_first_name()
    {
        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function test_we_can_get_last_name()
    {
        $this->user->setLastName('Smith');

        $this->assertEquals($this->user->getLastName(), 'Smith');
    }

    public function test_the_full_name_is_returned()
    {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Smith');

        $this->assertEquals($this->user->getFullName(), 'Billy Smith');
    }

    public function test_the_first_and_last_name_are_trimmed()
    {
        $this->user->setFirstName(' Billy   ');
        $this->user->setLastName('    Smith ');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getLastName(), 'Smith');
    }

    public function test_can_get_the_email_address()
    {
        $this->user->setEmail('billysmith@example.com');

        $this->assertEquals($this->user->getEmail(), 'billysmith@example.com');
    }

    public function test_that_the_email_variables_contain_correct_values()
    {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Smith');
        $this->user->setEmail('billysmith@example.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy Smith');
        $this->assertEquals($emailVariables['email'], 'billysmith@example.com');
    }
}
