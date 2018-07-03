<?php

trait MailTracking {
    protected $emails = [];

    /** @before */
    public function setUpMailTracking() {
        parent::setUp();

        Mail::getSwiftMailer()
            ->registerPlugin(new TestingMailEventListener($this));

    }

    protected function seeEmailWasSent() {
        $this->assertNotEmpty($this->emails);
        return $this;
    }

    protected function seeEmailsSent($count) {
        $this->assertCount($count, $this->emails);
        return $this;
    }

    public function addEmail(Swift_Message $email) {
        $this->emails[] = $email;
    }

    protected function seeEmailTo($recipient, Swift_Message $message = null) {
        $email = $message ?: end($this->emails);

        $this->assertArrayHasKey($recipient, $this->getEmail($message)->getTo());

        return $this;
    }

}


class TestingMailEventListener implements Swift_Events_EventListener {

    protected $test;

    public function __construct($test)
    {
        $this->test = $test;
    }

    public function beforeSendPerformed($event) {
        $message = $event->getMessage();

        $this->test->addEmail($event->getMessage());
    }
}

