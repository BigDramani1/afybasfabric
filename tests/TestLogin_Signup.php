<?php

namespace Johnm\Afybasfabric;
require('settings/connection.php');
require('controllers/customer_controller.php');

use Customer;
use PHPUnit\Framework\TestCase;

final class TestLogin_Signup extends TestCase{
    public function testCustomerEmail(){
        $testCustomerEmail = one_customer_email_controller("a.dramani@aisghana.org")['customer_name'];
        $testMail = 'Dramani';
        $this->assertSame($testMail,$testCustomerEmail);
    }

    public function testEmailOTP(){
        $testEmailOTP = check_otp_controller("786896","a.dramani@aisghana.org")['customer_email'];
        $Outcome = "a.dramani@aisghana.org";
        $this->assertSame($testEmailOTP,$Outcome);
    }

}

?>